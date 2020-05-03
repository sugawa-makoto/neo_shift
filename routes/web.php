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

Route::get('/youbi_user', 'CreateShiftController@youbi_user');
Route::get('/holiday_user', 'CreateShiftController@holiday_user');
Route::post('/holiday_user', 'CreateShiftController@holiday_user_post');
Route::get('/del_youbi_user', 'CreateShiftController@del_youbi_user');
Route::get('/shift_user', 'CreateShiftController@shift_user');
Route::get('/youbi_user_week_group', 'CreateShiftController@youbi_user_week_group');
Route::get('/youbi_shift_user', 'CreateShiftController@youbi_shift_user');
Route::get('/youbi_user_one_week', 'CreateShiftController@youbi_user_one_week');
Route::get('/shift_user_who', 'CreateShiftController@shift_user_who');
Route::get('/shift_who', 'CreateShiftController@shift_who');
Route::get('/shift_who_next', 'CreateShiftController@shift_who_next');
Route::get('/shift_ninzuu', 'CreateShiftController@shift_ninzuu');
Route::get('/one_button', 'CreateShiftController@one_button');

Route::get('/create_necessary_list', 'NecessaryController@create_necessary_list');
Route::get('/create_necessary_list_search', 'NecessaryController@search');
Route::post('/create_necessary_list_search_post', 'NecessaryController@post');
Route::post('/create_necessary_list_search_update', 'NecessaryController@update');


Route::get('/necessary_staff_form', 'NecessaryStaffController@necessary_staff_form');
Route::post('/necessary_staff_form_post', 'NecessaryStaffController@necessary_staff_form_post');

Route::get('/company_setting_necessary_form', 'Company_SettingController@company_setting_necessary_form');
Route::post('/company_setting_necessary_form_post', 'Company_SettingController@company_setting_necessary_form_post');
Route::get('/company_setting_company_name_form', 'Company_SettingController@company_setting_company_name_form');
Route::post('/company_setting_company_name_form_post', 'Company_SettingController@company_setting_company_name_form_post');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



