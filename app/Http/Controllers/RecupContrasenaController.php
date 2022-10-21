<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
//use Illuminate\Contracts\Validation\Validator::make();

class RecupContrasenaController extends Controller
{
    //
    public function recupcontra(){
    
        return view('templates.invitado.restablecer');
    }

    
    public function password(Request $request){
        
        $rules = [
         
            'password'          =>  'required|min:8',
            'password_confirmation'   =>  'required|same:password',
            
        ]; 

        $correo[0] = $request -> email;
        $contra[0]= $request['password'];
       
      
       
        //$confir[0]=$request['password_confirmation'];
       //$usuario[0]= $request['usuario'];
      $this->validate($request,$rules);
    
     

        $recontrasena = DB::select('SELECT nombre, email, password FROM usuario', [1]);
         //return $recontraseña;
  
          for($i=0; $i <sizeof($recontrasena) ; $i++){
         
             if($recontrasena[$i]->email==$correo[0]){
                DB::table('usuario')->where('email', $correo[0])->update(array('password' => $contra[0]));
                
                session()->flash('flash_message', 'La contraseña se cambiaron Correctamente');
        return redirect()->back();  

             // return view('templates.invitado.recupContrasena');

               
              }else 
              {
                  return view('templates.invitado.menuInvi');
              }
            
          }
       
    
     
    }
}