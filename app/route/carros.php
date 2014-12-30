<?php

Route::get('carros', 				['as' => 'carros', 			'uses' => 'CarroController@index']);
Route::get('carro/nuevo', 			['as' => 'carroNuevo', 		'uses' => 'CarroController@nuevo']);
Route::post('carro/nuevo', 			['as' => 'carroGuardar', 	'uses' => 'CarroController@guardar']);
Route::get('carro/{id}/editar',		['as' => 'carroEditar',		'uses' => 'CarroController@editar']);
Route::patch('carro/{id}/editar',	['as' => 'carroUpdate',		'uses' => 'CarroController@update']);




Route::get('carro/{id}/placas',		['as' => 'carroPlacas',		'uses' => 'PlacasController@index']);
Route::post('carro/{id}/placas',	['as' => 'placaGuardar',	'uses' => 'PlacasController@guardar']);
Route::get('carro/placa/{id}',		['as' => 'placaEditar',		'uses' => 'PlacasController@editar']);
Route::patch('carro/placa/{id}',	['as' => 'placaUpdate',		'uses' => 'PlacasController@update']);




Route::get('carro/{id}/precios',	['as' => 'carroPrecios',	'uses' => 'PrecioController@index']);
Route::post('carro/{id}/precio',	['as' => 'precioGuardar',	'uses' => 'PrecioController@guardar']);
Route::get('carro/{id}/precio',		['as' => 'precioEditar',	'uses' => 'PrecioController@editar']);
Route::patch('carro/{id}/precio',	['as' => 'precioUpdate',	'uses' => 'PrecioController@update']);