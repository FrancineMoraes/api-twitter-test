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

Route::group(['as' => 'api'], function () {
    Route::get('/tweets/7dias/{order?}/{order_by?}', 'TwitteController@beforeSevenDays'); 
    Route::get('/tweets/likes/rt/{order?}/{order_by?}', 'TwitteController@moreThan3000lessThan2500'); 
    Route::get('/tweets/rt/{order?}/{order_by?}', 'TwitteController@moreRT'); 
    Route::get('/tweets/locale/{order?}/{order_by?}', 'TwitteController@locale'); 
});

