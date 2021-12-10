<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SobreNosController;

Route::get('/', [PrincipalController::class , 'index'])->name('site.index');
Route::get('/contato', [ContatoController::class , 'index'])->name('site.contato');
Route::post('/contato', [ContatoController::class , 'store'])->name('site.contato.store');

Route::get('/login' , [LoginController::class , 'index'])->name('site.login');
Route::post('/login' , [LoginController::class , 'authenticate'])->name('site.login.authenticate');

Route::get('/sobrenos', [SobreNosController::class , 'index'])->name('site.sobrenos');

Route::middleware('autenticacao')->prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');
});

Route::fallback(function(){
    echo 'A rota acessada não existe. clique <a href="'.route('site.index').'">aqui </a> para voltar a página inicial.';
});

