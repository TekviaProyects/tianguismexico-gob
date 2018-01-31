<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<?php
	$url = 'users_files/'.$user['id'].'/perfil.png';
	$mail = $_REQUEST['mail'];
	
	include ("php/conection/conection.php");
	date_default_timezone_set('America/Mexico_City');
	
	$consulta = "	SELECT 
						* 
					FROM 
						users 
					WHERE 
						mail = '".$mail."'";
	$resultado = mysqli_query($conexion, $consulta);
	
	while ($row = mysqli_fetch_array($resultado)) {
		$user['name'] = $row['name'];
		$user['curp'] = $row['curp'];
		$user['last_name'] = $row['last_name'];
		$user['last_name2'] = $row['last_name2'];
		$user['mail'] = $row['mail'];
		$user['cp'] = $row['state'];
		$user['state'] = $row['state'];
		$user['municipality'] = $row['municipality'];
		$user['colony'] = $row['colony'];
		$user['addres'] = $row['addres'];
		$user['num'] = $row['num'];
		$user['num_int'] = $row['num_int'];
	}
	
	switch ($user['state']) {
		case 1: $state = 'Aguascalientes'; break;
		case 2: $state = 'Baja California'; break;
		case 3: $state = 'Baja California Sur'; break;
		case 4: $state = 'Campeche'; break;
		case 5: $state = 'Coahuila de Zaragoza'; break;
		case 6: $state = 'Colima'; break;
		case 7: $state = 'Chiapas'; break;
		case 8: $state = 'Chihuahua'; break;
		case 9: $state = 'Distrito Federal'; break;
		case 10: $state = 'Durango'; break;
		case 11: $state = 'Guanajuato'; break;
		case 12: $state = 'Guerrero'; break;
		case 13: $state = 'Hidalgo'; break;
		case 14: $state = 'Jalisco'; break;
		case 15: $state = 'México'; break;
		case 16: $state = 'Michoacán de Ocampo'; break;
		case 17: $state = 'Morelos'; break;
		case 18: $state = 'Nayarit'; break;
		case 19: $state = 'Nuevo León'; break;
		case 20: $state = 'Oaxaca'; break;
		case 21: $state = 'Puebla'; break;
		case 22: $state = 'Querétaro'; break;
		case 23: $state = 'Quintana Roo'; break;
		case 24: $state = 'San Luis Potosí'; break;
		case 25: $state = 'Sinaloa'; break;
		case 26: $state = 'Sonora'; break;
		case 27: $state = 'Tabasco'; break;
		case 28: $state = 'Tamaulipas'; break;
		case 29: $state = 'Tlaxcala'; break;
		case 30: $state = 'Veracruz de Ignacio de la Llave'; break;
		case 31: $state = 'Yucatán'; break;
		case 32: $state = 'Zacatecas'; break;
		default: $state = ''; break;
	}
?>

<div class="row">
	<div class="col-sm-12" align="center">
		<img src="<?php echo $url ?>" alt="images/uploadfile.png" style="max-height: 260px">
	</div>
</div>
<div class="row" style="padding-top: 20px">
	<div class="col-sm-12">
		<label class="control-label">Nombre: <?php echo $user['name'] ?></label><br />
		<label class="control-label">CURP: <?php echo $user['curp'] ?></label><br />
		<label class="control-label">Apellido paterno: <?php echo $user['last_name'] ?></label><br />
		<label class="control-label">Apellido materno: <?php echo $user['last_name2'] ?></label><br />
		<label class="control-label">Correo: <?php echo $user['mail'] ?></label><br />
		<label class="control-label">Codigo postal: <?php echo $user['cp'] ?></label><br />
		<label class="control-label">Estado: <?php echo $state ?></label><br />
		<label class="control-label">Municipio: <?php echo $user['municipality'] ?></label><br />
		<label class="control-label">Colonia: <?php echo $user['colony'] ?></label><br />
		<label class="control-label">Calle: <?php echo $user['addres'] ?></label><br />
		<label class="control-label">Num. Ext.: <?php echo $user['num'] ?></label><br />
		<label class="control-label">Num. Int.: <?php echo $user['num_int'] ?></label><br />
	</div>
</div>
<script src="plugins/jquery-1.11.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>