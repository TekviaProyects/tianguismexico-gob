<?php
	date_default_timezone_set('America/Mexico_City');
	include ("../conection/conection.php");
	
	$correo = $_POST['correo'];
	$password = $_POST['password'];
	
	$insertarr = "	SELECT 
						* 
					FROM 
						registros 
					WHERE 
						correo='$correo' 
					ORDER BY 
						id 
					LIMIT 
						1";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$mail = $row['correo'];
		$contra = $row['password'];
		$tekvia = $row['tekvia'];
	}

// Validate if the user exists and the passwor is equals that the DB, if not return false
	if(!empty($mail) && $password != $contra){
		echo "false";
		return;
	}
	
	echo "true";
?>
