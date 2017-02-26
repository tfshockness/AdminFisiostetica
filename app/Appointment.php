<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	protected $dates=['start_at', 'end_at'];

	public function getColor($color){
		if($color === "Agendado"){
              return "#f39c12";
            }
            if($color === "Confirmado"){
              return "#00a65a";
            }
            if($color === "Atendendo"){
              return "#3c8dbc";
            }
            if($color === "Cancelado"){
              return "#f56954";
            }

	}
	public function professional(){
		return $this->belongsTo(Professional::class);
	}
	
	public function customer(){
		return $this->belongsTo(Customer::class);
	}
	
	public function procedures(){
		return $this->belongsToMany(Procedure::class);
	}
}
