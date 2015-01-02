<?php
class reservacionController extends BaseController
{
    /**
     * [Tabla de Prestamo]
     * @return [vista] [prestamo/list]
     */
   
    public function create()
    {

        date_default_timezone_set('America/El_Salvador');
        $prestamo = new Prestamo;
        $prestamo->fechaReserva = date("Y-m-d H:i:s");
        $prestamo->fechaDevolucion = date("Y-m-d H:i:s");

        return $this->crearReserva($prestamo, "POST", "prestamoStore", 1);
    }

    private function crearReserva($prestamo, $metodo, $ruta, $paso)
    {
         $form = new Formulario;
         $form_data = $form->formData($ruta,$metodo,false);
         
        $cliente = Cliente::where('tipo', 'local')
                                   ->where('empresa_id', Auth::user()->empresa->id)
                                   ->orWhere('tipo', 'extrangero')
                                   ->orderBy('created_at','dsc')
                                   ->lists('nombre', 'id');

         $lugares = Lugares::where('empresa_id', Auth::user()->empresa->id)->lists('nombre', 'id');

         $entrega = $lugares; //$prestamo->formLugares();
         $devolucion = $lugares; //$prestamo->formLugares();
         // $paso = 1;

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
        $data['empresa_id'] = Auth::user()->empresa->id;
        $data['estado_id'] = 1;
        // $data = $prestamo->fechaYmd($data);

        //return date('Y-m-d h:i A', strtotime($data['fechaDevolucion']));
        if($prestamo->validarPrestamo($data)) {
            return Redirect::route('selectModelo',$prestamo->id);
        }

        

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
        // $listas = new Prestamo;x
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        return $this->crearReserva($prestamo, "PATCH", array('prestamoUpdate',$id), 1);
       
    }
    /**
     * [Actualizar Datos]
     * @param  [type] $id [ID del Prestamo]
     */

    public function update($id)
    {
        $prestamo = Prestamo::find($id);
        if(is_null($prestamo))
            App::abort(404);

        $data = Input::all();
        if($prestamo->validarPrestamo($data,1)) {
            return Redirect::back();//route('selectModelo',$prestamo->id);

        } 
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
        $lista = '';

        if(is_null($prestamo))
            App::abort(404);

        $precio = Precio::find($prestamo->precio_id);
        $precioAuto = $precio->precio;

        foreach ($prestamo->extras as $key => $pivote)
            $data[] = $pivote->pivot->extra_id;

        if(!empty($data)) {
            foreach (Extra::find($data) as $valor)
                $lista[] = $valor;

        }

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



        Mail::send('prestamo.email.requerimiento',$estado,function($message) use ($prestamo) {

            $message->to($prestamo->cliente->email, $prestamo->cliente->nombre)

                ->subject('MultiAutos El Salvador');

        });



        $prestamo->estado = 'Reservado';

        $prestamo->save();

        $bitacora = new Bitacora;

        $bitacora->Guardar(10,$prestamo->id,2);

        return Redirect::route('prestamoLista');

    }
    /**
     * [Borrar Prestamo]
     * @param  [type] $id [ID del Prestamo]
     * @return [vista] [prestamo/list]
     */
    public function destroy($id)
    {
        $prestamo = Prestamo::find($id);

        if (is_null($prestamo))
            App::abort(404);
        $prestamo->cancelado = !$prestamo->cancelado;
        $prestamo->save();
        return Response::json(array('success' => 'success'),200);
        // $prestamo->delete();
        // $bitacora = new Bitacora;
        // $bitacora->Guardar(10,$id,3);
    }
}