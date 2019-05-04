<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/health/', 'HealthController@index');
Route::get('/health/count', 'HealthController@count');
Route::get('/health/paginate', 'HealthController@paginate');
Route::get('/health/find', 'HealthController@find');
Route::get('/health/insert', 'HealthController@insert');
Route::get('/health/update', 'HealthController@update');
Route::get('/health/where-like', 'HealthController@whereLike');
Route::get('/health/where-in', 'HealthController@whereIn');
