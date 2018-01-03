<?php 
	session_start();
?>
<div class="row">
	<div class="col-sm-3 col-md-4  personalize_scroll" style="overflow-y: scroll; max-height: 85vh; min-height: 85vh">
		<ul class="list-group"><?php
			foreach ($requests as $key => $value) {
				$new_messages = (!empty($value['new_messages'])) ? $value['new_messages'] : '' ;
				
			// Apply the class by the status reservation
				switch ($value['status']) {
					case 1: // Aceppted
						$class = 'list-group-item-success';
						break;
					case 2: // Refuse
						$class = 'list-group-item-danger';
						break;
					default: // Active
						$class = '';
				}
				
				$data_messages = json_encode($value);
				$data_messages = str_replace('"', "'", $data_messages);
				$url = "clientes/".$value['u_id']."/anuncios/".$value['ad_id']."/".$value['picture']; ?>
				
				<li 
					onclick="
						requests.load_messages({
							from: '<?php echo $_SESSION['dependencie']['id'] ?>',
							to: '<?php echo $value['correo'] ?>',
							request_id: '<?php echo $value['id'] ?>',
							div: 'content_messages',
						});
						$('#title_messages').html('<?php echo $value['id'].' - '.$value['domicilio'] ?>');
						$('#div_send_message').show();
						requests.data_messages = <?php echo $data_messages ?>"
					style="cursor: pointer" 
					class="list-group-item <?php echo $class ?>">
					<?php echo $value['id'].' - '.$value['domicilio'] ?>
					<span class="badge" id="badge_<?php echo $value['id'] ?>">
						<?php echo $new_messages; ?>
					</span>
				</li><?php
			} ?>
		</ul>
	</div>
	<div class="col-sm-9 col-md-8">
		<div class="row">
			<div class="col-sm-12" align="center">
				<h6 id="title_messages" style="font-weight: bold">
					Da click en la solicitud para ver los mensajes
				</h6>
			</div>
			<div 
				class="col-sm-12 personalize_scroll" 
				id="content_messages" 
				style="overflow-y: scroll; max-height: 60vh;">
				<!-- In this Div the messages is loaded -->
			</div>
			<div class="col-sm-12" id="div_send_message" style="display: none">
				<div class="row">
					<div class="col-sm-12" style="padding-top: 40px">
						<div class="input-group input-group-lg">
							<input 
								onkeypress="if(event.keyCode == 13){requests.send_message({
									from: '<?php echo $_SESSION['dependencie']['id'] ?>',
									to: requests.data_messages.correo,
									request_id: requests.data_messages.id,
									message: $('#message').val(),
									div: 'content_messages'
								})}" 
								type="text" 
								id="message" 
								class="form-control" 
								placeholder="Escribe un mensaje...">
							<span class="input-group-btn">
								<button 
									onclick="requests.send_message({
										from: '<?php echo $_SESSION['dependencie']['id'] ?>',
										to: requests.data_messages.correo,
										request_id: requests.data_messages.id,
										message: $('#message').val(),
										div: 'content_messages'
									})"
									class="btn btn-warning" 
									type="button">
									<i class="fa fa-paper-plane"> </i> Enviar
								</button> 
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>