<?php

use Domain\Product\Http\Controllers\DeleteProductController;
use Domain\Product\Http\Controllers\ShowProductController;
use Domain\Product\Http\Controllers\ShowProductsController;
use Domain\Product\Http\Controllers\UpdateProductController;
use Domain\System\Http\Controllers\ShowSystemInfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('api_key')->group(fn() => [
    Route::get('/', ShowSystemInfoController::class)->name('show-api-status'),

    Route::prefix('/products')->group(fn() => [
        Route::put('/{code}', UpdateProductController::class)->name('product-update'),
        Route::delete('/{code}', DeleteProductController::class)->name('product-delete'),
        Route::get('/{code}', ShowProductController::class)->name('product-show'),
        Route::get('/', ShowProductsController::class)->name('products-show')
    ])
]);

