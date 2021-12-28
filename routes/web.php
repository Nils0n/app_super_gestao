<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\SobreNosController;

Route::get('/', [PrincipalController::class, 'index'])->name('site.index');
Route::get('/contato', [ContatoController::class, 'index'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'store'])->name('site.contato.store');

Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('site.login.authenticate');

Route::get('/sobrenos', [SobreNosController::class, 'index'])->name('site.sobrenos');

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/sair', [LoginController::class, 'exit'])->name('app.sair');

    Route::prefix('fornecedor')->group(function () {
        Route::get('/', [FornecedorController::class, 'index'])->name('app.fornecedor');
        Route::get('/criar', [FornecedorController::class, 'create'])->name('app.fornecedor.create');
        Route::post('/criar', [FornecedorController::class, 'store'])->name('app.fornecedor.store');
        Route::get('/list', [FornecedorController::class, 'list'])->name('app.fornecedor.list');
        Route::post('/list', [FornecedorController::class, 'list'])->name('app.fornecedor.list');
        Route::get('/editar/{id}', [FornecedorController::class, 'edit'])->name('app.fornecedor.edit');
        Route::put('/editar/{id}', [FornecedorController::class, 'update'])->name('app.fornecedor.update');
        Route::delete('/deletar/{id}', [FornecedorController::class, 'destroy'])->name('app.fornecedor.destroy');
    });

    Route::prefix('produto')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('app.produto');
        Route::get('/criar', [ProdutoController::class, 'create'])->name('app.produto.create');
        Route::get('/{id}', [ProdutoController::class, 'show'])->name('app.produto.show');
        Route::post('/criar', [ProdutoController::class, 'store'])->name('app.produto.store');
        Route::get('/editar/{id}', [ProdutoController::class, 'edit'])->name('app.produto.edit');
        Route::put('/editar/{id}', [ProdutoController::class, 'update'])->name('app.produto.update');
        Route::delete('/deletar/{id}', [ProdutoController::class, 'destroy'])->name('app.produto.destroy');
    });

    Route::prefix('produto-detalhe')->group(function () {
        Route::get('/', [ProdutoDetalheController::class, 'index'])->name('app.produto-detalhe');
        Route::get('/criar', [ProdutoDetalheController::class, 'create'])->name('app.produto-detalhe.create');
        Route::get('/{id}', [ProdutoDetalheController::class, 'show'])->name('app.produto-detalhe.show');
        Route::post('/criar', [ProdutoDetalheController::class, 'store'])->name('app.produto-detalhe.store');
        Route::get('/editar/{id}', [ProdutoDetalheController::class, 'edit'])->name('app.produto-detalhe.edit');
        Route::put('/editar/{id}', [ProdutoDetalheController::class, 'update'])->name('app.produto-detalhe.update');
        Route::delete('/deletar/{id}', [ProdutoDetalheController::class, 'destroy'])->name('app.produto-detalhe.destroy');
    });
});

Route::fallback(function () {
    echo 'A rota acessada não existe. clique <a href="' . route('site.index') . '">aqui </a> para voltar a página inicial.';
});
