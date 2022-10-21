<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrar </title>
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
			<div class="wrap-login100 p-t-40 p-b-5">



				<form action="/guardar" method="POST" class="login100-form validate-form" id="contactForm">
					{{ csrf_field() }}

	

					
					<div class="login100-form-avatar">
						<img src="plogin/images/proyecto-1.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-10 p-b-5">
						REGISTRO DE PROYECTO
					</span>
					
						<font class="text-center w-full p-t-1 p-b-30" color="Blue" face="Comic Sans MS,arial,verdana" size="5">¡Es necesario llenar todos los campos con los datos solicitados!
 					 </font>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Nombre del proyecto
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido">
						<input value="{{ old('nombre') }}" required="" class="input100" type="text" name="nombre" placeholder="Nombre-Proyecto" id="proyecto">
						<span class="focus-input100"></span>
						<!--span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span-->
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Cantidad de Alumnos a Inscribirse
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Cantidad de Alumnos es Requerido">
						<input value="{{ old('cantidad') }}" required="" class="input100" type="number" min="1" name="cantidad" placeholder="Cantidad-MaxAlumnos" id="cantidad">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class=""></i>
						</span>
					</div>
        
                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4"> Departamento al que Pertenece la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Departamento is required">
					
						<select required="" name="departamento" id="inputCategoria_id" class="input100">

							
							<option value="">Seleccione un Departamento</option>
							<option value="Departamento de Sistemas">Departamento de Sistemas</option>
							<option  value="Departamento de Mecanica">Departamento de Mecanica</option>
							<option  value="Departamento de Industrial">Departamento de Industrial</option>
							<option  value="Departamento de Bioquimica">Departamento de Bioquimica</option>
							<option  value="Departamento de Quimica">Departamento de Quimica</option>
							<option  value="Departamento de Gestion Empresarial">Departamento de Gestion Empresarial</option>
							<option  value="Departamento de Logistica">Departamento de Logistica</option>
							<option  value="Departamento de Electrica">Departamento de Electrica</option>
							<option  value="Departamento de Electronica">Departamento de Electronica</option>
							<option  value="Departamento de Extraescolares">Departamento de Extraescolares</option>
							<option  value="Departamento de Gestion Tecnologica">Departamento de Gestion Tecnologica </option>
							<option  value="Departamento de Desarrollo Academico">Departamento de Desarrollo Academico </option>
							
						</select>
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Tipo de Acom
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Credito de la Actividad es requerido">
						@if ((Auth::user()->departamento == "DepartamentodeSistemas"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias"> Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option value="Acom7:Programas en Apoyo a la Formacion Profesional"> Acom 7: Programas en apoyo a la Formacion Profesional</option>
							
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeMecanica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeLogistica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeElectrica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeElectronica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeGestionEmpresarial"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeIndustrial"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeBioquimica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeQuimica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeExtraescolares"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeGestionTecnologica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeDesarrolloAcademico"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
						</select>
						@endif
						

					</div>

					<font class="text-center w-full"color="Black" face="Comic Sans MS,arial,verdana" size="4"> Cantidad de Creditos
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Credito de la Actividad es requerido">
						<select required="" name="credito" class="input100">
							<option value="">Seleccione la Cantidad de Creditos</option>
							<option value="1">1</option>
							<option value="0.5">0.5</option>

						</select>
					</div>


					
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Codigo del Proyecto
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Codigo del Proyecto es Requerido">
						<input required="" class="input100" type="integer" name="codigo" placeholder="Codigo del proyecto" id="codigo">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class=""></i>
						</span>
					</div>


					<font class="text-center w-full"color="Black" face="Comic Sans MS,arial,verdana" size="4">Fecha de Inicio de la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "fecha is required">
						<input value="{{ old('inicio') }}"required="" name="inicio" class="input100" placeholder="Selecione la fecha" type="date">
					</div>
					
					<font class="text-center w-full"color="Black" face="Comic Sans MS,arial,verdana" size="4">Fecha de Finalizacion de la Actividad
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "fecha is required">
						<input value="{{ old('final') }}"required="" name="final" class="input100" placeholder="Selecione la fecha" type="date">
					</div>

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Descripcion del Proyecto
 					 </font>

					<textarea required=""  name="descrip" rows="10" cols="45" placeholder="Descripción de la actividad para que el alumno sepa de que trata" style="border-radius: 15px;"></textarea>
				
					<font class="text-center w-full p-t-1 p-b-30" color="White" face="Comic Sans MS,arial,verdana" size="5">¡Revise bien los Campos antes de Registrar!
 					 </font>

					<div class="container-login100-form-btn p-t-5">
					<!--a href="<?php echo route('menu') ?>" class="login100-form-btn">Crear Proyecto
						<button></button></a>
						<button type="submit" class="login100-form-btn">Iniciar</button-->
							<input class="login100-form-btn" class="input100" type="submit" value="Registrar">
					</div>

					<div class="container-login100-form-btn p-t-5">
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
	<script>
    $('#flash-overlay-modal').modal();
</script>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<script>
		$('div.alert').not('.alert-important').delay(4000).slideUp(600);

	</script>

</body>
</html>