<?php
// Validate the requests
	if (empty($requests)) {?>
		<div align="center">
			<h3>
				<span class="label label-default">
					* Sin resultados *
				</span>
			</h3>
		</div><?php

		return;
	}
	
	session_start();
?>
<div class="row">
	<div class="col-sm-12">
		<div class="signup-form-container">
			<div class="form-header">
				<h3 class="form-title"><i class="fa fa-drivers-license-o"></i> Solicitudes</h3>
			</div>
			<div class="form-body" style="padding: 30px">
				<div class="d-sm-none d-none d-md-block">
					<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="requests_table">
						<thead>
							<tr>
								<th># Solicitud</th>
								<th>Nombre</th>
								<th>Mail</th>
								<th>Fecha</th>
								<th>Costo</th>
								<th>Documentación</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody><?php
							foreach ($requests as $key => $value) {
								$hidden_su = '';
								$hidden_da = '';
								$disabled = '';
								$class = '';
	
								switch ($value['status']) {
									case 0:
										$class = 'info';
										$text = 'Pendiente';
										break;
									case 1:
										$class = 'success';
										$text = 'Aprovada';
										break;
									case 2:
										$class = 'danger';
										$text = 'Denegada';
										break;
									case 3:
										$class = 'success';
										$text = 'Pagada';
										break;
								} ?>
								<tr>
									<td><?php echo $value['id'] ?></td>
									<td><?php echo $value['nombre'] ?></td>
									<td><?php echo $value['correo'] ?></td>
									<td><?php echo $value['date'] ?></td>
									<td><?php echo $value['cost_request'] ?></td>
									<td align="center"><?php
										if ($value['status'] == 2) { ?>
											<button
												onclick="requests.view_upload_files({
													id: '<?php echo $value['id'] ?>',
													from_user: 1
												})"
												class="btn btn-primary btn-block">
												<i class="fa fa-list fa-lg"></i>
											</button><?php
										} else { ?>
											<button
												data-toggle="modal"
												data-target="#modal_details"
												class="btn btn-primary btn-block"
												onclick="requests.load_info_buttons({
													id: '<?php echo $value['id'] ?>',
													formato: '<?php echo $value['comprobante'] ?>',
													identificacion: '<?php echo $value['identificacion'] ?>',
													c_salubridad: '<?php echo $value['sanidad'] ?>',
													f1: '<?php echo $value['fotografia1'] ?>',
													f2: '<?php echo $value['fotografia2'] ?>',
													f3: '<?php echo $value['fotografia3'] ?>',
													f4: '<?php echo $value['fotografia4'] ?>',
													c_delegado: '<?php echo $value['cartadelegado'] ?>',
													c_aceptacion: '<?php echo $value['cartaaceptacion'] ?>',
													lat: '<?php echo $value['lat'] ?>',
													lng: '<?php echo $value['lng'] ?>',
													coment: '<?php echo $value['comentario'] ?>'
												})">
												<i class="fa fa-list fa-lg"></i>
											</button><?php
										} ?>
									</td>
									<td align="center"><?php
										if ($value['status'] == 0) { ?>
											<button
												onclick="requests.data_pay({
													cost_request: <?php echo $value['cost_request'] ?>,
													request_id: <?php echo $value['id'] ?>
												})"
												data-toggle="modal"
												data-target="#modal_pay"
												id="btn_pay_<?php echo $value['id'] ?>"
												data-loading-text="Cargando..."
												class="btn btn-primary btn-block">
												<i class="fa fa-check fa-lg"></i> Pagar
											</button><?php
										} else { ?>
											<button class="btn btn-block btn-<?php echo $class ?>" disabled>
												<?php echo $text ?>
											</button><?php
										} ?>
									</td>
								</tr><?php
							} ?>
						</tbody>
					</table>
				</div>
				<div class="d-lg-none d-md-none">
				<!-- <div id="mobile_requests"> -->
					<?php
					foreach ($requests as $key => $value) {
						$hidden_su = '';
						$hidden_da = '';
						$disabled = '';
						$class = '';

						switch ($value['status']) {
							case 0:
								$class = 'info';
								$text = 'Pendiente';
								break;
							case 1:
								$class = 'success';
								$text = 'Aprovada';
								break;
							case 2:
								$class = 'danger';
								$text = 'Denegada';
								break;
							case 3:
								$class = 'success';
								$text = 'Pagada';
								break;
						} ?>
						<div class="card text-center" style="margin-bottom: 15px">
							<div class="card-header">
								SOLICITUD # <?php echo $value['id'] ?>
							</div>
							<div class="card-body">
								<p class="card-text"><?php echo $value['nombre'] ?></p>
								<p class="card-text"><?php echo $value['correo'] ?></p>
								<p class="card-text"><?php echo $value['date'] ?></p>
								<p class="card-text"><?php echo $value['cost_request'] ?></p>
							</div>
							<div class="card-footer text-muted"><?php
								if ($value['status'] == 2) { ?>
									<button
										onclick="requests.view_upload_files({
											id: '<?php echo $value['id'] ?>',
											from_user: 1
										})"
										class="btn btn-primary btn-block">
										<i class="fa fa-list fa-lg"></i>
									</button><?php
								} else { ?>
									<button
										data-toggle="modal"
										data-target="#modal_details"
										class="btn btn-primary btn-block"
										onclick="requests.load_info_buttons({
											id: '<?php echo $value['id'] ?>',
											formato: '<?php echo $value['comprobante'] ?>',
											identificacion: '<?php echo $value['identificacion'] ?>',
											c_salubridad: '<?php echo $value['sanidad'] ?>',
											f1: '<?php echo $value['fotografia1'] ?>',
											f2: '<?php echo $value['fotografia2'] ?>',
											f3: '<?php echo $value['fotografia3'] ?>',
											f4: '<?php echo $value['fotografia4'] ?>',
											c_delegado: '<?php echo $value['cartadelegado'] ?>',
											c_aceptacion: '<?php echo $value['cartaaceptacion'] ?>',
											lat: '<?php echo $value['lat'] ?>',
											lng: '<?php echo $value['lng'] ?>',
											coment: '<?php echo $value['comentario'] ?>'
										})">
										<i class="fa fa-list fa-lg"></i>
									</button><?php
								} 
								
								if ($value['status'] == 0) { ?>
									<button
										onclick="requests.data_pay({
											cost_request: <?php echo $value['cost_request'] ?>,
											request_id: <?php echo $value['id'] ?>
										})"
										data-toggle="modal"
										data-target="#modal_pay"
										id="btn_pay_<?php echo $value['id'] ?>"
										data-loading-text="Cargando..."
										class="btn btn-primary btn-block">
										<i class="fa fa-check fa-lg"></i> Pagar
									</button><?php
								} else { ?>
									<button class="btn btn-block btn-<?php echo $class ?>" disabled>
										<?php echo $text ?>
									</button><?php
								} ?>
							</div>
						</div><?php
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_pay">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title">Pagar</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row" id="div_pays_methods">
					<div class="col-sm-12 col-md-6" align="center" id="div_card">
						<button class="btn btn-primary" style="font-size: 40px" onclick="$('#div_card_pay').show()">
							<i class="fa fa-credit-card"></i> Tarjeta
						</button>
					</div>
					<div class="col-sm-12 col-md-6" align="center">
						<button 
							cost_request = ''
							request_id = ''
							onclick="requests.new_pay({
								btn: 'btn_pay_store',
								from_user: 1,
								cost_request: $(this).attr('cost_request'),
								request_id: $(this).attr('request_id')
							})"
							id="btn_pay_store"
							class="btn btn-info" 
							style="font-size: 40px">
							<i class="fa fa-barcode"></i> Tienda
						</button>
					</div>
				</div>
				<div class="row" style="padding-top: 20px; display: none" id="div_card_pay">
					<div class="col-sm-12">
						<div class="bkng-tb-cntnt">
							<div class="pymnts">
								<form action="#" method="POST" id="payment-form">
									<input type="hidden" name="token_id" id="token_id">
									<div class="pymnt-itm card active">
										<div class="pymnt-cntnt">
											<div class="sctn-row">
												<div class="sctn-col l">
													<label>Nombre del titular</label><br />
													<input type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name" class="form-control">
												</div>
												<div class="sctn-col">
													<label>Número de tarjeta</label><br />
													<input type="text" autocomplete="off" data-openpay-card="card_number" class="form-control">
												</div>
											</div>
											<div class="sctn-row">
												<div class="sctn-col l">
													<label>Fecha de expiración</label><br />
													<div class="sctn-col half l">
														<input type="text" placeholder="Mes" data-openpay-card="expiration_month" class="form-control">
													</div>
													<div class="sctn-col half l">
														<input type="text" placeholder="Año" data-openpay-card="expiration_year" class="form-control">
													</div>
												</div>
												<div class="sctn-col cvv">
													<label>Código de seguridad</label><br />
													<div class="sctn-col half l">
														<input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2" class="form-control">
													</div>
												</div>
											</div><br /><br />
											<div class="sctn-row">
												<button class="btn btn-primary btn-block" id="pay-button">Pagar</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="modal_detailsLabel">
	<div class="modal-dialog" style="width: 92vw" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="modal_detailsLabel">Detalles</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12" align="center">
						<button
							style="display: none"
							archive=""
							request_id=""
							id="btn_formato"
							class="btn btn-default"
							onclick="requests.load_format({
								request_id: $(this).attr('request_id'),
								from_user: 1
							})">
							Formato
						</button>
						<button
							archive=""
							request_id=""
							id="btn_identificacion"
							class="btn btn-default"
							onclick="requests.load_document({
								archive: $(this).attr('archive'),
								request_id: $(this).attr('request_id'),
								from_user: 1
							})">
							Identificacion
						</button>
						<button
							archive=""
							request_id=""
							id="btn_c_salubridad"
							class="btn btn-default"
							onclick="requests.load_document({
								archive: $(this).attr('archive'),
								request_id: $(this).attr('request_id'),
								from_user: 1
							})">
							C. Salubridad
						</button>
						<button
							archive=""
							request_id=""
							id="btn_croquis"
							class="btn btn-default"
							onclick="init({
								lat: $(this).attr('lat'),
								lng: $(this).attr('lng'),
								from_user: 1
							})">
							Croquis
						</button>
						<button
							archive=""
							request_id=""
							id="btn_fotos"
							class="btn btn-default"
							onclick="requests.covert_360({
								f1: $(this).attr('f1'),
								f2: $(this).attr('f2'),
								f3: $(this).attr('f3'),
								f4: $(this).attr('f4'),
								request_id: $(this).attr('request_id'),
								from_user: 1
							})">
							Fotos
						</button>
						<button
							archive=""
							request_id=""
							id="btn_c_delegado"
							class="btn btn-default"
							onclick="requests.load_document({
								archive: $(this).attr('archive'),
								request_id: $(this).attr('request_id'),
								from_user: 1
							})">
							C. Delegado
						</button>
						<button
							archive=""
							request_id=""
							id="btn_c_aceptacion"
							class="btn btn-default"
							onclick="requests.load_document({
								archive: $(this).attr('archive'),
								request_id: $(this).attr('request_id'),
								from_user: 1
							})">
							C. Aceptacion
						</button>
						<button
							coment=""
							id="btn_coment"
							class="btn btn-default"
							onclick="$('#image_view').attr('src', ''); $('#div_write_coment').html($(this).attr('coment'));">
							Comentario
						</button>
					</div>
				</div><br />
				<div class="row">
					<div class="col-sm-12" align="center">
						<img src="" class="img-thumbnail" id="image_view" data-images="" onerror="this.src='images/nothing.png';">
					</div>
					<div class="col-sm-12" align="center" id="div_360"> </div>
					<div class="col-sm-12" align="left">
						<h3 id="div_write_coment"></h3>
					</div>
					<div id="div_format" style="width: 90vw; min-height: 50vh; display: none; overflow-x: auto">

					</div>
					<div id="google_map" style="width: 885px; height: 400px" style="display: none" align="center">

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a
					href=""
					download=""
					id="btn_dowload_document"
					class="btn btn-info">
					<i class="fa fa-upload"></i> Subir cambios
				</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsZOvqzL9c7_O7Fj7t3FDt77nejjwbZXw&libraries=places,geometry&callback=init" async defer></script>
