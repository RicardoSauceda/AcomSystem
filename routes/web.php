<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*<!--=======================================JEFE=====================================================-->*/



Route::get('loginJefe', ['as' => 'loginJefe', function (){
	return view('templates/jefe/login');
}]);

Route::post('/acceso', [
	'uses' => 'Auth\LoginController@loginJefe',
	'as' => 'acceso'
]);

Route::get('rutaJefe', ['as' => 'menu', 'middleware' => 'auth',function (){
	return view('templates/jefe/menu');
}]);

Route::get('registrarproyJefe', ['as' => 'regproy','middleware' => 'auth', function (){
	return view('templates/jefe/registrarproyecto');

}]);


Route::get('registrarprofJefe', ['as' => 'regprof', 'middleware' => 'auth',function (){
	return view('templates/jefe/registrarprofesor');
}]);


Route::get('ConfiguracionJefe', ['as' => 'config', 'uses' => 'Usercontroller@usuario1']);


Route::get('/ConsultaProyectosJefe',[ 
	'uses' => 'proyectocontroller@index', 
	'as' =>'proyectos', 
	function(){ return view('templates/jefe/consultarProyectos');

}]);

Route::get('/ConsultaProfesoresJefe',[ 
	'uses' => 'Usercontroller@index3', 
	'as' =>'buscar', 
	function(){ return view('templates/jefe/consultarProfesores');

}]);

Route::get('/BajaProfesor/{id}/{nombre}', ['as' => 'bajaprofe', 'uses' => 'Usercontroller@bajaProfe']);

Route::get('/ConsultaSolicitudesJefe/{codigo}',[ 
	'uses' => 'SolicitudesController@index', 
	'as' =>'SolicitudesJefe']);

Route::get('//{id_sol}/{alumno}/destroy',[ 
	'uses' => 'SolicitudesController@destroy', 
	'as' =>'eliminar']);

Route::POST('/CargarSolicitudesJ/{proyecto}/{codigo_pro}/{profesor}/{usuario}/{alumno}/{id_sol}', ['uses' => 'mensajesController@store', 'as' => 'respuesta']);



Route::get('LiberarAlumnosJ/{codigo}', [
	'uses' => 'SolicitudesController@liberar',
	 'as' => 'Acoms']);

Route::POST('/{alumno}/{usuario}/{proyecto}/{codigo_pro}/{id_sol}/{id_alum}/{tipo}/{credito}/{id_creo}/liberadosJ',[
	'uses'=> 'LiberadosController@store', 
	'as'=> 'lib']);

Route::get('ListaAprobadosJ',['uses'=> 'proyectocontroller@index5', 'as'=> 'aprobadosJ' ]);

Route::get('AprobadosJ/{codigo}', ['as' => 'apro', 'uses'=> 'LiberadosController@index'

]);
Route::get('ReprobadosJ/{codigo}', ['as' => 'reprobados', 'uses'=> 'LiberadosController@index2']);

Route::get('ListaReprobadosPDFJEfe/{codigo}', ['as'=> 'pdfrepro', 'uses'=> 'LiberadosController@Generar']);

Route::get('ListaAprobadosPDFJEfe/{codigo}', ['as'=> 'aprobadoPDF', 'uses'=> 'LiberadosController@GenerarPDF']);

Route::get('/aprobadosJefe/{codigo}', ['uses' => 'SolicitudesController@aprobados', 'as' => 'inscritos']);

Route::get('ListajefePDF/{codigo}', ['as'=> 'PDF', 'uses'=> 'SolicitudesController@Generar']);

Route::get('/AlumnosJ', ['as'=> 'liberarJ', 'uses' => 'proyectocontroller@index4']);

Route::get('/pastel', ['as' => 'pastel', 'uses' => 'proyectocontroller@consulta']);

Route::get('/estadisticasLiberados/{codigo}/{tipo}/{nombre}', ['as' => 'aprorepro', 'uses' => 'EstadisticasController@index']);

Route::get('/estadisticasAcoms', ['as' => 'barAcoms']);

Route::get('/estadisticasProyectos', ['as' => 'barProyectos']);

Route::get('/estadisticasSolicitudes/{codigo}/{nombre}', ['as' => 'barSolicitudes', 'uses' => 'EstadisticasController@index2']);


