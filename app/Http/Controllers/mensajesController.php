<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mensajes;
use App\solicitudes;
use DB;

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
                
                $aprobados = DB::table('solicitudes')->select('solicitudes.id_usuario','solicitudes.idProy','solicitudes.id_usuario','usuario.usuario','solicitudes.id_creo','solicitudes.id_sol','solicitudes.id_usuario','proyectos.nombre','proyectos.codigo','proyectos.autor')->join('usuario','usuario.id','=','solicitudes.id_usuario')->join('proyectos','proyectos.id','=','solicitudes.idProy')->where([['solicitudes.id_creo','=',$user->id],['solicitudes.id_sol', '=', $id_sol[$i]]])->first();
               
                $mensajes = new mensajes();
                $mensajes->proyecto=$aprobados->nombre;
                $mensajes->codigo=$aprobados->codigo;
                $mensajes->profesor=$aprobados->autor;
                $mensajes->usuario=$aprobados->usuario;
                $mensajes->msg_profesor = 'Haz sido '.$respuesta.' en la actividad';
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