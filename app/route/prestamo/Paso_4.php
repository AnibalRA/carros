<?php
    Route::get('prestamo/{id}/pago',['as' => 'formaPago', 'uses' => 'prestamoPaso_4Controller@pago' ]);
    Route::get('prestamo/{id}/precioStore',['as' => 'precioStore','uses' => 'prestamoPaso_4Controller@store' ]);