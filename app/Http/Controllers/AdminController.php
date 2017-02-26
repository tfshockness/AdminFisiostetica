<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
class AdminController extends Controller
{
    public function index(){
        $appointments = Appointment::all();
        return view('admin.index', compact('appointments'));
    }
}
