<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubscribeController;
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
Route::get('/notifBirthday', [NotificationController::class, 'index']);
Route::get('/notifDomainT/{month}', [NotificationController::class, 'indexTLamaDomain']);
Route::get('/domainExpired', [NotificationController::class, 'domainExpired']);
Route::get('/doneProjek', [NotificationController::class, 'doneProjek']);
Route::get('/doneDay/{day}', [NotificationController::class, 'doneDay']);

//Route::get('/notification', [NotifController::class, 'index']);



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

    Route::prefix('domain')->group(function () {
        Route::get('/', [DomainController::class, 'index']);
        Route::get('/delete/{id}', [DomainController::class, 'delete']);
        Route::get('/create', [DomainController::class, 'create']);
        Route::post('/store', [DomainController::class, 'store']);
        Route::post('/update', [DomainController::class, 'update']);
        Route::get('/edit/{id}', [DomainController::class, 'edit']);
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::post('/store', [UserController::class, 'store'])->name('store');
    });

    Route::group([
        'prefix' => 'testimoni',
        'as' => 'testimoni.',
    ], function () {
        Route::get('/', [TestimoniController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [TestimoniController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [TestimoniController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [TestimoniController::class, 'delete'])->name('delete');
    });

    Route::group([
        'prefix' => 'order',
        'as' => 'order.',
    ], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::put('/update/{id}', [OrderController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'price',
        'as' => 'price.',
    ], function () {
        Route::get('/', [PriceController::class, 'index'])->name('index');
        Route::get('/create', [PriceController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [PriceController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [PriceController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PriceController::class, 'delete'])->name('delete');
        Route::post('/store', [PriceController::class, 'store'])->name('store');
    });

    Route::group([
        'prefix' => 'progress',
        'as' => 'progress.',
    ], function () {
        Route::get('/active', [ProjectController::class, 'active'])->name('active');
        Route::get('/waiting', [ProjectController::class, 'waiting'])->name('waiting');
        Route::get('/onProgress', [ProjectController::class, 'onProgress'])->name('onProgress');
        Route::get('/failed', [ProjectController::class, 'failed'])->name('failed');
        Route::get('/finish', [ProjectController::class, 'finish'])->name('finish');

        Route::get('/', [ProgressController::class, 'index'])->name('index');
        Route::get('/create', [ProgressController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [ProgressController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [ProgressController::class, 'update'])->name('update');
        Route::post('/store', [ProgressController::class, 'store'])->name('store');
    });

    Route::group([
        'prefix' => 'bill',
        'as' => 'bill.',
    ], function () {
        Route::get('/', [BillController::class, 'index'])->name('index');
        Route::get('/create', [BillController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [BillController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BillController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'subscribe',
        'as' => 'subscribe.',
    ], function () {
        Route::get('/', [SubscribeController::class, 'index']);
    });
});
