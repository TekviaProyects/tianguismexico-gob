<?php

	if ($_SERVER['SERVER_NAME'] == 'localhost') {
		$conexion = mysqli_connect("localhost","root","","tianguis");
	} else {
		$conexion = mysqli_connect("localhost","c0260330_tiangui","LUri07geze","c0260330_tiangui");
	}

?>
