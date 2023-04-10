<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Admin\CouponController;

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
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);
Route::get('product-list', [FrontendController::class, 'productlistAjax']);
Route::post('searchproduct', [FrontendController::class, 'searchProduct']);
Route::get('shop', [FrontendController::class, 'shop']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);
Route::get('load-cart-data', [CartController::class, 'cartcount']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);
Route::get('load-wishlist-count', [   WishlistController::class, 'wishlistcount']);
Route::post('apply-coupon', [CartController::class, 'applyCoupon']);

Route::middleware(['auth'])->group(function (){
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);
    Route::post('proceed-to-pay', [CheckoutController::class, 'zalopaycheck']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);

    Route::get('wishlist', [WishlistController::class, 'index']);

});


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

    Route::get('coupons', [CouponController::class, 'index']);
    Route::get('add-coupons',[CouponController::class, 'add']);
    Route::post('insert-coupons',[CouponController::class, 'insert']);
    Route::get('edit-coupons/{id}', [CouponController::class, 'edit']);
    Route::put('update-coupons/{id}', [CouponController::class, 'update']);
    Route::get('delete-coupons/{id}', [CouponController::class, 'delete']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder' ]);
    Route::get('order-history', [OrderController::class, 'orderhistory']);

    Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);
    Route::get('users', [DashboardController::class, 'users']);
});


