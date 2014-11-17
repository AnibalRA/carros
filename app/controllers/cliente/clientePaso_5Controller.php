<?php
class clientePaso_5Controller extends BaseController
{
    /**
     * [Crear Comentario] [Formulario] [Paso 5]
     * @return [vista] [cliente/formularios/comentario]
     */
    public function comentario($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $form = new Formulario;
        $form_data = $form->formData(array('comentarioStore',$id),'PATCH',false);
        $paso = 5;
        return View::make('cliente.formularios.comentarios', compact('cliente','form_data','paso'));
    }
    /**
     * [Guardar Comentario]
     * @return [type] [description]
     */
    public function storage($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $data = Input::all();
        $cliente->fill($data);
        $cliente->save();
        $bitacora = new Bitacora;
        $bitacora->Guardar(2,$cliente->id,2);
        return Redirect::route('clienteLista');
    }
}