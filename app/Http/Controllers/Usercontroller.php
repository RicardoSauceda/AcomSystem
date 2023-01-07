<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'nombre' => 'required|min:10|max:40',
            'usuario' => 'required|unique:users|min:5|max:20',
            'password' => 'required|min:5|max:20',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(request(['nombre', 'usuario', 'departamento', 'categoria']));
        }

        
        $nombre = $request['nombre'];
        $departamento = $request['departamento'];
        $categoria = $request['categoria'];
        $usuario = $request['usuario'];
        $password = bcrypt($request['password']);
        $correo = $request['correo'];
        $user = new User();
        $user->nombre = $nombre;
        $user->departamento = $departamento;

        switch ($departamento) {
            case "DepartamentodeSistemas":
                $user->id_depa = 3;
            break;
            case "DepartamentodeMecanica":
                $user->id_depa = 12;
            break;
            case "DepartamentodeIndustrial":
                $user->id_depa = 6;
            break;
            case "DepartamentodeBioquimica":
                $user->id_depa = 5;
            break;
            case "DepartamentodeQuimica":
                $user->id_depa = 5;
            break;
            case "DepartamentodeGestionEmpresarial":
                $user->id_depa = 0;   //Pendiente -> No existe en la BD
            break;
            case "DepartamentodeLogistica":
                $user->id_depa = 0;     //Pendiente -> No existe en la BD
            break;
            case "DepartamentodeElectrica":
               $user->id_depa = 4;
            break;
            case "DepartamentodeElectronica":
                $user->id_depa = 4;
            break;
            case "DepartamentodeExtraescolares":
                $user->id_depa = 9; 
            break;
            case "DepartamentodeGestionTecnologica":
                $user->id_depa = 0;    //Pendiente -> No existe en la BD
            break;
            case "DepartamentodeDesarrolloAcademico":
               $user->id_depa = 2;
        }
        
        $user->categoria = $categoria;
        $user->usuario = $usuario;
        $user->password = $password;
        $user->email = $correo;
        $user->save();

        session()->flash('flash_message', 'El Usuario Se Registro Correctamente');
        return redirect()->back();
    }

    public function store2(Request $request, $id_depat)
    {


        $profesor = $request['profesor'];
        // $jefe = DB::table('departamentos')->where('id_depat','!=',$nombre)->where('id_jefe',$profesor)->get();
        // dd($jefe);
        // if ($jefe) {
        //     session()->flash('flash_messages', 'El profesor elegido ya es jefe de departamento');
        // return redirect()->back(); 
        // }else{

        DB::table('departamentos')->where('id_depat', $id_depat)->update(['id_jefe' => $profesor]);


        session()->flash('flash_message', 'El Jefe de Departamento Se Cambio Correctamente');
        return redirect()->back();
        // }
    }

    public function store3(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'nombre' => 'required|min:10|max:40',
            'usuario' => 'required|unique:users|min:5|max:20',
            'password' => 'required|min:5|max:20',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(request(['nombre', 'usuario', 'departamento', 'categoria']));
        }

        
        $nombre = $request['nombre'];
        $departamento = $request['departamento'];
        $categoria = $request['categoria'];
        $usuario = $request['usuario'];
        $password = bcrypt($request['password']);
        $correo = $request['correo'];
        $user = new User();
        $user->nombre = $nombre;
        $user->departamento = $departamento;

        switch ($departamento) {
            case "DepartamentodeSistemas":
                $user->id_depa = 3;
            break;
            case "DepartamentodeMecanica":
                $user->id_depa = 12;
            break;
            case "DepartamentodeIndustrial":
                $user->id_depa = 6;
            break;
            case "DepartamentodeBioquimica":
                $user->id_depa = 5;
            break;
            case "DepartamentodeQuimica":
                $user->id_depa = 5;
            break;
            case "DepartamentodeGestionEmpresarial":
                $user->id_depa = 0;   //Pendiente -> No existe en la BD
            break;
            case "DepartamentodeLogistica":
                $user->id_depa = 0;     //Pendiente -> No existe en la BD
            break;
            case "DepartamentodeElectrica":
               $user->id_depa = 4;
            break;
            case "DepartamentodeElectronica":
                $user->id_depa = 4;
            break;
            case "DepartamentodeExtraescolares":
                $user->id_depa = 9; 
            break;
            case "DepartamentodeGestionTecnologica":
                $user->id_depa = 0;    //Pendiente -> No existe en la BD
            break;
            case "DepartamentodeDesarrolloAcademico":
               $user->id_depa = 2;
        }
        
        $user->categoria = $categoria;
        $user->usuario = $usuario;
        $user->password = $password;
        $user->email = $correo;
        $user->save();

        session()->flash('flash_message', 'El Usuario Se Registro Correctamente');
        return redirect()->back();
    }

    public function store4(Request $request, $id_depat)
    {


        $profesor = $request['nombre'];


        DB::table('departamentos')->where('id_depat', $id_depat)->update(['nombre_depa' => $profesor]);


        session()->flash('flash_message', 'El Nombre del Departamento Se Cambio Correctamente');
        return redirect()->back();
        // }
    }

    public function store5(Request $request, $idCar)
    {


        $depa = $request['departamento'];
        // $jefe = DB::table('departamentos')->where('id_depat','!=',$nombre)->where('id_jefe',$profesor)->get();
        // dd($jefe);
        // if ($jefe) {
        //     session()->flash('flash_messages', 'El profesor elegido ya es jefe de departamento');
        // return redirect()->back(); 
        // }else{

        DB::table('carreras')->where('idCar', $idCar)->update(['id_Departamento' => $depa]);


        session()->flash('flash_message', 'El Departamento de la Carrera Se Cambio Correctamente');
        return redirect()->back();
        // }
    }

    public function store6(Request $request, $idCar)
    {


        $carre = $request['nombre'];


        DB::table('carreras')->where('idCar', $idCar)->update(['Carrera' => $carre]);


        session()->flash('flash_message', 'El Nombre de la Carrera Se Cambio Correctamente');
        return redirect()->back();
        // }
    }

    public function store7(Request $request)
    {

        // dd($request);

        $nombre = $request['nombre'];
        $depa = $request['departamento'];

        $id = DB::table('carreras')->insert(['Carrera' => $nombre, 'id_Departamento' => $depa]);





        session()->flash('flash_message', 'La carrera Se Registro Correctamente');
        return redirect()->back();
    }

    public function index(Request $request)
    {

        $nombre = $request->get('nombre');
        $departamento = $request->get('departamento');

        $depar = DB::table('carreras')->join('departamentos', 'departamentos.id_depat', '=', 'carreras.id_Departamento')->join('users', 'users.id', '=', 'departamentos.id_Jefe')->paginate(8);

        $jefes = DB::table('departamentos')->join('users', 'users.id', '=', 'departamentos.id_Jefe')
            ->orderBy('id_depat', 'ASC')->paginate(8);


        return view('templates.administrador.carrerasRegistrados', compact('jefes', 'depar'));
    }

    public function index2(Request $request)
    {

        $nombre = $request->get('nombre');
        $departamento = $request->get('departamento');

        $depar = DB::table('carreras')->join('departamentos', 'departamentos.id_depat', '=', 'carreras.id_Departamento')->join('users', 'users.id', '=', 'departamentos.id_Jefe')->get();

        $jefes = DB::table('departamentos')->join('users', 'users.id', '=', 'departamentos.id_Jefe')
            ->orderBy('id_depat', 'ASC')->paginate(100);


        return view('templates.administrador.profesoresRegistrados', compact('jefes', 'depar'));
    }

    public function index3(Request $request)
    {
        $user = auth()->user();

        $nombre = $request->get('nombre');
        $departamento = $request->get('departamento');


        $profesores = DB::table('users')->orderBy('id', 'DESC')

            // ->nombre($nombre)
            ->join('departamentos', 'departamentos.id_depat', '=', 'users.id_depa')
            // ->departamento($departamento)
            ->where('categoria', 'not like', '%Administrador%')
            ->where('id', '!=', $user->id)
            ->where('id_depa', $user->id_depa)
            ->paginate(20);

        return view('templates.jefe.consultarProfesores', compact('profesores'));
    }
    public function cambioJefeDepartamento(Request $request, $id)
    {
        $dep = DB::table('departamentos')->where('id_depat', $id)->join('users', 'users.id', '=', 'departamentos.id_Jefe')->first();
        $depa = DB::table('departamentos')->select('id_Jefe')->get();
        $usu = get_object_vars($depa);
        foreach ($depa as $depto) {
            $usu[] = (array) $depto;
        }

        $usuarios = DB::table('users')->select('users.id', 'users.nombre', 'users.id_depa', 'departamentos.id_depat', 'departamentos.id_Jefe')->join('departamentos', 'departamentos.id_depat', '=', 'users.id_depa')->where('categoria', '!=', 'Administrador')->whereNotIn('id', $usu)->orderBy('id_depa', 'asc')->get();

        return view('templates/administrador/registrarDepa', compact('usuarios', 'dep'));
    }

    public function cambioNameDepartamento(Request $request, $id)
    {
        $dep = DB::table('departamentos')->where('id_depat', $id)->first();
        return view('templates/administrador/cambioNombreDepa', compact('dep'));
    }

    public function cambioNameCarrera(Request $request, $id)
    {
        $Carre = DB::table('carreras')->where('idCar', $id)->first();
        return view('templates/administrador/cambioNombreCarrera', compact('Carre'));
    }

    public function cambioCarreraDepartamento(Request $request, $id)
    {
        $Carre = DB::table('carreras')->where('idCar', $id)->join('departamentos', 'departamentos.id_depat', '=', 'carreras.id_Departamento')->first();
        $dep = DB::table('departamentos')->get();
        // dd($Carre);
        return view('templates/administrador/cambioCarreraDepa', compact('Carre', 'dep'));
    }

    public function usuario1()
    {

        $user = Auth::user();

        return view('templates.jefe.configuracionJefe', compact('user'));
    }
    public function usuario1_2()
    {

        $user = Auth::user();

        return view('templates.jefe.configuracionJefe2', compact('user'));
    }

    public function usuario2()
    {

        $user = Auth::user();

        return view('templates.administrador.configuracion', compact('user'));
    }

    public function usuario3()
    {

        $user = Auth::user();

        return view('templates.profesor.configuracionProfesor', compact('user'));
    }
    public function usuario3_2()
    {

        $user = Auth::user();

        return view('templates.profesor.configuracionProfesor2', compact('user'));
    }

    public function update(Request $request, $id)

    {

        $validator = Validator::make($request->all(), [

            'usuario' => 'required|unique:users|min:5|max:20',
            'password' => 'required|min:5|max:20',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(request(['usuario']));
        }


        $user = User::find($id);

        $user->usuario = $request->usuario;
        $user->password = bcrypt($request->password);
        $user->save();

        session()->flash('flash_message', 'El Usuario y contraseña se cambiaron Correctamente');
        return redirect()->back();
    }
    public function update2(Request $request, $id)

    {


        $user = User::find($id);
        $user->nombre = $request->nombre;
        $user->save();

        session()->flash('flash_message', 'El nombre se cambio Correctamente');
        return redirect()->back();
    }

    public function baja(Request $request, $id, $nombre)
    {
        user::where('id', '=', $id)->delete();

        session()->flash('flash_message', 'El Jefe de departamento ' . $nombre . ' Fue Eliminado');
        return redirect()->back();
    }

    public function bajaProfe(Request $request, $id, $nombre)
    {
        user::where('id', '=', $id)->delete();

        session()->flash('flash_message', 'El Profesor ' . $nombre . ' Fue Eliminado');
        return redirect()->back();
    }
}
