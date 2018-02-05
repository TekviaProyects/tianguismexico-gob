<?php session_start(); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

<form method="post" id="formulario" onsubmit="return forM(this)" enctype="multipart/form-data" style="padding: 2%;" >
	<h3 class="nomargin">Llena todos los datos.</h3>
	<p>
		Para obtener tu permiso municipal en puesto Fijo, Semi-fijo, u Ambulante.
	</p>
	<div class="form-group">
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
		<div class="row">
			<div class="col">
				<label class="control-label">Domicilio Particular</label>
				<input type="text" class="form-control" name="domicilio" id="domicilio" autocomplete="off" required="1"/>
			</div>
			<div class="col">
				<label class="control-label">Colonia</label>
				<input type="text" class="form-control" name="colonia1" id="colonia1" autocomplete="off" required="1"/>
			</div>
		</div>
		<p></p>
		<div class="row">
			<div class="col">
				<label class="control-label">Municipio</label>
				<input type="text" class="form-control" name=" municipio1" id="municipio1" autocomplete="off" required="1"/>
			</div>
			<div class="col">
				<label class="control-label">Código Postal</label>
				<input type="number" class="form-control" name="postal" id="postal" autocomplete="off" required="1"/>
			</div>
		</div>
		<p></p>
		<div class="row">
			<div class="col">
				<label class="control-label">Teléfono</label>
				<input type="number" class="form-control" name=" telefono" id="telefono" autocomplete="off" required="1"/>
			</div>
		</div>
	<br/>
</form>
<button class="btn btn-warning" type="button" id="registro1" style="margin-left: 2%;">
	Siguiente
</button>
<script src="js/formulario.js"></script>

<script type="text/javascript">

		var domicilio = $("#5r").val();
		$("#domicilio").val(domicilio);

		var colonia = $("#6r").val();
		$("#colonia1").val(colonia);

		var municipio = $("#7r").val();
		$("#municipio1").val(municipio);

		var cp = $("#8r").val();
		$("#postal").val(cp);

		var telefono = $("#9r").val();
		$("#telefono").val(telefono);

</script>
