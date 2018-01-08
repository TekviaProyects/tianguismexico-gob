<?php

  include("plugins/php/conexion.php");

  $mostrar ="SELECT * FROM registros WHERE password = 321";
  $resultado = mysqli_query($conexion,$mostrar);

  while ($row = mysqli_fetch_array($resultado)) {
    $identificacion=$row['identificacion'];
    $comprobante=$row['comprobante'];
    $cartadelegado=$row['cartadelegado'];
    $cartaaceptacion=$row['cartaaceptacion'];
    $sanidad=$row['sanidad'];
    $foto1=$row['fotografia1'];
    $foto2=$row['fotografia2'];
    $foto3=$row['fotografia3'];
    $foto4=$row['fotografia4'];
    $nom=$row['comentario'];
  }
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <link href="css/style.default.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="plugins/sweetalert-master/dist/sweetalert.css">

    <script  src="plugins/js/index.js"></script>
    <script type="text/javascript" src="plugins/js/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="plugins/sweetalert-master/dist/sweetalert.min.js"></script>
  </body>

    <div class="signuppanel">
      <div class="col-md-12">
        <form id="new" name="new" action="index.html" method="post">
          <P style="font-weight:bold; font-size:15px;"> La razon por denegar la solicitud es: <?php echo $nom ?> </P>
          <div class="">
          <p>IDENTIFICACION</p>
          <?php echo "<img style='height:100px; width:100px;' src='$identificacion' alt=''>"; ?>
          <input type="file" id="id" name="ife" value="">
          </div>
          <p></p>
          <div class="row mb10">
            <p>CARTA SANIDAD Y CARTA DELEGADO</p>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$sanidad' alt=''>"; ?>
              <input type="file" id="carta_sanidad" name="carta_sanidad" value="">
            </div>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$cartadelegado' alt=''>"; ?>
              <input type="file" id="carta_delegado" name="carta_delegado" value="">
            </div>
            <p></p>
          </div>
          <div class="row mb10">
            <p>CARTA ACEPTACION Y COMPROBANTE</p>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$cartaaceptacion' alt=''>"; ?>
              <input type="file" id="carta_aceptacion" name="carta_aceptacion" value="">
            </div>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$comprobante' alt=''>"; ?>
              <input type="file" id="comprobante" name="comprobante" value="">
            </div>
          </div>

          <div class="row mb10">
            <p>FOTOS DEL LOCAL</p>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$foto1' alt=''>"; ?>
              <input type="file" id="foto1" name="foto1" value="">
            </div>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$foto2' alt=''>"; ?>
              <input type="file" id="foto2" name="foto2" value="">
            </div>
          </div>

          <div class="row mb10">
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$foto3' alt=''>"; ?>
              <input type="file" id="foto3" name="foto3" value="">
            </div>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$foto4' alt=''>"; ?>
              <input type="file" id="foto4" name="foto4" value="">
            </div>
          </div>
        </form>
        <p></p>
          <button id="actualizar" style="width:200px" class="btn btn-success btn-block" type="button" name="button">Capturar</button>
        <p></p>
      </div>
    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/toggles.min.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/jquery.cookies.js"></script>

    <script src="js/custom.js"></script>

    <script type="text/javascript">
    //Cuando el formulario con ID acceso se envíe...
    $("#actualizar").click(function (event){

      event.preventDefault();

      var form = $('#new') [0];
      var data = new FormData(form);

      $.ajax({
        //Definimos la URL del archivo al cual vamos a enviar los datos
        url: "plugins/php/actualizar.php",
        //Definimos el tipo de método de envío
        type: "POST",
        //Definimos el tipo de datos que vamos a enviar y recibir
        enctype: 'multipart/form-data',
        //Definimos la información que vamos a enviar
        data: data,
        //Deshabilitamos el caché
        cache: false,
        //No especificamos el contentType
        contentType: false,
        //No permitimos que los datos pasen como un objeto
        processData: false,
        timeout: 600000,
        success: function (data) {
          console.log(data);
                if(data=='true'){
                  swal({
                    title: "Captura Exitosa",
                    text: "seguir con la captura de informacion",
                    type: "success",
                    confirmButtonText: "OK"
                  });
              }else {

                console.log('==========> error');

              }

        },
        error: function (e) {
        }
      });

    });

    </script>
</html>
