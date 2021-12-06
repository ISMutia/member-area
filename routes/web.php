<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/status', [StatusController::class, 'index']);
// Route::get('/status/delete/{id}', [StatusController::class, 'delete']);

Route::group([
    'middleware' => ['guest'],
], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
    // Route::get('/register', [AuthController::class, 'registration'])->name('register');
    // Route::post('/register', [AuthController::class, 'postRegistration'])->name('register.post');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('status')->group(function () {
        Route::get('/', [StatusController::class, 'index']);
        Route::get('/delete/{id}', [StatusController::class, 'delete']);
        Route::get('/create', [StatusController::class, 'create']);
        Route::post('/store', [StatusController::class, 'store']);
        Route::get('/edit/{id}', [StatusController::class, 'edit']);
        Route::post('/update', [StatusController::class, 'update']);
    });

    // Route::get('/domain', [DomainController::class, 'index']);
    // Route::get('/domain/delete/{id}', [DomainController::class, 'delete']);

    Route::prefix('domain')->group(function () {
        Route::get('/', [DomainController::class, 'index']);
        Route::get('/delete/{id}', [DomainController::class, 'delete']);
        Route::get('/create', [DomainController::class, 'create']);
        Route::post('/store', [DomainController::class, 'store']);
        Route::post('/update', [DomainController::class, 'update']);
        Route::get('/edit/{id}', [DomainController::class, 'edit']);
    });

    // Route::get('/user', [UserController::class, 'index']);
    // Route::get('/user/delete/{id}', [UserController::class, 'delete']);

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/delete/{id}', [UserController::class, 'delete']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/store', [UserController::class, 'store']);
        Route::post('/update', [UserController::class, 'update']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
    });

    Route::get('/testimoni', [TestimoniController::class, 'index']);
    Route::get('/testimoni/delete/{id}', [TestimoniController::class, 'delete']);

    Route::group([
        'prefix' => 'order',
        'as' => 'order.',
    ], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::put('/update/{id}', [OrderController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
    });

    // Route::get('/price', [PriceController::class, 'index']);
    // Route::get('/price/delete/{id}', [PriceController::class, 'delete']);

    Route::prefix('price')->group(function () {
        Route::get('/', [PriceController::class, 'index']);
        Route::get('/delete/{id}', [PriceController::class, 'delete']);
        Route::get('/create', [PriceController::class, 'create']);
        Route::post('/store', [PriceController::class, 'store']);
        Route::post('/update', [PriceController::class, 'update']);
        Route::get('/edit/{id}', [PriceController::class, 'edit']);
    });

    Route::get('/progress', [ProgressController::class, 'index']);
    Route::get('/progress/delete/{id}', [ProgressController::class, 'delete']);

    Route::prefix('progress')->group(function () {
        Route::get('/', [ProgressController::class, 'index']);
        Route::get('/delete/{id}', [ProgressController::class, 'delete']);
        Route::get('/create', [ProgressController::class, 'create']);
        Route::post('/store', [ProgressController::class, 'store']);
        Route::post('/update', [ProgressController::class, 'update']);
        Route::get('/edit/{id}', [ProgressController::class, 'edit']);
    });

    Route::prefix('bill')->group(function () {
        Route::get('/', [BillController::class, 'index']);
        Route::get('/delete/{id}', [BillController::class, 'delete']);
        Route::get('/create', [BillController::class, 'create']);
        Route::post('/store', [BillController::class, 'store']);
        Route::post('/update', [BillController::class, 'update']);
        Route::get('/edit/{id}', [BillController::class, 'edit']);
    });
});

// Route::get('dashboard', [AuthController::class, 'dashboard']);
// Route::get('/', [LoginController::class, 'index']);
// Route::get('/login', [LoginController::class, 'index']);