Route::get('datos', ['as' => 'ruta', function (){
	return view('templates/jefe/datos')->with('mes')->with('anio')->with('parametro1');
}]);
Route::GET('/grafperiodo',[
	'uses'=> 'EstadisticasController@periodo', 
	'as'=> 'graf']);
Route::get('mensajes', ['as' => 'msg', 'uses' => 'chatController@index']);

Route::get('chat/{codigo_pro}', ['as' => 'chat', 'uses' => 'chatController@mensajes']);

Route::post('ResponderJ/{usuario}/{codigo}/{id_chat}', ['as' => 'responder', 'uses' => 'chatController@store']);

Route::get('pruebaAcount', ['as' => 'count', 'uses'=> 'LiberadosController@Acount']);
Route::get('modificar/{id}',['as'=>'cambioproy', 'uses'=> 'proyectocontroller@cambiar']);



/*<!--======================================ADMINISTRADOR==============================================-->*/

Route::get('loginAdministrador', ['as' => 'loginAdmin', function (){
	return view('templates/administrador/loginAdmin');
}]);


Route::get('rutaAdmin', ['as' => 'menuAdmin','middleware' => 'auth', function (){
	return view('templates/administrador/menuAdmin');
}]);

Route::get('registrarjefAdmin', ['as' => 'regjefe','middleware' => 'auth', function (){
	return view('templates/administrador/RegistrarJefe');
}]);


Route::post('/acceder', [

	'uses' => 'Auth\LoginController@loginAdministrador',
	'as' => 'acceder'
]);

Route::get('/ConsultaProfesoresAdmin',['uses' => 'Usercontroller@index2', 'as' =>'busqueda']);



Route::get('/Baja/{id}/{nombre}',['uses' => 'Usercontroller@baja','as' =>'baja']);



Route::get('ConfiguracionAdmin', ['as' => 'Configuracion', 'uses' => 'Usercontroller@usuario2']);

/*<!--========================================PROFESOR==================================================-->*/

Route::get('loginProfesor', ['as' => 'loginProf', function (){
	return view('templates/profesor/loginProfesor');
}]);
Route::post('/entrar', [

	'uses' => 'Auth\LoginController@loginProfesor',
	'as' => 'entrar'
]);

Route::get('rutaProfesor', ['as' => 'menuProfesor', 'middleware' => 'auth',function (){
	return view('templates/profesor/menuProfesor');
}]);
Route::get('regiproyProf', ['as' => 'repro','middleware' => 'auth', function (){

	

	return view('templates/profesor/proyecto');
}]);


Route::get('ConfiguracionProf', ['as' => 'configurar', 'uses' => 'Usercontroller@usuario3']);


Route::get('/ProyectoProfesor',[ 
	'uses' => 'proyectocontroller@index2', 
	'as' =>'proyecto', 
	function(){ return view('templates/profesor/consultarProyectosP');

}]);

Route::get('/SolicitudesProfesor/{codigo}',[ 
	'uses' => 'SolicitudesController@index2', 
	'as' =>'solProfesor']);

Route::get('//{id_sol}/{alumno}/destroy',[ 
	'uses' => 'SolicitudesController@destroy2', 
	'as' =>'eliminar']);

Route::POST('/SolicitudesProfesor', ['uses' => 'mensajesController@store', 'as' => 'respuestaP']);

Route::get('LiberarP/{codigo}', [
	'uses' => 'SolicitudesController@liberar2',
	 'as' => 'acoms']);

Route::get('/EvaluarP',[
	'uses' => 'SolicitudesController@liberar3',
	'as' => 'evaluar'
]);

// se agrego las variables apellido y numcontrol
Route::POST('/liberadoprofesor/{departamento}',[
	'uses'=> 'LiberadosController@store', 
	'as'=> 'liberar']);

Route::POST('/liberarDeNuevo/{apro}',[
	'uses'=>'LiberadosController@liberarDeNuevo',
	'as'=>'liberarNuevo']);
/*Route::POST('/{apellidos}/{alumno}/{usuario}/{numControl}/{proyecto}/{codigo_pro}/{id_sol}/{id_alum}/{tipo}/{credito}/{id_creo}/{autor}/{departamento}/{Carrera}/{proy}/liberadoprofesor',[
	'uses'=> 'LiberadosController@store', 
	'as'=> 'liberar']);*/


