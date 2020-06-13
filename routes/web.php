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
Route::get('/', 'IndexController@index')->name('index');

Route::group(['prefix'=>'customer'], function(){
    Route::get('/', 'CustomerController@index')->name('insert_customer');
    Route::post('/store', 'CustomerController@store')->name('insert_store');
    Route::get('/list', 'CustomerController@show')->name('list_customer');
    Route::get('/edit/{id}', 'CustomerController@edit')->name('edit_customer');
    Route::post('/update', 'CustomerController@update')->name('update_customer');
    Route::post('/delete', 'CustomerController@destroy')->name('delete_customer');
});
