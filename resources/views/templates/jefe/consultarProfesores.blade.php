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
<link href="pmenu/stylemenu.css" media="screen" rel="stylesheet" type="text/css" />
<link href="pmenu/iconic.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
	<nav  style="background: #2F6895; position: fixed; width: 100%;" >
		<ul class="menu" style=" height: 40px; display: flex; justify-content: center;">
			
			
						
			<li style="position: absolute;left: 20px;"><a style="color: white;" href="<?php echo route('menu') ?>"><span class="iconic arrow-left"></span> Regresar</a></li>			
			<br><br>

			<li  style="color: white; position: absolute; top: 15px;"><span class="iconic user"></span>{{ Auth::user()->nombre }}		
			</li>
			
			<li style="position: absolute; right: 20px;"><a style="color: white;" href="<?php echo route('salir') ?>"><span class="iconic exit-fullscreen"></span>Cerrar Sesion</a></li>

		</ul>
		<div class="clearfix"></div>
	</nav>
	<div style="padding: 55px;" >

	@if (Session::has('flash_message'))

					<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@endif
						{{ session('flash_message')}}
					

					</div>

					@endif

	<div class="container">
		
  		
  		<h2>
		{{ Form::open(['route' => 'buscar', 'method' => 'GET', 'class' => 'form-inline pull-right' ]) }}

			<!-- <div class="form-group">
				{{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
			</div>

			<div  class="form-group">
				{{ Form::text('departamento', null, ['class' => 'form-control', 'placeholder' => 'Departamento']) }}
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				
			</div> -->

		{{ Form::close() }}
		</h2>  
  	                                 
  		<table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
		      <tr>
		      
		        <th>Nombre del Profesor</th>
		        <th>Departamento</th>
		        <!-- <th>Categoria</th> -->
		        <th>Usuario</th>
		        <th>Eliminar Profesor</th>
		      </tr>
		    </thead>

		    @foreach ($profesores as $profesor)
		    <tbody>
		      <tr>
		        
		        <td>{{$profesor->nombre}}</td>
		        <td>{{$profesor->nombre_depa}}</td>
		        <!-- <td>{{$profesor->categoria}}</td> -->
		        <td>{{$profesor->usuario}}</td>

		        <td>
		        		<div style="display: flex; justify-content: center;">
						<a  class="btn btn-danger" href="{{route('bajaprofe',[$profesor->id, $profesor->nombre]) }}" onclick="return confirm('??Estas seguro que deceas eliminar este usuario? Sus actividades tambien seran eliminadas')">Eliminar</a> 
						</div>
					 	
					</td>
		      </tr>
		    </tbody>
		    @endforeach
		  </table>
		   {{ $profesores->appends(Request::all())->render() }}
		
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
		$('div.alert').not('.alert-important').delay(3000).slideUp(1000);

	</script>

</body>
</html>