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

Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@getLogin')->name('login');
Route::post('login', 'Auth\LoginController@postLogin')->name('login.store');
Route::get('register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('register','Auth\RegisterController@postRegister')->name('register.store');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('error', 'ErrorController@index')->name('error');

Route::group(['prefix' => 'company', 'middleware' => 'auth'], function() {
    Route::get('/','CompanyController@index')->name('company')->middleware('permission:read_company');
    Route::get('/create','CompanyController@create')->name('company.create')->middleware('permission:create_company');
    Route::post('/create','CompanyController@store')->name('company.store');
    Route::get('/edit/{id}','CompanyController@edit')->name('company.edit')->middleware('permission:edit_company');
    Route::post('/edit/{id}','CompanyController@update')->name('company.update');
    Route::delete('/{id}','CompanyController@destroy')->name('company.delete')->middleware('permission:delete_company');
});

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function() {
    Route::get('/','CustomerController@index')->name('customer')->middleware('permission:read_customer');
    Route::get('/test','CustomerController@test')->middleware('permission:read_customer');
    Route::post('/test/action', 'CustomerController@action')->name('customer.action');
    Route::get('/create','CustomerController@create')->name('customer.create')->middleware('permission:create_customer');
    Route::post('/create','CustomerController@store')->name('customer.store');
    Route::get('/edit/{id}','CustomerController@edit')->name('customer.edit')->middleware('permission:edit_customer');
    Route::post('/edit/{id}','CustomerController@update')->name('customer.update');
    Route::delete('/{id?}','CustomerController@destroy')->name('customer.delete')->middleware('permission:delete_customer');
    Route::delete('delall', 'CustomerController@deleteAll')->name('customer.deleteAll')->middleware('permission:delete_customer_all');
    Route::get('/show/{id}','CustomerController@show')->name('customer.show');
    Route::get('/export', 'CustomerController@export')->name('export.customer')->middleware('permission:export_customer');
    Route::post('/import', 'CustomerController@import')->name('import.customer')->middleware('permission:import_customer');
});

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function() {
    Route::get('/','OrderController@index')->name('order')->middleware('permission:read_order');
    Route::get('/create','OrderController@create')->name('order.create')->middleware('permission:create_order');
    Route::post('/create','OrderController@store')->name('order.store');
    Route::get('/edit/{id}','OrderController@edit')->name('order.edit')->middleware('permission:edit_order');
    Route::post('/edit/{id}','OrderController@update')->name('order.update');
    Route::delete('/{id}','OrderController@destroy')->name('order.delete')->middleware('permission:delete_order');
    Route::get('/export', 'OrderController@export')->name('export.order')->middleware('permission:export_order');
    Route::post('/import', 'OrderController@import')->name('import.order')->middleware('permission:import_order');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('/','UserController@index')->name('user')->middleware('permission:read_user');
    Route::get('/create','UserController@create')->name('user.create')->middleware('permission:create_user');
    Route::post('/create','UserController@store')->name('user.store');
    Route::get('/edit/{id}','UserController@edit')->name('user.edit')->middleware('permission:edit_user');
    Route::post('/edit/{id}','UserController@update')->name('user.update');
    Route::delete('/{id}','UserController@destroy')->name('user.delete')->middleware('permission:delete_user');
});

Route::group(['prefix' => 'role', 'middleware' => 'auth'], function() {
    Route::get('/','RoleController@index')->name('role')->middleware('permission:read_role');
    Route::get('/create','RoleController@create')->name('role.create')->middleware('permission:create_role');
    Route::post('/create','RoleController@store')->name('role.store');
    Route::get('/edit/{id}','RoleController@edit')->name('role.edit')->middleware('permission:edit_role');
    Route::post('/edit/{id}','RoleController@update')->name('role.update');
    Route::delete('/{id}','RoleController@destroy')->name('role.delete')->middleware('permission:delete_role');
});

Route::group(['prefix' => 'permission', 'middleware' => 'auth'], function() {
    Route::get('/','PermissionController@index')->name('permission')->middleware('permission:read_permission');
    Route::get('/create','PermissionController@create')->name('permission.create')->middleware('permission:create_permission');
    Route::post('/create','PermissionController@store')->name('permission.store');
    Route::get('/edit/{id}','PermissionController@edit')->name('permission.edit')->middleware('permission:edit_permission');
    Route::post('/edit/{id}','PermissionController@update')->name('permission.update');
    Route::delete('/{id}','PermissionController@destroy')->name('permission.delete')->middleware('permission:delete_permission');
});







