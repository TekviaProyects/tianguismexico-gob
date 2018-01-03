<?php
	session_start();
	$resp['status'] = 1;
	$target_dir = 'users_files/'.$_SESSION['user']['id'].'/';
	
	$resp['result'] = move_uploaded_file($_FILES["poliza"]["tmp_name"], $target_dir.'poliza.pdf');
	$resp['pdf'] = $target_dir.'poliza.pdf';
	
	echo json_encode($resp);
?>