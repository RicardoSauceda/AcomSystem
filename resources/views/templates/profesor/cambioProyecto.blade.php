<!DOCTYPE html>
<html lang="en">
<head>
	<title>Configuración de Actividad</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/plogin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/plogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/plogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="/plogin/css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<link href="/pmenu/style2.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="/pmenu/iconic2.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
	

	@if ($errors->any())
	    <div style="margin-bottom: 0px;" class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	@if (Session::has('flash_message'))

		<div style="margin-bottom: 0px;" class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
			@if(Session::has('flash_message_important'))
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			@endif
			{{ session('flash_message')}}
		</div>
	@endif
	<div class="limiter">
		
		<div class="container-login100" style="background-image: url('/plogin/images/img-01.jpg');">
			<div class="wrap-login100 p-t-5 p-b-5">

			<form id="contactform" action="{{ route('nuevo',[$proyecto]) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				
						{{csrf_field ()}}	

					<span class="login100-form-title p-t-10 p-b-5">
						MODIFICACION DE LA ACTIVIDAD
					</span>
					

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Nombre de la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido">
						<input value="{{ $proyecto->nombre }}" required="" value="{{ old('nombre') }}" class="input100" type="text" name="nombre"  id="nombre">
						<span class="focus-input100"></span>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Rol del encargado de la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre del rol es requerido">
						<input value="{{$proyecto->rol_encargado}}" required="" class="input100" type="text" name="rol" placeholder="Nombre-Rol-Encargado" id="rolEncargado">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>


					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Cantidad de Alumnos a Inscribirse
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Cantidad de alumnos es requerido">

						<input type="number" min="1" required="" value="{{ $proyecto->cantidad }}" value="{{ old('cantidad') }}" class="input100" name="cantidad"  id="cantidad">
						<span class="focus-input100"></span>
					</div>
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4"> Departamento al que Pertenece la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Departamento is required">
					
						<select required="" name="departamento" id="inputCategoria_id" class="input100">

							<option value="{{$proyecto->id_depat}}">--{{$proyecto->nombre_depa}}--</option>
							@foreach ($depa as $dep)
							<option  value="{{$dep->id_depat}}">{{$dep->nombre_depa}}</option>
							@endforeach
							
							-->
						</select>
					</div>
				
					
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Tipo de Acom
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Tipo de Acom es requerido">
					<meta name="csrf-token" content="{{csrf_token()}}">
						<select required="" name="tipo" class="input100" id="tipo">
							<option value="{{$proyecto->id_tipo}}">--{{$proyecto->nombre_tipo}}--</option>
							@foreach ($tipo as $tip)						
								<option  value="{{$tip->id_tipo}}">{{$tip->ntipo}}</option>
							@endforeach
								
						</select>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Subtipo de Acom
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Tipo de Acom es requerido">
					
						<select required="" name="sub" class="input100" id="subtipo">
							<option value="{{$proyecto->id_sub}}">{{$proyecto->Credito}}--{{$proyecto->nombre_subtipo}}</option>
							
								
						</select>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Periodo escolar
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Periodo escolar es requerido">
					<meta name="csrf-token" content="{{csrf_token()}}">
						<select required="" name="periodo" class="input100" id="periodo">
							<option value="{{$proyecto->periodo}}">--{{$periodo}}--</option>
							<option value="1">Enero-Junio</option>
							<option value="2">Agosto-Diciembre</option>
						</select>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Año del periodo
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Año del periodo es requerido">
					<meta name="csrf-token" content="{{csrf_token()}}">
						<select required="" name="year" class="input100" id="year">
							<option value="{{$proyecto->año}}">--{{$proyecto->año}}--</option>
							@foreach ($array as $a)

								<option  value="{{$inicio}}">{{$inicio}}</option>
								<?php
								$inicio++;
								?>
							@endforeach
								
						</select>
					</div>
					
					

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Fecha de Inicio del Proyecto
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido">

						<input type="date" value="{{ $proyecto->fecha }}" required="" value="{{ old('inicio') }}" class="input100" name="inicio"  id="inicio">
						<span class="focus-input100"></span>
					</div>
					
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Fecha de Finalizacion del Proyecto
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido">

						<input type="date" value="{{ $proyecto->fin }}" required="" value="{{ old('fin') }}" class="input100" name="fin"  id="fin">
						<span class="focus-input100"></span>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Descripcion
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido">
							<textarea rows="4", cols="54" id="descrip" required=""  name="descrip" style="resize:none; border-radius: 10px; padding: 5px;">{{$proyecto->descrip}}</textarea>

						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn p-t-10">
					<button  class="login100-form-btn">Guardar Cambios</button>
						<button></button></a>
						<!--button type="submit" class="login100-form-btn">Iniciar</button-->
					</div>
					<div class="container-login100-form-btn p-t-5">
					<a href="<?php echo route('proyecto') ?>" class="login100-form-btn">Regresar
						<button></button></a>
						
					</div>
					
					

					<span class="login100-form-title p-t-5 p-b-15">
					¡Revise bien los campos antes de guardar!
					</span>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="plogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="plogin/vendor/bootstrap/js/popper.js"></script>
	<script src="plogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="plogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="plogin/js/main.js"></script>


	<script>
		$('div.alert').not('.alert-important').delay(4000).slideUp(400);

		$('#tipo').change(function(){
		var tipo = $('select[name="tipo"]').val();
		// alert(tipo);
		$.ajax({
			header:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: 'get',
			url:'/subtipo',
			datatype:'json',
			data:{
				tipo: tipo
			},
			success: function(data){
				$('#subtipo').empty()
				.append('<option value="">Seleccione el subtipo de acom</option>');
				$.each(data, function(key, value){
					$('#subtipo').append($('<option></option>')
					.attr('value',value.id_sub)
					.text(value.Credito+'-'+value.nombre_subtipo));
				});
			},
			error: function(error){

			}
		});	
		})
	</script>


</body>
</html>