<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\PromotController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/promotion', [PromotController::class, 'index'])->name('promotion');
Route::get('/product', [ProductController::class, 'index'])->name('product');

//API
Route::get('/api/brands/{id}/products', [BrandController::class, 'getProducts']);
Route::get('/products-by-brand/{id}', [HomeController::class, 'fetchProductsByBrand']);
