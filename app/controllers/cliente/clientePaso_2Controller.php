<?php
class clientePaso_2Controller extends BaseController
{
    /**
     * [Crear Contactos] [Formulario] [Paso 2]
     * @return [vista] [cliente/formularios/contacto]
     */
    public function contacto($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $form = new Formulario;
        $form_data = $form->formData(array('contactoStore',$id),'PATCH',false);
        $paso = 2;
        return View::make('cliente.formularios.contacto', compact('cliente','form_data','paso'));
    }
    /**
     * [Guardar Datos Del Contacto]
     * @return [vista] [cliente/foemularios/adicional]
     */
    public function storage($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $data = Input::all();

        if($cliente->validAndSave($data,2)) {
            $bitacora = new Bitacora;
            $bitacora->Guardar(2,$cliente->id,2);
            return Redirect::route('clienteAdicional',$cliente->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($cliente->errors);
    }
}