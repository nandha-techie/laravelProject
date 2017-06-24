<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Route::get('/admin', function(){
    return view('admin.dashbord');
});*/

 Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin', 'namespace' => 'Admin'], function () {
	Route::get('login', 'AuthController@getlogin');
	Route::post('login', 'AuthController@postlogin');
 });

 Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () {
    Route::controllers([
	    '/bf' => 'BfController',
	]);
 });
 
/*
 Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::controllers([
	    'a' => 'aboutController',
	    'b' => 'aboutController',
	]);
 });*/

Route::get('/', function () {
    return view('home');
});

