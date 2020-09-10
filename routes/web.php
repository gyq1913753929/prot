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


// Route::get('/prot','index\IndexController@prot');
// Route::post('/git','index\IndexController@git');
// Route::post('/login','index\IndexController@login');
// //Route::get('admin/dologin','index\IndexController@dologin');
// Route::get('/list','index\IndexController@list');


//
Route::get('/brand','Admin\BrandController@index')->name('brand');
Route::get('admin/brand/create','Admin\BrandController@create')->name('brand.create');
Route::post('admin/brand/store','Admin\BrandController@store');
Route::get('admin/brand/index','Admin\BrandController@index');
Route::post('admin/brand/upload','Admin\BrandController@upload');
Route::get('admin/brand/edit/{id}','Admin\BrandController@edit');
Route::post('admin/brand/update/{id}','Admin\BrandController@update');
Route::get('admin/brand/destroy/{id}','Admin\BrandController@destroy');
//及点机该
Route::get('admin/brand/change','Admin\BrandController@change');

