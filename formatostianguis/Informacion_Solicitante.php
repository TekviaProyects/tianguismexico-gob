<?php

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
  ol{margin:0;padding:0}
  table td,table th{padding:0}
  .c5{border-right-style:solid;padding:5pt 5pt 5pt 5pt;border-bottom-color:white;border-top-width:1pt;border-right-width:1pt;
    border-left-color:white;vertical-align:top;
    border-right-color:white;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:1pt;
    width:112.9pt;border-top-color:white;border-bottom-style:solid}
  .c2{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:center;height:11pt}
  .c3{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:left;height:11pt}
  .c0{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:11pt;font-family:"Arial";font-style:normal}
  .c7{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:right}
  .c8{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:center}
  .c1{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:left;height:11pt}
  .c12{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:center}
  .c6{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:left}
  .c11{border-spacing:0;border-collapse:collapse;margin-right:auto}
  .c13{background-color:#ffffff;max-width:451.4pt;padding:72pt 72pt 72pt 72pt}
  .c10{height:11pt}
  .c4{height:0pt}
  .c9{font-weight:700}
  .title{padding-top:0pt;color:#000000;font-size:26pt;padding-bottom:3pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  .subtitle{padding-top:0pt;color:#666666;font-size:15pt;padding-bottom:16pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  li{color:#000000;font-size:11pt;font-family:"Arial"}p{margin:0;color:#000000;font-size:11pt;font-family:"Arial"}
  h1{padding-top:20pt;color:#000000;font-size:20pt;padding-bottom:6pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h2{padding-top:18pt;color:#000000;font-size:16pt;padding-bottom:6pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h3{padding-top:16pt;color:#434343;font-size:14pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h4{padding-top:14pt;color:#666666;font-size:12pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h5{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}
  h6{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;font-style:italic;orphans:2;widows:2;text-align:left}
</style>
</head>
<body class="c13">
  <p class="c7"><span class="c0"><?php echo $municipio1DB; ?>, <?php echo $estadoDB; ?>; &nbsp;a &nbsp;<?php echo $dia; ?> de &nbsp;<?php echo $mes; ?> del <?php echo "20$year"; ?>.</span></p>
  <p class="c7 c10"><span class="c0"></span></p>
  <p class="c7"><span class="c9">ASUNTO:</span><span class="c0">&nbsp;Informaci&oacute;n del solicitante.</span></p>
  <p class="c7 c10"><span class="c0"></span></p>
  <p class="c7 c10"><span class="c0"></span></p>
  <p class="c3"><span class="c0"></span></p>
  <p class="c7 c10"><span class="c0"></span></p>
  <p class="c3"><span class="c0"></span></p>
  <a id="t.8731ef74c0762c7b9893daa8d3cfef32eba728ec"></a><a id="t.0"></a>
  <table class="c11">
    <tbody>
      <tr class="c4">
        <td class="c5" colspan="3" rowspan="1">
          <p class="c12"><span class="c0">Fotografia del solicitante</span></p>
        </td>
        <td class="c5" colspan="1" rowspan="1">
          <p class="c1"><span class="c0"></span></p>
        </td>
      </tr>
      <tr class="c4"><td class="c5" colspan="2" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $nombreDB; ?></span></p>
      </td>
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $paternoDB; ?></span></p>
      </td>
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $maternoDB; ?></span></p>
      </td>
    </tr>
    <tr class="c4">
      <td class="c5" colspan="2" rowspan="1">
        <p class="c6"><span class="c0">Sexo</span></p>
      </td>
      <td class="c5" colspan="2" rowspan="1">
        <p class="c6"><span class="c0">CURP</span></p>
      </td>
    </tr>
    <tr class="c4">
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $estadoDB; ?></span></p>
      </td>
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $municipio1DB; ?></span></p>
      </td>
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $colonia1DB; ?></span></p>
      </td>
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $domicilioDB; ?></span></p>
      </td>
    </tr>
    <tr class="c4">
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0">N&uacute;mero Exterior</span></p>
      </td>
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0">N&uacute;mero Interior</span></p>
      </td>
      <td class="c5" colspan="1" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $postalDB; ?></span></p>
      </td>
      <td class="c5" colspan="1" rowspan="1">
        <p class="c1"><span class="c0"></span></p>
      </td>
    </tr>
    <tr class="c4">
      <td class="c5" colspan="2" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $telefonoDB; ?></span></p>
      </td>
      <td class="c5" colspan="2" rowspan="1">
        <p class="c6"><span class="c0"><?php echo $emailDB; ?></span></p>
      </td>
    </tr>
  </tbody>
</table>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c3"><span class="c0"></span></p>
<p class="c8"><span class="c0">A T E N T A M E N T E </span></p>
<p class="c8"><span class="c0">D i r e c c i &oacute; n &nbsp;d e &nbsp;T i a n g u i s &nbsp;y &nbsp;E s p a c i o s &nbsp;A b i e r t o s</span></p>
<p class="c2"><span class="c0"></span></p>
<p class="c2"><span class="c0"></span></p>
<p class="c2"><span class="c0"></span></p>
<p class="c2"><span class="c0"></span></p>
<p class="c2"><span class="c0"></span></p>
<p class="c8"><span class="c0">___________________________________</span></p>
<p class="c8"><span class="c0">NOMBRE</span></p>
<p class="c8"><span class="c0">Director de Tianguis y Espacios Abiertos</span></p>
<p class="c3"><span class="c0"></span></p>
</body>
</html>
