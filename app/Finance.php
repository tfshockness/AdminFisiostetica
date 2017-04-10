<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{

	protected $guarded = ['id'];
	protected $dates = ['add_at'];

	//Accessor for properties
	public function getValueAttribute($value)
	{
		return $value;
	}


	//My Functions
	
	public static function balance()
	{
		$incomes = self::where('type', 1)->get(); //1 Means Income
		$outcomes = self::where('type', 0)->get(); //0 Means Outcome
		$income_total = 0;
		$outcome_total = 0;

		foreach($incomes as $income){
			$income_total += $income->value;
		}

		foreach($outcomes as $outcome){
			$outcome_total += $outcome->value;
		}

		return $income_total + (-$outcome_total);
	}

}
