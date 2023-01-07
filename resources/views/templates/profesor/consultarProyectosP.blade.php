<!DOCTYPE html>
<html lang="en">
<head>
	<title>Consulta Proyectos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<link href="pmenu/stylemenu.css" media="screen" rel="stylesheet" type="text/css" />
<link href="pmenu/iconic.css" media="screen" rel="stylesheet" type="text/css" />
<style type="text/css">
	
.table-fixed th{ 
	
	background-color: #f1f1f6;
	
	 }
.table-fixed td{
	background-color: white;
	
}
.table-fixed tr:hover{
	background-color: #f1f1f6;
	
}
.table-fixed tr:hover td{
	background-color: transparent;
	
}
</style>

</head>
<body>
<nav  style="background: #2F6895; position: fixed; width: 100%;" >
		<ul class="menu" style=" height: 40px; display: flex; justify-content: center;">
			
			
						
			<li style="position: absolute;left: 20px;"><a style="color: white;" href="<?php echo route('menuProfesor') ?>"><span class="iconic arrow-left"></span> Regresar</a></li>			
			<br><br>

			<li  style="color: white; position: absolute; top: 15px;"><span class="iconic user"></span>{{ Auth::user()->nombre }}		
			</li>
			
			<li style="position: absolute; right: 20px;"><a style="color: white;" href="<?php echo route('salir') ?>"><span class="iconic exit-fullscreen"></span>Cerrar Sesion</a></li>

		</ul>
		<div class="clearfix"></div>
	</nav>
	
	
	


	<div style="padding: 15px;" >
		
		
  		
  		<br><br><br>
  		<table  class="table table-striped table-bordered table-hover table-condensed table-fixed" >
    		<!-- <thead  style="position: absolute; top: 70px; left: 113px; width: 1141px;"> -->
		      <thead>
		      <tr>
		        <th>Mostrar a alumnos</th>
		        <th>Nombre de la Actividad</th>
		        <th>Tipo de Acom</th>
		        <th >Código </th>
		        <th >Departamento</th>
		        
		        <th >Descripción de la Actividad</th>
		        <th >Periodo Escolar</th>
		        <th >Fechas de la Actividad</th>
		        <th >Solicitudes Recibidas</th>
		        <th >Alumnos Aceptados</th>
		        <th >PDF Aceptados</th>
		        <th >Modificar Actividad</th>
		        <th >Liberar alumnos</th>
		        <th >Alumnos aprobados</th>
		        <th >Alumnos no aprobados</th>
		        
		      </tr>
		    </thead>

		     
		    <tbody >
		    	@foreach ($proyectosP as $proyecto) 
		    	<tr >
		    		<td>
		    			@if($proyecto->statusFecha == 0)
							<a class="container" href="{{ route('estatusCambio1',[$proyecto->id,$proyecto->statusFecha])}}" >
							<div style="display: flex; justify-content: center;"><img style=" width: 40px; height: 40px;" src="plogin/images/icons/cambiar_on.png"></div></a>
						@endif
						@if($proyecto->statusFecha == 1)
							<a class="container" href="{{ route('estatusCambio2',[$proyecto->id,$proyecto->statusFecha])}}" >
							<div style="display: flex; justify-content: center;"><img style=" width: 40px; height: 40px;" src="plogin/images/icons/cambiar_off.png"></div></a>
						@endif
					</td>
		    		<td>{{$proyecto->nombre}}</td>
					<td>{{$proyecto->tipo}}</td>
					<td>{{$proyecto->codigo}}</td>
					<td>{{$proyecto->nombre_depa}}</td>
					<!--<td>{{$proyecto->autor}}</td>-->
					<td>{{$proyecto->descrip}}</td>
					@if($proyecto->periodo == 1)
					<td style="width: 30px;">Enero-Junio de {{$proyecto->año}}</td>
					@else
					<td style="width: 30px;">Agosto-Diciembre de {{$proyecto->año}}</td>
					@endif
					<td>Inicio: {{$proyecto->fecha}}<br> Fin: {{$proyecto->fin}}</td>

					
				
					<td>
						<a class="container" href="{{ route ('solProfesor', [$proyecto->id])}}" >
							<div style="display: flex; justify-content: center;"><img style=" width: 40px; height: 40px;" src="plogin/images/icons/añadir.png"></div></a>
					</td>
					<td>
						<a class="container" href="{{ route ('inscripciones', [$proyecto->id])}}" ><div style="display: flex; justify-content: center;"><img style=" width: 40px; height: 40px;" src="plogin/images/icons/aceptado.png"></div></a>
					</td>

					<td>
						<a  class="container" href="{{ route ('reportePDF', [$proyecto->id])}}" ><div style="display: flex; justify-content: center;"><img style=" width: 40px; height: 40px;" src="plogin/images/icons/pdf.png"></div> </a>
					</td>
					
					<td>
						<a class="container" href="{{route('proycambio',[$proyecto->id])}}"><div style="display: flex; justify-content: center;"><img style=" width: 45px; height: 45px;" src="plogin/images/icons/editar.png"></div></a>
					</td>
					<td>
						<a class="container" href="{{ route ('acoms', [$proyecto->id])}}"><div style="display: flex; justify-content: center;"><img style=" width: 45px; height: 45px;" src="plogin/images/icons/liberar.png"></div></a>
					</td>
					<td>
						<a class="container" href="{{ route ('aproProfesor', [$proyecto->codigo])}}" ><div style="display: flex; justify-content: center;"><img style=" width: 45px; height: 45px;" src="plogin/images/icons/apro.png"></div></a>
					</td>
					<td>
						<a class="container" href="{{ route ('noaproProfesor', [$proyecto->codigo])}}" ><div style="display: flex; justify-content: center;"><img style=" width: 45px; height: 45px;" src="plogin/images/icons/no apro.png"></div></a>
					</td>
		    	</tr>
		    	
		    </tbody>
		    @endforeach
		  </table>
		  {{ $proyectosP->appends(Request::all())->render() }}
	</div>
	
	
	<!-- <div style="margin-left: 640px; margin-bottom: 15px;" class="container-login100-form-btn p-t-10">
					<a href="<?php echo route('menuProfesor') ?>" class="btn btn-info"> Regresar al Menu</a>
						
					</div> -->


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>