<?php

	require __DIR__.'/../../controllers/prestamo/prestamoPaso_1Controller.php';

    /**
     * [Tabla de Prestamos]
     * @return [vista] [prestamo/list]
     */

	Route::get('prestamo',[

        'as' => 'prestamoLista',

        'uses' => 'prestamoPaso_1Controller@lista'

    ]);

    /**
     * [Crear Prestamo - Formulario] [Paso 1]
     * @return [vista] [prestamo/form]
     */

    Route::get('prestamo/create',[

        'as' => 'prestamoNuevo',

        'uses' => 'prestamoPaso_1Controller@create'

    ]);

    /**
     * [Guardar Datos Del Prestamo]
     * @return [route] [selectModelo]
     */

    Route::post('prestamo/store',[

        'as' => 'prestamoStore',

        'uses' => 'prestamoPaso_1Controller@store'

    ]);

    /**
     * [Editar Prestamo] [Formulario] [Paso 1]
          * @return [vista] [prestamo/form]
     */

    Route::get('prestamo/{id}/edit',[

        'as' => 'prestamoEditar',

        'uses' => 'prestamoPaso_1Controller@edit'

    ]);

    /**
     * [Actualizar Datos]
     * @return [route] [selectModelo]
     */

    Route::patch('prestamo/{id}/update',[

        'as' => 'prestamoUpdate',

        'uses' => 'prestamoPaso_1Controller@update'

    ]);

    /**
     * [Mostrar Detalles del Prestamo]
     * @return [vista] [prestamo/show]
     */

    Route::get('prestamo/{id}/show',[

        'as' => 'prestamoShow',

        'uses' => 'prestamoPaso_1Controller@show'

    ]);

    /**
     * [Confirmar Prestamo]
     * @return [route] [Prestamo/List]
     */

    Route::get('prestamo/{prestamo_id}/confirmar/{modelo_id}',[

        'as' => 'prestamoConfirmar',

        'uses' => 'prestamoPaso_1Controller@confirmar'

    ]);

    /**
     * [Requerimiento de Pago]
     * @return [route] [Prestamo/List]
     */

    Route::get('prestamo/{id}/requerimiento',[

        'as' => 'prestamoRequerimiento',

        'uses' => 'prestamoPaso_1Controller@requerimiento'

    ]);
    /**
     * [Borrar Cliente]
     * @param  [type] $id [ID del Cliente]
     * @return [vista] [cliente/list]
     */
    Route::delete('prestamo/destroy/{id}',[
        'as' => 'prestamoDestroy',
        'uses' => 'prestamoPaso_1Controller@destroy'
    ]);