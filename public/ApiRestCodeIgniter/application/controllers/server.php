<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
use Restserver\libraries\REST_Controller;


class Lineas extends REST_Controller {

	public function __construct(){
	    

		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		header("Access-Control-Allow-Origin: *");
		
		header('Content-Type: application/json');

		parent::__construct();
		$this->load->database();

	}

	public function index_get(){

		$query = $this->db->query('SELECT * FROM `datos`');

		$respuesta = array(
			'error' => FALSE,
			'lineas' => $query->result_array()
			 );

		$this->response( $respuesta );
	}
	
	public function index_post(){

		$data = $this->post();

		$condiciones = array('usuario' => $data['usu'],
							 'nombre' => $data['nom'],
							 'apellidos' => $data['ape'],
							 'carrera' => $data['car'],
							 'semestre' => $data['sem'],
							 'numControl' => $data['numC'],
							 'email' => $data['ema'],
							 'password' => $data['pass'],
							);

		$hecho = $this->db->insert('usuario', $condiciones ); //insertamos en la tabla usuario 

		$this->response( $condiciones );
	}

	public function registro_post(){
	    
		$post = $this->post();

		$condiciones = array('usuario' => $post['usu'],
							 'nombre' => $post['nom'],
							 'apellidos' => $post['ape'],
							 'carrera' => $post['car'],
							 'semestre' => $post['sem'],
							 'numControl' => $post['numC'],
							 'email' => $post['ema'],
							 'password' => $post['pass'],
							);

		$this->db->select('usuario,password');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $this->db->where('password',$post['pass']);
        $query2 = $this->db->get()->row_array();
        
        $var1 = $post['usu'];       $var2 = $post['pass'];
        $var3 = $query2['usuario']; $var4 = $query2['password'];
        
        if($var1 == $var3 && $var2 == $var4){
            //print_r("existe en la BD");
            $data['success']=true;
        }else{
            $data['success']=false;
            $hecho = $this->db->insert('usuario', $condiciones ); //insertamos en la tabla usuario 
        }
        
        $this->response( $data );

	}
	
	public function usuario_post(){
        
        $post = $this->post();
    
        //este codigo me trae todo de ese usuario
        //$query = $this->db->get_where('usuario', array('usuario' => $data['usu'], 'password' => $data['pass']));
        
	    $this->db->select('usuario,password');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $this->db->where('password',$post['pass']);
        $query = $this->db->get()->row_array();
        
	    $data['success'] = false;
        if (!empty($query))
        {
            $data['success'] = true;
            $data['usuario'] = $query;
        }
        
		$this->response( $data );
		
	}
	
	public function envio_get(){

		$query = $this->db->query('SELECT * FROM `usuario`');

		$respuesta = array(
			'error' => FALSE,
			'lineas' => $query->result_array()
			 );

		$this->response( $respuesta );
	}
	
	public function proyectos_get(){
        
        $query = $this->db->query('SELECT * FROM `proyectos`');
        
        $query3 = $this->db->query('SELECT nombre,fecha FROM `proyectos`');
        
        //obtengo el proyecto y la fecha para comparar en tabla solicitudes
        foreach ($query3->result() as $row) 
        {
            $dato[] = $row->nombre; //accedo al nombre para que me de solo eso
            $datofecha[] = $row->fecha;
        }
        
        $b=0;
        //for para acceder a cada elemento y compararlo y realizar la suma de alumnos inscritos
        foreach ($dato as $row) 
        {
            $datoprueba[$b] = $row;
            
            $this->db->select_sum('aprobados');
            $this->db->from('solicitudes');
            $this->db->where('proyecto', $datoprueba[$b]);
            $this->db->where('fecha', $datofecha[$b]);
            $query4 = $this->db->get()->row_array();
            
            if($query4['aprobados'] == null){
                $result[] = "0";//array('aprobados' => "0");
            }else{
                $result[] = $query4['aprobados'];    
            }
            
            $b++;
        }
        
        $c=0;
        //for para separar los datos de los proyectos y agregarle al mismo lo de aprobados
        foreach ($query->result() as $row2) 
        {
            $todo[] = array('id' => $row2->id,
                            'nombre' => $row2->nombre,
                            'cant' => $row2->cant,
                            'credito' => $row2->credito,
                            'tipo' => $row2->tipo,
                            'autor' => $row2->autor,
                            'fecha' => $row2->fecha,
                            'descrip' => $row2->descrip,
                            'aprobados' => $result[$c],
                            );
            $c++;
        }
        
        $respuesta = array(
            'error' => FALSE,
            'todo' => $todo,
             );

        $this->response( $respuesta );   
    
    }
	
