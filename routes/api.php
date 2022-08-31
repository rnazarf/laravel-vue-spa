<?php

use App\Http\Controllers\API\V1\BankController;
use App\Http\Controllers\API\V1\BannerController;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\Api\V1\PaymentController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\SubcategoryController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\VoucherController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::post('/user', [UserController::class, 'store']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    Route::get('/subcategory', [SubcategoryController::class, 'index']);
    Route::post('/subcategory', [SubcategoryController::class, 'store']);
    Route::put('/subcategory/{id}', [SubcategoryController::class, 'update']);
    Route::delete('/subcategory/{id}', [SubcategoryController::class, 'destroy']);

    Route::get('/bank', [BankController::class, 'index']);
    Route::post('/bank', [BankController::class, 'store']);
    Route::put('/bank/{id}', [BankController::class, 'update']);
    Route::delete('/bank/{id}', [BankController::class, 'destroy']);

    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/payment', [PaymentController::class, 'store']);
    Route::put('/payment/{id}', [PaymentController::class, 'update']);
    Route::delete('/payment/{id}', [PaymentController::class, 'destroy']);

    Route::get('/voucher', [VoucherController::class, 'index']);
    Route::get('/voucher/{id}', [VoucherController::class, 'show']);
    Route::post('/voucher', [VoucherController::class, 'store']);
    Route::put('/voucher/{id}', [VoucherController::class, 'update']);
    Route::put('/voucher/{id}/status', [VoucherController::class, 'updateStatus']);
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy']);

    Route::get('/banner', [BannerController::class, 'index']);
    Route::get('/banner/{id}', [BannerController::class, 'show']);
    Route::post('/banner', [BannerController::class, 'store']);
    Route::put('/banner/{id}', [BannerController::class, 'update']);
    Route::put('/banner/{id}/status', [BannerController::class, 'updateStatus']);
    Route::delete('/banner/{id}', [BannerController::class, 'destroy']);

    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/{id}', [ProductController::class, 'show']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);
});
