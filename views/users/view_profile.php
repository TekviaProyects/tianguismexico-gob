<?php $url = 'users_files/'.$user['id'].'/perfil.png' ?>
<link rel="stylesheet" href="plugins/cropper-master/dist/cropper.min.css">
<link rel="stylesheet" href="plugins/cropper-master/examples/crop-avatar/css/main.css">
<div class="row">
	<div class="col-sm-12">
<!-- =====================________________				crop-logo					________________===================== -->

		<div id="crop-perfil" align="center">
			<!-- Current avatar -->
			<div class="avatar-view" title="Cambiar imagen">
				<img 
					src="<?php echo $url ?>" 
					alt="images/uploadfile.png">
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
						<form class="avatar-form" action="crop_user.php" enctype="multipart/form-data" method="post">
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
			<h3 class="nomargin">Datos de usuario</h3>
			<div class="mb10">
				<label class="control-label">Nombre</label>
				<input 
					value="<?php echo $user['name'] ?>" 
					required="1" 
					type="text" 
					class="form-control" 
					name="Nombre" 
					id="name"/>
				<label class="control-label">CURP</label>
				<input 
					value="<?php echo $user['curp'] ?>" 
					required="1" 
					type="text" 
					class="form-control" 
					name="CURP" 
					id="curp"/>
				<label class="control-label">Apellido paterno</label>
				<input 
					value="<?php echo $user['last_name'] ?>" 
					required="1" 
					type="text" 
					class="form-control" 
					name="Apellidos" id="last_name"/>
				<label class="control-label">Apellido materno</label>
				<input 
					value="<?php echo $user['last_name2'] ?>" 
					required="1" 
					type="text" 
					class="form-control" 
					name="Apellidos" 
					id="last_name2"/>
				<label class="control-label">Correo</label>
				<input 
					value="<?php echo $user['mail'] ?>" 
					required="1" 
					type="email" 
					class="form-control" 
					name="Correo" 
					id="mail"/>
				<label class="control-label">Codigo postal</label>
				<input 
					value="<?php echo $user['cp'] ?>" 
					required="1" 
					type="text" 
					class="form-control"
					name="Codigo postal" 
					id="cp"/>
				<label class="control-label">Estado</label>
				<select 
					onchange="dependencies.list_municipalities({
						div: 'municipality',
						from_user: 1,
						estado: $(this).val()
					})"
					required="1" 
					class="form-control" 
					name="state" 
					id="state">
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
				<select 
					value="<?php echo $user['municipality'] ?>" 
					required="1" 
					class="form-control" 
					name="municipality" 
					id="municipality">
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
				<input 
					value="<?php echo $user['colony'] ?>" 
					required="1" 
					type="text" 
					class="form-control"
					 name="Colonia" 
					 id="colony"/>
				<label class="control-label">Calle</label>
				<input 
					value="<?php echo $user['addres'] ?>" 
					required="1" 
					type="text" 
					class="form-control" 
					name="Calle" 
					id="addres"/>
				<label class="control-label">Num. Ext.</label>
				<input 
					value="<?php echo $user['num'] ?>" 
					required="1" 
					type="number" 
					class="form-control" 
					name="Numero Exterior" 
					id="num"/>
				<label class="control-label">Num. Int.</label>
				<input 
					value="<?php echo $user['num_int'] ?>" 
					type="number" 
					class="form-control" 
					name="Numero Interior" 
					id="num_int"/>
				<label class="control-label">Contraseña</label>
				<input 
					value="<?php echo $user['pass'] ?>" 
					required="1" 
					type="password" 
					class="form-control" 
					name="Contraseña" 
					id="pass"/>
				<label class="control-label">Confirmar contraseña</label>
				<input 
					value="<?php echo $user['pass'] ?>" 
					required="1" 
					type="password" 
					class="form-control" 
					name="Confirmar" 
					id="pass2"/>
			</div>
			<button class="btn btn-success" type="submit" id="btnSubir">
				Guardar
			</button>
		</form>
	</div>
</div>
<script src="plugins/cropper-master/examples/crop-avatar/js/main2.js"></script>
<script>
	$("#state").val(<?php echo $user['state'] ?>);
	dependencies.list_municipalities({
		div: 'municipality',
		from_user: 1,
		estado: <?php echo $user['state'] ?>
	});
	
	setTimeout(function(){
		$("#municipality").val('<?php echo $user['municipality'] ?>');
	}, 500);
	
	function validate () {
		var data = {},
			$required = [],
			message = 'Debes llenar los siguientes campos: \n',
			error = 0, 
			count = 0,
			$function  =  'edit';
		
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
		
		data.id = <?php echo $user['id'] ?>
		
		console.log('==========> done DATA', data);
		
		$("#btnEdit").prop('disabled', true);
		
		
		$.ajax({
			data : data,
			url : 'ajax.php?c=users&f='+$function,
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done editar', resp);
			
			swal({
				title : 'Datos guardados',
				text : 'Los datos se han guardado con exito',
				timer : 5000,
				showConfirmButton : true,
				type : 'success'
			});
			
			$("#btnEdit").prop('disabled', false);
		}).fail(function(resp) {
			console.log('==========> fail !!! editar', resp);
			
			$("#btnEdit").prop('disabled', false);
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