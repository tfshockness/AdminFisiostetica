<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
	
	/**
	* Run the migrations.
	     *
	     * @return void
	     */
	    public function up()
	    {
		Schema::create('appointments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('professional_id')->unsigned();
			$table->integer('customer_id')->unsigned();
			$table->string('status')->default('Agendado');
			$table->datetime('start_at');
			$table->datetime('end_at');
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
		Schema::dropIfExists('appointments');
	}
}
