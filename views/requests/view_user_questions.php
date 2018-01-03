<?php 
	session_start();
?>
<div class="row">
	<div class="col-sm-3 col-md-4  personalize_scroll" style="overflow-y: scroll; max-height: 85vh; min-height: 85vh">
		<ul class="list-group">
			<li class="list-group-item" style="font-weight: bold">Folio - Municipio</li>
		</ul>
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
					onclick="help_desk.view_main({
						from_user: 1,
						div: 'div_user_questions',
						view: 'list_questions',
						state: '<?php echo $value['estadomx'] ?>',
						municipality: '<?php echo $value['municipiomx'] ?>'
					});"
					style="cursor: pointer" 
					class="list-group-item <?php echo $class ?>">
					<?php echo $value['id'].' - '.$value['municipiomx'] ?>
				</li><?php
			} ?>
		</ul>
	</div>
	<div class="col-sm-9 col-md-8" id="div_user_questions">
		
	</div>
</div>