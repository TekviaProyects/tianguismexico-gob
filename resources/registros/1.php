<?php session_start(); ?>
<form method="post" id="formulario" onsubmit="return forM(this)" enctype="multipart/form-data" >
	<h3 class="nomargin">Llena todos los datos.</h3>
	<p class="mt5 mb20">
		Es importante recordar correo y contraseña ya que estos serán necesarios
		para dar seguimiento al tramite.
	</p>
	<div class="mb10">
		<div class="" style="display:none;">
			<label class="control-label">Nombre (s)</label>
			<input
				readonly="true"
				value="<?php echo $_SESSION['user']['name'] ?>"
				type="text"
				class="form-control"
				name="nombre"
				id="nombre"
				autocomplete="off"
				required="1"/>
			<label class="control-label">Apellido Paterno</label>
			<input
				readonly="true"
				value="<?php echo $_SESSION['user']['last_name'] ?>"
				type="text"
				class="form-control"
				name="paterno"
				id="paterno"
				autocomplete="off"
				required="1"/>
			<label class="control-label">Apellido Materno</label>
			<input
				readonly="true"
				value="<?php echo $_SESSION['user']['last_name2'] ?>"
				type="text"
				class="form-control"
				name="materno"
				id="materno"
				autocomplete="off"
				required="1"/>
			<label class="control-label">Correo Electrónico</label>
			<input
				readonly="true"
				value="<?php echo $_SESSION['user']['mail'] ?>"
				type="text"
				class="form-control"
				name="correo"
				id="correo"
				autocomplete="off"
				required="1"/>

				<label class="control-label">Contraseña</label>
				<input
					readonly="true"
					value="<?php echo $_SESSION['user']['pass'] ?>"
					type="password"
					class="form-control"
					name="password"
					id="password"
					autocomplete="off"
					required="1"/>
				<label class="control-label">Verifica la Contraseña</label>
				<input
					readonly="true"
					value="<?php echo $_SESSION['user']['pass'] ?>"
					type="password"
					class="form-control"
					name="password1"
					id="password1"
					autocomplete="off"
					required="1"/>
			</div>
		</div>

		<label class="control-label">Domicilio Particular</label>
		<input type="text" class="form-control" name="domicilio" id="domicilio" autocomplete="off" required="1"/>
		<label class="control-label">Colonia</label>
		<input type="text" class="form-control" name="colonia1" id="colonia1" autocomplete="off" required="1"/>
		<label class="control-label">Municipio</label>
		<input type="text" class="form-control" name=" municipio1" id="municipio1" autocomplete="off" required="1"/>
		<label class="control-label">Código Postal</label>
		<input type="number" class="form-control" name="postal" id="postal" autocomplete="off" required="1"/>
		<label class="control-label">Teléfono</label>
		<input type="number" class="form-control" name=" telefono" id="telefono" autocomplete="off" required="1"/>
	<br/>
</form>
<button class="btn btn-success btn-block" type="submit" id="registro1">
	Siguiente
</button>
<script src="js/formulario.js"></script>
