<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
use Restserver\libraries\REST_Controller;


class Pepsico extends REST_Controller {

	public function __construct(){
	    

		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		header("Access-Control-Allow-Origin: *");
		
		header('Content-Type: application/json');

		parent::__construct();
		$this->load->database();

	}

	public function index_get(){

	}
	
	public function index_post(){

	}
	
	public function checklist_post(){
	    
	    $post = $this->post();
        
	    $condiciones = array('nombre' => $post['nom'],
	                         'ruta' => $post['ruta'],
	                         'eco' => $post['eco'],
	                         'semana' => $post['sem'],
	                         'gpid' => $post['gpid'],
	                         'tipovehiculo' => $post['tipo'],
							 'nodebatibles' => $post['ndeba'],
							 'debatibles' => $post['deba'],
							 'observacion' => $post['obs'],
							 'estado' => $post['esta'],
							 'fecha' => $post['fech'],
							);
        
        $hecho = $this->db->insert('bpep', $condiciones ); //insertamos en la tabla bpep
        
        $this->response( $condiciones );
	       
	}
	
	public function datosChecklist_get(){

		$query = $this->db->query('SELECT * FROM `bpep`');

		$respuesta = array(
			'error' => FALSE,
			'datos' => $query->result_array()
			 );

		$this->response( $respuesta );
	}
        
    public function datosMec_get(){

        $var = 1;
		$this->db->select('*');
        $this->db->from('bpep');
        $this->db->where('estado',$var);
        $todo = $this->db->get()->result_array();

		$respuesta = array(
			'error' => FALSE,
			'datos' => $todo,
		);

		$this->response( $respuesta );
	}
	
}
