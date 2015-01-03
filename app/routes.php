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

Route::group(array('prefix' => '/'), function(){
    require __DIR__ . '/route/renta.php';
});



Route::get('pdf1', function(){
    return View::make('pdfs.contrato');
});

Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@postLogin');

Route::group(array('before'=>'auth'), function() {


    Route::group(array('prefix' => 'admin'), function(){
    // Route::get('/', function() {
    //     return Redirect::to('prestamo');
    // });

        require __DIR__ . '/route/inicio.php';
        require __DIR__ . '/route/api.php';

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

        require __DIR__.'/route/Marca.php';
        require __DIR__.'/route/Tipo.php';


        Route::get(     'extra',             ['as' => 'extra',       'uses' => 'ExtraController@index'] );
        Route::get(     'extra/create',      ['as' => 'extraNuevo',  'uses' => 'ExtraController@create']);
        Route::post(    'extra/create',      ['as' => 'extraSave',   'uses' => 'ExtraController@store']);
        Route::get(     'extra/{id}/edit',   ['as' => 'extraEdit',   'uses' => 'ExtraController@edit']);
        Route::patch(   'extra/{id}/update', ['as' => 'extraUpdate', 'uses' => 'ExtraController@update']);
        Route::delete(  'extra/{id}/destroy',['as' => 'extraDestroy','uses' => 'ExtraController@destroy']);
        

        // Route::resource('extra','ExtraController');


        require __DIR__.'/route/carros.php';
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
});