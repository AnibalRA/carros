<?php
/**
 * [Editar Contrato] [Formulario]
 * @return [type]     [JSON]
 */
Route::get('contrato/{id}/edit',[
    'as' => 'contratoEditar',
    'uses' => 'PdfController@edit'
]);
/**
 * [Contrato de Arrendamiento]
 * @return [vista]     [pdfs/contrato]
 */
Route::get('/contrato/{id}',[
    'as' => 'pdfContrato',
    'uses' => 'PdfController@contrato'
]);