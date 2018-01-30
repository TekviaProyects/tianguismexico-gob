<?php
error_reporting(0);
// error_reporting(E_ALL);

//Carga la pays
require ('controllers/common.php');
//Carga el modelo para este controlador
require ("models/pays.php");

class pays extends Common {
	public $paysModel;
	private $production = 0;
	
//Se crea el objeto que instancia al modelo que se va a utilizar
	function __construct() {
		$this -> paysModel = new paysModel();
	}
	
///////////////// ******** ----							 new_pay						------ ************ //////////////////
//////// Generate a new pay
	// The parameters that can receive are:
		
	function new_pay($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		session_start();
		
	// Validate if exists pay without paying
		$exists['status'] = " 0 ";
		$exists['request_id'] = $objet['request_id'];
		$exists = $this -> paysModel -> list_pays($exists);
		if($exists['total'] > 0){
			$resp['status'] = 1;
			$resp['url'] = $exists['rows'][0]['url'];
			echo json_encode($resp);
			
			return;
		}
		
	// Import openpay library
		require('plugins/openpay/Openpay.php');
		include('controllers/openpay.php' );
		
	// Call the function to generate a charge
		$open_pay = new openpayObject();
		
		$objet['o_id'] = $_SESSION['user']['o_id'];
		
		$customer = $open_pay -> get_customer($objet);
		
		if($customer['status'] == 2){
			$objet['name'] = $_SESSION['user']['nombre'];
			$objet['email'] = $_SESSION['user']['mail'];
			$objet['external_id'] = $_SESSION['user']['id'];
			
			$customer = $open_pay -> add_customer($objet);
			$o_id = $customer->id;
			
			$data['id'] = $_SESSION['user']['id'];
			$data['o_id'] = $o_id;
			$resp['result'] = $this -> paysModel -> update_user($data);
			
			$_SESSION['user']['o_id'] = $o_id;
		}else{
			$customer = $customer['result'];
			$o_id = $customer->id;
		}
		
	// Charge
		$caducidad = date('Y-m-d H:i:s');
		$caducidad = strtotime('+3 day',strtotime($caducidad));
		$data = array(
		    'method' => 'store',
		    'amount' => $objet['cost_request'],
		    'description' => 'Costo por derecho de solicitud Num. '.$objet['request_id'],
		    'due_date' => date('Y-m-d',$caducidad)
		);
		$cargo = $customer->charges->create($data);
		
	// Create a link to test or production
		$link = ($this->production == 0) ? 'sandbox-dashboard.openpay.mx' : 'dashboard.openpay.mx';
		$link = "https://".$link."/paynet-pdf/mngsvcdrvfxhfkedj98m/".$cargo->payment_method->reference;
		
	// Google short link
		require_once('plugins/google-api-php-client-2.2.0/vendor/autoload.php');
		require_once('controllers/Googl.class.php');
		$original = $link;
		$googl = new Googl('AIzaSyCsZOvqzL9c7_O7Fj7t3FDt77nejjwbZXw');
		$resp['url'] = $data_pay['url'] = $googl->shorten($link);
		unset($googl);
		
	// Save the pay in the DB
		$data_pay['user_id'] = $_SESSION['user']['id'];
		$data_pay['request_id'] = $objet['request_id'];
		$data_pay['pay_id'] = $cargo -> id;
		$data_pay['reference'] = $cargo->payment_method->reference;
		$data_pay['date'] = $cargo -> creation_date;
		$data_pay['due_date'] = date('Y-m-d',$caducidad);
		$resp['result'] = $this -> paysModel -> save_pay($data_pay);
		
		$resp['status'] = 1;
		echo json_encode($resp);
	}

///////////////// ******** ----						END new_pay							------ ************ //////////////////

///////////////// ******** ----						new_card_pay						------ ************ //////////////////
//////// Generate a new pay
	// The parameters that can receive are:
		
	function new_card_pay($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		$resp['status'] = 1;
		session_start();
		
	// Import openpay library
		require('plugins/openpay/Openpay.php');
		include('controllers/openpay.php' );
		
	// Call the function to generate a charge
		$open_pay = new openpayObject();
		
		$customer = array(
		     'name' => $_SESSION['user']['nombre'],
		     'email' => $_SESSION['user']['mail']
		);
		
		$chargeData = array(
		    'method' => 'card',
		    'source_id' => $objet["token_id"],
		    'amount' => $objet['cost_request'],
		    'description' => 'Costo por derecho de solicitud Num. '.$objet['request_id'],
		    'device_session_id' => $objet["deviceIdHiddenFieldName"],
		    'customer' => $customer
		);
		
		$cargo = $open_pay -> create_card_charge($chargeData);
		$status = $cargo['result'] -> status;
		
		if($status == "completed"){
			$data_pay['user_id'] = $_SESSION['user']['id'];
			$data_pay['request_id'] = $objet['request_id'];
			$data_pay['pay_id'] = $cargo['result'] -> id;
			$data_pay['date'] = $cargo['result'] -> creation_date;
			$data_pay['reference'] = $cargo['result'] -> authorization;
			$data_pay['status'] = 3;
			
			$resp['result'] = $this -> paysModel -> save_pay($data_pay);
			$resp['result'] = $this -> paysModel -> update_request($data_pay);
			$resp['mail'] = $_SESSION['user']['correo'];
		}else{
			$resp['status'] = 2;
			$resp['test'] = $cargo;
		}
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----						END new_card_pay					------ ************ //////////////////

}