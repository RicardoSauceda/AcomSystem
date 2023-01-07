<!DOCTYPE html>
<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>Menu Invitado</title>
		<link href="pmenu/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="pmenu/iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="pmenu/prefix-free.js"></script>
	</head>

<body>
			<h2 style="font-size: 60px; margin-left: 410px; margin-top: 150px;">Bienvenido Invitado</h2>
	<div class="wrap">

	<img src="pprincipal/img/txg-m.jpg" style="width:200px; height:160px; top: 60px; position: absolute;top: 360px; left: 580px;">
	
	<nav style="background: #2F6895; ">
		<ul class="menu">
			<!--li><a href="#"><span class="iconic home"></span> Inicio</a></li-->
			<li><a style="color: white;" href="<?php echo route('lineamientos') ?>"><span class="iconic plus-alt"></span>Lineamientos</a>
			</li>
			<li><a style="color: white;" href="<?php echo route('tipos') ?>"><span class="iconic magnifying-glass"></span>Tipos de Acom</a>
			</li>
			<li><a style="color: white;" href="<?php echo route('Acom') ?>"><span class="iconic document"></span>Que es un Acom</a></li>
			<li><a style="color: white;" href="https://drive.google.com/file/d/1cLGc2MPb5KjEcdADWPeb2g6oK_Pj-kFO/view?usp=sharing"><span class="iconic phone"></span>Descargar App</a></li>

			<li><a style="color: white;" href="<?php echo route('salir') ?>"><span class="iconic exit-fullscreen"></span> Salir</a></li>
		</ul>
		<div class="clearfix"></div>
	</nav>
	</div>

	<style type="text/css">
		.wrap {
			width: 820px;
			margin: 5em auto;
		}
	</style>
</body>

</html>