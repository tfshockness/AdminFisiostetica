<?php

use Illuminate\Database\Seeder;
use App\Professional;
use App\Customer;
use App\Finance;
use App\Procedure;
use App\Appointment;
use App\User;

class AppTablesSeeder extends Seeder
{
	
	/**
	* Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
		//Criando e Salvando Professional
		$prof = new Professional();
		$prof->first_name = "Najla";
		$prof->last_name = "Farias Shockness";
		$prof->CPF = 11324059827;
		$prof->position = "Fisioterapeuta";
		$prof->birth = Carbon\Carbon::create(1990, 6, 1);
		$prof->cellphone = 6992056672;
		$prof->email = "najla@fisiostetica.com.br";
		$prof->save();

		//Criando Customer 1
		$customer = new Customer();
		$customer->first_name = "Timoteo";
		$customer->last_name = "Farias Shockness";
		$customer->gender = 1; //Male
		$customer->CPF = 00005140200; //11 numbers
		$customer->birth = Carbon\Carbon::create(1989, 4, 14);
		$customer->cellphone = 69999731849; //11 numbers
		$customer->email = "hello@timoshockness.com";
		$customer->save();

		//Criando Customer 2
		$customer2 = new Customer();
		$customer2->first_name = "Kate";
		$customer2->last_name = "Lee";
		$customer2->gender = 0; //Female
		$customer2->CPF = 12345140200; //11 numbers
		$customer2->birth = Carbon\Carbon::create(1992, 2, 24);
		$customer2->cellphone = 69999231401;//11 numbers
		$customer2->email = "hello@kateyeeum.com";
		$customer2->save();

		//Criando Customer 3
		$customer3 = new Customer();
		$customer3->first_name = "Mateus";
		$customer3->last_name = "Farias Alves";
		$customer3->gender = 1; //Male
		$customer3->CPF = 54321140200; //11 numbers
		$customer3->birth = Carbon\Carbon::create(1993, 4, 12);
		$customer3->cellphone = 69999231401;//11 numbers
		$customer3->email = "mateus@farias.com";
		$customer3->save();

		//Creating Procedures
		$procedure = new Procedure();
		$procedure->name = "Consulta";
		$procedure->save();

		//Creating Procedures
		$procedure2 = new Procedure();
		$procedure2->name = "Retorno";
		$procedure2->save();

		//Creating Procedures
		$procedure3 = new Procedure();
		$procedure3->name = "Limpeza de Pele";
		$procedure3->save();

		//Criando Agendamento 1
		$app1 = new Appointment();
		$app1->professional_id = Professional::find(1)->value('id');
		$app1->customer_id = Customer::find(1)->value('id');
		$app1->start_at = Carbon\Carbon::create(2017, 02, 24, 17, 0, 0); //20 feb 2017 17:00
		$app1->end_at = Carbon\Carbon::create(2017, 02, 24, 17, 30, 0); //20 feb 2017 17:30
		//Need to save before add the Pocedures - To get the appointment id
		$app1->save();
		//Now Procediments can be add
		$app1->procedures()->save(Procedure::find(1)); //The object procedure should be passed, not just the Id 

		//Criando Agendamento 2
		$app2 = new Appointment();
		$app2->professional_id = Professional::find(1)->value('id');
		$app2->customer_id = Customer::find(2)->value('id');
		$app2->start_at = Carbon\Carbon::create(2017, 02, 24, 18, 0, 0); //20 feb 2017 18:00
		$app2->end_at = Carbon\Carbon::create(2017, 02, 24, 18, 30, 0); //20 feb 2017 18:30
		//Need to save before add the Pocedures - To get the appointment id
		$app2->save();
		//Now Procediments can be add
		$app2->procedures()->save(Procedure::find(1)); //The object procedure should be passed, not just the Id 
	
	
		//Criando Agendamento 1
		$app3 = new Appointment();
		$app3->professional_id = Professional::find(1)->value('id');
		$app3->customer_id = Customer::find(3)->value('id');
		$app3->start_at = Carbon\Carbon::create(2017, 02, 23, 19, 0, 0); //20 feb 2017 19:00
		$app3->end_at = Carbon\Carbon::create(2017, 02, 23, 19, 30, 0); //20 feb 2017 19:30
		//Need to save before add the Pocedures - To get the appointment id
		$app3->save();
		//Now Procediments can be add
		$app3->procedures()->save(Procedure::find(1)); //The object procedure should be passed, not just the Id 


		$money = new Finance;
		$money->name = "Limpeza de Pele";
		$money->add_at = Carbon\Carbon::now();
		$money->value = 65.00;
		$money->type = 1;
		$money->setBalance();
		$money->save();



		$money2 = new Finance;
		$money2->name = "Conta de agua";
		$money2->add_at = Carbon\Carbon::now();
		$money2->value = 25.00;
		$money2->type = 0;
		$money2->setBalance();
		$money2->save();
	}
}
