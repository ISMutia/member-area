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

Route::get('/userList', [UserController::class, 'index']);
Route::post('/userAdd', [UserController::class, 'create']);
Route::put('/userUpdate/{id}', [UserController::class, 'update']);
Route::delete('/userDelete/{id}', [UserController::class, 'delete']);
Route::post('/userLogin', [UserController::class, 'login']);
Route::post('/userRegister', [UserController::class, 'register']);
Route::post('/userUpdatePhoto/{id}', [UserController::class, 'updatePhoto']);

Route::get('/testimoniList', [TestimoniController::class, 'index']);
Route::post('/testimoniAdd', [TestimoniController::class, 'create']);

Route::get('/domainList', [DomainController::class, 'index']);
Route::post('/domainAdd', [DomainController::class, 'create']);
Route::put('/domainUpdate/{id}', [DomainController::class, 'update']);
Route::delete('/domainDelete/{id}', [DomainController::class, 'delete']);

Route::get('/orderList', [OrderController::class, 'index']);
Route::get('/orderGetForm', [OrderController::class, 'getForm']);
Route::get('/orderRiwayat/{id}', [OrderController::class, 'riwayat']);
Route::post('/orderAdd', [OrderController::class, 'create']);
Route::put('/orderUpdate/{id}', [OrderController::class, 'update']);
Route::delete('/orderDelete/{id}', [OrderController::class, 'delete']);
Route::get('/orderList/{id}', [OrderController::class, 'getByUserId']);



Route::get('/priceList', [PriceController::class, 'index']);
Route::post('/priceAdd', [PriceController::class, 'create']);
Route::put('/priceUpdate/{id}', [PriceController::class, 'update']);
Route::delete('/priceDelete/{id}', [PriceController::class, 'delete']);

Route::get('/progressList', [ProgressController::class, 'index']);
Route::post('/progressAdd', [ProgressController::class, 'create']);
Route::put('/progressUpdate/{id}', [ProgressController::class, 'update']);
Route::delete('/progressDelete/{id}', [ProgressController::class, 'delete']);
Route::get('/progressList/{id}', [ProgressController::class, 'getByUserId']);

Route::get('/statusList', [StatusController::class, 'index']);
Route::post('/statusAdd', [StatusController::class, 'create']);
Route::put('/statusUpdate/{id}', [StatusController::class, 'update']);
Route::delete('/statusDelete/{id}', [StatusController::class, 'delete']);

Route::get('/billList', [BillController::class, 'index']);
Route::post('/billAdd', [BillController::class, 'create']);
Route::put('/billUpdate/{id}', [BillController::class, 'update']);
Route::delete('/billDelete/{id}', [BillController::class, 'delete']);
Route::get('/billList/{id}', [BillController::class, 'getByUserId']);
Route::get('/billDetail/{id}', [BillController::class, 'getBill']);
Route::post('/uploadPayment/{id}', [BillController::class, 'uploadPayment']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});
