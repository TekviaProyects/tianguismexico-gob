<?php

require ('controllers/common.php');
require ("models/notifications.php");

class notifications extends Common {
	public $notificationsModel;
	function __construct() {
    $this -> notificationsModel = new notificationsModel();
}

  function actualizar($objet){
    $objet = (empty($objet)) ? $_REQUEST : $objet;
    $rep['status'] = 1;

  // Notificaciones actualizadas
  $rep['result'] = $this -> notificationsModel -> actualizar($objet);

    echo json_encode($rep);

  }
}
?>
