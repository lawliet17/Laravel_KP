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


Auth::routes([ 'register' => false ]);

Route::middleware('auth')->group(function() {
    Route::get('/', 'AdminController@index')->name('home');
    Route::get('/buku-index', 'BukuController@index')->name('index');
    Route::get('/buku-create', 'BukuController@create')->name('bukucreate');
    Route::post('/buku-store', 'BukuController@store')->name('bukustore');
    Route::get('/buku-edit/{id}', 'BukuController@edit')->name('bukuedit');
    Route::patch('/buku-update/{id}', 'BukuController@update')->name('bukuupdate');
    Route::delete('/buku-delete/{id}', 'BukuController@destroy')->name('bukudelete');
});