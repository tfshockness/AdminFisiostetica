<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
	//Making Birth a Carbon Object
	protected $dates=['birth'];

	//Protecting fields
	protected $guarded = ['id'];


	//Relationship
	public function appointments(){
		return $this->hasMany(Appointment::class);
	}
}
