<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/dashboard/admin/category',[CategoryController::class,'index'])->name('all.category');
    Route::post('/dashboard/admin/category/add',[CategoryController::class,'Add'])->name('store.category');
    Route::get('/dashboard/admin/category/edit/{id}',[CategoryController::class,'Edit'])->name('edit.category');
    Route::post('/dashboard/admin/category/update/{id}',[CategoryController::class,'Update'])->name('update.category');
    Route::delete('/dashboard/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('delete.category');
    Route::get('/dashboard/admin/product', [ProductController::class, 'index'])->name('all.product');
    Route::get('/dashboard/admin/product/add', [ProductController::class,'add'])->name('product.add');
    Route::post('/dashboard/admin/product/store', [ProductController::class,'store'])->name('store.product');
    Route::post('/dashboard/admin/product/delete', [ProductController::class,'destroy'])->name('delete.product');
    Route::delete('/dashboard/admin/product/delete/{id}', [ProductController::class,'destroy'])->name('delete.product');
    Route::get('/dashboard/admin/product/edit/{id}', [ProductController::class,'edit'])->name('edit.product');
    Route::post('/dashboard/admin/product/update/{id}', [ProductController::class,'update'])->name('update.product');
});
