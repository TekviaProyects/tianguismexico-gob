<?php
date_default_timezone_set('America/Mexico_City');
		    include("../conection/conection.php");

$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$sexo = $_POST['sexo'];
$curp = $_POST['curp'];
$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$colonia = $_POST['colonia'];
$calle = $_POST['calle'];
$numeroext = $_POST['numeroext'];
$numeroint = $_POST['numeroint'];
$cp = $_POST['cp'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$tekvia = 'on';

$insertar = "insert into usuario(nombre, paterno, materno, sexo, curp, estado, municipio, colonia, calle, numeroext, numeroint, cp, celular, correo, contrasena, tekvia) values('$nombre', '$paterno', '$materno', '$sexo', '$curp', '$estado', '$municipio', '$colonia', '$calle', '$numeroext', '$numeroint', '$cp', '$celular', '$correo', '$contrasena', '$tekvia')";
						mysqli_query($conexion,$insertar);

        ?>
