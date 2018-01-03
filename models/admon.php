<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL
require ("models/connection_sqli.php");
class admonModel extends Connection {

///////////////// ******** ----						save_question						------ ************ //////////////////
//////// Call the function to save the cuestion in the DB
	// The parameters that can receive are:
		// question -> Question capturate
		// answer -> Answer to the cuestion
		// state -> State dependencie
		// municipality -> Municipality dependencie
	
	function save_question($objet) {
		$sql = "INSERT INTO 
					questions(question, answer, state, municipality)
				VALUES	
					('".$objet['question']."', '".$objet['answer']."', '".$objet['state']."',  
					'".$objet['municipality']."')";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END save_question					------ ************ //////////////////

///////////////// ******** ----						list_questions						------ ************ //////////////////
//////// Check the admon in the DB and return into array
	// The parameters that can receive are:
		// state -> Dependencie state
		// municipality -> Dependencie municipality
		// status -> admon status
	
	function list_questions($objet) {
	// Filter by state if exists
		$condition .= (!empty($objet['state'])) ? ' AND state = '.$objet['state'] : '' ;
	// Filter by municipality if exists
		$condition .= (!empty($objet['municipality'])) ? ' AND municipality = \''.$objet['municipality'].'\'' : '' ;
		
		$sql = "SELECT
					*
				FROM
					questions
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----					END list_questions						------ ************ //////////////////

///////////////// ******** ----					update_question							------ ************ //////////////////
//////// Update the question information in the DB
	// The parameters that can receive are:
		// columns -> String width the information columns
		// id -> Question ID
		
	function update_question($objet) {
		$sql = "UPDATE 
					questions
				SET ".
					$objet['columns']." 
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----					END update_question						------ ************ //////////////////

///////////////// ******** ----					delete_question							------ ************ //////////////////
//////// Delete the question from the DB
	// The parameters that can receive are:
		// id -> Question ID
		
	function delete_question($objet) {
		$sql = "DELETE FROM 
					questions
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----					END delete_question						------ ************ //////////////////

///////////////// ******** ----						 list_requests						------ ************ //////////////////
//////// Check the requests and return into array
	// The parameters that can receive are:
		// id_dependencie -> Dependencie ID
	
	function list_requests($objet) {
	// Filter by dependencie ID
		$condition .= (!empty($objet['id_dependencie'])) ? ' AND id_dependencie = '.$objet['id_dependencie'] : '' ;
		
		$sql = "SELECT
					*
				FROM
					admon_requests
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----					END list_requests						------ ************ //////////////////

///////////////// ******** ----					save_request							------ ************ //////////////////
//////// Save the requests in the DB
	// The parameters that can receive are:
		// title -> Request title
		// id_dependencie -> Dependencie ID
	
	function save_request($objet) {
		$sql = "INSERT INTO 
					admon_requests(id_dependencie, title, date)
				VALUES	
					('".$objet['id_dependencie']."', '".$objet['title']."', '".date('Y-m-d H:i:s')."')";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----					END save_request						------ ************ //////////////////

///////////////// ******** ---- 					list_messages						------ ************ //////////////////
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
					admon_messages
				WHERE
					1 = 1 ".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 					FIN list_messages					------ ************ //////////////////
	
///////////////// ******** ---- 					save_message						------ ************ //////////////////
//////// Save the message in the DB
	// The parameters can receive:
		// request_id -> Ad ID
		// message -> String with the message
		// from -> User that send the message
		// to -> User that recive the message
	
	function save_message($objet) {
		$date = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO 
					admon_messages(request_id, user_from, message, date)
				VALUES
					('".$objet['request_id']."', '".$objet['from']."', '".$objet['message']."', '".$date."')";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 					FIN save_message					------ ************ //////////////////
	
}

?>