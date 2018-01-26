<?php
require ('controllers/common.php');
require ("models/requests.php");

class requests extends Common {
	public $requestsModel;
	function __construct() {
		$this -> requestsModel = new requestsModel();
	}

///////////////// ******** ----							 save								------ ************ //////////////////
//////// Call the function to save customer on the DB
	// The parameters that can receive are:
		// badge -> Number of badge customer 				// lu -> 1 -> Selected, 0 -> Not selected
		// clasification -> Customer clasification 			// ma -> 1 -> Selected, 0 -> Not selected
		// folio -> Customer folio 							// mi -> 1 -> Selected, 0 -> Not selected
		// job -> Customer job 								// ju -> 1 -> Selected, 0 -> Not selected
		// last_name -> Customer last name 					// vi -> 1 -> Selected, 0 -> Not selected
		// last_name2 -> Customer last name mom 			// sa -> 1 -> Selected, 0 -> Not selected
		// mail -> Customer mail 							// do -> 1 -> Selected, 0 -> Not selected
		// name -> Customer name
		// period -> Start date
		// period2 -> End date
		// schedule_end -> End schedulde
		// schedule_ini -> Start schedulde
		// sex -> 1 -> Man, 2-> Woman
		// sub_turn -> Customer sub turn
		// surface -> Local surface in metters
		// surface_type -> 1 -> Squares, 2-> Linear
		// Tel -> Customer phone number
		// turn -> Customer turn
		// ubication -> Local ubication
		// zone -> Local zone

	function save($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$rep['status'] = 1;

	// Save customer
		$rep['result'] = $this -> requestsModel -> save($objet);

		session_start();
		$_SESSION['dependencie'] = $_POST;

		echo json_encode($rep);
	}

///////////////// ******** ----						END save								------ ************ //////////////////

///////////////// ******** ----						update									------ ************ //////////////////
//////// Call the function to update customer and schedules on the DB
	// The parameters that can receive are:
		// badge -> Number of badge customer 				// lu -> 1 -> Selected, 0 -> Not selected
		// clasification -> Customer clasification 			// ma -> 1 -> Selected, 0 -> Not selected
		// folio -> Customer folio 							// mi -> 1 -> Selected, 0 -> Not selected
		// job -> Customer job 								// ju -> 1 -> Selected, 0 -> Not selected
		// last_name -> Customer last name 					// vi -> 1 -> Selected, 0 -> Not selected
		// last_name2 -> Customer last name mom 			// sa -> 1 -> Selected, 0 -> Not selected
		// mail -> Customer mail 							// do -> 1 -> Selected, 0 -> Not selected
		// name -> Customer name
		// period -> Start date
		// period2 -> End date
		// schedule_end -> End schedulde
		// schedule_ini -> Start schedulde
		// sex -> 1 -> Man, 2-> Woman
		// sub_turn -> Customer sub turn
		// surface -> Local surface in metters
		// surface_type -> 1 -> Squares, 2-> Linear
		// Tel -> Customer phone number
		// turn -> Customer turn
		// ubication -> Local ubication
		// zone -> Local zone


	function update($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$rep['status'] = 1;

	// Save customer
		$rep['result'] = $this -> requestsModel -> update($objet);

		echo json_encode($rep);
	}

///////////////// ******** ----							END update						------ ************ //////////////////

///////////////// ******** ----							 add							------ ************ //////////////////
//////// Loaded the view to add a customer
	// The parameters that can receive are:
		// div -> Div where the content is loaded

	function add($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;

		if($objet['edit'] == 1){
			$customer = $this -> requestsModel -> list_requests($objet);
			$customer = $customer['rows'][0];
		}

		require ('views/requests/add.php');
	}

///////////////// ******** ----						END add								------ ************ //////////////////

///////////////// ******** ----						list_requests						------ ************ //////////////////
////////Check the requests and loaded the view
	// The parameters that can receive are:
		// search -> Word or ID to search
		// state -> Dependencie state
		// municipality -> Dependencie municipality
		// status -> Requests status

	function list_requests($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		session_start();
		$objet = (empty($objet)) ? $_POST : $objet;

		$requests = $this -> requestsModel -> list_requests($objet);
		$requests = $requests['rows'];

		foreach ($requests as $key => $value) {
			$url = ($objet['from_user'] == 1) ? '' : '../';

			$requests[$key]['identificacion'] = str_replace('../../', $url, $value['identificacion']);
			$requests[$key]['comprobante'] = str_replace('../../', $url, $value['comprobante']);
			$requests[$key]['fotografia1'] = str_replace('../../', $url, $value['fotografia1']);
			$requests[$key]['fotografia2'] = str_replace('../../', $url, $value['fotografia2']);
			$requests[$key]['fotografia3'] = str_replace('../../', $url, $value['fotografia3']);
			$requests[$key]['fotografia4'] = str_replace('../../', $url, $value['fotografia4']);
			$requests[$key]['cartadelegado'] = str_replace('../../', $url, $value['cartadelegado']);
			$requests[$key]['cartaaceptacion'] = str_replace('../../', $url, $value['cartaaceptacion']);
			$requests[$key]['sanidad'] = str_replace('../../', $url, $value['sanidad']);
		}

		$objet_transfer['user_id'] = $_SESSION['user']['id'];
		$transfer_rights = $this -> requestsModel -> list_transfer_rights($objet_transfer);
		$transfer_rights = $transfer_rights['rows'];

		if ($objet['json'] == 1) {
			echo json_encode($requests);
		} else {
			$view = (!empty($objet['view'])) ? $objet['view'] : 'list_requests';

			require ('views/requests/'.$view.'.php');
		}
	}

///////////////// ******** ----						END list_requests					------ ************ //////////////////

///////////////// ******** ----						update_authorize					------ ************ //////////////////
//////// Update the request information
	// The parameters that can receive are:
		// request_id -> Request ID
		// status -> 1-> Approved, 2-> Denied
		// coment -> Request coment

