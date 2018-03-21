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

Route::get('/allUser/{id}', 'UserController@showItemsbyUser');


Route::get('/Users','UserController@showAll');
Route::get('/Users/{id}','UserController@find');
Route::post('/Users','UserController@register');
Route::put('/Users','UserController@update');
Route::delete('/Users/{id}','UserController@delete');

Route::get('/Items','ItemController@showAll');
Route::post('/Items','ItemController@add');
Route::put('/Items','ItemController@update');
Route::delete('/Items/{id}','ItemController@delete');