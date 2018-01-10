<link rel="stylesheet" href="plugins/cropper-master/dist/cropper.min.css">
<link rel="stylesheet" href="plugins/cropper-master/examples/crop-avatar/css/main.css">
Sube todos los documentos que se te solicitan, en formato .jpeg, o bien usa la camara
de tu celular para completar el registro.
<br>
<div class="col-md-6">
<!-- =====================________________				crop-ine					________________===================== -->

	<label class="control-label">Copia de Identificación Oficial.</label>
	<div id="crop-ine">
		<!-- Current avatar -->
		<div class="avatar-view" title="Subir imagen">
			<img src="images/picture.jpg" alt="Subir imagen" onerror="this.src='images/uploadfile.png';">
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
					<form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="-90"
												title="Rotate -90 degrees">
												<i class="fa fa-undo"></i>
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="90"
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"></i>
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
										<button class="btn btn-success btn-block" type="submit" id="return4"> regresar </button>
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

<!-- =====================________________				END crop-ine 				________________===================== -->

<!-- =====================________________				crop-comprobante			________________===================== -->

	<label class="control-label">Copia de comprobante de domicilio actualizado (luz, agua, cable o teléfono).</label>
	<div id="crop-comprobante">
		<!-- Current avatar -->
		<div class="avatar-view" title="Subir imagen">
			<img src="images/picture.jpg" alt="Subir imagen" onerror="this.src='images/uploadfile.png';">
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
					<form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="-90"
												title="Rotate -90 degrees">
												<i class="fa fa-undo"></i>
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="90"
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"></i>
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

<!-- =====================________________				END crop-comprobante		________________===================== -->

	<label class="control-label">4 Fotografías del puesto panorámicas del punto a instalarse..</label>

<!-- =====================________________					crop-F1					________________===================== -->

	<div id="crop-f1">
		<!-- Current avatar -->
		<div class="avatar-view" title="Subir imagen">
			<img src="images/picture.jpg" alt="Subir imagen" onerror="this.src='images/uploadfile.png';">
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
					<form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="-90"
												title="Rotate -90 degrees">
												<i class="fa fa-undo"></i>
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="90"
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"></i>
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

<!-- =====================________________					END f1					________________===================== -->

<!-- =====================________________					crop-f2					________________===================== -->

	<div id="crop-f2">
		<!-- Current avatar -->
		<div class="avatar-view" title="Subir imagen">
			<img src="images/picture.jpg" alt="Subir imagen" onerror="this.src='images/uploadfile.png';">
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
					<form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="-90"
												title="Rotate -90 degrees">
												<i class="fa fa-undo"></i>
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="90"
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"></i>
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

<!-- =====================________________					END f2					________________===================== -->


<!-- =====================________________					crop-f3					________________===================== -->

	<div id="crop-f3">
		<!-- Current avatar -->
		<div class="avatar-view" title="Subir imagen">
			<img src="images/picture.jpg" alt="Subir imagen" onerror="this.src='images/uploadfile.png';">
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
					<form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="-90"
												title="Rotate -90 degrees">
												<i class="fa fa-undo"></i>
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="90"
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"></i>
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

<!-- =====================________________					END f3					________________===================== -->

<!-- =====================________________					crop-f4					________________===================== -->

	<div id="crop-f4">
		<!-- Current avatar -->
		<div class="avatar-view" title="Subir imagen">
			<img src="images/picture.jpg" alt="Subir imagen" onerror="this.src='images/uploadfile.png';">
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
					<form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="-90"
												title="Rotate -90 degrees">
												<i class="fa fa-undo"></i>
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="90"
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"></i>
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

<!-- =====================________________					END f4					________________===================== -->

<!-- =====================________________				crop-cdelegado				________________===================== -->

	<label class="control-label">Carta del Delegado o Presidente de colonos / vecinos.</label>
	<div id="crop-cdelegado">
		<!-- Current avatar -->
		<div class="avatar-view" title="Subir imagen">
			<img src="images/picture.jpg" alt="Subir imagen" onerror="this.src='images/uploadfile.png';">
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
					<form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="-90"
												title="Rotate -90 degrees">
												<i class="fa fa-undo"></i>
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="90"
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"></i>
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

<!-- =====================________________				END crop-cdelegado			________________===================== -->

<!-- =====================________________				crop-caceptacion			________________===================== -->

	<label class="control-label">Carta del Delegado o Presidente de colonos / vecinos.</label>
	<div id="crop-caceptacion">
		<!-- Current avatar -->
		<div class="avatar-view" title="Subir imagen">
			<img src="images/picture.jpg" alt="Subir imagen" onerror="this.src='images/uploadfile.png';">
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
					<form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="-90"
												title="Rotate -90 degrees">
												<i class="fa fa-undo"></i>
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
												type="button"
												class="btn btn-primary"
												data-method="rotate"
												data-option="90"
												title="Rotate 90 degrees">
												<i class="fa fa-repeat"></i>
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

<!-- =====================________________				END crop-caceptacion		________________===================== -->


 <div class="notoy">
 	<label class="control-label">Copia de Identificación Oficial.</label>
	<label  for="archivo1" class="btn btn-success btn-block">Subir Foto</label>
	<input type="text" id="a1" disabled required="1">
	<br>
	<br>
	<label class="control-label">Copia de comprobante de domicilio actualizado (luz, agua, cable o teléfono).</label>
	<label  for="archivo2" class="btn btn-success btn-block">Subir Foto</label>
	<input type="text" id="a2" disabled required="1">
	<br>
	<br>
	<label class="control-label">4 Fotografías del puesto panorámicas del punto a instalarse.</label>
	<label  for="archivo3" class="btn btn-success btn-block">Subir Foto 1</label>
	<input type="text" id="a3" disabled required="1">
	<br>
	<br>
	<label  for="archivo4" class="btn btn-success btn-block">Subir Foto 2</label>
	<input type="text" id="a4" disabled required="1">
	<br>
	<br>
	<label  for="archivo5" class="btn btn-success btn-block">Subir Foto 3</label>
	<input type="text" id="a5" disabled required="1">
	<br>
	<br>
	<label  for="archivo9" class="btn btn-success btn-block">Subir Foto 4</label>
	<input type="text" id="a9" disabled required="1">
	<br>
	<br>
	<label class="control-label">Carta del Delegado o Presidente de colonos / vecinos.</label>
	<label  for="archivo6" class="btn btn-success btn-block">Subir Foto</label>
	<input type="text" id="a6" disabled required="1">
	<br>
	<br>
	<label class="control-label">Carta de aceptación de vecinos.</label>
	<label  for="archivo7" class="btn btn-success btn-block">Subir Foto</label>
	<input type="text" id="a7" disabled required="1">
	<br>
	<br>
 </div>
</div>

<button class="btn btn-success btn-block" type="submit" id="registrar1">
	Enviar Solicitud
</button>
<script src="js/formulario.js"></script>
<script src="plugins/cropper-master/dist/cropper.min.js"></script>
<script src="plugins/cropper-master/examples/crop-avatar/js/main.js"></script>
