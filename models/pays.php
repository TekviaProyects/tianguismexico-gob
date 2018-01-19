<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // pays mySQL
require ("models/connection_sqli.php");
class paysModel extends Connection {

///////////////// ******** ---- 					list_user		 				------ ************ //////////////////
//////// Update the data of the card
	// The parameters can receive:
		// id -> Card ID
		// status -> Card status
	
	function save_pay($objet) {
		$sql = "SELECT
					nombre AS name, telefono AS phone_number, correo AS email
				FROM
					usuarios
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ---- 					END list_user		 			------ ************ //////////////////

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