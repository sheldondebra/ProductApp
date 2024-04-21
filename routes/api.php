<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/allvendors', [VendorController::class, 'index']);
Route::post('/vendors', [VendorController::class, 'store']);
Route::get('/vendor/{id}', [VendorController::class, 'show']);
Route::put('/edit-vendor/{id}', [VendorController::class, 'update']);
Route::delete('/vendor/{id}', [VendorController::class, 'destroy']);


Route::get('/products', [ProductController::class, 'index']);
Route::post('/addproducts', [ProductController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/del-product/{id}', [ProductController::class, 'destroy']);


Route::get('/products/{id}/vendor', [ProductController::class, 'findProductAndVendor']);
Route::get('/vendors/{id}/products', [ProductController::class, 'findProductsByVendor']);


