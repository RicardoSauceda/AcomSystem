<!DOCTYPE html>
<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>Menu Profesor</title>
		<link href="pmenu/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="pmenu/iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="pmenu/prefix-free.js"></script>
	</head>

<body>
<h2 style="font-size: 60px; margin-left: 140px; margin-top: 140px;">Bienvenido {{Auth::user()->nombre}} </h2>

	<div class="wrap">
		<img src="pprincipal/img/txg-m.jpg" style="width:180px; height:160px; top: 80px; position: absolute;top: 380px; left: 620px;">
		
	<nav style="background: #2F6895;">
		<ul class="menu">
			<!--li><a href="#"><span class="iconic home"></span> Inicio</a></li-->

			<li><a style="color: white;" href="#"><span class="iconic plus-alt"></span> Registrar</a>
				<ul>
					<li><a href="<?php echo route ('repro') ?>">Actividad</a></li>
				</ul>
			</li>
			<li><a style="color: white;" href="#"><span class="iconic magnifying-glass"></span>Gestionar</a>
				<ul>
					<li><a href="<?php echo route('proyecto') ?>">Actividades</a></li>
					
			
				</ul>
			</li>
			<!--<li><a style="color: white;" href="<?php echo route('liberarP') ?>"><span class="iconic document"></span> Liberar Alumnos</a></li>-->


			<li><a style="color: white;" href="<?php echo route('aprobadosProf') ?>"><span class="iconic user"></span> Listar Liberados</a>
				<ul>
					
				
				</ul>
			</li>
			<li><a style="color: white;" href="<?php echo route('configurar') ?>"><span class="iconic info"></span> Configuración</a></li>
			<li><a style="color: white;" href="<?php echo route('mensg') ?>"><span class="iconic chat"></span>Mensajes</a></li>
			<li><a style="color: white;" href="<?php echo route('salir') ?>"><span class="iconic exit-fullscreen"></span>Cerrar Sesion</a></li>
		</ul>
		<div class="clearfix"></div>
	</nav>
	</div>

	<style type="text/css">
	.wrap {
		width: 900px;
		margin: 4em auto;
    }
	</style>

</body>

</html>



