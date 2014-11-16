<?php
class prestamoPaso_1Controller extends BaseController
{
    /**
     * [Tabla de Prestamo]
     * @return [vista] [prestamo/list]
     */
    public function lista()
    {
        $prestamo = Prestamo::orderBy('horario_rsv','asc')
            ->paginate();

        $form_data = [
            'class' => 'form-horizontal',
            'method' => 'get',
            'id' => 'formContrato'
        ];

        $mensaje = 'El campo no tiene que quedar vacío';
        return View::make('prestamo.list', compact('prestamo','form_data','mensaje'));
    }
    /**
     * [Crear Prestamo] [Formulario] [Paso 1]
     * @return [vista] [prestamo/form]
     */
    public function create()
    {
        $prestamo = new Prestamo;
        $form = new Formulario;
        $form_data = $form->formData('prestamoStore','POST',false);
        $cliente = $prestamo->formCliente();
        $entrega = $prestamo->formLugares();
        $devolucion = $prestamo->formLugares();
        $paso = 1;
        return View::make('prestamo/form', compact('prestamo','form_data','cliente','entrega','devolucion','paso'));
    }
    /**
     * [Guardar Datos Del Prestamo]
     * @return [route] [selectModelo]
     */
    public function store()
    {
        $prestamo = new Prestamo;
        $data = Input::all();
        $data = $prestamo->fechaYmd($data);

        if($prestamo->validAndSave($data,1)) {
            $bitacora = new Bitacora;
            $bitacora->Guardar(10,$prestamo->id,1);
            return Redirect::route('selectModelo',$prestamo->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($prestamo->errors);
    }
    /**
     * [Editar Prestamo] [Formulario] [Paso 1]
     * @param  [type] $id [ID del Prestamo]
     * @return [vista] [prestamo/form]
     */
    public function edit($id)
    {
        $form = new Formulario;
        $listas = new Prestamo;
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $form_data = $form->formData(array('prestamoUpdate',$id),'PATCH',false);
        $cliente = $listas->formCliente();
        $entrega = $listas->formLugares();
        $devolucion = $listas->formLugares();
        $prestamo->horario_rsv = date('d-m-Y h:i A', strtotime($prestamo->horario_rsv));
        $prestamo->horario_dvl = date('d-m-Y h:i A', strtotime($prestamo->horario_dvl));
        $paso = 5;
        return View::make('prestamo/form', compact('prestamo','form_data','cliente','entrega','devolucion','paso'));
    }
    /**
     * [Actualizar Datos]
     * @param  [type] $id [ID del Prestamo]
     * @return [route] [selectModelo]
     */
    public function update($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $data = Input::all();
        $data = $prestamo->fechaYmd($data);

        if($prestamo->validAndSave($data,1)) {
            $bitacora = new Bitacora;
            $bitacora->Guardar(10,$prestamo->id,2);
            return Redirect::route('selectModelo',$prestamo->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($prestamo->errors);
    }
    /**
     * [Mostrar Detalles del Prestamo]
     * @param  [type] $id [ID del Prestamo]
     * @return [vista] [prestamo/show]
     */
    public function show($id) {
        $data = '';
        $prestamo = Prestamo::find($id);
        $pago = new Pago;

        if(is_null($prestamo))
            App::abort(404);

        $precio = Precio::find($prestamo->precio_id);
        $precioAuto = $precio->precio;

        foreach ($prestamo->extras as $key => $pivote)
            $data[] = $pivote->pivot->extra_id;

        if($data != '') {
            foreach (Extra::find($data)->lists('extra') as $valor)
                $lista[] = $valor;
        } else
            $lista[] = '';

        $caso = 0;
        $resultado = $pago->formaPago($prestamo,$precioAuto,'',$lista,$caso);
        return $resultado;
    }
    /**
     * [Confirmar Prestamo]
     * @param  [type] $prestamo_id [ID del prestamo]
     * @param  [type] $modelo_id   [ID del modelo]
     * @return [route]              [Prestamo/List]
     */
    public function confirmar($prestamo_id,$modelo_id)
    {
        $pago = new Pago;
        $prestamo = Prestamo::find($prestamo_id);

        if(is_null($prestamo))
            App::abort(404);

        $precio = Precio::find($prestamo->precio_id);
        $precioAuto = $precio->precio;
        $caso = 1;
        $resultado = $pago->formaPago($prestamo,$precioAuto,'','',$caso);
        return $resultado;
    }
    /**
     * [Requerimiento de Pago]
     * @param  [type] $id [ID del prestamo]
     * @return [route] [Prestamo/List]
     */
    public function requerimiento($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $estado = [ 'estado' => 'esto es una prueba'];

        Mail::send('prestamo.email.Requerimiento',$estado,function($message) use ($prestamo) {
            $message->to($prestamo->cliente->email, $prestamo->cliente->nombre)
                ->subject('MultiAutos El Salvador');
        });

        $prestamo->estado = 'Reservado';
        $prestamo->save();
        $bitacora = new Bitacora;
        $bitacora->Guardar(10,$prestamo->id,2);
        return Redirect::route('prestamoLista');
    }
}