<?php
class prestamoPaso_4Controller extends BaseController
{
    /**
     * [Forma de Pago]
     * @param  [type] $id [ID del Prestamo]
     * @return [type]     [description]
     */
    public function pago($id)
    {
        $prestamo = Prestamo::find($id);
        $pago = new Pago;
        $form = new Formulario;

        if(is_null($prestamo))
            App::abort(404);

        $precio = Precio::find($prestamo->precio_id);
        $precioAuto = $precio->precio;
        $form_data = $form->formData(array('precioStore',$id),'GET',false);

        $data = [
            '' => '',
            'Tarjeta de Crédito' => 'Tarjeta de Crédito',
            'Efectivo' => 'Efectivo'
        ];

        $paso = 4;
        $resultado = $pago->formaPago($prestamo,$precioAuto,$form_data,$data,$paso);
        return $resultado;
    }
    /**
     * [Guardar Datos Del Prestamo]
     * @return [route] [prestamoShow]
     */
    public function store($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $data = Input::all();

        $modelo = Modelo::find($prestamo->modelo_id);
        $modelo->estado =  2;
        $modelo->save();

        if($prestamo->validAndSave($data,2)) {
            $bitacora = new Bitacora;
            $bitacora->Guardar(10,$prestamo->id,2);
            $cliente = [ 'nombre' => $prestamo->cliente->nombre];

            Mail::send('prestamo.email.notificacion',$cliente,function($message) {
                $message->to('anibal.rivera@catolica.edu.sv', 'administrador')
                    ->subject('Notificación de MultiAutos');
            });

            return Redirect::route('prestamoShow',$prestamo->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($prestamo->errors);
    }
}