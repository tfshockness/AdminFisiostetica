<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	protected $dates=['start_at', 'end_at'];


	public function getColor(){
		if($this->status === "Agendado"){
              return "#f39c12";
            }
            if($this->status === "Confirmado"){
              return "#00a65a";
            }
            if($this->status === "Atendendo"){
              return "#3c8dbc";
            }
            if($this->status === "Cancelado"){
              return "#f56954";
            }
            if($this->status === "Faltou"){
                return "#111111";
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
