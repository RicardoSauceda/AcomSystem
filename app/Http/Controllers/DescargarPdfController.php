<?php

namespace App\Http\Controllers;

use App\Liberados;
use Illuminate\Http\Request;
use DB;

class DescargarPdfController extends Controller
{
    public function proyect(Request $request){
        $nompro[0] = $request -> proyecto;
       $prueba = $nompro[0];
        
       //$pdf = DB::select('SELECT nombre, proyecto, pdf FROM liberados WHERE proyecto','=',$request -> proyecto, [1]);
       $pdf = Liberados::where('proyecto', '=', $request->proyecto)->paginate(40);

    return view('templates/profesor/selecProyecto',compact('pdf'));
    }
}
