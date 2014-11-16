<?php
    /**
     * [Buscar Datos]
     * @return [route] [Buscar Datos Según La Tabla]
     */
	Route::post('buscar',[
		'as' => 'buscarTabla',
		'uses' => 'BuscarController@buscar'
	]);
    /**
     * [Buscar Usuario]
     * @param  [type] $dato [description]
     * @return [vista] [user/list]
     */
	Route::get('buscar/{id}/user',[
		'as' => 'buscarUser',
		'uses' => 'buscarController@usuario'
	]);
    /**
     * [Buscar Cliente]
     * @param  [type] $dato [description]
     * @return [vista] [cliente/list]
     */
	Route::get('buscar/{id}/cliente',[
		'as' => 'buscarCliente',
		'uses' => 'buscarController@cliente'
	]);
    /**
     * [Buscar Marca]
     * @param  [string] $dato [cadena de texto]
     * @return [vista] [auto/marca/list]
     */
	Route::get('buscar/{id}/marca',[
		'as' => 'buscarMarca',
		'uses' => 'buscarController@marca'
	]);
    /**
     * [Buscar Tipo]
     * @param  [string] $dato [cadena de texto]
     * @return [vista] [auto/tipo/list]
     */
	Route::get('buscar/{id}/tipo',[
		'as' => 'buscarTipo',
		'uses' => 'buscarController@tipo'
	]);
    /**
     * [Buscar Modelo]
     * @param  [string] $dato [cadena de texto]
     * @return [vista] [auto/modelo/list]
     */
	Route::get('buscar/{id}/modelo',[
		'as' => 'buscarModelo',
		'uses' => 'buscarController@modelo'
	]);
    /**
     * [Buscar Extra]
     * @return [vista] [extra/list]
     */
	Route::get('buscar/{id}/extra',[
		'as' => 'buscarExtra',
		'uses' => 'buscarController@extra'
	]);