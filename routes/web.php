<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\WorkController;


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
Route::group(['middleware' => ['auth', 'role:admin,manajer,marketing,produksi,member,inventory']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/add_product_view', [ProductController::class, 'add_product_view'])->name('product');
    Route::post('/add_product', [ProductController::class, 'add_product'])->name('product');
    Route::get('/edit_product_view/{id}', [ProductController::class, 'edit_product_view'])->name('product');
    Route::post('/edit_product_save', [ProductController::class, 'edit_product_save'])->name('product');
    Route::get('/delete_product/{id}', [ProductController::class, 'delete_product'])->name('product');
    // Project
    Route::get('/project', [ProjectController::class, 'index'])->name('project');
    Route::get('/add_project_view', [ProjectController::class, 'add_project_view'])->name('project');
    Route::post('/add_project', [ProjectController::class, 'add_project'])->name('project');
    Route::get('/edit_project_view/{id}', [ProjectController::class, 'edit_project_view'])->name('project');
    Route::post('/edit_project_save', [ProjectController::class, 'edit_project_save'])->name('project');
    Route::get('/delete_project/{id}', [ProjectController::class, 'delete_project'])->name('project');
    //News
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/add_news_view', [NewsController::class, 'add_news_view'])->name('news');
    Route::post('/add_news', [NewsController::class, 'add_news'])->name('news');
    Route::get('/edit_news_view/{id}', [NewsController::class, 'edit_news_view'])->name('news');
    Route::post('/edit_news_save', [NewsController::class, 'edit_news_save'])->name('news');
    Route::get('/delete_news/{id}', [NewsController::class, 'delete_news'])->name('news');
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



// --------------------------------------------------PRIVATE ROUTES--------------------------------------------
// Admin, Manajer
Route::group(['middleware' => ['auth', 'role:admin,manajer']], function () {
    //User
    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
    Route::get('/add_user_view', [UserController::class, 'add_user_view'])->name('pengguna');
    Route::post('/add_user', [UserController::class, 'add_user'])->name('pengguna');
    Route::get('/edit_user_view/{id}', [UserController::class, 'edit_user_view'])->name('pengguna');
    Route::post('/edit_user_save', [UserController::class, 'edit_user_save'])->name('pengguna');
});

// Admin, Manajer, Marketing
Route::group(['middleware' => ['auth', 'role:admin,manajer,marketing']], function () {
    // Order
    Route::get('/pesanan', [OrderController::class, 'index'])->name('pesanan');
    Route::get('/detail_pesanan/{id}', [OrderController::class, 'detail_pesanan'])->name('pesanan');
    Route::post('/konfirmasi_pesanan/{id}', [OrderController::class, 'konfirmasi_pesanan'])->name('pesanan');
});
// Admin, Manajer, Produksi
Route::group(['middleware' => ['auth', 'role:admin,manajer,produksi']], function () {
    // Order
    Route::get('/work', [WorkController::class, 'index'])->name('work');
    Route::post('/start_work', [WorkController::class, 'start_work'])->name('work');
});
