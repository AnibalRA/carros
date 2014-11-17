<?php
	require __DIR__.'/../../controllers/prestamo/prestamoPaso_3Controller.php';
    /**
     * [Seleccionar Accesorios]
     * @return [vista]     [prestamo/select]
     */
    Route::get('prestamo/{id}/extra',[
        'as' => 'selectExtras',
        'uses' => 'prestamoPaso_3Controller@select'
    ]);
    /**
     * [Guardar Datos Del Prestamo] [Extra]
     * @return [route] [formaPago]
     */
    Route::patch('prestamo/{id}/storeExtra',[
        'as' => 'extraStore',
        'uses' => 'prestamoPaso_3Controller@store'
    ]);
    /**
     * [Quitar Accesorio]
     * @return [route] [selectExtra]
     */
    Route::get('prestamo/{prestamo_id}/quitarExtra/{extra_id}',[
        'as' => 'quitarExtra',
        'uses' => 'prestamoPaso_3Controller@quitar'
    ]);