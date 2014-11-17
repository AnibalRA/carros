<?php
	require __DIR__.'/../../controllers/prestamo/prestamoPaso_2Controller.php';
    /**
     * [Seleccionar Modelo del Auto]
     * @return [vista]     [prestamo/select]
     */
    Route::get('prestamo/{id}/select',[
        'as' => 'selectModelo',
        'uses' => 'prestamoPaso_2Controller@select'
    ]);
    /**
     * [Guardar Datos Del Prestamo] [Modelo] [Precio]
     * @return [route] [selectExtra]
     */
    Route::get('prestamo/{prestamo_id}/storePaso2/{modelo_id}/{precio_id}',[
        'as' => 'selectAuto',
        'uses' => 'prestamoPaso_2Controller@store'
    ]);
    /**
     * [Quitar Modelo del Auto]
     * @return [route] [selectModelo]
     */
    Route::get('prestamo/{id}/cambiarAuto',[
        'as' => 'quitarModelo',
        'uses' => 'prestamoPaso_2Controller@quitar'
    ]);