<?php

  include("conexion.php");

  $archivo1 = $_FILES['ife']['name'];
  $archivo2 = $_FILES['carta_sanidad']['name'];
  $archivo3 = $_FILES['carta_delegado']['name'];
  $archivo4 = $_FILES['carta_aceptacion']['name'];
  $archivo5 = $_FILES['comprobante']['name'];
  $archivo6 = $_FILES['foto1']['name'];
  $archivo7 = $_FILES['foto2']['name'];
  $archivo8 = $_FILES['foto3']['name'];
  $archivo9 = $_FILES['foto4']['name'];

  $remplazar = "../../../../solicitudes/usuarios/2/2017-12-27--13-41-49/";

  $destino1 = "$remplazar/"."ine.png";
  $destino2 = "$remplazar/"."csanidad.png";
  $destino3 = "$remplazar/"."cdelegado.png";
  $destino4 = "$remplazar/"."caceptacion.png";
  $destino5 = "$remplazar/"."comprobante.png";
  $destino6 = "$remplazar/"."f1.png";
  $destino7 = "$remplazar/"."f2.png";
  $destino8 = "$remplazar/"."f3.png";
  $destino9 = "$remplazar/"."f4.png";

  copy($_FILES['ife']['tmp_name'],$destino1);
  copy($_FILES['carta_sanidad']['tmp_name'],$destino2);
  copy($_FILES['carta_delegado']['tmp_name'],$destino3);
  copy($_FILES['carta_aceptacion']['tmp_name'],$destino4);
  copy($_FILES['comprobante']['tmp_name'],$destino5);
  copy($_FILES['foto1']['tmp_name'],$destino6);
  copy($_FILES['foto2']['tmp_name'],$destino7);
  copy($_FILES['foto3']['tmp_name'],$destino8);
  copy($_FILES['foto4']['tmp_name'],$destino9);

  $remplazar1= "../../solicitudes/usuarios/2/2017-12-27--13-41-49/";

  $destino11 = "$remplazar1/"."ine.png";
  $destino22 = "$remplazar1/"."csanidad.png";
  $destino33 = "$remplazar1/"."cdelegado.png";
  $destino44 = "$remplazar1/"."caceptacion.png";
  $destino55 = "$remplazar1/"."comprobante.png";
  $destino66 = "$remplazar1/"."f1.png";
  $destino77 = "$remplazar1/"."f2.png";
  $destino88 = "$remplazar1/"."f3.png";
  $destino99 = "$remplazar1/"."f4.png";

  $cambio = "UPDATE registros SET identificacion ='$destino11', comprobante='$destino55',
  fotografia1='$destino66', fotografia2='$destino77', fotografia3='$destino88', fotografia4='$destino99',
  cartadelegado='$destino33', cartaaceptacion='$destino44', sanidad='$destino22', status=1
  WHERE password = 321 ";
  mysqli_query($conexion,$cambio);

  echo "true";
 ?>
