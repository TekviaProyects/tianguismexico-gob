<?php
require ('controllers/common.php');
require ("models/help_desk.php");

class help_desk extends Common {
	public $help_deskModel;
	function __construct() {
		$this -> help_deskModel = new help_deskModel();
	}

///////////////// ******** ----						create_question						------ ************ //////////////////
//////// Call the function to save the cuestion in the DB
	// The parameters that can receive are:
		// question -> Question capturate
		// answer -> Answer to the cuestion
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	function create_question($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;
		session_start();
		
		mkdir('dep_files/'.$_SESSION['dependencie']['id'], 0777, true);
		
		$myfile = fopen('dep_files/'.$_SESSION['dependencie']['id'].'/questions.html', "w") or die("Unable to open file!");
		$txt = 	'<html>
					<head>
						<link 
							href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" 
							rel="stylesheet" 
							type="text/css" />
						<link 
							rel="stylesheet" 
							href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
						<link 
							rel="stylesheet" 
							href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
							integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
							crossorigin="anonymous">
						<link 
							href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_editor.pkgd.min.css" 
							rel="stylesheet" 
							type="text/css" />
						<link 
							href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css" 
							rel="stylesheet" 
							type="text/css" />
						<style>
							.froala-element span.f-img-wrap {
							    display: inline-block !important;
							    vertical-align: bottom !important;
							}
							
							.froala-element img, 
							img.fr-tag {
							    display: inline-block !important;
							    vertical-align: bottom !important;
							}
							img.fr-dii.fr-fir {
							    float: right !important;
							    margin: 5px 0 5px 5px !important;
							    max-width: calc(100% - 5px) !important;
							}
							img.fr-dii.fr-fil {
							    float: left !important;
							    margin: 5px 5px 5px 0 !important;
							    max-width: calc(100% - 5px) !important;
							}
							img.fr-dii {
							    display: inline-block !important;
							    float: none !important;
							    vertical-align: bottom !important;
							    margin-left: 5px !important;
							    margin-right: 5px !important;
							    max-width: calc(100% - (2 * 5px)) !important;
							}
						</style>
					</head>
					<body>'.
						$objet['content'].'
						<script 
							type="text/javascript" 
							src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js">
						</script>
						<script 
							type="text/javascript" 
							src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js">
						</script>
						<script 
							type="text/javascript" 
							src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js">
						</script>
						<script 
							type="text/javascript" 
							src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/js/froala_editor.pkgd.min.js">
						</script>
					</body>
					</html>';
		fwrite($myfile, $txt);
		fclose($myfile);
		
	// Save question
		$objet['answer'] = 'dep_files/'.$_SESSION['dependencie']['id'].'/questions.html';
		$resp['result'] = $this -> help_deskModel -> save_question($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----					END create_question						------ ************ //////////////////

///////////////// ******** ----					update_question							------ ************ //////////////////
//////// Call the function that update the question information in the DB
	// The parameters that can receive are:
		// question -> Question capturate
		// answer -> Answer to the cuestion
		// id -> Question ID
		
	function update_question($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;
		
	// Update question information
		$objet['columns'] .= (!empty($objet['question'])) ? 'question = \''.$objet['question'].'\', ' : '' ;
		$objet['columns'] .= (!empty($objet['answer'])) ? 'answer = \''.$objet['answer'].'\', ' : '' ;
		$objet['columns'] = substr($objet['columns'], 0, -2);
		$resp['result'] = $this -> help_deskModel -> update_question($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----					END update_question						------ ************ //////////////////

///////////////// ******** ----					delete_question							------ ************ //////////////////
//////// Call the function to delete the question from the DB
	// The parameters that can receive are:
		// id -> Question ID
		
	function delete_question($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$resp['status'] = 1;
		
	// Delete the question from the DB
		$resp['result'] = $this -> help_deskModel -> delete_question($objet);
		
		echo json_encode($resp);
	}
	
///////////////// ******** ----						END delete_question					------ ************ //////////////////

///////////////// ******** ----							view_main						------ ************ //////////////////
//////// Loaded the main view.
	// The parameters that can receive are:
		// div -> Div where the content is loaded
	
	function view_main($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		session_start();
		$content = '';
		
		$info = $this -> help_deskModel -> list_questions($objet);
		$title = $info['rows'][0]['question'];
		$url = $info['rows'][0]['answer'];
		
		if (!empty($url) && $objet['from_user'] == 1) {
			require($url);
		} else {
			if(file_exists('dep_files/'.$_SESSION['dependencie']['id'].'/questions.html')){
				$content = file_get_contents('dep_files/'.$_SESSION['dependencie']['id'].'/questions.html');
			}
			
			$view = (!empty($objet['view'])) ? $objet['view'] : 'view_main' ;
			
			require ('views/help_desk/'.$view.'.php');
		}
	}
	
///////////////// ******** ----					END view_main						------ ************ //////////////////

///////////////// ******** ----					view_user_main						------ ************ //////////////////
//////// Loaded the view user main help desk
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// mail -> User mail
		
	function view_user_main($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		
		require ('views/help_desk/view_user_main.php');
	}
	
///////////////// ******** ----					END view_user_main					------ ************ //////////////////

}

?>