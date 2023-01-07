<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\solicitudes;
use Alert;
use Laracasts\Flash\Flash; 
use App\proyecto;
use Session;
use App\Liberados;
use Illuminate\Support\Facades\Input;
use App\mensajes;
use PDF;
use DB;
use with;
use first;
use sort;


class SolicitudesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(Request $request, $codigo)
    {
        /*$solicitud = \DB::table('solicitudes')->select('id','alumno','apellidos','carrera','semestre','numControl','proyecto','descripcion','profesor','credito','cantidad','tipo','fecha')->get();*/
        $user = auth()->user();
        

        $solicitudjefe = solicitudes::where([['id_creo', '=', $user->id],['codigo_pro','=',$codigo],['aprobados','=',0],])->orderBy('apellidos','asc')->paginate(100);

            $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        return view('templates.jefe.consultarSolicitudes', compact('solicitudjefe','dato'));
    }

    public function index2(Request $request, $codigo)
    {
        
        $user = auth()->user();
 
         $solicitudprofe = DB::table('solicitudes')->select('solicitudes.id_sol','solicitudes.id_usuario','usuario.nombre','usuario.apellidos','usuario.numControl','usuario.usuario','usuario.id_carrera','carreras.Carrera')->join('usuario','usuario.id','=','solicitudes.id_usuario')->join('carreras','carreras.idCar','=','usuario.id_carrera')->where([['id_creo', '=', $user->id],['idProy',$codigo],['aprobados','=',0],])->orderBy('usuario.apellidos','asc')->get();
        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['id','=',$codigo],])->first();
            
            $numero = count($solicitudprofe);
          if (count($solicitudprofe)>0) {
            $token=true;
            return view('templates.profesor.consultarSolicitudesP', compact('solicitudprofe','dato','token','numero'));
            
        }else{
            $token=false;
            return view('templates.profesor.consultarSolicitudesP', compact('solicitudprofe','dato','token','numero'));
            
        }
    }
    public function destroy(Request $request, $id_sol, $alumno)
    {
        solicitudes::where('id_sol', '=',$id_sol)->delete();//->update(['aprobados' => 2]); se puede agregar esta fila para que en vez de que se elimine de la tabla solo no lo seleccione
       
        session()->flash('flash_message', $alumno.' Fue Descartado');
         return redirect()->back();

    }

    public function destroy2(Request $request, $id_sol, $alumno)
    {
        solicitudes::where('id_sol', '=',$id_sol)->delete();
       
        session()->flash('flash_message', $alumno.' Fue Descartado');
         return redirect()->back();

    }

    public function aprobados(Request $request, $codigo)
    {
         $user = auth()->user();

         $solicitud = solicitudes::where([['id_creo', '=', $user->id],['codigo_pro','=',$codigo],['aprobados', '=', 1],])
        ->orderBy('apellidos','asc')->paginate(100);

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        return view('templates.jefe.listarAlumnosInscritos', compact('solicitud','dato'));

    }
    public function aprobados2(Request $request, $codigo)
    {
         $user = auth()->user();

         $solicitud = DB::table('solicitudes')->select('solicitudes.id_sol','solicitudes.id_usuario','usuario.nombre','usuario.apellidos','usuario.numControl','usuario.usuario','usuario.id_carrera','carreras.Carrera')->join('usuario','usuario.id','=','solicitudes.id_usuario')->join('carreras','carreras.idCar','=','usuario.id_carrera')->where([['id_creo', '=', $user->id],['idProy','=',$codigo],['aprobados', '=', 1],])->orderBy('apellidos','asc')->paginate(100);

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['id','=',$codigo],])->first();

        return view('templates.profesor.listarAlumnosInscritosP', compact('solicitud','dato'));

    }

    public function liberar(Request $request, $codigo)
    {
        $user = auth()->user();
        $aprobados = solicitudes::where([['aprobados', '=', 1],['calificacion', '=', 0],['id_creo','=',$user->id],['codigo_pro', '=', $codigo]])->orderBy('apellidos','asc')->paginate(20);
          $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
        return view('templates.jefe.liberarAlumnos',compact('aprobados','dato'));

    }

    public function liberar2(Request $request, $codigo)
    {
        
        if(auth()->user()){
            $user = auth()->user();
        $aprobados = DB::table('solicitudes')->select('solicitudes.id_sol','solicitudes.id_usuario','usuario.nombre','usuario.apellidos','usuario.numControl','usuario.usuario','usuario.id_carrera','carreras.Carrera')->join('usuario','usuario.id','=','solicitudes.id_usuario')->join('carreras','carreras.idCar','=','usuario.id_carrera')->where([['aprobados', '=', 1],['calificacion', '=', 0],['id_creo','=',$user->id],['idProy', '=', $codigo]])->orderBy('apellidos','asc')->paginate(20000);
          $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['id','=',$codigo],])->first();
          $tipo = DB::table('subtipo_acom')->join('tipo_acom','subtipo_acom.id_Acom','=','tipo_acom.id_tipo')->where('id_sub',$dato->id_SubTipoAcom)->first();
          $numero = count($aprobados);
          // dd($numero);
        if (count($aprobados)>0) {
            $token=true;
            return view('templates.profesor.liberarAlumnosP',compact('numero','aprobados','tipo','dato','token'));
            # code...
        }else{
            $token=false;
            return view('templates.profesor.liberarAlumnosP',compact('aprobados','tipo','dato','token','numero'));
        }
    }else{
        return view('templates.principal');
    }
       // return view('templates.profesor.liberarAlumnosP',compact('aprobados','dato'));
    

    }
//te direcciona a la ruta de evaluar alumno
    public function liberar3(){
        return view('templates.profesor.evaluarAlumnoP');
    }
// te direcciona a la ruta 
    /* public function visualizarDoc(){
        return view('templates.profesor.visualizarPdf');
    }*/

    public function Generar(Request $request, $codigo)
    {
       
        $user = auth()->user();

         $lista = solicitudes::where([['id_creo', '=', $user->id],['codigo_pro','=',$codigo],['aprobados', '=', 1],])->orderBy('apellidos','asc')->paginate(100);

        //$dato = proyecto::where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        $pdf = PDF::loadView('templates.jefe.listadoPDF', compact('lista', 'dato'));

        return $pdf->download('listadoPDF.pdf');


    }

    public function GenerarPDF(Request $request, $codigo)
    {
       
        $user = auth()->user();

         $lista = DB::table('solicitudes')->select('solicitudes.id_sol','solicitudes.id_usuario','usuario.nombre','usuario.apellidos','usuario.numControl','usuario.usuario','usuario.id_carrera','carreras.Carrera')->join('usuario','usuario.id','=','solicitudes.id_usuario')->join('carreras','carreras.idCar','=','usuario.id_carrera')->where([['id_creo', '=', $user->id],['idProy','=',$codigo],['aprobados', '=', 1],])->orderBy('apellidos','asc')->paginate(100);

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['id','=',$codigo],])->first();

        $pdf = PDF::loadView('templates.profesor.ListaPDFprofesor', compact('lista','dato'));

        return $pdf->stream('listadoPDF.pdf');


    }

  
   
}
