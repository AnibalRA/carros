<?php

class Placa extends Eloquent{
	protected $fillable = ['numero', 'carro_id', 'kilometraje'];
	public $timestamps = false;

	
	public function isValid($data)
	{
	    $rules = [
	        'numero' 		=> 'required',
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

	public function carro(){
		return $this->belongsTo('carro');
	}

}