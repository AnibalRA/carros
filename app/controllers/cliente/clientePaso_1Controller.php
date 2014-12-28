<?php
class clientePaso_1Controller extends BaseController
{
    /**
     * [Tabla de Clientes]
     * @return [vista] [cliente/list]
     */
    public function lista()
    {
        $cliente = Cliente::where('tipo', 'local')
                            ->where('empresa_id', Auth::user()->empresa->id)
                            ->orWhere('tipo', 'extrangero')
                            ->orderBy('created_at','dsc')
                            ->paginate();

        return View::make('cliente.list', compact('cliente'));
    }
    /**
     * [Crear Clientes] [Formulario] [Paso 1]
     * @return [vista] [cliente/formularios/cliente]
     */
    public function create()
    {
        $cliente = new Cliente;
        $form = new Formulario;
        $form_data = $form->formData('clienteStore','POST',false);

        $sexo = [
            '' => '',
            'Hombre' => 'Hombre',
            'Mujer' => 'Mujer'
        ];

        $tipo = [
            '' => '',
            'Local' => 'Local',
            'Extrangero' => 'Extrangero'
        ];


        $paso = 1;
        return View::make('cliente.formularios.cliente', compact('cliente','form_data','sexo','tipo','paso'));
    }
    /**
     * [Guardar Datos Del Cliente]
     * @return [vista] [cliente/formularios/contacto]
     */
    public function store()
    {
        $cliente = new Cliente;
        $form = new Formulario;
        $data = Input::all();
        $data['empresa_id'] = Auth::user()->empresa->id;



        // $empresa = Auth::user()->empresa;
        // $data = $form->fechaYmd($data,1);
        // return $data;

        if($cliente->validarCliente($data))
        {
            // if(!empty($cliente->email)) {
            //     $password = new Codigo;
            //     $generado = $password->generar($cliente->id);

            //     $datosEmail = [
            //         'clave' => $generado,
            //         'nombre' => $cliente->nombre
            //     ];

            //     Mail::send('cliente.email.clave',$datosEmail,function($message) use ($cliente) {
            //         $message->to($cliente->email, $cliente->nombre)
            //             ->subject('MultiAutos El Salvador');
            //     });

            //     $cliente->password = Hash::make($generado);
            //     $cliente->save();
            // }
            return Redirect::route('clienteContacto',$cliente->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($cliente->errors);
    }
    /**
     * [Editar Clientes] [Formulario] [Paso 1]
     * @param  [type] $id [ID del Cliente]
     * @return [vista] [cliente/formularios/cliente]
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $form = new Formulario;

        if(is_null($cliente))
            App::abort(404);

        $form_data = $form->formData(array('clienteUpdate',$id),'PATCH',false);

        $sexo = [
            '' => '',
            'Hombre' => 'Hombre',
            'Mujer' => 'Mujer'
        ];

        $tipo = [
            '' => '',
            'Local' => 'Local',
            'Extrangero' => 'Extrangero'
        ];

        $cliente = $cliente->fechaDmy($cliente);
        $paso = 6;
        // return $cliente->telefono;
        return View::make('cliente.formularios.cliente', compact('cliente','form_data','sexo','tipo','paso'));
    }
    /**
     * [Actualizar Datos]
     * @param  [type] $id [ID del Cliente]
     * @return [vista] [cliente/formularios/contacto]
     */
    public function update($id)
    {
        $cliente = Cliente::find($id);
        $form = new Formulario;

        if(is_null($cliente))
            App::abort(404);

        $data = Input::all();
        $data = $form->fechaYmd($data,1);

        if($cliente->validarCliente($data)) {
            return Redirect::route('clienteContacto',$cliente->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($cliente->errors);
    }
    /**
     * [Mostrar Detalles del Cliente]
     * @param  [type] $id [description]
     * @return [vista] [cliente/show]
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $cliente = $cliente->fechaDmy($cliente);

        $galeria = Imagen::where('cliente_id',$id)
            ->orderBy('ruta_imagen','asc')
            ->get();

        $prestamo = Prestamo::where('cliente_id',$id)
            ->orderBy('horario_rsv','dsc')
            ->paginate();

        return View::make('cliente/show', compact('cliente','galeria','prestamo'));
    }
}
