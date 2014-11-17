<?php
class Extra extends Eloquent
{
    use SoftDeletingTrait;
    public $errors;
    protected $table = 'extras';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'extra',
        'descripcion',
        'precio',
        'ruta_imagen',
        'obligatorio',
        'cobro'
    ];

    public function isValid($data)
    {
        $rules = [
            'extra' => 'required|max:100',
            'descripcion'=>'required|max:250',
            'precio' =>'required'
        ];

        $validator = Validator::make($data,$rules);

        if($validator->passes())
            return true;

        $this->errors = $validator->errors();
        return false;
    }

    public function validAndSave($data)
    {
        if($this->isValid($data)) {
            $this->fill($data);
            $this->save();
            return true;
        }
        return false;
    }
    /**
     * [Relación]
     * @return [Relación] [Extras tiene muchos Prestamos]
     */
    public function prestamos()
    {
        return $this->belongsToMany('Prestamo','extra_prestamo','extra_id','prestamo_id')->withTimestamps();
    }
}