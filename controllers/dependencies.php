<?php
require ('controllers/common.php');
require ("models/dependencies.php");

class dependencies extends Common {
	public $dependenciesModel;
	function __construct() {
		$this -> dependenciesModel = new dependenciesModel();
	}

///////////////// ******** ----							 save							------ ************ //////////////////
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
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		$rep['status'] = 1;
		
	// Save customer
		$rep['result'] = $this -> dependenciesModel -> save($objet);
		
		session_start();
		
		rename('dep_files/'.$_SESSION['dependencie']['folder'], 'dep_files/'.$rep['result']);
		
		$_SESSION['dependencie'] = $_REQUEST;
		$_SESSION['dependencie']['id'] = $rep['result'];
		$_SESSION['dependencie']['folder'] = $rep['result'];
		
		echo json_encode($rep);
	}
	
///////////////// ******** ----						END save							------ ************ //////////////////

///////////////// ******** ----						update								------ ************ //////////////////
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
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		$rep['status'] = 1;
		
	// Save customer
		$rep['result'] = $this -> dependenciesModel -> update($objet);
		
		echo json_encode($rep);
	}
	
///////////////// ******** ----						END update						------ ************ //////////////////

///////////////// ******** ----							 add							------ ************ //////////////////
//////// Loaded the view to add a customer
	// The parameters that can receive are:
		// div -> Div where the content is loaded
	
	function add($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
		if($objet['edit'] == 1){
			$customer = $this -> dependenciesModel -> list_dependencies($objet);
			$customer = $customer['rows'][0];
		}
		
		
		require ('views/dependencies/add.php');
	}
	
///////////////// ******** ----						END add								------ ************ //////////////////

///////////////// ******** ----						list_dependencies					------ ************ //////////////////
////////Check the dependencies and loaded the view
	// The parameters that can receive are:
		// name -> Customer name
	
	function list_dependencies($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
		$dependencies = $this -> dependenciesModel -> list_dependencies($objet);
		$dependencies = $dependencies['rows'];
		
		require ('views/dependencies/list_dependencies.php');
	}
	
///////////////// ******** ----						END list_dependencies				------ ************ //////////////////

///////////////// ******** ----							signin							------ ************ //////////////////
////////Check the dependencies and loaded the view
	// The parameters that can receive are:
		// name -> Customer name
	
	function signin($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		$resp['status'] = 1;
		
	// Check info
		$dependencie = $this -> dependenciesModel -> list_dependencies($objet);
		$dependencie = $dependencie['rows'][0];
	
	// No data
		if(empty($dependencie)){
			$resp['status'] = 2;
			echo json_encode($resp);
			
			return;
		}
		
		session_start();
		$_SESSION['dependencie'] = $dependencie;
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----						END signin							------ ************ //////////////////

///////////////// ******** ----						view_config							------ ************ //////////////////
//////// Loaded the view of the configurations
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// id -> Dependencie ID
	
	function view_config($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
		$data = $this -> dependenciesModel -> list_dependencies($objet);
		$data = $data['rows'][0];
		if($data['cost_request'] < 49) $data['cost_request'] = 49;
		
		$objet['estate'] = $_SESSION['dependencie']['estadodep'];
		$objet['municipality'] = $_SESSION['dependencie']['municipiodep'];
		$documents = $this -> dependenciesModel -> list_documents($objet);
		$documents = $documents['rows'];
		
		require ('views/dependencies/view_config.php');
	}
	
///////////////// ******** ----						END view_config						------ ************ //////////////////

///////////////// ******** ----						update_config						------ ************ //////////////////
//////// Update the dependencie configuration
	// The parameters that can receive are:
		// column -> Column to update
		// val -> Value of the column
		// id -> Dependencie ID
	
	function update_config($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		$resp['status'] = 1;
		
	// Update info
		$resp['result'] = $this -> dependenciesModel -> update_config($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----						END update_config					------ ************ //////////////////

///////////////// ******** ----						save_document						------ ************ //////////////////
//////// Save the document of the dependency
	// The parameters that can receive are:
		// estate -> Estate ID
		// municipality -> Name of the municipality
		// name -> Label with the name
	
	function save_document($objet) {
	// If the object is empty (called from the ajax) it assigns $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		$resp['status'] = 1;
		session_start();
		
	// Save document in the DB
		$objet['estate'] = $_SESSION['dependencie']['estadodep'];
		$objet['municipality'] = $_SESSION['dependencie']['municipiodep'];
		$resp['result'] = $this -> dependenciesModel -> save_document($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----						END save_document					------ ************ //////////////////

///////////////// ******** ----						delete_document						------ ************ //////////////////
//////// Delete document from disk and DB
	// The parameters that can receive are:
		// id -> Document ID
		// url -> Document URL
	
	function delete_document($objet) {
	// If the object is empty (called from the ajax) it assigns $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		$resp['status'] = 1;
		session_start();
		
	// Delete document from disk
		unlink($objet['url']);
		
	// Delete document from DB
		$resp['result'] = $this -> dependenciesModel -> delete_document($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----						END delete_document					------ ************ //////////////////

///////////////// ******** ----						list_documents						------ ************ //////////////////
//////// Check the documents and return into array
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// estate -> Estate ID
		// municipality -> Name of the municipality
	
	function list_documents($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
		$documents = $this -> dependenciesModel -> list_documents($objet);
		$documents = $documents['rows'];
		
		require ('views/dependencies/list_documents.php');
	}
	
///////////////// ******** ----						END list_documents					------ ************ //////////////////

///////////////// ******** ----						view_documets						------ ************ //////////////////
//////// Loaded the view of the documents
	// The parameters that can receive are:
		// div -> Div where the content is loaded
	
	function view_documets($objet) {
	// If the object is empty (called from the ajax) it assigns $ $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
		require ('views/dependencies/view_documents.php');
	}
	
///////////////// ******** ----						END view_documets					------ ************ //////////////////

///////////////// ******** ----							check							------ ************ //////////////////
//////// Check if the municipality are registred
	// The parameters that can receive are:
		// municipality -> String with the name of the municipality
		// state -> String with the name of the state
	
	function check($objet) {
	// If the object is empty (called from the ajax) it assigns $_REQUEST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
	// Delete document from DB
		$result = $this -> dependenciesModel -> check($objet);
		$resp['dependencies'] = $result['rows'];
		$resp['total'] = $result['total'];
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----						END check							------ ************ //////////////////

}

?>