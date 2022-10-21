<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyecto;
use App\solicitudes;
use App\Liberados;
use Input;
use Session;
use PDF;
use Validator;
use hasFile;
use App\acoms;
use count;
use DB;
use sum;
use App\Http\Controllers\Zipper;

class LiberadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


     public function store(Request $request, $departamento)
    {   
        if ($request['chk']) {
          # code...
        

        $user = auth()->user();
        $pos = $request['pos'];
        $id_sol = $request['chk'];
        $num = count($id_sol);
        
        
        for ($i=0; $i <$num ; $i++) { 
          # code...
          
          $aprobados = solicitudes::where([['id_creo','=',$user->id],['id_sol', '=', $id_sol[$i]]])->first();

         
          solicitudes::where('id_sol','=',$id_sol[$i])->update(['calificacion' => 1]);

          $numControl=$aprobados->numControl;
          $codigo_pro=$aprobados->codigo_pro;
          $alumno=$aprobados->alumno;
          $usuario=$aprobados->usuario;
          $proyecto=$aprobados->proyecto;
          $codigo_pro=$aprobados->codigo_pro;
          $Carrera=$aprobados->carrera;
          $id_alum=$aprobados->id_alum;
          $tipo=$aprobados->tipo;
          $id_creo=$aprobados->id_creo;
          $credito=$aprobados->credito;

            $name = time().$codigo_pro.'_'.$numControl;

           

            //se agrego codigo
            
              switch ($Carrera) {
                case 'Ing. En Sistemas Computacionales': $carrera='Ingeniería en Sistemas Computacionales'; break;
                case 'Ing. Industrial': $carrera='Ingeniería Industrial'; break;
                case 'Ing. Mecánica': $carrera='Ingeniería Mecánica'; break;
                case 'Ing. Química': $carrera='Ingeniería Química'; break;
                case 'Ing. Bioquímica': $carrera='Ingeniería Bioquímica'; break;
                case 'Ing. Lógistica': $carrera='Ingeniería Lógistica'; break;
                case 'Ing. Eléctronica': $carrera='Ingeniería Eléctronica'; break;
                case 'Ing. Eléctrica': $carrera='Ingeniería Eléctrica'; break;
                case 'Ing. En Gestión Empresarial': $carrera='Ingeniería en Gestión Empresarial'; break;
                default: $carrera= $Carrera;  break;
              }
                
              switch ($departamento) {
                case 'Departamento de Sistemas':  $puestoDep = "Departamento de Sistemas y Computación";  
                                                    $jefe = DB::table('users')->where([['departamento', '=','DepartamentodeSistemas'],['categoria','=','Jefe de Departamento'],])->first();
                                                  break;  
                case 'Departamento de Desarrollo Academico': $puestoDep = "Departamento de Desarrollo Academico";  
                                                    $jefe = DB::table('users')->where([['departamento', '=','DepartamentodeDesarrolloAcademico'],['categoria','=','Jefe de Departamento'],])->first();
                  # code...
                  break;
                default: $puestoDep = "error al obtener departamento";  $jefe = "error al obtener departamento";             break;
                  
              }


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
       

          
           

          $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo_pro],])->first();

        //hasta aqui
         
        $liberado = new Liberados();
        $liberado->nombre = $alumno;
        $liberado->usuario = $usuario;
        $liberado->proyecto=$proyecto;
        $liberado->codigo_pro=$codigo_pro;
        $liberado->id_sol = $id_sol[$i];
        $liberado->id_alum = $id_alum;
        $liberado->tipo = $tipo;
        $liberado->credito=$credito;
        $liberado->id_creo = $id_creo;
        $liberado->calificacion = $pos;
        $liberado->pdf = $name.'.pdf';
        $liberado->archivo = $name.'.pdf';
        
        $liberado->save();

        //if($request->hasFile('archivo')){

        $acom = new Acoms();
        $acom->usuario = $usuario;
        $acom->proyecto = $proyecto;
        $acom->codigo = $codigo_pro;
        $acom->credito = $credito;
        $acom->pdf = $name.'.pdf';

        $acom->save();
    //}
    // se agrego codigo   
   if ($pos=='Malo') {
     
   }else {

     $pdf = PDF::loadView('templates.profesor.constaciaLiberacion', compact('aprobados', 'dato', 'pos', 'mes','dia','year', 'valNum', 'puestoDep','jefe','carrera','proy'))->save(public_path().'/archivos/'.$name.'.pdf');

    //return $pdf->stream('constancia.pdf');      
        }
        
    }session()->flash('flash_message', $num.'     se liberaron los alumnos ');
      return redirect()->back();

    }else{
      session()->flash('flash_messages','    No se seleccionaron alumno(s)');
      return redirect()->back();
    }

}


    public function liberarDeNuevo(Request $request,$apro){
      
       if ($request['chk']) {
          $id_sol = $request['chk'];
          $num = count($id_sol);
         // session()->flash('flash_message','    proceso exitoso');
        
        if ($apro=1) {
          for ($i=0; $i <$num ; $i++) { 
            $user = auth()->user();
            $aprobado = Liberados::where('id_sol','=',$id_sol[$i])->first();
            Acoms::where('pdf','=',$aprobado->pdf)->delete();
            Liberados::where('id_sol','=',$id_sol[$i])->delete();
            solicitudes::where('id_sol','=',$id_sol[$i])->update(['calificacion' => 0]);
            unlink(public_path().'/archivos/'.$aprobado->pdf);
            //print_r($id_sol[$i]);
                   }
              }else if ($apro=0) {
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

    public function download(Request $request, $apro){
      
      if ($request['chk']) {
        $id_sol = $request['chk'];
        $num = count($id_sol);
       // session()->flash('flash_message','    proceso exitoso');
      
      if ($apro=1) {
           $PDF = 'Aprobados.zip';
       
         $zip = new \ZipArchive();

        
         $zip->open($PDF, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
         
      
         $origen = realpath('archivos');
         
       
         $files = new \RecursiveIteratorIterator(
                     new \RecursiveDirectoryIterator($origen),
                     \RecursiveIteratorIterator::LEAVES_ONLY
         );
        
foreach ($files as $name => $file)
{
    for ($i=0; $i <$num ; $i++) { 
          $user = auth()->user();
          $aprobado = Liberados::where('id_sol','=',$id_sol[$i])->first();
     if ($file->getFilename()==$aprobado->pdf){
            if (!$file->isDir())
            {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($origen) + 1);

            $zip->addFile($filePath, $relativePath);
      }
     }
    }
    }
 }
        $zip->close();
           return response()->download($PDF);
      }else {
        return redirect()->back();
      }
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
         
         $Excelente = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Excelente'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
          $Notable = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Notable'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
           $Bueno = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Bueno'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
            $Suficiente = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Suficiente'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
            $apro=1;


            /* $Aprobados = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Excelente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Notable'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Bueno'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Suficiente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'aprobado'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);*/
          
            $apro=1;
            //hasta aqui

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
        return view('templates.profesor.aprobados', compact('Excelente','Notable','Bueno','Suficiente','dato','apro'/*,'Aprobados'*/));

    }
     public function index4(Request $request, $codigo)
    {

     $user = auth()->user();
        //se le cambio la comparacion de la consulta con el valor de Malo
        $Reprobados = liberados::where([['codigo_pro','=',$codigo],['calificacion', '=', 'Malo'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->paginate(40);
        $apro=0;

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
        return view('templates.profesor.noaprobados', compact('Reprobados', 'dato','apro'));


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
         $lista = liberados::where([['codigo_pro', '=', $codigo],['calificacion', '=', 'Excelente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Notable'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Bueno'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'Suficiente'],['id_creo','=', $user->id],])->orWhere([['codigo_pro', '=', $codigo],['calificacion', '=', 'aprobado'],['id_creo','=', $user->id],])->orderBy('nombre','asc')->get();

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        $pdf = PDF::loadView('templates.profesor.aprobadosPDFprofesor', compact('lista','dato'));

        return $pdf->stream('listadoPDF');


    }

    public function PDFReprobado(Request $request, $codigo)
    {
       
        $user = auth()->user();

         $lista = liberados::where([['id_creo', '=', $user->id],['codigo_pro','=',$codigo],['calificacion', '=', 'reprobado'],])->orderBy('nombre','asc')->paginate(40);

        $dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

        $pdf = PDF::loadView('templates.profesor.ReprobadosPDFprofesor', compact('lista', 'dato'));

        return $pdf->download('listadoPDF.pdf');


    }


   
}
