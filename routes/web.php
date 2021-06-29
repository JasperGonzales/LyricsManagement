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

// Login
Route::get('',              'LoginController@login');
Route::get('login',         'LoginController@login');
Route::get('logout',        'LoginController@logout');

// Dashboard
Route::post('check_user',       'LoginController@check_user');
Route::get('dashboard',         'Dashboard@index')->middleware('UrlValidation');
Route::get('display-add-song',  'SongMaintenancecontroller@index')->middleware('UrlValidation');
Route::post('get-song-list',     'SongMaintenancecontroller@get_song_list');

// Maintenance
Route::post('get-song-detail',  'SongMaintenancecontroller@get_song_detail');
Route::post('edit-song',        'SongMaintenancecontroller@edit_song');
Route::post('save-song',        'SongMaintenancecontroller@save_song');
Route::post('delete-song',      'SongMaintenancecontroller@delete_song');