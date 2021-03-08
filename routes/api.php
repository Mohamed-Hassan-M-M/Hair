<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['api','checkPassword'], 'namespace' => 'Api'], function () {
    Route::post('color','ApiController@color');
    Route::post('hair_style','ApiController@hair_style');
    Route::post('hair_length','ApiController@hair_length');
    Route::post('skin_tone','ApiController@skin_tone');/////////////////!!!!!!!!!!!!
    Route::post('login','ApiUserAuthController@login');
    Route::post('register','ApiUserAuthController@register');

    Route::group(['prefix' => 'user' ,'middleware' => ['auth_api:api']],function (){
        Route::post('logout','ApiUserAuthController@logout');
        Route::post('profile',function(){
            return 'Only authenticated user can reach me';
        }) ;
        Route::post('saveHistories','') ;
    });
});
