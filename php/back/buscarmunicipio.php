<?php
date_default_timezone_set('America/Mexico_City');

include ("../conection/conection.php");

$municipio = $_REQUEST['estado'];

if ($municipio == '1') {
	$insertarr = "select * from aguascalientes where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '2') {
	$insertarr = "select * from bajacalifornia where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '3') {
	$insertarr = "select * from bajacaliforniasur where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '4') {
	$insertarr = "select * from campeche where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '5') {
	$insertarr = "select * from coahuila where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '6') {
	$insertarr = "select * from colima where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '7') {
	$insertarr = "select * from chiapas where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '8') {
	$insertarr = "select * from chihuahua where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '9') {
	$insertarr = "select * from cdmx where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '10') {
	$insertarr = "select * from durango where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '11') {
	$insertarr = "select * from guanajuato where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '12') {
	$insertarr = "select * from guerrero where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '13') {
	$insertarr = "select * from hidalgo where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '14') {
	$insertarr = "select * from jalisco where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}

}

if ($municipio == '15') {
	$insertarr = "select * from mexico where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '16') {
	$insertarr = "select * from michoacan where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '17') {
	$insertarr = "select * from morelos where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '18') {
	$insertarr = "select * from nayarit where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '19') {
	$insertarr = "select * from nuevoleon where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '20') {
	$insertarr = "select * from oaxaca where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '21') {
	$insertarr = "select * from puebla where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}

if ($municipio == '22') {
	$insertarr = "select * from queretaro where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '23') {
	$insertarr = "select * from quintanaroo where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}

}
if ($municipio == '24') {
	$insertarr = "select * from sanluis where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '25') {
	$insertarr = "select * from sinaloa where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '26') {
	$insertarr = "select * from sonora where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '27') {
	$insertarr = "select * from tabasco where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '28') {
	$insertarr = "select * from tamaulipas where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '29') {
	$insertarr = "select * from tlaxcala where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '30') {
	$insertarr = "select * from veracruz where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '31') {
	$insertarr = "select * from yucatan where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
if ($municipio == '32') {
	$insertarr = "select * from zacatecas where id='1'";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "$municipio";
	}
}
?>
