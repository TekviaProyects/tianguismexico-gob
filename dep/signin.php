<?php

session_start();

$_SESSION['dependencie'] = '';

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../images/favicon.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="../assets/sweetalert/dist/sweetalert2.min.css">
		<title>Iniciar Sesion</title>
		<link href="../css/style.default.css" rel="stylesheet">
	</head>
	<body class="signin">
		<section>
			<div class="signinpanel">
				<div class="row">
					<div class="col-md-7">
						<div class="signin-info">
							<div class="logopanel">
								<img src="../images/logo.png" style="max-width: 138px" />
							</div><!-- logopanel -->
							<div class="mb20"></div>
							<h5><strong>Bienvenido!</strong></h5>
							<ul>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Soporte 24x7x365
								</li>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Reportes en todo momento
								</li>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Listo para trabajar
								</li>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Aplicacion movil
								</li>
								<li>
									<i class="fa fa-arrow-circle-o-right mr5"></i> Trabaja de manera simultanea
								</li>
							</ul>
							<div class="mb20"></div>
							<strong>No eres miembro? <a href="signup.php">Registrate</a></strong>
						</div><!-- signin0-info -->
					</div><!-- col-sm-7 -->
					<div class="col-md-5">
						<form 
							method="post" 
							id="sesion"
							onsubmit="event.preventDefault();  validate()" 
							enctype="multipart/form-data">
							<h4 class="nomargin">Iniciar Sesion</h4>
							<p class="mt5 mb20">
								Verifica solicitudes nuevas para autorizar
							</p>
							<input 
								required="1" 
								type="email" 
								class="form-control uname" 
								placeholder="Correo" 
								name="maildep" 
								id="maildep"/>
							<input 
								required="1" 
								type="password" 
								class="form-control pword" 
								placeholder="Contraseña" 
								name="passdep" 
								id="passdep"/>
							<a href=""><small>¿Olvidaste tu contraseña?</small></a>
							<button class="btn btn-success btn-block" type="submit" id="btnSubir">
								Iniciar
							</button>
						</form>
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
		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/jquery-migrate-1.2.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/modernizr.min.js"></script>
		<script src="../js/jquery.sparkline.min.js"></script>
		<script src="../js/jquery.cookies.js"></script>
		<script src="../js/toggles.min.js"></script>
		<script src="../js/retina.min.js"></script>
		<script src="../assets/sweetalert/dist/sweetalert2.min.js"></script>
		<script src="../js/custom.js"></script>
		<!-- <script src="js/sesion.js"></script> -->
		<script>
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
				
				$("#sesion").find(':input').each(function(key, value){
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
				
				console.log('==========> done DATA', data);
					
				$.ajax({
					data : data,
					url : '../ajax.php?c=dependencies&f=signin',
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done signin', resp);
					
					if(resp.status === 1){
						location.href="index.php";
					}else{
						swal({
							title : 'Datos no validos',
							text : 'Revisa que el correo y la contraseña sea correctos',
							timer : 5000,
							showConfirmButton : true,
							type : 'warning'
						});
					}
				}).fail(function(resp) {
					console.log('==========> fail !!! save', resp);
					
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