	function update_authorize($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$rep['status'] = 1;
		$data['id'] = $objet['request_id'];
		$data['columns'] = '';
		$data2['colums1'] = '';

	// Buil the SQL
		$data['columns'] .= ($objet['status']) ? ' status = '.$objet['status'].', ' : '' ;
		$data['columns'] .= ($objet['coment']) ? ' comentario = \''.$objet['coment'].'\', ' : '' ;
		$data['columns'] = substr($data['columns'], 0, -2);

		$data2['columns1'] .= ($objet['status']) ? ' status = '.$objet['status'].', ' : '' ;
		$data2['columns1'] .= ($objet['user_id']) ? ' user_id = \''.$objet['user_id'].'\', ' : '' ;
		$data2['columns1'] .= ($objet['estadomx']) ? ' estadomx = \''.$objet['estadomx'].'\', ' : '' ;
		$data2['columns1'] .= ($objet['municipiomx']) ? ' municipiomx = \''.$objet['municipiomx'].'\', ' : '' ;
		$data2['columns1'] .= ($objet['request_id']) ? ' request_id = \''.$objet['request_id'].'\', ' : '' ;
		$data2['columns1'] = substr($data2['columns1'], 0, -2);

	// Update request information
		$rep['result'] = $this -> requestsModel -> update($data);
		$rep['result'] = $this -> requestsModel -> notificacion($objet);

		echo json_encode($rep);
	}

///////////////// ******** ----						END update_authorize				------ ************ //////////////////

///////////////// ******** ----						load_format							------ ************ //////////////////
//////// Load the view of the format
	// The parameters that can receive are:
		// request_id -> Request ID
		// div -> Div where the content is loaded

	function load_format($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;

		// require ('formatostianguis/solicituddepermiso.php');

		require('plugins/phpToPDF/phpToPDF.php');

	    //It is possible to include a file that outputs html and store it in a variable
	    //using output buffering.
	    ob_start();
	    include('formatostianguis/solicituddepermiso.php');
	    $my_html = ob_get_clean();

	    //Set Your Options -- we are saving the PDF as 'my_filename.pdf' to a 'my_pdfs' folder
	    $pdf_options = array(
	      "source_type" => 'html',
	      "source" => $my_html,
	      "action" => 'save',
	      "save_directory" => 'my_pdfs',
	      "file_name" => 'my_filename.pdf');

	    //Code to generate PDF file from options above
	    phptopdf($pdf_options);
	}

///////////////// ******** ----						END load_format					------ ************ //////////////////

///////////////// ******** ----						load_messages					------ ************ //////////////////
//////// Check the messages and loaded the view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// from -> Origen message(user mail or estate and municipality dependencie)
		// to -> Destination message(user mail or estate and municipality dependencie)

	function load_messages($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;

		$messages = $this -> requestsModel -> list_messages($objet);
		$messages = $messages['rows'];

		require ('views/requests/list_messages.php');
	}

///////////////// ******** ----					END load_messages					------ ************ //////////////////

///////////////// ******** ----					send_message						------ ************ //////////////////
//////// Call the function to save the message in the DB
	// The parameters can receive:
		// from -> User that send a message
		// to -> User that receive the message
		// request_id -> Request ID
		// message -> Message to send
		// div -> Div where the message is loaded

	function send_message($objet) {
    // If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
    // If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;

	// Validate that the message no are empty
		$resp['message'] = trim($objet['message']);
		if (empty($resp['message'])) {
			$resp['status'] = 2;
			echo json_encode($resp);
			return;
		}

	// Save the message
		$resp['result'] = $this -> requestsModel -> save_message($objet);
		$resp['message'] = $objet['message'];

		echo json_encode($resp);
	}

///////////////// ******** ---- 					FIN send_message					------ ************ //////////////////

///////////////// ******** ----						transfer_rights						------ ************ //////////////////
//////// Transfer the request to another user
	// The parameters that can receive are:
		// request_id -> Request ID
		// mail -> New user mail
		// reason -> Reason to transfer
		// cost -> Cost of the dependencie

	function transfer_rights($objet) {
    // If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
    // If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;
		$resp['message'] = 'Todo cool';

		session_start();
		if($objet['mail'] == $_SESSION['user']['correo']){
			$resp['status'] = 2;
			$resp['message'] = 'No puedes ceder los derechos a ti mismo';

			echo json_encode($resp);
			return;
		}

	// Validate if the new user exists
		$exists = $this -> requestsModel -> list_users($objet);

		if($exists['total'] < 1){
			$resp['status'] = 2;
			$resp['message'] = 'No existe ningun usuario con el correo actual';

			echo json_encode($resp);
			return;
		}

	// Validate if the request exists
		$objet_transfer['status'] = '0 OR t.status = 1';
		$objet_transfer['request_id'] = $objet['request_id'];
		$transfer_rights = $this -> requestsModel -> list_transfer_rights($objet_transfer);

		if($transfer_rights['total'] > 0){
			$resp['status'] = 2;
			$resp['message'] = 'Ya existe una solicitud similar a la actual';

			echo json_encode($resp);
			return;
		}

	// Save the data
		$objet['user_id'] =  $_SESSION['user']['id'];
		$objet['new_user_id'] =  $exists['rows'][0]['id'];
		$resp['result'] = $this -> requestsModel -> save_transfer_rights($objet);

		echo json_encode($resp);
	}

///////////////// ******** ---- 					FIN transfer_rights					------ ************ //////////////////

}

?>
