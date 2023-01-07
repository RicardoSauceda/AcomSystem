<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Estadisticas Aprobados y no Aprobados </title>

    {!! Charts::styles() !!}


</head>

<body>


    <div class="app">

        <center>

            {!! $chart->html() !!}

        </center>
    </div>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}



</body>


<body>


    <div style="margin-left: 640px; margin-top: 10px;" class="container-login100-form-btn p-t-20">
        <a href="<?php echo route('pastel'); ?>" class="btn btn-info">
            Regresar a los Proyectos</a>
        <!--button type="submit" class="login100-form-btn">Iniciar</button-->
    </div>

</body>

</html>
