<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Carbon\Carbon;

class CustomersController extends Controller
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
        if(count($request->all()) > 0){
            if($request->input('search') === ''){
                $clientes = Customer::paginate(10);
                return view('customers.index', compact('clientes'));
            };
            //If there is search, fetch in the Db
            $search = $request->input('search');
            $clientes = Customer::where('first_name', 'like', "$search%")
            ->orWhere('last_name', 'like', "%$search%")->paginate(10);

            return view('customers.index', compact('clientes'));
        }

        $clientes = Customer::paginate(10);

        return view('customers.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'CPF' => 'required|unique:customers|numeric|min:11',
            'birth' => 'required',
            'cellphone' => 'required|numeric',
            'telephone' => 'nullable|numeric',
            'email' => 'required|email'

        ]);

        //Fixing the Date - From dd-mm-yyyy to yyyy-mm-dd
        $dateArr = explode("-", request('birth'));
        $birth = Carbon::create($dateArr[2], $dateArr[1], $dateArr[0]);

        Customer::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'gender' => request('gender'),
            'CPF' => request('CPF'),
            'birth' => $birth,
            'telephone' => request('telephone'),
            'cellphone' => request('cellphone'),
            'email' => request('email')
        ]);

         $id = Customer::where('CPF', request('CPF'))->value('id');

        return redirect()->action(
            'CustomersController@show', ['id' => $id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'CPF' => 'required|max:11|min:11',
                'birth' => 'required',
                'cellphone' => 'required',
                'email' => 'required',

            ]);

            $customer = Customer::find($id);

            //Fixing the Date - From dd-mm-yyyy to yyyy-mm-dd
            //OBS: the separator here is different :(
            $dateArr = explode("-", request('birth'));
            $birth = Carbon::create($dateArr[0], $dateArr[1], $dateArr[2]);

            $customer->first_name = request('first_name');
            $customer->last_name = request('last_name');
            $customer->gender = request('gender');
            $customer->CPF = request('CPF');
            $customer->birth = $birth;
            $customer->telephone = request('telephone');
            $customer->cellphone = request('cellphone');
            $customer->email = request('email');

            $customer->save();

            return redirect()->action(
            'CustomersController@show', ['id' => $customer->id]
        );
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
