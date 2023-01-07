<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\proyecto;
use App\chat;
use DB;

class chatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

	public function index()
	{

		$user = auth()->user();

		$mensaje = proyecto::where('id_creo', '=', $user->id)->orderBy('id', 'desc')->paginate(20);


        return view('templates.jefe.mensajes', compact('mensaje'));


	}
	public function index2()
	{

		$user = auth()->user();

		$mensaje = proyecto::where('id_creo', '=', $user->id)->orderBy('id', 'desc')->paginate(20);


        return view('templates.profesor.msgProfe', compact('mensaje'));

	}

	public function mensajes(Request $request, $codigo)
	{

		$user = auth()->user();
		$chatear = chat::where([['codigo', '=', $codigo],['envio', '=', 'movil'],])->orderBy('id_chat', 'desc')->paginate(20);
		$dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();

		return view('templates.jefe.chat',compact('chatear','dato'));

	}

	public function mensajesProf(Request $request, $codigo)
	{

		$user = auth()->user();
		$chatear = chat::where([['codigo', '=', $codigo],['envio', '=', 'movil']])->orderBy('id_chat', 'desc')->paginate(20);
		$dato = DB::table('proyectos')->where([['id_creo', '=', $user->id],['codigo','=',$codigo],])->first();
		

		return view('templates.profesor.chatprofe',compact('chatear','dato'));

	}


	public function store(Request $request, $usuario, $codigo, $id_chat)
	{

		chat::where('id_chat', '=', $id_chat)->update(['estado' => 0]);

		$msg = $request['mensaje'];
		$tipo = $request['tipo'];
		
		$chat = new chat();
		$chat->codigo = $codigo;
		$chat->usuario = $usuario;
	//	$chat->tipomsg = $tipo;
		$chat->mensaje = $msg;
		$chat->estado = 1;
		$chat->envio = 'sistema';
		

		$chat->save();


		session()->flash('flash_message','mensaje enviado');
       
        return redirect()->back();

	}

}
