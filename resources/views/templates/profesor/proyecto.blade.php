<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="plogin/images/icons/favicon.ico" />
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
    @if ($errors->any())
        <div style="margin-bottom: 0px;" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (Session::has('flash_message'))

        <div style="margin-bottom: 0px;"
            class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
            @if (Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="limiter">

        <div class="container-login100" style="background-image: url('plogin/images/img-01.jpg');">
            <div class="wrap-login100 p-t-40 p-b-5">

                <form action="/guardar" method="POST" class="login100-form validate-form" id="contactForm">
                    {{ csrf_field() }}

                    <div class="login100-form-avatar">
                        <img src="plogin/images/proyecto-1.png" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-10 p-b-5">
                        REGISTRO DE LA ACTIVIDAD
                    </span>

                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">
                        Nombre de la actividad
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Nombre de Actividad es requerido">
                        <input value="{{ old('nombre') }}" required="" class="input100" type="text" name="nombre"
                            placeholder="Nombre-Actividad" id="proyecto">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">
                        Rol del encargado de la Actividad
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Nombre del rol es requerido">
                        <input value="{{ old('rol') }}" required="" class="input100" type="text" name="rol"
                            placeholder="Nombre-Rol-Encargado" id="rolEncargado">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">
                        Cantidad de Alumnos
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Cantidad de Alumnos es Requerido">
                        <input value="{{ old('cantidad') }}" required="" class="input100" type="number"
                            min="1" name="cantidad" placeholder="Cantidad-MaxAlumnos" id="cantidad">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana" size="4">
                        Departamento al que Pertenece la Actividad
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Departamento is required">

                        <select required="" name="departamento" id="inputCategoria_id" class="input100">

                            <option value="">Seleccione un Departamento</option>
                            @foreach ($depa as $dep)
                                <option value="{{ $dep->id_depat }}">{{ $dep->nombre_depa }}</option>
                            @endforeach



                        </select>
                    </div>

                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana"
                        size="4">Tipo de Acom
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Tipo de Acom es requerido">

                        <meta name="csrf-token" content="{{ csrf_token() }}">

                        <select required="" name="tipo" class="input100" id="tipo">
                            <option value="">Seleccione el tipo de acom</option>
                            @foreach ($tipo as $tip)
                                <option value="{{ $tip->id_tipo }}">{{ $tip->ntipo }}</option>
                            @endforeach
                        </select>
						
                    </div>

                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana"
                        size="4">Subtipo de Acom
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Tipo de Acom es requerido">

                        <select required="" name="sub" class="input100" id="subtipo">
                            <option value="">Seleccione el subtipo de acom</option>


                        </select>
                    </div>




                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana"
                        size="4">Codigo de la actividad
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Codigo de la Actividad Requerida">
                        <input required="" class="input100" type="integer" maxlength="20" name="codigo"
                            placeholder="Codigo de la Actividad" id="codigo">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class=""></i>
                        </span>
                    </div>




                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana"
                        size="4">Periodo escolar
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Periodo escolar es requerido">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <select required="" name="periodo" class="input100" id="periodo">
                            <option value="">Seleccione el tperiodo escolar</option>
                            <option value="1">Enero-Junio</option>
                            <option value="2">Agosto-Diciembre</option>
                        </select>
                    </div>

                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana"
                        size="4">A??o del periodo
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="A??o del periodo es requerido">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <select required="" name="year" class="input100" id="year">
                            <option value="">Seleccione un a??o</option>
                            @foreach ($array as $a)
                                <option value="{{ $inicio }}">{{ $inicio }}</option>
                                <?php
                                $inicio++;
                                ?>
                            @endforeach

                        </select>
                    </div>




                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana"
                        size="4">Fecha de inicio de la Actividad
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="fecha is required">
                        <input value="{{ old('inicio') }}" required="" name="inicio" class="input100"
                            placeholder="Selecione la fecha" type="date">
                    </div>

                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana"
                        size="4">Fecha de finalizacion de la actividad
                    </font>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="fecha is required">
                        <input value="{{ old('final') }}" required="" name="final" class="input100"
                            placeholder="Selecione la fecha" type="date">
                    </div>


                    <font class="text-center w-full" color="Black" face="Comic Sans MS,arial,verdana"
                        size="4">Descripci??n
                    </font>
                    <textarea required="" name="descrip" rows="10" cols="45"
                        placeholder="Descripci??n de la actividad para que el alumno sepa de que trata"
                        style="border-radius: 15px; padding: 5px;"></textarea>



                    <font class="text-center w-full p-t-1 p-b-30" color="White" face="Comic Sans MS,arial,verdana"
                        size="5">??Revise bien los Campos antes de Registrar!
                    </font>
                    <div class="container-login100-form-btn p-t-5">
                        <!--a href="<?php echo route('menu'); ?>" class="login100-form-btn">Crear Proyecto
      <button></button></a>
      <button type="submit" class="login100-form-btn">Iniciar</button-->
                        <input class="login100-form-btn" class="input100" type="submit" value="Registrar">
                    </div>

                    <div class="container-login100-form-btn p-t-5">
                        <a href="<?php echo route('menuProfesor'); ?>" class="login100-form-btn">Regresar al Menu
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
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);

        $('#tipo').change(function() {
            var tipo = $('select[name="tipo"]').val();
            // alert(tipo);
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/subtipo',
                datatype: 'json',
                data: {
                    tipo: tipo
                },
                success: function(data) {
                    $('#subtipo').empty()
                        .append('<option value="">Seleccione el subtipo de acom</option>');
                    $.each(data, function(key, value) {
                        $('#subtipo').append($('<option></option>')
                            .attr('value', value.id_sub)
                            .text(value.Credito + '-' + value.nombre_subtipo));
                    });
                },
                error: function(error) {

                }
            });
        })
    </script>


</body>

</html>
