<div class="row">
	<div class="col-sm-12">
		<div class="signup-form-container">
			<div class="form-header">
				<h3 class="form-title"><i class="glyphicon glyphicon-cog"></i> Configuracion</h3>
			</div>
			<div class="form-body" style="padding: 30px">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<label>Numero maximo de solicitudes por dia:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-hashtag "></i>
							</span>
							<input 
							 	id="max_requests"
								onchange="dependencies.update_config({
									id: <?php echo $data['id'] ?>,
									column: 'max_requests',
									val: $(this).val()
								})"
								value="<?php echo $data['max_requests'] ?>"
								type="number" 
								class="form-control" 
								aria-describedby="basic-addon1">
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<label>Costo cesión de derechos:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon2">
								<i class="fa fa-usd "></i>
							</span>
							<input 
							 	id="cost_transfer_rights"
								onchange="dependencies.update_config({
									id: <?php echo $data['id'] ?>,
									column: 'cost_transfer_rights',
									val: $(this).val()
								})"
								value="<?php echo $data['cost_transfer_rights'] ?>"
								type="number" 
								class="form-control" 
								aria-describedby="basic-addon2">
						</div>
					</div>
				</div>
				<div class="row" style="padding-top: 10px">
					<div class="col-md-6 col-sm-12">
						<label>Costo de solicitud:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">
								<i class="fa fa-usd "></i>
							</span>
							<input 
							 	id="cost_request"
								onchange="dependencies.update_config({
									id: <?php echo $data['id'] ?>,
									column: 'cost_request',
									val: $(this).val()
								})"
								value="<?php echo $data['cost_request'] ?>"
								type="number" 
								min="49"
								class="form-control" 
								aria-describedby="basic-addon3">
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<label>Costo m2:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">
								<i class="fa fa-usd "></i>
							</span>
							<input 
							 	id="cost_m2"
								onchange="dependencies.update_config({
									id: <?php echo $data['id'] ?>,
									column: 'cost_m2',
									val: $(this).val()
								})"
								value="<?php echo $data['cost_m2'] ?>"
								type="number" 
								min="49"
								class="form-control" 
								aria-describedby="basic-addon3">
						</div>
					</div>
				</div>
				<div class="row" style="padding-top: 10px">
					<div class="col-sm12 col-md-6">
						<label>Costo pago de los derechos:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">
								<i class="fa fa-usd "></i>
							</span>
							<input 
							 	id="cost_payment_rights"
								onchange="dependencies.update_config({
									id: <?php echo $data['id'] ?>,
									column: 'cost_payment_rights',
									val: $(this).val()
								})"
								value="<?php echo $data['cost_payment_rights'] ?>"
								type="number"
								class="form-control" 
								aria-describedby="basic-addon3">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12" style="padding-top: 20px">
						<h4 class="form-title"><i class="fa fa-file-o"></i> Documentos</h4>
					</div>
					<div class="col-md-4 col-sm-12" style="padding-top: 10px">
						<form onsubmit="event.preventDefault();  validate()" id="form_document">
							<label>Nombre:</label>
							<input required="1" id="name" type="text" class="form-control"><br />
							<label>Archivo:</label>
							<input 
								id="file" 
								name="file" 
								required="1" 
								type="file" 
								class="form-control" 
								accept="application/pdf"><br />
							<button class="btn btn-success" type="submit">
								<i class="fa fa-check"> </i> Guardar
							</button>
						</form>
					</div>
					<div class="col-md-8 col-sm-12" id="div_documents" style="padding-top: 35px">
						<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="documents_table">
							<thead>
								<tr>
									<th>document</th>
									<th><i class="fa fa-search"></i> Ver</th>
									<th><i class="fa fa-times"></i> Eliminar</th>
								</tr>
							</thead>
							<tbody><?php
								foreach ($documents as $key => $value) { ?>
									<tr>
										<td><?php echo $value['name'] ?></td>
										<td align="center">
											<button
												data-toggle="modal" 
												data-target="#modal_details"
												class="btn btn-primary btn-block btnSubir"
												onclick="dependencies.load_pdf({
													url: '<?php echo $value['url'] ?>'
												})">
												<i class="fa fa-search fa-lg"></i> Ver
											</button>
										</td>
										<td align="center">
											<button 
												id="btn_<?php echo $value['id'] ?>"
												class="btn btn-danger btn-block btnSubir"
												onclick="dependencies.delete_document({
													id: <?php echo $value['id'] ?>,
													url: '<?php echo $value['url'] ?>',
													dependency_id: <?php echo $_SESSION['dependencie']['id'] ?>
												})">
												<i class="fa fa-times fa-lg"></i> Eliminar
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
					<div id="div_format" style="width: 90vw; min-height: 50vh; overflow-x: auto">
						<i class="fa fa-refresh"></i>
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
<script>
	$('#documents_table').DataTable({
	    fixedHeader: {
	        header: true,
	        footer: true
	    },
	    scrollX: true,
		language : {
			dom : 'Bfrtip',
			destroy: true,
			search : "<i class=\"fa fa-search\"></i>",
			lengthMenu : "_MENU_ por pagina",
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
	
	function validate () {
		var fileSize = $("#file")[0].files[0].size;
      		fileSize = fileSize / 1048576;
		
		if(fileSize > 5){
			swal({
				title : 'Tamaño no valido',
				text : 'El documento debe de pesar maximo 5mb',
				timer : 10000,
				showConfirmButton : true,
				type : 'warning',
				html: true
			});
			
			return;
		}
		
		var form = $('#form_document')[0];
		var data = new FormData(form);
		data.append("name", $("#name").val());
		$(".btnSubir").prop('disabled', true);
		
		console.log('==========> up_files_dep data', data);
		
		$.ajax({
			type : "POST",
			enctype : 'multipart/form-data',
			url : '../up_files_dep.php',
			data : data,
			processData : false,
			contentType : false,
			cache : false,
			timeout : 600000,
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done up_files_dep', resp);
			
			$(".btnSubir").prop('disabled', false);
			
			dependencies.save_document({
				dependency_id: <?php echo $_SESSION['dependencie']['id'] ?>,
				url: resp.url,
				name: $("#name").val()
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! save_document', resp);
			
			$(".btnSubir").prop('disabled', false);
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