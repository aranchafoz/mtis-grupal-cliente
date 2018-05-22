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
    return redirect()->route('contratar');
})->name('home');

Route::get('/contratar', 'ContratarController@getView')->name('contratar');
Route::post('/contratar/oferta', 'ContratarController@crearOferta')->name('crear_oferta');
Route::post('/contratar/oferta/{id}/publicar', 'ContratarController@publicarOferta')->name('publicar_oferta');
Route::post('/contratar/solicitante/{id}/evaluar', 'ContratarController@evaluarPerfil')->name('evaluar_perfil');
Route::post('/contratar/trabajador/{id}/contratar', 'ContratarController@contratarPerfil')->name('contratar_perfil');

Route::get('/subida', 'SubidaArchivosController@getView')->name('subida');
Route::post('/subida', 'SubidaArchivosController@enviarFichero')->name('subir_fichero');

Route::get('/qasoftware', 'QASoftwareController@getView')->name('qasoftware');
Route::get('/qasoftwareInformes', 'QASoftwareController@verInformes')->name('qasoftware_verInformes');
Route::post('/qasoftware', 'QASoftwareController@enviarPeticion')->name('qasoftware_peticion');

Route::get('/manufactura', 'ManufacturaController@getView')->name('manufactura');
Route::get('/materiales', 'ManufacturaController@getMaterialesAndPedidos')->name('materiales');
Route::post('/manufactura/{id}', 'ManufacturaController@actualizarPedido')->name('actualizar-pedido');

Route::get('/ecommerce', 'ECommerceController@getView')->name('ecommerce');
Route::get('/ecommerce/facturas', 'ECommerceController@getFacturas')->name('facturas');
Route::get('/ecommerce/comprar', 'ECommerceController@getViewCompra')->name('comprar');
Route::post('/ecommerce/comprar', 'ECommerceController@comprarProducto')->name('comprar_producto');

Route::get('/programacion', 'ProgramacionController@getView')->name('programacion');
Route::post('/programacion', 'ProgramacionController@movePanel')->name('move_panel');