<script>
	$('#requests_table').DataTable({
	    fixedHeader: {
	        header: true,
	        footer: true
	    },
	    scrollX: true,
		language : {
			dom : 'Bfrtip',
			destroy: true,
			search : "<i class=\"fa fa-search\"></i>",
			lengthMenu : "_MENU_ Elementos por Página",
			zeroRecords : "No hay datos.",
			infoEmpty : "No hay datos para mostrar.",
			info : " ",
			infoFiltered : " -> <strong> _TOTAL_ </strong> resultados encontrados",
			paginate : {
				first : "Primero",
				previous : "<<",
				next : ">>",
				last : "Último"
			}
		}
	});

///////////////// ******** -------						init						------ ************ //////////////////
//////// Load a Google map
	// The parameters can receive:

	function init($objet) {
		if(!$objet)
			$objet = {
				lat: 0,
				lng: 0
			}

		console.log("==============> Objet init:", $objet);

		$("#image_view").attr("src", '');
		$('#div_write_coment').html('');
		$("#div_360").html('');
		$('#div_format').html('');
		$('#google_map').show();
		$('#div_format').hide();

		var coordenates ={},
			zoom = 15;

		coordenates.lat = parseFloat($objet.lat) || 0;
		coordenates.lng = parseFloat($objet.lng) || 0;

		if (coordenates.lat === 0 || coordenates.lng === 0) {
			zoom = 2;
		}

		var myLatlng = {
			lat : coordenates.lat,
			lng : coordenates.lng
		};

		var map = new google.maps.Map(document.getElementById('google_map'), {
			zoom : zoom,
			center : myLatlng
		});

		var marker = new google.maps.Marker({
			position : myLatlng,
			map : map,
			title : 'Local'
		});

		setTimeout(function(){
			$('#google_map').css('width', '90vw');
		}, 1000);
	}

///////////////// ******** -------					END init						------ ************ //////////////////

	OpenPay.setId('mngsvcdrvfxhfkedj98m');
	OpenPay.setApiKey('pk_778e93fd95eb4206a7db26db9389efbc');
	OpenPay.setSandboxMode(true);
//Se genera el id de dispositivo
	var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

	$('#pay-button').on('click', function(event) {
		event.preventDefault();
		$("#pay-button").prop("disabled", true);
		$("#pay-button").html("Cargando...");
		OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);
	});

	var sucess_callbak = function(response) {
		console.log("================> sucess_callbak", response);
		
		var token_id = response.data.id,
			data = {};
		
		$("#payment-form").find(':input').each(function(key, value){
			var id = this.id;
			
			if(id){
				data[id] = $(this).val();
			}
		});
		
		data.token_id = token_id;
		
		requests.new_card_pay({
			from_user: 1,
			data: data
		});
	};

	var error_callbak = function(response) {
		var desc = response.data.description != undefined ? response.data.description : response.message;
		alert("Datos no validos");
		$("#pay-button").prop("disabled", false);
		$("#pay-button").html("Pagar");
	};
</script>