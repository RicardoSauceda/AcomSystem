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
</head>
<body>

	<div class="container">
		
  		<h2>Proyectos de {{Auth::user()->nombre}}</h2>
  		<table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
		      <tr>

		        <th>Nombre del Proyecto</th>
		        <th>Codigo del Proyecto</th>
		        <th>Tipo de Acom</th>
		        <th>Departamento al que pertenece la actividad</th>
		        <th>Encargado de la Actividad</th>
		        <th>Alumnos Aprobados</th>
		        <th>Alumnos No Aprobados</th>
		        <th>Gestionar PDF</th>
	
		      </tr>
		    </thead>
		     @foreach ($proyectos as $proyecto) 
		    <tbody>
		    	<tr>
		    		
		    		<td>{{$proyecto->nombre}}</td>
		    		<td>{{$proyecto->codigo}}</td>
					<td>{{$proyecto->tipo}}</td>
					<td>{{$proyecto->departamento}}</td>
					<td>{{$proyecto->autor}}</td>
					
					<td>
						<a href="{{ route ('apro', [$proyecto->codigo])}}" >Alumnos Aprobados del proyecto {{ $proyecto->nombre}}</a>
					</td>
					<td>
						<a href="{{ route ('reprobados', [$proyecto->codigo])}}" >Alumnos Reprobados del proyecto {{ $proyecto->nombre}}</a>
					</td>

					<td>
						<a class="btn btn-info" href="{{route('aprobadoPDF', [$proyecto->codigo])}}">PDF Aprobados</a> 
		 				<a  class="btn btn-danger" href="{{route('pdfrepro', [$proyecto->codigo])}}">PDF Reprobados</a>
		 			</td>

					
		    	</tr>
		    	
		    </tbody>
		    @endforeach
		  </table>
		  {{ $proyectos->appends(Request::all())->render() }}
	</div>
	
	
	<div style="margin-left: 640px;" class="container-login100-form-btn p-t-10">
					<a href="<?php echo route('menu') ?>" class="btn btn-info">
						Regresar al menu</a>
						<!--button type="submit" class="login100-form-btn">Iniciar</button-->
					</div>


	

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