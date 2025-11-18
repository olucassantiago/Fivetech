<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lucas', 'App\Http\Controllers\LucasController@index');
Route::get('/lucas_criar', 'App\Http\Controllers\LucasController@store');

Route::middleware(['auth'])->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'paginaProdutos'])->name('produtos.index');
    Route::get('/vendas', [VendaController::class, 'paginaVendas'])->name('vendas.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/relatorio', [RelatorioController::class, 'index'])->name('relatorio');
    Route::get('/relatorio/total-vendido', [RelatorioController::class, 'totalVendidoPorPeriodo'])->name('relatorio.total');
    Route::get('/relatorio/produtos-mais-vendidos', [RelatorioController::class, 'produtosMaisVendidos'])->name('relatorio.maisvendidos');
});

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');