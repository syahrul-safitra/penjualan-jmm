<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartClothingController;
use App\Http\Controllers\CartProductController;
use App\Http\Controllers\ClothingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderClothingController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('User.index');
});

Route::get('/dashboard', function() {
    return view('Admin.Layouts.main');
});

Route::resource('/clothes', ClothingController::class);

Route::resource('/product', ProductController::class);

Route::get('/order/{order}/edit', [OrderClothingController::class, 'edit']);

Route::get('/order-product/{order}/edit', [OrderProductController::class, 'edit']);

Route::get('/order-pakaian', [OrderClothingController::class, 'index']);

Route::get('/test', function() {
    return view("Admin.Layouts.main");
});

Route::get('/test', function() {
    return view('welcome');
});

Route::post('register', [CustomerController::class, 'store']);

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/test1', function() {
    return Auth::guard('customer')->check();
});

Route::get('/test2', function () {
    return Auth::guard('admin')->check();
});

Route::get('/pakaian', [ClothingController::class, 'pakaian']);

Route::get('/test', function(){
    return view('User.addCartPakaian');
});

Route::get('/x', function() {
    return "JFJJF";
});

// User : 
Route::get('/clothes/{clothes}/{customer}', [CartClothingController::class, 'create']);

Route::post('/storeCartClothes', [CartClothingController::class, 'store']);

Route::get('/keranjang/{customer}', [CartClothingController::class, 'index']);

Route::post('cart-destroy/{cart}', [CartClothingController::class, 'destroy']);

Route::get('/order-clothes/{cart}/{customer}', [OrderClothingController::class, 'create']);

Route::post('/store-order-clothing', [OrderClothingController::class, 'store']);

Route::get('/history/{customer}', [CustomerController::class, 'history']);

Route::get('/detail-order-cloth/{order}', [OrderClothingController::class, 'detailOrder']);

Route::get('/produk', [ProductController::class, 'produk']);

Route::get('/produk/{product}/{customer}', [CartProductController::class, 'create']);

Route::post('/storeCartProduk', [CartProductController::class, 'store']);

Route::post('/cart-product-destroy/{cart}', [CartProductController::class, 'destroy']);

Route::get('/order-produk/{cart}/{customer}', [OrderProductController::class, 'create']);

Route::post('store-order-prodcut', [OrderProductController::class, 'store']);

Route::get('/detail-order-product/{order}', [OrderProductController::class, 'detailOrder']);


// Admin : 
Route::post('/set-status-cloth/{order}', [OrderClothingController::class, 'setStatus']);
Route::get('/order-product', [OrderProductController::class, 'index']);

Route::post('/set-status-product/{order}', [OrderProductController::class, 'setStatus']);

Route::post('/order-cloth/{order}', [OrderClothingController::class, 'destroy']);
Route::post('/order-product/{order}', [OrderProductController::class, 'destroy']);

Route::get('customers', [CustomerController::class, 'index']);
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit']);
Route::post('/customer/{customer}', [CustomerController::class, 'update']);
Route::post('/customer-destroy/{customer}', [CustomerController::class, 'destroy']);

Route::get('/set-admin/{admin}', [AdminController::class, 'edit']);