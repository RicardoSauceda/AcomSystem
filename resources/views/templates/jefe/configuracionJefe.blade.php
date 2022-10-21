<!DOCTYPE html>
<html lang="en">
<head>
	<title>Configuración</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="plogin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="plogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="plogin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
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
		<div class="container-login100" style="background-image: url('plogin/images/img-01.jpg');">
			<div class="wrap-login100 p-t-10 p-b-10">

			<form action="{{ route('actualizar',[$user]) }}" method="POST">
						{{csrf_field ()}}	
					<div class="login100-form-avatar">
						<img src="plogin/images/admin.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-15">
					Cambio de Usuario y Contraseña	de 
					</span>
					<span class="login100-form-title p-t-5 p-b-5">
					{{Auth::user()->nombre}}
					</span>

					<div class="wrap-input100 validate-input m-b-10" >
						<label style="color: Black" for="usuario">Introduce tu Nuevo Usuario:</label>
						<input  value="{{$user->usuario}}" value="{{ old('usuario') }}" required="" class="input100" type="text" name="usuario"  id="usuario">
					

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<label style="color: Black" for="password">Introduce tu nuevo password:</label>
						<input required="" class="input100" type="password" name="password" placeholder="Password" id="passwd">
					
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>


					<div class="container-login100-form-btn p-t-10">
					<button  class="login100-form-btn">Guardar Cambios</button>
						<button></button></a>
						<!--button type="submit" class="login100-form-btn">Iniciar</button-->
					</div>
					
					<div class="container-login100-form-btn p-t-5">
					<a href="<?php echo route('menu') ?>" class="login100-form-btn">Regresar al Menu
						<button></button></a>
						<!--button type="submit" class="login100-form-btn">Iniciar</button-->
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

	</script>


</body>
</html>