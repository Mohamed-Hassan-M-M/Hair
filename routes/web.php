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

date_default_timezone_set("Africa/Cairo");
Route::group(['prefix'=>'dashboard', 'namespace'=>'Dashboard'], function () {

    Route::group(['namespace'=>'Auth', 'middleware'=>'guest'],function (){
        //login routes
        Route::get('/login', 'LoginController@login')->name('admin.login');
        Route::post('/login', 'LoginController@doLogin')->name('admin.doLogin');

    });

    Route::group(['middleware' => ['auth','role:admin']], function () {
        //data routes
        Route::get('/home', 'DashboardController@index')->name('dashboard');
        Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
        Route::resource('user', 'UserController');
        Route::resource('color', 'ColorController');
        Route::resource('face_shape', 'FaceShapeController');
        Route::resource('hair_style', 'HairStyleController');
        Route::resource('hair_length', 'HairLengthController');
        Route::resource('skin_tone', 'SkinToneController');
        Route::resource('user_feature', 'UserFeatureController');
        Route::resource('combination_feature', 'CombinationFeatureController');
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');

        Route::group(['prefix'=>'account'],function (){
            //admin account routes
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

Route::group(['namespace'=>'Website'],function (){

    Route::get('/', 'WebsiteController@index')->name('website');
    Route::get('/service', 'ServiceController@index')->name('service');

});
