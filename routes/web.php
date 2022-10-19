<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Auth;

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
//Route::get('/create-coupon',[SiteController::class, 'createCoupon']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Dashboard Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function(){
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard.index');
    Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/create-category',[CategoryController::class, 'create_category'])->name('category.create');
    Route::post('/create-category-submit',[CategoryController::class, 'create_category_submit'])->name('category.create.submit');
    Route::get('/edit-category/{id}',[CategoryController::class, 'edit_category'])->name('category.edit');
    Route::post('/edit-category-submit/{id}',[CategoryController::class, 'edit_category_submit'])->name('category.edit.submit');
    Route::get('/delete-category/{id}',[CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('/products',[ProductsController::class, 'index'])->name('products.index');
    Route::get('/create-product',[ProductsController::class, 'create_product'])->name('products.create');
    Route::post('/create-product-submit',[ProductsController::class, 'create_product_submit'])->name('products.create.submit');
    Route::get('/edit-product/{id}',[ProductsController::class, 'edit_product'])->name('products.edit');
    Route::post('/edit-product-submit/{id}',[ProductsController::class, 'edit_product_submit'])->name('products.edit.submit');
    Route::get('/delete-product/{id}',[ProductsController::class, 'delete_product'])->name('products.delete');
  });



