<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConfigurationsController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InscriptionsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register/{token}', [ParticipantController::class, 'showForm'])->name('participants.register');
Route::post('/register/{token}', [ParticipantController::class, 'register']);

Route::get('/comments/{token}', [CommentsController::class, 'showForm']);
Route::patch('/comments/{token}', [CommentsController::class, 'store']);

Route::post('/certificates/validate', [CertificatesController::class, 'validate']);

Route::prefix('adminonline')->group(function(){

    Route::get('/', [AdminController::class, 'adminOnline'])->name('login')->middleware('guest');
    Route::get('/index', [AdminController::class, 'index'])->middleware('auth');

    Route::middleware('auth')->group(function(){
        Route::get('profile', [AdminController::class, 'profile']);
        Route::patch('updateEmail', [AdminController::class, 'updateEmail']);
        Route::patch('updatePassword', [AdminController::class, 'updatePassword']);
    });
    
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
    
    Route::prefix('customers')->middleware('auth')->group(function(){
        Route::get('/', [CustomersController::class, 'index']);
        Route::get('/create', [CustomersController::class, 'create']);
        Route::post('/create', [CustomersController::class, 'store']);
        Route::get('/{customer}/edit', [CustomersController::class, 'edit']);
        Route::patch('/{customer}', [CustomersController::class, 'update']);
        Route::delete('/{customer}', [CustomersController::class, 'delete']);
    });

    Route::prefix('inscriptions')->middleware('auth')->group(function(){
        Route::get('/', [InscriptionsController::class, 'index']);
        Route::get('/create', [InscriptionsController::class, 'create']);
        Route::post('/create', [InscriptionsController::class, 'store']);
        Route::get('/{inscription}/edit', [InscriptionsController::class, 'edit']);
        Route::patch('/{inscription}/status', [InscriptionsController::class, 'updateStatus']);
        Route::patch('/{inscription}/dates', [InscriptionsController::class, 'updateDates']);
        Route::delete('/{inscription}', [InscriptionsController::class, 'delete']);
        Route::get('/{inscription}/details', [InscriptionsController::class, 'details'])->name('inscriptions.details');
        Route::get('/{inscription}/results', [InscriptionsController::class, 'results'])->name('inscriptions.results');
    });

    Route::post('/certificates/deliver/{participant}/{service}', [CertificatesController::class, 'deliver'])->name('certificates.deliver');

    Route::prefix('configurations')->middleware('auth')->can('admin')->group(function(){
        Route::get('/', [ConfigurationsController::class, 'index']);
        Route::patch('/store', [ConfigurationsController::class, 'store']);
    });

    Route::prefix('contacts')->middleware('auth')->group(function(){
        Route::get('/', [ContactsController::class, 'adminIndex'])->name('admin.contacts.index');
        Route::delete('/{contact}', [ContactsController::class, 'delete']);
    });
});

Route::prefix('password')->middleware('guest')->group(function(){
    Route::get('/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/login', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'logout'])->middleware('auth');