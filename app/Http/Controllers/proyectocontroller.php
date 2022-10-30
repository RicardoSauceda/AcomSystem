<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\proyecto;
use App\solicitudes;
use Laracasts\Flash\Flash;
use Auth;
use App\User;
use Session;
use Validator;
use DB;

class proyectocontroller extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request -> all(), [
      'nombre' => 'required|min:5|max:100',
      'rol' => 'required',
      'cantidad' => 'Integer',
      'codigo' => 'required|unique:proyectos|min:1|max:6',
      'inicio' => 'required',
      'final' => 'required',
      'descrip' => 'required',
    ]);

    if ($validator -> fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput(request(['nombre', 'rol', 'cantidad', 'inicio', 'final', 'departamento']));
    }

    $user = auth()->user();

    $nombre = $request['nombre'];
    $rol = $request['rol'];
    $cantidad = $request['cantidad'];
    $credito = $request['credito'];
    $tipo = $request['tipo'];
    $codigo = $request['codigo'];
    $autor = $request['autor'];
    $departamento = $request['departamento'];
    $fecha = $request['inicio'];
    $fin = $request['final'];
    $descrip = $request['descrip'];

    $proyecto = new proyecto();
    $proyecto->nombre = $nombre;
    $proyecto->cantidad = $cantidad;
    $proyecto->credito = $credito;
    $proyecto->tipo = $tipo;
    $proyecto->codigo = $codigo;
    $proyecto->autor = $user->nombre;
    $proyecto->rol_encargado = $rol;
    $proyecto->departamento = $departamento;
    $proyecto->fecha = $fecha;
    $proyecto->fin = $fin;
    $proyecto->descrip = $descrip;
    $proyecto->id_creo = $user->id;


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
    $user = auth()->user();

    $proyectosP = proyecto::where('id_creo', '=', $user->id)->orderBy('created_at', 'desc')->paginate(10);

    return view('templates.profesor.consultarProyectosP', compact('proyectosP'));
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

    $proyectos = proyecto::where('id_creo', '=', $user->id)->orderBy('created_at', 'desc')->paginate(6);

    return view('templates.profesor.AprobadosProfesor', compact('proyectos'));
  }


  public function consulta(Request $request)
  {
    if (Auth::user()->departamento == "DepartamentodeSistemas") {

      $proyectos = proyecto::Where('departamento', '=', 'Departamento de Sistemas')
        /*->orWhere('tipo', '=', 'Acom2:Proyectos de Investigacion')
       ->orWhere('tipo', '=', 'Acom3:Eventos Academicos')
       ->orWhere('tipo', '=', 'Acom6:Participacion en Ediciones')
       ->orWhere('tipo', '=', 'Acom1:Tutorias')*/
        ->orderBy('id', 'desc')
        ->paginate(20);


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

    $proyecto = proyecto::find($id);
    return view('templates.profesor.cambioProyecto', compact('proyecto'));
    // return view('templates.profesor.cambioProyectoP');
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


    $cambio = proyecto::find($id);
    //contendio agregado
    $proyecto = $cambio->nombre;
    $desc = $cambio->descrip;
    $codigo = $cambio->codigo;
    //fin de contenido
    $cambio->nombre = $request->nombre;
    $cambio->rol_encargado = $request->rol;
    $cambio->cantidad = $request->cantidad;
    $cambio->departamento = $request->departamento;
    $cambio->tipo = $request->tipo;
    $cambio->credito = $request->credito;
    $cambio->fecha = $request->inicio;
    $cambio->fin = $request->fin;
    $cambio->descrip = $request->descrip;
    $cambio->statusFecha = 0;

    $cambio->save();

    //contenido agregado

    solicitudes::where('codigo_pro', '=', $codigo)->update(['credito' => $request->credito]);
    solicitudes::where('codigo_pro', '=', $codigo)->update(['tipo' => $request->tipo]);
    solicitudes::where('codigo_pro', '=', $codigo)->update(['cantidad' => $request->cantidad]);
    solicitudes::where('codigo_pro', '=', $codigo)->update(['descripcion' => $request->descrip]);
    solicitudes::where('codigo_pro', '=', $codigo)->update(['proyecto' => $request->nombre]);
    //fin de contenido

    session()->flash('flash_message', 'El Proyecto se modifico de forma correcta');
    return redirect()->back();
  }
}
