<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use App\User;
use Session;

class PasswordController extends Controller
{
    public function restartPassword(Request $request){
        try{
            $requestData = $request->validate([
                'password' => 'required|min:7',
                'password_confirmation' => 'required|same:password',
                'usuario' => 'required', 
                'token' => 'required'
            ]);

            $data = User::where('remember_token', $request['token'])->first();
            if($data)
            {
                if(strcmp( strtoupper( $data->usuario ), strtoupper($requestData['usuario'])) != 0){

                    $aux = User::where('usuario', $request['usuario'])->first();
                    if(!$aux){
                        $data->usuario = $request['usuario'];
                        $data->password = Hash::make($request['password']);
                        $data->setRememberToken(Str::random(60));
                        $data->save();

                        session()->flash('flash_message', 'Contraseña y usuario cambiada exitosamente');
                        return redirect()->route('principal');
                    }else{
                        return redirect()->back()
                            ->withInput($request->only('usuario'))
                            ->withErrors(['usuario' => trans('El nombre del usuario ya esta registrado')]);
                    }
                }else{
                    $data->password = Hash::make($request['password']);
                    $data->setRememberToken(Str::random(60));
                    $data->save();

                    session()->flash('flash_message', 'Contraseña cambiada exitosamente');
                    return redirect()->route('principal');
                }
            }else{
                return back()->with('status','Error al intentar cambiar la contraseña');
            }

        } catch (\Throwable $th) {
            return back()->with('status', trans($th->getMessage()));
        }
    }

    public function sendResetLinkEmail(Request $request){
        try{
            $requestData = $request->validate([
                'email' => 'required|email'
            ]);

            $data = User::where('remember_token','<>',null)
            ->where('email', $request['email'])
            ->first();

            $data->sendPasswordResetNotification($data->remember_token);

            return back()->with('status', trans('Correo enviado exitosamente'));
            
        } catch (\Throwable $th) {
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => trans($th->getMessage())]);
        }
    }
}
