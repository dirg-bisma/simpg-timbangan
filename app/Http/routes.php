<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/authtimbangan/login', 'AuthTimbanganController@LoginAction');

Route::get('/spattimbangan/bynospat/{no_spat}', 'SpatTimbanganController@SearchByNoSpat');
Route::get('/spattimbangan/bynolori/{no_lori}', 'SpatTimbanganController@SearchByNoLori');

Route::post('/simpantimbangan/dcs', 'SimpanTimbanganController@SimpanDcs');
Route::post('/simpantimbangan/brutojembatan', 'SimpanTimbanganController@SimpanBrutoJembatan');
Route::post('/simpantimbangan/nettojembatan', 'SimpanTimbanganController@SimpanNettoJembatan');

Route::get('/lori/tara/{no_lori}', 'LoriController@TaraByNoLori');
Route::get('/lori/tara/{train_stat}/{no_loko}', 'LoriController@DataCetakLori');
Route::get('/lori/loko', 'LoriController@NoLoko');

Route::get('/laporan/timbangan/{status}', 'LaporanTimbanganController@LaporanHarian');
