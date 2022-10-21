<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mensajes;
use App\solicitudes;

class mensajesController extends Controller
{
    
    public function store(Request $request)
    {

       if ($request['chk']) {
            $user = auth()->user();
            $respuesta = $request['pos'];
            $id_sol = $request['chk'];
            $num = count($id_sol);
    
         for ($i=0; $i <$num ; $i++) { 
                
                $aprobados = solicitudes::where([['id_creo','=',$user->id],['id_sol', '=', $id_sol[$i]]])->first();

                $mensajes = new mensajes();
                $mensajes->proyecto=$aprobados->proyecto;
                $mensajes->codigo=$aprobados->codigo_pro;
                $mensajes->profesor=$aprobados->profesor;
                $mensajes->usuario=$aprobados->usuario;
                $mensajes->msg_profesor = 'Haz sido '.$respuesta.' en el Proyecto';
                $mensajes->tipo_MSG=$respuesta;
                $mensajes->contador=1;

                $mensajes->save();

                 if($respuesta == 'Aceptado')
                 {
                solicitudes::where('id_sol','=',$id_sol[$i])->update(['aprobados' => 1]);
                }
                else
                {
                    solicitudes::where('id_sol', '=', $id_sol[$i])->update(['aprobados' => 2]);
                }
             }

            session()->flash('flash_message',$num.' Fueron '. $respuesta.'s');
           
            return redirect()->back();
        }else{
      session()->flash('flash_message','    No se ah seleccionado ningun alumno');
      return redirect()->back();
    }

    }
}