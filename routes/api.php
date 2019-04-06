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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ 'uses' => "ApiRegisterController@login"]);
Route::post('logout','ApiRegisterController@logout');

Route::group(['namespace' => 'API'], function()
{

Route::get('employe/{id}','EmployeController@store');
//Route::get('reading/{id}','ReadingController@index');
Route::post('storereading/{s_id}/{r_id}/{u_id}','ReadingController@store');

//Route::post('report/{s_id}');

Route::post('reading/{id}','ReadingController@index');


Route::get('route/{id}','EmployeController@index');
Route::get('store/{id}','EmployeController@create');



Route::get('preexpense/{u_id}/{r_id}/{date}','ReadingController@edit');
Route::get('expense','ReadingController@show');
Route::post('expense/{u_id}/{r_id}','ReadingController@update');


Route::get('dashboard/{u_id}','ReadingController@dashboard');

Route::post('transfer/{u_id}/{r_id}','ReadingController@transfer');




});