 <?php

class rentaController extends BaseController{

	public function index(){
        $lugares = Lugares::where('empresa_id', 1)//Auth::user()->empresa->id)
                            ->lists('nombre', 'id');
        $clase = "left-slider two-column";
        $paso = 1;
        return View::make('renta.home', compact('lugares', 'clase', 'paso'));
	}

    public function chooseCar(){
        // return $carros;
        $lugares = Lugares::where('empresa_id', 1)//Auth::user()->empresa->id)
                            ->lists('nombre', 'id');
        $clase  = "page page-two-column";
        $paso = 2;
        return View::make('renta.chooseCar', compact('lugares', 'clase', 'paso'));
    }

    public function chooseExtras(){
        $clase  = "page page-two-column";
        $paso = 3;
        return View::make('renta.chooseExtra', compact('clase', 'paso'));
    }

    public function revisar(){
        $clase  = "page page-two-column";
        $paso = 4;
        return View::make('renta.revisar', compact('clase', 'paso'));
    }

    public function prestamoSave(){
        $prestamo = new Prestamo;
        $data = Input::all();
        $data['lugarEntrega_id'] = $data['lugarEntrega'];
        $data['lugarDevolucion_id'] = $data['lugarDevolucion'];
        $data['estado_id'] = 3;
        $data['empresa_id'] = 1;

        if($data['usuario']){
            // $data['cliente_id'] = $cliente->id;
            $data['cliente_id'] = $this->searchCliente($data['usuario']);
        }else
            return Response::json(array("ERROR 201"), 200);

        if($data['carro']){
            $data['carro_id']  = $data['carro']['id'];
            $data['precio']  = $data['carro']['precio'];
        }

        // return Response::json($data, 200);
        if($prestamo->validarPrestamo($data)){
            if($data['extras']){
                // return Response::json($data['extras'], 200);
                foreach ($data['extras'] as $key => $extra) {
                    $prestamoExtra = new prestamoExtra;
                    $prestamoExtra->extra_id    = $extra['id'];
                    $prestamoExtra->precio      = $extra['precio'];
                    $prestamoExtra->unaVez      = $extra['cobro'];
                    $prestamo->extras()->save($prestamoExtra);
                }
            }
            //en esta parte habria que enviar un correo al cliente
            //con los datos de la reserva, diciendole que alguien se pondra en contacto con el para 
            //confirmar la reserva.
            return Response::json($prestamo, 201);
        }

        return Response::json(Input::all(),200);
    }

    private function searchCliente($usuario){
        //buscar clietne para conocer si este existe
        $cliente = Cliente::where('email',$usuario['email'])->first();
        if(!$cliente->exists()){
            $cliente = new Cliente;
            $cliente->nombre   = $usuario['nombre'] ;
            $cliente->telefono  = $usuario['telefono'];
            $cliente->email     = $usuario['email'];
            $cliente->empresa_id= 1;
            $cliente->save();

            $user = new User;
            $user->empresa_id = 1;
            $user->email        = $cliente->email;
            $user->tipo         = 'Cliente';
            $user->password     = strtolower($cliente->email); //hay que enviar correo al cliente con la contrasena;
            $user->save();
        }
        return $cliente->id;
    }

//para angular
    public function carros($inicio, $fin){
        $prestamo = new prestamo;
        $prestamo->fechaReserva = $inicio;
        $prestamo->fechaDevolucion = $fin;
        $carros = detalleCarro::where('fechaInicio', '<=', $prestamo->fechaInicio)
                                ->where('fechaFin', '>=', $prestamo->fechaFin)
                                ->groupBy('id')
                                ->paginate();
        return Response::json($carros, 200);
    }

    public function extras(){
        $extras = Extra::where('empresa_id', 1)->paginate();

        return Response::json($extras, 200);
    }
    public function user(){

        if (Auth::check() && Auth::user()->tipo == 'Cliente') {
            $cliente = Auth::user();
            $cliente->email_confirmation = $cliente->email;
        }
        else
            $cliente = new Cliente;
        return Response::json($cliente, 200);
    }
}