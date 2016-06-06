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

Route::get('/login','PagesController@login');
Route::post('/login','PagesController@postLogin');
Route::get('/logout','PagesController@logout');

Route::get('/profile','ProfileController@getAcademicProfile');
Route::get('/major-ranking','ProfileController@getRankingViewer');

Route::get('/ranking-calculator','RankingController@getRanking');
Route::get('/ranking-calculator/calculate','RankingController@getFreshyRankCalculator');

Route::get('/test/db/user','TestController@testUser');
Route::get('/test/db/subject','TestController@testSubject');
Route::get('/test/db/gpax','TestController@testGPAX');
Route::get('/test/db/result','TestController@testResult');
Route::get('/test/db/adviser','TestController@testAdviser');

Route::get('/test/dashboard','TestController@testDashboard');

Route::get('/admin/index','AdminController@getIndex');
Route::get('/admin/edit-ratio','AdminController@getEditRatio');
Route::get('/admin/upload-csv','AdminController@getUploadCSV');
Route::post('/admin/upload-user-csv','AdminController@uploadUserXlsx');
Route::post('/admin/upload-gpax-csv','AdminController@uploadStudentGPAXXlsx');
Route::post('/admin/upload-course-csv','AdminController@uploadCourseXlsx');
Route::post('/admin/upload-adviser-csv','AdminController@uploadAdviserXlsx');
Route::post('/admin/upload-study-result-csv','AdminController@uploadStudentStudyResultXlsx');
Route::get('/admin/add-edit-faq','AdminController@getAddEditQA');
