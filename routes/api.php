<?php

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

Route::GET('Creditos/{user}', 'CreditoController@creditosByUser');

Route::GET('ActividadesAut', 'CreditoController@AuthorizedAct');

Route::GET('ActPorUsuario/{id}', 'CreditoController@actInscritas');

Route::GET('actFinalizadas/{idUsuario}', 'CreditoController@actAprov');

Route::GET('eliminarSolicitud/{idSol}', 'CreditoController@cancelarSolProyeto');

Route::POST('registroProy', 'CreditoController@registroProy');

Route::POST('EditarPerfil', 'CreditoController@EditProfile');


