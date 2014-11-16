<?php
class Pago extends Eloquent
{
    public function formaPago($prestamo,$precioAuto,$form_data,$data,$paso)
    {
        $precioDiaAuto = 0;
        $precioHoraAuto = 0;
        $precioDiaExtra = 0;
        $precioHoraExtra = 0;
        $precioObligatorio = 0;
        $precioExtras = 0;
        $precioUnico = 0;
        /**
         * [Capturar los precios de los accesorios]
         * @var [Precios de los accesorios]
         */
        if($paso == 3 || $paso == 6 || $paso == 8 || $paso == 10) {
            if(!is_null(Cookie::get('extra'))) {
                foreach(Cookie::get('extra') as $key => $pivote) {
                    $extra = Extra::find($pivote);

                    if($extra->obligatorio == 1 && $extra->cobro == 0)
                        $precioObligatorio += $extra->precio;
                    elseif($extra->obligatorio == 1 && $extra->cobro == 1)
                        $precioUnico += $extra->precio;
                    elseif($extra->obligatorio == 0 && $extra->cobro == 1)
                        $precioUnico += $extra->precio;
                    else
                        $precioExtras += $extra->precio;
                }
            }
        } else {
            foreach ($prestamo->extras as $key => $pivote) {
                $extra_id = $pivote->pivot->extra_id;
                $extra = Extra::find($extra_id);

                if($extra->obligatorio == 1 && $extra->cobro == 0)
                    $precioObligatorio += $extra->precio;
                elseif($extra->obligatorio == 1 && $extra->cobro == 1)
                    $precioUnico += $extra->precio;
                elseif($extra->obligatorio == 0 && $extra->cobro == 1)
                    $precioUnico += $extra->precio;
                else
                    $precioExtras += $extra->precio;
            }
        }
        $precioExtras += $precioObligatorio;
        /**
         * [Intervalo de Tiempo]
         * @var DateTime
         */
        $date_1 = new DateTime($prestamo->horario_rsv);
        $date_2 = new DateTime($prestamo->horario_dvl);
        $intervalo = $date_1->diff($date_2);
        $dias = $intervalo->format("%d");
        $horas = $intervalo->format("%h");

        if($dias == 0) {
            /**
             * [Precio del Auto]
             * @var [float]
             */
            $precioDiaAuto = number_format($precioAuto,2,'.','');
        } else {
            /**
             * [Precio Por Día Del Uso Del Auto]
             * @var [float]
             */
            $precioDiaAuto = $precioAuto * $dias;
            /**
             * [Precio Por Día Del Uso De Los Extras]
             * @var [float]
             */
            $precioDiaExtra = $precioExtras * $dias;

            if($horas > 0) {
                /**
                 * [Precio Por Hora Del Uso Del Auto]
                 * @var [float]
                 */
                $precioHoraAuto = ($precioAuto / 24) * $horas;
                /**
                 * [Precio Por Hora Del Uso De Los Extras]
                 * @var [float]
                 */
                $precioHoraExtra = ($precioExtras / 24) * $horas;
            }
        }
        $precioAuto = $precioDiaAuto + $precioHoraAuto;
        $precioExtras = $precioDiaExtra + $precioHoraExtra;
        $precioExtras += $precioUnico;
        $precioExtras = number_format($precioExtras,2,'.','');
        $total = number_format(($precioAuto + $precioExtras),2,'.','');
        /**
         * [Descuento]
         */
        if(!empty($prestamo->descuento)) {
            $descuento = $prestamo->descuento / 100;
            $cantidadDescontar = number_format($total * $descuento,2,'.','');
            $total -= $cantidadDescontar;
        } else {
            $prestamo->descuento = 0;
            $cantidadDescontar = 0;
        }
        switch ($paso) {
            case 0:
                return View::make('prestamo/show',compact('prestamo','data','dias','horas','precioDiaAuto','precioHoraAuto','precioDiaExtra','precioHoraExtra','precioUnico','total','cantidadDescontar'));
                break;
            case 1:
                $prestamo->estado = 'Pendiente de Pago';

                $estado = [
                    'total' => $total,
                    'prestamo' => $prestamo
                ];

                Mail::send('prestamo.email.confirmar',$estado,function($message) use ($prestamo) {
                    $message->to($prestamo->cliente->email, $prestamo->cliente->nombre)
                        ->subject('MultiAutos El Salvador');
                });

                $prestamo->save();
                $bitacora = new Bitacora;
                $bitacora->Guardar(10,$prestamo->id,2);
                $modelo = Modelo::find($prestamo->modelo_id);

                if(is_null($modelo))
                    App::abort(404);

                $modelo->estado = 3;
                $modelo->save();
                return Redirect::route('prestamoLista');
                break;
            case 2:
            case 3:
                $form = new Prestamo;
                $autoSelect = Modelo::find($prestamo->modelo_id);

                if(is_null($autoSelect))
                    App::abort(404);

                $entrega = $form->formLugares();
                $devolucion = $form->formLugares();
                $prestamo = $form->fechaDmy($prestamo);
                return View::make('form/forms',compact('prestamo','autoSelect','form_data','entrega','devolucion','precioAuto','precioExtras','total'));
                break;
            case 4:
                return View::make('prestamo/pago',compact('prestamo','form_data','data','precioAuto','precioExtras','total','paso'));
                break;
            case 5:
            case 6:
                $form = new Prestamo;
                $entrega = $form->formLugares();
                $devolucion = $form->formLugares();
                $autoSelect = Modelo::find($prestamo->modelo_id);

                if(is_null($autoSelect))
                    App::abort(404);

                $auto = $autoSelect->id;

                $modelo = Modelo::orderBy('modelo','asc')
                    ->paginate(3);

                $marca = Marca::all();
                $tipo = Tipo::all();
                return View::make('choose/seleccionar-carro',compact('prestamo','form_data','auto','autoSelect','entrega','devolucion','modelo','tipo','marca','precioAuto','precioExtras','total'));
                break;
            case 7:
            case 8:
                $extra = Extra::all();
                $autoSelect = Modelo::find($prestamo->modelo_id);

                if(is_null($autoSelect))
                    App::abort(404);

                return View::make('extras/extras',compact('prestamo','form_data','extra','autoSelect','precioAuto','precioExtras','total'));
                break;
            case 9:
                $autoSelect = Modelo::find($prestamo->modelo_id);

                if(is_null($autoSelect))
                    App::abort(404);

                $cliente = Cliente::find(Auth::user()->id);

                if(is_null($cliente))
                    App::abort(404);

                $cliente = $cliente->fechaDmy($cliente);
                return View::make('review/index',compact('cliente','prestamo','form_data','autoSelect','precioAuto','precioExtras','total'));
                break;
            case 10:
                $cliente = new Cliente;
                $autoSelect = Modelo::find($prestamo->modelo_id);

                if(is_null($autoSelect))
                    App::abort(404);

                return View::make('review/index',compact('cliente','prestamo','form_data','autoSelect','precioAuto','precioExtras','total'));
                break;
            case 11:
                $autoSelect = Modelo::find($prestamo->modelo_id);

                if(is_null($autoSelect))
                    App::abort(404);

                $cookie_extras = Cookie::forget('extra');
                $cookie_reserva = Cookie::forget('reserva');
                $cookie_modelo = Cookie::forget('modelo');

                if($prestamo->estado == 'Pre-reservado')
                    $cookie_prestamo_id = Cookie::forever('prestamo_id',$prestamo->id);

                if($prestamo->estado == 'Pre-reservado') {
                    $view = View::make('confirmar/index',compact('prestamo','autoSelect','precioAuto','precioExtras','total'));

                    return Response::make($view)
                        ->withCookie($cookie_prestamo_id)
                        ->withCookie($cookie_reserva)
                        ->withCookie($cookie_modelo)
                        ->withCookie($cookie_extras);
                } else {
                    $view = View::make('confirmar/index',compact('prestamo','autoSelect','precioAuto','precioExtras','total'));

                    return Response::make($view)
                        ->withCookie($cookie_reserva)
                        ->withCookie($cookie_modelo)
                        ->withCookie($cookie_extras);
                }
                break;
            default:
                # code...
                break;
        }
    }
}