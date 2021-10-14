<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\KeyboardController::class, 'welcome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//keyboard
Route::get('/add-keyboard', [App\Http\Controllers\KeyboardController::class, 'add'])->name('add-keyboard');
Route::post('/store-keyboard', [App\Http\Controllers\KeyboardController::class, 'store'])->name('store-keyboard');

//category
Route::get('/manage-category', [App\Http\Controllers\KeyboardCategoryController::class, 'index'])->name('manage-category');
