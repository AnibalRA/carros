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
        $pago = new Pago;
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $prestamo->estado = 'Pendiente de Pago';
        $data = Input::all();
        $modelo = Modelo::find($prestamo->modelo_id);
        $modelo->estado =  3;
        $modelo->save();
        $precio = Precio::find($prestamo->precio_id);

        if(is_null($precio))
            App::abort(404);
        
        $precioAuto = $precio->precio;

        if($prestamo->validAndSave($data,2)) {
            $bitacora = new Bitacora;
            $bitacora->Guardar(10,$prestamo->id,2);

            $password = new Codigo;

            if(empty($prestamo->password)) {
                $generado = $password->generar($prestamo->id);
                $prestamo->password = $generado;
                $prestamo->save();
            }

            $caso = 12;
            $resultado = $pago->formaPago($prestamo,$precioAuto,'','',$caso);
            return $resultado;
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($prestamo->errors);
    }
}