<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

//fontend 
Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('/trang-chu',[\App\Http\Controllers\HomeController::class,'index']);
Route::post('/tim-kiem',[\App\Http\Controllers\HomeController::class,'search']);
Route::post('/product-tabs',[\App\Http\Controllers\HomeController::class,'product_tabs']);

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}',[\App\Http\Controllers\CategoryProductController::class,'show_category_home']);

//Thương hiệu sản phẩm trang chủ
Route::get('/thuong-hieu-san-pham/{brand_id}',[\App\Http\Controllers\BrandProductController::class,'show_brand_home']);

//Sản phẩm
Route::get('/chi-tiet-san-pham/{product_id}',[\App\Http\Controllers\ProductController::class,'details_product']);

//Giỏ hàng
Route::post('/save-cart',[\App\Http\Controllers\CartController::class,'save_cart']);
Route::get('/show-cart',[\App\Http\Controllers\CartController::class,'show_cart']);
Route::get('/delete-to-cart/{rowId}',[\App\Http\Controllers\CartController::class,'delete_to_cart']);
Route::post('/update-cart-quantity',[\App\Http\Controllers\CartController::class,'update_cart_quantity']);

//Thanh toán
Route::get('/login-checkout',[\App\Http\Controllers\CheckoutController::class,'login_checkout']);
Route::get('/checkout',[\App\Http\Controllers\CheckoutController::class,'checkout']);
Route::post('/save-checkout-customer',[\App\Http\Controllers\CheckoutController::class,'save_checkout_customer']);
Route::get('/payment',[\App\Http\Controllers\CheckoutController::class,'payment']);
Route::post('/order',[\App\Http\Controllers\CheckoutController::class,'order']);

//Đăng ký
Route::post('/add-customer',[\App\Http\Controllers\CheckoutController::class,'add_customer']);

//Đăng nhập/xuất
Route::get('/logout-checkout',[\App\Http\Controllers\CheckoutController::class,'logout_checkout']);
Route::post('/login',[\App\Http\Controllers\CheckoutController::class,'login']);

//Thông tin cá nhân
Route::get('/customer-info',[\App\Http\Controllers\CustomerController::class,'customer_info']);
Route::post('/update-customer',[\App\Http\Controllers\CustomerController::class,'update_customer']);

//-------------------------------------end fontend--------------------------------------------

//backend
Route::group(['prefix' => 'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\AdminController::class,'login']);
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class,'show_dashboard']);
});
Route::get('/logout',[\App\Http\Controllers\AdminController::class,'logout']);
Route::post('admin-dashboard',[\App\Http\Controllers\AdminController::class,'dashboard']);

//Category Product
Route::get('/add-category-product',[\App\Http\Controllers\CategoryProductController::class,'add_category_product']);
Route::get('/all-category-product',[\App\Http\Controllers\CategoryProductController::class,'all_category_product']);
Route::get('/edit-category-product/{category_product_id}',[\App\Http\Controllers\CategoryProductController::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[\App\Http\Controllers\CategoryProductController::class,'delete_category_product']);

Route::get('/unactive-category-product/{category_product_id}',[\App\Http\Controllers\CategoryProductController::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[\App\Http\Controllers\CategoryProductController::class,'active_category_product']);

Route::post('/save-category-product',[\App\Http\Controllers\CategoryProductController::class,'save_category_product']);
Route::post('/update-category-product/{category_product_id}',[\App\Http\Controllers\CategoryProductController::class,'update_category_product']);

//Brand Product
Route::get('/add-brand-product',[\App\Http\Controllers\BrandProductController::class,'add_brand_product']);
Route::get('/all-brand-product',[\App\Http\Controllers\BrandProductController::class,'all_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}',[\App\Http\Controllers\BrandProductController::class,'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}',[\App\Http\Controllers\BrandProductController::class,'delete_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}',[\App\Http\Controllers\BrandProductController::class,'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}',[\App\Http\Controllers\BrandProductController::class,'active_brand_product']);

Route::post('/save-brand-product',[\App\Http\Controllers\BrandProductController::class,'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}',[\App\Http\Controllers\BrandProductController::class,'update_brand_product']);

//Product
Route::get('/add-product',[\App\Http\Controllers\ProductController::class,'add_product']);
Route::get('/all-product',[\App\Http\Controllers\ProductController::class,'all_product']);
Route::get('/edit-product/{product_id}',[\App\Http\Controllers\ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}',[\App\Http\Controllers\ProductController::class,'delete_product']);

Route::get('/unactive-product/{product_id}',[\App\Http\Controllers\ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}',[\App\Http\Controllers\ProductController::class,'active_product']);

Route::post('/save-product',[\App\Http\Controllers\ProductController::class,'save_product']);
Route::post('/update-product/{product_id}',[\App\Http\Controllers\ProductController::class,'update_product']);

//Order
Route::get('/manage-order',[\App\Http\Controllers\OrderController::class,'manage_order']);
Route::get('/view-order/{order_id}',[\App\Http\Controllers\OrderController::class,'view_order']);

//Banner
Route::get('/add-banner',[\App\Http\Controllers\BannerController::class,'add_banner']);
Route::get('/edit-banner/{banner_id}',[\App\Http\Controllers\BannerController::class,'edit_banner']);
Route::get('/manage-banner',[\App\Http\Controllers\BannerController::class,'manage_banner']);

Route::get('/unactive-banner/{banner_id}',[\App\Http\Controllers\BannerController::class,'unactive_banner']);
Route::get('/active-banner/{banner_id}',[\App\Http\Controllers\BannerController::class,'active_banner']);

Route::post('/save-banner',[\App\Http\Controllers\BannerController::class,'save_banner']);
Route::post('/update-banner/{banner_id}',[\App\Http\Controllers\BannerController::class,'update_banner']);
Route::get('/delete-banner/{banner_id}',[\App\Http\Controllers\BannerController::class,'delete_banner']);

