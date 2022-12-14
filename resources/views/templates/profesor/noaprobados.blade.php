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
	<style type="text/css">
	.table-fixed tbody{
	overflow-x: auto;
	width: 100%;
	}

.table-fixed thead,
.table-fixed tbody,
.table-fixed td,
.table-fixed th{
	display: block;
}

.table-fixed tbody td,
.table-fixed thead > tr >th{
	float: left;
	border-bottom-width: 0px;
}
.table-fixed th{ 
		display: flex; 
	justify-content: center;
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

.apellidos1{width: 200px; height: 55px;}
.nombre1{width: 200px; height: 55px;}
.usuario1{width: 150px; height: 55px;}
.carrera1{width: 300px; height: 55px;}
.control1{width: 85px; height: 55px;}
.acom1{width: 385px; height: 55px;}
.credito1{width: 85px; height: 55px;}
.calif1{width: 100px; height: 55px;}
.selec1{width: 168px; height: 55px;}

.apellidos{	width: 200px; height: 45px; overflow-y: auto; border-bottom: none;}
.nombre{width: 200px; height: 45px; overflow-y: auto;}
.usuario{width: 150px;height: 45px; overflow-y: auto;}
.carrera{width: 270px;height: 45px; overflow-y: auto;}
.control{width: 85px;height: 45px; overflow-y: auto;}
.acom{width: 385px;height: 45px;  overflow-y: auto;}
.credito{width: 85px; height: 45px;}
.calif{width: 100px; height: 45px; color: red;}
.selec{width: 168px;height: 45px;}
.selec2{width: 151px;height: 45px;}
</style>

	<script type="text/javascript">
        function checkAll(){
            var parent = document.getElementById('parent');
            var label = document.getElementById('label');
            var input = document.getElementsByClassName('chkb');

            if(parent.checked === true) {
                for(var i=0; i<input.length; i++){
                    if (input[i].type == "checkbox" && input[i].id == "check" ) {

                        input[i].checked = true;
                        // label.innerHTML="Deseleccionar todos";
                    }
                }
            }
            else if(parent.checked === false) {
                for(var i=0; i<input.length; i++){
                    if (input[i].type == "checkbox" && input[i].id == "check" && input[i].checked ==true) {

                        input[i].checked = false;
                        label.innerHTML="Seleccionar Todos";
                    }
                }
            }
        }
    </script>
<link href="/pmenu/style2.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/pmenu/iconic2.css" media="screen" rel="stylesheet" type="text/css" />


</head>
<body>
	<nav  style="background: #2F6895; position: fixed; width: 100%;" >
		<ul class="menu" style=" height: 40px; display: flex; justify-content: center;">
			
			
						
			<li style="position: absolute; left: 20px;"><a style="color: white;" href="<?php echo route('proyecto') ?>"><span class="iconic arrow-left"></span> Regresar</a></li>			
			<br><br>

			<li  style="color: white; position: absolute; top: 15px;"><span class="iconic user"></span>{{ Auth::user()->nombre }}		
			</li>
			
			<li style="position: absolute; right: 20px;"><a style="color: white;" href="<?php echo route('salir') ?>"><span class="iconic exit-fullscreen"></span>Cerrar Sesion</a></li>

		</ul>
		<div class="clearfix"></div>
	</nav>

	<div style="height: 45px"></div>

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
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@endif
						{{ session('flash_message')}}
					

					</div>

					@endif
					
	<div class="container">
			
  		<h2>Alumnos Reprobados de la Actividad {{$dato->nombre}}</h2>
  		

  		<form action="{{ route('liberarNuevo',[$apro]) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
  			{{ csrf_field() }}

  		<button style="margin: 5px;" class="btn btn-success" onclick="return confirm('??Estas seguro que deceas deshacer la liberacion de Alumnos seleccionados?')">DESHACER EVALUACION</button>
  		                    
  		<table class="table table-striped table-bordered table-hover table-condensed table-fixed">
    		<thead>
		      <tr>
		       
		        <th class="control1">Numero de control</th>
				<th class="nombre1">Nombre</th>
				<th class="apellidos1">Apellidos</th>
		        <th class="acom1">Tipo de Acom</th>
		        <th class="calif1">Calificacion Obtenida</th>
		        <th class="selec1"><span id="label">Seleccionar Todos</span>
		        		<input type="checkbox" onclick="checkAll()" id="parent" ><br></th>

		      
		      
		       
		      </tr>
		    </thead>

		    @foreach ($Reprobados as $reprobado) 



		    <tbody>
		    	<tr>
		    		
		    		<td class="control" style="border-bottom: none;border-top: none;">{{$reprobado->numControl}}</td>
				    <td class="nombre" style="border-bottom: none;border-top: none;">{{$reprobado->nombre}}</td>
					<td class="apellidos" style="border-bottom: none;border-top: none;">{{$reprobado->apellidos}}</td>
		    		<td class="acom" style="border-bottom: none; border-top: none;">{{$reprobado->tipo}}</td>
					<td class="calif" style="border-bottom: none; border-top: none;">{{$reprobado->calificacion}}</td>
					<td class="selec" style="border-bottom: none; border-top: none;"><input style="width: 15px; height: 15px; margin-left:45%;" type="checkbox" class="chkb" id="check" name="chk[]" value="{{$reprobado->id_sol}}"></td>
					
				</tr>
		    </tbody>

		    @endforeach
		  </table>
		  
		  {{ $Reprobados->appends(Request::all())->render() }}
		</form>
	</div>

	<!-- <div class="text-center w-full" style="margin-top: 50px">
		a  class="btn btn-info" href="{{ URL::previous() }}">Regresar a los Proyectos</a
		<a href="<?php //echo route('aprobadosProf') ?>" class="btn btn-info"> Regresar al Menu</a>
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
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);

	</script>

</body>
</html>
