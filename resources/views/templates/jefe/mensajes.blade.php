<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mensajes</title>
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
		
	

  		<h2>Proyectos de {{Auth::user()->nombre}}</h2>
  		                    
  		<table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
		      <tr>
		        
		        <th>Nombre</th>
		        <th>Codigo</th>
		        <th>Autor</th>
		        <th>Fecha</th>
		        <th>Tipo Actividad</th>
		        <th>Mensajes</th>
		        
		      </tr>
		    </thead>

		    @foreach ($mensaje as $mensajes) 



		    <tbody>
		    	<tr>
		    		
		    		<td>{{$mensajes->nombre}}</td>
		    		<td>{{$mensajes->codigo}}</td>
		    		<td>{{$mensajes->autor}}</td>
		    		<td>{{$mensajes->fecha}}</td>
		    		<td>{{$mensajes->tipo}}</td>
		    		<td>
		    			<a href="{{ route ('chat', [$mensajes->codigo])}}" >Mensajes</a>

		    		</td>
					
		    	</tr>
		    </tbody>

		    @endforeach
		  </table>
		  {{ $mensaje->appends(Request::all())->render() }}
	</div>

	<div class="text-center w-full" style="margin-top: 50px">
		<!--a  class="btn btn-info" href="{{ URL::previous() }}">Regresar a los Proyectos</a-->
		<a href="<?php echo route('menu') ?>" class="btn btn-info"> Regresar al menu</a>
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
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);

	</script>

</body>
</html>