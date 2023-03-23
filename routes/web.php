<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\{
    HomeController,
    ClubeController,
    UsuarioController,
    FaturaController
};

Route::get('/', [HomeController::class, 'home'])->name('home.home');

Route::prefix('clubes')->group(function () {
    Route::get('/', [ClubeController::class, 'list'])->name('clubes.list');
    Route::get('/{id}', [ClubeController::class, 'show'])->name('clubes.show')->where('id', '[0-9]+');
    Route::delete('/{id}', [ClubeController::class, 'delete'])->name('clubes.delete')->where('id', '[0-9]+');

    Route::get('/create', [ClubeController::class, 'createForm'])->name('clubes.createForm');
    Route::post('/create', [ClubeController::class, 'create'])->name('clubes.create');

    Route::get('/edit/{id}', [ClubeController::class, 'editForm'])->name('clubes.editForm')->where('id', '[0-9]+');
    Route::put('/edit/{id}', [ClubeController::class, 'edit'])->name('clubes.edit')->where('id', '[0-9]+');
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'list'])->name('usuarios.list');
    Route::get('/{id}', [UsuarioController::class, 'show'])->name('usuarios.show')->where('id', '[0-9]+');
    Route::delete('/{id}', [UsuarioController::class, 'delete'])->name('usuarios.delete')->where('id', '[0-9]+');

    Route::get('/create', [UsuarioController::class, 'createForm'])->name('usuarios.createForm');
    Route::post('/create', [UsuarioController::class, 'create'])->name('usuarios.create');

    Route::get('/edit/{id}', [UsuarioController::class, 'editForm'])->name('usuarios.editForm')->where('id', '[0-9]+');
    Route::put('/edit/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit')->where('id', '[0-9]+');

    // falta testar
    Route::get('/details/{id}', [UsuarioController::class, 'details'])->name('usuarios.details')->where('id', '[0-9]+');

    // falta testar
    Route::post('/joinclube/{usuario_id}/{clube_id}', [UsuarioController::class, 'joinClube'])->name('usuarios.joinClube')->where('usuario_id', '[0-9]+')->where('clube_id', '[0-9]+');
});

// falta testar
Route::put('/faturas/payment/{usuario_id}', [FaturaController::class, 'newPayment'])->name('faturas.newPayment');

Route::fallback(function () {
    echo 'Essa rota não existe, <a href="'.route('home.home').'">aqui</a> para voltar.';
});
