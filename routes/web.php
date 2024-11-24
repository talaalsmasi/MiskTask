<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\HomeController;
use App\Models\Role;


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





Route::get('/BuyerRegister', function () {
    return view('register.register');
})->name('Buyerregister');

Route::get('/SellerRegister', function () {
    return view('register.SellerRegister');
})->name('Sellerregister');


Route::get('/showlogin', function () {
    return view('register.login');
})->name('ShowLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/BRegister', [AuthController::class, 'BuyerRegister'])->name('BuyerRegister');
Route::post('/SRegister', [AuthController::class, 'SellerRegister'])->name('SellerRegister');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::post('/wishlist/{productId}', [HomeController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/productDetail/{id}', [HomeController::class, 'showProductDetails'])->name('product.details');



Route::post('/product/{id}/bid', [BidController::class, 'placeBid'])->name('product.placeBid');
Route::get('/products', [BidController::class, 'showAllProducts'])->name('products.index');





