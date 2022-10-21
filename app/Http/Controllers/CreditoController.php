<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use DB;

class CreditoController extends Controller
{
    public function creditos(){
        $creditosAcoms = DB::select('SELECT liberados.usuario, proyectos.id_SubTipoAcom, convert(liberados.credito, float) AS credito, liberados.codigo_pro FROM liberados, proyectos WHERE liberados.codigo_pro=proyectos.codigo', [1]);
        return $creditosAcoms;
        //return view('templates/invitado/credito');
    }
}
