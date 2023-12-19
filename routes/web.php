<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
Route::get('/products/create', [ProductController::class, 'createForm'])->name('createForm');
Route::get('/products', [ProductController::class, 'products'])->name('products');
Route::get('/products/update-product', [ProductController::class, 'updateView'])->name('updateView');
Route::get('/transaction-history', [ProductController::class, 'transactionHistory'])->name('transaction-history');

Route::post('/products/store', [ProductController::class, 'store'])->name('store');
//Route::post('/products/sell', [ProductController::class, 'sell'])->name('sell');
Route::post('/products/sell/{productId}', [ProductController::class, 'sellProduct']);

Route::put('/products/update-price/{productId}', [ProductController::class, 'updatePrice'])->name('updatePrice');
Route::put('/products/update-quantity/{productId}', [ProductController::class, 'updateQuantity'])->name('updateQuantity');

Route::delete('/products/delete/{productId}', [ProductController::class, 'deleteProduct']);
