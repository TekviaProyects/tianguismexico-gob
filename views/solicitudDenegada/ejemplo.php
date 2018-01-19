<?php
	include ("plugins/php/conexion.php");
	
	$mostrar = "	SELECT 
		  					* 
		  				FROM 
		  					registros 
		  				WHERE 
		  					id =" . $_REQUEST['request_id'];
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
<script  src="views/solicitudDenegada/plugins/js/index.js"></script>
<div class="row" align="center">
	<form id="new" name="new" action="index.html" method="post">
		<div class="col-sm-12">
			<P style="font-weight:bold; font-size:15px;">
				La razon por denegar la solicitud es: <?php echo $nom ?>
			</P>
		</div>
		<div class="col-sm-12">
			<p>
				IDENTIFICACION
			</p>
			<?php echo "<img style='height:100px; width:100px;' src='$identificacion' alt=''>"; ?>
			<p></p>
			<input type="file" accept="image/*" capture="camera" id="id" name="ife" value="">
		</div>
		<div class="col-sm-12">
			<p>
				CARTA SANIDAD Y CARTA DELEGADO
			</p>
			<div class="col-sm-12">
				<?php echo "<img style='height:100px; width:100px;' src='$sanidad' alt=''>"; ?>
				<p></p>
				<input type="file" accept="image/*" capture="camera" id="carta_sanidad" name="carta_sanidad" value="">
			</div>
			<div class="col-sm-12">
				<?php echo "<img style='height:100px; width:100px;' src='$cartadelegado' alt=''>"; ?>
				<p></p>
				<input type="file" accept="image/*" capture="camera" id="carta_delegado" name="carta_delegado" value="">
			</div>
		</div><br />
				<div>
					<p>
						CARTA ACEPTACION Y COMPROBANTE
					</p>
					<div class="col-sm-12">
						<?php echo "<img style='height:100px; width:100px;' src='$cartaaceptacion' alt=''>"; ?>
						<p></p>
						<input type="file" accept="image/*" capture="camera" id="carta_aceptacion" name="carta_aceptacion" value="">
					</div>
					<div class="col-sm-12">
						<?php echo "<img style='height:100px; width:100px;' src='$comprobante' alt=''>"; ?>
						<p></p>
						<input type="file" accept="image/*" capture="camera" id="comprobante" name="comprobante" value="">
					</div>
				</div><br />
				<div >
					<p>
						FOTOS DEL LOCAL
					</p>
					<div class="col-sm-12">
						<?php echo "<img style='height:100px; width:100px;' src='$foto1' alt=''>"; ?>
						<p></p>
						<input type="file" accept="image/*" capture="camera" id="foto1" name="foto1" value="">
					</div>
					<div class="col-sm-12">
						<?php echo "<img style='height:100px; width:100px;' src='$foto2' alt=''>"; ?>
						<p></p>
						<input type="file" accept="image/*" capture="camera" id="foto2" name="foto2" value="">
					</div>
				</div><br />
				<div >
					<div class="col-sm-12">
						<?php echo "<img style='height:100px; width:100px;' src='$foto3' alt=''>"; ?>
						<p></p>
						<input type="file" accept="image/*" capture="camera" id="foto3" name="foto3" value="">
					</div>
					<div class="col-sm-12">
						<?php echo "<img style='height:100px; width:100px;' src='$foto4' alt=''>"; ?>
						<p></p>
						<input type="file" accept="image/*" capture="camera" id="foto4" name="foto4" value="">
					</div>
				</div><br /><br />
				<button id="actualizar" style="width:200px" class="btn btn-success btn-block" type="button" name="button">
					Capturar
				</button>
				<p></p>
			</form>
		</div>
<script type="text/javascript">
//Cuando el formulario con ID acceso se envíe...
	$("#actualizar").click(function(event) {
		event.preventDefault();
		var form = $('#new')[0];
		var data = new FormData(form);
	
		$.ajax({
			url : "views/solicitudDenegada/plugins/php/actualizar.php?folder=<?php echo $folder ?>&request_id=<?php echo $_REQUEST['request_id'] ?>",
			type : "POST",
			enctype : 'multipart/form-data',
			data : data,
			cache : false,
			contentType : false,
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