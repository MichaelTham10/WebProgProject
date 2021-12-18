<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardCategoryController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Auth::routes();

// Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.view');
});
Route::get('/add-keyboard', [KeyboardController::class, 'add'])->name('add-keyboard')->middleware('admin');
Route::post('/store-keyboard', [KeyboardController::class, 'store'])->name('store-keyboard')->middleware('admin');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/home', [UserController::class, 'index']);
});

Route::get('/keyboards/{id}',  [KeyboardController::class, 'index'])->name('keyboards');

//search
Route::get('/keyboards/search/{id}',  [KeyboardController::class, 'search'])->name('keyboards-search');

Route::get('/update/keyboard/{id}', [KeyboardController::class, 'update'])->name('update-page');


Route::patch('/update/edit/{id}', [KeyboardController::class, 'edit'])->name('update-keyboard');
Route::delete('/delete/keyboard/{id}', [KeyboardController::class, 'delete'])->name('delete-keyboard');

//category
Route::get('/manage-category', [KeyboardCategoryController::class, 'index'])->name('manage-category');
Route::get('/update/category/{id}', [KeyboardCategoryController::class, 'update'])->name('update-category-page');

Route::patch('/update/category-edit/{id}', [KeyboardCategoryController::class, 'edit'])->name('update-category');
Route::delete('/delete/category/{id}', [KeyboardCategoryController::class, 'delete'])->name('delete-category');

// keyboard detail

Route::get('/detail/keyboards/{id}', [KeyboardController::class, 'detail'])->name('keyboard-detail');


// Cart

Route::get('/carts', [CartController::class, 'index'])->name('cart');
Route::post('/cart/{user_id}/{keyboard_id}', [CartController::class, 'store'])->name('store-cart');


// Checkout
Route::get('/history', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
Route::get('/order/detail/{id}', [OrderController::class, 'detail']);
