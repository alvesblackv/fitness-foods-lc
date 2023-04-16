<?php

use App\Http\Controllers\ApiStatus\ShowApiStatusController;
use App\Http\Controllers\Product\DeleteProductController;
use App\Http\Controllers\Product\ShowProductController;
use App\Http\Controllers\Product\ShowProductsController;
use App\Http\Controllers\Product\UpdateProductController;
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

Route::get('/', ShowApiStatusController::class);

Route::prefix('/products')->group(fn() => [
    Route::put('/{code}', UpdateProductController::class),
    Route::delete('/{code}', DeleteProductController::class),
    Route::get('/{code}', ShowProductController::class),
    Route::get('/', ShowProductsController::class)
]);
