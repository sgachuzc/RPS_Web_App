<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('adminonline')->group(function(){
    Route::get('/', [AdminController::class, 'adminOnline']);
    Route::get('/usuarios', [AdminController::class, 'users']);
    Route::get('/crear_usuario', [AdminController::class, 'createUser']);
    Route::post('/crear_usuario', [AdminController::class, 'storeUser']);
});