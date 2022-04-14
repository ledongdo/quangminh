<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', [LoginController::class,'home'])->name('home');
Route::get('/login', [LoginController::class,'login'])->name('get-login');
Route::post('/login',[LoginController::class,'postLogin'])->name('post-login');
Route::get('/register',[LoginController::class,'register'])->name('get-register');
Route::post('/register',[LoginController::class,'postRegister'])->name('post-register');
Route::get('/logout',[LoginController::class,'logout'])->name('get-logout');
Route::prefix('category')->group(function () {
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('/update/{id}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');

});
Route::prefix('menu')->group(function () {
    Route::get('/',[MenuController::class,'index'])->name('menus.index');
    Route::get('/create',[MenuController::class,'create'])->name('menus.create');
    Route::post('/store',[MenuController::class,'store'])->name('menus.store');
    Route::get('/edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
    Route::post('/update/{id}',[MenuController::class,'update'])->name('menus.update');
    Route::get('/delete/{id}',[MenuController::class,'delete'])->name('menus.delete');
});
Route::prefix('product')->group(function () {
    Route::get('/',[ProductController::class,'index'])->name('products.index');
    Route::get('/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/store',[ProductController::class,'store'])->name('products.store');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/update/{id}',[ProductController::class,'update'])->name('products.update');
    Route::get('/delete/{id}',[ProductController::class,'delete'])->name('products.delete');
});
