<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
date_default_timezone_set("Africa/Cairo");
Route::group(['prefix'=>'dashboard', 'namespace'=>'Dashboard'], function () {

    Route::group(['namespace'=>'Auth', 'middleware'=>'guest'],function (){
        //login routes
        Route::get('/login', 'LoginController@login')->name('admin.login');
        Route::post('/login', 'LoginController@doLogin')->name('admin.doLogin');

    });

    Route::group(['middleware' => ['auth','role:admin']], function () {
        Route::get('/home', 'DashboardController@index')->name('dashboard');
        Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
        Route::resource('user', 'UserController');
        Route::resource('color', 'ColorController');
        Route::resource('face_shape', 'FaceShapeController');
        Route::resource('hair_style', 'HairStyleController');
        Route::resource('hair_length', 'HairLengthController');
        Route::resource('skin_tone', 'SkinToneController');
        Route::resource('user_feature', 'UserFeatureController');
        Route::group(['prefix'=>'account'],function (){
            Route::get('/','AdminController@index')->name('admin.account');
            Route::get('/overview','AdminController@overview')->name('admin.account.overview');
            Route::get('/editProfile','AdminController@editProfile')->name('admin.account.editProfile');
            Route::post('/editProfile','AdminController@updateProfile')->name('admin.account.doEditProfile');
            Route::get('/password','AdminController@password')->name('admin.account.password');
            Route::post('/password','AdminController@resetPassword')->name('admin.account.password.reset');
        });
    });

});
/***************************************************************************/
/***************************************************************************/
/***************************************************************************/

