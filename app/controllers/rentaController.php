<?php

class rentaController extends BaseController{

	public function index(){
        $lugares = Lugares::where('empresa_id', 1)//Auth::user()->empresa->id)
                            ->lists('nombre', 'id');
        return View::make('renta.home', compact('lugares'));
	}

    public function chooseCar(){
        // return $carros;
        $lugares = Lugares::where('empresa_id', 1)//Auth::user()->empresa->id)
                            ->lists('nombre', 'id');
        return View::make('renta.chooseCar', compact('lugares'));
    }

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
}