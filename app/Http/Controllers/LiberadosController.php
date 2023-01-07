<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyecto;
use App\solicitudes;
use App\Liberados;
use App\mensajes;
use Input;
use Session;
use PDF;
use Validator;
use hasFile;
use App\acoms;
use count;
use DB;
use sum;

class LiberadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


     public function store(Request $request)
    {   
      if (auth()->user()) {
       

        if ($request['chk']) {
          # code...
        

        $user = auth()->user();
        $pos = $request['pos'];
        $id_sol = $request['chk'];
        $num = count($id_sol);
        
        
        for ($i=0; $i <$num ; $i++) { 
          # code...
          
          $aprobados = DB::table('solicitudes')->select('solicitudes.idProy','solicitudes.id_sol','solicitudes.id_creo','solicitudes.id_usuario','usuario.nombre','usuario.apellidos','usuario.numControl','usuario.usuario','usuario.id_carrera','carreras.Carrera')->join('usuario','usuario.id','=','solicitudes.id_usuario')->join('carreras','carreras.idCar','=','usuario.id_carrera')->where([['id_creo','=',$user->id],['id_sol', '=', $id_sol[$i]]])->first();

          
          solicitudes::where('id_sol','=',$id_sol[$i])->update(['calificacion' => 1]);

          $numControl=$aprobados->numControl;
          $codigo_pro = $aprobados->idProy;
          $alumno=$aprobados->nombre;
          $usuario=$aprobados->usuario;
          $Carrera=$aprobados->Carrera;
          $id_alum=$aprobados->id_usuario;
          $id_creo=$aprobados->id_creo;
          

           

           

            //se agrego codigo
            
            
                
              $dia = date('d');
              $year = date('y');
             $fecha = date('m');
               switch ($fecha) {
                   case '01': $mes="enero";               break;
                   case '02': $mes="febrero";               break;
                   case '03': $mes="marzo";               break;
                   case '04': $mes="abril";               break;
                   case '05': $mes="mayo";               break;
                   case '06': $mes="junio";               break;
                   case '07': $mes="julio";               break;
                   case '08': $mes="agosto";               break;
                   case '09': $mes="septiembre";               break;
                   case '10': $mes="octubre";               break;
                   case '11': $mes="noviembre";               break;
                   case '12': $mes="diciembre";               break;
                   default:
                   echo "error al obtener la fecha";               break;
               }

               if ($dia == 1) {
                $Fecha = 'a '.$dia.' día del mes de '.$mes.' del '.$year; 
               }else{
                $Fecha = 'a los '.$dia.' días del mes de '.$mes.' del 20'.$year;
               }


               switch ($pos) {
                   case 'Excelente': $valNum = 4;               break;
                   case 'Notable': $valNum = 3;               break;
                   case 'Bueno': $valNum = 2;               break;
                   case 'Suficiente': $valNum = 1;               break;
                   case 'Malo': $valNum = 0;               break;
                   
                   default:
                       # code...
                       break;
               }
       

          
           

          $dato = DB::table('proyectos')->select('proyectos.codigo','proyectos.autor','proyectos.tipo','proyectos.nombre','proyectos.credito','proyectos.rol_encargado','proyectos.id_SubTipoAcom','departamentos.nombre_depa as depart_name','departamentos.id_jefe','proyectos.periodo','proyectos.año')->join('departamentos','proyectos.id_depat','=','departamentos.id_depat')->where([['id_creo', '=', $user->id],['id','=',$codigo_pro]])->first();

          $jefe_dep= DB::table('users')->where('id',$dato->id_jefe)->first();

          $tipo = DB::table('subtipo_acom')->join('tipo_acom','subtipo_acom.id_Acom','=','tipo_acom.id_tipo')->where('id_sub',$dato->id_SubTipoAcom)->first();

           $name = time().$dato->codigo.'_'.$numControl;

          if ($dato->periodo==1) {
            $periodo = "Enero-Junio";

          }else{
            $periodo = "Agosto-Diciembre";
          }

          $jefe_servicios= DB::table('departamentos')->join('users','users.id','=','departamentos.id_Jefe')->where('departamentos.id_depat',10)->first();

          // $dato = DB::table('proyectos')->select('proyectos.autor','proyectos.tipo','proyectos.nombre','proyectos.credito','proyectos.rol_encargado','departamentos.nombre_depa','users.nombre as nombre_jefe')->join('departamentos','proyectos.id_depat','=','departamentos.id')->join('users','departamentos.id_depat','=','users.id')->where([['id_creo', '=', $user->id],['codigo','=',$codigo_pro]])->first();
         


           // switch ($departamento) {
           //      case 'Departamento de Sistemas':  $puestoDep = "Departamento de Sistemas y Computación";  
           //                                          $jefe = DB::table('users')->where([['departamento', '=','DepartamentodeSistemas'],['categoria','=','Jefe de Departamento'],])->first();
           //                                        break;  
           //      case 'Departamento de Desarrollo Academico': $puestoDep = "Departamento de Desarrollo Academico";  
           //                                          $jefe = DB::table('users')->where([['departamento', '=','DepartamentodeDesarrolloAcademico'],['categoria','=','Jefe de Departamento'],])->first();
           //        # code...
           //        break;
           //      default: $puestoDep = "error al obtener departamento";  $jefe = "error al obtener departamento";             break;
                  
           //    }

        //hasta aqui
         
        $liberado = new Liberados();
        $liberado->nombre = $alumno;
        $liberado->usuario = $usuario;
        $liberado->proyecto=$dato->nombre;
        $liberado->codigo_pro=$dato->codigo;
        $liberado->id_sol = $id_sol[$i];
        $liberado->id_usuarios=$id_alum;
        $liberado->tipo = $tipo->nombre_tipo;
        $liberado->credito=$tipo->Credito;
        $liberado->id_creo = $id_creo;
        $liberado->calificacion = $pos;
        $liberado->pdf = $name.'.pdf';
        $liberado->archivo = $name.'.pdf';
        
        $liberado->save();

        //if($request->hasFile('archivo')){

        $acom = new Acoms();
        $acom->usuario = $usuario;
        $acom->proyecto = $dato->nombre;
        $acom->codigo = $dato->codigo;
        $acom->credito = $tipo->Credito;
        $acom->pdf = $name.'.pdf';

        $acom->save();
      
       
    //}
    // se agrego codigo   
   if ($pos=='Malo') {
       $respuesta = 'No_Liberado';
       $mensajes = new mensajes();
       $mensajes->proyecto=$dato->nombre;
       $mensajes->codigo=$dato->codigo;
       $mensajes->profesor=$dato->autor;
       $mensajes->usuario=$aprobados->usuario;
       $mensajes->msg_profesor = 'No has aprobado la actividad';
       $mensajes->tipo_MSG=$respuesta;
       $mensajes->contador=1;
       $mensajes->save();
     
   }else {
        $respuesta = 'Liberado';
       $mensajes = new mensajes();
       $mensajes->proyecto=$dato->nombre;
       $mensajes->codigo=$dato->codigo;
       $mensajes->profesor=$dato->autor;
       $mensajes->usuario=$aprobados->usuario;
       $mensajes->msg_profesor = 'Has sido liberado en la actividad, revisa la pestaña Acoms';
       $mensajes->tipo_MSG=$respuesta;
       $mensajes->contador=1;
       $mensajes->save();
     $pdf = PDF::loadView('templates.profesor.constaciaLiberacion', compact('jefe_servicios','periodo','aprobados', 'dato', 'pos', 'Fecha', 'valNum','jefe_dep','tipo'))->save(public_path().'/archivos/'.$name.'.pdf');

    //return $pdf->stream('constancia.pdf');      
        }
        
    }session()->flash('flash_message', '        se liberó '.$num.' alumno(s)');
      return redirect()->back();

    }else{
      session()->flash('flash_messages','       No se seleccionaron alumno(s)');
      return redirect()->back();
    }
  }else{
    return redirect()->back();
  }

}


    public function liberarDeNuevo(Request $request,$apro){
      
       if ($request['chk']) {
          $id_sol = $request['chk'];
          $num = count($id_sol);
         // session()->flash('flash_message','    proceso exitoso');
        
        if ($apro==1) {
          for ($i=0; $i <$num ; $i++) { 
            $user = auth()->user();
            $aprobado = Liberados::where('id_sol','=',$id_sol[$i])->first();
            Acoms::where('pdf','=',$aprobado->pdf)->delete();
            Liberados::where('id_sol','=',$id_sol[$i])->delete();
            solicitudes::where('id_sol','=',$id_sol[$i])->update(['calificacion' => 0]);
            unlink(public_path().'/archivos/'.$aprobado->pdf);

            $respuesta = 'Cancelado';

             $mensajes = new mensajes();
             $mensajes->proyecto=$aprobado->proyecto;
             $mensajes->codigo=$aprobado->codigo_pro;
             $mensajes->usuario=$aprobado->usuario;
             $mensajes->msg_profesor = 'Tu liberación en la actividad ah sido cancelada, te evaluarán de nuevo';
             $mensajes->tipo_MSG=$respuesta;
             $mensajes->contador=1;
             $mensajes->save();
            //print_r($id_sol[$i]);
                   }
              }else if ($apro==0) {
                     for ($i=0; $i <$num ; $i++) { 
                      $user = auth()->user();
                      Liberados::where('id_sol','=',$id_sol[$i])->delete();
                      solicitudes::where('id_sol','=',$id_sol[$i])->update(['calificacion' => 0]);
                      //print_r($id_sol[$i]);
                        }
                 }session()->flash('flash_message','    proceso exitoso');
        }else{session()->flash('flash_messages','    No se seleccionaron alumnos');}
        
      return redirect()->back();

    }

    public function index(Request $request, $codigo)
    {

        $user = auth()->user();
        $Aprobados = liberados::where([['codigo_pro','=',$codigo],['calificacion', '=', 'aprobado'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
        return view('templates.jefe.Aprobados', compact('Aprobados','dato'));

    }
     

    public function index2(Request $request, $codigo)
    {

     $user = auth()->user();
        $Reprobados = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'reprobado'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
        return view('templates.jefe.Reprobados', compact('Reprobados', 'dato'));


    }

 public function index3(Request $request, $codigo)
    {

        $user = auth()->user();
        /*$Aprobados = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'aprobado'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);*/
        //seccion agregada

        $Notables = DB::table('liberados')->select('liberados.tipo','liberados.id_sol','liberados.calificacion','liberados.credito','usuario.id','usuario.nombre','usuario.apellidos','usuario.numControl')->join('usuario','usuario.id','=','liberados.id_usuarios')->where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Excelente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Notable'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Bueno'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Suficiente'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40000);
        $numero = count($Notables);
         
         // $Excelente = DB::table('liberados')->select('liberados.tipo','liberados.id_sol','liberados.calificacion','liberados.credito','usuario.id','usuario.nombre','usuario.apellidos','usuario.numControl')->join('usuario','usuario.id','=','liberados.id_usuarios')->where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Excelente'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
         //  $Notable = DB::table('liberados')->select('liberados.tipo','liberados.id_sol','liberados.calificacion','liberados.credito','usuario.id','usuario.nombre','usuario.apellidos','usuario.numControl')->join('usuario','usuario.id','=','liberados.id_usuarios')->where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Notable'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
         //   $Bueno = DB::table('liberados')->select('liberados.tipo','liberados.id_sol','liberados.calificacion','liberados.credito','usuario.id','usuario.nombre','usuario.apellidos','usuario.numControl')->join('usuario','usuario.id','=','liberados.id_usuarios')->where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Bueno'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
         //    $Suficiente = DB::table('liberados')->select('liberados.tipo','liberados.id_sol','liberados.calificacion','liberados.credito','usuario.id','usuario.nombre','usuario.apellidos','usuario.numControl')->join('usuario','usuario.id','=','liberados.id_usuarios')->where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Suficiente'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
            $apro=1;


            /* $Aprobados = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Excelente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Notable'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Bueno'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Suficiente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'aprobado'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);*/
          
            //$apro=1;
            //hasta aqui

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
        return view('templates.profesor.aprobados', compact('Notables','numero','dato','apro'/*,'Aprobados'*/));

    }
     public function index4(Request $request, $codigo)
    {

     $user = auth()->user();
        //se le cambio la comparacion de la consulta con el valor de Malo
        $Reprobados = DB::table('liberados')->select('liberados.tipo','liberados.id_sol','liberados.calificacion','liberados.credito','usuario.id','usuario.nombre','usuario.apellidos','usuario.numControl')->join('usuario','usuario.id','=','liberados.id_usuarios')->where([['codigo_pro','=',$codigo],['calificacion', '=', 'Malo'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
        $apro=0;
        $numero = count($Reprobados);
        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
        return view('templates.profesor.noaprobados', compact('Reprobados','numero', 'dato','apro'));


    }

    public function Generar(Request $request, $codigo)
    {
       
        $user = auth()->user();

         $lista = liberados::where([['id_creo', '=', $user->id],['codigo_pro','=',$codigo],['calificacion', '=', 'reprobado'],])->orderBy('nombre','asc')->paginate(40);

       $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        $pdf = PDF::loadView('templates.jefe.ReprobadosPDF', compact('lista','dato'));

        return $pdf->download('listadoPDF.pdf');


    }

    public function GenerarPDF(Request $request, $codigo)
    {
       
        $user = auth()->user();

         $lista = liberados::where([['id_creo', '=', $user->id],['codigo_pro','=',$codigo],['calificacion', '=', 'aprobado'],])->orderBy('nombre','asc')->paginate(40);
        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        $pdf = PDF::loadView('templates.jefe.AprobadosPDF', compact('lista', 'dato'));

        return $pdf->download('listadoPDF.pdf');


    }


    public function PDFProfe(Request $request, $codigo)
    {
       
        $user = auth()->user();

         /*$lista = liberados::where([['id_creo', '=', $user->id],['codigo_pro','=',$codigo],['calificacion', '=', 'aprobado'],])->orderBy('nombre','asc')->paginate(100);*/
         
          $lista = DB::table('liberados')->select('liberados.tipo','liberados.id_sol','liberados.calificacion','liberados.credito','usuario.id','usuario.nombre','usuario.apellidos','usuario.numControl')->join('usuario','usuario.id','=','liberados.id_usuarios')->where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Excelente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Notable'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Bueno'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Suficiente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'aprobado'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->get();

         // $lista = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Excelente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Notable'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Bueno'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Suficiente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'aprobado'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->get();

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        $pdf = PDF::loadView('templates.profesor.aprobadosPDFprofesor', compact('lista','dato'));

        return $pdf->stream('listadoPDF');


    }

    public function PDFReprobado(Request $request, $codigo)
    {
       
        $user = auth()->user();

         $lista = DB::table('liberados')->select('liberados.tipo','liberados.id_sol','liberados.calificacion','liberados.credito','usuario.id','usuario.nombre','usuario.apellidos','usuario.numControl')->join('usuario','usuario.id','=','liberados.id_usuarios')->where([['id_creo', '=', $user->id],['codigo_pro','=',$codigo],['calificacion', '=', 'malo'],])->orderBy('nombre','asc')->paginate(40);

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        $pdf = PDF::loadView('templates.profesor.ReprobadosPDFprofesor', compact('lista', 'dato'));

        return $pdf->stream('listadoPDF');


    }


   
}
