<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consulta Proyectos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <link href="/pmenu/style2.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="/pmenu/iconic2.css" media="screen" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table-fixed tbody {
            overflow-x: auto;
            width: 100%;
        }

        .table-fixed thead,
        .table-fixed tbody,
        .table-fixed td,
        .table-fixed th {
            display: block;
        }

        .table-fixed tbody td,
        .table-fixed thead>tr>th {
            float: left;
            border-bottom-width: 0;
        }

        .table-fixed th {
            display: flex;
            justify-content: center;
            background-color: #f1f1f6;

        }

        .table-fixed td {
            background-color: white;

        }

        .table-fixed tr:hover {
            background-color: #f1f1f6;

        }

        .table-fixed tr:hover td {
            background-color: transparent;

        }

        .estatus1 {
            width: 80px;
            height: 45px;
        }

        .nombre1 {
            width: 180px;
            height: 45px;
        }

        .acom1 {
            width: 200px;
            height: 45px;
        }

        .codigo1 {
            width: 70px;
            height: 45px;
        }

        .departamento1 {
            width: 188px;
            height: 45px;
        }

        .descrip1 {
            width: 200px;
            height: 45px;
        }

        .inicio1 {
            width: 100px;
            height: 45px;
        }

        .fin1 {
            width: 100px;
            height: 45px;
        }

        .modificar1 {
            width: 100px;
            height: 45px;
        }

        .eliminar1 {
            width: 100px;
            height: 45px;
        }

        .modificar3 {
            width: 91px;
            height: 45px;
        }

        .eliminar3 {
            width: 109px;
            height: 45px;
        }

        .estatus {
            width: 80px;
            height: 65px;
        }

        .nombre {
            width: 180px;
            height: 65px;
            text-align: center;
            overflow-y: auto;
        }

        .acom {
            width: 200px;
            height: 65px;
            overflow-y: auto;
        }

        .codigo {
            width: 70px;
            height: 65px;
        }

        .departamento {
            width: 188px;
            height: 65px;
            overflow-y: auto;
        }

        .descrip {
            width: 200px;
            height: 65px;
            overflow-y: auto;
        }

        .inicio {
            width: 100px;
            height: 65px;
            overflow-y: auto;
        }

        .fin {
            width: 100px;
            height: 65px;
            overflow-y: auto;
        }

        .modificar {
            width: 100px;
            height: 65px;
        }

        .eliminar {
            width: 100px;
            height: 65px;
        }

        .modificar2 {
            width: 91px;
            height: 65px;
        }

        .eliminar2 {
            width: 91px;
            height: 65px;
        }

        .centrar {
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
        }
    </style>

</head>

