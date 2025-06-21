<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InscriptionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('adminonline')->group(function(){
    Route::get('/', [AdminController::class, 'adminOnline'])->name('login')->middleware('guest');
    Route::get('/index', [AdminController::class, 'index'])->middleware('auth');
    
    Route::prefix('users')->middleware('auth')->can('admin')->group(function(){
        Route::get('/', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/create', [UserController::class, 'store']);
        Route::get('/{user}/edit', [UserController::class, 'edit']);
        Route::patch('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'delete']);
    });

    Route::prefix('services')->middleware('auth')->group(function(){
        Route::get('/', [ServicesController::class, 'index']);
        Route::get('/create', [ServicesController::class, 'create']);
        Route::post('/create', [ServicesController::class, 'store']);
        Route::get('/{service}/edit', [ServicesController::class, 'edit']);
        Route::patch('/{service}', [ServicesController::class, 'update']);
        Route::delete('/{service}', [ServicesController::class, 'delete']);
    });

    Route::prefix('inscriptions')->middleware('auth')->group(function(){
        Route::get('/', [InscriptionsController::class, 'index']);
        Route::get('/create', [InscriptionsController::class, 'create']);
        Route::post('/create', [InscriptionsController::class, 'store']);
        Route::get('/{inscription}/edit', [InscriptionsController::class, 'edit']);
        Route::patch('/{inscription}', [InscriptionsController::class, 'update']);
        Route::patch('/{inscription}/status', [InscriptionsController::class, 'updateStatus']);
        Route::delete('/{inscription}', [InscriptionsController::class, 'delete']);
    });
});

Route::post('/login', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'logout'])->middleware('auth');