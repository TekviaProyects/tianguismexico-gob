<!-- <iframe id="the_frame" src="" style="width: 100%; height: 100%"></iframe> -->


<?php $url = (!empty($user['picture'])) ? 'users_files/'.$user['id'].'/'.$user['picture'] : 'images/uploadfile.png'; ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="plugins/cropper-master/dist/cropper.min.css">
<link rel="stylesheet" href="plugins/cropper-master/examples/crop-avatar/css/main.css">
<div class="row">
	<div class="col-sm-12">
<!-- =====================________________				crop-logo					________________===================== -->

		<div id="crop-perfil">
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
				<input required="1" type="text" class="form-control" name="Nombre" id="name"/>
				<label class="control-label">CURP</label>
				<input required="1" type="text" class="form-control" name="CURP" id="curp"/>
				<label class="control-label">Apellido paterno</label>
				<input required="1" type="text" class="form-control" name="Apellidos" id="last_name"/>
				<label class="control-label">Apellido materno</label>
				<input required="1" type="text" class="form-control" name="Apellidos" id="last_name2"/>
				<label class="control-label">Correo</label>
				<input required="1" type="email" class="form-control" name="Correo" id="mail"/>
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
			<button class="btn btn-success" type="submit" id="btnSubir">
				Guardar
			</button>
		</form>
	</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="plugins/cropper-master/dist/cropper.min.js"></script>
<script src="plugins/cropper-master/examples/crop-avatar/js/main2.js"></script>
<script>
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
		
		console.log('==========> done DATA', data);
		
		$("#btnEdit").prop('disabled', true);
		
		$.ajax({
			data : data,
			url : '../ajax.php?c=dependencies&f='+$function,
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