<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Este archivo recibe las notificaciones de openpay y realiza el procedimiento especifico
//Esta preparado apra que se añadan mas opciones de ser necesarias
$timezone = "America/Mexico_City";
date_default_timezone_set($timezone);
// include ('../php/conection/conection.php');
mysqli_report(MYSQLI_REPORT_STRICT);
$conexion = mysqli_connect("localhost","c0260330_tiangui","LUri07geze","c0260330_tiangui");

require ("../plugins/phpmailerlibs/class.phpmailer.php");
require ("../plugins/phpmailerlibs/class.smtp.php");
	
$obj = file_get_contents('php://input');
var_dump($obj);
$json = json_decode($obj);
$tipo = $json->type;
$id = $json->transaction->id;
//Selector que permite realizar una accion dependiendo el tipo de notificacion recibida
switch ($tipo) {
	//Procedimiento para notificacion de tipo cargo completado
	case 'charge.succeeded' :
		if ($json -> transaction -> status == 'completed') {
		//obtenemos el id de opnepay de la orden de pago
			$id_orden_open = $json -> transaction -> id;
		  	
		  	try {
				$update = "	UPDATE
			  					pays
			  				SET
			  					status = 3
			  				WHERE
			  					pay_id = '".$id_orden_open."'";
				$resultado = mysqli_query($conexion, $update);
			} catch (mysqli_sql_exception $e) {
				$resultado = $e;
			}
		  	
		  	$update = json_encode($update);
		  	$resultado = json_encode($resultado);
		  	
			
		  	try {
				$user_mail = "	SELECT
				  					u.mail
				  				FROM
				  					users u
				  				LEFT JOIN
				  						pays p
				  					ON
				  						p.user_id = u.id
				  				WHERE
				  					p.pay_id = '".$id_orden_open."'";
				$resultado = mysqli_query($conexion, $user_mail);
				
				while ($fila = mysqli_fetch_assoc($resultado)) {
					$correo = $fila['mail'];
				}
			} catch (mysqli_sql_exception $e) {
				$correo = $e;
			}
		  		$correo = json_encode($correo);

			$mail = new PHPMailer(true);

			//modificar en caso de utilizar un correo distinto a gmail
			$mail -> IsSMTP();
			$mail -> SMTPAuth = true;
			$mail -> SMTPSecure = "ssl";
			$mail -> Host = "smtp.gmail.com";
			$mail -> Port = 465;

			//Datos de acceso al smtp
			$mail -> Username = "tekviaprogramacion@gmail.com";
			$mail -> Password = "tekvia123";

			//Correo e informacion del remitente
			$mail -> setFrom('tekviaprogramacion@gmail.com', 'Tekvia');
			//Datos y contenido del correo
			$mail -> Subject = "Confirmacion de pago";
			$mail -> AltBody = "Confirmacion de pago";
			$mail -> MsgHTML("
				<!DOCTYPE html>
		        <html>
		        	<head>
		        		<meta charset='utf-8'>
		        		<title>Gracias por tu compra</title>
		        	</head>
		        	<body style='background-color:#F2F2F2!important;width:92%!important;margin-left:4px!important;position:absolute!important;'>
				        <div style='color:#2E2E2E!important;font-family:sans-serif!important;font-size:12px!important;font-weight:normal!important;'>
				        <div style='background-color:orange!important;width:100%!important;height:75px!important;'>
				          <img 
				          	style='height:50px!important;max-width: 60px!important;margin-top:10px!important;margin-left:5px!important;' 
				          	src='http://municiapp.com/images/logo.png'>
				        </div>
					    <div style='color:#2E2E2E!important;font-family:sans-serif!important;margin:8px!important;font-size:12px!important;font-weight:normal!important;'>
					        <h1>Municiapp</h1>
					        <div style='width:100%!important;height:2px!important;background-color:#848484!important;'></div>
					        <h3>Tu siguiente compra se completo</h3><br>
					        <h3>" . $json -> transaction -> description . "</h3><br>
					        <h3>Por el monto de $" . $json -> transaction -> amount . "</h3><br>
					        <h3>Con el ID: " . $id_orden_open . "</h3><br>
					        <p>Result: $resultado</p></ br>
					        <p>Query: $update</p></ br>
					        <p>Correo: $correo</p></ br>
					        <div style='width:100%!important;height:2px!important;background-color:#848484!important;'></div>
					        <h2>Ingresa ahora</h2>
				        </div>
				        <div style='width:100%!important;height:2px!important;background-color:#848484!important;'></div><br>
				        <div style='width:100%!important;height:10px!important;background-color:#2E2E2E!important;'></div>
				        </div>
		        	</body>
		        </html>
	        ");
			// $mail -> AddReplyTo("$correo");
			// $mail -> AddAddress("$correo");
			$mail -> AddReplyTo("fertekvia@gmail.com");
			$mail -> AddAddress("fertekvia@gmail.com");
			$mail -> IsHTML(true);

		//Envio de correo
			try {
				$mail -> send();
			} catch(phpmailerException $e) {
				var_dump($e);
			}

		} elseif ($json -> transaction -> status == 'failed') {
			var_dump($json -> transaction);
		}
		break;
	//No eliminar ya que sera necesario si desea migrar el proyecto a otro host para recibir la aprobacion de webhook
	//Por parte de openpay
	case 'verification' :
		//Correo al que decia recibir el codigo de verificacion puede cambiar de ser necesario
		$correo = "fertekvia@gmail.com";
		//Procedimiento de envio de correo por medio de phpmailer
		$mail = new PHPMailer();

		//modificar en caso de utilizar un correo distinto a gmail
		$mail -> IsSMTP();
		$mail -> SMTPAuth = true;
		$mail -> SMTPSecure = "ssl";
		$mail -> Host = "smtp.gmail.com";
		$mail -> Port = 465;

		//Datos de acceso al smtp
		$mail -> Username = "tekviaprogramacion@gmail.com";
		$mail -> Password = "tekvia123";

		//Correo e informacion del remitente
		$mail -> setFrom('tekviaprogramacion@gmail.com', 'Tekvia');
		//Datos y contenido del correo
		$mail -> Subject = "Funcion de cronJob";
		$mail -> AltBody = "Esta es la fecha";
		$mail -> MsgHTML("$json->verification_code");
		$mail -> AddReplyTo("$correo");
		$mail -> AddAddress("$correo");
		$mail -> IsHTML(true);

		//Envio de correo
		if (!$mail -> send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail -> ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		break;
	case 'charge.created' :
		//Correo al que decia recibir el codigo de verificacion puede cambiar de ser necesario
		$correo = "fertekvia@gmail.com";
		//Procedimiento de envio de correo por medio de phpmailer
		$mail = new PHPMailer();

		//modificar en caso de utilizar un correo distinto a gmail
		$mail -> IsSMTP();
		$mail -> SMTPAuth = true;
		$mail -> SMTPSecure = "ssl";
		$mail -> Host = "smtp.gmail.com";
		$mail -> Port = 465;

		//Datos de acceso al smtp
		$mail -> Username = "tekviaprogramacion@gmail.com";
		$mail -> Password = "tekvia123";

		//Correo e informacion del remitente
		$mail -> setFrom('tekviaprogramacion@gmail.com', 'Tekvia');
		//Datos y contenido del correo
		$mail -> Subject = "Cargo creado";
		$mail -> AltBody = "Esta es la fecha";
		$algo = json_encode($json);
		$mail -> MsgHTML($algo);
		// $mail -> MsgHTML('hola uqe haces');
		$mail -> AddReplyTo("$correo");
		$mail -> AddAddress("$correo");
		$mail -> IsHTML(true);

		//Envio de correo
		if (!$mail -> send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail -> ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		break;
	default :
		//Correo al que decia recibir el codigo de verificacion puede cambiar de ser necesario
		$correo = "fertekvia@gmail.com";
		//Procedimiento de envio de correo por medio de phpmailer
		$mail = new PHPMailer();

		//modificar en caso de utilizar un correo distinto a gmail
		$mail -> IsSMTP();
		$mail -> SMTPAuth = true;
		$mail -> SMTPSecure = "ssl";
		$mail -> Host = "smtp.gmail.com";
		$mail -> Port = 465;

		//Datos de acceso al smtp
		$mail -> Username = "tekviaprogramacion@gmail.com";
		$mail -> Password = "tekvia123";

		//Correo e informacion del remitente
		$mail -> setFrom('tekviaprogramacion@gmail.com', 'Tekvia');
		//Datos y contenido del correo
		$mail -> Subject = "Quien sabe uqe oedi";
		$mail -> AltBody = "Esta es la fecha";
		$mail -> MsgHTML('hola uqe haces');
		$mail -> AddReplyTo("$correo");
		$mail -> AddAddress("$correo");
		$mail -> IsHTML(true);

		//Envio de correo
		if (!$mail -> send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail -> ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		break;
}
?>
