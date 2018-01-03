<?php 
	// error_reporting(0);
	session_start();
	
	$request_id = $_REQUEST['request_id'];
	$month = date('m');
	$year = date('Y');
	$next_year = $year + 1;
	
	switch ($month) {
		case 1: $month = 'ENE'; $month_long = 'Enero'; break;
		case 2: $month = 'FEB'; $month_long = 'Febrero'; break;
		case 3: $month = 'MAR'; $month_long = 'Marzo'; break;
		case 4: $month = 'ABR'; $month_long = 'Abril'; break;
		case 5: $month = 'MAY'; $month_long = 'Mayo'; break;
		case 6: $month = 'JUN'; $month_long = 'Junio'; break;
		case 7: $month = 'JUL'; $month_long = 'Julio'; break;
		case 8: $month = 'AGO'; $month_long = 'Agosto'; break;
		case 9: $month = 'SEP'; $month_long = 'Septiembre'; break;
		case 10: $month = 'OCT'; $month_long = 'Octubre'; break;
		case 11: $month = 'NOV'; $month_long = 'Noviembre'; break;
		case 12: $month = 'DIC'; $month_long = 'Diciembre'; break;
	}
	
	include ("php/conection/conection.php");
	date_default_timezone_set('America/Mexico_City');
	
	$consulta = "	SELECT 
						* 
					FROM 
						registros 
					WHERE 
						id = " . $request_id;
	$resultado = mysqli_query($conexion, $consulta);
	
	while ($row = mysqli_fetch_array($resultado)) {
		$nombreDB = $row['nombre'];
		$paternoDB = $row['paterno'];
		$maternoDB = $row['materno'];
		$emailDB = $row['correo'];
		$domicilioDB = $row['domicilio'];
		$calle = $row['calle'];
		$calles = $row['calles'];
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
		$id_dependencie = $_SESSION['dependencie']['id'];
	} else {
		$sql = "SELECT
					id, nombredep
				FROM
					dependencies
				WHERE
					estadodep = ".$estadomx."
				AND
					municipiodep = '".$municipiomx."'";
		$dependencie = mysqli_query($conexion, $sql);
		
		while ($row = mysqli_fetch_array($dependencie)) {
			$dependencie = $row['nombredep'];
			$id_dependencie = $row['id'];
		}
	}

/*	QR
==================================================================================================*/

// URL
	$host = $_SERVER["HTTP_HOST"];
	$url = $_SERVER["REQUEST_URI"];
	$url = "http://" . $host . $url;
	$url =  str_replace(basename($url), '', $url);
	$url = $url.'info_request.php?id='.$request_id;

//set it to writable location, a place for temp generated PNG files
	$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
	
//html PNG location prefix
	$PNG_WEB_DIR = 'temp/';
	
	include "plugins/phpqrcode/qrlib.php";    
	
	//ofcourse we need rights to create temp dir
	if (!file_exists($PNG_TEMP_DIR))
	    mkdir($PNG_TEMP_DIR);
	
	$filename = $PNG_TEMP_DIR.'test.png';
	
	$matrixPointSize = 4;
	$errorCorrectionLevel = 'L';
	
	$filename = $PNG_TEMP_DIR.'test.png';
	QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
	
