<?php

session_start();

$_SESSION['user'] = '';

session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="images/favicon.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert2.min.css">

		<title>Iniciar Sesion</title>

		<link href="css/style.default.css" rel="stylesheet">
	</head>
	<body class="signin">
		<section>
			<div class="signinpanel">
				<div class="row">
					<div class="col-md-7">
						<div class="signin-info">
							<div class="logopanel">
								<img src="images/logo.png" style="max-width: 138px" />
							</div><!-- logopanel -->
							<div class="mb20"></div>
							<h4><strong>Bienvenido!</strong></h4>
							<h5> <strong>Al ingresar a tu panel de usuario podrás:</strong> </h5>
							<ul>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Crear solicitud para establecer tu comercio: </br>
									Fijo, semifijo o ambulante.
								</li>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Tener atención directa.
								</li>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Ceder derechos de tu comercio.
								</li>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> solicitar permisos.
								</li>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Acceder a Manuales.
								</li>
							</ul>
							<div class="mb20"></div>
							<strong>Levantar una nueva solicitud? <a href="signup.php">Registrala</a></strong>
						</div><!-- signin0-info -->
					</div><!-- col-sm-7 -->
					<div class="col-md-5">
						<form method="post" id="sesion" onsubmit="return forM(this)" enctype="multipart/form-data">
							<h4 class="nomargin">Iniciar Sesión</h4>
							<p class="mt5 mb20">
								Haz seguimiento de tu tramite en linea.
							</p>
							<input type="text" class="form-control uname" placeholder="Correo Electrónico" name="correo" id="correo"/>
							<input
								type="password"
								class="form-control pword"
								placeholder="Contraseña"
								name="contrasena"
								id="contrasena"/><br />
							<input type="checkbox" id="check_confirm" /> He leído y aceptado los términos y condiciones de uso,
							así como el Aviso de privacidad
							<button class="btn btn-success btn-block" type="submit" id="btnSubir" disabled="true">
								Iniciar
							</button><br />
							<div align="center">
								<a href="terminos.html">Términos y condiciones</a><br />
								<a href="aviso.html">Aviso de privacidad</a>
							</div>
						</form>
						<div class="row">
							<div class="col-sm-12" align="center">
								<a href="#div_recovery" aling="center" data-toggle="collapse" data-target="#div_recovery">
									Olvide mi contraseña
								</a>
							</div>
							<div class="col-sm-12 collapse" id="div_recovery">
								<form id="form_recovery" onsubmit="event.preventDefault();  validate()">
									<h4>Recuperar contraseña</h4>
									<input class="form-control" id="mail" type="email" placeholder="Correo" required="1" />
									<input
										class="form-control"
										id="pass"
										type="password"
										placeholder="Nueva contraseña"
										required="1" />
									<input class="form-control" id="pass2" type="password" placeholder="Repetir" required="1" />
									<button id="btn_send_recovery" class="btn btn-success btn-block">
										Recuperar
									</button>
								</form>
							</div>
						</div>
					</div><!-- col-sm-5 -->
				</div><!-- row -->
				<div class="signup-footer">
					<div class="pull-left">
						&copy; Copyright © Tekvia 2017 Todos los Derechos Reservados
					</div>
					<div class="pull-right">
						Created By: <a href="http://tekvia.com.mx/" target="_blank">Tekvia</a>
					</div>
				</div>
			</div><!-- signin -->
		</section>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/modernizr.min.js"></script>
		<script src="js/jquery.sparkline.min.js"></script>
		<script src="js/jquery.cookies.js"></script>
		<script src="js/toggles.min.js"></script>
		<script src="js/retina.min.js"></script>
		<script src="assets/sweetalert/dist/sweetalert2.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/sesion.js"></script>
		<script>
			enable_cb();
			$("#check_confirm").click(enable_cb);

			function enable_cb() {
				if (this.checked) {
					$("#btnSubir").removeAttr("disabled");
				} else {
					$("#btnSubir").attr("disabled", true);
				}
			}

			jQuery(document).ready(function() {
			// Please do not use the code below
			// This is for demo purposes only
				var c = jQuery.cookie('change-skin');
				if (c && c == 'greyjoy') {
					jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
				} else if (c && c == 'dodgerblue') {
					jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
				} else if (c && c == 'katniss') {
					jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
				}
			});


			function validate () {
				var data = {},
					$required = [],
					message = 'Debes llenar los siguientes campos: \n',
					error = 0,
					count = 0;

				$("#form_recovery").find(':input').each(function(key, value){
					var required = $(this).attr('required'),
						valor = $(this).val(),
						id = this.id;

				// Validate that the required input not are empty
					if (required === '1' && valor.length <= 0) {
						error = 1;

						$required.push(id);
					}

					if(id){
						data[id] = $(this).val();
					}
				});

			// Build the error message
				if ($required.length > 0) {
					$.each($required, function(index, value) {
						message += '-->' + this + ' \n';
					});
				}

			// Error
				if (error === 1) {
					swal({
						title : 'Campos no validos',
						text : message,
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});

					return;
				}
				if(data.pass !== data.pass2){
					swal({
						title : 'Contraseña no valida',
						text : 'Las contraseñas no son iguales',
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});

					return;
				}


				console.log('==========> done DATA', data);

				$("#btn_send_recovery").button('loading');

				$.ajax({
					data : data,
					url : 'ajax.php?c=users&f=send_recovery',
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done recovery', resp);

					$("#btn_send_recovery").button('reset');

					if(resp.status === 1){
						swal({
							title : 'Revisa tu correo',
							text : 'Te hemos enviado un correo con los pasos para recuperar tu cuenta',
							timer : 5000,
							showConfirmButton : true,
							type : 'warning'
						});
					}else{
						swal({
							title : 'Datos no validos',
							text : 'Revisa que el correo sea correcto',
							timer : 5000,
							showConfirmButton : true,
							type : 'warning'
						});
					}
				}).fail(function(resp) {
					console.log('==========> fail !!! save', resp);

					$("#btn_send_recovery").button('reset');

					swal({
						title : 'Error',
						text : 'A ocurrido un problema al guardar los datos',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
				});

			}
		</script>
	</body>
</html>
