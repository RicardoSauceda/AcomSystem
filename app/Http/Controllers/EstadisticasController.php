<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Liberados;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Charts;
use App\proyectos;
use Laracasts\Flash\Flash;
use Auth;
use Session;
use Validator;
use App\solicitudes;
use count;
use sum;




class EstadisticasController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request, $codigo, $tipo, $nombre)
	{
		
		$chart = Charts::database(Liberados::all()->where('codigo_pro', '=', $codigo), 'bar', 'highcharts')

			->title('Estadisticas Aprobados y No Aprobados del      ' . $tipo . '   del proyecto              ' . $nombre)
			->elementLabel('Total')
			->dimensions(1000, 500)
			->responsive(false)
			->groupBy('calificacion');


		return view('templates.jefe.pastel', compact('chart'));
	}

	public function index2(Request $request, $codigo, $nombre)
	{

		$chart = Charts::database(solicitudes::all()->where('codigo_pro', '=', $codigo), 'bar', 'highcharts')
			->title('Estadisticas de solicitudes Recibidas para el proyecto     ' . $nombre)
			->elementLabel('Total')
			->dimensions(800, 600)
			->responsive(false)
			->groupBy('codigo_pro');


		return view('templates.jefe.barrasSolicitudes', compact('chart'));
	}

	public function periodo(Request $request)
	{
		$anio = $request['anio'];
		$mes = $request['mes'];

		/*$user = auth()->user();
        $todo = DB::table('proyectos')->get();*/

		$primer_dia = 1;
		$ultimo_dia = $this->getUltimoDiaMes($anio, $mes);
		$fecha_inicial = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $primer_dia));
		$fecha_final = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $ultimo_dia));
		$usuarios = DB::table('proyectos')->whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
		$ct = count($usuarios);

		$array = ['parametro1' => $ct, 'anio' => $anio, 'mes' => $mes];
		return view('templates.jefe.datos', compact('ct', 'mes', 'parametro1'))->with($array)->with($ct)->with($mes);
		//dd($anio, $mes, $todo, $ct, $array);

	}

	public function getUltimoDiaMes($elAnio, $elMes)
	{
		return date("d", (mktime(0, 0, 0, $elMes + 1, 1, $elAnio) - 1));
	}
}
