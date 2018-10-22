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


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('employees', 'EmployeeController@index');
Route::get('reviews', 'ReviewController@index');
Route::get('employees/{id}', 'EmployeeController@show');
Route::get('reviews/{id}', 'ReviewController@show');
Route::post('reviews', 'ReviewController@store');


