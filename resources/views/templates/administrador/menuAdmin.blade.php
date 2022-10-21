<!DOCTYPE html>
<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>Menu Admin</title>
		<link href="pmenu/style.css" media="screen" rel="stylesheet" type="text/css"  />
		<link href="pmenu/iconic.css" media="screen" rel="stylesheet" type="text/css"  />
		<script src="pmenu/prefix-free.js"></script>
	</head>

<body>
	<h2 style="font-size: 60px; margin-left: 340px; margin-top: 150px;">Bienvenido {{Auth::user()->categoria}} </h2>
	<div class="wrap">
	<img src="pprincipal/img/txg-m.jpg" style="width:200px; height:160px; top: 60px; position: absolute;top: 360px; left: 580px;">
	
	
	<nav style="background: #2F6895;">
		<ul class="menu">
			<!--li><a href="#"><span class="iconic home"></span> Inicio</a></li-->
			<li><a style="color: white;" href="#"><span class="iconic plus-alt"></span> Registrar</a>
				<ul>
					<li><a style="color: black;" href="<?php echo route('regjefe') ?>">Un JEFE</a></li>
				</ul>
			</li>
			<li><a style="color: white;" href="#"><span class="iconic magnifying-glass"></span>Gestionar</a>
				<ul>
					<li><a style="color: black;" href="<?php echo route('busqueda') ?>">Jefes Registrados</a></li>
				</ul>
			</li>
			<li><a style="color: white;" href="<?php echo route('Configuracion') ?>"><span class="iconic cog-alt"></span> Configuración</a></li>
			<li><a style="color: white;" href="<?php echo route('salir') ?>"><span class="iconic exit-fullscreen"></span> Salir</a></li>
		</ul>
		<div class="clearfix"></div>
	</nav>
	</div>

	<style type="text/css">
		.wrap {
			width: 560px;
			margin: 5em auto;
			

		}
	</style>

</body>



</html>