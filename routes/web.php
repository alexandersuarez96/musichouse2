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

Route::get('/principal', function () {
    return view('principal');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/album', 'AlbumController');
Route::resource('/home_music', 'HomeMusicController');
Route::resource('/medio', 'MedioController');
Route::resource('/author', 'AuthorController');
Route::resource('/singer', 'SingerController');
Route::resource('/song_type', 'SongTypeController');
Route::resource('/song', 'SongController');

Route::get('/home', 'HomeController@index')->name('home');
