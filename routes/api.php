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
    Route::post('face_shape','ApiController@face_shape');
    Route::post('skin_tone','ApiController@skin_tone');///////////////!!!!!!!!!!!!
    Route::post('login','ApiUserAuthController@login');
    Route::post('register','ApiUserAuthController@register');

    Route::group(['prefix' => 'user' ,'middleware' => ['auth_api:api','role:user']],function (){
        Route::post('logout','ApiUserAuthController@logout');
        Route::post('profile','ApiAccountController@');
        Route::post('save_histories','ApiAccountController@saveHistories');
        Route::post('show_histories','ApiAccountController@showHistories');
        Route::post('show_profile','ApiAccountController@showProfile');
        Route::post('update_profile','ApiAccountController@updateProfile');
    });
});
