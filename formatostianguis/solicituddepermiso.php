<?php 
error_reporting(0);

	session_start();
	include ("php/conection/conection.php");
	date_default_timezone_set('America/Mexico_City');
	$dia = date("d");
	$mes = date("m");
	$year = date("y");
	$consulta = "SELECT * FROM registros WHERE id = " . $request_id;
	$resultado = mysqli_query($conexion, $consulta);
	
	while ($row = mysqli_fetch_array($resultado)) {
		$nombreDB = $row['nombre'];
		$paternoDB = $row['paterno'];
		$maternoDB = $row['materno'];
		$emailDB = $row['correo'];
		$domicilioDB = $row['domicilio'];
		$colonia1DB = $row['colonia1'];
		$municipio1DB = $row['municipio1'];
		$postalDB = $row['postal'];
		$telefonoDB = $row['telefono'];
		$estadoDB = $row['estado'];
		$calleDB = $row['calle'];
		$numerolocalDB = $row['numerolocal'];
		$callesDB = $row['calles'];
		$colonia2DB = $row['colonia2'];
		$referenciaDB = $row['referencia'];
		$giroDB = $row['giro'];
		$mts2DB = $row['mts2'];
		$PropiedadDB = $row['propiedad'];
		$inicioDB = $row['inicio'];
		$finDB = $row['fin'];
		$estadomx = $row['estadomx'];
		$municipiomx = $row['municipiomx'];
		$dias = $row['dias'];
	}
	
	if (!empty($_SESSION['dependencie']['nombredep'])) {
		$dependencie = $_SESSION['dependencie']['nombredep'];
	} else {
		$sql = "SELECT
							nombredep
						FROM
							dependencies
						WHERE
							estadodep = ".$estadomx."
						AND
							municipiodep = '".$municipiomx."'";
		$dependencie = mysqli_query($conexion, $sql);
		
		while ($row = mysqli_fetch_array($dependencie)) {
			$dependencie = $row['nombredep'];
		}
	}
?>

