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
    return view('index');
});

//Route::resource('pertanyaan', 'PertanyaanController');
Route::get('/pertanyaan', 'PertanyaanController@index');
Route::get('/pertanyaan/create', 'PertanyaanController@create')->name('pertanyaan.create');
Route::post('/pertanyaan', 'PertanyaanController@store')->name('pertanyaan.store');

Route::get('/pertanyaan/{tanya_id}', 'PertanyaanController@show')->name('pertanyaan.show');
Route::get('/pertanyaan/{tanya_id}/edit', 'PertanyaanController@edit')->name('pertanyaan.edit');
Route::put('/pertanyaan/{tanya_id}', 'PertanyaanController@update')->name('pertanyaan.update');
Route::delete('/pertanyaan', 'PertanyaanController@destroy')->name('pertanyaan.destroy');
