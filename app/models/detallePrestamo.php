<?php

class detallePrestamo extends Eloquent{


 public function extras()    {   return $this->hasMany  ('prestamoExtra');    }	
}