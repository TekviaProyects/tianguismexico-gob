<?php
	session_start();
	
	foreach ($notifications as $key => $value) { ?>
		<a 
			onclick="requests.list_requests({
				id: <?php echo $value['request_id'] ?>,
				div: 'contenedor',
				view: 'list_user_requests',
				mail: '<?php echo $_SESSION['user']['correo'] ?>',
				from_user: 1
			})"
			class="dropdown-item" 
			href="#">
			<?php echo $value['mensaje'] ?>
		</a><?php
	}

?>

