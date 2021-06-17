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
    return view('pages.home');
});
Route::get('/company','CompanyController@index')->name('company');
Route::get('/company/create','CompanyController@create')->name('company.create');
Route::post('/company/create','CompanyController@store')->name('company.store');
Route::get('/company/edit/{id}','CompanyController@edit');
Route::post('/company/edit/{id}','CompanyController@update')->name('company.update');
Route::delete('/company/{id?}','CompanyController@destroy');

Route::get('/customer','CustomerController@index')->name('customer');
Route::get('/customer/create','CustomerController@create')->name('customer.create');
Route::post('/customer/create','CustomerController@store')->name('customer.store');
Route::get('/customer/edit/{id}','CustomerController@edit')->name('customer.edit');
Route::post('/customer/edit/{id}','CustomerController@update')->name('customer.update');
Route::delete('/customer/{id?}','CustomerController@destroy')->name('customer.delete');
Route::get('/customer/show/{id}','CustomerController@show')->name('customer.show');

Route::get('/order','OrderController@index')->name('order');
Route::get('/order/create','OrderController@create')->name('order.create');
Route::post('/order/create','OrderController@store')->name('order.store');
Route::get('/order/edit/{id}','OrderController@edit')->name('order.edit');
Route::post('/order/edit/{id}','OrderController@update')->name('order.update');
Route::delete('/order/{id?}','OrderController@destroy')->name('order.delete');