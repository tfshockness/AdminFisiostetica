<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Procedure;
use App\Professional;
use App\Customer;
use Carbon\Carbon;
use Session;


class AppointmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Returning all value if Serach is empty
        if(count($request->all()) > 0)
        {
            if($request->input('search') === '')
            {
                $appointments = Appointment::paginate(10);
                return view('appointments.index', compact('appointments'));
            }
        };
        
        //If there is search, fetch in the Db
        // $search = $request->input('search');
        // $appointments = Appointment::where('first_name', 'like', "$search%")
        // ->orWhere('last_name', 'like', "%$search%")->paginate(10);
        
        $appointments = Appointment::orderBy('start_at', 'desc')->paginate(10);
        return view('appointments.index', compact('appointments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $procedures = Procedure::all();
        $professionals = Professional::all();
        return view('appointments.create', compact('procedures', 'professionals', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->customer_id == 0 || $request->customer_id === ""){
            Session::flash('message', 'Cliente não encontrato. Favor tente novamente!'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->action('AppointmentsController@create');
        }else{
            $ap = new Appointment();
            $ap->professional_id = $request->professional;
            $ap->customer_id = $request->customer_id;
            //Fixing and creating date - MOVE TO A FUNCTIONS  PLEASEEE!!!!!
            $date_array = explode("-", request('date'));
            $start_hr = explode(":", request('start_at'));
            $start_at = Carbon::create($date_array[2], $date_array[1], $date_array[0], $start_hr[0], $start_hr[1]);

            $end_hr = explode(":", request('end_at'));
            $end_at = Carbon::create($date_array[2], $date_array[1], $date_array[0], $end_hr[0], $end_hr[1]);
            
            $ap->start_at = $start_at;
            $ap->end_at = $end_at;

            //Need to check if Professional and the customer has appointments for this day.
            //Create method in appointment 
            // $app::where()
            // if(){//result returns nothings -> Show a error else save and redirect

            // }else{

            // }

            $ap->status = $request->status;

            $ap->save();

            $ap->procedures()->save(Procedure::find($request->procedure));

            return redirect()->action('AppointmentsController@index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::find($id);
        
        return view ('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procedures = Procedure::all();
        $professionals = Professional::all();
        $appointment = Appointment::find($id);
        return view('appointments.edit', compact('appointment', 'procedures', 'professionals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ap = Appointment::find($id);

        $ap->professional_id = $request->professional;
        $ap->customer_id = $request->customer_id;
        //Fixing and creating date - MOVE TO A FUNCTIONS  PLEASEEE!!!!!
        $date_array = explode("-", request('date'));
        $start_hr = explode(":", request('start_at'));
        $start_at = Carbon::create($date_array[2], $date_array[1], $date_array[0], $start_hr[0], $start_hr[1]);

        $end_hr = explode(":", request('end_at'));
        $end_at = Carbon::create($date_array[2], $date_array[1], $date_array[0], $end_hr[0], $end_hr[1]);
        
        $ap->start_at = $start_at;
        $ap->end_at = $end_at;
        $ap->status = $request->status;

        $ap->save();

        $ap->procedures()->detach();
        $ap->procedures()->save(Procedure::find($request->procedure));

        return redirect()->action('AppointmentsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
