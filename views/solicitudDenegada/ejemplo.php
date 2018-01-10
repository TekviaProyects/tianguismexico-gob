<?php
	include ("plugins/php/conexion.php");
	
	$mostrar = "	SELECT 
	  					* 
	  				FROM 
	  					registros 
	  				WHERE 
	  					id =".$_REQUEST['request_id'];
	$resultado = mysqli_query($conexion, $mostrar);
	
	while ($row = mysqli_fetch_array($resultado)) {
		$identificacion = substr($row['identificacion'], 6);
		$comprobante = substr($row['comprobante'], 6);
		$cartadelegado = substr($row['cartadelegado'], 6);
		$cartaaceptacion = substr($row['cartaaceptacion'], 6);
		$sanidad = substr($row['sanidad'], 6);
		$foto1 = substr($row['fotografia1'], 6);
		$foto2 = substr($row['fotografia2'], 6);
		$foto3 = substr($row['fotografia3'], 6);
		$foto4 = substr($row['fotografia4'], 6);
		$nom = $row['comentario'];
		
		$porciones = explode("/", $foto1);
	}
	
	$folder = $porciones[3];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script  src="views/solicitudDenegada/plugins/js/index.js"></script>
  </body>
    <div class="signuppanel">
      <div class="col-md-12">
        <form id="new" name="new" action="index.html" method="post">
          <P style="font-weight:bold; font-size:15px;"> La razon por denegar la solicitud es: <?php echo $nom ?> </P>
          <div class="">
          <p>IDENTIFICACION</p>
          <?php echo "<img style='height:100px; width:100px;' src='$identificacion' alt=''>"; ?>
          <p></p>
          <input type="file" accept="image/*" capture="camera" id="id" name="ife" value="">
          </div>
          <p></p>
          <div class="row mb10">
            <p>CARTA SANIDAD Y CARTA DELEGADO</p>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$sanidad' alt=''>"; ?>
              <p></p>
              <input type="file" accept="image/*" capture="camera" id="carta_sanidad" name="carta_sanidad" value="">
            </div>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$cartadelegado' alt=''>"; ?>
              <p></p>
              <input type="file" accept="image/*" capture="camera" id="carta_delegado" name="carta_delegado" value="">
            </div>
            <p></p>
          </div>
          <div class="row mb10">
            <p>CARTA ACEPTACION Y COMPROBANTE</p>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$cartaaceptacion' alt=''>"; ?>
              <p></p>
              <input type="file" accept="image/*" capture="camera" id="carta_aceptacion" name="carta_aceptacion" value="">
            </div>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$comprobante' alt=''>"; ?>
              <p></p>
              <input type="file" accept="image/*" capture="camera" id="comprobante" name="comprobante" value="">
            </div>
          </div>

          <div class="row mb10">
            <p>FOTOS DEL LOCAL</p>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$foto1' alt=''>"; ?>
              <p></p>
              <input type="file" accept="image/*" capture="camera" id="foto1" name="foto1" value="">
            </div>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$foto2' alt=''>"; ?>
              <p></p>
              <input type="file" accept="image/*" capture="camera" id="foto2" name="foto2" value="">
            </div>
          </div>

          <div class="row mb10">
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$foto3' alt=''>"; ?>
              <p></p>
              <input type="file" accept="image/*" capture="camera" id="foto3" name="foto3" value="">
            </div>
            <div class="col-md-3">
              <?php echo "<img style='height:100px; width:100px;' src='$foto4' alt=''>"; ?>
              <p></p>
              <input type="file" accept="image/*" capture="camera" id="foto4" name="foto4" value="">
            </div>
            <p></p>
          </div>
          <p></p>
            <button id="actualizar" style="width:200px" class="btn btn-success btn-block" type="button" name="button">Capturar</button>
          <p></p>
        </form>
      </div>
    </div>

    <script src="views/solicitudDenegada/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="views/solicitudDenegada/js/jquery.sparkline.min.js"></script>
    <script src="views/solicitudDenegada/js/toggles.min.js"></script>
    <script src="views/solicitudDenegada/js/retina.min.js"></script>
    <script src="views/solicitudDenegada/js/jquery.cookies.js"></script>

    <script src="views/solicitudDenegada/js/custom.js"></script>

    <script type="text/javascript">
		//Cuando el formulario con ID acceso se envíe...
		$("#actualizar").click(function(event) {
			event.preventDefault();
			var form = $('#new')[0];
			var data = new FormData(form);

			$.ajax({
				//Definimos la URL del archivo al cual vamos a enviar los datos
				url : "views/solicitudDenegada/plugins/php/actualizar.php?folder=<?php echo $folder ?>&request_id=<?php echo $_REQUEST['request_id'] ?>",
				//Definimos el tipo de método de envío
				type : "POST",
				//Definimos el tipo de datos que vamos a enviar y recibir
				enctype : 'multipart/form-data',
				//Definimos la información que vamos a enviar
				data : data,
				//Deshabilitamos el caché
				cache : false,
				//No especificamos el contentType
				contentType : false,
				//No permitimos que los datos pasen como un objeto
				processData : false,
				timeout : 600000,
				success : function(data) {
					console.log(data);
					swal({
						title : "Captura Exitosa",
						text : "seguir con la captura de informacion",
						type : "success",
						confirmButtonText : "OK"
					});
				},error : function(e) {
					console.log('==========> error', e);
				}
			});
		});
	</script>
</html>