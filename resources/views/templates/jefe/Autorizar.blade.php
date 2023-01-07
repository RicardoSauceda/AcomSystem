<!DOCTYPE html>
<html lang="en">

<head>
    <title>Autorizar Proyectos</title>
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
    <link href="pmenu/stylemenu.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="pmenu/iconic.css" media="screen" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table-fixed th {

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
    </style>
</head>

<body>
    <nav style="background: #2F6895; position: fixed; width: 100%;">
        <ul class="menu" style=" height: 40px; display: flex; justify-content: center;">



            <li style="position: absolute;left: 20px;"><a style="color: white;" href="<?php echo route('menu'); ?>"><span
                        class="iconic arrow-left"></span> Regresar</a></li>
            <br><br>

            <li style="color: white; position: absolute; top: 15px;"><span
                    class="iconic user"></span>{{ Auth::user()->nombre }}
            </li>

            <li style="position: absolute; right: 20px;"><a style="color: white;" href="<?php echo route('salir'); ?>"><span
                        class="iconic exit-fullscreen"></span>Cerrar Sesion</a></li>

        </ul>
        <div class="clearfix"></div>
    </nav>


    <div style="height: 50px"></div>
    @if (Session::has('flash_messages'))

        <div class="alert alert-danger {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
            @if (Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{ session('flash_messages') }}


        </div>

    @endif


    @if (Session::has('flash_message'))

        <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
            @if (Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{ session('flash_message') }}


        </div>

    @endif

    <div style="height: 15px"></div>

    <div class="container">



        <table class="table table-striped table-bordered table-hover table-condensed table-fixed">

            <thead>
                <tr>
                    <th>Nombre de la Actividad</th>
                    <th>Codigo </th>
                    <th>Tipo de Acom</th>
                    <th>Departamento al que pertenece</th>
                    <th>Encargado de la Actividad</th>
                    <th>Descripcion</th>
                    <th>Fecha de inicio de la Actividad</th>
                    <th>Fecha de finalizacion de la Actividad</th>
                    <th>Autorizar</th>
                    <th>Rechazar</th>
                </tr>
            </thead>

            @foreach ($proyectos2 as $proyecto)
                <tbody>

                    <tr>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->codigo }}</td>
                        <td>{{ $proyecto->tipo }}</td>
                        <td>{{ $proyecto->departamento }}</td>
                        <td>{{ $proyecto->autor }}</td>
                        <td>{{ $proyecto->descrip }}</td>
                        <td>{{ $proyecto->fecha }}</td>
                        <td>{{ $proyecto->fin }}</td>
						
                        <!--<form action="{{ route('AutorizarP', [$proyecto->id]) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">-->
                        {{ csrf_field() }}
                    
                        <td>
                            <a href="{{ route('AutorizarP', [$proyecto->id]) }}" class="btn btn-success"> AUTORIZAR</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('NoAutorizarP', [$proyecto->id]) }}"
                                onclick="return confirm('¿Estas seguro que deceas Rechazar la Actividad?')">RECHAZAR</a>
                        </td>
                    </tr>
                </tbody>

            @endforeach
        
        </table>

        {{ $proyectos2->appends(Request::all())->render() }}
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>

</body>

</html>
