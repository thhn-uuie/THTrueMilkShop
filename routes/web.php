<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;

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
// localhost/project
Route::get('/', function () {
    return view('frontend.index');
})->name('template');

// Register
// localhost/project/signup
Route::get('/signup', [AuthController::class, 'signup'])->name('frontend.auth.signup');
Route::post('/signup', [AuthController::class, 'postSignup']);

// Login
// localhost/project/login
Route::get('/login', [AuthController::class, 'login'])->name('frontend.auth.login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::post('/verify', [AuthController::class, 'verify'])->name('verify');
//Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('frontend.auth.logout');

Route::get('/cau-chuyen-that-th', [SiteController::class, 'story'])->name('cau_chuyen_that_th');

Route::get('/san-pham', [SiteController::class, 'product'])->name('san_pham');
Route::get('/detail', [SiteController::class, 'show'])->name('detail');
Route::get('/khuyen-mai', [SiteController::class, 'promotion'])->name('khuyen_mai');

Route::get('/truyen-thong', [SiteController::class, 'media'])->name('truyen_thong');
//Route::get('/thanh-toan', [SiteController::class, 'checkout'])->name('thanh_toan')->middleware('customer');
Route::post('/gio-hang/them', [CartController::class, 'addToCart'])->name('cart.add')->middleware('customer');
Route::get('/gio-hang', [SiteController::class, 'viewCart'])->name('gio_hang')->middleware('customer');
Route::match(['GET', 'POST'],'/gio-hang/xoa/{id}', [CartController::class, 'delete'])->name('cart.delete')->middleware('customer');
Route::match(['GET', 'POST'],'/thong-tin', [CustomerController::class, 'showProfile'])->name('user.user_account')->middleware('customer');
Route::match(['GET', 'POST'],'/thong-tin/cap-nhat', [CustomerController::class, 'update'])->name('user.user_account_update')->middleware('customer');
Route::get( 'san-pham/chi-tiet/{id}', [CustomerController::class, 'detail'])->name('chi-tiet');
Route::post('/quen-mat-khau', [AuthController::class, 'forget_password'])->name('fpassword');
Route::get('/quen-mat-khau', [AuthController::class, 'forget_password'])->name('fpassword');
Route::get('/doi_mat_khau', [UserController::class, 'update_password'])->middleware('auth')->name('user.changepass');
Route::post('/doi_mat_khau', [UserController::class, 'update_password'])->middleware('auth')->name('user.changepass');


// Backend

// localhost/project/admin

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'postLogin']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Dashboard
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');

// Category
Route::prefix('admin/category')->middleware('admin')->name('admin.category.')->group(function () {

    // Category: localhost/project/admin/category
    Route::get('/', [CategoryController::class, 'index'])->name('categories');

    // Thêm mới category:   localhost/project/admin/category/create
    Route::match(['GET', 'POST'],'/create', [CategoryController::class, 'store'])->name('create-category');

    // Xem chi tiết: localhost/project/admin/category/detail/{id}
    Route::match(['GET', 'POST'],'/detail/{id}', [CategoryController::class, 'show'])->name('category-detail');

    Route::match(['GET', 'POST'],'/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');

    // Update category:  localhost/project/admin/category/update/{id}
    Route::match(['GET', 'POST'],'/update/{id}', [CategoryController::class, 'update'])->name('category-update');

});


// Product
Route::prefix('admin/product')->middleware('admin')->name('admin.product.')->group(function () {

    // Product: localhost/project/admin/product
    Route::get('/', [ProductController::class, 'index'])->name('products');

    // Tạo: localhost/project/admin/product/create
    Route::match(['GET', 'POST'],'/create', [ProductController::class, 'store'])->name('create-product');

    // Xem: localhost/project/admin/product/detail/{id}
    Route::match(['GET', 'POST'],'/detail/{id}', [ProductController::class, 'show'])->name('product-detail');

    Route::match(['GET', 'POST'],'/delete/{id}', [ProductController::class, 'destroy'])->name('delete');

    // Update: localhost/project/admin/product/update/{id}
    Route::match(['GET', 'POST'],'/update/{id}', [ProductController::class, 'update'])->name('product-update');

});
Route::post('/deleteimage/{id}',[ProductController::class,'deleteimage'])->name('deleteimage');
Route::post('/upload-image',[ProductController::class,'uploadImage'])->name('uploadimage');


Route::post('/update-status', [OrderController::class, 'updateStatus'])->name('update-status');

// User
Route::prefix('admin/user')->middleware('admin')->name('admin.user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::match(['GET', 'POST'],'/create', [UserController::class, 'store'])->name('create-user');
    Route::match(['GET', 'POST'],'/detail/{id}', [UserController::class, 'show'])->name('user-detail');
    Route::match(['GET', 'POST'],'/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::match(['GET', 'POST'],'/update/{id}', [UserController::class, 'update'])->name('user-update');

});

// Profile
Route::prefix('admin/profile')->middleware('admin')->name('admin.profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profiles');
    Route::match(['GET', 'POST'],'/detail/{id}', [ProfileController::class, 'show'])->name('profile-detail');
    Route::match(['GET', 'POST'],'/delete/{id}', [ProfileController::class, 'destroy'])->name('delete');

});


// Order
Route::prefix('admin/order')->middleware('admin')->name('admin.order.')->group(function () {
    Route::get('/', [OrderController::class, 'index_admin'])->name('orders');
    Route::match(['GET', 'POST'],'/detail/{id}', [OrderController::class, 'show'])->name('detail');
    Route::match(['GET', 'POST'],'/delete/{id}', [OrderController::class, 'destroy'])->name('delete');
    Route::match(['GET', 'POST'],'/update/{id}', [OrderController::class, 'update'])->name('update');
});

Route::prefix('user/order')->middleware('auth')->name('user.order.')->group(function () {
    Route::get('/', [OrderController::class, 'index_user'])->name('orders');
    Route::match(['GET', 'POST'],'/detail/{id}', [OrderController::class, 'show'])->name('detail');
    Route::match(['GET', 'POST'],'/delete/{id}', [OrderController::class, 'destroy'])->name('delete');
    Route::match(['GET', 'POST'],'/create', [OrderController::class, 'store'])->name('create');
});




