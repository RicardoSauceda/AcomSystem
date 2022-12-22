<html>

<head>
    <title>Bienvenido</title>
    <!--link rel="stylesheet" type="text/css" href="style.css"-->
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,300,700" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/1.4.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />



    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="plogin/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="plogin/css/util.css">
    <link rel="stylesheet" type="text/css" href="plogin/css/main.css">
    <!--===============================================================================================-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @if (Session::has('flash_message'))
        <div class="alert alert-danger {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
            @if (Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{ session('flash_message') }}


        </div>
    @endif

    <body class="bg-gray-200 min-h-screen relative">

        <div class="min-h-screen w-auto bg-gray-200 flex flex-col">
            <div
                class="flex justify-around items-center bg-gray-800 text-white font-bold py-10 text-2xl text-center w-full h-44">
                <img src="{{ asset('img/tecnmLogo.png') }}" class="h-28 w-auto">
                <div class="grid justify-items-center border w-auto">
                    <a class="font-semibold text-4xl"> BIENVENIDO </a>
                    <a class="font-semibold text-4xl"> Inicie sesión </a>
                </div>
                <img src="{{ asset('img/ittgLogo.png') }}" class="h-28 w-28">
            </div>

            <div
                class="grid grid-cols sm:grid-cols md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 2xl:grid-col-2 bg-white drop-shadow-2xl gap-20 rounded-md
                    h-full w-auto
                    p-10 m-20">

                <a href="<?php echo route('loginAdmin'); ?>"
                    class="flex flex-col items-center bg-gray-800 hover:bg-blue-800 rounded-2xl drop-shadow-2xl
                    h-full md:h-full">

                    <div class="grid grid-col gap-20 py-48 h-56 w-auto justify-items-center border">
                        <img alt="user_img" src="img/usuario.png" class="h-36 w-36 mt-10">
                        <h2
                            class="flex  text-white font-bold items-center px-2 my-auto
                            text-2sm md:text-xl lg:text-2xl xl:text-3xl
                            h-10 w-auto">
                            Administrador</h2>
                    </div>
                </a>
                <a href="<?php echo route('loginJefe'); ?>"
                    class="flex flex-col items-center bg-gray-800 hover:bg-blue-800 rounded-2xl drop-shadow-2xl
                        h-96 md:h-full
                        w-full">

                    <div class="grid grid-col gap-20 py-48 h-auto w-auto justify-items-center">
                        <img alt="user_img" src="img/usuario.png" class="h-20 w-20 mt-10">
                        <h2
                            class="flex text-white font-bold items-center px-2 my-auto text-center
                            text-2sm md:text-xl lg:text-2xl xl:text-3xl
                            h-10 w-auto">
                            Jefe de departamento</h2>
                    </div>
                </a>
                <a href="<?php echo route('loginProf'); ?>"
                    class="flex flex-col items-center bg-gray-800 hover:bg-blue-800 rounded-2xl drop-shadow-2xl
                        h-96 md:h-full
                        w-full">

                    <div class="grid grid-col gap-20 py-48 h-auto w-auto justify-items-center">
                        <img alt="user_img" src="img/usuario.png" class="h-20 w-20 mt-10">
                        <h2
                            class="flex  text-white font-bold items-center px-2 my-auto
                            text-2sm md:text-xl lg:text-2xl xl:text-3xl
                            h-10 w-auto">
                            Docente</h2>
                    </div>
                </a>
                <a href="<?php echo route('menuInvi'); ?>"
                    class="flex flex-col items-center bg-gray-800 hover:bg-blue-800 rounded-2xl drop-shadow-2xl
                        h-96 md:h-full
                        w-full">

                    <div class="grid grid-col gap-20 py-48 h-auto w-auto justify-items-center">
                        <img alt="user_img" src="img/usuario.png" class="h-20 w-20 mt-10">
                        <h2
                            class="flex  text-white font-bold items-center px-2 my-auto
                        text-2sm md:text-xl lg:text-2xl xl:text-3xl
                        h-10 w-auto">
                        Alumno</h2>
                    </div>
                </a>


            </div>

            <footer class="grid justify-items-center bg-gray-600 h-28 shadow-md relative inset-x-0 bottom-0">
                <div class="grid content-center text-center border h-10 w-auto my-10">
                    <a class="font-semibold text-white text-lg">TecNM</a>
                </div>
            </footer>
        </div>
        {{-- 
    <div class="signin cf">



        <!--div class="avatar"></div-->
        <br>
        <h1>BIENVENIDO INICIE SESIÓN</h1>
        <img src="pprincipal/img/TECNM.png"
            style="width:180px; height:100px; position: absolute;top: 16px; right: 40px;">
        <img src="pprincipal/img/logo_isc.jpg"
            style="width:150px; height:100px; top: 30px; position: absolute;top: 15px; left: 40px;">

        <br><br>
        <div class="signin3 c">
        </div>

        <div class="signin2 cf" style="margin-top: 30px; margin-left: 50px;">
            <div class="container-login100-form-btn p-t-10">
                <a href="<?php echo route('loginAdmin'); ?>" class="login100-form-btn">Administrador
                    <button type="submit"></button></a>
                <!--button type="submit" class="login100-form-btn">Iniciar</button-->
            </div>
        </div>

        <div class="signin2 cf" style="margin-top: 40px; margin: 80px; margin-left: 50px;">
            <div class="container-login100-form-btn p-t-10">
                <a href="<?php echo route('loginJefe'); ?>" class="login100-form-btn">Jefe
                    <button type="submit"></button></a>
                <!--button type="submit" class="login100-form-btn">Iniciar</button-->
            </div>
        </div>


        <img src="pprincipal/img/txg-m.jpg"
            style="width:200px; height:180px; top: 40px; position: absolute;top: 240px; left: 370px;">



        <div class="signin2 cf" style="margin-top: -370px; margin-left: 580px;">
            <div class="container-login100-form-btn p-t-10">
                <a href="<?php echo route('loginProf'); ?>" class="login100-form-btn">Profesor
                    <button type="submit"></button></a>
                <!--button type="submit" class="login100-form-btn">Iniciar</button-->
            </div>
        </div>

        <div class="signin2 cf" style="margin-top: 80px; margin-left: 580px;">
            <div class="container-login100-form-btn p-t-10">
                <a href="<?php echo route('menuInvi'); ?>" class="login100-form-btn">Invitado
                    <button type="submit"></button></a>
                <!--button type="submit" class="login100-form-btn">Iniciar</button-->
            </div>
        </div>

    </div> --}}

        {{-- <style type="text/css">
        h1 {
            text-align: center;
            font-size: 35px;
        }

        html,
        body {
            min-height: 100%;
            font-family: Oxygen;
            font-weight: 300;
            font-size: 1em;
            color: #DBE4E9;
        }

        body {
            background: #CACFD3;

        }

        .signin {
            display: block;
            position: relative;
            width: 950px;
            height: 570px;
            margin: 20px auto;
            padding: 20px;
            background-color: #2F6895;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
            -moz-box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
            box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
        }

        .signin2 {
            display: block;
            position: relative;
            width: 260px;
            height: 105px;
            /*margin-top: 100px;
  margin: 20px auto;*/
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.4);
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
            -moz-box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
            box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
        }

        .signin3 {

            width: 910px;
            height: 2px;
            padding: 5px;
            background-color: rgba(0, 0, 0, 0.6);
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
            -moz-box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
            box-shadow: inset 1px 1px 0 0 rgba(255, 255, 255, 0.2), inset -1px -1px 0 0 rgba(0, 0, 0, 0.2);
        }

        .signin .avatar {
            width: 100px;
            height: 100px;
            margin: 0 auto 35px auto;
            border: 10px solid #fff;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            -webkit-pointer-events: none;
            -moz-pointer-events: none;
            pointer-events: none;
        }

        .signin .avatar:before {
            content: "\f272";
            text-align: center;
            font-family: Ionicons;
            display: block;
            height: 100%;
            line-height: 100px;
            font-size: 10em;
        }

        #salir {
            position: relative;
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            font-size: 24px;
            line-height: 1.33;
            border-radius: 35px;
            position: fixed;
            z-index: 300;
            top: 90px;
            left: 1160px;
        } 
        </style>--}}
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
            $('div.alert').not('.alert-important').delay(2000).slideUp(200);
        </script>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>


</html>
