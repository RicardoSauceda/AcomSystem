<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;
use App\solicitudes;
use PhpParser\Node\Expr\FuncCall;

class CreditoController extends Controller
{
    public function proyectos()
    {
        $datosP = DB::table('proyectos')->select('id', 'nombre', 'autorizacion', 'cantidad', 'credito', 'tipo', 'codigo', 'autor', 'fecha', 'descrip', 'id_creo', 'statusFecha', 'departamento', 'fin', 'id_depat')->get();



        // Obtener la cantidad de solicitudes por actividad
        $datosS = DB::select("SELECT * FROM solicitudes");
        $cantSolProy = DB::select("SELECT idProy, COUNT(*) AS SolicitudesPorActividad FROM solicitudes GROUP BY idProy");

        foreach ($cantSolProy as $dato) {
            foreach ($datosS as $dato2) {
                if ($dato->idProy == $dato2->idProy) {
                    if ($dato->SolicitudesPorActividad <= $dato2->cantidad) {
                        $limite = 0;
                    } else {
                        $limite = 1;
                    }
                }
            }
        }

        return $datosP;
    }

    public function datosAlumnos()
    {
        $datos = DB::table('usuario')->get();
        return $datos;
    }

    public function datosProyecto()
    {
        $datos = DB::table('proyectos')->select('nombre', 'fecha', 'codigo', 'fin')->get();
        return $datos;
    }

    public function carrera()
    {
        $carreras = DB::select("SELECT convert(idCar, CHAR) AS idCar ,Carrera FROM carreras");
        $carreras = array_reverse($carreras);
        return $carreras;
    }

    public function lenguajesP()
    {
        $datos = DB::select("SELECT CONVERT(id, CHAR) AS id, lenguajes FROM bdreal");
        return $datos;
    }

    public function info()
    {
        $id_usuario = "uno";
        $path = 'http://ittg-tecnm-acom.hol.es/archivos/';

        $datos = DB::select("SELECT * FROM informacion WHERE info = 'uno'");

        foreach ($datos as $dato) {
            $dato->pdf = $path . $dato->pdf;
        }

        return $dato;
    }

    public function userData($id)
    {
        $datos = DB::table('usuario')->where('id', $id)->get();
        return $datos;
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


    public function actInscritas($id)
    {
        $solicitudes2 = DB::table('solicitudes')->where('id_alum', $id)->get();

        $cantidad = count($solicitudes2);

        if ($cantidad == 0) {
            return response()->json(['Mensaje' => 'Sin coincidencias'], 404);
        } else
            return $solicitudes2;
    }

    public function actAprov($id)
    {
        $path = 'http://ittg-tecnm-acom.hol.es/archivos/';

        $actLib = DB::select("SELECT CONCAT('$path',liberados.pdf) AS pdfRoute, solicitudes.* 
                              FROM liberados , solicitudes  
                              WHERE liberados.proyecto =  solicitudes.proyecto AND solicitudes.id_usuario = '$id' AND liberados.id_usuarios = '$id' AND solicitudes.aprobados = 1");

        if ((empty($actLib))) {
            return response()->json(['Mensaje' => 'Sin coincidencias'], 404);
        }

        return $actLib;
    }

    public function cancelarSolProyeto($idSol)
    {
        solicitudes::where('id_sol', '=', $idSol)->delete();
        return response()->json(['Mensaje' => 'Eliminado'], 200);
    }


    public function editProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'nombre' => 'required|min:10|max:40',
            'apellido' => 'required|min:5',
            'noControl' => 'required|min:8|max:9',
            'carrera' => 'required',
            'semestre' => 'required|min:1|max:2',
            'email' => 'required|email',

        ]);

        $messages = $validator->getMessageBag();
        if ($validator->fails()) {
            return response()->json(['Mensaje' =>  $messages], 400);
            //dd($request);
        } else {

            $id = $request->input('id');

            $datosArrayUsuario = array();
            $datosArrayUsuario['nombre'] = $request->input('nombre');
            $datosArrayUsuario['apellidos'] = $request->input('apellido');
            $datosArrayUsuario['numControl'] = $request->input('noControl');
            $datosArrayUsuario['carrera'] = $request->input('carrera');
            $datosArrayUsuario['semestre'] = $request->input('semestre');
            $datosArrayUsuario['email'] = $request->input('email');


            $datosArraySolicitudes = array();
            $datosArraySolicitudes['alumno'] = $request->input('nombre');
            $datosArraySolicitudes['apellidos'] = $request->input('apellido');
            $datosArraySolicitudes['numControl'] = $request->input('noControl');
            $datosArraySolicitudes['carrera'] = $request->input('carrera');
            $datosArraySolicitudes['semestre'] = $request->input('semestre');


            $datosArrayLiberados = array();
            $datosArrayLiberados['nombre'] = $request->input('nombre');


            DB::table('usuario')->where("id", $id)->update($datosArrayUsuario);
            DB::table('solicitudes')->where("id_usuario", $id)->update($datosArraySolicitudes);
            DB::table('liberados')->where("id", $id)->update($datosArrayLiberados);

            return response()->json(['Mensaje' => 'Actualizado'], 200);
        }
    }

    public function solRegistroProy(Request $request)
    {
        $ids = $request->all();

        $idUsu = $ids['idUsuario'];
        $idAct = $ids['idActividad'];

        $userData = DB::table('usuario')->where('id', $idUsu)->get();
        $proyectoData = DB::table('proyectos')->where('id', $idAct)->get();

        foreach ($userData as $datoU) {
            $idAlum = $datoU->id;
            $usuario = $datoU->usuario;
            $nombre = $datoU->nombre;
            $apellido = $datoU->apellidos;
            $carrera = $datoU->carrera;
            $semestre = $datoU->semestre;
            $noControl = $datoU->numControl;
        }


        foreach ($proyectoData as $datoP) {
            $idProy = $datoP->id;
            $proyecto = $datoP->nombre;
            $desc = $datoP->descrip;
            $profesor = $datoP->autor;
            $credito = $datoP->credito;
            $cantidad = $datoP->cantidad;
            $tipo = $datoP->tipo;
            $codigoProy = $datoP->codigo;
            $idCreo = $datoP->id_creo;
        }

        $fechaActual = date('Y-m-d');

        $solicitudes = DB::table('solicitudes')->where('id_alum', $idAlum)->where('idProy', $idProy)->first();

        if (empty($solicitudes)) {

            $solicitud = new solicitudes;

            $solicitud->id_alum = $idAlum;
            $solicitud->id_usuario = $idAlum;
            $solicitud->idProy = $idProy;
            $solicitud->alumno = $nombre;
            $solicitud->apellidos = $apellido;
            $solicitud->usuario = $usuario;
            $solicitud->carrera = $carrera;
            $solicitud->semestre = $semestre;
            $solicitud->numControl = $noControl;
            $solicitud->proyecto = $proyecto;
            $solicitud->descripcion = $desc;
            $solicitud->profesor = $profesor;
            $solicitud->credito = $credito;
            $solicitud->cantidad = $cantidad;
            $solicitud->tipo = $tipo;
            $solicitud->codigo_pro = $codigoProy;
            $solicitud->id_creo = $idCreo;
            $solicitud->fecha = $fechaActual;

            $solicitud->save();

            if (!$solicitud->save()) {
                return response()->json(['Mensaje' => 'Registro fallido'], 424);
            }

            return response()->json(['Mensaje' => 'Registro exitoso'], 200);
        } else {

            return response()->json(['Mensaje' => 'El registro ya existe'], 409);
        }
    }
}
