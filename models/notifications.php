<?php

require ("models/connection_sqli.php");
class notificationsModel extends Connection {

	function actualizar($objet) {
		$sql = "UPDATE
            		notifications
          		SET 
          			status = 0
          		WHERE
            		user_id = " . $objet['consulta'] . "";
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----					list_notifications						------ ************ //////////////////
//////// Check the notifications and return into array
	// The parameters that can receive are:
		// user_id -> User ID
		
	function list_notifications($objet) {
	// Filter by user ID
		$condition .= (!empty($objet['user_id'])) ? ' AND user_id = '.$objet['user_id'] : '' ;
		
		$sql = "SELECT
					*
				FROM
					notifications
          		WHERE
            		1 = 1 ". 
            	$condition;
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----					END list_notifications					------ ************ //////////////////

}
?>
