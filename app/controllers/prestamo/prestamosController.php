<?php

class prestamosController extends BaseController{
	public function index(){
		$prestamos = Prestamo::with('cliente','carro', 'estado','extras', 'carro.modelo', 'carro.modelo.marca')
							 ->where('empresa_id', Auth::user()->empresa->id)
							 ->orderBy('created_at','dsc')
            				 ->paginate();

    //Revisar luego para poder mostrar el precio en la lista de las reservas
          foreach ($prestamos as $prestamo) {
          	$prestamo->valor = round($prestamo->precio * $prestamo->dias + ($prestamo->precio / 24 * $prestamo->horas),2);
          	foreach ($prestamo->extras as $extra) {
          		// return round($extra->cantidad($prestamo->dias,$prestamo->horas),2);
          		$prestamo->valor += round($extra->cantidad($prestamo->dias,$prestamo->horas),2);
          	}
          }
        return View::make('prestamo.list', compact('prestamos'));
	}

}