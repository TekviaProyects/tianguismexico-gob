<?php

error_reporting(0);


include("conection/conection.php");
date_default_timezone_set('America/Mexico_City');
$dia=date("d");
$mes=date("m");
$year=date("y");
$consulta = "SELECT * FROM registros WHERE id = '1'";
$resultado = mysqli_query($conexion,$consulta);

while ($row = mysqli_fetch_array($resultado)){
  $nombreDB=$row['nombre'];
  $paternoDB=$row['paterno'];
  $maternoDB=$row['materno'];
  $emailDB=$row['correo'];
  $domicilioDB=$row['domicilio'];
  $colonia1DB=$row['colonia1'];
  $municipio1DB=$row['municipio1'];
  $postalDB=$row['postal'];
  $telefonoDB=$row['telefono'];
  $estadoDB=$row['estado'];
  $calleDB=$row['calle'];
  $numerolocalDB=$row['numerolocal'];
  $callesDB=$row['calles'];
  $colonia2DB=$row['colonia2'];
  $referenciaDB=$row['referencia'];
  $giroDB=$row['giro'];
  $mts2DB=$row['mts2'];
  $PropiedadDB=$row['propiedad'];
  $inicioDB=$row['inicio'];
  $finDB=$row['fin'];
}

 ?>

<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <style type="text/css">
  ol{margin:0;padding:0}table td,table th{padding:0}
  .c1{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:justify;height:11pt}
  .c0{color:#000000;font-weight:700;text-decoration:none;vertical-align:baseline;font-size:10pt;font-family:"Arial";font-style:normal}
  .c6{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:11pt;font-family:"Arial";font-style:normal}
  .c8{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:center;height:11pt}
  .c10{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:right;height:11pt}
  .c2{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:10pt;font-family:"Arial";font-style:normal}
  .c12{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:left;height:11pt}
  .c3{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:justify}
  .c9{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:center}
  .c11{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:right}
  .c5{background-color:#ffffff;max-width:451.4pt;padding:72pt 72pt 72pt 72pt}
  .c4{font-size:10pt}
  .c7{font-weight:700}
  .title{padding-top:0pt;color:#000000;font-size:26pt;padding-bottom:3pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  .subtitle{padding-top:0pt;color:#666666;font-size:15pt;padding-bottom:16pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  li{color:#000000;font-size:11pt;font-family:"Arial"}
  p{margin:0;color:#000000;font-size:11pt;font-family:"Arial"}
  h1{padding-top:20pt;color:#000000;font-size:20pt;padding-bottom:6pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h2{padding-top:18pt;color:#000000;font-size:16pt;padding-bottom:6pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h3{padding-top:16pt;color:#434343;font-size:14pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h4{padding-top:14pt;color:#666666;font-size:12pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h5{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h6{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;font-style:italic;orphans:2;widows:2;text-align:left}
</style>
</head>
<body class="c5">
  <p class="c9"><span class="c7">COMPROBANTE DE RECEPCI&Oacute;N DE DOCUMENTACI&Oacute;N COMPLETA</span><span class="c6">&nbsp;</span></p>
  <p class="c8"><span class="c6"></span></p>
  <p class="c11"><span class="c6">&nbsp; <?php echo $municipio1DB; ?>, <?php echo $estadoDB; ?>; a &nbsp;<?php echo $dia; ?> de &nbsp;<?php echo $mes; ?> del <?php echo "20$year"; ?></span></p>
  <p class="c10"><span class="c6"></span></p>
  <p class="c3"><span class="c7">I</span><span class="c0">NFORMES SOBRE EL ESTATUS DE SU SOLICITUD AL TEL: Tel. del Mpio. Ext. Extensi&oacute;n
    de Dependencia</span></p><p class="c1"><span class="c6"></span></p>
  <p class="c3"><span class="c0">NOTA IMPORTANTE:</span></p>
  <p class="c3"><span class="c2">1.- La veracidad de la informaci&oacute;n ser&aacute; comprobada. </span></p>
  <p class="c3"><span class="c4">2.- La recepci&oacute;n de documentos no implica que el tr&aacute;mite no implica que el tr&aacute;mite se haya
    autorizado, por lo consiguiente el tal&oacute;n &ldquo;</span><span class="c4 c7">NO AUTORIZA TRABAJAR SIN PERMISO CORRESPONDIENTE&rdquo;</span><span class="c2">. </span></p>
  <p class="c3"><span class="c2">3.- La autoridad municipal dictar&aacute; resoluci&oacute;n de su solicitud en diez d&iacute;as h&aacute;biles a
    partir del d&iacute;a siguiente de recepci&oacute;n. </span></p>
  <p class="c3"><span class="c2">4.- El resultado y/o permiso solo ser&aacute; entregado al solicitante del tr&aacute;mite previa presentaci&oacute;n
    de identificaci&oacute;n con fotograf&iacute;a.</span></p>
  <p class="c1"><span class="c2"></span></p>
  <p class="c1"><span class="c2"></span></p>
  <p class="c1"><span class="c2"></span></p>
  <p class="c9"><span class="c0">FIRMA Y NOMBRE DE QUIEN RECIBE </span></p>
  <p class="c8"><span class="c0"></span></p>
  <p class="c9"><span class="c2">Firma y nombre de quien recibe</span></p>
  <p class="c12"><span class="c2"></span></p>
  <p class="c12"><span class="c2"></span></p>
  <p class="c8"><span class="c2"></span></p>
  <p class="c9"><span class="c0">NOMBRE DEL SOLICITANTE </span></p>
  <p class="c8"><span class="c2"></span></p>
  <p class="c9"><span class="c2">Nombre del solicitante </span></p>
  <p class="c3"><span class="c6">&nbsp;</span></p>
</body>
</html>
