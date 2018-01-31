<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL
require ("models/connection_sqli.php");
class dependenciesModel extends Connection {

///////////////// ******** ----							 save							------ ************ //////////////////
//////// Call the dunction to save customer on the DB
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
		$pass = md5($objet['passdep']);
		
		$sql = "INSERT INTO 
						dependencies(nombredep, direcciondep, numerodep, coloniadep, municipiodep, estadodep, cpdep, teldep, 
									maildep, passdep, inspdep, autdep, mtdep)
				VALUES	
					('".$objet['nombredep']."', '".$objet['direcciondep']."', '".$objet['numerodep']."',  
					'".$objet['coloniadep']."', '".$objet['municipiodep']."', '".$objet['estadodep']."', '".$objet['cpdep']."', 
					'".$objet['teldep']."', '".$objet['maildep']."', '".$pass."', '".$objet['inspdep']."', 
					'".$objet['autdep']."', '".$objet['mtdep']."')";
		$result = $this -> insert_id($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END save							------ ************ //////////////////

///////////////// ******** ----						list_dependencies					------ ************ //////////////////
//////// Check the dependencies in the DB and return into array
	// The parameters that can receive are:
		// name -> Customer name
		// id -> Customer ID
	
	function list_dependencies($objet) {
	// Filter by the ID if exists
		$condition .= (!empty($objet['id'])) ? ' AND id = '.$objet['id'] : '' ;
	// Filter by mail if exists
		$condition .= (!empty($objet['maildep'])) ? ' AND maildep = \''.$objet['maildep'].'\'' : '' ;
	// Filter by pass if exists
		$condition .= (!empty($objet['passdep'])) ? ' AND passdep = \''.md5($objet['passdep']).'\'' : '' ;
		
		$sql = "SELECT
					*
				FROM
					dependencies
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END list_dependencies				------ ************ //////////////////

///////////////// ******** ----							update							------ ************ //////////////////
//////// Check the dependencies in the DB and return into array
	// The parameters that can receive are:
		// name -> Customer name
		// id -> Customer ID
	
	function update($objet) {
		$sql = "UPDATE 
					dependencies
				SET ".
					$objet['customer_columns']." 
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		$sql = "UPDATE 
					schedules
				SET ".
					$objet['schedules_columns']." 
				WHERE
					customer_id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END update							------ ************ //////////////////

///////////////// ******** ----						update_config						------ ************ //////////////////
//////// Update the dependency configuration
	// The parameters that can receive are:
		// column -> Column to update
		// val -> Value of the column
		// id -> dependency ID
	
	function update_config($objet) {
		$sql = "UPDATE 
					dependencies
				SET ".
					$objet['column']." = ".$objet['val']."
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END update_config					------ ************ //////////////////

///////////////// ******** ----						save_document						------ ************ //////////////////
//////// Save the document of the dependency in the DB
	// The parameters that can receive are:
		// estate -> Estate ID
		// municipality -> Name of the municipality
		// name -> Label with the name
	
	function save_document($objet) {
		$sql = "INSERT INTO
					documents(estate, municipality, name, url)
				VALUES
					(".$objet['estate'].", '".$objet['municipality']."', '".$objet['name']."', '".$objet['url']."')";
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END save_document					------ ************ //////////////////

///////////////// ******** ----						list_documents						------ ************ //////////////////
//////// Check tha documents and return into array
	// The parameters that can receive are:
		// estate -> Estate ID
		// municipality -> Name of the municipality
	
	function list_documents($objet) {
	// Filter by the estate if exists
		$condition .= (!empty($objet['estate'])) ? ' AND estate = '.$objet['estate'] : '' ;
	// Filter by the municipality if exists
		$condition .= (!empty($objet['municipality'])) ? ' AND municipality = \''.$objet['municipality'].'\'' : '' ;
		
		$sql = "SELECT 
					*
				FROM
					documents
				WHERE
					1 = 1".$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END list_documents					------ ************ //////////////////

///////////////// ******** ----						delete_document						------ ************ //////////////////
//////// Delete document from DB
	// The parameters that can receive are:
		// id -> Document ID
	
	function delete_document($objet) {
		$sql = "DELETE FROM
					documents
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END delete_document					------ ************ //////////////////

///////////////// ******** ----							check							------ ************ //////////////////
//////// Check ddependencies registred and return into array
	// The parameters that can receive are:
		// municipality -> String with the name of the municipality
		// state -> String with the name of the state
	
	function check($objet) {
	// Filter by municipality
		$condition .= (!empty($objet['municipality'])) ? ' AND municipality = \''.$objet['municipality'].'\'' : '' ;
	// Filter by state
		$condition .= (!empty($objet['state'])) ? ' AND state = \''.$objet['state'].'\'' : '' ;
		
		$sql = "SELECT
					*
				FROM
					dependencies_map
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END check							------ ************ //////////////////

///////////////// ******** ----						list_states							------ ************ //////////////////
//////// Check the state and return into array
	// The parameters that can receive are:
		
	function list_states($objet) {
		$sql = "SELECT 
					d.estadodep AS id
				FROM
					 dependencies d
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END list_states						------ ************ //////////////////

}

?>