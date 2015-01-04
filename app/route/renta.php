<?php

Route::get('/', 			['as' => 'home', 		'uses' => 'rentaController@index']);
Route::post('/choose-car',	['as' => 'chooseCar', 	'uses' => 'rentaController@chooseCar']);
Route::get('/choose-car',	['as' => 'chooseCar', 	'uses' => 'rentaController@chooseCar']);

Route::get('/cars/{inicio}/{fin}', 		['as' => 'carros', 		'uses' => 'rentaController@carros']);
Route::get('/choose-extras', 			['as' => 'extras', 		'uses' => 'rentaController@chooseExtras']);
Route::get('/extras',					['as' => 'extrasJSON',	'uses' => 'rentaController@extras']);

Route::get('/revisar',			['as' => 'revisar', 			'uses' => 'rentaController@revisar']);
Route::post('/guardar',	 		['as' => 'prestamoClienteSave', 'uses' => 'rentaController@prestamoSave']);
Route::get('/user',				['as' => 'user', 				'uses' => 'rentaController@user']);
// Route::post('/save')




Route::get('/nosotros', ['as' => 'nosotros']);
Route::get('/nosotros', ['as' => 'faq']);
Route::get('/nosotros', ['as' => 'pedido']);
Route::get('/nosotros', ['as' => 'editPerfil']);
Route::get('/nosotros', ['as' => 'historial']);
Route::get('/nosotros', ['as' => 'reservaStore']);
Route::get('/nosotros', ['as' => 'show']);

Route::get('/nosotros', ['as' => 'boletin']);
Route::get('/nosotros', ['as' => 'privacidad']);
Route::get('/nosotros', ['as' => 'servicios']);
Route::get('/nosotros', ['as' => 'terminos']);
Route::get('/nosotros', ['as' => 'contactenos']);