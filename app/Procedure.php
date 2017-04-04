<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{

	protected $guarded = ['id'];

	//relationship
	public function appointments(){
		return $this->belongsToMany(Appointment::class);
	}
}
