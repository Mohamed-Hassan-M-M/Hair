<?php

use Illuminate\Support\Facades\Route;
use Milon\Barcode\DNS1D;

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
    Route::get('/barcode',function (){
        $ddd = new DNS1D();
        //echo $ddd->getBarcodeHTML('4445645656', 'C39');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'C39+');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'C39E');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'C39E+');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'C93');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'S25');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'S25+');echo '</br>';
        echo $ddd->getBarcodeHTML('4445645656', 'I25','1.4','50');echo '</br>';
        echo  '<div style="width: 200px;margin: auto">';
        echo  $ddd->getBarcodeSVG('4445645656', 'C39+',1,50);
        echo '</div>';
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo  '<div style="width: 200px;margin: auto">';
        echo '<img src="data:image/png;base64,' . $ddd->getBarcodePNG('4445645656', 'C39+',1,50) . '" alt="barcode"   />';
        echo '</div>';
        //echo $ddd->getBarcodeHTML('4445645656', 'I25+');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'C128');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'C128A');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'C128B');echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'C128C');//echo '</br>';
        //echo $ddd->getBarcodeHTML('44455656', 'EAN2');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445656', 'EAN5');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445', 'EAN8');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445', 'EAN13');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'UPCA');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'UPCE');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'MSI');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'MSI+');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'POSTNET');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'PLANET');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'RMS4CC');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'KIX');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'IMB');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'CODABAR');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'CODE11');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'PHARMA');//echo '</br>';
        //echo $ddd->getBarcodeHTML('4445645656', 'PHARMA2T');//echo '</br>';
    });

});
