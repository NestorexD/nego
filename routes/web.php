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


Route::resource('cloudservice/negocios','NegociosController');
Route::get('index','NegociosController@index');
Route::get('information/{nombre}', 'NegociosController@nombre');


Route::get('negocios/{name}',[
	'uses' => 'NegociosController@searchDistrito',
	'as' => 'negocios.search.distrito'
]);

Route::get('rubro/{name}',[
	'uses' => 'NegociosController@searchRubro',
	'as' => 'negocios.search.rubro'
]);