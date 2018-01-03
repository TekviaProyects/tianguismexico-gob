<?php
// Validate the requests
	if (empty($requests)) {?>
		<div align="center">
			<h3>
				<span class="label label-default">
					* Sin resultados *
				</span>
			</h3>
		</div>
		<script>$("#search_expedients").focus();</script><?php
		
		return;
	} 
	
	session_start();
?>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="requests_table">
			<thead>
				<tr>
					<th># Solicitud</th>
					<th>Nombre</th>
					<th>Documentacion</th>
					<th>Aprobar</th>
					<th>Denegar</th>
				</tr>
			</thead>
			<tbody><?php
				foreach ($requests as $key => $value) {
					$hidden_su = '';
					$hidden_da = '';
					$disabled = '';
					$class = '';
					
					switch ($value['status']) {
						case 1:
							$hidden_da = ' style="display: none"';
							$disabled = ' disabled';
							$hidden_su = '';
							break;
						case 2:
							$hidden_su = ' style="display: none"';
							$disabled = ' disabled';
							$hidden_da = '';
							break;
					} ?>
					
					<tr>
						<td><?php echo $value['id'] ?></td>
						<td><?php echo $value['nombre'] ?></td>
						<td align="center">
							<button 
								data-toggle="modal" 
								data-target="#modal_details"
								class="btn btn-primary btn-block"
								onclick="requests.load_info_buttons({
									id: '<?php echo $value['id'] ?>',
									formato: '<?php echo $value['comprobante'] ?>',
									identificacion: '<?php echo $value['identificacion'] ?>',
									c_salubridad: '<?php echo $value['sanidad'] ?>',
									croquis: '<?php echo $value['fotografia1'] ?>',
									fotos: '<?php echo $value['fotografia2'] ?>',
									c_delegado: '<?php echo $value['cartadelegado'] ?>',
									c_aceptacion: '<?php echo $value['cartaaceptacion'] ?>',
									lat: '<?php echo $value['lat'] ?>',
									lng: '<?php echo $value['lng'] ?>',
									coment: '<?php echo $value['comentario'] ?>'
								})">
								<i class="fa fa-list fa-lg"></i>
							</button>
						</td>
						<td align="center">
							<button 
								<?php echo $hidden_su ?>
								<?php echo $disabled ?>
								id="btn_approved_<?php echo $value['id'] ?>"
								data-toggle="modal" 
								data-target="#modal_authorize"
								class="btn btn-success btn-block"
								onclick="requests.authorize({
									id: <?php echo $value['id'] ?>,
									status: 1
								})">
								<i class="fa fa-check fa-lg"></i>
							</button>
						</td>
						<td align="center">
							<button 
								<?php echo $hidden_da ?>
								<?php echo $disabled ?>
								id="btn_denied_<?php echo $value['id'] ?>"
								data-toggle="modal" 
								data-target="#modal_authorize"
								class="btn btn-danger btn-block"
								onclick="requests.authorize({
									id: <?php echo $value['id'] ?>,
									status: 2
								})">
								<i class="fa fa-ban fa-lg"></i>
							</button>
						</td>
					</tr><?php
				} ?>
			</tbody>
		</table>
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
							request_id=""
							id="btn_formato"
							class="btn btn-default" 
							onclick="requests.load_format({
								request_id: $(this).attr('request_id')
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
								request_id: $(this).attr('request_id')
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
								request_id: $(this).attr('request_id')
							})">
							C. Salubridad
						</button>
						<button 
							lat=""
							lng=""
							id="btn_croquis"
							class="btn btn-default" 
							onclick="init({
								lat: $(this).attr('lat'),
								lng: $(this).attr('lng')
							})">
							Croquis
						</button>
						<button 
							archive=""
							request_id=""
							id="btn_fotos"
							class="btn btn-default" 
							onclick="requests.load_document({
								archive: $(this).attr('archive'),
								request_id: $(this).attr('request_id')
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
								request_id: $(this).attr('request_id')
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
								request_id: $(this).attr('request_id')
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
						<img src="" alt=" " class="img-thumbnail" id="image_view">
					</div>
					<div class="col-sm-12" align="left">
						<h3 id="div_write_coment"></h3>
					</div>
					<iframe id="div_format" style="width: 90vw; height: 50vh; display: none"></iframe>
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
					<i class="fa fa-download"></i> Descargar
				</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_authorize" tabindex="-1" role="dialog" aria-labelledby="modal_authorizeLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="modal_authorizeLabel">Escribe un comentario</h4>
			</div>
			<div class="modal-body">
				Especifica la razon por al cual se autoriza o se denega la solicitud:<br />
				<textarea class="form-control" rows="3" id="coment"></textarea>
			</div>
			<div class="modal-footer">
				<button
					id="btn_authorize"
					status=""
					request_id=""
					type="button" 
					class="btn btn-info"
					onclick="requests.update_authorize({
						status: $(this).attr('status'),
						request_id: $(this).attr('request_id'),
						coment: $('#coment').val(),
						state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
						municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
					})">
					<i class="fa fa-check"></i> Guardar
				</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsZOvqzL9c7_O7Fj7t3FDt77nejjwbZXw&libraries=places,geometry&callback=init" async defer></script>
<script>
	
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
			// $('#google_map').css('height', '100%');
			$('#google_map').css('width', '90vw');
		}, 1000);
	}
	
	$("#search_expedients").focus();
///////////////// ******** -------					END init						------ ************ //////////////////

</script>