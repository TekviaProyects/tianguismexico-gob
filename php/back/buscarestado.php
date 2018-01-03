<?php
date_default_timezone_set('America/Mexico_City');

include ("../conection/conection.php");

$municipio = $_REQUEST['estado'];

if ($municipio == '1') {
	$insertarr = "select * from aguascalientes";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '2') {
	$insertarr = "select * from bajacalifornia";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '3') {
	$insertarr = "select * from bajacaliforniasur";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '4') {
	$insertarr = "select * from campeche";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '5') {
	$insertarr = "select * from coahuila";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '6') {
	$insertarr = "select * from colima";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '7') {
	$insertarr = "select * from chiapas";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '8') {
	$insertarr = "select * from chihuahua";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '9') {
	$insertarr = "select * from cdmx";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '10') {
	$insertarr = "select * from durango";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '11') {
	$insertarr = "select * from guanajuato";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '12') {
	$insertarr = "select * from guerrero";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '13') {
	$insertarr = "select * from hidalgo";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '14') {
	$i = 0;
	$rawdata = array();
	$insertarr = "select * from jalisco";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}

}

if ($municipio == '15') {
	$insertarr = "select * from mexico";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '16') {
	$insertarr = "select * from michoacan";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '17') {
	$insertarr = "select * from morelos";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '18') {
	$insertarr = "select * from nayarit";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '19') {
	$insertarr = "select * from nuevoleon";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '20') {
	$insertarr = "select * from oaxaca";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '21') {
	$insertarr = "select * from puebla";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}

if ($municipio == '22') {
	$insertarr = "select * from queretaro";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '23') {
	$insertarr = "select * from quintanaroo";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}

}
if ($municipio == '24') {
	$insertarr = "select * from sanluis";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '25') {
	$insertarr = "select * from sinaloa";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '26') {
	$insertarr = "select * from sonora";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '27') {
	$insertarr = "select * from tabasco";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '28') {
	$insertarr = "select * from tamaulipas";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '29') {
	$insertarr = "select * from tlaxcala";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '30') {
	$insertarr = "select * from veracruz";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '31') {
	$insertarr = "select * from yucatan";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
if ($municipio == '32') {
	$insertarr = "select * from zacatecas";
	$consulta = mysqli_query($conexion, $insertarr);
	while ($row = mysqli_fetch_array($consulta)) {
		$municipio = $row['municipio'];
		echo "<option value='$municipio'>$municipio</option>";
	}
}
?>
