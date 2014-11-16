<?php
class Cliente extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'clientes';
    protected $dates = ['deleted_at'];
    public $errors;
    protected $perPage = 5;

    protected $fillable = [
        'nombre',
        'direccion',
        'direccion_2',
        'doc_unico',
        'sexo',
        'email',
        'fecha_nac',
        'telefono',
        'telefono_2',
        'celular',
        'pasaporte',
        'licencia',
        'fecha_emi_lic',
        'fecha_ven_lic',
        'targeta_credito',
        'fecha_ven_cre',
        'tipo',
        'emergencia_nombre',
        'emergencia_direccion',
        'emergencia_telefono',
        'password',
        'adicional_nombre',
        'doc_unico_2',
        'adicional_licencia',
        'adicional_femilic',
        'adicional_fevenlic',
        'ruta_imagen',
        'comentario'
    ];

    public function isValid($data,$accion)
    {
        if($accion == 1) {
            $rules = [
                'nombre' => 'required',
                'direccion' => 'required',
                'doc_unico' => 'required',
                'sexo' => 'required',
                'email' => 'email',
                'telefono' => 'required',
                'licencia' => 'required|unique:clientes',
                'fecha_emi_lic' => 'required',
                'fecha_ven_lic' => 'required',
                'targeta_credito' => 'required',
                'fecha_ven_cre' => 'required',
                'tipo' => 'required'
            ];

            if ($this->exists)
                $rules['licencia'] .= ',licencia,' . $this->id;

        } elseif($accion == 2) {
            $rules = [
                'emergencia_nombre' => 'required',
                'emergencia_direccion' => 'required',
                'emergencia_telefono' => 'required'
            ];
        } elseif($accion == 3) {
            $rules = [
                'adicional_licencia' => 'required',
                'adicional_femilic' => 'required',
                'adicional_fevenlic' => 'required'
            ];
        } else {
            $rules = [
                'nombre' => 'required',
                'fecha_nac' => 'required',
                'email' => 'email|required|confirmed',
                'telefono' => 'required'
            ];

        }

        $validator = Validator::make($data,$rules);

        if($validator->passes())
            return true;

        $this->errors = $validator->errors();
        return false;
    }

    public function validAndSave($data,$accion)
    {
        if($this->isValid($data,$accion)) {
            $this->fill($data);
            $this->save();
            return true;
        } else
            return false;
    }
    /**
     * [Formato de fecha] [Y-m-d a d-m-Y]
     * @param  [type] $data [Modelo]
     * @return [type]       [Datos con Nuevo Formato]
     */
    public function fechaDmy($cliente)
    {
        $cliente->fecha_nac = ($cliente->fecha_nac == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->fecha_nac));
        $cliente->fecha_emi_lic = ($cliente->fecha_emi_lic == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->fecha_emi_lic));
        $cliente->fecha_ven_lic = ($cliente->fecha_ven_lic == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->fecha_ven_lic));
        $cliente->fecha_ven_cre = ($cliente->fecha_ven_cre == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->fecha_ven_cre));
        $cliente->adicional_femilic = ($cliente->adicional_femilic == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->adicional_femilic));
        $cliente->adicional_fevenlic = ($cliente->adicional_fevenlic == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->adicional_fevenlic));
        return $cliente;
    }
    /**
     * [Relación]
     * @return [Relación] [Cliente tiene muchos prestamos]
     */
    public function prestamos() {
        return $this->hasmany('Prestamo','cliente_id');
    }
    /**
     * [Relación]
     * @return [Relación] [Cliente tiene muchas imagenes]
     */
    public function imagenes() {
        return $this->hasmany('Imagen','cliente_id');
    }
}
