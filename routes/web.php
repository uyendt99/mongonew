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
Route::get('/company/edit/{id}','CompanyController@edit');
Route::delete('{id}','CompanyController@destroy');

Route::get('/customer','CustomerController@index')->name('customer');
