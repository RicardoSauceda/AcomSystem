<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrar Profesor</title>
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
			<div class="wrap-login100 p-t-80 p-b-5">

				<form action="/registrar" method="POST" class="login100-form validate-form" id="contactForm">
					{{ csrf_field() }}

					
					
					<div class="login100-form-avatar">
						<img src="plogin/images/profe.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-10 p-b-5">
						REGISTRO PROFESOR
					</span>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Nombre del Profesor
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "El Nombre del profesor es requerido">
						<input value="{{old('nombre')}}" required="" class="input100" type="text" name="nombre" placeholder="Nombre-profesor" id="nombre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Departamento
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Departamento is required">
					
						<select required="" name="departamento" id="inputCategoria_id" class="input100">

							
							<option value="">Seleccione un Departamento</option>
							<option value="DepartamentodeSistemas">Departamento de Sistemas</option>
							<option  value="DepartamentodeMecanica">Departamento de Mecanica</option>
							<option  value="DepartamentodeIndustrial">Departamento de Industrial</option>
							<option  value="DepartamentodeBioquimica">Departamento de Bioquimica</option>
							<option  value="DepartamentodeQuimica">Departamento de Quimica</option>
							<option  value="DepartamentodeGestionEmpresarial">Departamento de Gestion Empresarial</option>
							<option  value="DepartamentodeLogistica">Departamento de Logistica</option>
							<option  value="DepartamentodeElectrica">Departamento de Electrica</option>
							<option  value="DepartamentodeElectronica">Departamento de Electronica</option>
							<option  value="DepartamentodeExtraescolares">Departamento de Extraescolares</option>
							<option  value="DepartamentodeGestionTecnologica">Departamento de Gestion Tecnologica </option>
							<option  value="DepartamentodeDesarrolloAcademico">Departamento de Desarrollo Academico </option>
							
						</select>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Categoria
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "TipoCargo is required">
						<select required="" name="categoria" class="input100">
							<option value="">Seleccione un Cargo</option>
							<!--option value="Jefe de Departamento">Jefe de Departamento</option-->
							<option value="Profesor">Profesor</option>
						</select>
					</div>


					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Usuario
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Usuario es requerido">
						<input value="{{old('usuario')}}" required="" class="input100" type="text" name="usuario" placeholder="Usuario" id="usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>


					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Contraseña
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Contraseña es requerido">
						<input class="input100" type="password" required="" name="password" placeholder="Contraseña" id="passwd">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					
					
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Correo
					</font>
				  <div class="wrap-input100 validate-input m-b-10" data-validate = "Correo es requerido">
					  <input class="input100" type="correo" required="" name="correo" placeholder="Correo" id="corr">
					  <span class="focus-input100"></span>
					  <span class="symbol-input100">
						  <i class="fa fa-lock"></i>
					  </span>
				  </div>


					<font class="text-center w-full p-t-1 p-b-30" color="White" face="Comic Sans MS,arial,verdana" size="5">¡Revise bien los Campos antes de Registrar!
 					 </font>

					<div class="container-login100-form-btn p-t-10">
					
						<input class="login100-form-btn" class="input100" type="submit" value="Registrar">
					</div>

					<div class="container-login100-form-btn p-t-10">
					<a href="<?php echo route('menu') ?>" class="login100-form-btn">Regresar al Menu
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
		$('div.alert').not('.alert-important').delay(4000).slideUp(400);

	</script>

</body>
</html>