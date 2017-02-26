<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppointmentProcedure extends Migration
{
	
	/**
	* Run the migrations.
	     *
	     * @return void
	     */
	    public function up()
	    {
		Schema::create('appointment_procedure', function (Blueprint $table) {
			$table->integer('procedure_id')->unsigned()->nullable();
			$table->foreign('procedure_id')->references('id')->on('procedures')->onDelete('cascade');
			
			$table->integer('appointment_id')->unsigned()->nullable();
			$table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
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
		Schema::dropIfExists('appointment_procedure');
	}
}
