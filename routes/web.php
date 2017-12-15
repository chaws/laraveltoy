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

Route::get('/property', 'PropertyController@index');
Route::get('/property/add', 'PropertyController@add');
Route::post('/property/submit', 'PropertyController@submit');

Route::get('/weather', 'WeatherController@temp');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');
