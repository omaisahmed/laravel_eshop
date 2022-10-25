<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;

// Website Routes
Route::get('/',[SiteController::class, 'index'])->name('site.index');
Route::get('/products',[SiteController::class, 'products'])->name('site.products');
Route::get('/products/{slug}',[SiteController::class, 'product_show'])->name('site.show');
Route::get('/product/{productdetail}',[SiteController::class, 'product_detail'])->name('site.productdetail');
Route::get('/categories',[SiteController::class, 'categories'])->name('site.categories');
Route::get('/categories-filter',[SiteController::class, 'categories_show'])->name('site.categories_show');
Route::get('/about',[SiteController::class, 'about'])->name('site.about');
Route::get('/contact',[SiteController::class, 'contact'])->name('site.contact');
Route::get('/privacy-policy',[SiteController::class, 'privacy_policy'])->name('site.privacy-policy');
Route::get('/terms-conditions',[SiteController::class, 'terms_conditions'])->name('site.terms-conditions');
Route::get('/cart/{slug}', [SiteController::class, 'cart'])->name('site.cart');
Route::get('add-to-cart/{id}', [SiteController::class, 'addToCart'])->name('site.addtocart');
Route::patch('update-cart', [SiteController::class, 'updateCart'])->name('site.updatecart');
Route::delete('remove-from-cart', [SiteController::class, 'removeCart'])->name('site.removecart');
Route::get('/checkout/{slug}',[SiteController::class, 'checkoutForm'])->name('site.checkoutform');
Route::post('checkout/submit',[SiteController::class, 'checkout'])->name('site.checkout');
Route::get('/checkout/{slug}/{coupon}',[SiteController::class, 'checkoutCoupon'])->name('site.checkoutCoupon');
Route::post('/checkout/{slug}/coupon',[SiteController::class, 'checkoutCouponSubmit'])->name('site.checkoutCouponSubmit');
Route::get('/search',[SiteController::class,'searchFilter'])->name('search.filter');
Route::get('/wishlist', [SiteController::class, 'wishlist'])->name('site.wishlist');
Route::get('add-to-wishlist/{id}', [SiteController::class, 'addToWishlist'])->name('site.addtowishlist');
Route::patch('update-wishlist', [SiteController::class, 'updateWishlist'])->name('site.updatewishlist');
Route::delete('remove-from-wishlist', [SiteController::class, 'removeWishlist'])->name('site.removewishlist');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Dashboard Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function(){
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard.index');
    Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/create-category',[CategoryController::class, 'create_category'])->name('category.create');
    Route::post('/create-category-submit',[CategoryController::class, 'create_category_submit'])->name('category.create.submit');
    Route::get('/edit-category/{id}',[CategoryController::class, 'edit_category'])->name('category.edit');
    Route::patch('/edit-category-submit/{id}',[CategoryController::class, 'edit_category_submit'])->name('category.edit.submit');
    Route::get('/delete-category/{id}',[CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('/products',[ProductsController::class, 'index'])->name('products.index');
    Route::get('/create-product',[ProductsController::class, 'create_product'])->name('products.create');
    Route::post('/create-product-submit',[ProductsController::class, 'create_product_submit'])->name('products.create.submit');
    Route::get('/edit-product/{id}',[ProductsController::class, 'edit_product'])->name('products.edit');
    Route::patch('/edit-product-submit/{id}',[ProductsController::class, 'edit_product_submit'])->name('products.edit.submit');
    Route::get('/delete-product/{id}',[ProductsController::class, 'delete_product'])->name('products.delete');
    Route::get('/users',[UsersController::class, 'index'])->name('users.index');
    Route::get('/create-user',[UsersController::class, 'create_user'])->name('user.create');
    Route::post('/create-user-submit',[UsersController::class, 'create_user_submit'])->name('user.create.submit');
    Route::get('/edit-user/{id}',[UsersController::class, 'edit_user'])->name('user.edit');
    Route::patch('/edit-user-submit/{id}',[UsersController::class, 'edit_user_submit'])->name('user.edit.submit');
    Route::get('/delete-user/{id}',[UsersController::class, 'delete_user'])->name('user.delete');
    Route::get('/orders',[OrdersController::class, 'index'])->name('orders.index');
    Route::get('/delete-order/{id}',[OrdersController::class, 'delete_order'])->name('order.delete');
    Route::get('/order-status', [OrdersController::class, 'order_status'])->name('order.status');
    Route::get('/coupons',[CouponsController::class, 'index'])->name('coupon.index');
    Route::get('/create-coupon',[CouponsController::class, 'create_coupon'])->name('coupon.create');
    Route::post('/create-coupon-submit',[CouponsController::class, 'create_coupon_submit'])->name('coupon.create.submit');
    Route::get('/delete-coupon/{id}',[CouponsController::class, 'delete_coupon'])->name('coupon.delete');
  });



