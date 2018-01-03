<?php
	date_default_timezone_set('America/Mexico_City');
	include ("../conection/conection.php");
	
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];

// Check the user
	$insertarr = "	SELECT 
						* 
					FROM 
						users 
					WHERE 
						mail='$correo'
					AND
						pass='$contrasena'";
	$consulta = mysqli_query($conexion, $insertarr);
	
	if ($consulta -> num_rows > 0) {
		session_start();
		while ($row = mysqli_fetch_array($consulta)) {
			$_SESSION['user'] = $row;
			$_SESSION['user']['nombre'] = $row['name'];
			$_SESSION['user']['correo'] = $row['mail'];
		}
		
		echo "true";
	} else {
		echo "false";
	}
?>
