<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
use Restserver\libraries\REST_Controller;


class Prueba extends REST_Controller {

	public function __construct(){

		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		header("Access-Control-Allow-Origin: *");

		parent::__construct();
		$this->load->database();

	}


	public function index(){

		echo "HOLA MUNDO";

	}

	public function obtener_arreglo_get( $var = 0 ){

		if( $var > 7) {
			$respuesta = array('error' => TRUE, 'mensaje'=>'No existe elemento con la posicion '.$var );
			$this->response( $respuesta );
			
		}else{

			$arreglo = array( "Manzana", "Pera", "Piña", "Naranja", "Uva", "Mango", "Durazno", "Guineo" );
			$respuesta = array('error' => FALSE, 'Fruta'=> $arreglo[$var] );
			$this->response( $respuesta );
		}

		//echo json_encode( $arreglo[$var] );	
	}

	public function obtener_registro_get( $codigo ){

		//$this->load->database();

		$query = $this->db->query("SELECT * FROM `usuario` where id ='". $codigo ."'");

		$this->response( $query->result() );
	}

}