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
            <img src="pprincipal/img/sep.jpg" style="margin-left: 12px;">
            <img src="pprincipal/img/tecnm_logo.jpg" style="position: absolute; top: -10px; left: 440px;">
            <p style="font-family: monospace; font-size: 12px; position: absolute; top: 45px; left: 410px;">Instituto Tecnológico de Tuxtla Gutiérrez</p>
            
        <div style="margin: 23px; ">
            <br>
            <br>
            <h3 style="text-align: center;">CONSTANCIA DE ACREDITACION DE ACTIVIDAD COMPLEMENTARIA</h3>
            <br>
            <br>

            <p ><b>C. Salomón Velasco Bermúdez</b></p>               
            <p style="margin-top: -20px; margin-bottom: -15px;"><b>Jefe del departamento de servicios escolares</b></p>

            <p><b>PRESENTE</b></p>
            <div style="text-align: justify;">
            <p style="text-align: justify;">El que suscribe {{$aprobados->profesor}}, por este medio se permite hacer de su conocimiento que el/la estudiante <b style="text-transform: uppercase;">{{$aprobados->alumno}} {{$aprobados->apellidos}}</b> con número de control <b>{{$aprobados->numControl}}</b> de la carrera de <b>{{$carrera}}</b> ha cumplido la actividad complementaria <b>{{$aprobados->tipo}} ({{$aprobados->proyecto}})</b>, con el nivel de desempeño<b> {{$pos}}</b> y un valor numérico de<b> {{$valNum}}</b>, durante el período escolar <b>Agosto-Diciembre de 2019</b> con un valor curricular de <b>{{$aprobados->credito}}</b> créditos.</p>
      
            <p>Se extiende la presente en la ciudad de Tuxtla Gutiérrez, Chiapas a los {{$dia}} dias del mes de {{$mes}} de 20{{$year}}.</p>

            </div>
                    <br>
                    
            <p style="text-align: center;"><b>ATENTAMENTE</b></p>
            <br>
            <br>
            <br>

            <div style="text-align: center; float: left; width: 50%;">
                <p><b>______________________________</b></p>
                <p style="margin-top: -15px;">{{$aprobados->profesor}}</p>
                <p style="margin-top: -15px; ">{{$dato->rol_encargado}}</p>
            </div>
            <div style="text-align: center; float: right; width: 50%;">
                <p><b>______________________________</b></p>
                <p style="margin-top: -15px;">{{$jefe->nombre}}</p>
                <p style="margin-top: -15px; ">Jefe(a) del {{$puestoDep}}</p>
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
        
            <img src="pprincipal/img/pie_pag_ittg.jpg" style="width: 65px; height: 65px; position: absolute; top: 930px; left: 20px;"> 
        
         <div style="text-align: center; font-size: 10px; position: absolute; top: 925px;">
            
             <p>Carretera Panamericana Km. 1080, C. P.29050, Apartado Postal 599</p>
             <p style="margin-top: -10px; margin-bottom: -10px;">Tuxtla Gutiérrez, Chiapas: Tels. (961) 61 50380, 61 50461; Ext. 101</p>
             <p>www.ittg.edu.mx</p>

         </div>

            <img src="pprincipal/img/pie_pagina1.jpg" style="width: 55px; height: 55px; position: absolute; top: 930px; left: 620px;"> 
            <img src="pprincipal/img/pie_pagina2.jpg" style="width: 55px; height: 55px; position: absolute; top: 930px; left: 680px;"> 

            


        
        
    </div>

</body>
</html>