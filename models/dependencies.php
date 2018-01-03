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

///////////////// ******** ----						list_dependencies						------ ************ //////////////////
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
	
///////////////// ******** ----						END list_dependencies					------ ************ //////////////////

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
//////// Update the dependencie configuration
	// The parameters that can receive are:
		// column -> Column to update
		// val -> Value of the column
		// id -> Dependencie ID
	
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

}

?>