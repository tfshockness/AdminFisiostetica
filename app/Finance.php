<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{

	protected $guarded = ['id'];
	protected $dates = ['add_at'];

	public static function getBalance(){
		$obj = self::orderBy('id', 'DESC')->first();
		if($obj === null){
			return 0;
		}
		else{
			return $obj->balance;
		}
	}

	public function setBalance(){
		if($this->value > 0 ){
			$this->balance = self::getBalance();
			if($this->type == 1){
				//1				means income
				$this->balance += $this->value;
			}
			if($this->type == 0){
				//0				means outcome
				$this->balance -= $this->value;
			}
		}
		else{
			//s			how error value need to be more than 0
		}
	}
}
