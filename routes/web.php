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

Route::get('/', 'HomeController@home')->name('home');

Route::view('/register', 'register');
Route::view('/login', 'login');

Route::match(['get', 'post'], '/post-register', 'Auth\RegisterController@postRegister')->name('post-register');


Route::post('/register', 'Auth\RegisterController@store');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/search', 'SerieController@search');
Route::get('/series', 'SerieController@plusSeries')->name('serie.plus');
Route::get('/recommandations', 'SerieController@plusRecommandations')->name('recommandations.plus');
Route::get('/tendances', 'SerieController@plusTendances')->name('tendances.plus');
Route::get('/serie/{id}', 'SerieController@show')->name('serie.show');

/*Route::get('/test', function () {
    return DictSerie::userLike(4, 1);
});*/

Route::prefix('administration')->namespace('Admin')->group(function () {
    //Route::get('/', 'AdminController@index')->name('admin.index');
    //...
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/edit', 'AdminController@actionsEditDelete')->name('admin.edit');
    Route::get('/delete', 'AdminController@actionsEditDelete')->name('admin.delete');
});
