<?php
class prestamoPaso_2Controller extends BaseController
{
    /**
     * [Seleccionar Modelo del Auto]
     * @param  [type] $id [ID del prestamo]
     * @return [vista]     [prestamo/select]
     */
    public function select($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $verificar = Modelo::find($prestamo->modelo_id);

        if(is_null($verificar)) {
           $idexiste = 0;
           $paso = 2;
        } else {
            $idexiste = $verificar->id;
            $paso = 6;
        }

        $modelo = Modelo::orderBy('created_at','dsc')
            ->paginate(3);

        return View::make('prestamo/select',compact('prestamo','modelo','idexiste','paso'));
    }
    /**
     * [Guardar Datos Del Prestamo] [Modelo] [Precio]
     * @return [route] [selectExtra]
     */
    public function store($prestamo_id,$modelo_id,$precio_id)
    {
        $prestamo = Prestamo::find($prestamo_id);

        if(is_null($prestamo))
            App::abort(404);

        $data['modelo_id'] = $modelo_id;
        $data['precio_id'] = $precio_id;
        $prestamo->fill($data);
        $prestamo->save();
        $bitacora = new Bitacora;
        $bitacora->Guardar(10,$prestamo->id,2);
        return Redirect::route('selectExtras',$prestamo_id);
    }
    /**
     * [Quitar Modelo del Auto]
     * @param  [type] $id [ID del Prestamo]
     * @return [route] [selectModelo]
     */
    public function quitar($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $prestamo->modelo_id = 0;
        $prestamo->save();
        $bitacora = new Bitacora;
        $bitacora->Guardar(10,$prestamo->id,2);
        return Redirect::route('selectModelo',$prestamo->id);
    }
}