<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL
require ("models/connection_sqli.php");
class help_deskModel extends Connection {

///////////////// ******** ----						save_question						------ ************ //////////////////
//////// Call the function to save the cuestion in the DB
	// The parameters that can receive are:
		// question -> Question capturate
		// answer -> Answer to the cuestion
		// state -> State dependencie
		// municipality -> Municipality dependencie
	
	function save_question($objet) {
		$sql = "DELETE FROM
					questions
				WHERE
					state = '".$objet['state']."'
				AND
					municipality = '".$objet['municipality']."'";
		$result = $this -> query($sql);
		
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
//////// Check the help_desk in the DB and return into array
	// The parameters that can receive are:
		// state -> Dependencie state
		// municipality -> Dependencie municipality
		// status -> help_desk status
	
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

///////////////// ******** ----						save_dating							------ ************ //////////////////
//////// Save the dating on the DB
	// The parameters that can receive are:
		// f_ini -> Dating start
		// f_end -> Dating end
		// title -> Title dating
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	function save_dating($objet) {
		$date = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO
					 datings(user_id, state, municipality, title, date, f_ini, f_end)
				VALUES
					(".$objet['user_id'].", '".$objet['state']."', '".$objet['municipality']."', '".$objet['title']."', 
					'".$date."', '".$objet['f_ini']."', '".$objet['f_end']."')";
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END save_dating						------ ************ //////////////////

///////////////// ******** ----						list_datings						------ ************ //////////////////
//////// Check the datings and return into array
	// The parameters that can receive are:
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	function list_datings($objet) {
	// Filter by state
		$condition .= (!empty($objet['state'])) ? ' AND d.state = '.$objet['state'] : '' ;
	// Filter by municipality
		$condition .= (!empty($objet['municipality'])) ? ' AND d.municipality = \''.$objet['municipality'].'\'' : '' ;
		
		$sql = "SELECT 
					d.*, d.f_ini AS start, d.f_end AS end, u.name 
				FROM
					 datings d
				LEFT JOIN
						users u
					ON
						u.id = d.user_id
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END list_datings					------ ************ //////////////////

}

?>