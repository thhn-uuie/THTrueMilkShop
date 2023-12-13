<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

//Frontend
Route::get('/', function () {
    return view('frontend.index');
});

//Route::prefix('signup')->name('frontend.auth.signup.')->group(function () {
//    Route::get('/', [RegisterController::class, 'index'])->name('index');
//    Route::match(['GET', 'POST'],'/create', [RegisterController::class, 'store'])->name('create');
//    Route::match(['GET', 'POST'],'/detail/{id}', [CategoryController::class, 'show'])->name('detail');
//    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
//    Route::match(['GET', 'POST'],'/update/{id}', [CategoryController::class, 'update'])->name('update');
//
//});
Route::get('/signup', [RegisterController::class, 'index'])->name('frontend.auth.signup');
Route::post('/signup', [RegisterController::class, 'store'])->name('frontend.auth.signup');

Route::get('/login', [RegisterController::class, 'login'])->name('frontend.auth.login');
Route::post('/login', [RegisterController::class, 'loginPost'])->name('frontend.auth.login');






////Backend
//Route::get('/admin', function () {
//    return view('backend.index');
//});
//Route::prefix('category')->name('backend.category.')->group(function () {
//    Route::get('/', [CategoryController::class, 'index'])->name('index');
//    Route::match(['GET', 'POST'],'/create', [CategoryController::class, 'store'])->name('create');
//    Route::match(['GET', 'POST'],'/detail/{id}', [CategoryController::class, 'show'])->name('detail');
//    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
//    Route::match(['GET', 'POST'],'/update/{id}', [CategoryController::class, 'update'])->name('update');
//
//});
