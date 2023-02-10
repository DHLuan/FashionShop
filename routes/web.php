<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])-> group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index']);

    Route::get('categories',[App\Http\Controllers\Admin\CategoryController::class, 'index']);
    route::get('add-category',[App\Http\Controllers\Admin\CategoryController::class, 'add']);
    route::post('insert-category',[App\Http\Controllers\Admin\CategoryController::class, 'insert']);
    Route::get('edit-prod/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'delete']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products',[ProductController::class, 'add']);
    Route::post('insert-products',[ProductController::class, 'insert']);
    Route::get('edit-products/{id}', [ProductController::class, 'edit']);
    Route::put('update-products/{id}', [ProductController::class, 'update']);
    Route::get('delete-products/{id}', [ProductController::class, 'delete']);
});


