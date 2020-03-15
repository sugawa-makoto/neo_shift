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
Route::get('/create_dates_table', 'DateController@create_dates_table');
Route::get('/times_setting_form', 'TimeController@times_setting_form');
Route::post('/times_setting_form', 'TimeController@times_setting_form_post');
Route::get('/user_add_form', 'AddUserController@user_add_form');
Route::post('/user_add_form', 'AddUserController@user_add_form_post');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



