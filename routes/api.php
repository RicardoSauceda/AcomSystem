<?php

use App\Http\Controllers\CreditoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes for Android 2023 application web services.
|
*/

Route::GET('Proyectos', 'CreditoController@proyectos');                       // Consulta de todos los datos de todos los usuarios

Route::GET('DatosAlumnos', 'CreditoController@datosAlumnos');                       // Consulta de todos los datos de todos los usuarios

Route::GET('DatoPorAlumno/{id}', 'CreditoController@userData');                     // Consulta datos de un alumno por ID

Route::GET('DatosProyectos', 'CreditoController@datosProyecto');                    // Consulta de todos los datos de todos los proyectos

Route::GET('LenguajesP', 'CreditoController@lenguajesP');                           // Consulta todos los datos de lenguajes

Route::GET('Informacion', 'CreditoController@info');                                // Consulta todas las carreras

Route::GET('Creditos/{user}', 'CreditoController@creditosByUser');                  // PORT de CodeIgnite -> Devuelve 4 campos por proyeccto de un alumno 

Route::GET('ActPorUsuario/{id}', [CreditoController::class, 'actInscritas']);       // Consulta las actvidades con solicitudes por alumno 

Route::GET('ActividadesAut', 'CreditoController@AuthorizedAct');                    // Consulta TODAS las actividades autorizadas

Route::GET('actFinalizadas/{idUsuario}', 'CreditoController@actAprov');             // Consulta las actividades finalizadas 

Route::GET('eliminarSolicitud/{idSol}', 'CreditoController@cancelarSolProyeto');    // Elimina solicitudes 

Route::POST('registroProy', 'CreditoController@solRegistroProy');                   // Crear una solicitud ALUMNO a PROYECTO

Route::POST('EditarPerfil', 'CreditoController@editProfile');                       // Edita los datos de un perfil de alumno

