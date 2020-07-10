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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/filme/salvar', 'FilmeController@salvar')->middleware('auth')->name('filme.salvar');
Route::get('/filme/deletar/{id}', 'FilmeController@deletar')->middleware('auth')->name('filme.deletar');
Route::post('/filme/buscar', 'FilmeController@buscar')->middleware('auth')->name('filme.buscar');
Route::post('/filme/alterar', 'FilmeController@alterar')->middleware('auth')->name('filme.alterar');