<body>
    <nav style="background: #2F6895; position: fixed; width: 100%;">
        <ul class="menu" style=" height: 40px; display: flex; justify-content: center;">


            <li style="position: absolute; left: 20px;"><a style="color: white;" href="<?php echo route('menuProfesor'); ?>"><span
                        class="iconic arrow-left"></span> Regresar</a></li>
            <br><br>

            <li style="color: white; position: absolute; top: 15px; left: 42.5%;"><span
                    class="iconic user"></span>{{ Auth::user()->nombre }}
            </li>

            <li style="position: absolute; right: 20px;"><a style="color: white;" href="<?php echo route('salir'); ?>"><span
                        class="iconic exit-fullscreen"></span>Cerrar Sesion</a></li>

        </ul>
        <div class="clearfix"></div>
    </nav>

    <div style="height: 65px"></div>

    <div class="container" style="width: 1350px;">

        <table class="table table-striped table-bordered table-hover table-condensed table-fixed">
            <thead>
                <tr>
                    <th class="estatus1">Estatus</th>
                    <th class="nombre1">Nombre de la Actividad</th>
                    <th class="acom1">Tipo de Acom</th>
                    <th class="codigo1">Codigo </th>
                    <th class="departamento1">Departamento</th>

                    <th class="descrip1">Descripcion de la Actividad</th>
                    <th class="inicio1">Periodo Escolar</th>
                    <th class="fin1">Fechas de actividad</th>
                    @if ($numero > 7)
                        <th class="modificar3">Modificar</th>
                        <th class="eliminar3">Eliminar</th>
                    @endif
                    @if ($numero <= 7)
                        <th class="modificar1">Modificar</th>
                        <th class="eliminar1">Eliminar</th>
                    @endif
                </tr>
            </thead>

            @if ($numero > 7)
                <tbody style="cursor: pointer; height: 456px;">
            @endif
            @if ($numero == 7)
                <tbody style="cursor: pointer; height: 455px;">
            @endif
            @if ($numero == 6)
                <tbody style="cursor: pointer; height: 390px;">
            @endif
            @if ($numero == 5)
                <tbody style="cursor: pointer; height: 325px;">
            @endif
            @if ($numero == 4)
                <tbody style="cursor: pointer; height: 260px;">
            @endif
            @if ($numero == 3)
                <tbody style="cursor: pointer; height: 195px;">
            @endif
            @if ($numero == 2)
                <tbody style="cursor: pointer; height: 130px;">
            @endif
            @if ($numero == 1)
                <tbody style="cursor: pointer; height: 65px;">
            @endif
            @if ($numero == 0)
                <tbody style="cursor: pointer; height: 1px;">
            @endif

            @foreach ($proyectos as $proyecto)
                <tr>
                    @if ($proyecto->autorizacion == 0)
                        <td class="estatus" style="background-color: #c6f1d6;">
                            <div class="centrar"> Pendiente </div>
                        </td>
                    @endif
                    @if ($proyecto->autorizacion == 2)
                        <td class="estatus" style="background-color: #ff8080;">
                            <div class="centrar"> Rechazado</div>
                        </td>
                    @endif

                    <td class="nombre">
                        <div>{{ $proyecto->nombre }}</div>
                    </td>
                    <td class="acom">
                        <div class="centrar">{{ $proyecto->tipo }}</div>
                    </td>
                    <td class="codigo">
                        <div class="centrar">{{ $proyecto->codigo }}</div>
                    </td>
                    <td class="departamento">
                        <div class="centrar">{{ $proyecto->nombre_depa }}</div>
                    </td>
                    <!--<td>{{ $proyecto->autor }}</td>-->
                    <td class="descrip">
                        <div class="">{{ $proyecto->descrip }}</div>
                    </td>
                    @if ($proyecto->periodo == 1)
                        <td class="inicio">
                            <div class="centrar"></div>Enero-Junio de {{ $proyecto->año }}
                        </td>
                    @else
                        <td class="inicio">
                            <div class="centrar"></div>Agosto-Diciembre de {{ $proyecto->año }}
                        </td>
                    @endif

                    <td class="fin">
                        <div>Inicio:<br>{{ $proyecto->fecha }}<br>Fin:<br>{{ $proyecto->fin }}</div>
                    </td>
                    @if ($numero > 7)
                        <td class="modificar2"><a class="btn btn-info centrar"
                                href="{{ route('proycambio2', [$proyecto->id]) }}">Modificar</a></td>
                        <td class="eliminar2"><a class="btn btn-danger centrar"
                                href="{{ route('proyEliminar', [$proyecto->id]) }}"
                                onclick="return confirm('¿Estas seguro que deceas eliminar este proyecto?')">Eliminar</a>
                        </td>
                    @endif
                    @if ($numero <= 7)
                        <td class="modificar"><a class="btn btn-info centrar"
                                href="{{ route('proycambio2', [$proyecto->id]) }}">Modificar</a></td>
                        <td class="eliminar"><a class="btn btn-danger centrar"
                                href="{{ route('proyEliminar', [$proyecto->id]) }}"
                                onclick="return confirm('¿Estas seguro que deceas eliminar este proyecto?')">Eliminar</a>
                        </td>
                    @endif

                </tr>
            @endforeach
            </tbody>


        </table>
        
        {{ $proyectos->appends(Request::all())->render() }}


    </div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
