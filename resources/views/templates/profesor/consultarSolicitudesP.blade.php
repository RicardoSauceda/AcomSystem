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
	border-bottom-width: 0;
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
.table-fixed{
	
}
.apellidos1{width: 200px; height: 55px;}
.nombre1{width: 200px; height: 55px;}
.usuario1{width: 150px; height: 55px;}
.carrera1{width: 270px; height: 55px;}
.control1{width: 85px; height: 55px;}
.acom1{width: 250px; height: 55px;}
.selec1{width: 193px; height: 55px;}

.apellidos{	width: 200px; height: 55px; overflow-y: auto;}
.nombre{width: 200px; height: 55px; overflow-y: auto;}
.usuario{width: 150px;height: 55px; overflow-y: auto;}
.carrera{width: 270px;height: 55px; overflow-y: auto;}
.control{width: 85px;height: 55px; overflow-y: auto;}
.acom{width: 250px;height: 55px;  overflow-y: auto;}
.selec{width: 193px;height: 55px;}
.selec2{width: 176px;height: 55px;}
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

	@if (Session::has('flash_message'))

					<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@endif
						{{ session('flash_message')}}
					

					</div>

					@endif

	<div class="container">
				
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
							<button style="margin: 5px;" class="btn btn-success">NOTIFICAR</button>
							@endif
							@if ($token == false)
							<button style="margin: 5px;" disabled="false" class="btn btn-success">ENVIAR SELECCIONADOS</button>
							@endif
						</div>
				</div>

		<div style="width: 1100px;">
  		                    
  		<table class="table table-striped table-bordered table-hover table-condensed table-fixed">
    		<thead>
		      <tr>
		        
		        <th class="apellidos1">Apellidos</th>
		        <th class="nombre1">Nombre(s)</th>
		        <th class="usuario1">Usuario</th>
		        <th class="carrera1">Carrera</th>
		        <th class="control1">No. de Control</th>
		        <th class="selec1"><span id="label">Seleccionar Todos</span>
        <input type="checkbox" onclick="checkAll()" id="parent" ><br></th>
		        <!--<th style="font-size: 16px;">Respuesta</th>
		        <th>Enviar Respuesta</th>-->
		      </tr>
		    </thead>

		    


				@if($numero>7)
		    <tbody style="cursor: pointer; height: 386px;">
		    	@endif
    			@if($numero==7)
		    <tbody style="cursor: pointer; height: 386px;">
		    	@endif
		    	@if($numero==6)
		    <tbody style="cursor: pointer; height: 331px;">
		    	@endif
		    	@if($numero==5)
		    <tbody style="cursor: pointer; height: 276px;">
		    	@endif
		    	@if($numero==4)
		    <tbody style="cursor: pointer; height: 221px;">
		    	@endif
		    	@if($numero==3)
		    <tbody style="cursor: pointer; height: 166px;">
		    	@endif
		    	@if($numero==2)
		    <tbody style="cursor: pointer; height: 111px;">
		    	@endif
		    	@if($numero==1)
		    <tbody style="cursor: pointer; height: 56px;">
		    	@endif
		    	@if($numero==0)
		    <tbody style="cursor: pointer; height: 1px;">
		    	@endif

		    	@foreach ($solicitudprofe as $solicitudes) 
		    	<tr>
		    		
		    		<td class="apellidos">{{$solicitudes->apellidos}}</td>
		    		<td class="nombre">{{$solicitudes->nombre}}</td>
		    		<td class="usuario">{{$solicitudes->usuario}}</td>
					<td class="carrera">{{$solicitudes->Carrera}}</td>
					<td class="control">{{$solicitudes->numControl}}</td>
					
					
					

					@if($numero>7)
					<td class="selec2">
						<input style="width: 15px; height: 15px; margin-left:45%;" type="checkbox" class="chkb" id="check" name="chk[]" value="{{$solicitudes->id_sol}}">
						<!--<button class="btn btn-success">ENVIAR</button>-->
					</td>
					@endif
					@if($numero<=7)
					<td class="selec">
						<input style="width: 15px; height: 15px; margin-left:45%;" type="checkbox" class="chkb" id="check" name="chk[]" value="{{$solicitudes->id_sol}}">
						<!--<button class="btn btn-success">ENVIAR</button>-->
					</td>
					@endif

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
		    	@endforeach
		    </tbody>

		    
		  </table>
		  </div>

		</form>
		  
	</div>

	<!-- <div class="text-center w-full" style="margin-top: 50px">
		a  class="btn btn-info" href="{{ URL::previous() }}">Regresar a los Proyectos</a
		<a href="<?php //echo route('proyecto') ?>" class="btn btn-info"> Regresar a los Proyectos</a>
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

	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);

	</script>

</body>
</html>