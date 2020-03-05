<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/datepicker', function () {
    return view('datepicker');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/loginform', function () {
    return view('formlogin');
});
Route::get('/sidebar', function () {
    return view('mainuser');
});

Route::get('/hospital','HospitalController@showState');
Route::get('/application','ApplicationController@applicationForm');
Route::get('/applicationList','ApplicationController@applicationList');
Route::get('/applicationView','ApplicationController@applicationForm');
Route::get('/applicationView/{appid}/{finyear}', 'ApplicationController@viewApplication');
Route::POST('/applicationView/{appid}/{finyear}', 'ApplicationController@viewApplication');


Route::POST('/fn_hospital_add', 'HospitalController@fn_addHospital');
Route::POST('/fn_application_add','ApplicationController@fn_addApplication');
Route::POST('/fn_application_update','ApplicationController@fn_updateApplication');
Route::get('/updateMB', 'ApplicationController@fn_updateApplication');
Route::post('/postajax','AjaxController@post');

