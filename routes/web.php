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

Route::get('/', function () 
{

    return view('auth.login');
});

Auth::routes();

Route::group(['namespace' => 'Admin'], function()
{

Route::get('/home', 'HomeController@index')->name('home');
Route::get('notification', 'HomeController@notification');


Route::resource('expensive_category','CategoryController');
Route::resource('employe','EmployeController');
Route::get('employe/password/{id}','EmployeController@password');
Route::post('employe/password/{id}','EmployeController@password_update');

Route::resource('store','StoreController');
Route::resource('route','RouteController');
Route::resource('routeallocation','RouteAllocation');
Route::get('/get-order/{id}/{id1}','RouteAllocation@getorder'); 


Route::post('routeallocation/update1/{id}','RouteAllocation@update1');


Route::resource('storeallocation','StoreAllocation');
Route::post('storeallocation/update1/{id}','StoreAllocation@update1');
Route::get('storeallocation/delete/{id}','StoreAllocation@delete');


Route::resource('price','PriceController');
Route::get('/price1/view','PriceController@view');
Route::resource('firstreading','FirstReading');

Route::resource('report','ReportController');
Route::resource('datesales','DatesalesController');
Route::resource('storesales','storesalesController');
Route::resource('expanse','ExpanseController');


});
