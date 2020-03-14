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
/*
|--------------------------------------------------------------------------
| ログイン処理
|--------------------------------------------------------------------------
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// 全ユーザ
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    // ユーザ一覧
    Route::get('/account', 'AccountController@index')->name('account.index');
  });

  // 管理者以上
  Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    // ユーザ登録
    Route::get('/account/regist', 'AccountController@regist')->name('account.regist');
    Route::post('/account/regist', 'AccountController@createData')->name('account.regist');

    // ユーザ編集
    Route::get('/account/edit/{user_id}', 'AccountController@edit')->name('account.edit');
    Route::post('/account/edit/{user_id}', 'AccountController@updateData')->name('account.edit');

    // ユーザ削除
    Route::post('/account/delete/{user_id}', 'AccountController@deleteData');
  });

  // システム管理者のみ
  Route::group(['middleware' => ['auth', 'can:system-only']], function () {

  });
