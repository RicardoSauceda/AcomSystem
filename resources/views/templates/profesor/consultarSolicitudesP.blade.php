<!DOCTYPE html>
<html lang="en">
<head>
	<title>Consulta Solicitudes</title>
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

	<div class="container">
		@if (Session::has('flash_message'))

					<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@endif
						{{ session('flash_message')}}
					

					</div>

					@endif
		
	

  		<h2>Solicitudes para la Actividad:   {{$dato->nombre}}</h2>


  		<form action="{{ route('respuestaP') }}" method="POST">
						{{csrf_field ()}}

			<div  style=" text-align: center; margin-bottom: 5px;">
			  			<div style="display: inline-block; border-style: groove; border-radius: 10px;">
			  				<select required="" style="margin: 5px;" name="pos">
											<option value="">Seleccionar Respuesta</option>
											<option value="Aceptado">Aceptar</option>
											<option value="Rechazado">Rechazar</option>
										
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
		        <th><span id="label">Seleccionar Todos</span>
        <input type="checkbox" onclick="checkAll()" id="parent" ><br></th>
		        <!--<th style="font-size: 16px;">Respuesta</th>
		        <th>Enviar Respuesta</th>-->
		      </tr>
		    </thead>

		    @foreach ($solicitudprofe as $solicitudes) 



		    <tbody>
		    	<tr>
		    		
		    		<td>{{$solicitudes->apellidos}}</td>
		    		<td>{{$solicitudes->alumno}}</td>
		    		<td>{{$solicitudes->usuario}}</td>
					<td>{{$solicitudes->carrera}}</td>
					<td>{{$solicitudes->numControl}}</td>
					
					
					<td>
						<input style="width: 15px; height: 15px; margin-left:45%;" type="checkbox" class="chkb" id="check" name="chk[]" value="{{$solicitudes->id_sol}}">
						<!--<button class="btn btn-success">ENVIAR</button>-->
					</td>

					<!--<td>
					
						<input  required="" name="respuesta" id="pos1" type="radio"  value="Aceptado">
						Aceptar
						<input required="" name="respuesta" id="pos2" type="radio"  value="Rechazado">Rechazar
					
						
					</td>

					<td>
						<button class="btn btn-success">ENVIAR</button>
					</td>


					</form>-->
					
		    	</tr>
		    </tbody>

		    @endforeach
		  </table>

		</form>
		  
	</div>

	<div class="text-center w-full" style="margin-top: 50px">
		<!--a  class="btn btn-info" href="{{ URL::previous() }}">Regresar a los Proyectos</a-->
		<a href="<?php echo route('proyecto') ?>" class="btn btn-info"> Regresar a los Proyectos</a>
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