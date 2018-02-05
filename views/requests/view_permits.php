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
<div class="row" id="div_permits">
	<div class="col-sm-12 d-sm-none d-none d-md-block">
		<div >
			<div>
				<h3>
					<i class="fa fa-check"></i> Permisos activos
				</h3>
			</div>
			<div style="padding: 30px">
				<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="requests_table">
					<thead>
						<tr>
							<th># Permiso</th>
							<th>Nombre</th>
							<th>Mail</th>
							<th>Historico</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody><?php
						foreach ($requests as $key => $value) { ?>
							<tr>
								<td><?php echo $value['id'] ?></td>
								<td><?php echo $value['nombre'] ?></td>
								<td><?php echo $value['correo'] ?></td>
								<td align="center">
									<button
										data-toggle="modal"
										data-target="#modal_permits"
										class="btn btn-primary btn-block"
										onclick="requests.list_permits({
											div: 'div_modal_permits',
											request_id: '<?php echo $value['id'] ?>',
											from_user: 1
										})">
										<i class="fa fa-list fa-lg"></i>
									</button>
								</td>
								<td align="center"><?php
									$valid = ($value['status_per'] == "") ? 999 : $value['status_per'];
									
									switch ($valid) {
										case 0: ?>
											<button class="btn btn-default btn-block">
												Pendiente
											</button><?php
											break;
										case 1: ?>
											<button 
												class="btn btn-success btn-block"
												onclick="
													$('#btn_permits').attr('id_request', <?php echo $value['id'] ?>);
													$('#div_calendar').show(); 
													$('#div_permits').hide(); 
												">
												Aprovada
											</button><?php
											break;
										case 2: ?>
											<button 
												class="btn btn-danger btn-block"
												onclick="
													$('#btn_permits').attr('id_request', <?php echo $value['id'] ?>);
													$('#div_calendar').show(); 
													$('#div_permits').hide(); 
												">
												Denegada
											</button><?php
											break;
										default: ?>
											<button 
												class="btn btn-primary btn-block"
												onclick="
													$('#btn_permits').attr('id_request', <?php echo $value['id'] ?>);
													$('#div_calendar').show(); 
													$('#div_permits').hide(); 
												">
												Solicitar
											</button><?php
											break;
									} ?>
								</td>
							</tr><?php
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-12 d-lg-none d-md-none"><?php
		foreach ($requests as $key => $value) { ?>
			<div class="card text-center" style="margin-bottom: 15px">
				<div class="card-header">
					Permiso # <?php echo $value['id'] ?>
				</div>
				<div class="card-body">
					<p class="card-text"><?php echo $value['nombre'] ?></p>
					<p class="card-text"><?php echo $value['correo'] ?></p>
					<p class="card-text"><?php echo $value['date'] ?></p>
					<p class="card-text"><?php echo $value['cost_request'] ?></p>
				</div>
				<div class="card-footer text-muted">
					<button
						data-toggle="modal"
						data-target="#modal_permits"
						class="btn btn-primary btn-block"
						onclick="requests.list_permits({
							div: 'div_modal_permits',
							request_id: '<?php echo $value['id'] ?>',
							from_user: 1
						})">
						<i class="fa fa-list fa-lg"></i>
					</button><?php
					$valid = ($value['status_per'] == "") ? 999 : $value['status_per'];
					
					switch ($valid) {
						case 0: ?>
							<button class="btn btn-default btn-block">
								Pendiente
							</button><?php
							break;
						case 1: ?>
							<button 
								class="btn btn-success btn-block"
								onclick="
									$('#btn_permits').attr('id_request', <?php echo $value['id'] ?>);
									$('#div_calendar').show(); 
									$('#div_permits').hide(); 
								">
								Aprovada
							</button><?php
							break;
						case 2: ?>
							<button 
								class="btn btn-danger btn-block"
								onclick="
									$('#btn_permits').attr('id_request', <?php echo $value['id'] ?>);
									$('#div_calendar').show(); 
									$('#div_permits').hide(); 
								">
								Denegada
							</button><?php
							break;
						default: ?>
							<button 
								class="btn btn-primary btn-block"
								onclick="
									$('#btn_permits').attr('id_request', <?php echo $value['id'] ?>);
									$('#div_calendar').show(); 
									$('#div_permits').hide(); 
								">
								Solicitar
							</button><?php
							break;
					} ?>
				</div>
			</div><?php
		} ?>
	</div>
</div>
<div id="div_calendar" style="display: none">
	<h3><i class="fa fa-outdent"></i> Solicitar</h3>
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<label>Fecha</label>
			<input class="form-control" id="period" type="text" name="daterange" style="cursor: pointer" />
		</div>
		<div class="col-sm-12 col-md-6">
			<label>Motivo de la solicitud</label>
			<textarea class="form-control" id="description"></textarea>
		</div>
	</div><br />
	<button 
		id_request=''
		onclick="requests.save_permits({
			id_request: $(this).attr('id_request'),
			description: $('#description').val(),
			period: $('#period').val(),
			from_user: 1
		})"
		id="btn_permits"
		type="button" 
		class="btn btn-success">
		Solicitar
	</button>
	<button type="button" class="btn btn-default" onclick="$('#div_calendar').hide(); $('#div_permits').show();">
		Cancelar
	</button>
</div>
<div class="modal fade" id="modal_permits" tabindex="-1" role="dialog" aria-labelledby="modal_permitsLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Historico</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="div_modal_permits">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>
	</div>
</div>
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
	
	var minDate = moment().format('YYYY-MM-DD');
	$('input[name="daterange"]').daterangepicker({
		locale: {
	      	format: 'YYYY-MM-DD',
	        separator: " - ",
	        applyLabel: "Aplicar",
	        cancelLabel: "Cancelar",
	        fromLabel: "De",
	        toLabel: "A",
	        customRangeLabel: "Personalizado",
	        daysOfWeek: [
	            "Do",
	            "Lu",
	            "Ma",
	            "Mi",
	            "Ju",
	            "Vi",
	            "Sa"
	        ],
	        monthNames: [
	            "Enero",
	            "Febrero",
	            "Marzo",
	            "Abril",
	            "Mayo",
	            "Junio",
	            "Julio",
	            "Agosto",
	            "Septiember",
	            "Octubre",
	            "Noviembre",
	            "Diciember"
	        ],
	        firstDay: 1
	    },
	    minDate: minDate
	});
</script>