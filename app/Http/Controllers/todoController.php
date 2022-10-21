<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class todoController extends Controller
{
    public function menuIni(){
    	Auth::logout();
    	return view('templates/principal');
    }

}
