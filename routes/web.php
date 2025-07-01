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
use App\Models\Customer;
use App\Models\OrderClothing;
use App\Models\OrderProduct;
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
   
    if (Auth::guard('admin')->check()) {
        return redirect('/dashboard');
    }

    return view('User.index');
});

Route::get('/dashboard', function() {
    return view('Admin.dashboard', [
        'penjualanPakaianBulanIni' => OrderClothing::orderBulanIni(), 
        'pendapatanPakaianBulanIni' => OrderClothing::pendapatanBulanIni()->get()->sum('total_harga'), 
        'penjualanProductBulanIni' =>  OrderProduct::orderBulanIni(),
        'pendapatanProductBulanIni' =>  OrderProduct::pendapatanBulanIni()->get()->sum('total_harga'),
        'jumlahPengguna' => Customer::all()->count()
    ]);
})->middleware('isAdmin');

Route::resource('/clothes', ClothingController::class)->middleware('isAdmin');

Route::resource('/product', ProductController::class)->middleware('isAdmin');

Route::get('/order/{order}/edit', [OrderClothingController::class, 'edit'])->middleware('isAdmin');

Route::get('/order-product/{order}/edit', [OrderProductController::class, 'edit'])->middleware('isCustomer');

Route::get('/order-pakaian', [OrderClothingController::class, 'index'])->middleware('isAdmin');

// Route::get('/test', function() {
//     return view("Admin.Layouts.main");
// });

Route::get('/register', function() {
    
    if (Auth::guard('admin')->check()) {
        return redirect('/dashboard');
    }

    if (Auth::guard('customer')->check()) {
        return redirect('/');
    }
    
    return view('Auth.register');
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

Route::get('/pakaian', [ClothingController::class, 'pakaian'])->middleware('isCustomer');

// Route::get('/test', function(){
//     return view('User.addCartPakaian');
// });

// Route::get('/x', function() {
//     return "JFJJF";
// });

// User : 
Route::get('/clothes/{clothes}/{customer}', [CartClothingController::class, 'create'])->middleware('isCustomer');

Route::post('/storeCartClothes', [CartClothingController::class, 'store'])->middleware('isCustomer');

Route::get('/keranjang/{customer}', [CartClothingController::class, 'index'])->middleware('isCustomer');

Route::post('cart-destroy/{cart}', [CartClothingController::class, 'destroy'])->middleware('isCustomer');

Route::get('/order-clothes/{cart}/{customer}', [OrderClothingController::class, 'create'])->middleware('isCustomer');

Route::post('/store-order-clothing', [OrderClothingController::class, 'store'])->middleware('isCustomer');

Route::get('/history/{customer}', [CustomerController::class, 'history'])->middleware('isCustomer');

Route::get('/detail-order-cloth/{order}', [OrderClothingController::class, 'detailOrder'])->middleware('isCustomer');

Route::get('/produk', [ProductController::class, 'produk'])->middleware('isCustomer');

Route::get('/produk/{product}/{customer}', [CartProductController::class, 'create'])->middleware('isCustomer');

Route::post('/storeCartProduk', [CartProductController::class, 'store'])->middleware('isCustomer');

Route::post('/cart-product-destroy/{cart}', [CartProductController::class, 'destroy'])->middleware('isCustomer');

Route::get('/order-produk/{cart}/{customer}', [OrderProductController::class, 'create'])->middleware('isCustomer');

Route::post('store-order-prodcut', [OrderProductController::class, 'store'])->middleware('isCustomer');

Route::get('/detail-order-product/{order}', [OrderProductController::class, 'detailOrder'])->middleware('isCustomer');


// Admin : 
Route::post('/set-status-cloth/{order}', [OrderClothingController::class, 'setStatus'])->middleware('isAdmin');
Route::get('/order-product', [OrderProductController::class, 'index'])->middleware('isAdmin');

Route::post('/set-status-product/{order}', [OrderProductController::class, 'setStatus'])->middleware('isAdmin');

Route::post('/order-cloth/{order}', [OrderClothingController::class, 'destroy'])->middleware('isAdmin');
Route::post('/order-product/{order}', [OrderProductController::class, 'destroy'])->middleware('isAdmin');

Route::get('customers', [CustomerController::class, 'index'])->middleware('isAdmin');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->middleware('isAdmin');
Route::post('/customer/{customer}', [CustomerController::class, 'update'])->middleware('isAdmin');
Route::post('/customer-destroy/{customer}', [CustomerController::class, 'destroy'])->middleware('isAdmin');

Route::get('/set-admin/{admin}', [AdminController::class, 'edit'])->middleware('isAdmin');

Route::post('/set-admin/{admin}', [AdminController::class, 'update'])->middleware('isAdmin');

Route::post("/cetak-order-pakaian", [OrderClothingController::class, 'cetak'])->middleware('isAdmin');
Route::post("/cetak-order-product", [OrderProductController::class, 'cetak'])->middleware('isAdmin');