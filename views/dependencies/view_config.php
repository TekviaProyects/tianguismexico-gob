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
			</div>
		</div>
	</div>
</div>