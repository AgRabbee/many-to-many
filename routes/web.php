<?php

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
Route::get('/allsales','BaseController@allsales');
Route::get('/sales','BaseController@index');
Route::post('/sales','BaseController@sales');
Route::get('/allproducts','BaseController@viewAllProducts');
Route::get('/products','BaseController@viewProducts');
Route::post('/addProduct','BaseController@addProduct');
Route::get('/allcustomers','BaseController@viewAllCustomers');
Route::get('/customers','BaseController@viewCustomers');
Route::post('/addCustomer','BaseController@addCustomer');
