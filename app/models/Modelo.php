<?php
    class Modelo extends Eloquent
    {
        use SoftDeletingTrait;
        public $errors;
        protected $table = 'modelos';
        protected $dates = ['deleted_at'];
        protected $perPage = 5;

        protected $fillable = [
            'modelo',
            'año',
            'motor',
            'transmision',
            'puertas',
            'color',
            'capacidad',
            'km_galon',
            'tipo_combustible',
            'equipamiento',
            'existencias',
            'estado',
            'marca_id',
            'tipo_id'
        ];

        public function isValid($data)
        {
            $rules = [
                'marca_id' => 'required',
                'tipo_id' => 'required',
                'modelo' => 'required',
                'año' => 'integer|required',
                'motor' => 'required|max:50',
                'transmision' => 'required|max:50',
                'puertas' => 'integer|required',
                'color' => 'max:50',
                'capacidad' => 'required|max:100',
                'km_galon' => 'required|max:30',
                'tipo_combustible' => 'required|max:30',
                'equipamiento' => 'max:250',
                'existencias' => 'integer|required'
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
         * @return [Relación] [Modelo tiene muchas fotos]
         */
        public function fotos()
        {
            return $this->hasmany('Foto','modelo_id');
        }
        /**
         * [Relación]
         * @return [Relación] [Modelo tiene muchos precios]
         */
        public function precios()
        {
            return $this->hasmany('Precio','modelo_id');
        }
        /**
         * [Relación]
         * @return [Relación] [Modelo tiene muchos prestamos]
         */
        public function prestamos()
        {
            return $this->hasmany('Prestamo','modelo_id');
        }
        /**
         * [Relación]
         * @return [Relación] [Modelos pertenece a marca]
         */
        public function marca()
        {
            return $this->belongsTo('Marca','marca_id');
        }
        /**
         * [Relación]
         * @return [Relación] [Modelos pertenece a tipo]
         */
        public function tipo()
        {
            return $this->belongsTo('Tipo','tipo_id');
        }
    }