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


Route::get('/','PagesController@getHome');

Route::get('/test-login',function(){
    return view('login');
});

Route::get('/profile','ProfileController@getAcademicProfile');

Route::get('/test/db/user','TestController@testUser');
Route::get('/test/db/subject','TestController@testSubject');
Route::get('/test/db/gpax','TestController@testGPAX');
Route::get('/test/db/result','TestController@testResult');