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

Auth::routes();

Route::middleware(['date'])->group(function() {
    // Добавляем запускаемые ссылки
});

Route::middleware(['auth'])->group(function() {
    Route::get('/home', 'Admin\\AdminController@home');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('admin', 'Admin\\AdminController@index');
    Route::get('admin/dashboard', 'Admin\\AdminController@index');
    Route::get('admin/settings', 'Admin\\AdminController@settings');
    Route::post('timezone', 'Admin\\AdminController@timezone');
    Route::post('date', 'Admin\\AdminController@date');
});
