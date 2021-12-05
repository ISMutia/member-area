<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\DomainController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\ProgressController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\TestimoniController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', [UserController::class, 'index']);



Route::get('/testimoni', [TestimoniController::class, 'index']);



Route::get('/domain', [DomainController::class, 'index']);



Route::get('/order', [OrderController::class, 'index']);



Route::get('/price', [PriceController::class, 'index']);



Route::get('/progress', [ProgressController::class, 'index']);



Route::get('/statusList', [StatusController::class, 'index']);
Route::post('/statusAdd', [StatusController::class, 'create']);



Route::get('/bill', [BillController::class, 'index']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});
