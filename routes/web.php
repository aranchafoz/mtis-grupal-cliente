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
    return view('flujos.contratar');
})->name('home');

Route::get('/contratar', 'ContratarController@getView')->name('contratar');

Route::get('/subida', 'SubidaArchivosController@getView')->name('subida');
Route::post('/subida', 'SubidaArchivosController@enviarFichero')->name('subir_fichero');

Route::get('/qasoftware', 'QASoftwareController@getView')->name('qasoftware');
Route::get('/qasoftwareInformes', 'QASoftwareController@verInformes')->name('qasoftware_verInformes');
Route::post('/qasoftware', 'QASoftwareController@enviarPeticion')->name('qasoftware_peticion');

Route::get('/manufactura', 'ManufacturaController@getView')->name('manufactura');

Route::get('/ecommerce', 'ECommerceController@getView')->name('ecommerce');

Route::get('/programacion', 'ProgramacionController@getView')->name('programacion');
Route::post('/programacion', 'ProgramacionController@movePanel')->name('move_panel');
