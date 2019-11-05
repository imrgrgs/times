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

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('clubes', 'User\ClubesController');
Route::resource('jogadores', 'User\JogadoresController');
Route::resource('cidades', 'Geo\CidadesController');
Route::get('cidadesByEstado/{idEstado}', 'Geo\CidadesController@cidadesByEstado');
Route::get('exportExcel', 'User\ClubesController@exportExcel');
Route::get('exportCsv', 'User\ClubesController@exportCsv');

Route::get('jogadoresexportExcel', 'User\JogadoresController@exportExcel');
Route::get('jogadoresexportCsv', 'User\JogadoresController@exportCsv');

