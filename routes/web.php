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
Route::get('/inventori', 'AparController@index')->name('inventori');
Route::get('/inspeksi', 'FormController@index')->name('inspeksi');
Route::get('/scan', 'HomeController@scan')->name('scan');
Route::get('/form/{apar}', 'FormController@create');
Route::post('/validasi', 'HomeController@validasi')->name('validasi');
Route::post('/form/store', 'FormController@store');
Route::post('/apar/store', 'AparController@store');
Route::post('/cekid', 'AparController@cekid');
Route::patch('/apar/edit', 'AparController@edit');
Route::delete('/apar/delete', 'AparController@destroy');
