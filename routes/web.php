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
	return view('cloudservice.negocios.index');
});

Route::get('/','NegociosController@index');
Route::resource('cloudservice/negocios','NegociosController');
Route::get('information/{nombre}', 'NegociosController@nombre');
