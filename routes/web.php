<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Public
Auth::routes();

Route::get('/', [PublicController::class, 'index'])->name('index');
// Product
Route::get('/fetch_product_1', [PublicController::class, 'fetch_product_1'])->name('fetch_product_1');
Route::get('/fetch_product_2', [PublicController::class, 'fetch_product_2'])->name('fetch_product_2');
Route::get('/fetch_product_3', [PublicController::class, 'fetch_product_3'])->name('fetch_product_3');
Route::get('/shop', function () {
    return view('shop');
});

// Order Public
// Route::post('/orders', [OrderController::class, 'order'])->name('order');

// Rental Public
// Route::post('/rental', [HomeController::class, 'rental'])->name('rental');

// Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::post('/add_product', [ProductController::class, 'add_product'])->name('add_product');
    Route::get('/edit_product_view/{id}', [ProductController::class, 'edit_product_view'])->name('product');
    Route::post('/edit_product_save', [ProductController::class, 'edit_product_save'])->name('product');

    //Service
    Route::get('/service', function () {
        return view('admin/service');
    })->name('service');

    //Equipment
    Route::get('/equipment', function () {
        return view('admin/equipment');
    })->name('equipment');

    //Project
    Route::get('/project', function () {
        return view('admin/project');
    })->name('project');

    //News
    Route::get('/news', function () {
        return view('admin/news');
    })->name('news');

    //Pesanan
    Route::get('/pesanan', function () {
        return view('admin/pesanan');
    })->name('pesanan');

    //Penyewaan
    Route::get('/penyewaan', function () {
        return view('admin/penyewaan');
    })->name('penyewaan');
});

// Marketing
Route::group(['middleware' => ['auth', 'role:admin,marketing']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Produksi
Route::group(['middleware' => ['auth', 'role:admin,produksi']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Inventory
Route::group(['middleware' => ['auth', 'role:admin,inventory']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Management
Route::group(['middleware' => ['auth', 'role:admin,management']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Engineer
Route::group(['middleware' => ['auth', 'role:admin,engineer']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Member
Route::group(['middleware' => ['auth', 'role:admin,member']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
