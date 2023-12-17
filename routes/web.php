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

Route::get('/products/create', [ProductController::class, 'createForm'])->name('createForm');
Route::post('/products/store', [ProductController::class, 'store'])->name('store');
Route::post('/products/sell', [ProductController::class, 'sell'])->name('sell');
Route::post('/products/update-price', [ProductController::class, 'updatePrice'])->name('updatePrice');
Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
Route::get('/transaction-history', [ProductController::class, 'transactionHistory'])->name('transactionHistory');