	public function registroProy_post(){
        
        $post = $this->post();
        
	    $this->db->select('nombre,apellidos,carrera,semestre,numControl');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $this->db->where('password',$post['pass']);
        $query = $this->db->get()->row_array();
        
	    $condiciones = array('alumno' => $query['nombre'],
	                         'apellidos' => $query['apellidos'],
	                         'carrera' => $query['carrera'],
	                         'semestre' => $query['semestre'],
	                         'numControl' => $query['numControl'],
	                         'proyecto' => $post['proy'],
							 'descripcion' => $post['desc'],
							 'profesor' => $post['aut'],
							 'credito' => $post['cre'],
							 'cantidad' => $post['cant'],
							 'tipo' => $post['tipo'],
							 'fecha' => $post['fecha'],
							);
        
        /*$query2 = $this->db->query('SELECT * FROM `solicitudes`');
        $existe = $query2->row_array();*/
        
        $this->db->select('numControl,proyecto');
        $this->db->from('solicitudes');
        $this->db->where('numControl',$query['numControl']);
        $this->db->where('proyecto',$post['proy']);
        $query2 = $this->db->get()->row_array();
        
        /*$var1 = $post['proy'];       $var2 = $query['numControl'];
        $var3 = $existe['proyecto']; $var4 = $existe['numControl'];*/
        
        $var1 = $post['proy'];       $var2 = $query['numControl'];
        $var3 = $query2['proyecto']; $var4 = $query2['numControl'];
        
        if($var1 == $var3 && $var2 == $var4){
            //print_r("existe en la BD");
            $data['success']=true;
        }else{
            $data['success']=false;
            $hecho = $this->db->insert('solicitudes', $condiciones ); //insertamos en la tabla usuario 
        }
        
        $this->response( $data );
	}

	public function inscripcion_post(){
        
        $post = $this->post();

		$this->db->select('numControl');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $query = $this->db->get()->row_array();   //aqui obtengo numControl
        
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('numControl',$query['numControl']);
        $query2 = $this->db->get()->row_array();   //aqui obtengo numControl
    
        $var1 = $query['numControl'];       $var2 = $query2['numControl'];
        
        if($var1 == $var2){
            
            $this->db->select('*');
            $this->db->from('solicitudes');
            $this->db->where('numControl',$query['numControl']);
            $query3 = $this->db->get()->result_array();   //aqui obtengo numControl
            
            $data['success']=true;
            $data['datos']= $query3;
        }else{
            $data['success']=false;
        }
        
        $this->response( $data );
	}

	public function listaInscripcion_post(){
        
        $post = $this->post();
        
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('proyecto',$post['proy']);
        $this->db->where('descripcion',$post['desc']);
        $this->db->where('fecha',$post['fecha']);
        $query = $this->db->get()->row_array();   //aqui obtengo numControl
    
        $var1 = $post['proy'];   $var2 = $query['proyecto'];
        $var3 = $post['fecha'];  $var4 = $query['fecha'];
        
        if($var1 == $var2 && $var3 == $var4){
            
            $this->db->select('*');
            $this->db->from('solicitudes');
            $this->db->where('proyecto',$post['proy']);
            $this->db->where('descripcion',$post['desc']);
            $this->db->where('fecha',$post['fecha']);
            $query2 = $this->db->get()->result_array();   //aqui obtengo numControl
                
            $data['success']=true;
            $data['datos']= $query2;
        }else{
            $data['success']=false;
        }
        
        $this->response( $data );
	}

    public function cancelarProyecto_post(){
        
        $post = $this->post();
        
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('proyecto',$post['proy']);
        $this->db->where('fecha',$post['fecha']);
        $this->db->where('numControl',$post['numC']);
        $this->db->delete();
        
        $this->response("Eliminado");
    }

	
}