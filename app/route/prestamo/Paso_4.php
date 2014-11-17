<?php
	require __DIR__.'/../../controllers/prestamo/prestamoPaso_4Controller.php';
    /**
     * [Forma de Pago] [Formulario] [Paso 4]
     * @return [vista]     [prestamo/pago]
     */
    Route::get('prestamo/{id}/pago',[
        'as' => 'formaPago',
        'uses' => 'prestamoPaso_4Controller@pago'
    ]);
    /**
     * [Guardar Datos Del Prestamo]
     * @return [route] [prestamoShow]
     */
    Route::get('prestamo/{id}/precioStore',[
        'as' => 'precioStore',
        'uses' => 'prestamoPaso_4Controller@store'
    ]);