Route::get('AcrediProfesor/{codigo}', ['as' => 'aproProfesor', 'uses'=> 'LiberadosController@index3']);
Route::get('ReprobadosProfesor/{codigo}', ['as' => 'noaproProfesor', 'uses'=> 'LiberadosController@index4']);
Route::get('ListaReprobadosPDFProfesor/{codigo}', ['as'=> 'repReprobado', 'uses'=> 'LiberadosController@PDFReprobado']);
Route::get('ListaAprobadosPDFProfesor/{codigo}', ['as'=> 'repAprobado', 'uses'=> 'LiberadosController@PDFProfe']);


Route::get('aprobadosProfesor',['uses'=> 'proyectocontroller@index6', 'as'=> 'aprobadosProf' ]);

Route::get('/aprobadosProfe/{codigo}', ['uses' => 'SolicitudesController@aprobados2', 'as' => 'inscripciones']);
Route::get('ListaProfesorPDF/{codigo}', ['as'=> 'reportePDF', 'uses'=> 'SolicitudesController@GenerarPDF']);

Route::get('/LibAlumnosprofesor', ['as'=> 'liberarP', 'uses' => 'proyectocontroller@index3']);

Route::get('mensajesProf', ['as' => 'mensg', 'uses' => 'chatController@index2']);

Route::get('chatProf/{codigo}', ['as' => 'chatear', 'uses' => 'chatController@mensajesProf']);

Route::post('ResponderProf/{usuario}/{codigo}/{id_chat}', ['as' => 'chatProf', 'uses' => 'chatController@store']);
Route::get('modificarProfesor/{id}',['as'=>'proycambio', 'uses'=> 'proyectocontroller@cambiar2']);


Route::POST('/download/{apro}',[
	'uses'=>'LiberadosController@download',
	'as'=>'liberado.download']);

/*<!--========================================Invitado==================================================-->*/
Route::get('Invitado', [ 'as' => 'menuInvi', function () {
    Artisan::call('storage:link');
	return view('templates/invitado/menuInvi');
}]);

Route::get('Lineamientos', [ 'as' => 'lineamientos', function () {
	return view('templates/invitado/lineamientos');
}]);

Route::get('TiposAcoms', [ 'as' => 'tipos', function () {
	return view('templates/invitado/tiposDeAcom');
}]);

Route::get('QueEsAcom', [ 'as' => 'Acom', function () {
	return view('templates/invitado/queEsAcom');
}]);


/*<!--========================================Opciones para todos los usuarios=============================================-->*/

Route::post('/registrar', [
	'uses' => 'Usercontroller@store',
	'as' => 'registrar'

]);

Route::post('/guardar', [
	'uses' => 'proyectocontroller@store',
	'as' => 'guardar']);

Route::POST('/{id}', ['as'=> 'actualizar', 'uses'=>'Usercontroller@update']);
Route::POST('cambio/{id}', ['as'=> 'nuevo', 'uses'=>'proyectocontroller@update']);

Route::get('/', [
	'as' => 'salir', 
	'uses' => 'todoController@menuIni'

]);

Route::get('Principal', ['as' => 'principal', function (){
	return view('templates/principal');
}]);


/*<!--========================================Creditos acomos=============================================-->*/

Route::get('Creditos', 'CreditoController@creditos');


// Password Reset Routes...
Route::get('passwords/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('passwords/email', 'PasswordController@sendResetLinkEmail')->name('password.email');
Route::get('passwords/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('passwords/reset', 'PasswordController@restartPassword');




Route::get('invitado/recupContrasena', 'RecupContrasenaController@recupcontra')->name('invitado.recuperacion');
//Route::post('invitado/recupContraseña', 'RecupContraseñaController@usuario')->name('invitado.correo');
Route::post('invitado/restablecer', 'RecupContrasenaController@password')->name('invitado.restablece');
//Route::get('invitado/datos', 'RecupContraseñaController@password')->name('invitado.datos');


Route::post('templates/profesor/selecProyecto', 'DescargarPdfController@proyect')->name('profesor.selecproyecto');
//Route::get('templates/profesor/selecProyecto', 'DescargarPdfController@proyect')->name('profesor.selecproyecto');