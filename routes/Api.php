<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

// ============================================
// ROTAS PÚBLICAS
// ============================================
Route::post('/login', [AuthController::class, 'login']);


// ============================================
// ROTAS PROTEGIDAS
// ============================================
Route::middleware(['auth:sanctum'])->group(function () {

    // ---------- Autenticação ----------
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // ---------- Registrar usuários (Apenas ADMIN) ----------
    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('role:admin');


    // ============================================
    // ÁREA ADMINISTRATIVA
    // ============================================
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', fn() =>
            response()->json(['message' => 'Dashboard do Administrador'])
        );
    });

    // ============================================
    // ÁREA GERENCIAL (Admin e Gerente)
    // ============================================
    Route::middleware('role:admin,gerente')->group(function () {
        Route::get('/manager/reports', fn() =>
            response()->json(['message' => 'Relatórios Gerenciais'])
        );
    });

    // ============================================
    // DASHBOARD (qualquer usuário autenticado)
    // ============================================
    Route::get('/dashboard', fn() =>
        response()->json(['message' => 'Dashboard do Usuário'])
    );


    // ============================================
    // ROTAS DE ESTOQUE
    // ============================================
    
    // Consultas (todos os usuários autenticados)
    Route::prefix('estoque')->group(function () {
        Route::get('/historico', [EstoqueController::class, 'historico']);
        Route::get('/produto/{id}', [EstoqueController::class, 'historicoProduto']);
        Route::get('/alertas', [EstoqueController::class, 'alertas']);
        Route::get('/sem-estoque', [EstoqueController::class, 'semEstoque']);
        Route::get('/relatorio', [EstoqueController::class, 'relatorio']);
    });

    // Movimentações (apenas admin e gerente)
    Route::middleware('role:admin,gerente')->prefix('estoque')->group(function () {
        Route::post('/entrada', [EstoqueController::class, 'entrada']);
        Route::post('/saida', [EstoqueController::class, 'saida']);
        Route::post('/ajuste', [EstoqueController::class, 'ajuste']);
    });


    // ============================================
    // ROTAS DE VENDAS
    // ============================================
    Route::get('/vendas', [VendaController::class, 'listar']);
    Route::post('/vendas', [VendaController::class, 'criar']);
    Route::post('/vendas/{id}/finalizar', [VendaController::class, 'finalizar']);
    Route::post('/vendas/{id}/cancelar', [VendaController::class, 'cancelar']);


    // ============================================
    // ROTAS DE RELATÓRIOS
    // ============================================
    Route::prefix('relatorios')->group(function () {
        Route::get('/total-vendido', [RelatorioController::class, 'totalVendidoPorPeriodo']);
        Route::get('/mais-vendidos', [RelatorioController::class, 'produtosMaisVendidos']);
    });
});
