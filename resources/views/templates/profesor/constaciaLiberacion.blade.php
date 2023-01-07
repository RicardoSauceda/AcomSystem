<!DOCTYPE html>
<html lang="en">
<head>
    <title>Constancia de Liberacion</title>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

    <style type="text/css">
        body{
            background-color: url("pprincipal/img/marca_agua.jpg");
            width: 100%
            height: 100%;
        }
    </style>

</head>
<body class="fondo" >
    <!--<img class="fondo" src="pprincipal/img/marca_agua.jpg">-->
    

    <div class="container" >
            <img src="pprincipal/img/membretesuperior.jpg" style="width: 60%; height: 45px; position: absolute; top: 15px; left: 10px">
            <!--<img src="pprincipal/img/TECNM.png" style="height: 70px; width: 160px; position: absolute; top: 10px; left: 550px;">-->

             <br>
             <br>
             <br>
             <br>
             <br>
            <div style="margin-right: 23px; margin-top: -15px;" >
            <p style="text-align: right; font-size: 14px; margin-bottom: -15px ">Instituto Tecnológico de Tuxtla Gutiérrez</p>
            <p style="text-align: right; font-size: 12px;">{{$dato->depart_name}}</p>
          <!--  <p style="text-align: center; font-size: 12px;">“2020, Año de Leona Vicario, Benemérita Madre de la Patria”</p> -->
        </div>

        <div style="margin: 23px; ">        
            <h3 style="text-align: center;">CONSTANCIA DE ACREDITACIÓN DE ACTIVIDAD COMPLEMENTARIA</h3>
            <br>
           

            <p ><b>C. {{$jefe_servicios->nombre}}</b></p>               
            <p style="margin-top: -20px; margin-bottom: -15px;"><b>Jefa del departamento de servicios escolares</b></p>

            <p><b>PRESENTE</b></p>
            <div style="text-align: justify;">
            <p style="text-align: justify;">El que suscribe {{$dato->autor}}, por este medio se permite hacer de su conocimiento que el/la estudiante <b style="text-transform: uppercase;">{{$aprobados->nombre}} {{$aprobados->apellidos}}</b> con número de control <b>{{$aprobados->numControl}}</b> de la carrera de <b>{{$aprobados->Carrera}}</b> ha cumplido la actividad complementaria <b>{{$tipo->nombre_tipo}} ({{$dato->nombre}})</b>, con el nivel de desempeño<b> {{$pos}}</b> y un valor numérico de<b> {{$valNum}}</b>, durante el período escolar <b>{{$periodo}} de {{$dato->año}}</b> con un valor curricular de <b>{{$tipo->Credito}}</b> créditos.</p>
      
            <p>Se extiende la presente en la ciudad de Tuxtla Gutiérrez, Chiapas {{$Fecha}}.</p>

            </div>
                    <br>
                    
            <p style="text-align: center;"><b>ATENTAMENTE</b></p>
            <br>
            <br>
            <br>

            <div style="text-align: center; float: left; width: 50%;">
                <p><b>______________________________</b></p>
                <p style="margin-top: -15px;">{{$dato->autor}}</p>
                <p style="margin-top: -15px; ">{{$dato->rol_encargado}}</p>
            </div>
            <div style="text-align: center; float: right; width: 50%;">
                <p><b>______________________________</b></p>
                <p style="margin-top: -15px;">{{$jefe_dep->nombre}}</p>
                <p style="margin-top: -15px; ">Jefe(a) del {{$dato->depart_name}}</p>
            </div>
         </div>
         <br>
            
        
         <br>
         <br>
         <br>
         <br>
         <br>
         <p style="text-align: left; margin-left: 25px">C.p. Estudiante <br>C.p. Archivo </p>
         <br>
        
            <img src="pprincipal/img/membreteinferior.jpeg" style="width: 95%; height: 145px; position: absolute; top: 860px; left: 20px;"> 
          <!--  <img src="pprincipal/img/pie_pagina_libre_plastico.jpg" style="width: 75px; height: 55px; position: absolute; top: 920px; left: 100px;"> 

            <img src="pprincipal/img/pie_pagina1.jpg" style="width: 55px; height: 55px; position: absolute; top: 920px; left: 200px;"> 
            <img src="pprincipal/img/pie_pagina2.jpg" style="width: 55px; height: 55px; position: absolute; top: 920px; left: 250px;"> 
        
        <div style="text-align: left; font-size: 10px; position: absolute; top: 915px; left: 320px">
            
             <p>Carretera Panamericana Km. 1080, C.P. 29050,</p>
             <p style="margin-top: -10px; margin-bottom: -10px;">Apartado Postal 599, Tuxtla Gutiérrez, Chiapas.</p>
             <p >Tel. (961) 615 0461, 615 0138, 615 4808, ext. 000</p>
             <p style="margin-top: -10px; margin-bottom: -10px;">www.tuxtla.tecnm.mx</p>
                         

         </div> 

             <img src="pprincipal/img/pie_pagina_2021.jpg" style="width: 85px; height: 85px; position: absolute; top: 910px; left: 620px;"> 
             <img src="pprincipal/img/barra.jpg" style="width: 600px; height: 5px; position: absolute; top: 990px; left: 20px;"> -->
            

            


        
        
    </div>

</body>
</html>