<?php
class Prestamo extends Eloquent
{
    // use SoftDeletingTrait;
    public $errors;
    protected $table = 'prestamos';
    // protected $dates = ['deleted_at'];
    protected $perPage = 5;

    protected $fillable = [
        'lugarEntrega_id',
        'lugarDevolucion_id',
        'fechaReserva',
        'fechaDevolucion',
        'tipo_pago',
        'descuento',
        'cliente_id',
        'modelo_id',
        'precio_id',
        'extra_id',
        'estado',
        'empresa_id'
    ];

    public function validarPrestamo($data){
        $rules = [
                'cliente_id' => 'required',
                'fechaReserva' => 'required',
                'fechaDevolucion' => 'required',
                'lugarEntrega_id' => 'required'
            ];
        return $this->validAndSave($data, $rules);
    }

    public function isValid($data,$rules)
    {
        // if($accion == 1) {
            
        // } elseif($accion == 3) {
        //     $rules = [
        //         'horario_rsv' => 'required',
        //         'horario_dvl' => 'required',
        //         'lugarEntrega' => 'required'
        //     ];
        // } else {
        //     $rules = [
        //         'tipo_pago' => 'required',
        //         'descuento' => 'integer'
        //     ];
        // }

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
        }
        return false;
    }
    /**
     * [guardar Datos] [formulario] [pagina inicio] [multiautos]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function guardar($data)
    {
        $this->fill($data);
        $this->save();
        return true;
    }
    /**
     * [Lista de Clientes]
     * @return [array] [Lista de Clientes]
     */
    public function formCliente()
    {
        $cliente = [
            '' => '',
            'Clientes' => Cliente::all()->lists('nombre','id')
        ];

        return $cliente;
    }
    /**
     * [Lista de Lugares de Enterga y Devolución del Auto]
     * @return [array] [Lugares]
     */
    public function formLugares()
    {
        $lugares = [
            '' => '',
            'Aeropuerto' => 'Aeropuerto',
            'Oficina Central' => 'Oficina Central',
            'Adomicilio' => 'Adomicilio'
        ];

        return $lugares;
    }
    /**
     * [Formato de fecha] [d-m-Y a Y-m-d]
     * @param  [type] $data [Datos]
     * @return [type]       [Datos con Nuevo Formato]
     */
    // public function fechaYmd($data)
    // {
    //     $data["horario_rsv"] = date('Y-m-d H:i', strtotime($data["horario_rsv"]));
    //     $data["horario_dvl"] = date('Y-m-d H:i', strtotime($data["horario_dvl"]));
    //     return $data;
    // }
    /**
     * [Formato de fecha] [d-m-Y a Y-m-d]
     * @param  [type] $data [Datos]
     * @return [type]       [Datos con Nuevo Formato]
     */
    // public function fechaDmy($prestamo)
    // {
    //     if($prestamo->horario_rsv == '1970-01-01 00:00:00' || $prestamo->horario_rsv == '0000-00-00 00:00:00')
    //         $prestamo->horario_rsv = '';
    //     else
    //         $prestamo->horario_rsv = date('d-m-Y h:i A', strtotime($prestamo->horario_rsv));

    //     if($prestamo->horario_dvl == '1970-01-01 00:00:00' || $prestamo->horario_dvl == '0000-00-00 00:00:00')
    //         $prestamo->horario_dvl = '';
    //     else
    //         $prestamo->horario_dvl = date('d-m-Y h:i A', strtotime($prestamo->horario_dvl));

    //     return $prestamo;
    // }


    //getters and setters

    public function setFechaReservaAttribute($date){
        $this->attributes['fechaReserva'] = date('Y-m-d H:i:s ', strtotime($date));
    }
    public function setFechaDevolucionAttribute($date){
       $this->attributes['fechaDevolucion'] = date('Y-m-d H:i:s', strtotime($date));
    }

    public function getFechaReservaAttribute(){
        return  date('d-m-Y h:i A', strtotime($this->attributes['fechaReserva']));
    }
    public function getFechaDevolucionAttribute(){
       return date('d-m-Y h:i A', strtotime($this->attributes['fechaDevolucion']));
    }

    /**
     * [Relación]
     * @return [Relación] [Prestamos pertenece a cliente]
     */
    public function cliente()
    {
        return $this->belongsTo('Cliente','cliente_id');
    }
    /**
     * [Relación]
     * @return [Relación] [Prestamos pertenece a modelo]
     */
    public function modelo()
    {
        return $this->belongsTo('Modelo','modelo_id');
    }
    /**
     * [Relación]
     * @return [Relación] [Prestamos pertenece a precio]
     */
    public function precio()
    {
        return $this->belongsTo('Precio','precio_id');
    }
    /**
     * [Relación]
     * @return [Relación] [Prestamos tiene muchos Extras]
     */
    public function extras()
    {
        return $this->belongsToMany('Extra','extra_prestamo','prestamo_id','extra_id')->withTimestamps();
    }
}