/*	END QR
===================================================================================================*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
	<HEAD>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<META http-equiv="X-UA-Compatible" content="IE=8">
		<TITLE>Formato de aprovacion</TITLE>
		<STYLE type="text/css">
			body {
				margin-top: 0px;
				margin-left: 0px;
			}

			#page_1 {
				position: relative;
				overflow: hidden;
				margin: 16px 0px 16px 0px;
				padding: 0px;
				border: none;
				width: 816px;
				height: 1024px;
			}

			#page_1 #p1dimg1 {
				position: absolute;
				top: 0px;
				left: 16px;
				z-index: -1;
				width: 784px;
				height: 1024px;
			}
			#page_1 #p1dimg1 #p1img1 {
				width: 784px;
				height: 1024px;
			}

			.dclr {
				clear: both;
				float: none;
				height: 1px;
				margin: 0px;
				padding: 0px;
				overflow: hidden;
			}

			.ft0 {
				font: 16px 'Arial';
				color: #92cddc;
				line-height: 18px;
			}
			.ft1 {
				font: 11px 'Arial';
				color: #92cddc;
				line-height: 14px;
			}
			.ft2 {
				font: 11px 'Cambria';
				color: #92cddc;
				line-height: 12px;
			}
			.ft3 {
				font: 11px 'Cambria';
				color: #92cddc;
				margin-left: 2px;
				line-height: 12px;
			}
			.ft4 {
				font: 16px 'Cambria';
				color: #92cddc;
				line-height: 19px;
			}
			.ft5 {
				font: 16px 'Cambria';
				line-height: 19px;
			}
			.ft6 {
				font: 13px 'Courier New';
				color: #92cddc;
				line-height: 16px;
			}
			.ft7 {
				font: 13px 'Courier New';
				line-height: 16px;
			}
			.ft8 {
				font: 1px 'Courier New';
				line-height: 1px;
			}
			.ft9 {
				font: 9px 'Courier New';
				line-height: 12px;
			}
			.ft10 {
				font: 11px 'Courier New';
				line-height: 14px;
			}

			.p0 {
				text-align: left;
				padding-left: 150px;
				margin-top: 29px;
				margin-bottom: 0px;
			}
			.p1 {
				text-align: right;
				padding-right: 48px;
				margin-top: 40px;
				margin-bottom: 0px;
			}
			.p2 {
				text-align: right;
				padding-right: 48px;
				margin-top: 0px;
				margin-bottom: 0px;
			}
			.p3 {
				text-align: left;
				padding-left: 58px;
				padding-right: 625px;
				margin-top: 68px;
				margin-bottom: 0px;
				text-indent: 25px;
			}
			.p4 {
				text-align: center;
				padding-right: 68px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p5 {
				text-align: right;
				padding-right: 95px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p6 {
				text-align: left;
				padding-left: 42px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p7 {
				text-align: left;
				padding-left: 28px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p8 {
				text-align: right;
				padding-right: 72px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p9 {
				text-align: right;
				padding-right: 117px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p10 {
				text-align: left;
				margin-top: 0px;
				margin-bottom: 0px;
				/*white-space: nowrap;*/
			}
			.p11 {
				text-align: left;
				padding-left: 48px;
				margin-top: 56px;
				margin-bottom: 0px;
			}
			.p12 {
				text-align: left;
				padding-left: 48px;
				margin-top: 0px;
				margin-bottom: 0px;
			}
			.p13 {
				text-align: left;
				padding-left: 40px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p14 {
				text-align: center;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p15 {
				text-align: right;
				padding-right: 144px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p16 {
				text-align: center;
				padding-right: 4px;
				margin-top: 0px;
				margin-bottom: 0px;
				white-space: nowrap;
			}
			.p17 {
				text-align: left;
				padding-left: 48px;
				margin-top: 44px;
				margin-bottom: 0px;
			}
			.p18 {
				text-align: left;
				padding-left: 48px;
				margin-top: 43px;
				margin-bottom: 0px;
			}
			.p19 {
				text-align: justify;
				padding-left: 48px;
				padding-right: 48px;
				margin-top: 0px;
				margin-bottom: 0px;
			}
			.p20 {
				text-align: justify;
				padding-left: 48px;
				padding-right: 48px;
				margin-top: 5px;
				margin-bottom: 0px;
			}
			.p21 {
				text-align: left;
				padding-left: 48px;
				margin-top: 55px;
				margin-bottom: 0px;
			}
			.p22 {
				text-align: left;
				padding-left: 324px;
				margin-top: 96px;
				margin-bottom: 0px;
			}
			.p23 {
				text-align: left;
				padding-left: 350px;
				margin-top: 0px;
				margin-bottom: 0px;
			}

			.td0 {
				padding: 0px;
				margin: 0px;
				width: 111px;
				vertical-align: bottom;
			}
			.td1 {
				padding: 0px;
				margin: 0px;
				width: 194px;
				vertical-align: bottom;
			}
			.td2 {
				padding: 0px;
				margin: 0px;
				width: 242px;
				vertical-align: bottom;
			}
			.td3 {
				padding: 0px;
				margin: 0px;
				width: 101px;
				vertical-align: bottom;
			}
			.td4 {
				padding: 0px;
				margin: 0px;
				width: 400px;
				vertical-align: bottom;
			}
			.td5 {
				padding: 0px;
				margin: 0px;
				width: 224px;
				vertical-align: bottom;
			}
			.td6 {
				padding: 0px;
				margin: 0px;
				width: 152px;
				vertical-align: bottom;
			}
			.td7 {
				padding: 0px;
				margin: 0px;
				width: 400px;
				vertical-align: bottom;
			}
			.td8 {
				padding: 0px;
				margin: 0px;
				width: 176px;
				vertical-align: bottom;
			}

			.tr0 {
				height: 19px;
			}
			.tr1 {
				height: 21px;
			}
			.tr2 {
				height: 18px;
			}
			.tr3 {
				height: 16px;
			}
			.tr4 {
				height: 44px;
			}

			.t0 {
				width: 648px;
				margin-left: 73px;
				margin-top: 33px;
				font: 16px 'Cambria';
				color: #92cddc;
			}
			.t1 {
				width: 800px;
				margin-left: 48px;
				margin-top: 11px;
				font: 13px 'Courier New';
			}
		</STYLE>
	</HEAD>
	<BODY>
		<DIV id="page_1">
			<DIV id="p1dimg1">
				<P class="p0 ft0">
					PERMISO PARA COMERCIO EN LA VÍA PUBLICA
				</P>
				<img 
					src="dep_files/<?php echo $id_dependencie ?>/logo.png" 
					style="height: 100px; margin-bottom: -100px; margin-left: 50px" />
				<P class="p1 ft1">
					Secretaría de Servicios
				</P>
				<P class="p2 ft1">
					Públicos Municipales
				</P>
				<P class="p3 ft2">
					<SPAN class="ft3"><?php echo $dependencie ?></SPAN>
				</P>
				<TABLE cellpadding="0" cellspacing="0" class="t0">
					<TR>
						<TD class="tr0 td0">
							<P class="p4 ft4">
								FOLIO
							</P>
						</TD>
						<TD class="tr0 td1">
							<P class="p5 ft4">
								ZONA
							</P>
						</TD>
						<TD class="tr0 td2">
							<P class="p6 ft4">
								VIGENCIA
							</P>
						</TD>
						<TD class="tr0 td3">
							<P class="p7 ft4">
								GIRO
							</P>
						</TD>
					</TR>
					<TR>
						<TD class="tr1 td0">
							<P class="p8 ft5">
								<?php echo $request_id ?>
							</P>
						</TD>
						<TD class="tr1 td1">
							<P class="p9 ft5">
								2
							</P>
						</TD>
						<TD class="tr1 td2">
							<P class="p10 ft5">
								<?php echo $month.' '.$year.' - '.$month.' '.$next_year ?>
							</P>
						</TD>
						<TD class="tr1 td3">
							<P class="p10 ft5">
								<?php echo $giroDB ?>
							</P>
						</TD>
					</TR>
				</TABLE>
				<P class="p11 ft6">
					Nombre, Denominación o Razón Social
				</P>
				<P class="p12 ft7">
					<?php echo $nombreDB.' '.$paternoDB.' '.$maternoDB ?>
				</P><br />
				<table style="padding-left: 48px; margin-bottom: -20px">
					<thead>
						<tr style="color: #9ED3DF">
							<th style="width: 270px">Ubicación del establecimiento</th>
							<th style="width: 130px">Núm. Exterior</th>
							<th>Núm. Letra interior</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 270px"><?php echo $calle ?></td>
							<td style="width: 130px"><?php echo $numerolocalDB ?></td>
							<td>N/A</td>
						</tr>
					</tbody>
				</table>
				<P class="p11 ft6">
					Calles colindantes
				</P>
				<P class="p12 ft7">
					<?php echo $calles.' '.$colonia2DB ?>
				</P>
				<P class="p17 ft6">
					Linderos, plantas y dimensiones del establecimiento
				</P>
				<P class="p12 ft7">
					PUESTO <?php echo $estadoDB.' '.$mts2DB ?>M<SPAN class="ft9">2 </SPAN><?php echo $referenciaDB ?>
				</P>
				<P class="p18 ft6">
					Observaciones:
				</P>
				<P class="p19 ft10">
					El presente permiso es personal e intransferible y solo puede ser ejercido por su titular en el lugar 
					autorizado, en consecuencia no es objeto de comercio, arrendamiento, venta, donación, comodato, permuta, 
					garantía, prenda, hipoteca ni explotación del mismo por terceros.
				</P>
				<P class="p20 ft10">
					Es facultad exclusiva del municipio por medio de la oficialía mayor de padrón y licencias la autorización, 
					permiso o reubicación del comercio en la vía pública
				</P>
				<P class="p21 ft7">
					<SPAN class="ft6">Fecha: </SPAN><?php echo date('d').' de '.$month_long.' '.$year ?>
				</P>
				<P class="p19 ft10" style="padding-top: 20px; margin-bottom: -160px">
					<img src="<?php echo $filename ?>" />
				</P>
				<P class="p22 ft5">
					_____________________________
				</P>
				<P class="p23 ft5">
					Jefe de Mercados
				</P>
			</DIV>
		</DIV>
	</BODY>
</HTML>