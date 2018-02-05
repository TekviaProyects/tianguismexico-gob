<div class="d-sm-none d-none d-md-block">
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="permits_table">
		<thead>
			<tr>
				<th>#</th>
				<th># Permiso</th>
				<th>Periodo</th>
				<th>Descripción</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody><?php
			foreach ($permits as $key => $value) { 
				switch ($value['status']) {
					case 0:
						$text = 'Pendiente';
						$class = 'default';
						break;
					case 1:
						$text = 'Aprovada';
						$class = 'success';
						break;
					case 2:
						$text = 'Denegada';
						$class = 'danger';
						break;
					default:
						$text = 'N/A';
						$class = 'default';
						break;
				} ?>
				<tr>
					<td><?php echo $value['id'] ?></td>
					<td><?php echo $value['id_request'] ?></td>
					<td><?php echo $value['period'] ?></td>
					<td><?php echo $value['description'] ?></td>
					<td>
						<button class="btn btn-<?php echo $class ?> btn-block">
							<?php echo $text ?>
						</button>
					</td>
				</tr><?php
			} ?>
		</tbody>
	</table>
</div>
<div class="d-lg-none d-md-none"><?php
	foreach ($permits as $key => $value) {
		switch ($value['status']) {
			case 0:
				$text = 'Pendiente';
				$class = 'default';
				break;
			case 1:
				$text = 'Aprovada';
				$class = 'success';
				break;
			case 2:
				$text = 'Denegada';
				$class = 'danger';
				break;
			default:
				$text = 'N/A';
				$class = 'default';
				break;
		} ?>
		<div class="card text-center" style="margin-bottom: 15px">
			<div class="card-header">
				# <?php echo $value['id'] ?> / Permiso # <?php echo $value['id_request'] ?>
			</div>
			<div class="card-body">
				<p class="card-text"><?php echo $value['period'] ?></p>
				<p class="card-text"><?php echo $value['correo'] ?></p>
				<p class="card-text"><?php echo $value['description'] ?></p>
			</div>
			<div class="card-footer text-muted">
				<button class="btn btn-<?php echo $class ?> btn-block">
					<?php echo $text ?>
				</button>
			</div>
		</div><?php
	} ?>
</div>
<script>
	$('#permits_table').DataTable({
		order: [[ 0, "desc" ]],
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