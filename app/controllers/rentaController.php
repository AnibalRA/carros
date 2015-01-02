<?php

class rentaController extends BaseController{

	public function index(){
		$prestamo = new Prestamo;
        $form = new Formulario;
        $form_data = $form->formData_2('reservaStore','POST','main-form','slider-form');
        $form_data2 = $form->formData_2('show','POST','main-form','slider-form');
        // $entrega = $prestamo->formLugares();

        $entrega = Lugares::where('empresa_id', Auth::user()->empresa->id)->get();
        $devolucion = $entrega;
        // $devolucion = $prestamo->formLugares();

        if(Auth::check()) {
            if(!is_null(Cookie::get('prestamo_id'))) {
                $prestamo = Prestamo::find(Cookie::get('prestamo_id'));
                $prestamo = $prestamo->fechaDmy($prestamo);
                $form_data = $form->formData_2(array('reservaUpdate',$prestamo->id),'PATCH','main-form','slider-form');
            }
        } else {
            if(!is_null(Cookie::get('modelo'))) {
                $reserva = Cookie::get('reserva');
                $auto = Cookie::get('modelo');

                if(!is_null(Cookie::get('reserva')))
                    $reserva += $auto;
                else
                    $reserva = $auto;

                $prestamo = (object) $reserva;
                $modelo = Modelo::find($prestamo->modelo_id);
                $prestamo->modelo_id = $modelo->modelo;
            }
        }

        return View::make('renta.home', compact('prestamo','form_data','form_data2','entrega','devolucion'));
	}
}