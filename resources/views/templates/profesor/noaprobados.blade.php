<!DOCTYPE html>
<html lang="en">
<head>
	<title>No aprobados</title>
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
					
	<div class="container">
		@if (Session::has('flash_message'))

					<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@endif
						{{ session('flash_message')}}
					

					</div>

					@endif
		
	

  		<h2>Alumnos Reprobados de la Actividad {{$dato->nombre}}</h2>
  		

  		<form action="{{ route('liberarNuevo',[$apro]) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
  			{{ csrf_field() }}

  		<button style="margin: 5px;" class="btn btn-success">DESHACER EVALUACION</button>
  		                    
  		<table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
		      <tr>
		       
		        <th>Alumno</th>
		        <th>Tipo de Acom</th>
		        <th>Calificacion Obtenida</th>
		        <th><span id="label">Seleccionar Todos</span>
		        		<input type="checkbox" onclick="checkAll()" id="parent" ><br></th>

		      
		      
		       
		      </tr>
		    </thead>

		    @foreach ($Reprobados as $reprobado) 



		    <tbody>
		    	<tr>
		    		
		    		<td>{{$reprobado->nombre}}</td>
		    		<td>{{$reprobado->tipo}}</td>
					<td style="color: Red">{{$reprobado->calificacion}}</td>
					<td><input style="width: 15px; height: 15px; margin-left:45%;" type="checkbox" class="chkb" id="check" name="chk[]" value="{{$reprobado->id_sol}}"></td>
					
				</tr>
		    </tbody>

		    @endforeach
		  </table>
		  
		  {{ $Reprobados->appends(Request::all())->render() }}
		</form>
	</div>

	<div class="text-center w-full" style="margin-top: 50px">
		<!--a  class="btn btn-info" href="{{ URL::previous() }}">Regresar a los Proyectos</a-->
		<a href="<?php echo route('aprobadosProf') ?>" class="btn btn-info"> Regresar al Menu</a>
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