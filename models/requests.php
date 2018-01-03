<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL
require ("models/connection_sqli.php");
class requestsModel extends Connection {

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
						requests(nombredep, direcciondep, numerodep, coloniadep, municipiodep, estadodep, cpdep, teldep, 
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

///////////////// ******** ----						list_requests						------ ************ //////////////////
//////// Check the requests in the DB and return into array
	// The parameters that can receive are:
		// search -> Word or ID to search
		// state -> Dependencie state
		// municipality -> Dependencie municipality
		// status -> Requests status
	
	function list_requests($objet) {
	// Word or ID to search
		$condition .= (!empty($objet['search'])) ? 
			' AND (r.id LIKE \'%'.$objet['search'].'%\' OR r.nombre LIKE \'%'.$objet['search'].'%\')' : '' ;
	// Filter by the ID if exists
		$condition .= (!empty($objet['id'])) ? ' AND r.id = '.$objet['id'] : '' ;
	// Filter by mail if exists
		$condition .= (!empty($objet['mail'])) ? ' AND r.correo = \''.$objet['mail'].'\'' : '' ;
	// Filter by status if exists
		$condition .= (!empty($objet['status'])) ? ' AND r.status = '.$objet['status'] : '' ;
	// Filter by state if exists
		$condition .= (!empty($objet['state'])) ? ' AND r.estadomx = '.$objet['state'] : '' ;
	// Filter by type of request
		$condition .= (!empty($objet['estado'])) ? ' AND r.estado = \''.$objet['estado'].'\'' : '' ;
	// Filter by municipality if exists
		$condition .= (!empty($objet['municipality'])) ? ' AND r.municipiomx = \''.$objet['municipality'].'\'' : '' ;
		
		$sql = "SELECT
					r.*, u.id AS user_id, u.name AS user_name, u.curp
				FROM
					registros r
				LEFT JOIN
						users u
					ON
						u.mail = CONVERT(r.correo using utf8) collate utf8_spanish_ci
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----					END list_requests					------ ************ //////////////////

///////////////// ******** ----						update							------ ************ //////////////////
//////// Update the request information in the DB
	// The parameters that can receive are:
		// request_id -> Request ID
		// status -> 1-> Approved, 2-> Denied
		// coment -> Request coment
	
	function update($objet) {
		$sql = "UPDATE 
					registros
				SET ".
					$objet['columns']." 
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END update						------ ************ //////////////////

///////////////// ******** ---- 					list_messages					------ ************ //////////////////
//////// Check the messages in the DB and return into array
	// The parameters can receive:
		// reservation_id -> Ad ID
		// user_from -> User that send the message
		// user_to -> User that recive the message
	
	function list_messages($objet) {
	// Select columns(default all *)
		$select .= (!empty($objet['select'])) ? $objet['select'] : '*';
		
		
	// Filter by the reservation ID
		$condition .= (!empty($objet['request_id'])) ? ' AND request_id = '.$objet['request_id'] : '';
	// Filter by the unread messages and user from
		$condition .= (!empty($objet['user_unread'])) ? 
			' AND (user_to = '.$objet['user_unread'].' && status = 1)' : '';
		
		
	// Order the results
		$condition .= (!empty($objet['order'])) ? ' ORDER BY = '.$objet['order'] : ' ORDER BY date';
		
		$sql = "SELECT ".
					$select." 					
				FROM
					messages
				WHERE
					1 = 1 ".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 				FIN list_messages					------ ************ //////////////////
	
///////////////// ******** ---- 				save_message						------ ************ //////////////////
//////// Save the message in the DB
	// The parameters can receive:
		// request_id -> Ad ID
		// message -> String with the message
		// from -> User that send the message
		// to -> User that recive the message
	
	function save_message($objet) {
		$date = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO 
					messages(request_id, user_from, user_to, message, date)
				VALUES
					('".$objet['request_id']."', '".$objet['from']."', 
					'".$objet['to']."', '".$objet['message']."', '".$date."')";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 				FIN save_message					------ ************ //////////////////
	
}

?>