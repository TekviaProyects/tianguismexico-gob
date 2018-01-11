<?php
	session_start();
	$_SESSION['user']['folder'] = date('Y-m-d--H-i-s');
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="images/favicon.png" type="image/png">
		<title>Bienvenido - Nueva Solicitud.</title>
		<link href="css/style.default.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert2.min.css">
	</head>
	<body class="signin">
		<section>
			<div class="signuppanel">
				<div class="row">
					<div class="col-md-6">
						<div class="signup-info">
							<div class="logopanel">
								<h1><span></span>Registra una nueva solicitud, o si ya tienes alguna
								<br>
								<p></p>
								<a href="signin.php" style="color:white;"><strong style="color: orange;">Inicia Sesión</strong></a><span></span></h1>
							</div>
							<div class="mb20"></div>
							<h5><strong>El registro de la presente solicitud deberá de hacerse durante la sesión activa,
													en un solo paso.</strong></h5>
							<h5> <strong>*Si no cuentas con alguno de los siguientes requisitos,</br> tu solicitud será desechada
													 automanticamente:</strong> </h5>

							<h5> <strong>
									- Identificación Oficial. </br>
									- Comprobante de domicilio. </br>
									- Constancia de manejo de alimentos. (En caso de venta de alimentos). </br>
									- Ubicación exacta del comercio y calles con las que cruza. </br>
									- Carta de acepación de Presidente de Colonos / Vecinos. (En caso de ser requerida por el Municipio).
							 </strong> </h5>

							 <h5> <strong>*Una vez que la solicitud ha sido llenada de manera correcta, pasará a un panel adminsitrativo
							  						mismo que determinará la viabilidad así como la veracidad de la informacíon vertida.</strong> </h5>

							 <h5> <strong>*Si necesitas información adicional o soporte técnico, ingresa a nuestra sección de preguntas
								 y respuestas </strong> </h5>

							 <h5> <strong>*En la Sección de Estado de Solicitudes <a href="#">Click aqui</a>, podrás revisar el estatus de tu
							  						solicitud, así como su aprobación o rechazo.</strong> </h5>

							 <h5> <strong>*Si no cuentas con todos estos requisitos, favor de registrarte una vez que los tengas a la mano, ya
								 						que </br> de lo contrario no podrás finalizar el trámite de Nueva Solicitud. </strong> </h5>
							<div class="mb20"></div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panelR" id="panelR"></div>
					</div>
				</div>
				<div class="signup-footer">
					<div class="pull-left">
						&copy; 2017 Todos los derechos reservados
					</div>
					<div class="pull-right">
						Created By: <a href="http://tekvia.com.mx/" target="_blank">LDV APP</a>
					</div>
				</div>
			</div>
		</section>
		<div class="notoy">
			<form method="post" id="todof" enctype="multipart/form-data">
				<input style="visibility: hidden;" name="nombre" type="text" id="1r" value="<?php echo $_SESSION['user']['name'] ?>"/>
				<input name="paterno" type="text" id="2r" value="<?php echo $_SESSION['user']['last_name'] ?>">
				<input name="materno" type="text" id="3r" value="<?php echo $_SESSION['user']['last_name2'] ?>">
				<input name="correo" type="text" id="4r" value="<?php echo $_SESSION['user']['mail'] ?>">
				<input name="domicilio" type="text" id="5r">
				<input name="colonia1" type="text" id="6r">
				<input name="municipio1" type="text" id="7r">
				<input name="postal" type="text" id="8r">
				<input name="telefono" type="text" id="9r">
				<input name="password" type="text" id="10r" value="<?php echo $_SESSION['user']['pass'] ?>">
				<input name="estados" value="Fijo" type="text" id="campo11r">
				<input name="calle" type="text" id="12r">
				<input name="numerolocal" type="text" id="13r">
				<input name="colonia2" type="text" id="14r">
				<input name="calles" type="text" id="15r">
				<input name="referencia" type="text" id="16r">
				<input name="giro" value="Electronico" type="text" id="campo17r">
				<input name="mts2" type="text" id="18r">
				<input name="dia" type="text" id="dias">
				<input name="inicio" type="text" id="19r">
				<input name="fin" type="text" id="20r">
				<input name="iestado" value="1" type="text" id="iestado">
				<input name="imunicipio" value="Aguascalientes" type="text" id="imunicipio">
				<input name="propiedad" value="Si" type="text" id="campo21r">
				<input name="archivo1" type="text" id="archivo1" onchange="a1.value = this.value">
				<input name="archivo2" type="text" id="archivo2" onchange="a2.value = this.value">
				<input name="archivo3" type="text" id="archivo3" onchange="a3.value = this.value">
				<input name="archivo4" type="text" id="archivo4" onchange="a4.value = this.value">
				<input name="archivo5" type="text" id="archivo5" onchange="a5.value = this.value">
				<input name="archivo6" type="text" id="archivo6" onchange="a6.value = this.value">
				<input name="archivo7" type="text" id="archivo7" onchange="a7.value = this.value">
				<input name="archivo8" type="text" id="archivo8" onchange="a8.value = this.value">
				<input name="archivo9" type="text" id="archivo9" onchange="a9.value = this.value">
				<input name="lat" id="lat" type="text" />
				<input name="lng" id="lng" type="text" />
			</form>
			<form method="post" id="santoysena" enctype="multipart/form-data">
				<input name="correo" type="text" id="correor">
				<input name="password" type="text" id="passwordr">
			</form>
		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/modernizr.min.js"></script>
		<script src="js/jquery.sparkline.min.js"></script>
		<script src="js/jquery.cookies.js"></script>
		<script src="js/toggles.min.js"></script>
		<script src="js/retina.min.js"></script>
		<script src="js/select2.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="assets/sweetalert/dist/sweetalert2.min.js"></script>
		<script src="js/subir.js"></script>
		<script src="js/registros.js"></script>

		<script>
			jQuery(document).ready(function() {
				jQuery(".select2").select2({
					width : '100%',
					minimumResultsForSearch : -1
				});

				jQuery(".select2-2").select2({
					width : '100%'
				});

				var c = jQuery.cookie('change-skin');

				if (c && c == 'greyjoy') {
					jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
				} else if (c && c == 'dodgerblue') {
					jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
				} else if (c && c == 'katniss') {
					jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
				}
			});
			if ("geolocation" in navigator) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var coordenates = {
						lat : 0,
						lng : 0
					};
					coordenates.lat = position.coords.latitude, coordenates.lng = position.coords.longitude;

					console.log("========> Coordenates", coordenates);

					document.getElementById("lat").value = coordenates.lat;
					document.getElementById("lng").value = coordenates.lng;
				});
			}
		</script>
	</body>
</html>
