<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Auth;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        session()->flash('flash_message', 'No Has Iniciado Sesión');
        return view('templates.principal');
    }
    
    public function loginAdministrador()
    {
        $credentials = $this->validate(request(),[

            'usuario' => 'required|string|min:5|max:20',
            'password' => 'required|string|min:5'

        ]);

        if(Auth::attempt($credentials))
        {
            if(Auth::user()->categoria=="Administrador")
            {
            return view('templates.administrador.menuAdmin');
            }

        }

            return back()->withErrors(['usuario' => 'El Usuario o Contraseña son Incorrectos'])->withInput(request(['usuario']));
    }

    public function loginJefe()
    {
        $credentials = $this->validate(request(), [

            'usuario' => 'required|string|min:5|max:20',
            'password' => 'required|string|min:5'


        ]);

        if(Auth::attempt($credentials))
        {
            if(Auth::user()->categoria=="Jefe de Departamento")
            {
            return view('templates.jefe.menu');
            }

        }

            return back()->withErrors(['usuario' => 'El Usuario o Contraseña son Incorrectos'])->withInput(request(['usuario']));

    }

    public function loginProfesor()
    {
        $credentials = $this->validate(request(), [

           'usuario' => 'required|string|min:5|max:20',
            'password' => 'required|string|min:5'


        ]);

        if(Auth::attempt($credentials))
        {
            if(Auth::user()->categoria=="Profesor"){
            return view('templates.profesor.menuProfesor');
            }/* elseif (Auth::user()->categoria=="Jefe de Departamento") {
             return view('templates.profesor.menuProfesor');
            }*/

        }

            return back()->withErrors(['usuario' => 'El Usuario o Contraseña son Incorrectos'])->withInput(request(['usuario']));

    }

    
}
