<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedure;

class ProceduresController extends Controller
{
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
                $procedures = Procedure::paginate(10);
                return view('procedures.index', compact('procedures'));
            }
        };
        //If there is search, fetch in the Db
        $search = $request->input('search');
        $procedures = Procedure::where('name', 'like', "$search%")->paginate(10);
        

        return view('procedures.index', compact('procedures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required'
        ]);

        Procedure::create([
            'name' => request('name')
        ]);

        return redirect()->action(
            'ProceduresController@index'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procedure = Procedure::find($id);

        return view('procedures.edit', compact('procedure'));
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
        $this->validate($request,[
            'name' => 'required'
        ]);

        $procedure = Procedure::find($id);

        $procedure->name = request('name');
        $procedure->save();

        return redirect()->action(
            'ProceduresController@index'
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
