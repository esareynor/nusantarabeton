<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkOrderController;

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
// Auth Public
Auth::routes();
Route::get('/', [PublicController::class, 'index'])->name('index');

// Product Public
Route::get('/fetch_product_1', [PublicController::class, 'fetch_product_1'])->name('fetch_product_1');
Route::get('/fetch_product_2', [PublicController::class, 'fetch_product_2'])->name('fetch_product_2');
Route::get('/fetch_product_3', [PublicController::class, 'fetch_product_3'])->name('fetch_product_3');
Route::get('/shop', [PublicController::class, 'shop_product'])->name('shop_product');

// Order POST Public
Route::post('/order', [OrderController::class, 'add_order'])->name('add_order');

// Admin, Marketing, Manajer, Inventory, Produksi
Route::group(['middleware' => ['auth', 'role:admin,manajer,marketing,inventory,produksi']], function () {
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
});

// Admin, Manajer
Route::group(['middleware' => ['auth', 'role:admin,manajer']], function () {
    //User
    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
    Route::post('/add_user', [UserController::class, 'add_user'])->name('add_user');
});

// Admin, Manajer, Marketing
Route::group(['middleware' => ['auth', 'role:admin,manajer,marketing']], function () {
    // Order
    Route::get('/pesanan', [OrderController::class, 'index'])->name('pesanan');
    Route::get('/detail_pesanan/{id}', [OrderController::class, 'detail_pesanan'])->name('pesanan');
    Route::post('/konfirmasi_pesanan/{id}', [OrderController::class, 'konfirmasi_pesanan'])->name('pesanan');
});

// Admin, Manajer, Marketing, Produksi
Route::group(['middleware' => ['auth', 'role:admin,manajer,marketing,produksi']], function () {
    // Work Order
    Route::get('/workorder', [WorkOrderController::class, 'index'])->name('workorder');
    Route::get('/add_workorder_view', [WorkOrderController::class, 'add_workorder_view'])->name('workorder');
    Route::post('/add_workorder', [WorkOrderController::class, 'add_workorder'])->name('workorder');
    Route::get('/detail_workorder_view/{id}', [WorkOrderController::class, 'detail_workorder_view'])->name('workorder');
    Route::get('/detail_workorder_view_2/{id}', [WorkOrderController::class, 'detail_workorder_view_2'])->name('workorder');
});












// Admin
// Route::group(['middleware' => ['auth', 'role:admin']], function () {
//     //User
//     Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
//     Route::post('/add_user', [UserController::class, 'add_user'])->name('add_user');
// });
