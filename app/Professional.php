<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
	//Making Birth a Carbon Object
	protected $dates=['birth'];

	public function appointments(){
		return $this->hasMany(Appointment::class);
	}
}
