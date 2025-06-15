<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('adminonline')->group(function(){
    Route::get('/', [AdminController::class, 'adminOnline'])->name('login')->middleware('guest');
    Route::get('/index', [AdminController::class, 'index'])->middleware('auth');
    
    Route::get('/usuarios', [UserController::class, 'index'])->middleware('auth');
    Route::get('/crear_usuario', [UserController::class, 'create'])->middleware('auth');
    Route::post('/crear_usuario', [UserController::class, 'store'])->middleware('auth');
    Route::get('/usuarios/{user}/editar', [UserController::class, 'edit'])->middleware('auth');
    Route::patch('/usuarios/{user}', [UserController::class, 'update'])->middleware('auth');
    Route::delete('/usuarios/{user}', [UserController::class, 'delete'])->middleware('auth');

    Route::prefix('services')->middleware('auth')->group(function(){
        Route::get('/', [ServicesController::class, 'index']);
        Route::get('/create', [ServicesController::class, 'create']);
        Route::post('create', [ServicesController::class, 'store']);
    });
});

Route::post('/login', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'logout'])->middleware('auth');