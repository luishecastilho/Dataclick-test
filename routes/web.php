<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController::class', 'home');

Route::prefix('clubes')->group(function () {
    Route::get('/', 'ClubeController::class', 'list');

    Route::get('/create', 'ClubeController::class', 'createForm');
    Route::post('/create', 'ClubeController::class', 'create');

    Route::get('/edit/{id}', 'ClubeController::class', 'editForm');
    Route::put('/edit/{id}', 'ClubeController::class', 'edit');

    Route::post('/delete/{id}', 'ClubeController::class', 'delete');
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', 'UsuarioController::class', 'list');

    Route::get('/create', 'UsuarioController::class', 'createForm');
    Route::post('/create', 'UsuarioController::class', 'create');

    Route::get('/edit/{id}', 'UsuarioController::class', 'editForm');
    Route::put('/edit/{id}', 'UsuarioController::class', 'edit');

    Route::post('/delete/{id}', 'UsuarioController::class', 'delete');

    Route::post('/joinclube/{user_id}/{clube_id}', 'UsuarioController::class', 'joinClube');

    Route::get('/details/{id}', 'UsuarioController::class', 'details');
});

Route::prefix('faturas')->group(function () {
    Route::get('/', 'FaturaController::class', 'list');

    Route::post('/create', 'FaturaController::class', 'createNewSingaturePlan');

    Route::put('/payment/{id}', 'FaturaController::class', 'newPayment');
});
