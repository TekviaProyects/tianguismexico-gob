<?php
// Validate the documents
	if (empty($documents)) { ?>
		<div align="center">
			<h3>
				<span class="label label-default">
					* Sin resultados *
				</span>
			</h3>
		</div><?php

		return;
	}
?>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="documents_table">
	<thead>
		<tr>
			<th>Manuales</th>
			<th></th>
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
							url: '<?php echo $value['url'] ?>',
							from_user: 1
						})">
						<i class="fa fa-search fa-lg"></i> Consultar
					</button>
				</td>
			</tr><?php
		} ?>
	</tbody>
</table>
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
			lengthMenu : "_MENU_ Elementos por pagina",
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
