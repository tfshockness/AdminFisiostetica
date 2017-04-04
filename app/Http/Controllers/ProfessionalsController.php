<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional;
use Carbon\Carbon;

class ProfessionalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professionals = Professional::paginate(10);

        return view('professionals.index', compact('professionals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professionals.create');
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
            'CPF' => 'required|min:11|unique:professionals|numeric',
            'position' => 'required',
            'birth' => 'required',
            'cellphone' => 'required|numeric',
            'telephone' => 'nullable|numeric',
            'email' => 'required|email'
        ]);

        //Fixing Date Format - From dd-mm-yyyy to yyyy-mm-dd
        $dateArr = explode("-", request('birth'));
        $birth = Carbon::create($dateArr[2], $dateArr[1], $dateArr[0]);


        Professional::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'CPF' => request('CPF'),
            'position' => request('position'),
            'birth' => $birth,
            'telephone' => request('telephone'),
            'cellphone' => request('cellphone'),
            'email' => request('email')
        ]);
        $id = Professional::where('CPF', request('CPF'))->value('id');


        return redirect()->action(
            'ProfessionalsController@show', ['id' => $id]
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
        $professional = Professional::find($id);
        return view('professionals.show', compact('professional'));
        
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
            'CPF' => 'required|min:11|numeric',
            'position' => 'required',
            'birth' => 'required',
            'cellphone' => 'required|numeric',
            'telephone' => 'nullable|numeric',
            'email' => 'required|email'
        ]);
        
        $professional = Professional::find($id);

        //Fixing Date Format - From dd-mm-yyyy to yyyy-mm-dd
        $dateArr = explode("-", request('birth'));
        $birth = Carbon::create($dateArr[0], $dateArr[1], $dateArr[2]);


        $professional->first_name = request('first_name');
        $professional->last_name = request('last_name');
        $professional->position = request('position');
        $professional->CPF = request('CPF');
        $professional->birth = $birth;
        $professional->telephone = request('telephone');
        $professional->cellphone = request('cellphone');
        $professional->email = request('email');

        $professional->save();

        return redirect()->action(
            'ProfessionalsController@show', ['id' => $professional->id]
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
