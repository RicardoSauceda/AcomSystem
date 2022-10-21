<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Estadisticas</title>
  <!-- Bootstrap core CSS-->
  <link href="pcards/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="pcards/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="pcards/css/sb-admin.css" rel="stylesheet">
  <link href="pcards/css/buscador.css" rel="stylesheet">
  

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() 
    {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Cantidad", { role: "style" } ],
        //["No Aprobados", 2, "color: #C82E0C"],
        ["Cantidad de Proyectos Creados",{{$parametro1}}, "#0789C6"],]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = 
      {
        @if ($mes == 1)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN ENERO" + " DEL " + {{$anio}},
        @elseif ($mes == 2)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN FEBRERO" + " DEL " + {{$anio}},
        @elseif ($mes == 3)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN MARZO" + " DEL " + {{$anio}},
        @elseif ($mes == 4)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN ABRIL" + " DEL " + {{$anio}},
        @elseif ($mes == 5)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN MAYO" + " DEL " + {{$anio}},
        @elseif ($mes == 6)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN JUNIO" + " DEL " + {{$anio}},
        @elseif ($mes == 7)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN JULIO" + " DEL " + {{$anio}},
        @elseif ($mes == 8)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN AGOSTO" + " DEL " + {{$anio}},
        @elseif ($mes == 9)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN SEPTIEMBRE" + " DEL " + {{$anio}},
        @elseif ($mes == 10)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN OCTUBRE" + " DEL " + {{$anio}},
        @elseif ($mes == 11)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN NOVIEMBRE" + " DEL " + {{$anio}},
        @elseif ($mes == 12)
          title: "GRAFICA DE BARRAS DE LOS PROYECTOS CREADOS EN DICIEMBRE" + " DEL " + {{$anio}},
        @endif

        width: 1300,
        height: 600,
        bar: {groupWidth: "45%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
    }
  </script>

</head>

<body class="container-fluid" id="page-top">
  <!--body class="fixed-nav sticky-footer bg-dark" id="page-top"-->
  <!--div class="content-wrapper">
    <div class="container-fluid">
      
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Cards</li>
      </ol-->
      <h1>Estadisticas de Proyectos creados por mes</h1>
      <hr>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="iconic document"></i>
              </div>
              <div class="mr-5">{{$parametro1}}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Cantidad de Proyectos Creados</span>
              <span class="float-right">
                <i class="iconic document"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="text-center w-full" style="margin-left: 600px;">
		<!--a  class="btn btn-info" href="{{ URL::previous() }}">Regresar a los Proyectos</a-->
		<a href="<?php echo route('menu') ?>" class="btn btn-info"> Regresar al menu</a>
	</div>
        
        
  
    <form action="{{ route('graf') }}" method="GET" accept-charset="UTF-8" enctype="multipart/form-data">
            {{csrf_field ()}}       
    
    
      <select class="selec" id="anio" name="anio">
      <option disabled selected="">Elija el Año</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
      <option value="2026">2026</option>
      <option value="2027">2027</option>
      <option value="2028">2028</option>
      <option value="2029">2029</option>
      <option value="2030">2030</option>
    </select>

    <select class="selec2" id="mes" name="mes">
      <option disabled selected="">Elija el Mes</option>
      <option value="1">ENERO</option>
      <option value="2">FEBRERO</option>
      <option value="3">MARZO</option>
      <option value="4">ABRIL</option>
      <option value="5">MAYO</option>
      <option value="6">JUNIO</option>
      <option value="7">JULIO</option>
      <option value="8">AGOSTO</option>
      <option value="9">SEPTIEMBRE</option>
      <option value="10">OCTUBRE</option>
      <option value="11">NOVIEMBRE</option>
      <option value="12">DICIEMBRE</option>
    </select>

    <div class="wrapper">
      <button type="submit" class="button">GRAFICAR</button>  
    </div>

    </form>

    <div id="columnchart_values" style="width: 1300px; height: 600px;"></div>
    
    <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
      <defs>
        <filter id="goo"><feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />    
          <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
          <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
        </filter>
      </defs>
    </svg>
    
    
  
    <!-- javascript del sistema laravel -->
   <script src="js/sistemalaravel.js"></script>
   <script src="js/highcharts.js"></script>
   <script src="js/graficas.js"></script>

    <script src="pcards/vendor/jquery/jquery.min.js"></script>
    <script src="pcards/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="pcards/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="pcards/js/sb-admin.min.js"></script>
  

  
</body>

</html>
