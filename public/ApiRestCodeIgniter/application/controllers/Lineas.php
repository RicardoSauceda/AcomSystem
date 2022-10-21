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
        //$this->db->where('password',$post['pass']);
        $query2 = $this->db->get()->row_array();
        
        $var1 = $post['usu'];  //     $var2 = $post['pass'];
        $var3 = $query2['usuario']; //$var4 = $query2['password'];
        
        if($var1 == $var3){
            //print_r("existe en la BD");
            $data['success']=true;
            $data['usuarioo']= $var3;
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
	    
	    $query3 = $this->db->query('SELECT nombre,fecha,codigo,fin FROM `proyectos`');
	    
        foreach ($query3->result() as $row) 
        {
            $dato[] = $row->nombre; //accedo al nombre para que me de solo eso
            $datofecha[] = $row->fecha;
        }
        
        $b=0;
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
                $result[] = $query4['aprobados']; //se guarda la suma de cuantos aprobados hay en ese proyecto       
            }
            
            $b++;
        }
        
        //en esta parte hacemos un contador para las fechas que aparesca o desaparezca el proyecto
        //$query3 = $this->db->query('SELECT nombre,fecha FROM `proyectos`');
	    $a = 0;
        foreach ($query3->result() as $row) 
        {
            $cad = $row->fin;
	        $fech = date('Y-m-d');
	        $nom = $row->nombre;
	        $cod = $row->codigo;
	        
	        $data = array(
                'statusFecha' => 1,
            );
	        
	        if($cad == $fech){
    	        $this->db->where('nombre', $nom);
    	        $this->db->where('codigo', $cod);
                $this->db->update('proyectos', $data);
	        }
	        $a++;
        }
        
        //cantidad de alumnos
        $c=0;
        foreach ($query->result() as $row2) 
        {
            //condiciono para cuando es menor y excede la cantidad de alumnos en un proyecto
            $laCantidad = $row2->cantidad;
            $losInscritos = $result[$c];
            
            if($laCantidad > $result[$c]){
                $total = 1;
            }else{
                $total = 2;
            }
            
            $todo[] = array('id' => $row2->id,
                            'nombre' => $row2->nombre,
                            'cantidad' => $row2->cantidad,
                            'credito' => $row2->credito,
                            'tipo' => $row2->tipo,
                            'codigo' => $row2->codigo,
                            'autor' => $row2->autor,
                            'fecha' => $row2->fecha,
                            'descrip' => $row2->descrip,
                            'id_creo' => $row2->id_creo,
                            'statusFecha' => $row2->statusFecha,
                            'departamento' => $row2->departamento,
                            'fin' => $row2->fin,
                            'aprobados' => $result[$c],
                            'limite' => $total,
                            );
            $c++;
        }
        //invertimos los datos
        $tam = count($todo);
         foreach( $todo as $value ) {
             $tam = $tam -1;
             $todo2[] = $todo[$tam];
         }
        
        
		$respuesta = array(
			'error' => FALSE,
			'todo' => $todo2,
			//'todo3' => $cant,
			//'todo2' => $result
			 );

		$this->response( $respuesta );   
	
	}
	
	public function registroProy_post(){
        
        $post = $this->post();
        
	    $this->db->select('id,nombre,apellidos,carrera,semestre,numControl');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $this->db->where('password',$post['pass']);
        $query = $this->db->get()->row_array();
        
	    $condiciones = array('id_alum' => $query['id'],
	                         'alumno' => $query['nombre'],
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
							 'codigo_pro' => $post['codigo'],
							 'fecha' => $post['fecha'],
							 'id_creo' => $post['creo'],
							 'usuario' => $post['usu'],
							);
        
        $this->db->select('numControl,proyecto');
        $this->db->from('solicitudes');
        $this->db->where('numControl',$query['numControl']);
        $this->db->where('proyecto',$post['proy']);
        $query2 = $this->db->get()->row_array();
        
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
        $query2 = $this->db->get()->row_array();  
    
        $var1 = $query['numControl'];       $var2 = $query2['numControl'];
        
        if($var1 == $var2){
            
            $this->db->select('*');
            $this->db->from('solicitudes');
            $this->db->where('numControl',$query['numControl']);
            $query3 = $this->db->get()->result_array();  
            
            $data['success']=true;
            $data['datos']= $query3;
        }else{
            $data['success']=false;
        }
        
        $this->response( $data );
	}
	
	public function listaInscripcion_post(){
        
        $post = $this->post();
        
        $this->db->select('numControl');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $query = $this->db->get()->row_array();   //aqui obtengo numControl
        
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('proyecto',$post['proy']);
        $this->db->where('descripcion',$post['desc']);
        $this->db->where('fecha',$post['fecha']);
        $this->db->where('numControl',$query['numControl']);
        $query2 = $this->db->get()->row_array();   //aqui obtengo datos
    
        $var1 = $query['numControl'];   $var2 = $query2['numControl'];
        
        if($var1 == $var2){
            
            $this->db->select('*');
            $this->db->from('solicitudes');
            $this->db->where('proyecto',$post['proy']);
            $this->db->where('descripcion',$post['desc']);
            $this->db->where('fecha',$post['fecha']);
            $this->db->where('numControl',$query['numControl']);
            $query3 = $this->db->get()->result_array();   //aqui obtengo numControl
                
            $data['success']=true;
            $data['datos']= $query3;
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
	
	public function mensajes_post(){
	    
	    $post = $this->post();
        
	    $condiciones = array('proyecto' => $post['proy'],
	                         'codigo' => $post['codi'],
	                         'profesor' => $post['prof'],
	                         'msg_profesor' => $post['msg_prof'],
	                         'usuario' => $post['usu'],
	                         'msg_alumno' => $post['msg_usu'],
							 'contador' => $post['cont'],
							 'tipo_MSG' => $post['tipoMsg'],
							);
        
        $hecho = $this->db->insert('mensajes', $condiciones ); //insertamos en la tabla mensajes
        
        $this->response( $condiciones );
	       
	}
	
	public function ConsultarMensajes_post(){
	    
	   $post = $this->post();
	    
	    $this->db->select('*');
        $this->db->from('mensajes');
        $this->db->where('usuario',$post['usu']);
        //$this->db->where('tipoMsg','Inscripcion');
        //$this->db->or_where('tipoMsg','Aceptacion');
        //$this->db->or_where('tipoMsg','Rechazo');
        $todo = $this->db->get();//->result_array(); 
            
        foreach ($todo->result() as $row) 
        {
            $id_MSG[] = $row->id_MSG;
			$proyecto[] = $row->proyecto;
			$codigo[] = $row->codigo;
			$profesor[] = $row->profesor;
			$usuario[] = $row->usuario;
			$msg_profesor[] = $row->msg_profesor;
			$contador[] = $row->contador;
			$tipo_MSG[] = $row->tipo_MSG;
        }
        
        $c=0;
        foreach ($codigo as $row2) 
        {
            $codi[$c] = $row2;
            
            $this->db->select_sum('estado');
            $this->db->from('chats');
            $this->db->where('codigo', $codi[$c]);
            $this->db->where('usuario',$post['usu']);
            $this->db->where('envio','sistema');
            $query4 = $this->db->get()->row_array();
            
            if($query4['estado'] == null){
                $result[] = "0"; //si es equivalente a vaio o 0
            }else{
                $result[] = $query4['estado']; //se guarda la suma de cuantos aprobados hay en ese proyecto       
            }
            
          $c++;
        }
        
        $d=0;
        foreach($codigo as $row3)
        {
            $todoo[] = array(
			    'id_MSG' => $id_MSG[$d],
			    'proyecto' => $proyecto[$d],
			    'codigo' => $codigo[$d],
			    'profesor' => $profesor[$d],
			    'usuario' => $usuario[$d],
			    'msg_profesor' => $msg_profesor[$d],
			    'contador' => $contador[$d],
			    'tipo_MSG' => $tipo_MSG[$d],
			    'valChat' => $result[$d],
			);
			 
		  $d++;
        }
        
        $respuesta = array(
			'error' => FALSE,
			'todo' => $todoo,
			//'todo' => $todo,
			 );

		$this->response( $respuesta );  
	       
	}
	
	public function sumaMSG_post()
	{
	    $post = $this->post();
	    
	    $this->db->select_sum('contador');
	    $this->db->from('mensajes');
        $todo = $this->db->where('usuario',$post['usu']);
        //$todo = $this->db->get()->result_array();
        $todo = $this->db->get();
        //$data['datos'] = $todo;
        
        foreach ($todo->result() as $row) 
        {
            $data = $row->contador;
        }
        
        if($data == 0){
            $data = 60;
        }
        
        $this->response( $data );
	}
	
	public function mensajeLeido_post()
	{
	    $post = $this->post();
	    
	    $data = array(
            'contador' => 0,
        );
	    
	    $this->db->where('id_MSG', $post['id']);
        $this->db->update('mensajes', $data);
        
        $this->response($data);
	}
	
	public function eliminarMsg_post(){
	    
	    $post = $this->post();
	    
	    $this->db->select('*');
        $this->db->from('mensajes');
        $this->db->where('id_MSG',$post['id']);
        $this->db->delete();
        
        $this->response("Eliminado");
	}
	
	public function pdf_post(){
	    
	    $post = $this->post();
	    
	    $id_usuario = $post['usu'];		
	    //$path = 'https://ittg-isc-acoms.000webhostapp.com/archivos/';
	   // $path = 'http://ittg-isc-acoms.hostingerapp.com/archivos/';
	    $path = 'http://ittg-isc-acom.hol.es//archivos/';
	    
	    $query = $this->db->query("SELECT * FROM acoms WHERE usuario = '$id_usuario'");	
	    $info = $query->result_array();				
	    foreach ($info as $i)		
	    {			
	        $este = $path . $i['pdf'];		
	    }		
	    $query2 = $this->db->query("SELECT pdf FROM acoms WHERE usuario = '$id_usuario'");
		$respuesta = array(
			'error' => FALSE,
			'pdf' => $info,
			'otro'=> $este,
		);// mira a ver si puedes acceder 

		$this->response( $respuesta );
	}
	
	public function informacion_get(){
	    $id_usuario = "uno";		
	   //  $path = 'http://ittg-isc-acoms.hostingerapp.com/archivos/';
	     $path = 'http://ittg-isc-acom.hol.es//archivos/';
	   
	   //$path = 'https://ittg-isc-acoms.000webhostapp.com/archivos/';
	    $query = $this->db->query("SELECT * FROM informacion WHERE info = '$id_usuario'");
	    $info = $query->result_array();				
	    foreach ($info as &$i)		
	    {			
	        $i['pdf'] = $path . $i['pdf'];		
	    }		
		$respuesta = array(
			'error' => FALSE,
			'pdf' => $info
		);// mira a ver si puedes acceder 

		$this->response( $respuesta );
	}
	
	public function chatEnvio_post(){
	    
	    $data = $this->post();

		$condiciones = array('codigo' => $data['cod'],
							 'usuario' => $data['usu'],
							 'mensaje' => $data['msg'],
							 'estado' => $data['esta'],
							 'envio' => $data['env'],
							);

		$hecho = $this->db->insert('chats', $condiciones ); //insertamos en la tabla usuario 

		$this->response( $condiciones );
	}
	
	public function ConsultaChat_post(){
	    
	   $post = $this->post();
	    
	    $this->db->select('*');
        $this->db->from('chats');
        $this->db->where('usuario',$post['usu']);
        $this->db->where('codigo', $post['cod']);
        $todo = $this->db->get()->result_array(); 
        
		$respuesta = array(
			'error' => FALSE,
			'chat' => $todo,
			 );

		$this->response( $respuesta );
		
	}
	
	public function ActualizarContadorChat_post(){
	    
	    $post = $this->post();
	    
	    $data = array(
            'estado' => 0,
        );
	    
	    $this->db->where('codigo', $post['cod']);
	    $this->db->where('usuario', $post['usu']);
	    $this->db->where('envio', $post['env']);
        $this->db->update('chats', $data);
        
        $this->response($data);
	}
	
	public function real_get(){

		$query = $this->db->query('SELECT * FROM `bdreal`');

		$respuesta = array(
			'error' => FALSE,
			'real' => $query->result_array()
			 );

		$this->response( $respuesta );
	}
	
	public function perfil_post(){
	    
	   $post = $this->post();
	    
	    $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $this->db->where('password', $post['pass']);
        $dataPerfil = $this->db->get()->result_array(); 
        
		$respuesta = array(
			'error' => FALSE,
			'perfil' => $dataPerfil,
		);

		$this->response( $respuesta );
	}
	public function editarperfil_post(){
	    
	   $post = $this->post();
	    
	    $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $this->db->where('password', $post['pass']);
        $dataPerfil = $this->db->get()->result_array(); 
        
		$respuesta = array(
			'error' => FALSE,
			'perfil' => $dataPerfil,
		);

		$this->response( $respuesta );
	}
    
    public function editarRegistro1_post(){
        
        $post = $this->post();

	/*	$condiciones = array(
							 'nombre' => $post['nom'],
							 );*/
        
         $data['success']=false;
            $hecho = $this->db->update('nombre',$post['nom'])->from('usuario')->where('usuario',$post['usu']); //insertamos en la tabla usuario 
       //$hecho = DB::table('usuario')->where('usuario','=',$post['usu'])->update(['nombre'=>$post['nom']]);
        
	    //$this->db->select('*');
        //$this->db->from('usuario');
        //$this->db->where('usuario',$post['usu']);
        //$this->db->update('nombre',$post['nom']);
        

		$this->response( $data );
        
        
	}
		public function editarRegistro_post(){
        
        $post = $this->post();

		$condiciones = array(//'usuario' => $post['usu'],
							 'nombre' => $post['nom'],
							 'apellidos' => $post['ape'],
							 'carrera' => $post['car'],
							 'semestre' => $post['sem'],
							 'numControl' => $post['numC'],
							 'email' => $post['ema'],
							 //'password' => $post['pass'],
							);
$condicion = array(//'usuario' => $post['usu'],
							 'alumno' => $post['nom'],
							 'apellidos' => $post['ape'],
							 'carrera' => $post['car'],
							 'semestre' => $post['sem'],
							 'numControl' => $post['numC'],
							 //'email' => $post['ema'],
							 //'password' => $post['pass'],
							);

		$this->db->select('usuario,password');
        $this->db->from('usuario');
        $this->db->where('usuario',$post['usu']);
        $this->db->where('password',$post['pass']);
        $query2 = $this->db->get()->row_array();
        
        //$var1 = $post['usu'];       $var2 = $post['pass'];
        //$var3 = $query2['usuario']; $var4 = $query2['password'];
        $var1 = $post['numC'];
        $var2 = $post['numControl'];
        
        if($var1 == $var2){
            //print_r("existe en la BD");
            $data['success']=true;
            $data['numControll']= $var2;
        }else{
            $data['success']=false;
            //$hecho = $this->db->update('usuario', $condiciones )->where('usuario',$condicion); //insertamos en la tabla usuario
            $hecho = $this->db->where('usuario',$post['usu'])->update('usuario', $condiciones );
            
        }
        /*$this->db->select('usuario,password');
        $this->db->from('solicitudes');
        $this->db->where('alumno',$post['usu']);
        $this->db->where('password',$post['pass']);
        $query2 = $this->db->get()->row_array();*/
         $hecho = $this->db->where('usuario',$post['usu'])->update('solicitudes', $condicion );
           
        
        $this->response( $data );
	}

}
