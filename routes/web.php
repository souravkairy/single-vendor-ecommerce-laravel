<?php

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
// Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
// Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);
Route::get('auth/facebook', 'App\Http\Controllers\FacebookSocialiteController@redirectToFB');
Route::get('callback/facebook', 'App\Http\Controllers\FacebookSocialiteController@handleCallback');

//frontend route
// Route::get('/', function () {
//     return view('front_end/master');
// });
Route::get('/','App\Http\Controllers\Frontend@index');
Route::get('/Shop','App\Http\Controllers\Frontend@shop');

Route::get('/contact','App\Http\Controllers\Frontend@contact');
Route::post('/store_contact_info','App\Http\Controllers\Frontend@store_contact_info');

Route::get('/blog','App\Http\Controllers\Frontend@blog');
Route::get('/Post-Details/{id}','App\Http\Controllers\Frontend@blog_details');


Route::get('/add_to_wishlist/{id}','App\Http\Controllers\Frontend@add_to_wishlist');
Route::get('/Product-Details/{id}','App\Http\Controllers\Frontend@p_details');
Route::get('/add_to_cart/{id}','App\Http\Controllers\Frontend@add_to_cart');
Route::post('/add_to_cart_from_p_details','App\Http\Controllers\Frontend@add_to_cart_from_p_details');
Route::get('/Show-Cart','App\Http\Controllers\Frontend@show_cart');
Route::post('/update_cart','App\Http\Controllers\Frontend@update_cart');
Route::get('/delete_cart/{id}','App\Http\Controllers\Frontend@delete_cart');
Route::get('/Checkout','App\Http\Controllers\Frontend@checkout');
Route::post('/apply_coupon','App\Http\Controllers\Frontend@apply_coupon');
Route::get('/remove_coupon','App\Http\Controllers\Frontend@remove_coupon');



Route::post('/check_payment','App\Http\Controllers\PaymentController@check_payment');
Route::post('/stripe_charge','App\Http\Controllers\PaymentController@stripe_charge');


Route::get('/Login','App\Http\Controllers\Frontend@login');
Route::post('/login-auth','App\Http\Controllers\Frontend@login_auth');
Route::post('/Sign-Up','App\Http\Controllers\Frontend@sign_up');
Route::get('/cus_logout','App\Http\Controllers\Frontend@cus_logout');
Route::get('/ck','App\Http\Controllers\Frontend@ck');

Route::get('/Profile/{id}','App\Http\Controllers\Frontend@profile');
Route::get('/cancel_order/{id}','App\Http\Controllers\Frontend@cancel_request');

Route::post('/Track-Orders','App\Http\Controllers\Frontend@track_orders');


Route::post('/search_data','App\Http\Controllers\Frontend@search_data');
Route::post('/newsletter','App\Http\Controllers\Frontend@newsletter');







//end frontend route
//backend route

Route::get('/admin','App\Http\Controllers\LoginAuth@index'); // ei system e route laravel 8 e likha lagbe..
Route::get('/admin-login-auth','App\Http\Controllers\LoginAuth@admin_login_auth');
Route::get('/log_out','App\Http\Controllers\LoginAuth@log_out');



Route::get('/admin_dashboard','App\Http\Controllers\Backend@index');


Route::get('/Category','App\Http\Controllers\Backend@category');
Route::post('/save_category','App\Http\Controllers\Backend@save_category');
Route::get('/Edit-Category/{id}','App\Http\Controllers\Backend@edit_category');
Route::post('/update_category','App\Http\Controllers\Backend@update_category');
Route::get('/Delete-Category/{id}','App\Http\Controllers\Backend@delete_category');

Route::get('/Sub-Category','App\Http\Controllers\Backend@sub_category');
Route::post('/save_sub_category','App\Http\Controllers\Backend@save_sub_category');
Route::get('/Edit-Sub-Category/{id}','App\Http\Controllers\Backend@edit_sub_category');
Route::post('/update_sub_category','App\Http\Controllers\Backend@update_sub_category');
Route::get('/Delete-Sub-Category/{id}','App\Http\Controllers\Backend@delete_sub_category');

Route::get('/Brand','App\Http\Controllers\Backend@brand');
Route::post('/save_brand','App\Http\Controllers\Backend@save_brand');
Route::get('/Edit-Brand/{id}','App\Http\Controllers\Backend@edit_brand');
Route::post('/update_brand','App\Http\Controllers\Backend@update_brand');
Route::get('/Delete-Brand/{id}','App\Http\Controllers\Backend@delete_brand');




