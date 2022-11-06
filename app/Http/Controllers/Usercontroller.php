<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
//use Auth;
use Laracasts\Flash\Flash; 
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Validator;
class Usercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            
            'nombre' => 'required|min:10|max:40',
            'usuario' => 'required|unique:users|min:5|max:20',
            'password' => 'required|min:5|max:20',
           
      ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput(request(['nombre','usuario','departamento','categoria']));
        }

       $nombre = $request ['nombre'];
        $departamento = $request ['departamento'];
        $categoria = $request ['categoria'];
        $usuario = $request ['usuario'];
        $password = bcrypt($request ['password']);
        $correo = $request ['correo'];

        $user = new User();
        $user->nombre = $nombre;
        $user->departamento = $departamento;
        $user->categoria = $categoria;
        $user->usuario = $usuario;
        $user->password = $password;
        $user->email = $correo;
        $user->save();

        session()->flash('flash_message', 'El Usuario Se Registro Correctamente');
        return redirect()->back(); 
	}

    public function index2(Request $request)
    {
        
        $nombre = $request->get('nombre');
        $departamento = $request->get('departamento');


        $profesores = User::orderBy('id', 'DESC')

            ->nombre($nombre)
            ->departamento($departamento)
            ->where('categoria','like','%Jefe de Departamento%')
            ->paginate(20);
            

        return view('templates.administrador.profesoresRegistrados', compact('profesores'));
    
    }

    public function index3(Request $request)
    {
        
        $nombre = $request->get('nombre');
        $departamento = $request->get('departamento');


        $profesores = User::orderBy('id', 'DESC')

            ->nombre($nombre)
            ->departamento($departamento)
            ->where('categoria','like','%Profesor%')
            ->paginate(20);

        return view('templates.jefe.consultarProfesores', compact('profesores'));
    
    }

     public function usuario1()
    {

       $user = Auth::user();
  
       return view('templates.jefe.configuracionJefe', compact('user'));
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

    public function update(Request $request, $id)

    {

        $validator = Validator::make($request->all(),[
            
       
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

    public function baja(Request $request, $id, $nombre)
    {
        user::where('id', '=',$id)->delete();
       
        session()->flash('flash_message', 'El Jefe de departamento '.$nombre.' Fue Eliminado');
         return redirect()->back();
    }

    public function bajaProfe(Request $request, $id, $nombre)
    {
        user::where('id', '=',$id)->delete();
       
        session()->flash('flash_message', 'El Profesor '.$nombre.' Fue Eliminado');
         return redirect()->back();
    }
    

}
