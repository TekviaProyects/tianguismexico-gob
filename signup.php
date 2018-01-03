<?php
	session_start();
	
	$_SESSION['user'] = '';
	
	session_destroy();
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="images/favicon.png" type="image/png">
		<title>Para realizar un tramite registrate en nuestro sistema.</title>
		<link href="css/style.default.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert2.min.css">
	</head>
	<body class="signin">
		<section>
			<div class="signuppanel">
				<div class="row">
					<div class="col-md-6">
						<div class="signup-info">
							<div class="logopanel">
								<h1><span></span> Formulario de registro. <span></span></h1>
							</div>
							<div class="mb20"></div>
							<div class="mb20"></div>
						</div>
					</div>
					<div class="col-md-6">
						<!-- onsubmit="return forM(this)" --> 
						<form 
							method="post" 
							id="formulario" 
							onsubmit="event.preventDefault();  validate()"
							enctype="multipart/form-data" >
							<h3 class="nomargin">Registro</h3>
							<p class="mt5 mb20">
								¿Ya eres miembro? Accede a tu panel 
								<a href="index.php"><strong>Inicia Sesion</strong></a>
							</p>
							<div class="mb10">
								<label class="control-label">Nombre</label>
								<input required="1" type="text" class="form-control" name="Nombre" id="name"/>
								<label class="control-label">CURP</label>
								<input required="1" type="text" class="form-control" name="CURP" id="curp"/>
								<label class="control-label">Apellido paterno</label>
								<input required="1" type="text" class="form-control" name="Apellidos" id="last_name"/>
								<label class="control-label">Apellido materno</label>
								<input required="1" type="text" class="form-control" name="Apellidos" id="last_name2"/>
								<label class="control-label">Correo</label>
								<input required="1" type="email" class="form-control" name="Correo" id="mail"/>
								<label class="control-label">Estado</label>
								<select 
									onchange="dependencies.list_municipalities({
										div: 'municipiodep',
										from_user: 1,
										estado: $(this).val()
									})"
									required="1" 
									class="form-control" 
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
								<select required="1" class="form-control" name="municipiodep" id="municipiodep">
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
								<label class="control-label">Colonia</label>
								<input required="1" type="text" class="form-control" name="Colonia" id="colony"/>
								<label class="control-label">Calle</label>
								<input required="1" type="text" class="form-control" name="Colonia" id="addres"/>
								<label class="control-label">Num. Ext.</label>
								<input required="1" type="number" class="form-control" name="Numero Exterior" id="num"/>
								<label class="control-label">Num. Int.</label>
								<input type="number" class="form-control" name="Numero Interior" id="num_int"/>
								<label class="control-label">Contraseña</label>
								<input required="1" type="password" class="form-control" name="Contraseña" id="pass"/>
								<label class="control-label">Confirmar contraseña</label>
								<input required="1" type="password" class="form-control" name="Confirmar" id="pass2"/>
							</div>
							<button class="btn btn-success btn-block" type="submit" id="btnSubir">
								Registrar
							</button>
						</form>
					</div>
				</div>
				<div class="signup-footer">
					<div class="pull-left">
						&copy; 2017 Todos los derechos reservados
					</div>
					<div class="pull-right">
						Created By: <a href="tekvia.com.mx" target="_blank">Tekvia</a>
					</div>
				</div>
			</div>
		</section>
		
		<script src="js/jquery-1.11.2.min.js"></script>
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
		<!-- <script src="js/subir.js"></script> -->
		
	<!-- System -->
		<script src="js_system/dependencies.js"></script>
		
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
			
			function validate () {
				var data = {},
					$required = [],
					message = 'Debes llenar los siguientes campos: \n',
					error = 0, 
					count = 0,
					$function  =  'save';
				
				
				$("#formulario").find(':input').each(function(key, value){
					var required = $(this).attr('required'),
						valor = $(this).val(),
						id = this.id;
					
				// Validate that the required input not are empty
					if (required === '1' && valor.length <= 0) {
						error = 1;
		
						$required.push($(this).attr("name"));
					}else{
						if(id){
							data[id] = $(this).val();
						}
					}
				});
				
			// Build the error message
				if ($required.length > 0) {
					$.each($required, function(index, value) {
						message += '-->' + this + ' \n';
					});
				}
				
			// Invalid CURP
				if (data.curp.length < 18) {
					error = 1;
					message += '-->CURP no valida \n';
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
			
			// Invalid pass
				if (data.pass !== data.pass2) {
					swal({
						title : 'Las contraseñas no coinciden',
						text : 'Revisa las constraseñas',
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});
					
					return;
				}
				
				console.log('==========> done DATA', data);
				
				$("#btnSubir").prop('disabled', true);
				
				$.ajax({
					data : data,
					url : 'ajax.php?c=users&f='+$function,
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done save_user', resp);
					
					$("#btnSubir").prop('disabled', false);
					
					if(resp.status === 2){
						swal({
							title : 'Usuario existente',
							text : 'Este correo ya esta registrado, intenta iniciar sesion',
							timer : 7000,
							showConfirmButton : true,
							type : 'warning'
						});
						
						return;
					}
					
					swal({
						title : 'Datos guardados',
						text : 'Los datos se han guardado con exito',
						timer : 5000,
						showConfirmButton : true,
						type : 'success'
					});
					
					location.href="panel.php";
				}).fail(function(resp) {
					console.log('==========> fail !!! save', resp);
					
					$("#btnSubir").prop('disabled', false);
					swal({
						title : 'Error',
						text : 'A ocurrido un problema al guardar los datos',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
				});
			}
			
			var mostrarValor1 = function(x) {
				document.getElementById('campo11r').value = x;
			};
		</script>
	</body>
</html>