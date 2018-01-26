<?php
require ('controllers/common.php');
require ("models/notifications.php");

class notifications extends Common {
	public $notificationsModel;
	function __construct() {
		$this -> notificationsModel = new notificationsModel();
	}

	function actualizar($objet) {
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		$rep['status'] = 1;

	// Notificaciones actualizadas
		$rep['result'] = $this -> notificationsModel -> actualizar($objet);

		echo json_encode($rep);
	}
	
///////////////// ******** ----					list_notifications						------ ************ //////////////////
//////// Check the notifications and load on a view
	// The parameters that can receive are:
		// user_id -> User ID
		
	function list_notifications($objet) {
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
	// Notificaciones actualizadas
		$notifications = $this -> notificationsModel -> list_notifications($objet);
		$notifications = $notifications['rows'];
		
		require ('views/notifications/list_notifications.php');
	}
	
///////////////// ******** ----					END list_notifications					------ ************ //////////////////

///////////////// ******** ----					count_notifications						------ ************ //////////////////
//////// Count number of notifications
	// The parameters that can receive are:
		// user_id -> User ID
		
	function count_notifications($objet) {
		$objet = (empty($objet)) ? $_REQUEST : $objet;
		
	// Notificaciones actualizadas
		$total= $this -> notificationsModel -> count_notifications($objet);
		$total = $total['rows'][0]['total'];
		
		echo json_encode($total);
	}
	
///////////////// ******** ----					END count_notifications					------ ************ //////////////////

}

?>