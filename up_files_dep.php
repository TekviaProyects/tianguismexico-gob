<?php
	session_start();
	$resp['status'] = 1;
	$target_dir = 'dep_files/'.$_SESSION['dependencie']['id'].'/';
	
	try {
		$path = $_FILES['file']['name'];
		$name = trim($_REQUEST['name']);
		$name = str_replace(' ', '_', $name);
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		
		$resp['result'] = move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$name.'.'.$ext);
		$resp['url'] = $target_dir.$name.'.'.$ext;
		
		echo json_encode($resp);
	} catch (Exception $e) {
		$resp['status'] = 2;
	    $resp['message'] = 'Excepción capturada: ' . $e->getMessage(). "\n";
		echo json_encode($resp);
	}
?>