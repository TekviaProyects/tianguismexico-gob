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
	
	
	// echo "<pre>", print_r($requests), "</pre>";
	
	
	session_start();
?>
<style>
	canvas {
		/*display: block;*/
		/*margin: 0 auto;*/
		/*background: #fff;*/
		/*border-radius: 3px;*/
		/*box-shadow: 0px 0px 15px 3px #ccc;*/
		cursor: pointer;
	}
</style>
<div class="row" id="div_list">
	<div class="col-sm-12">
		<div class="signup-form-container">
			<div class="form-header">
				<h3 class="form-title"><i class="fa fa-archive"></i> Cesión de derechos</h3>
			</div>
			<div class="form-body" style="padding: 30px">
				<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="requests_table">
					<thead>
						<tr>
							<th># Solicitud</th>
							<th>Nombre</th>
							<th>Mail</th>
							<th>Fecha</th>
							<th>Ceder</th>
						</tr>
					</thead>
					<tbody><?php
						foreach ($requests as $key => $value) {
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
										data-toggle="modal" 
										data-target="#modal_details"
										class="btn btn-primary btn-block"
										onclick="$('#div_list').hide(); $('#div_data').show()">
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
	<div class="signup-form-container">
		<div class="form-header">
			<h3 class="form-title"><i class="fa fa-archive"></i> Cesión de derechos</h3>
		</div>
		<div class="form-body" style="padding: 30px">
			<div class="row">
				<div class="col-sm-12">
					<h3>Razón por la(s) cual(es) cede los derechos al Cesionario</h3>
					<textarea class="form-control" rows="3"></textarea>
				</div>
				<div class="col-sm-12">
					<h3>Informacion del nuevo comerciante</h3>
					<label>Apellido paterno:</label>
					<input id="last_name" class="form-control" type="text" />
					<label>Apellido materno:</label>
					<input id="last_name2" class="form-control" type="text" />
					<label>Nombre:</label>
					<input id="name" class="form-control" type="text" />
				</div>
			</div><br /><br />
			<div class="row">
				<div class="col-md-6">
					<div style="width: 300px;">
				<label style="padding-left: 12vh">Firma del cedente</label><br />
				<div class="image"><div id="canvas1Div"> </div></div>
				<button class="btn btn-default" id="clearCanvas1" style="margin-left: 13vh">limpiar</button><br><br><br>
			</div>
				</div>
				<div class="col-md-6">
					<label style="padding-left: 10vh">Firma del cesionario</label><br />
				<div class="image"><div id="canvas2Div"> </div></div><br>
				<button class="btn btn-default" id="clearCanvas2" style="margin-left: 13vh">limpiar</button>
				</div>
			</div>
			
			<!-- <div style="width: 300px;"> -->
				
			<!-- </div> -->
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
</script>