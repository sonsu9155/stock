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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');


    Route::get('login', 'PassportController@login');
    Route::post('login', 'PassportController@dologin');
    //Route::middleware('auth:api')->group(function () {
       // var_dump('test');exit();
        Route::get('wapindex', 'IosController@wapindex');
        Route::get('wapinfo', 'IosController@wapinfo');
        Route::get('wapxiaoxi', 'IosController@wapxiaoxi');
        Route::get('wapindex2', 'IosController@wapindex2');
        Route::get('waporder', 'IosController@waporder');
        Route::get('getstock', 'IosController@getstock');
        Route::post('buystock', 'IosController@buystock');
        Route::get('waptrade', 'IosController@waptrade');
        Route::get('sale_buy', 'IosController@sale_buy');
        Route::post('sell_act', 'IosController@sell_act');
        Route::get('wapmingxi', 'IosController@wapmingxi');
        Route::get('message_index', 'IosController@message_index');
        Route::post('message_store', 'IosController@message_store');

   // });
    //Route::middleware('auth:api')->group(function () {
        Route::get('user', 'PassportController@details');

    //});