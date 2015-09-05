<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'RequestController@welcome');
Route::get('get', 'RequestController@get');
Route::get('post', 'RequestController@post');
Route::get('put', 'RequestController@put');
Route::get('delete', 'RequestController@delete');

Route::post('post', 'RequestController@RequestPost');
Route::post('get', 'RequestController@RequestGet');
Route::post('put', 'RequestController@RequestPut');
Route::post('delete', 'RequestController@RequestDelete');

Route::post('postTest', 'RequestController@postTest');
Route::put('putTest', 'RequestController@putTest');
Route::delete('deleteTest', 'RequestController@deleteTest');




