<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // pays mySQL
require ("models/connection_sqli.php");
class paysModel extends Connection {

///////////////// ******** ---- 					save_pay		 				------ ************ //////////////////
//////// Save the pay on the DB
	// The parameters can receive:
		// user_id -> User ID
		// pay_id -> Pay ID
		// reference -> Reference to pay
		// date -> Pay date
		// due_date -> Pay due date
		// url -> PDF URL
	
	function save_pay($objet) {
		$sql = "INSERT INTO 
					pays(request_id, user_id, pay_id, reference, date, due_date, url) 
				VALUES
					(".$objet['request_id'].", ".$objet['user_id'].", '".$objet['pay_id']."', '".$objet['reference']."', 
					'".$objet['date']."', '".$objet['due_date']."', '".$objet['url']."')";
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 					END save_pay		 			------ ************ //////////////////

///////////////// ******** ---- 					list_pays		 				------ ************ //////////////////
//////// Check the pays and return into array
	// The parameters can receive:
		// request_id -> Request ID
		// status -> Pay status
		// user_id -> User ID
	
	function list_pays($objet) {
	// Filter by request ID
		$condition .= (!empty($objet['request_id'])) ? ' AND request_id = '.$objet['request_id'] : '';
	// Filter by user ID
		$condition .= (!empty($objet['user_id'])) ? ' AND user_id = '.$objet['user_id'] : '';
	// Filter by status
		$condition .= (!empty($objet['status'])) ? ' AND status = '.$objet['status'] : '';
		
		$sql = "SELECT
					*
				FROM
					pays
				WHERE
					1 = 1 ".
					$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 					END list_pays		 			------ ************ //////////////////

///////////////// ******** ---- 					update_user		 				------ ************ //////////////////
//////// Update the user data
	// The parameters can receive:
		// id -> Card ID
		// o_id -> OpenPay ID
	
	function update_user($objet) {
		$sql = "UPDATE
					users
				SET
					o_id = '".$objet['o_id']."'
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 					END update_user		 			------ ************ //////////////////

}

?>