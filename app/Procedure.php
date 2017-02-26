<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
	public function appointments(){
		return $this->belongsToMany(Appointment::class);
	}
}
