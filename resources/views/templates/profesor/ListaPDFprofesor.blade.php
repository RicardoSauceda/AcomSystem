<!DOCTYPE html>
<html lang="en">
<head>
    <title>Consulta Solicitudes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
</head>
<body>

    <div class="container">
        @if (Session::has('flash_message'))

                    <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
                        @if(Session::has('flash_message_important'))
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @endif
                        {{ session('flash_message')}}
                    

                    </div>

                    @endif
        
        <!--<img src="pprincipal/img/txg-m.jpg" style="width:100px; height:100px; position: absolute; left: 620px;">-->

        <h2>Alumnos Aceptados al Proyecto de {{$dato->nombre}} de {{Auth::user()->nombre}}</h2>
                            
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
              <tr>
               
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>No. de Control</th>

                
              

               
              </tr>
            </thead>

            @foreach ($lista as $listado) 



            <tbody>
                <tr>
                    
                    <td>{{$listado->apellidos}}</td>
                    <td>{{$listado->alumno}}</td>
                    <td>{{$listado->carrera}}</td>
                    <td>{{$listado->numControl}}</td>

                   
              

                </tr>
            </tbody>

            @endforeach
          </table>
          <!--<p>Esto es una prueba para verificar si desde aqui se genera el pdf para listar los alumnos registrados a un proyecto. cabe destacar que solo son pruebas</p>
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

</body>
</html>