<html>
<head>
  <title>formato prueba</title>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <style type="text/css">
	ol {
		margin: 0;
		padding: 0
	}
	table td, table th {
		padding: 0
	}
	.c5 {
		border-right-style: solid;
		padding: 15pt 15pt 15pt 15pt;
		border-bottom-color: white;
		border-top-width: 1pt;
		border-right-width: 1pt;
		border-left-color: white;
		vertical-align: top;
		border-right-color: white;
		border-left-width: 1pt;
		border-top-style: solid;
		border-left-style: solid;
		border-bottom-width: 1pt;
		width: 150.5pt;
		border-top-color: white;
		border-bottom-style: solid
	}
	.c0 {
		margin-left: 252pt;
		padding-top: 0pt;
		text-indent: 36pt;
		padding-bottom: 0pt;
		line-height: 1.15;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	.c1 {
		padding-top: 0pt;
		padding-bottom: 0pt;
		line-height: 1.15;
		orphans: 2;
		widows: 2;
		text-align: left;
		height: 11pt
	}
	.c7 {
		color: #000000;
		font-weight: 700;
		text-decoration: none;
		vertical-align: baseline;
		font-size: 10pt;
		font-family: "Arial";
		font-style: normal
	}
	.c4 {
		color: #000000;
		font-weight: 400;
		text-decoration: none;
		vertical-align: baseline;
		font-size: 11pt;
		font-family: "Arial";
		font-style: normal
	}
	.c3 {
		color: #000000;
		font-weight: 400;
		text-decoration: none;
		vertical-align: baseline;
		font-size: 10pt;
		font-family: "Arial";
		font-style: normal
	}
	.c19 {
		padding-top: 0pt;
		padding-bottom: 0pt;
		line-height: 1.15;
		orphans: 2;
		widows: 2;
		text-align: right
	}
	.c2 {
		padding-top: 0pt;
		padding-bottom: 0pt;
		line-height: 1.15;
		orphans: 2;
		widows: 2;
		text-align: center
	}
	.c13 {
		padding-top: 0pt;
		padding-bottom: 0pt;
		line-height: 1.15;
		orphans: 2;
		widows: 2;
		text-align: justify
	}
	.c9 {
		padding-top: 0pt;
		padding-bottom: 0pt;
		line-height: 1.15;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	.c17 {
		padding-top: 0pt;
		padding-bottom: 0pt;
		line-height: 1.0;
		text-align: center
	}
	.c15 {
		border-spacing: 0;
		border-collapse: collapse;
		margin-right: auto
	}
	.c18 {
		margin-left: auto;
		border-spacing: 0;
		border-collapse: collapse;
		margin-right: auto
	}
	.c8 {
		padding-top: 0pt;
		padding-bottom: 0pt;
		line-height: 1.0;
		text-align: center;
	}
	.c14 {
		padding-top: 0pt;
		padding-bottom: 0pt;
		line-height: 1.0;
		text-align: center;
	}
	.c6 {
		background-color: #ffffff;
		max-width: 451.4pt;
		padding: 72pt 72pt 72pt 72pt
	}
	.c10 {
		font-size: 10pt;
		font-weight: 700
	}
	.c20 {
		font-size: 10pt
	}
	.c11 {
		height: 11pt
	}
	.c16 {
		font-weight: 700
	}
	.c12 {
		height: 0pt
	}
	.title {
		padding-top: 0pt;
		color: #000000;
		font-size: 26pt;
		padding-bottom: 3pt;
		font-family: "Arial";
		line-height: 1.15;
		page-break-after: avoid;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	.subtitle {
		padding-top: 0pt;
		color: #666666;
		font-size: 15pt;
		padding-bottom: 16pt;
		font-family: "Arial";
		line-height: 1.15;
		page-break-after: avoid;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	li {
		color: #000000;
		font-size: 11pt;
		font-family: "Arial"
	}
	p {
		margin: 0;
		color: #000000;
		font-size: 11pt;
		font-family: "Arial"
	}
	h1 {
		padding-top: 20pt;
		color: #000000;
		font-size: 20pt;
		padding-bottom: 6pt;
		font-family: "Arial";
		line-height: 1.15;
		page-break-after: avoid;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	h2 {
		padding-top: 18pt;
		color: #000000;
		font-size: 16pt;
		padding-bottom: 6pt;
		font-family: "Arial";
		line-height: 1.15;
		page-break-after: avoid;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	h3 {
		padding-top: 16pt;
		color: #434343;
		font-size: 14pt;
		padding-bottom: 4pt;
		font-family: "Arial";
		line-height: 1.15;
		page-break-after: avoid;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	h4 {
		padding-top: 14pt;
		color: #666666;
		font-size: 12pt;
		padding-bottom: 4pt;
		font-family: "Arial";
		line-height: 1.15;
		page-break-after: avoid;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	h5 {
		padding-top: 12pt;
		color: #666666;
		font-size: 11pt;
		padding-bottom: 4pt;
		font-family: "Arial";
		line-height: 1.15;
		page-break-after: avoid;
		orphans: 2;
		widows: 2;
		text-align: left
	}
	h6 {
		padding-top: 12pt;
		color: #666666;
		font-size: 11pt;
		padding-bottom: 4pt;
		font-family: "Arial";
		line-height: 1.15;
		page-break-after: avoid;
		font-style: italic;
		orphans: 2;
		widows: 2;
		text-align: left
	}
</style>
</head>
<body class="c6">
  <p class="c19"><span class="c16">ASUNTO:</span><span class="c4">&nbsp;Solicitud de Permiso para ejercer</span></p>
  <p class="c0"><span class="c4">comercio en la v&iacute;a p&uacute;blica.</span></p>
  <p class="c1"><span class="c4"></span></p>
  <p class="c19"><span class="c4">&nbsp;<?php echo $municipio1DB; ?>, <?php echo $estadoDB; ?>; a <?php echo $dia; ?> de <?php echo $mes; ?> del <?php echo "20$year"; ?></span></p>
  <p class="c19 c11"><span class="c4"></span></p>
  <p class="c13"><span class="c10">NOTA IMPORTANTE</span><span class="c3">: Favor de leer cuidadosamente las siguientes indicaciones antes de
    proceder al llenado de la presente solicitud. Esta solicitud tendr&aacute; vigencia de 35 d&iacute;as h&aacute;biles a partir de la fecha
    de recepci&oacute;n, posteriormente se archivar&aacute; como asunto no concluido y deber&aacute; presentar nuevamente todos los requisitos
    actualizados y como una nueva solicitud.</span></p>
  <p class="c13 c11"><span class="c7"></span></p>
  <p class="c2"><span class="c7">DATOS PERSONALES DEL SOLICITANTE</span></p>
  <p class="c1"><span class="c3"></span></p>
  <a id="t.f48ba4ba89c76263e7fe9f8a680dcbf0e60912b1"></a>
  <a id="t.0"></a>
	<table class="c15">
		<tbody>
			<tr>
				<td style="text-align:center; font-weight:bold;">
					<p>
						Apellido Paterno
					</p>
				</td>
				<td style="text-align:center; font-weight:bold;">
					<p>
						Apellido Materno
					</p>
				</td>
				<td style="text-align:center; font-weight:bold;">
					<p>
						Nombre(s)
					</p>
				</td>
			</tr>
			<tr class="c12">
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8"><span class="c3"><?php echo $paternoDB; ?></span></p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c17"><span class="c3"><?php echo $maternoDB; ?></span></p>
				</td>
					<td class="c5" colspan="1" rowspan="1">
						<p class="c14"><span class="c3"><?php echo $nombreDB; ?></span></p>
				</td>
			</tr>
			<tr>
				<td style="text-align:center; font-weight:bold;"> <p>Domicilio</p> </td>
				<td style="text-align:center; font-weight:bold;"> <p>Numero Telefonico</p> </td>
			</tr>
			<tr class="c12">
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8"><span class="c3"><?php echo $domicilioDB?></span></p>
				</td>
				<td class="c5" colspan="1" rowspan="1"><p class="c17">
					<span class="c3"><?php echo $telefonoDB; ?></span></p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8 c11"><span class="c3"></span></p>
				</td>
			</tr>
			<tr>
				<td style="text-align:center; font-weight:bold;"> <p>Colonia</p> </td>
				<td style="text-align:center; font-weight:bold;"> <p>Codigo Postal</p> </td>
				<td style="text-align:center; font-weight:bold;"> <p>Municipio</p> </td>
			</tr>
			<tr class="c12">
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8"><span class="c3"><?php echo $colonia1DB; ?></span></p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c17"><span class="c3"><?php echo $postalDB; ?> </span></p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c14"><span class="c3"><?php echo $municipio1DB ?></span></p>
				</td>
			</tr>
		</tbody>
	</table>
	<p class="c1"><span class="c3"></span></p>
	<p class="c2"><span class="c7">DATOS DE UBICACI&Oacute;N DE COMERCIO SEMI-FIJO O AMBULANTE</span></p>
	<p class="c1"><span class="c7"></span></p>
	<a id="t.112b82be945ce66d7b70a21aef9751a8c129bac0"></a><a id="t.1"></a>
	<table class="c18">
		<tbody>
			<tr>
				<td style="text-align:center; font-weight:bold;"> <p>Domicilio</p> </td>
				<td style="text-align:center; font-weight:bold;"> <p>Numero del local</p> </td>
			</tr>
			<tr class="c12">
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8"><span class="c3"><?php echo $calleDB; ?></span></p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c14">
						<span class="c10">&nbsp;</span>
						<span class="c3"><?php echo $numerolocalDB; ?></span>
					</p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8 c11"><span class="c7"></span></p>
				</td>
			</tr>
			<tr>
				<td style="text-align:center; font-weight:bold; padding-top: 10px"> <p>Entre las Calles</p> </td>
				<td style="text-align:center; font-weight:bold; padding-top: 10px"> <p>Colonia</p> </td>
				<td></td>
			</tr>
			<tr>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8" style="padding: 10px">
						<span class="c3"><?php echo $callesDB; ?></span>
					</p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p><?php echo $colonia2DB; ?></p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8 c11" style="padding: 20px"><span class="c7"></span></p>
				</td>
			</tr>
			<tr>
				<td style="text-align:center; font-weight:bold; padding-top: 10px"> <p>Puntos de Referencia</p> </td>
				<td style="text-align:center; font-weight:bold;padding-top: 10px"> <p>Giro(s)</p> </td>
				<td style="text-align:center; font-weight:bold; padding-top: 10px"> <p>Espacio que Solocita M2</p> </td>
			</tr>
			<tr class="c12">
				<td class="c5" colspan="1" rowspan="1">
					<p class="c8"><span class="c3"><?php echo $referenciaDB; ?> </span></p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c17"><span class="c3"><?php echo $giroDB ?> </span></p>
				</td>
				<td class="c5" colspan="1" rowspan="1">
					<p class="c14"><span class="c20">&nbsp;<?php echo $mts2DB; ?></span><span class="c7">&nbsp;</span></p>
				</td>
			</tr>
		</tbody>
	</table>
	<p class="c2 c11"><span class="c7"></span></p>
	<p class="c13">
		<span class="c7">D&iacute;as que laborar&aacute; por semana&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Propiedad Privada
		</span>
	</p>
	<p class="c9">
		<span class="c10"><?php
			$string = '';
			$string .= (strrpos($dias, "1") !== false) ? 'Lun &nbsp; &nbsp; &nbsp;' : '' ;
			$string .= (strrpos($dias, "2") !== false) ? 'Mar &nbsp; &nbsp; &nbsp;' : '' ;
			$string .= (strrpos($dias, "3") !== false) ? 'Mie &nbsp; &nbsp; &nbsp;' : '' ;
			$string .= (strrpos($dias, "4") !== false) ? 'Jue &nbsp; &nbsp; &nbsp;' : '' ;
			$string .= (strrpos($dias, "5") !== false) ? 'Vie &nbsp; &nbsp; &nbsp;' : '' ;
			$string .= (strrpos($dias, "6") !== false) ? 'Sab &nbsp; &nbsp; &nbsp;' : '' ;
			$string .= (strrpos($dias, "7") !== false) ? 'Dom &nbsp; &nbsp; &nbsp;' : '' ;
			
			echo $string; ?>
		</span>
		<span class="c20">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
		</span>
		<span class="c7">
			<?php echo $PropiedadDB; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
		</span>
	</p>
	<p class="c1"><span class="c7"></span></p>
	<p class="c9">
		<span class="c7">Horario: &nbsp;De:&nbsp;&nbsp;<?php echo $inicioDB; ?>&nbsp;&nbsp;&nbsp;&nbsp;A:&nbsp;&nbsp;
			<?php echo $finDB; ?> &nbsp;HRS
		</span>
	</p>
	<p class="c1"><span class="c7"></span></p>
	<p class="c2"><span class="c7">REQUISITOS CON LOS QUE DEBER&Aacute; CUMPLIR </span></p>
	<p class="c1"><span class="c7"></span></p>
	<p class="c9"><span class="c3">1.- Copia de Identificaci&oacute;n Oficial. </span></p>
	<p class="c9"><span class="c3">
		2.- Copia de comprobante de domicilio actualizado (luz, agua, cable o tel&eacute;fono). </span>
	</p>
	<p class="c9"><span class="c3">3.- Copia de Carta de Salubridad vigente (en caso de venta de alimentos). </span></p>
	<p class="c9"><span class="c3">4.- Croquis. </span></p>
	<p class="c9"><span class="c3">5.- 3 Fotograf&iacute;as del puesto panor&aacute;micas del punto a instalarse. </span></p>
	<p class="c9"><span class="c3">6.- Carta del Delegado o Presidente de colonos / vecinos. </span></p>
	<p class="c9"><span class="c3">7.- Carta de aceptaci&oacute;n de vecinos.</span></p>
	<p class="c1"><span class="c3"></span></p>
	<p class="c13">
		<span class="c3">
			NOTA IMPORTANTE: La autenticidad de la informaci&oacute;n que proporcione en este formulario es bajo protesta de
			decir verdad y queda sujeta a comprobaci&oacute;n de la Direcci&oacute;n de Comercio y Festividades y/o 
			Participaci&oacute;n Ciudadana, pudiendo cancelar en forma definitiva el tr&aacute;mite, 
			en caso de falsedad de los datos. 
		</span>
	</p>
	<p class="c11 c13"><span class="c3"></span></p>
	<p class="c2"><span class="c10">OBSERVACIONES DEL INSPECTOR</span><span class="c3">&nbsp;</span></p>
	<p class="c2"><span class="c3">Observaciones</span></p><p class="c2 c11"><span class="c3"></span></p>
	<p class="c2 c11"><span class="c3"></span></p>
	<p class="c2">
		<span class="c3"><?php echo $dependencie ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp; 
			<?php echo $nombreDB.' '.$paternoDB.' '.$maternoDB ?>
		</span>
	</p>
	<p class="c2 c11"><span class="c3"></span></p><p class="c2 c11"><span class="c3"></span></p>
	<p class="c2 c11">
		<span class="c3"></span></p><p class="c9"><span class="c3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	</p>
	<p class="c9">
		<span class="c3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Persona que autoriza(Nombre firma)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;Solicitante(nombre y firma)
		</span>
	</p>
	<p class="c1"><span class="c3"></span></p>
	<p class="c1"><span class="c3"></span></p>
</body>
</html>
