<?php
require ('controllers/common.php');
require ("models/admon.php");

class admon extends Common {
	public $admonModel;
	function __construct() {
		$this -> admonModel = new admonModel();
	}

///////////////// ******** ----						create_question						------ ************ //////////////////
//////// Call the function to save the cuestion in the DB
	// The parameters that can receive are:
		// question -> Question capturate
		// answer -> Answer to the cuestion
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	function create_question($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;
		
	// Save question
		$resp['result'] = $this -> admonModel -> save_question($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----					END create_question						------ ************ //////////////////

///////////////// ******** ----					update_question							------ ************ //////////////////
//////// Call the function that update the question information in the DB
	// The parameters that can receive are:
		// question -> Question capturate
		// answer -> Answer to the cuestion
		// id -> Question ID
		
	function update_question($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;
		
	// Update question information
		$objet['columns'] .= (!empty($objet['question'])) ? 'question = \''.$objet['question'].'\', ' : '' ;
		$objet['columns'] .= (!empty($objet['answer'])) ? 'answer = \''.$objet['answer'].'\', ' : '' ;
		$objet['columns'] = substr($objet['columns'], 0, -2);
		$resp['result'] = $this -> admonModel -> update_question($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----					END update_question						------ ************ //////////////////

///////////////// ******** ----					delete_question							------ ************ //////////////////
//////// Call the function to delete the question from the DB
	// The parameters that can receive are:
		// id -> Question ID
		
	function delete_question($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;
		
	// Delete the question from the DB
		$resp['result'] = $this -> admonModel -> delete_question($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----						END delete_question					------ ************ //////////////////

///////////////// ******** ----						list_requests						------ ************ //////////////////
//////// Check the requests and return into array or loaded a view
	// The parameters that can receive are:
		// view -> View to load
		// id_dependencie -> Dependencie ID
		// json -> 1-> Response in JSON
	
	function list_requests($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		
		$requests = $this -> admonModel -> list_requests($objet);
		$requests = $requests['rows'];
		
		if($objet['json'] == 1){
			echo json_encode($requests);
		}else{
			$view = (!empty($objet['view'])) ? $objet['view'] : 'list_requests' ;
			
			require ('views/admon/'.$view.'.php');
		}
	}
	
///////////////// ******** ----					END list_requests						------ ************ //////////////////

///////////////// ******** ----					save_request							------ ************ //////////////////
//////// Call the function to save the requests in the DB
	// The parameters that can receive are:
		// title -> Request title
		// id_dependencie -> Dependencie ID
		
	function save_request($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;
		
	// Save question
		$resp['result'] = $this -> admonModel -> save_request($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----					END save_request						------ ************ //////////////////

///////////////// ******** ----						load_messages						------ ************ //////////////////
//////// Check the messages and loaded the view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// from -> Origen message(user mail or estate and municipality dependencie)
		// to -> Destination message(user mail or estate and municipality dependencie)
	
	function load_messages($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		
		$messages = $this -> admonModel -> list_messages($objet);
		$messages = $messages['rows'];
		
		require ('views/requests/list_messages.php');
	}
	
///////////////// ******** ----					END load_messages						------ ************ //////////////////

///////////////// ******** ----					send_message							------ ************ //////////////////
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
		$resp['result'] = $this -> admonModel -> save_message($objet);
		$resp['message'] = $objet['message'];
		
		echo json_encode($resp);
	}
	
///////////////// ******** ---- 					END send_message					------ ************ //////////////////

}

?>