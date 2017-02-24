<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('/golongan', 'golonganController');
Route::resource('/jabatan', 'jabatanController');
Route::resource('/pegawai', 'pegawaiController');
Route::resource('/kategori', 'kategoriController');
Route::resource('/lemburp','lemburpegawaiController');
Route::resource('/error1','lemburpegawaiController@error1');
Route::resource('/error2','tunjanganpController@error2');
Route::resource('/tunjangan', 'tunjanganController');
Route::resource('/tunjanganp', 'tunjanganpController');
Route::resource('/gajian', 'PenggajianController');
Route::get('query', 'PenggajianController@search');
Route::group(['middleware' => ['api']], function () {
    Route::post('register', 'ApiController@register');
    Route::post('login', 'ApiController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::post('get_user_details', 'ApiController@get_user_details');
    });
});
