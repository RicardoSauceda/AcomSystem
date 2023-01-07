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

			<form id="contactform" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				
						{{csrf_field ()}}	
					

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Nombre de la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido">
						<input value="" required="" value="{{ old('nombre') }}" class="input100" type="text" name="nombre"  id="nombre">
						<span class="focus-input100"></span>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Rol del encargado de la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre del rol es requerido">
						<input value="" required="" class="input100" type="text" name="rol" placeholder="Nombre-Rol-Encargado" id="rolEncargado">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>


					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Cantidad de Alumnos a Inscribirse
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Cantidad de alumnos es requerido">

						<input type="number" min="1" required="" value="" value="{{ old('cantidad') }}" class="input100" name="cantidad"  id="cantidad">
						<span class="focus-input100"></span>
					</div>
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4"> Departamento al que Pertenece la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Departamento is required">
					
						<select required="" name="departamento" id="inputCategoria_id" class="input100">

							<option value="">Seleccione un Departamento</option>
							
							
							-->
						</select>
					</div>		

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Tipo de Acom
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Tipo de Acom es requerido">
					
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom-1: Tutorias">Acom 1: Tutorias</option>
							<option value="Acom-2: Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom-3: Eventos Academicos Relacionados con la Carrera"> Acom 3: Eventos Academicos Relacionados con la Carrera</option>
							<option  value="Acom-4: Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom-5: Construccion de Prototipos y Desarrollo Tecnologico">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom-6: Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom-7: Programas en Apoyo a la Formación Profesional">Acom 7: Programas en Apoyo a la Formación Profesional</option>
							
						</select>
		
					</div>				

					</div>
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Creditos
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Credito de la Actividad es requerido" style="width: 385px;">
						<select required="" name="credito" class="input100">
							<option value="">Seleccione</option>
							<option value="1">1</option>
							<option value="0.5">0.5</option>

						</select>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Fecha de Inicio del Proyecto
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido" style="width: 385px;">

						<input type="date" value="" required="" value="{{ old('inicio') }}" class="input100" name="inicio"  id="inicio">
						<span class="focus-input100"></span>
					</div>
					
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Fecha de Finalizacion del Proyecto
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido" style="width: 385px;">

						<input type="date" value="" required="" value="{{ old('fin') }}" class="input100" name="fin"  id="fin">
						<span class="focus-input100"></span>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Descripción
 					 </font>
 					<div class="container-login100-form-btn p-t-10" style="width: 100%;">
					<textarea required=""  name="descrip" rows="10" cols="45" placeholder="Descripción de la actividad para que el alumno sepa de que trata" style="width: 385px; border-radius: 15px; padding: 5px;"></textarea>
					</div>
					

					<div class="container-login100-form-btn p-t-10" style="width: 100%;">
					<button style="width: 385px;" class="login100-form-btn">Guardar Cambios</button>
						<button></button></a>
						<!--button type="submit" class="login100-form-btn">Iniciar</button-->
					</div>
					
					<div class="container-login100-form-btn p-t-5" style="width: 100%;">
					<a style="width: 385px;" href="<?php echo route('menuProfesor') ?>" class="login100-form-btn">Regresar al Menu
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
</html>ss