<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB;
use App\solicitudes;

class CreditoController extends Controller
{
    public function creditos()
    {
        $creditosAcoms = DB::select("SELECT liberados.usuario, proyectos.id_SubTipoAcom, convert(liberados.credito, float) AS credito, liberados.codigo_pro FROM liberados, proyectos WHERE liberados.codigo_pro=proyectos.codigo");
        return $creditosAcoms;
        //return view('templates/invitado/credito');
    }

    public function creditosByUser($user)
    {
        $creditosAcomsByUser = DB::select("SELECT liberados.usuario, proyectos.id_SubTipoAcom, convert(liberados.credito, float) AS credito, liberados.codigo_pro FROM liberados, proyectos WHERE liberados.codigo_pro=proyectos.codigo and liberados.usuario = '$user'");
        return $creditosAcomsByUser;
    }

    public function AuthorizedAct()
    {
        $actividadesAutorizadas = DB::select("SELECT id, nombre, autorizacion FROM proyectos WHERE autorizacion = '1'");
        return $actividadesAutorizadas;
    }

    public function EditProfile(Request $request)
    {
        $usuario = $request;
        //$profileData = DB::select("SELECT * FROM usuario WHERE usuario = $post.usu AND 'password' = $post.pass");
        return response($usuario);
    }

    public function actInscritas($id)
    {

        $solicitudes = DB::select("SELECT * FROM solicitudes where id_alum = '$id'");

        return $solicitudes;
    }

    public function actAprov($id)
    {
        $path = 'http://ittg-tecnm-acom.hol.es/archivos/';

        $actLib = DB::select("SELECT CONCAT('$path',liberados.pdf) AS pdfRoute, solicitudes.* 
                              FROM liberados , solicitudes  
                              WHERE liberados.proyecto =  solicitudes.proyecto AND solicitudes.id_usuario = '$id' AND liberados.id_usuarios = '$id' AND solicitudes.aprobados = 1");

        if((empty($actLib))){
            return response()->json(['Mensaje' => 'Sin coincidencias'], 404);
        }

        return $actLib;
    }

    public function cancelarSolProyeto($idSol)
    {
        solicitudes::where('id_sol', '=', $idSol)->delete();
        return response()->json(['Mensaje' => 'Eliminado'], 200);
    }

    public function registroProy(Request $request)
    {
        $info = $request;
        return $info;
    }


}
