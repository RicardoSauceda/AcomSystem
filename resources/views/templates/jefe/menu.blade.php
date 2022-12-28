 <!DOCTYPE html>
<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>Menu Jefe</title>
		<link href="pmenu/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="pmenu/iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="pmenu/prefix-free.js"></script>
	</head>

<body>
	<h2 style="font-size: 60px; margin-left: 120px; margin-top: 120px; margin: center;">Bienvenido {{Auth::user()->nombre}} </h2>
	<div class="wrap">

	<img src="pprincipal/img/txg-m.jpg" style="width:200px; height:170px; top: 60px; position: absolute;top: 400px; left: 580px;">

	<nav style="background: #2F6895;">
		<ul class="menu">
			<!--li><a href="#"><span class="iconic home"></span> Inicio</a></li-->
			<li><a style="color: white;" href="#"><span class="iconic plus-alt"></span> Registrar</a>
				<ul>
					<li><a style="color: black;" href="<?php echo route('regproy') ?>">Proyecto</a></li>
					<li><a style="color: black;" href="<?php echo route('regprof') ?>">Profesor</a></li>
				</ul>
			</li>
			<li><a style="color: white;" href="#"><span class="iconic magnifying-glass"></span>Gestionar</a>
				<ul>
					<li><a style="color: black;" href="<?php echo route('proyectos') ?>">Proyectos</a></li>
					<li><a style="color: black;" href="<?php echo route('buscar') ?>">Profesores</a></li>
					
				</ul>
			</li>
			<li><a style="color: white;" href="<?php echo route('autorizar') ?>"><span class="iconic document"></span>Autorizar actividades</a></li>
			<!--<li><a style="color: white;" href="<?php //echo route('liberarJ') ?>"><span class="iconic document"></span> Liberar Alumnos</a></li>-->
			<!-- <li><a style="color: white;" href="#"><span class="iconic calendar"></span></span> Estadísticas</a>
				<ul>
					<li><a style="color: black;" href="<?php echo route('pastel') ?>">Por Proyectos</a></li>
				
					<li><a style="color: black;" href="<?php echo route('ruta') ?>">Proyectos creados por Mes</a></li>
					
				</ul>

			</li> -->
			<!--<li><a style="color: white;" href="<?php //echo route('aprobadosJ') ?>"><span class="iconic user"></span>Listar Liberados</a>-->
				
			</li>
			<li><a style="color: white;" href="<?php echo route('liberarJ') ?>"><span class="iconic document"></span> Liberar Alumnos</a></li>
			<li><a style="color: white;" href="#"><span class="iconic calendar"></span></span> Estadísticas</a>
				<ul>
					<li><a style="color: black;" href="<?php echo route('pastel') ?>">Por Proyectos</a></li>
				
					<li><a style="color: black;" href="<?php echo route('ruta') ?>">Proyectos creados por Mes</a></li>
					
				</ul>

			</li>
			<li><a style="color: white;" href="<?php echo route('aprobadosJ') ?>"><span class="iconic user"></span>Listar Liberados</a>
				
			</li>
			<li><a style="color: white;" href="<?php echo route('config') ?>"><span class="iconic info"></span> Configuración</a></li>
			<li><a style="color: white;" href="<?php echo route('msg') ?>"><span class="iconic chat"></span>Mensajes</a></li>
			<li><a style="color: white;" href="<?php echo route('salir') ?>"><span class="iconic exit-fullscreen"></span>Cerrar Sesion</a></li>
			
		</ul>
		<div class="clearfix"></div>
	</nav>

	
	</div>

	<style type="text/css">
		.wrap {
			width: 1210px;
			margin: 4em auto;
		}
	</style>
</body>

</html>