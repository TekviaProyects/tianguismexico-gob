<?php

require ("models/connection_sqli.php");
class notificationsModel extends Connection{

    function actualizar($objet){

      $sql = "UPDATE
            notifications
          SET status = 0
          WHERE
            user_id = ".$objet['consulta']."";
      // return $sql;
      $result = $this -> query($sql);
      return $result;
    }

  }

?>
