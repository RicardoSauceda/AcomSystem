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
<script type="text/javascript">
        function checkAll(){
            var parent = document.getElementById('parent');
            var label = document.getElementById('label');
            var input = document.getElementsByClassName('chkb');

            if(parent.checked === true) {
                for(var i=0; i<input.length; i++){
                    if (input[i].type == "checkbox" && input[i].id == "check" ) {

                        input[i].checked = true;
                        label.innerHTML="Deseleccionar todos";
                    }
                }
            }
            else if(parent.checked === false) {
                for(var i=0; i<input.length; i++){
                    if (input[i].type == "checkbox" && input[i].id == "check" && input[i].checked ==true) {

                        input[i].checked = false;
                        label.innerHTML="Seleccionar todos";
                    }
                }
            }
        }
    </script>

</head>
<body>	
	@if (Session::has('flash_messages'))

		<div class="alert alert-danger {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
						@endif
						{{ session('flash_messages')}}
					

					</div>

					@endif


		@if (Session::has('flash_message'))

		<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
						@endif
						{{ session('flash_message')}}
					

					</div>

					@endif
<div class="container" style="margin-left : auto; ">
	
  		<h2>Liberar Alumnos de la Actividad: {{$dato->nombre}}</h2>

  		
  	<form action="{{ route('liberar',[$dato->departamento]) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
  			
  				<div  style=" text-align: center; margin-bottom: 5px;">
			  			<div style="display: inline-block; border-style: groove; border-radius: 10px;">
			  				<select  required="" style="margin: 5px;" name="pos">
			  								<option value="">Seleccionar Calificacion</option>
											<option value="Excelente">Excelente</option>
											<option value="Notable">Notable</option>
											<option value="Bueno">Bueno</option>
											<option value="Suficiente">Suficiente</option>
											<option value="Malo">Malo</option>
							</select>
							<br>
							@if ($token == true)
							<button style="margin: 5px;" class="btn btn-success">ENVIAR SELECCIONADOS</button>
							@endif
							@if ($token == false)
							<button style="margin: 5px;" disabled="false" class="btn btn-success">ENVIAR SELECCIONADOS</button>
							@endif
						</div>
				</div>
  		                    
 		<table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
		      <tr>
		      
		        <th>Apellidos</th>
		        <th>Nombre(s)</th>
		        <th>Usuario</th>
		        <th>Carrera</th>
		        <th>No. de Control</th>
		        <th>Tipo de Acom</th>
		        <!--<th>Evaluacion del alumno</th>
		        <th>Documento de Liberacion</th>-->
		        <th><span id="label">Seleccionar Todos</span>
        <input type="checkbox" onclick="checkAll()" id="parent" ><br></th>
		      </tr>
		    </thead>

		    <?php $pos=0 ?>



		    @foreach ($aprobados as $aprobar) 



		    <tbody style="cursor: pointer;">
		    	<tr>

		    		<td>{{$aprobar->apellidos}}</td>
		    		<td>{{$aprobar->alumno}}</td>
		    		<td>{{$aprobar->usuario}}</td>
					<td>{{$aprobar->carrera}}</td>
					<td>{{$aprobar->numControl}}</td>
					<td>{{$aprobar->tipo}}</td>
						<!--<form action="{{ route('liberar',[$aprobar->apellidos,$aprobar->alumno,$aprobar->usuario,$aprobar->numControl,$aprobar->proyecto,$aprobar->codigo_pro, $aprobar->id_sol,$aprobar->id_alum,$aprobar->tipo, $aprobar->credito,$aprobar->id_creo,$dato->autor,$dato->departamento,$aprobar->carrera,$dato->nombre]) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">-->

						{{csrf_field ()}}					
					<!--<td>
						
						<div  data-validate = "Calificiación es Requerida">
							
						<input required="" name="pos" id="pos1" type="radio"  value="Excelente">
						Excelente
					<br><input required="" name="pos" id="pos1" type="radio"  value="Notable">
						Notable
					<br> <input required="" name="pos" id="pos2" type="radio"  value="Bueno" >
						Bueno	
					<br> <input required="" name="pos" id="pos3" type="radio"  value="Suficiente">
						Suficiente
					<br>	
						<input  required="" name="pos" id="pos4" type="radio" value="Malo">
						Malo
						
						
					</td>-->
					<!--
					<td >
						
						
					<input  type="file" class="form-control" name="archivo" >
					
					</td>-->
					<td>
						<input style="width: 15px; height: 15px; margin-left:45%;" type="checkbox" class="chkb" id="check" name="chk[]" value="{{$aprobar->id_sol}}">
						<!--<button class="btn btn-success">ENVIAR</button>-->
					</td>
					
		    	</tr>
		    </tbody>

		    @endforeach
		  </table>
		  {{ $aprobados->appends(Request::all())->render() }}
		  
		  </form>
		</div>
	</div>

	<div class="text-center w-full" style="margin-bottom: 5px;">
		<!--a  class="btn btn-info" href="{{ URL::previous() }}">Regresar a los Proyectos</a-->
		<a href="<?php echo route('proyecto') ?>" class="btn btn-info"> Regresar a Proyectos</a>
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