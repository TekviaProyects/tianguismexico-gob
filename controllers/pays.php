<?php
//Carga la pays
require ('controllers/common.php');
error_reporting(E_ALL);
//Carga el modelo para este controlador
require ("models/pays.php");

class pays extends Common {
	public $paysModel;
	private $production = 0;
	private $open_pay_id = "mngsvcdrvfxhfkedj98m";
	private $open_pay_token = "sk_e9c168c23f464f7eb5a1c1c591d8c21e";
	
//Se crea el objeto que instancia al modelo que se va a utilizar
	function __construct() {
		$this -> paysModel = new paysModel();
	}
	
	function new_pay($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
		session_start();
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
			$o_id = $customer['result']->id;
		}
		
	// Charge
		$caducidad = date('Y-m-d');
		$caducidad = strtotime('+3 day',strtotime($caducidad));
		$data = array(
		    'method' => 'store',
		    'amount' => $objet['cost_request'],
		    'description' => 'Costo por derecho de solicitud',
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
		$data_pay['date'] = $cargo -> creation_date;
		$data_pay['pay_id'] = $cargo -> id;
		$data_pay['reference'] = $cargo->payment_method->reference;
		$data_pay['user_id'] = $_SESSION['user']['id'];
		$resp['result'] = $this -> paysModel -> save_pay($data_pay);
		
		$resp['status'] = 1;
		echo json_encode($resp);
	}
}