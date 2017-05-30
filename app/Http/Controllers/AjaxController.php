<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Procedure;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function customer(Request $request)
    {
        $search = $request->input('search');
        $data = Customer::where('first_name', 'like', "$search%")
            ->orWhere('last_name', 'like', "%$search%")->get();
        return $data;
    }
}
