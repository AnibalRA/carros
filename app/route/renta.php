<?php

Route::get('/', 		['as' => 'home', 'uses' => 'rentaController@index']);


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