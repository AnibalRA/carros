<?php
class clientePaso_3Controller extends BaseController
{
    /**
     * [Crear Contacto Adicional] [Formulario] [Paso 3]
     * @return [vista] [cliente/formularios/contacto]
     */
    public function adicional($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $cliente = $cliente->fechaDmy($cliente);
        $form = new Formulario;
        $form_data = $form->formData(array('adicionalStore',$id),'PATCH',true);
        $paso = 3;
        return View::make('cliente.formularios.adicional', compact('cliente','form_data','paso'));
    }
    /**
     * [Guardar Datos Del Contacto]
     * @return [type] [description]
     */
    public function storage($id)
    {
        $form = new Formulario;
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $form = new Formulario;
        $data = Input::all();
        $data = $form->fechaYmd($data,2);
        $file = Input::file('ruta_imagen');

        if(Input::file('ruta_imagen')) {
            $data['ruta_imagen'] = Input::file('ruta_imagen')->getClientOriginalName();
            $file->move("assets/img",$data['ruta_imagen']);
        } else
            $data['ruta_imagen'] = $cliente->ruta_imagen;

        if($cliente->validAndSave($data,3)) {
            $bitacora = new Bitacora;
            $bitacora->Guardar(2,$cliente->id,2);
            return Redirect::route('clienteFoto',$cliente->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($cliente->errors);
    }
}