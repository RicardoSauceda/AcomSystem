<!DOCTYPE html>
<html lang="en">
<head>
	<title>Liberacion de Alumnos</title>
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
<div class="container" style="margin-left : 5px;">
		
		


		@if (Session::has('flash_message'))

		<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@endif
						{{ session('flash_message')}}
					

					</div>

					@endif
		
	

  		<h2>Liberar Alumnos del Proyecto {{$dato->nombre}}</h2>
  	
  		                    
 <table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
		      <tr>
		      
		        <th>Apellidos</th>
		        <th>Nombre(s)</th>
		        <th>Usuario</th>
		        <th>Carrera</th>
		        <th>No. de Control</th>
		        <th>Tipo de Acom</th>
		        <th>Calificación Obtenida</th>
		        <th>Documento de Liberacion</th>
		        <th>Liberar</th>
		      </tr>
		    </thead>

		    <?php $pos=0 ?>



		    @foreach ($aprobados as $aprobar) 



		    <tbody>
		    	<tr>

		    		<td>{{$aprobar->apellidos}}</td>
		    		<td>{{$aprobar->alumno}}</td>
		    		<td>{{$aprobar->usuario}}</td>
		    		<td>{{$aprobar->carrera}}</td>
					<td>{{$aprobar->numControl}}</td>
					<td>{{$aprobar->tipo}}</td>
					<form action="{{ route('lib',[$aprobar->alumno,$aprobar->usuario,$aprobar->proyecto,$aprobar->codigo_pro, $aprobar->id_sol,$aprobar->id_alum,$aprobar->tipo, $aprobar->credito,$aprobar->id_creo]) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
						{{csrf_field ()}}				
					<td>
						<div  data-validate = "Calificiación es Requerida">
						<input required="" name="pos" id="pos1" type="radio"  value="aprobado">
						Excelente
					<br> <input required="" name="pos" id="pos2" type="radio"  value="aprobado" >
						Bueno	
					<br> <input required="" name="pos" id="pos3" type="radio"  value="reprobado">
						Deficiente
					<br>
						<input  required="" name="pos" id="pos4" type="radio" value="reprobado">
						Malo
						</div>
					</td>

					<td >
						
					<input type="file" class="form-control" name="archivo">
					
					</td>
					<td>
						<button class="btn btn-success">ENVIAR</button>
					</td>

					</form>
		    	</tr>
		    </tbody>

		    @endforeach
		  </table>
		  {{ $aprobados->appends(Request::all())->render() }}
		
	</div>

	<div class="text-center w-full">
		<!--a  class="btn btn-info" href="{{ URL::previous() }}">Regresar a los Proyectos</a-->
		<a href="<?php echo route('liberarJ') ?>" class="btn btn-info"> Regresar a Proyectos</a>
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
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);

	</script>

</body>
</html>