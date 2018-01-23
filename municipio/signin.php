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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../assets/sweetalert/dist/sweetalert2.min.css">
		<title>Iniciar Sesion</title>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
		<link href="../css/style.default.css" rel="stylesheet">
		<style>
			.modal-dialog {
			  width: 100%;
			  margin: 0;
			  padding: 0;
			}
			.modal-content {
			  width: 100vw;
			  border-radius: 0;
			}
		</style>
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
							<strong style="display: none">No eres miembro? <a href="signup.php">Registrate</a></strong>
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
		<div class="modal" tabindex="-1" role="dialog" id="modal_video">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-16by9" id="div_video">
							<iframe 
								id="the_frame" 
								class="embed-responsive-item" 
								src="https://www.youtube.com/embed/6wMYKvaO4zE?rel=0&autoplay=1" 
								frameborder="0" 
								allow="autoplay; encrypted-media" 
								allowfullscreen>
							</iframe>
						</div>
						<div id="div_info" class="col-md-6" style="display: none">
							<form 
								method="post" 
								id="form_info"
								onsubmit="event.preventDefault();  info()" 
								enctype="multipart/form-data">
								<h4 class="nomargin">Solicitar informacion</h4>
								<label>Nombre del presidente:</label>
								<input 
									required="1" 
									type="text" 
									class="form-control uname"
									name="name" 
									id="name"/>
								<label>Periodo de ejercicio:</label>
								<input 
									required="1" 
									type="text" 
									class="form-control uname"
									name="period" 
									id="period"/>
								<label>Oficina de:</label>
								<input 
									required="1" 
									type="text" 
									class="form-control uname"
									name="office" 
									id="office"/>
								¿Con cuántos puestos fijos, semi-fijos y ambulantes cuenta el municipio?
								<input 
									required="1" 
									type="text" 
									class="form-control pword" 
									name="num_pues" 
									id="num_pues"/>
								¿Cuántos mercados tiene el municipio?
								<input 
									required="1" 
									type="text" 
									class="form-control pword" 
									name="num_mer" 
									id="num_mer"/>
								¿Cuántos puestos móviles tiene el municipio?
								<input 
									required="1" 
									type="text" 
									class="form-control pword" 
									name="num_mo" 
									id="num_mo"/>
								<label>Correo:</label> 
								<input 
									required="1" 
									type="email" 
									class="form-control pword" 
									name="mail" 
									id="mail"/>
								<label>Telefono:</label>
								<input 
									required="1" 
									type="tel" 
									class="form-control pword" 
									name="telefono" 
									id="telefono"/>
								<label>Celular:</label>
								<input 
									required="1" 
									type="tel" 
									class="form-control pword" 
									name="cel" 
									id="cel"/>
								<label class="control-label">Estado</label>
								<select 
									onchange="dependencies.list_municipalities({
										div: 'municipiodep',
										estado: $(this).val()
									})"
									required="1" 
									class="custom-select custom-select-lg" 
									name="estadodep" 
									id="estadodep">
									<option value="1">Aguascalientes</option>
									<option value="2">Baja California</option>
									<option value="3">Baja California Sur</option>
									<option value="4">Campeche</option>
									<option value="5">Coahuila de Zaragoza</option>
									<option value="6">Colima</option>
									<option value="7">Chiapas</option>
									<option value="8">Chihuahua</option>
									<option value="9">Distrito Federal</option>
									<option value="10">Durango</option>
									<option value="11">Guanajuato</option>
									<option value="12">Guerrero</option>
									<option value="13">Hidalgo</option>
									<option value="14">Jalisco</option>
									<option value="15">México</option>
									<option value="16">Michoacán de Ocampo</option>
									<option value="17">Morelos</option>
									<option value="18">Nayarit</option>
									<option value="19">Nuevo León</option>
									<option value="20">Oaxaca</option>
									<option value="21">Puebla</option>
									<option value="22">Querétaro</option>
									<option value="23">Quintana Roo</option>
									<option value="24">San Luis Potosí</option>
									<option value="25">Sinaloa</option>
									<option value="26">Sonora</option>
									<option value="27">Tabasco</option>
									<option value="28">Tamaulipas</option>
									<option value="29">Tlaxcala</option>
									<option value="30">Veracruz de Ignacio de la Llave</option>
									<option value="31">Yucatán</option>
									<option value="32">Zacatecas</option>
								</select>
								<label class="control-label">Municipio</label>
								<select required="1" class="custom-select custom-select-lg" name="municipiodep" id="municipiodep">
									<option value="Aguascalientes">Aguascalientes</option>
									<option value="Asientos">Asientos</option>
									<option value="Calvillo">Calvillo</option>
									<option value="Cosio">Cosio</option>
									<option value="Jesus Maria">Jesus Maria</option>
									<option value="Pabellon de Arteaga">Pabellon de Arteaga</option>
									<option value="Rincon de Romos">Rincon de Romos</option>
									<option value="San Jose de Gracia">San Jose de Gracia</option>
									<option value="Tepezala">Tepezala</option>
									<option value="El Llano">El Llano</option>
									<option value="San Francisco de los Romo">San Francisco de los Romo</option>
								</select>
								<label class="control-label">Dirección</label>
								<input 
									required="1" 
									type="text" 
									class="form-control uname"
									name="address" 
									id="address"/>
								Mensaje:<br />
								<textarea id="info_message" class="form-control" required="1"></textarea>
								<button class="btn btn-success btn-block" type="submit" id="btn_send" style="margin-top: 20px">
									Enviar
								</button>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button 
							type="button" 
							class="btn btn-success" 
							onclick="$('#div_video').hide();$('#div_info').show(); $('#the_frame').attr('src', '');">
							Solicitar informacion
						</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Iniciar sesion
						</button>
					</div>
				</div>
			</div>
		</div>
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
		
	<!-- System -->
		<script src="../js_system/dependencies.js"></script>
		
		<script>
			jQuery(document).ready(function() {
				var c = jQuery.cookie('change-skin');
				if (c && c == 'greyjoy') {
					jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
				} else if (c && c == 'dodgerblue') {
					jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
				} else if (c && c == 'katniss') {
					jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
				}
				
				var url = $("#the_frame").attr('src');
				
			    $("#modal_video").on('hide.bs.modal', function(){
			        $("#the_frame").attr('src', '');
			    });
			    
			    $("#modal_video").on('show.bs.modal', function(){
			        $("#the_frame").attr('src', url);
			    });
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
			
			function info () {
				var data = {},
					$required = [],
					message = 'Debes llenar los siguientes campos: \n',
					error = 0, 
					count = 0;
				
				$("#form_info").find(':input').each(function(key, value){
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
				
				data.message = $('#info_message').val();
				data.state = $('#estadodep option:selected').text();
				
				console.log('==========> DATA', data);
				
				$("#btn_send").button('loading');
				
				$.ajax({
					data : data,
					url : '../send_mail.php',
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done info', resp);
					
					$("#btn_send").button('reset');
					
					swal({
						title : 'Datos enviados',
						text : 'Pronto nos pondremos en contacto contigo',
						timer : 5000,
						showConfirmButton : true,
						type : 'success'
					});
					
					$("#form_info")[0].reset();
					dependencies.list_municipalities({
						div: 'municipiodep',
						estado: 1
					})
				}).fail(function(resp) {
					console.log('==========> fail !!! save', resp);
					
					$("#btn_send").button('reset');
					
					swal({
						title : 'Error',
						text : 'A ocurrido un problema al guardar los datos',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
				});
			}
			
			$("#modal_video").modal('show');
		</script>
	</body>
</html>