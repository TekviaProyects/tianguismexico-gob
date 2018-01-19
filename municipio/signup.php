<?php
	session_start();
	
	$_SESSION['dependencie'] = '';
	
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
		<link href="../css/style.default.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../assets/sweetalert/dist/sweetalert2.min.css">
		<link rel="stylesheet" href="../plugins/cropper/dist/cropper.min.css">
		<link rel="stylesheet" href="../plugins/cropper/examples/crop-avatar/css/main.css">
	</head>
	<body class="signin">
		<section>
			<div class="signuppanel">
				<div class="row">
					<div class="col-md-6">
						<div class="signup-info">
							<div class="logopanel">
								<h1><span></span> Formulario de registro para dependencia. <span></span></h1>
							</div>
							<div class="mb20"></div>
							<div class="mb20"></div>
						</div>
					</div>
					<div class="col-md-6">
						<!-- onsubmit="return forM(this)" --> 
						
<!-- =====================________________				crop-logo					________________===================== -->

	<label class="control-label">Sube el logo.</label>
	<div id="crop-logo">
		<!-- Current avatar -->
		<div class="avatar-view" title="Clic para subir el logo">
			<img src="../plugins/cropper/examples/crop-avatar/images/picture.jpg" alt="Subir imagen">
		</div>
		<!-- Cropping modal -->
		<div 
			class="modal fade" 
			id="avatar-modal" 
			aria-hidden="true" 
			aria-labelledby="avatar-modal-label" 
			role="dialog" 
			tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form class="avatar-form" action="../crop_dep.php" enctype="multipart/form-data" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								&times;
							</button>
							<h4 class="modal-title" id="avatar-modal-label">Recortar imagen</h4>
						</div>
						<div class="modal-body">
							<div class="avatar-body">

								<!-- Upload image and data -->
								<div class="avatar-upload">
									<input type="hidden" class="avatar-src" name="avatar_src">
									<input type="hidden" class="avatar-data" name="avatar_data">
									<label for="avatarInput">Imagen</label>
									<input
									accept="image/*"
									capture="camera"
									type="file"
									class="avatar-input"
									id="avatarInput"
									name="avatar_file">
								</div>

								<!-- Crop and preview -->
								<div class="row">
									<div class="col-md-9">
										<div class="avatar-wrapper"></div>
									</div>
									<div class="col-md-3">
										<div class="avatar-preview preview-lg"></div>
										<div class="avatar-preview preview-md"></div>
										<div class="avatar-preview preview-sm"></div>
									</div>
								</div>

								<div class="row avatar-btns">
									<div class="col-md-9">
										<div class="btn-group">
											<button 
												style="height: 41px"
												type="button" 
												class="btn btn-primary" 
												data-method="rotate" 
												data-option="-90" 
												title="Rotate -90 degrees">
												<i class="fa fa-undo"> </i>
											</button>
											<button 
												type="button" 
												class="btn btn-primary" 
												data-method="rotate" 
												data-option="-15">
												15º
											</button>
											<button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">
												30º
											</button>
											<button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">
												45º
											</button>
										</div>
										<div class="btn-group">
											<button 
												style="height: 41px"
												type="button" 
												class="btn btn-primary" 
												data-method="rotate" 
												data-option="90" 
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"> </i>
											</button>
											<button type="button" class="btn btn-primary" data-method="rotate" data-option="15">
												15º
											</button>
											<button type="button" class="btn btn-primary" data-method="rotate" data-option="30">
												30º
											</button>
											<button type="button" class="btn btn-primary" data-method="rotate" data-option="45">
												45º
											</button>
										</div>
									</div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-primary btn-block avatar-save">
											Guardar
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div><!-- /.modal -->
		<!-- Loading state -->
		<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
	</div>
	
<!-- =====================________________				END crop-logo 				________________===================== -->

						<form 
							method="post" 
							id="formulario" 
							onsubmit="event.preventDefault();  validate()"
							enctype="multipart/form-data" >
							<h3 class="nomargin">Registro</h3>
							<p class="mt5 mb20">
								Ya eres miembro accede a tu panel de administracion? 
								<a href="signin.php"><strong>Inicia Sesion</strong></a>
							</p>
							<div class="mb10">
								<label class="control-label">Nombre de la dependencia</label>
								<input required="1" type="text" class="form-control" name="nombredep" id="nombredep"/>
								<label class="control-label">Direccion</label>
								<input required="1" type="text" class="form-control" name="direcciondep" id="direcciondep"/>
								<label class="control-label">Numero</label>
								<input required="1" type="text" class="form-control" name="numerodep" id="numerodep"/>
								<label class="control-label">Colonia</label>
								<input required="1" type="text" class="form-control" name="coloniadep" id="coloniadep"/>
								<label class="control-label">Estado</label>
								<select 
									onchange="dependencies.list_municipalities({
										div: 'municipiodep',
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
								<label class="control-label">C.P.</label>
								<input required="1" type="number" class="form-control" name="cpdep" id="cpdep"/>
								<label class="control-label">Telefono</label>
								<input required="1" type="tel" class="form-control" name="teldep" id="teldep"/>
								<label class="control-label">Correo Electronico</label>
								<input required="1" type="email" class="form-control" name="maildep" id="maildep"/>
								<label class="control-label">Contraseña de Acceso</label>
								<input required="1" type="password" class="form-control" name="passdep" id="passdep"/>
								<label class="control-label">Agente Inspector</label>
								<input required="1" type="text" class="form-control" name="inspdep" id="inspdep"/>
								<label class="control-label">Autorizaciones</label>
								<input required="1" type="text" class="form-control" name="autdep" id="autdep"/>
								<label class="control-label">Costo mt2 para municipio</label>
								<input required="1" type="number" class="form-control" name="mtdep" id="mtdep"/>
								<input type="text" id="input_logo" class="form-control" name="logo"  style="display: none" />
								<button class="btn btn-success btn-block" type="submit" id="btnSubir">
									Registrar
								</button>
							</div>
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
		
		<script src="../js/jquery-1.11.2.min.js"></script>
		<script src="../js/jquery-migrate-1.2.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/modernizr.min.js"></script>
		<script src="../js/jquery.sparkline.min.js"></script>
		<script src="../js/jquery.cookies.js"></script>
		<script src="../js/toggles.min.js"></script>
		<script src="../js/retina.min.js"></script>
		<script src="../js/select2.min.js"></script>
		<script src="../js/custom.js"></script>
		<script src="../assets/sweetalert/dist/sweetalert2.min.js"></script>
		<script src="../plugins/cropper/dist/cropper.min.js"></script>
		<script src="../plugins/cropper/examples/crop-avatar/js/main.js"></script>
		
	<!-- System -->
		<script src="../js_system/dependencies.js"></script>
		
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
				
			// Empty logo
				if (data.input_logo === '') {
					swal({
						title : 'Logo no valido',
						text : 'Debes subir un logo',
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
					url : '../ajax.php?c=dependencies&f='+$function,
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done agregar_nombre', resp);
					
					swal({
						title : 'Datos guardados',
						text : 'Los datos se han guardado con exito',
						timer : 5000,
						showConfirmButton : true,
						type : 'success'
					});
					
					$("#btnSubir").prop('disabled', false);
					location.href="index.php";
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