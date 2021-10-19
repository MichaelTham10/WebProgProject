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

Route::get('/', [App\Http\Controllers\KeyboardController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//keyboard
Route::get('/add-keyboard', [App\Http\Controllers\KeyboardController::class, 'add'])->name('add-keyboard');
Route::get('/keyboards/{id}',  [App\Http\Controllers\KeyboardController::class, 'index'])->name('keyboards');
Route::get('/update/keyboard/{id}', [App\Http\Controllers\KeyboardController::class, 'update'])->name('update-page');

Route::post('/store-keyboard', [App\Http\Controllers\KeyboardController::class, 'store'])->name('store-keyboard');
Route::patch('/update/edit/{id}', [App\Http\Controllers\KeyboardController::class, 'edit'])->name('update-keyboard');
Route::delete('/delete/keyboard/{id}', [App\Http\Controllers\KeyboardController::class, 'delete'])->name('delete-keyboard');

//category
Route::get('/manage-category', [App\Http\Controllers\KeyboardCategoryController::class, 'index'])->name('manage-category');
Route::get('/update/category/{id}', [App\Http\Controllers\KeyboardCategoryController::class, 'update'])->name('update-category-page');

Route::patch('/update/category-edit/{id}', [App\Http\Controllers\KeyboardCategoryController::class, 'edit'])->name('update-category');
Route::delete('/delete/category/{id}', [App\Http\Controllers\KeyboardCategoryController::class, 'delete'])->name('delete-category');