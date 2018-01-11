<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL
require ("models/connection_sqli.php");
class usersModel extends Connection {

///////////////// ******** ----							 save							------ ************ //////////////////
//////// Call the dunction to save the user on the DB
	// The parameters that can receive are:
		// last_name -> Customer last name 					
		// mail -> Customer mail 							
		// name -> Customer name
		// pass -> Password
		// curp -> Customer CURP
		// estadodep -> Customer state
		// municipiodep -> Customer municipality
		// colony -> Customer colony
		// addres -> Customer addres
		// num -> External number
		// num_int -> Internal number
	
	function save($objet) {
	// Validate if the user exists
		$sql = "SELECT
					id
				FROM
					users
				WHERE
					mail = '".$objet['mail']."'";
		// return $sql;
		$users = $this -> query_array($sql);
	
	 // User exists
		if ($users['total'] > 0) {
			return Array("status" => 2);
		}
		
		$date = date('Y-m-d H:i:s');
		
		$sql = "INSERT INTO 
						users(name, last_name, last_name2, mail, pass, date, curp, state, municipality, 
								colony, addres, num, num_int)
				VALUES	
					('".$objet['name']."', '".$objet['last_name']."', '".$objet['last_name2']."', '".$objet['mail']."', 
					'".$objet['pass']."', '".$date."', '".$objet['curp']."', '".$objet['estadodep']."', 
					'".$objet['municipiodep']."', '".$objet['colony']."', '".$objet['addres']."', 
					'".$objet['num']."', '".$objet['num_int']."')";
		$result = $this -> insert_id($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END save							------ ************ //////////////////

///////////////// ******** ----						list_users							------ ************ //////////////////
//////// Check the users in the DB and return into array
	// The parameters that can receive are:
		// name -> Customer name
		// id -> Customer ID
	
	function list_users($objet) {
	// Filter by the ID if exists
		$condition .= (!empty($objet['id'])) ? ' AND id = '.$objet['id'] : '' ;
	// Filter by mail if exists
		$condition .= (!empty($objet['mail'])) ? ' AND mail = \''.$objet['mail'].'\'' : '' ;
	// Filter by pass if exists
		// $condition .= (!empty($objet['pass'])) ? ' AND pass = \''.$objet['pass'].'\'' : '' ;
		
		$sql = "SELECT
					*
				FROM
					users
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END list_users					------ ************ //////////////////

///////////////// ******** ----							update							------ ************ //////////////////
//////// Check the users in the DB and return into array
	// The parameters that can receive are:
		// name -> Customer name
		// id -> Customer ID
	
	function update($objet) {
		$sql = "UPDATE 
					users
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

///////////////// ******** ----						new_pass							------ ************ //////////////////
//////// Change the user pass
	// The parameters that can receive are:
		// id -> User ID
		// pass -> New password
	
	function new_pass($objet) {
		$sql = "UPDATE 
					users
				SET 
					pass = '".$objet['pass']."' 
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END new_pass						------ ************ //////////////////

///////////////// ******** ----							 edit							------ ************ //////////////////
//////// Call the function to update user on the DB
	// The parameters that can receive are:
		// id -> User ID
		// last_name -> Customer last name 		
		// last_name2 -> Customer second last name 					
		// mail -> Customer mail 							
		// name -> Customer name
		// pass -> Password
		// curp -> Customer CURP
		// colony -> Customer colony
		// addres -> Customer addres
		// num -> External number
		// num_int -> Internal number
	
	function edit($objet) {
		$sql = "UPDATE 
					users
				SET 
					name = '".$objet['name']."', 
					curp = '".$objet['curp']."', 
					last_name = '".$objet['last_name']."', 
					last_name2 = '".$objet['last_name2']."', 
					mail = '".$objet['mail']."', 
					pass = '".$objet['pass']."', 
					colony = '".$objet['colony']."', 
					addres = '".$objet['addres']."', 
					num = '".$objet['num']."', 
					state = '".$objet['state']."', 
					municipality = '".$objet['municipality']."', 
					num_int = '".$objet['num_int']."' 
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END edit							------ ************ //////////////////

}

?>