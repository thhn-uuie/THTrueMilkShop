<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

// Frontend
Route::get('/', function () {
    return view('frontend.index');
});

    // Register
Route::get('/signup', [UserController::class, 'signup'])->name('frontend.auth.signup');
Route::post('/signup', [UserController::class, 'postSignup']);

    // Login
Route::get('/login', [UserController::class, 'login'])->name('frontend.auth.login');
Route::post('/login', [UserController::class, 'postLogin']);



// Backend
Route::get('/admin', function () {
    return view('admin.dashboard');
});

    // Category
Route::prefix('admin/category')->name('admin.category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::match(['GET', 'POST'],'/create', [CategoryController::class, 'store'])->name('create-category');
    Route::match(['GET', 'POST'],'/detail/{id}', [CategoryController::class, 'show'])->name('category-detail');
//    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    Route::match(['GET', 'POST'],'/update/{id}', [CategoryController::class, 'update'])->name('category-update');

});

    // User
Route::prefix('user')->name('admin.user.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('users');
//    Route::match(['GET', 'POST'],'/create', [CategoryController::class, 'store'])->name('create');
//    Route::match(['GET', 'POST'],'/detail/{id}', [CategoryController::class, 'show'])->name('detail');
//    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
//    Route::match(['GET', 'POST'],'/update/{id}', [CategoryController::class, 'update'])->name('update');

});

    // Product
Route::prefix('admin/product')->name('admin.product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::match(['GET', 'POST'],'/create', [ProductController::class, 'store'])->name('create-product');
    Route::match(['GET', 'POST'],'/detail/{id}', [ProductController::class, 'show'])->name('product-detail');
//    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
//    Route::match(['GET', 'POST'],'/update/{id}', [CategoryController::class, 'update'])->name('update');

});

Route::prefix('order')->name('admin.order.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('orders');
//    Route::match(['GET', 'POST'],'/create', [CategoryController::class, 'store'])->name('create');
//    Route::match(['GET', 'POST'],'/detail/{id}', [CategoryController::class, 'show'])->name('detail');
//    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
//    Route::match(['GET', 'POST'],'/update/{id}', [CategoryController::class, 'update'])->name('update');

});


