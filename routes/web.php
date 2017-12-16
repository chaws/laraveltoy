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

/*
 |  Rota padrao
 */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
 |  Rotas especificas para o dashboard
 */
Route::get('/dashboard', 'DashboardController@index')->name('home');

/*
 | Rotas para inserir/editar/consultar/deletar Numeros (propriedade)
 */
Route::get('/property', 'PropertyController@index');
Route::get('/property/add', 'PropertyController@add');
Route::get('/property/edit/{id}', 'PropertyController@edit');
Route::get('/property/del/{id}', 'PropertyController@del');
Route::post('/property/submit', 'PropertyController@submit');

/*
 |  Rota para consultar a temperatura atual de SP
 */
Route::get('/weather', 'WeatherController@temp');

/*
 |  Rota para consultar uma noticia sobre imoveis
 */
Route::get('/news/{id}', 'NewsController@get');
