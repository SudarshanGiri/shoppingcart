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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-to-cart/{id}',[
    'uses'=>'ProductController@getAddTocart',
    'as' => 'product.addToCart'
]);
Route::get('/reduce/{id}',[
    'uses' =>'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'

]);
Route::get('/remove/{id}',[
    'uses' =>'ProductController@getRemoveItem',
    'as' => 'product.remove'

]);

Route::get('/shopping-cart',[
    'uses'=>'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/checkout',[
    'uses'=>'ProductController@getCheckout',
    'as' => 'checkout'
]);
Route::post('/checkout',[
    'uses'=>'ProductController@getpostCheckout',
    'as' => 'checkout'
]);





Route::get('/', 'ProductController@index2')->name('product.index');
Route::get('/laptops', 'ProductController@laptops');
Route::get('/speakers', 'ProductController@speakers');
Route::get('/desktops', 'ProductController@desktops');




Route::group(['middleware' => 'prevent-back-history'],function(){//middleware for preventing back button redirecting to the logged in page 
    Route::resource('products','ProductController');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//Password reset routes for admin
Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');


});