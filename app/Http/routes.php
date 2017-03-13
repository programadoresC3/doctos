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
Route::get('login', function() {
    return view('login');
});

Route::post('log', 'LogController@store');
Route::get('logout', 'LogController@logout');

Route::group(['middleware' => ['UsuarioLogueado']], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('doctos_index', 'DocumentosController@index');
    Route::get('doctos_nuevo', 'DocumentosController@nuevo');
    Route::post('docto_grabar', 'DocumentosController@insertarDocumento');
    Route::get('doctos_editar/{id}', 'DocumentosController@editar');
    Route::post('doctos_actualizar','DocumentosController@actualizar');
    Route::get('incidencias_index', 'IncidenciaController@index');
    Route::get('incidencias_nuevo', 'IncidenciaController@nuevo');
    Route::post('incidencias_grabar', 'IncidenciaController@insertaIncidencia');
    Route::get('incidencias_editar/{id}', 'IncidenciaController@editar');
    Route::post('incidencias_actualizar', 'IncidenciaController@actualizar');
    Route::get('informe_index', 'InformeController@index');
    Route::get('informeNuevo', 'InformeController@nuevo');
    Route::post('informeInsertar', 'InformeController@insertar');
    Route::get('informeEditar/{id}', 'InformeController@editar');
    Route::post('informeActualizar', 'InformeController@actualizar');
});