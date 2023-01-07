<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cambiar Nombre</title>
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
	
</head>
<body>
	
	@if (Session::has('flash_messages'))

		<div style="margin-bottom: 0px;" class="alert alert-danger {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
						@if(Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
						@endif
						{{ session('flash_messages')}}
					

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
			<div class="wrap-login100 p-t-10 p-b-5" style="width: 500px;">

				<form action="{{route('regNombreC',[$Carre->idCar])}}" method="POST" class="login100-form validate-form" id="contactForm">
					{{ csrf_field() }}

					
					
					<div class="login100-form-avatar">
						<img src="/plogin/images/admin.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-10 p-b-5">
						Editar Carrera
					</span>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Nombre de la Carrera 
 					 </font>
					<div  class="wrap-input100 validate-input m-b-10" data-validate = "Departamento is required" >
						
					
						<input required="" value="{{$Carre->Carrera}}"  class="input100" type="text" name="nombre" >
					
					</div>
				


					<font class="text-center w-full p-t-1 p-b-30" color="White" face="Comic Sans MS,arial,verdana" size="5">¡Revise bien los Campos antes de Realizar el Cambio!
 					 </font>
					<div class="container-login100-form-btn p-t-10">
					
							<input class="login100-form-btn" class="input100" type="submit" value="Guardar">
					</div>

					<div class="container-login100-form-btn p-t-10">
					<a href="<?php echo route('busquedaC') ?>" class="login100-form-btn">Regresar
						<button></button></a>
						<!--button type="submit" class="login100-form-btn">Iniciar</button-->
					</div>

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
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);

	</script>

</body>
</html>