Route::get('/All-Products','App\Http\Controllers\Backend@all_products');
Route::get('/Add-Products','App\Http\Controllers\Backend@add_products');
Route::post('/save_product','App\Http\Controllers\Backend@save_product');
Route::get('/delete-product/{id}','App\Http\Controllers\Backend@delete_product');



Route::get('/Features-Product','App\Http\Controllers\Backend@f_products');
Route::get('/Latest-Product','App\Http\Controllers\Backend@l_products');
Route::get('/Top-Products','App\Http\Controllers\Backend@t_products');
Route::get('/Review-Products','App\Http\Controllers\Backend@r_products');


Route::get('/Coupon','App\Http\Controllers\Backend@coupon');
Route::post('/save_coupons','App\Http\Controllers\Backend@save_coupons');
Route::get('/Edit-Coupons/{id}','App\Http\Controllers\Backend@edit_coupons');
Route::post('/update_coupons','App\Http\Controllers\Backend@update_coupons');
Route::get('/Delete-Coupons/{id}','App\Http\Controllers\Backend@delete_coupons');


Route::get('/New-Pending-Orders','App\Http\Controllers\Backend@n_p_orders');
Route::get('/View-Order/{id}','App\Http\Controllers\Backend@view_order');
Route::get('/p_accepted/{id}','App\Http\Controllers\Backend@p_accepted');
Route::get('/Accept-Payments','App\Http\Controllers\Backend@a_orders');
Route::get('/Payment-Completed-Order-Details/{id}','App\Http\Controllers\Backend@payment_complete_order_details');
Route::get('/Delivery-Progress/{id}','App\Http\Controllers\Backend@d_progress');
Route::get('/Progress-Delivery','App\Http\Controllers\Backend@p_delivery');
Route::get('/Delivery-Progress-Order-Details/{id}','App\Http\Controllers\Backend@progress_delivery_order_details');
Route::get('/Delivery-Done/{id}','App\Http\Controllers\Backend@delivery_done');
Route::get('/Done-Order-Details/{id}','App\Http\Controllers\Backend@done_order_details');
Route::get('/Delivery-Success','App\Http\Controllers\Backend@d_success');


Route::get('/Cancel-Orders','App\Http\Controllers\Backend@c_orders');
Route::get('/cancel_orders/{id}','App\Http\Controllers\Backend@cancel_orders');

Route::get('/SEO','App\Http\Controllers\Backend@seo');
Route::post('/update_seo','App\Http\Controllers\Backend@update_seo');


Route::get('/Todays-Orders','App\Http\Controllers\Backend@today_order');
Route::get('/View-Today-Order-Details/{id}','App\Http\Controllers\Backend@v_t_o_details');
Route::get('/Todays-Delivered','App\Http\Controllers\Backend@today_delivery');
Route::get('/This-Month','App\Http\Controllers\Backend@this_month');



Route::get('/Data-Search','App\Http\Controllers\Backend@data_search');
Route::post('/search_by_date','App\Http\Controllers\Backend@search_by_date');
Route::post('/search_by_month','App\Http\Controllers\Backend@search_by_month');
Route::post('/search_by_year','App\Http\Controllers\Backend@search_by_year');

Route::get('/Create-User','App\Http\Controllers\Backend@create_user');
Route::get('/All-User','App\Http\Controllers\Backend@all_user');
Route::post('/add_user','App\Http\Controllers\Backend@add_user');




Route::get('/site_setting','App\Http\Controllers\Backend@site_setting');
Route::post('/update_site_setting','App\Http\Controllers\Backend@update_site_setting');
Route::get('/slider_setting','App\Http\Controllers\Backend@slider_setting');
Route::post('/update_slider_setting','App\Http\Controllers\Backend@update_slider_setting');

Route::get('/return_order_request','App\Http\Controllers\Backend@return_order_request');
Route::get('/all_r_o_request','App\Http\Controllers\Backend@all_r_o_request');

Route::get('/new_message','App\Http\Controllers\Backend@new_message');


Route::get('/All-Post','App\Http\Controllers\Backend@all_post');
Route::get('/Edit-Post/{id}','App\Http\Controllers\Backend@edit_post');
Route::get('/Delete-Post/{id}','App\Http\Controllers\Backend@delete_post');
Route::post('/save_post','App\Http\Controllers\Backend@save_post');


Route::get('/Newslater','App\Http\Controllers\Backend@Newslater');



//end backend route












//auth route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//end auth route
