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
		  	$html = '';
			
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
			
		  	try {
				$q_user_mail = "SELECT
				  					u.mail
				  				FROM
				  					users u
				  				LEFT JOIN
				  						pays p
				  					ON
				  						p.user_id = u.id
				  				WHERE
				  					p.pay_id = '".$id_orden_open."'";
				$user_mail = mysqli_query($conexion, $q_user_mail);
				
				while ($fila = mysqli_fetch_assoc($user_mail)) {
					$correo = $fila['mail'];
				}
				
				if (empty($correo)) {
					$encode = json_encode($json);
					$correo = 'fertekvia@gmail.com';
					$html = 'Correo no encontrado:<br>'.$encode;
				}
			} catch (mysqli_sql_exception $e) {
				$correo = $e;
			}
			
			if (empty($html)) {
				$html = "Tu siguiente compra se completo:<br>
					        ".$json -> transaction -> description."<br>
					        Por el monto de $".$json -> transaction -> amount;
			}
			
		// Configuration mail
			$mail = new PHPMailer();
			$mail -> IsSMTP();
			$mail -> SMTPAuth = true;
			$mail -> SMTPSecure = "ssl";
			$mail -> Host = "smtp.gmail.com";
			$mail -> Port = 465;
			$mail -> Username = "tekviaprogramacion@gmail.com";
			$mail -> Password = "tekvia123";
			$mail -> setFrom('tekviaprogramacion@gmail.com', 'Municiapp');
			
		// Mail message
			$mail -> Subject = "Confirmacion de pago";
			$mail -> AltBody = "Confirmacion de pago";
			$mail -> MsgHTML($html);
			
		// More configuration mail
			$mail -> AddReplyTo("$correo");
			$mail -> AddAddress("$correo");
			$mail -> IsHTML(true);
			
		//Envio de correo
			try {
				$mail -> send();
			} catch(phpmailerException $e) {
				var_dump($e);
			}
		} elseif ($json -> transaction -> status == 'failed') {
			$correo = "fertekvia@gmail.com";
			$mail = new PHPMailer();
			$mail -> IsSMTP();
			$mail -> SMTPAuth = true;
			$mail -> SMTPSecure = "ssl";
			$mail -> Host = "smtp.gmail.com";
			$mail -> Port = 465;
			$mail -> Username = "tekviaprogramacion@gmail.com";
			$mail -> Password = "tekvia123";
			$mail -> setFrom('tekviaprogramacion@gmail.com', 'Municiapp');
			$mail -> Subject = "Funcion de cronJob";
			$mail -> AltBody = "Esta es la fecha";
			$algo = json_encode($json);
			$mail -> MsgHTML($algo);
			$mail -> AddReplyTo("$correo");
			$mail -> AddAddress("$correo");
			$mail -> IsHTML(true);
			
			if (!$mail -> send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail -> ErrorInfo;
			} else {
				echo 'Message has been sent';
			}
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
		$mail -> setFrom('tekviaprogramacion@gmail.com', 'Municiapp');
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
