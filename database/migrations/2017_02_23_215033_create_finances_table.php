<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancesTable extends Migration
{
	
	/**
	* Run the migrations.
	     *
	     * @return void
	     */
	    public function up()
	    {
		Schema::create('finances', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->date('add_at');
			$table->decimal('value');
			$table->boolean('type');
			$table->decimal('balance');
			$table->timestamps();
		}
		);
	}
	
	
	/**
	* Reverse the migrations.
	     *
	     * @return void
	     */
	    public function down()
	    {
		Schema::dropIfExists('finances');
	}
}
