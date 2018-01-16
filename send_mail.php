<?php
 iconv_set_encoding("internal_encoding", "UTF-8");
// Si el objeto viene vacio(llamado desde el index) se le asigna el $_POST que manda el Index
// Si no conserva su valor normal
	$objet = $_REQUEST;
	
	// echo json_encode($objet);
	// return;
	
// Valida si viene del local host
	$url = 'http://municiapp.com/';
	
	require ("plugins/phpmailerlibs/class.phpmailer.php");
	require ("plugins/phpmailerlibs/class.smtp.php");
	
	$correom = 'abogados3@biagsa.com';
	// $correom = 'fertekvia@gmail.com';
	
	$mail = new PHPMailer();
	$mail -> IsSMTP();
	// $mail->SMTPDebug = 2;
	$mail -> SMTPAuth = true;
	$mail -> SMTPSecure = "ssl";
	$mail -> Host = "smtp.gmail.com";
	$mail -> Port = 465;
	$mail -> Username = "tekviaprogramacion@gmail.com";
	$mail -> Password = "tekvia123";
	
	$mail -> From = "Municiapp";
	$mail -> FromName = "Municiapp";
	$mail -> Subject = "Solicitud de informacion";
	$mail -> AltBody = "";
	
	$text = utf8_decode("
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset='utf-8'>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/> 
			</head>
			<body>
				<h1>Solicitud de información</h1>
				<div> 
					Nombre: " . $_REQUEST['name'] . "<br />
					Correo: " . $_REQUEST['mail'] . "<br />
					Teléfono: " . $_REQUEST['telefono'] . "<br />
					Estado: " . $_REQUEST['state'] . "<br />
					Municipio: " . $_REQUEST['municipiodep'] . "<br />
					Mensaje: " .$_REQUEST['info_message']. "<br />
				</div>
			</body>
		</html>
	");
	
	$mail -> MsgHTML($text);
	$mail -> AddReplyTo("$correom");
	$mail -> AddAddress("$correom");
	$mail -> IsHTML(true);
	
	$resp['result'] = $mail -> Send();
	
	if (!$resp['result']) {
		$resp['mensaje'] = $mail -> ErrorInfo;
	} else {
		$resp = 1;
	}
	
	echo json_encode($resp);
?>