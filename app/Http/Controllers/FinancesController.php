<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finance;
use Carbon\Carbon;

class FinancesController extends Controller
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
    public function index()
    {
        $finances = Finance::orderBy('add_at', 'desc')->paginate(10);
        return view('finances.index', compact('finances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finances.create');
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
          'name' => 'required',
          'add_at' => 'required',
          'value' => 'required|numeric',
          'type' => 'required'
        ]);

        //Fixing the Date - From dd-mm-yyyy to yyyy-mm-dd
        $dateArr = explode("-", request('add_at'));
        $add_at= Carbon::create($dateArr[2], $dateArr[1], $dateArr[0]);

        $f = new Finance();
        $f->name = request('name');
        $f->add_at = $add_at;
        $f->value = request('value');
        $f->type = request('type');
        $f->save();

        return redirect()->action('FinancesController@index');
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
        $finance = Finance::find($id);
        return view('finances.edit', compact('finance'));
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
          'name' => 'required',
          'add_at' => 'required',
          'value' => 'required|numeric',
          'type' => 'required'
        ]);
        //Fixing the Date - From dd-mm-yyyy to yyyy-mm-dd
        $dateArr = explode("-", request('add_at'));
        $add_at= Carbon::create($dateArr[2], $dateArr[1], $dateArr[0]);

        $f = Finance::find($id);
        $f->name = request('name');
        $f->add_at = $add_at;
        $f->value = request('value');
        $f->type = request('type');
        $f->save();

        return redirect()->action('FinancesController@index');
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
