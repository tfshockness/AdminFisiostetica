<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	//making Birth a Carbon object;
	protected $dates=['birth'];

	public function appointments(){
		return $this->hasMany(Appointment::class);
	}
}
