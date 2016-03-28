<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get ('/', 'HomeController@index');

Route::get ('/search', 'HomeController@searchProduct');
Route::get ('/product/{slug}','HomeController@getProduct');
Route::post ('/product/{slug}','HomeController@addProduct');
//Route::get ('/category/sort/new','HomeController@sortNewCategory');
//Route::get ('/category/sort/old','HomeController@sortOldCategory');
Route::get ('/category/{name}','HomeController@getCategory');
Route::get ('/cart','HomeController@showCart');
Route::post ('/cart', 'HomeController@updateCart');
Route::post('/cart/checkout','HomeController@checkoutCart');
Route::get ('/account/login','MemberController@getLogin');
Route::post('/account/login','MemberController@postLogin');
Route::post('/account/register','MemberController@postRegister');
//Route::post('/account/forgot','MemberController@getForgot');
Route::get('/account/logout','MemberController@getLogout');

Route::get('/account','MemberController@getAccount');
Route::post('/account/updateaccount','MemberController@updateAccount');
Route::post('/account/updatepassword','MemberController@updatePassword');
Route::get('/account/forgot','MemberController@getForgotPassword');
Route::post('/account/forgot','MemberController@postForgotPassword');
Route::post('/account/resetpassword','MemberController@postResetPassword');

//TODO
Route::get('/order','HomeController@getOrder'); //done
Route::post('/product/{slug}/addreview','HomeController@addReview');

Route::get('/order/details/{id}','HomeController@getOrderDetails');
//UPDATE UI Bugs , new arraival, searching , Special Offers , review 

//Route::get ('/advancedsearch/{category}/{sortbynewest}/{sortbycost}/{lowestprice}/{highestprice}', 'HomeController@advanceSearchProduct');
Route::get ('sort/{type}','HomeController@getSort');
Route::get ('price/{low}/{high}','HomeController@getPriceRange');
Route::get ('new-arrivals','HomeController@newArrivals');
Route::get ('special-offers','HomeController@specialOffers');

Route::get ('checkorder','HomeController@getCheckOrder');
Route::get ('checkorder/{oid}','HomeController@getCheckOrderID');
Route::get ('deliverorder/{oid}/','HomeController@getCheckOrderDeliveried');
