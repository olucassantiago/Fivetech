<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueController;
use Illuminate\Support\Facades\Route;

// ============================================
// ROTAS PÚBLICAS (não precisam de autenticação)
// ============================================
Route::post('/login', [AuthController::class, 'login']);

// ============================================
// ROTAS PROTEGIDAS (precisam de autenticação)
// ============================================
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/estoque/historico', [\App\Http\Controllers\EstoqueController::class, 'historico']);
    
    // Logout - qualquer usuário autenticado pode fazer logout
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Informações do usuário logado
    Route::get('/me', [AuthController::class, 'me']);
    
    // Registrar usuário - APENAS ADMIN pode registrar novos usuários
    Route::post('/register', [AuthController::class, 'register'])
         ->middleware('role:admin');
});

// ============================================
// EXEMPLOS DE ROTAS COM CONTROLE DE ACESSO
// ============================================
Route::middleware(['auth:sanctum'])->group(function () {
    
    // Rotas que APENAS ADMIN pode acessar
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return response()->json(['message' => 'Dashboard do Administrador']);
        });
    });
    
    // Rotas que ADMIN e GERENTE podem acessar
    Route::middleware('role:admin,gerente')->group(function () {
        Route::get('/manager/reports', function () {
            return response()->json(['message' => 'Relatórios Gerenciais']);
        });
    });
    
    // Rotas que TODOS os usuários autenticados podem acessar
    Route::get('/dashboard', function () {
        return response()->json(['message' => 'Dashboard do Usuário']);
    });

    // ============================================
    // ROTAS DE ESTOQUE
    // ============================================
    
    // Consultas (todos podem ver)
    Route::get('/estoque/historico', [EstoqueController::class, 'historico']);
    Route::get('/estoque/produto/{id}', [EstoqueController::class, 'historicoProduto']);
    Route::get('/estoque/alertas', [EstoqueController::class, 'alertas']);
    Route::get('/estoque/sem-estoque', [EstoqueController::class, 'semEstoque']);
    Route::get('/estoque/relatorio', [EstoqueController::class, 'relatorio']);
    
    // Movimentações (apenas admin e gerente)
    Route::middleware('role:admin,gerente')->group(function () {
        Route::post('/estoque/entrada', [EstoqueController::class, 'entrada']);
        Route::post('/estoque/saida', [EstoqueController::class, 'saida']);
        Route::post('/estoque/ajuste', [EstoqueController::class, 'ajuste']);
    });
});



// ====================
// ROTAS DE VENDAS
Route::get('/vendas', [\App\Http\Controllers\VendaController::class, 'listar']);
// ====================
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/estoque/historico', [\App\Http\Controllers\EstoqueController::class, 'historico']);
    Route::post('/vendas', [\App\Http\Controllers\VendaController::class, 'criar']);
    Route::post('/vendas/{id}/finalizar', [\App\Http\Controllers\VendaController::class, 'finalizar']);
    Route::post('/vendas/{id}/cancelar', [\App\Http\Controllers\VendaController::class, 'cancelar']);
});

// ====================
// ROTAS DE RELATÓRIOS
// ====================
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/estoque/historico', [\App\Http\Controllers\EstoqueController::class, 'historico']);
    Route::get('/relatorios/total-vendido', [\App\Http\Controllers\RelatorioController::class, 'totalVendidoPorPeriodo']);
    Route::get('/relatorios/mais-vendidos', [\App\Http\Controllers\RelatorioController::class, 'produtosMaisVendidos']);
});
