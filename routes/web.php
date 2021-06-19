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

Route::get('login', 'Auth\LoginController@getLogin')->name('login');
Route::post('login', 'Auth\LoginController@postLogin')->name('login.store');
Route::get('register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('register','Auth\RegisterController@postRegister')->name('register.store');

Route::group(['prefix' => 'company', 'middleware' => 'auth'], function() {
    Route::get('/','CompanyController@index')->name('company');
    Route::get('/create','CompanyController@create')->name('company.create');
    Route::post('/create','CompanyController@store')->name('company.store');
    Route::get('/edit/{id}','CompanyController@edit');
    Route::post('/edit/{id}','CompanyController@update')->name('company.update');
    Route::delete('/{id}','CompanyController@destroy');
});

Route::get('/company','CompanyController@index')->name('company');
Route::get('/company/create','CompanyController@create')->name('company.create');
Route::post('/company/create','CompanyController@store')->name('company.store');
Route::get('/company/edit/{id}','CompanyController@edit');
Route::post('/company/edit/{id}','CompanyController@update')->name('company.update');
Route::delete('/company/{id}','CompanyController@destroy');

Route::get('/customer','CustomerController@index')->name('customer');
Route::get('/customer/create','CustomerController@create')->name('customer.create');
Route::post('/customer/create','CustomerController@store')->name('customer.store');
Route::get('/customer/edit/{id}','CustomerController@edit')->name('customer.edit');
Route::post('/customer/edit/{id}','CustomerController@update')->name('customer.update');
Route::delete('/customer/{id?}','CustomerController@destroy')->name('customer.delete');
Route::get('/customer/show/{id}','CustomerController@show')->name('customer.show');
Route::get('customer/export', 'CustomerController@export')->name('export.customer');
Route::post('customer/import', 'CustomerController@import')->name('import.customer');

Route::get('/order','OrderController@index')->name('order');
Route::get('/order/create','OrderController@create')->name('order.create');
Route::post('/order/create','OrderController@store')->name('order.store');
Route::get('/order/edit/{id}','OrderController@edit')->name('order.edit');
Route::post('/order/edit/{id}','OrderController@update')->name('order.update');
Route::delete('/order/{id}','OrderController@destroy')->name('order.delete');
Route::get('order/export', 'OrderController@export')->name('export.order');
Route::post('order/import', 'OrderController@import')->name('import.order');

Route::get('/user','UserController@index')->name('user');
Route::get('/user/create','UserController@create')->name('user.create');
Route::post('/user/create','UserController@store')->name('user.store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/edit/{id}','UserController@update')->name('user.update');
Route::delete('/user/{id}','UserController@destroy')->name('user.delete');
