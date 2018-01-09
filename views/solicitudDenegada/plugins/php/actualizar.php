<?php
	// echo "<pre>",  print_r($_REQUEST), print_r($_FILES), "</pre>";
	// return;
	
	session_start();
	include ("conexion.php");
	
	$remplazar = "../../../../solicitudes/usuarios/".$_SESSION['user']['id']."/".$_REQUEST['folder'];
	
	$destino1 = "$remplazar/"."ine.png";
	$destino2 = "$remplazar/"."csanidad.png";
	$destino3 = "$remplazar/"."cdelegado.png";
	$destino4 = "$remplazar/"."caceptacion.png";
	$destino5 = "$remplazar/"."comprobante.png";
	$destino6 = "$remplazar/"."f1.png";
	$destino7 = "$remplazar/"."f2.png";
	$destino8 = "$remplazar/"."f3.png";
	$destino9 = "$remplazar/"."f4.png";
	
	move_uploaded_file($_FILES['ife']['tmp_name'], $destino1);
	move_uploaded_file($_FILES['carta_sanidad']['tmp_name'], $destino2);
	move_uploaded_file($_FILES['carta_delegado']['tmp_name'], $destino3);
	move_uploaded_file($_FILES['carta_aceptacion']['tmp_name'], $destino4);
	move_uploaded_file($_FILES['comprobante']['tmp_name'], $destino5);
	move_uploaded_file($_FILES['foto1']['tmp_name'], $destino6);
	move_uploaded_file($_FILES['foto2']['tmp_name'], $destino7);
	move_uploaded_file($_FILES['foto3']['tmp_name'], $destino8);
	move_uploaded_file($_FILES['foto4']['tmp_name'], $destino9);
	
	$cambio = "	UPDATE 
	  				registros 
	  			SET 
	  				status = 1
	  			WHERE 
	  				id = " . $_REQUEST['request_id'];
	echo mysqli_query($conexion, $cambio);
?>