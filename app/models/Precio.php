<?php
class Precio extends Eloquent
{
    use SoftDeletingTrait;
    public $errors;
    protected $perPage = 5;
    protected $table = 'precios';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'precio',
        'fecha_ini',
        'fecha_fin',
        'modelo_id'
    ];

    public function isValid($data)
    {
        $rules = [
            'precio' => 'required',
            'fecha_ini' => 'required',
            'fecha_fin' => 'required',
        ];

        $validator = Validator::make($data,$rules);

        if($validator->passes())
            return true;

        $this->errors = $validator->errors();
        return false;
    }

    public function validAndSave($data)
    {
        if($this->isValid($data))
        {
            $this->fill($data);
            $this->save();
            return true;
        }
        return false;
    }
    /**
     * [Relación]
     * @return [Relación] [Precios pertenece a Modelo]
     */
    public function modelo()
    {
        return $this->belongsTo('Modelo','modelo_id');
    }
    /**
     * [Relación]
     * @return [Relación] [Precio tiene muchos prestamos]
     */
    public function prestamos()
    {
        return $this->hasmany('Prestamo','precio_id');
    }
}