<?php

class ProspectoController extends BaseController

{

    /**

     * [Tabla de Prospectos]

     * @return [vista] [prospecto/list]

     */

    public function lista()

    {

        $prospecto = Prospecto::orderBy('created_at','dsc')

            ->paginate();



        return View::make('prospecto.list', compact('prospecto'));

    }

    /**

     * [Crear Prospecto] [Formulario]

     * @return [vista] [prospecto/form]

     */

    public function create()

    {

        $prospecto = new Prospecto;

        $form = new Formulario;

        $form_data = $form->formData('prospectoStore','POST',false);



        $sexo = [

            '' => '',

            'Hombre' => 'Hombre',

            'Mujer' => 'Mujer'

        ];



        return View::make('prospecto.form', compact('prospecto','form_data','sexo'));

    }

    /**

     * [Guardar Datos Del Prospecto]

     * @return [vista] [prospecto/list]

     */

    public function store()

    {

        $prospecto = new Prospecto;

        $data = Input::all();

        $data["fecha_nac"] = (empty($data["fecha_nac"])) ? '' : date('Y-m-d', strtotime($data["fecha_nac"]));



        if($prospecto->validAndSave($data)) {

            $bitacora = new Bitacora;

            $bitacora->Guardar(11,$prospecto->id,1);

            return Redirect::route('prospectoList');

        } else

            return Redirect::back()

                ->withInput()

                ->withErrors($prospecto->errors);

    }

    /**

     * [Editar Prospecto] [Formulario]

     * @param  [type] $id [ID del Prospecto]

     * @return [vista] [prospecto/form]

     */

    public function edit($id)

    {

        $prospecto = Prospecto::find($id);

        $form = new Formulario;



        if(is_null($prospecto))

            App::abort(404);



        $form_data = $form->formData(array('prospectoUpdate',$id),'PATCH',false);



        $sexo = [

            '' => '',

            'Hombre' => 'Hombre',

            'Mujer' => 'Mujer'

        ];



        $prospecto->fecha_nac = ($prospecto->fecha_nac == '0000-00-00') ? '' : date('d-m-Y', strtotime($prospecto->fecha_nac));

        return View::make('prospecto.form', compact('prospecto','form_data','sexo'));

    }

    /**

     * [Actualizar Datos]

     * @param  [type] $id [ID del Cliente]

     * @return [vista] [cliente/formularios/contacto]

     */

    public function update($id)

    {

        $prospecto = Prospecto::find($id);



        if(is_null($prospecto))

            App::abort(404);



        $data = Input::all();

        $data["fecha_nac"] = (empty($data["fecha_nac"])) ? '' : date('Y-m-d', strtotime($data["fecha_nac"]));



        if($prospecto->validAndSave($data)) {

            $bitacora = new Bitacora;

            $bitacora->Guardar(11,$prospecto->id,2);

            return Redirect::route('prospectoList');

        } else

            return Redirect::back()

                ->withInput()

                ->withErrors($prospecto->errors);

    }

    /**

     * [Mostrar Detalles del Prospecto]

     * @param  [type] $id [ID del Prospecto]

     * @return [vista] [prospecto/show]

     */

    public function show($id)

    {

        $prospecto = Prospecto::find($id);



        if(is_null($prospecto))

            App::abort(404);



        $prospecto->fecha_nac = ($prospecto->fecha_nac == '0000-00-00') ? '' : date('d-m-Y', strtotime($prospecto->fecha_nac));

        return View::make('prospecto.show', compact('prospecto'));

    }

    /**

     * [Borrar Prospecto]

     * @param  [type] $id [ID del Prospecto]

     * @return [vista] [prospecto/list]

     */

    public function destroy($id)

    {

        $prospecto = Prospecto::find($id);



        if (is_null($prospecto))

            App::abort(404);



        $prospecto->delete();

        $bitacora = new Bitacora;

        $bitacora->Guardar(11,$id,3);

    }

    /**

     * [Convertir Prospecto a Cliente]

     * @param  [type] $id [ID del Prospecto]

     * @return [vista] [prospecto/list]

     */

    public function convertir($id)

    {

        $prospecto = Prospecto::find($id);



        if (is_null($prospecto))

            App::abort(404);



        $cliente = new Cliente;

        $cliente->nombre = $prospecto->nombre;

        $cliente->direccion = $prospecto->direccion;

        $cliente->doc_unico = $prospecto->doc_unico;

        $cliente->sexo = $prospecto->sexo;

        $cliente->email = $prospecto->email;

        $cliente->fecha_nac = $prospecto->fecha_nac;

        $cliente->telefono = $prospecto->telefono;

        $cliente->celular = $prospecto->celular;

        $cliente->save();

        $bitacora = new Bitacora;

        $bitacora->Guardar(11,$id,2);

        $prospecto->delete();

        $bitacora->Guardar(2,$cliente->id,1);

        return Redirect::route('clienteEditar',$cliente->id);

    }

}