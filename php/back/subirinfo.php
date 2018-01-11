<?php
	date_default_timezone_set('America/Mexico_City');
	include("../conection/conection.php");
	
	$fecha = date("Y-m-d");
	$hora = date ("h-i-s");
	$date = date("Y-m-d H:i:s");
	
	$nombre = $_POST['nombre'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];
	$correo = $_POST['correo'];
	$domicilio = $_POST['domicilio'];
	$colonia1 = $_POST['colonia1'];
	$municipio1 = $_POST['municipio1'];
	$postal = $_POST['postal'];
	$telefono = $_POST['telefono'];
	$password = $_POST['password'];
	$estados = $_POST['estados'];
	$calle = $_POST['calle'];
	$numerolocal = $_POST['numerolocal'];
	$colonia2 = $_POST['colonia2'];
	$calles = $_POST['calles'];
	$referencia = $_POST['referencia'];
	$giro = $_POST['giro'];
	$mts2 = $_POST['mts2'];
	$inicio = $_POST['inicio'];
	$fin = $_POST['fin'];
	$propiedad = $_POST['propiedad'];
	$iestado = $_POST['iestado'];
	$imunicipio = $_POST['imunicipio'];
	$dia = $_POST['dia'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	
	$archivo1 = $_POST['archivo1'];
	$archivo2 = $_POST['archivo2'];
	$archivo3 = $_POST['archivo3'];
	$archivo4 = $_POST['archivo4'];
	$archivo5 = $_POST['archivo5'];
	$archivo6 = $_POST['archivo6'];
	$archivo7 = $_POST['archivo7'];
	$archivo8 = $_POST['archivo8'];
	$archivo9 = $_POST['archivo9'];
	
	$mostrar = "	SELECT 
	  					cost_request 
	  				FROM 
	  					dependencies 
	  				WHERE 
	  					estadodep = $iestado
	  				AND 
	  					municipiodep = '$imunicipio'";
	$resultado = mysqli_query($conexion, $mostrar);
	
	while ($row = mysqli_fetch_array($resultado)) {
		$cost_request = $row['cost_request'];
	}
	
	$insertar = "INSERT INTO 
					registros(nombre, paterno, materno, correo, domicilio, colonia1, municipio1, postal, telefono, 
								password, estado, calle, numerolocal, colonia2, calles, referencia, giro, mts2, inicio, 
								fin, propiedad, estadomx, municipiomx, identificacion, comprobante, fotografia1, fotografia2, 
								fotografia3, fotografia4, cartadelegado, cartaaceptacion, sanidad, dias, lat, lng, date,
								cost_request) 
					VALUES('$nombre', '$paterno', '$materno', '$correo', '$domicilio', '$colonia1', '$municipio1', '$postal', 
							'$telefono', '$password', '$estados', '$calle', '$numerolocal', '$colonia2', '$calles', 
							'$referencia', '$giro', '$mts2', '$inicio', '$fin', '$propiedad', '$iestado', '$imunicipio', 
							'../../$archivo1', '../../$archivo2', '../../$archivo3', '../../$archivo4', 
							'../../$archivo5', '../../$archivo9', '../../$archivo6', '../../$archivo7', '../../$archivo8', '$dia', 
							'$lat', '$lng', '$date', '$cost_request')";
	mysqli_query($conexion,$insertar);

?>