<!DOCTYPE html>
<html lang="en">
<head>
	<title>Consulta Profesores</title>
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

		@if (Session::has('flash_message'))

					<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@endif
						{{ session('flash_message')}}
					

					</div>

					@endif
		
		<h1>Consulta de Usuarios</h1>
		<h2>
		{{ Form::open(['route' => 'busqueda', 'method' => 'GET', 'class' => 'form-inline pull-right' ]) }}

			<div class="form-group">
				{{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
			</div>

			<div  class="form-group">
				{{ Form::text('departamento', null, ['class' => 'form-control', 'placeholder' => 'Departamento']) }}
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				
			</div>

		{{ Form::close() }}
		</h2>                      
  		<table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
		      <tr>
		        
		        <th>Nombre del Profesor</th>
		        <th>Departamento</th>
		        <th>Categoria</th>
		        <th>Usuario</th>
		        <th>Eliminar Jefe</th>
		      </tr>
		    </thead>

		    @foreach ($profesores as $profesor)
		    <tbody>
		      <tr>
		   
		        <td>{{$profesor->nombre}}</td>
		        <td>{{$profesor->departamento}}</td>
		        <td>{{$profesor->categoria}}</td>
		        <td>{{$profesor->usuario}}</td>

		        <td>
						<a class="btn btn-danger" href="{{route('baja',[$profesor->id, $profesor->nombre]) }}">Eliminar</a> 
					 	
					</td>
		      </tr>
		    </tbody>
		    @endforeach
		  </table>
		  {{ $profesores->appends(Request::all())->render() }}
		
	</div>

	<div style="margin-left: 640px;" class="container-login100-form-btn p-t-10">
					<a class="btn btn-info" href="<?php echo route('menuAdmin') ?>">
						Regresar al Menu</a>
						
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
	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(3000);

	</script>

</body>
</html>