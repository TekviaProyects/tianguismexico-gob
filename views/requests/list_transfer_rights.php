<?php
// Validate the requests
	if (empty($requests)) {?>
		<div align="center">
			<h5>
				<span class="label label-default">
					* Sin resultados *
				</span>
			</h5>
		</div><?php

		return;
	}

	session_start();
?>
<style>
	canvas {
		border-radius: 3px;
		box-shadow: 0px 0px 15px 3px #ccc;
		cursor: pointer;
	}
</style>
<div class="row" id="div_list_request">
	<div class="col-sm-12">
		<div>
			<div>
				<h5>
					<i class="fa fa-list"></i> Solicitudes Pendientes por Ceder
				</h5>
			</div>
			<div style="padding: 30px">
				<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="requests_table">
					<thead>
						<tr>
							<th># Permiso</th>
							<th>Cedente</th>
							<th>Cesionario</th>
							<th>Documentacion</th>
							<th>Estado</th>
							<th>Comentarios</th>
						</tr>
					</thead>
					<tbody><?php
						foreach ($transfer_rights as $key => $value) {
							$class = '';
							$text_status = '';

							switch ($value['status']) {
								case 0:
									$text_status = 'Pagar ahora';
									$class = '';
									break;

								case 1:
									$text_status = 'Pendiente';
									$class = 'warning';
									break;

								case 2:
									$text_status = 'Denegada';
									$class = 'danger';
									break;

								case 3:
									$text_status = 'Aceptada';
									$class = 'success';
									break;
							} ?>
							<tr>
								<td><?php echo $value['id'] ?></td>
								<td><?php echo $value['user_name'] ?></td>
								<td><?php echo $value['new_user_name'] ?></td>
								<td align="center">
									<button
										data-toggle="modal"
										data-target="#modal_details"
										class="btn btn-primary btn-block"
										onclick="requests.details_transfer({
											reason: '<?php echo $value['reason'] ?>',
											cost: '<?php echo $value['cost'] ?>',
											assignee: '<?php echo $value['assignee'] ?>',
											transferor: '<?php echo $value['transferor'] ?>',
											date: '<?php echo $value['date'] ?>'
										})">
										<i class="fa fa-list fa-lg"></i>
									</button>
								</td>
								<td align="center" class="<?php echo $class ?>"><?php
									if($value['status'] == 0){ ?>
										<button
											class="btn btn-success btn-block"
											onclick="">
											<i class="fa fa-usd fa-lg"></i> <?php echo $text_status; ?>
										</button><?php
									}else{
										echo $text_status;
									} ?>
								</td>
								<td align="center">
									<button
										class="btn btn-warning btn-block"
										onclick="">
										<i class="fa fa-comments-o fa-lg"></i>
									</button>
								</td>
							</tr><?php
						} ?>
					</tbody>
				</table>
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
				<h5 class="modal-title" id="modal_detailsLabel">Detalles</h5>
			</div>
			<div class="modal-body" id="div_modal_details">
				<div align="right" id="div_date">
					<?php echo date('Y-m-d H:i:s'); ?>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h5>Razón por la(s) cual(es) cede los derechos al Cesionario</h5>
						<div id="div_reason"> </div>
					</div>
				</div><br />
				<h5>Firmas de aprovacion</h5>
				<div class="row">
					<div class="col-sm-12 col-md-6" align="center">
						<label>Cedente:</label><br />
						<img
							src=""
							class="img-thumbnail"
							id="img_assignee"
							onerror="this.src='images/logo.png';"/>
					</div>
					<div class="col-sm-12 col-md-6" align="center">
						<label>Cesionario:</label><br />
						<img
							src=""
							class="img-thumbnail"
							id="img_transferor"
							onerror="this.src='images/logo.png';"/>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>
	</div>
</div>
<div class="row" id="div_new_request">
	<div class="col-sm-12">
		<div >
			<div>
				<h5>
					<i class="fa fa-archive"></i> Permisos Disponibles para Ceder
				</h5>
			</div>
			<div style="padding: 30px">
				<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="requests_table">
					<thead>
						<tr>
							<th># Permiso</th>
							<th>Nombre</th>
							<th>Mail</th>
							<th>Fecha</th>
							<th>Ceder</th>
						</tr>
					</thead>
					<tbody><?php
						foreach ($requests as $key => $value) {
							$cost = (!empty($value['cost_transfer_rights'])) ? $value['cost_transfer_rights'] : '---';
							$hidden_su = '';
							$hidden_da = '';
							$disabled = '';
							$class = ''; ?>

							<tr>
								<td><?php echo $value['id'] ?></td>
								<td><?php echo $value['nombre'] ?></td>
								<td><?php echo $value['correo'] ?></td>
								<td><?php echo $value['date'] ?></td>
								<td align="center">
									<button
										class="btn btn-primary btn-block"
										onclick="
											$('#div_new_request').hide();
											$('#div_list_request').hide();
											$('#div_data').show();
											$('#btn_transfer').attr('id_request', <?php echo $value['id'] ?>);
											$('#btn_transfer').attr('cost', '<?php echo $cost ?>');
											$('#cost').html('<?php echo $cost ?>');
										">
										<i class="fa fa-exchange fa-lg"></i>
									</button>
								</td>
							</tr><?php
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="div_data" style="display: none">
	<div>
		<div>
			<h5>
				<i class="fa fa-archive"></i> Cesión de derechos / Costo: $<span id="cost"></span>
			</h5>
		</div>
		<div style="padding: 30px">
			<div class="row">
				<form id="profileForm">
					<div class="col-sm-12 col-md-6">
						<h5>Razón por la(s) cual(es) cede los derechos al Cesionario</h5>
						<textarea class="form-control" rows="3" id="reason"></textarea>
					</div>
					<div class="col-sm-12 col-md-6">
						<h5>Correo del nuevo comerciante</h5>
						<input id="mail" class="form-control" type="mail"/>
					</div>
				</form>
			</div><br /><br />
			<label>Firma del cedente</label>&nbsp;&nbsp;
			<button class="btn btn-default" id="clearCanvas1">limpiar</button><br />
			<div class="image">
				<div id="canvas1Div"> </div>
			</div>
			<label>Firma del cesionario</label>&nbsp;&nbsp;
			<button class="btn btn-default" id="clearCanvas2">limpiar</button><br />
			<div class="image">
				<div id="canvas2Div"> </div>
			</div><br /><br />
			<button
				id="btn_transfer"
				onclick="requests.transfer_rights({
					from_user: 1,
					request_id: $(this).attr('id_request'),
					mail: $('#mail').val(),
					reason: $('#reason').val(),
					cost: $(this).attr('cost'),
					canva1: $(this).attr('canva1'),
					canva2: $(this).attr('canva2')
				})"
				canva1="0"
				canva2="0"
				class="btn btn-success">
				<i class="fa fa-check"></i> Guardar
			</button>
		</div>
	</div>
</div>

<script src="http://sweet.watermelonduck.com/js/main.js" async=""></script>
<script src="http://sweet.watermelonduck.com/js/swfobject.js" async=""></script>
<script src="js_system/paint2.js"></script>
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
			lengthMenu : "_MENU_ Elementos por Pagina",
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
</script>
