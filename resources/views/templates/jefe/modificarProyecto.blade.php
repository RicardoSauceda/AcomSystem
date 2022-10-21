<!DOCTYPE html>
<html lang="en">
<head>
	<title>Configuración Proyecto</title>
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
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			<div class="wrap-login100 p-t-5 p-b-5">

			<form id="contactform" action="{{ route('nuevo',[$proyecto]) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				
						{{csrf_field ()}}	
					

					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Nombre del proyecto
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Nombre de Proyecto es requerido">
						<input value="{{ $proyecto->nombre }}" required="" value="{{ old('nombre') }}" class="input100" type="text" name="nombre"  id="nombre">
						<span class="focus-input100"></span>
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

							
							<option value="">{{$proyecto->departamento}}</option>
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
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Tipo de Acom es requerido">
						@if ((Auth::user()->departamento == "DepartamentodeSistemas"))
						<select required="" name="tipo" class="input100">
							<option value="">{{$proyecto->tipo}}</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo a la Formacion Profesional">Acom 7: Programas en Apoyo a la Formacion Profesional</option>
							
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeMecanica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeLogistica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeElectrica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeElectronica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeGestionEmpresarial"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeIndustrial"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeBioquimica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
						</select>
						@endif

						@if ((Auth::user()->departamento == "DepartamentodeQuimica"))
						<select required="" name="tipo" class="input100">
							<option value="">Seleccione un Tipo de Acom</option>
							<option value="Acom1:Tutorias">Acom 1: Tutorias</option>
							<option value="Acom2:Proyectos de Investigacion">Acom 2: Proyectos de Investigación</option>
							<option value="Acom3:Eventos Academicos"> Acom 3: Eventos Academicos</option>
							<option  value="Acom4:Actividades Extraescolares">Acom 4: Actividades Extraescolares</option>
							<option  value="Acom5:Construccion de Prototipos">Acom 5: Construcción de Prototipos y Desarrollo Tecnologico</option>
							<option value="Acom6:Participacion en Ediciones">Acom 6: Participacion en Ediciones</option>
							<option  value="Acom7:Programas en Apoyo">Acom 7: Programas en Apoyo a la Formación Profesional</option>
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
					<font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">Creditos
 					 </font>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Credito de la Actividad es requerido">
						<select required="" name="credito" class="input100">
							<option value="">{{$proyecto->credito}}</option>
							<option value="1">1</option>
							<option value="0.5">0.5</option>

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
							<textarea rows="4", cols="54" id="descrip" required=""  name="descrip" style="resize:none, ">{{$proyecto->descrip}}</textarea>

						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn p-t-10">
					<button>Guardar Cambios</button>
					</div>
					
					<div class="container-login100-form-btn p-t-5">
					<a href="<?php echo route('menu') ?>">Regresar al Menu
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