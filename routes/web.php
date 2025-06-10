<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('adminonline')->group(function(){
    Route::get('/', [AdminController::class, 'adminOnline'])->name('login')->middleware('guest');
    Route::get('/index', [AdminController::class, 'index'])->middleware('auth');
    Route::get('/usuarios', [AdminController::class, 'users'])->middleware('auth');
    Route::get('/crear_usuario', [AdminController::class, 'createUser'])->middleware('auth');
    Route::post('/crear_usuario', [AdminController::class, 'storeUser'])->middleware('auth');
});

Route::post('/login', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'logout'])->middleware('auth');