<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('pdf1', function(){
    return View::make('pdfs.contrato');
});

Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@postLogin');
Route::group(array('before'=>'auth'), function() {
    Route::get('/', function() {
        return Redirect::to('prestamo');
    });
    Route::get('logout', 'LoginController@logOut');
    Route::resource('user','UserController');
    /**
     * [url] [/clientes]
     */
    require __DIR__.'/route/cliente/Paso_1.php';
    require __DIR__.'/route/cliente/Paso_2.php';
    require __DIR__.'/route/cliente/Paso_3.php';
    require __DIR__.'/route/cliente/Paso_4.php';
    require __DIR__.'/route/cliente/Paso_5.php';
    /**
     * [url] [/marcas]
     */
    require __DIR__.'/route/Marca.php';
    /**
     * [url] [/tipos]
     */
    require __DIR__.'/route/Tipo.php';
    /**
     * [url] [/modelos]
     */
    require __DIR__.'/route/modelo/Paso_1.php';
    require __DIR__.'/route/modelo/Paso_2.php';
    require __DIR__.'/route/modelo/Paso_3.php';
    /**
     * [url] [/extras]
     */
    Route::resource('extra','ExtraController');
    /**
     * [url] [/prestamos]
     */
    require __DIR__.'/route/prestamo/Paso_1.php';
    require __DIR__.'/route/prestamo/Paso_2.php';
    require __DIR__.'/route/prestamo/Paso_3.php';
    require __DIR__.'/route/prestamo/Paso_4.php';
    /**
     * [url] [/contratos]
     */
    require __DIR__.'/route/Pdf.php';
    /**
     * [url] [/prospectos]
     */
    require __DIR__.'/route/Prospecto.php';
    /**
     * [url] [/boletin]
     * [Tabla de Boletines]
     * @return [vista] [boletin/list]
     */
    Route::get('boletin',[
        'as' => 'boletinLista',
        'uses' => 'BoletinController@lista'
    ]);
    /**
    ** URL / BUSCAR
    **/
    require __DIR__.'/route/Buscar.php';
});