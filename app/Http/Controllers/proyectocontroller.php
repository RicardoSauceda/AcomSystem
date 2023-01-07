<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyecto;
use App\solicitudes;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class proyectocontroller extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'nombre' => 'required|min:5|max:100',
      'rol' => 'required',
      'cantidad' => 'Integer',
      'codigo' => 'required|unique:proyectos|min:6|max:20',
      'inicio' => 'required',
      'final' => 'required',
      'descrip' => 'required|max:200',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput(request(['nombre', 'rol', 'cantidad', 'inicio', 'final', 'departamento']));
    }

    $user = auth()->user();


    $tipo = DB::table('subtipo_acom')->select('subtipo_acom.Credito', 'tipo_acom.nombre_tipo')->join('tipo_acom', 'subtipo_acom.id_Acom', '=', 'tipo_acom.id_tipo')->where('id_sub', $request['sub'])->first();
    $idAcom = DB::table('subtipo_acom')->where('id_sub', $request['sub'])->first();


    $nombre = $request['nombre'];
    $rol = $request['rol'];
    $cantidad = $request['cantidad'];
    $credito = $tipo->Credito;
    $tipo = $tipo->nombre_tipo;
    $subtipo = $request['sub'];
    $codigo = $request['codigo'];
    $autor = $request['autor'];
    $departamento = $request['departamento'];
    $periodo = $request['periodo'];
    $año = $request['year'];
    $fecha = $request['inicio'];
    $fin = $request['final'];
    $descrip = $request['descrip'];

    $id_tipo = $idAcom->id_Acom;

    $nom_depa = DB::table('departamentos')->where('id_depat', '=', $departamento)->first();


    $proyecto = new proyecto();
    $proyecto->nombre = $nombre;
    $proyecto->cantidad = $cantidad;
    $proyecto->credito = $credito;
    $proyecto->tipo = $tipo;
    $proyecto->codigo = $codigo;
    $proyecto->autor = $user->nombre;
    $proyecto->rol_encargado = $rol;
    $proyecto->departamento = $nom_depa->nombre_depa;
    $proyecto->periodo =  $periodo;
    $proyecto->año = $año;
    $proyecto->fecha = $fecha;
    $proyecto->fin = $fin;
    $proyecto->descrip = $descrip;
    $proyecto->autorizacion = 0;

    $proyecto->id_tipo_acom = $id_tipo;

    $proyecto->id_SubTipoAcom = $request['sub'];
    $proyecto->id_creo = $user->id;
    $proyecto->id_depat = $departamento;


    $proyecto->save();
    //Flash::success("El proyecto se ha registrado correctamente");
    session()->flash('flash_message', 'El proyecto se ha registrado correctamente');
    return redirect()->back();
  }

  public function index(Request $request)
  {
    /* $proyectos = proyecto::orderBy('id', 'ASC')
            ->paginate(4);*/
    $user = auth()->user();

    $proyectosJ = proyecto::where('id_creo', '=', $user->id)->orderBy('created_at', 'desc')->paginate(10);


    return view('templates.jefe.consultarProyectos', compact('proyectosJ'));
  }

  public function index2(Request $request)
  {
    /* $proyectos = proyecto::orderBy('id', 'ASC')
            ->paginate(4);*/
    if (auth()->user()) {

      $user = auth()->user();

      $status = 1;

      $proyectosP = DB::table('proyectos')->where([['id_creo', '=', $user->id], ['autorizacion', '=', $status]])->join('departamentos', 'proyectos.id_depat', '=', 'departamentos.id_depat')->orderBy('created_at', 'desc')->paginate(3);




      return view('templates.profesor.consultarProyectosP', compact('proyectosP'));
    } else {
      return view('templates/principal');
    }
  }
  public function index3(Request $request)
  {
    /* $proyectos = proyecto::orderBy('id', 'ASC')
            ->paginate(4);*/
    $user = auth()->user();

    $proyectos = proyecto::where('id_creo', '=', $user->id)->orderBy('created_at', 'desc')->paginate(10);

    return view('templates.profesor.liberarP', compact('proyectos'));
  }
  public function index4(Request $request)
  {
    /* $proyectos = proyecto::orderBy('id', 'ASC')
            ->paginate(4);*/
    $user = auth()->user();

    $proyectos = proyecto::where('id_creo', '=', $user->id)->orderBy('created_at', 'desc')->paginate(10);


    return view('templates.jefe.liberarJ', compact('proyectos', 'dato'));
  }

  public function index5(Request $request)
  {
    /* $proyectos = proyecto::orderBy('id', 'ASC')
            ->paginate(4);*/
    $user = auth()->user();

    $proyectos = proyecto::where('id_creo', '=', $user->id)->orderBy('created_at', 'desc')->paginate(6);

    return view('templates.jefe.listarAlumnosAprobados', compact('proyectos'));
  }

  public function index6(Request $request)
  {
    /* $proyectos = proyecto::orderBy('id', 'ASC')
            ->paginate(4);*/
    $user = auth()->user();
    $status = 1;

    $proyectos = proyecto::where([['id_creo', '=', $user->id], ['autorizacion', '=', $status]])->join('departamentos', 'proyectos.id_depat', '=', 'departamentos.id_depat')->orderBy('created_at', 'desc')->paginate(6);

    return view('templates.profesor.AprobadosProfesor', compact('proyectos'));
  }

  public function index7(Request $request)
  {

    $user = auth()->user();
    $id_depa = $user->id_depa;
    $status = 0;

    $proyectos = proyecto::where([['id_depat', $id_depa], ['autorizacion', '=', $status]])->orderBy('created_at', 'DESC')->paginate(100);
    $proyectos2 = DB::table('proyectos')->where([['id_depat', $id_depa], ['autorizacion', '=', $status]])->orderBy('created_at', 'DESC')->paginate(100);
    $num = count($proyectos2);
    //dd($proyectos);

    return view('templates.jefe.Autorizar', compact('proyectos2', 'num'));
  }

  public function index8(Request $request, $id)
  {

    proyecto::where('id', '=', $id)->update(['autorizacion' => 1]);
    session()->flash('flash_message', '         El proyecto se autorizó exitosamente');

    return redirect()->back();
  }

  public function index9(Request $request, $id)
  {

    proyecto::where('id', '=', $id)->update(['autorizacion' => 2]);
    session()->flash('flash_messages', '         El proyecto se rechazo exitosamente');

    return redirect()->back();
  }

  public function index10(Request $request)
  {
    $user = auth()->user();
    $status1 = 0;
    $status2 = 2;

    $proyectos = DB::table('proyectos')->join('departamentos', 'proyectos.id_depat', '=', 'departamentos.id_depat')->where([['id_creo', '=', $user->id], ['autorizacion', '=', $status1]])
      ->orWhere([['id_creo', '=', $user->id], ['autorizacion', '=', $status2]])->orderBy('created_at', 'DESC')->paginate(1000);

    $numero = count($proyectos);
    return view('templates.profesor.consultarRechazadosP', compact('proyectos', 'numero'));
  }

  public function index11(Request $request)
  {
    $id = $request->get('tipo');
    $subt = DB::table('subtipo_acom')->select('id_sub', 'nombre_subtipo', 'Credito')->where('id_Acom', $id)->get();
    return $subt;
  }




  public function consulta(Request $request)
  {
    if (Auth::user()->departamento == "DepartamentodeSistemas") {
      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Sistemas')->orderBy('id', 'desc')->paginate(20);
      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }

    if (Auth::user()->departamento == "DepartamentodeDesarrolloAcademico") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Desarrollo Academico')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }
    if (Auth::user()->departamento == "DepartamentodeMecanica") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Mecanica')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }


    if (Auth::user()->departamento == "DepartamentodeGestionTecnologica") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Gestion Tecnologica')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }
    if (Auth::user()->departamento == "DepartamentodeExtraescolares") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Extraescolares')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }

    if (Auth::user()->departamento == "DepartamentodeIndustrial") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Industrial')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }

    if (Auth::user()->departamento == "DepartamentodeBioquimica") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Bioquimica')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }

    if (Auth::user()->departamento == "DepartamentodeQuimica") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Quimica')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }


    if (Auth::user()->departamento == "DepartamentodeGestionEmpresarial") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Gestion Empresarial')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }

    if (Auth::user()->departamento == "DepartamentodeLogistica") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Logistica')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }

    if (Auth::user()->departamento == "DepartamentodeElectrica") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Electrica')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }
    if (Auth::user()->departamento == "DepartamentodeElectronica") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Electronica')
        ->orderBy('id', 'desc')
        ->paginate(20);


      return view('templates.jefe.EstadisticasApr', compact('proyectos'));
    }
  }

  public function cambiar(Request $request, $id)
  {

    $proyecto = proyecto::find($id);
    return view('templates.jefe.modificarProyecto', compact('proyecto'));
  }

  public function cambiar2(Request $request, $id)
  {
    $fecha = intval(date('Y'));
    // dd($fecha);
    $array = array(
      '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
      '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
      '11' => '11',
    );
    $inicio = $fecha - 5;
    $depa = DB::table('departamentos')->select('id_depat', 'nombre_depa')->get();
    $tipo = DB::table('tipo_acom')->select('id_tipo', 'nombre_tipo as ntipo')->get();
    $proyecto = proyecto::where('id', '=', $id)->join('departamentos', 'proyectos.id_depat', '=', 'departamentos.id_depat')->join('subtipo_acom', 'proyectos.id_SubTipoAcom', '=', 'subtipo_acom.id_sub')->join('tipo_acom', 'subtipo_acom.id_Acom', '=', 'tipo_acom.id_tipo')->first();
    if ($proyecto->periodo == 1) {
      $periodo = "Enero-Junio";
    } else {
      $periodo = "Agosto-Diciembre";
    }
    return view('templates.profesor.cambioProyecto', compact('proyecto', 'depa', 'tipo', 'array', 'inicio', 'periodo'));
    // return view('templates.profesor.cambioProyectoP', compact('proyecto'));
  }

  public function cambia2(Request $request, $id)
  {
    $fecha = intval(date('Y'));
    // dd($fecha);
    $array = array(
      '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
      '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
      '11' => '11',
    );
    $inicio = $fecha - 5;
    $depa = DB::table('departamentos')->select('id_depat', 'nombre_depa')->get();
    $tipo = DB::table('tipo_acom')->select('id_tipo', 'nombre_tipo as ntipo')->get();
    $proyecto = proyecto::where('id', '=', $id)->join('departamentos', 'proyectos.id_depat', '=', 'departamentos.id_depat')->join('subtipo_acom', 'proyectos.id_SubTipoAcom', '=', 'subtipo_acom.id_sub')->join('tipo_acom', 'subtipo_acom.id_Acom', '=', 'tipo_acom.id_tipo')->first();
    if ($proyecto->periodo == 1) {
      $periodo = "Enero-Junio";
    } else {
      $periodo = "Agosto-Diciembre";
    }
    return view('templates.profesor.cambioProyecto2', compact('proyecto', 'depa', 'tipo', 'array', 'inicio', 'periodo'));
    // return view('templates.profesor.cambioProyectoP', compact('proyecto'));
  }

  public function cambiar3(Request $request, $id, $estatus)
  {
    proyecto::where('id', $id)->update(['statusFecha' => 1]);
    return redirect()->back();
  }
  public function cambiar4(Request $request, $id, $estatus)
  {
    proyecto::where('id', $id)->update(['statusFecha' => 0]);
    return redirect()->back();
  }

  public function elimin(Request $request, $id)
  {
    proyecto::where('id', $id)->delete();
    return redirect()->back();
  }



  public function update(Request $request, $id)
  {

    $validator = Validator::make($request->all(), [


      'nombre' => 'required|min:5|max:100',
      'rol' => 'required',
      'cantidad' => 'Integer',
      'departamento' => 'required',
      'tipo' => 'required',
      'inicio' => 'required|date',
      'fin' => 'required|date',
      'descrip' => 'required',


    ]);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput(request(['nombre', 'cantidad', 'tipo', 'departamento', 'inicio', 'fin', 'descrip']));
    }
    $user = auth()->user();

    $departa = DB::table('departamentos')->where('id_depat', $request->departamento)->first();
    $tipo = DB::table('subtipo_acom')->join('tipo_acom', 'subtipo_acom.id_Acom', '=', 'tipo_acom.id_tipo')->where('id_sub', $request->sub)->first();

    $cambio = proyecto::find($id);
    //contendio agregado
    $proyecto = $cambio->nombre;
    $desc = $cambio->descrip;
    $codigo = $cambio->codigo;
    //fin de contenido
    $cambio->nombre = $request->nombre;
    $cambio->rol_encargado = $request->rol;
    $cambio->cantidad = $request->cantidad;
    $cambio->departamento = $departa->nombre_depa;
    //$cambio->id_depat = $request->departamento;
    $cambio->tipo = $tipo->nombre_tipo;
    $cambio->credito = $tipo->Credito;
    $cambio->periodo = $request->periodo;
    $cambio->año = $request->year;
    $cambio->fecha = $request->inicio;
    $cambio->fin = $request->fin;
    $cambio->descrip = $request->descrip;

    $cambio->statusFecha = 0;

    $cambio->save();
    proyecto::where('id', $id)->update(['id_depat' => $request->departamento]);
    proyecto::where('id', $id)->update(['id_SubTipoAcom' => $request->sub]);

    //contenido agregado


    //fin de contenido

    session()->flash('flash_message', 'El Proyecto se modifico de forma correcta');
    return redirect()->back();
  }
}
