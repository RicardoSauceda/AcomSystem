<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class todoController extends Controller
{
    public function menuIni(){
    	Auth::logout();
  header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
  header('Cache-Control: no-store, no-cache, must-revalidate');
  header('Cache-Control: post-check=0, pre-check=0',false);
  header('Pragma: no-cache');
    	return view('templates/principal');
    }

}
