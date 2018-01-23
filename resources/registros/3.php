<h4 style="padding:2%;">Datos de donde se instalara su negocio, favor de ingresar todos los datos correctos
ya que si falta alguno, el tramite se puede anular por falta de datos.</h4>
<div style="padding:2%;">
<div class="row">
	<div class="col">
		<label class="control-label">Calle</label>
		<input type="text" class="form-control" name="calle" id="calle" autocomplete="off" required="1"/>
	</div>
	<div class="col">
		<label class="control-label">Número</label>
		<input type="number" class="form-control" name="numerolocal" id="numerolocal" autocomplete="off" required="1"/>
	</div>
</div>
<div class="row">
	<div class="col">
		<label class="control-label">Colonia</label>
		<input type="text" class="form-control" name="colonia2" id="colonia2" autocomplete="off" required="1"/>
	</div>
	<div class="col">
		<label class="control-label">Entre Calles</label>
		<input type="text" class="form-control" name="calles" id="calles" autocomplete="off" required="1"/>
	</div>
</div>
<div class="row">
	<div class="col">
		<label class="control-label">Puntos de Referencia</label>
		<input type="text" class="form-control" name="referencia" id="referencia" autocomplete="off" required="1"/>
	</div>
</div>
<div class="row">
	<div class="col">
		<label class="control-label">Giro que solicita</label>
		<form method="post" enctype="multipart/form-data" id="giro">
			<select class="form-control" name="giro" id="giro" onchange="mostrarValor2(this.value);">
				<option value="Electronico">Electrónico</option>
				<option value="Comercio">Comercio</option>
				<option value="Comida">Comida</option>
			</select>
		</form>
	</div>
	<div class="col">
		<label class="control-label">Espacio que solicita en MTS2</label>
		<input type="number" class="form-control" name="mts2" id="mts2" autocomplete="off" required="1"/>
	</div>
</div>
<label class="control-label">Días que Labora</label>
<p></p>
<div class="row">
	<div class="col">
		<div class="form-check form-check-inline">
			<input type="checkbox" name="dia" value="Lunes<br>" id="dia1" onClick="seleccionar()">
			<label class="form-check-label" for="inlineCheckbox1">Lunes</label>
		</div>
			<div class="form-check form-check-inline">
				<input type="checkbox" name="dia" value="Martes<br>" id="dia2">
				Martes
			</div>
			<div class="form-check form-check-inline">
				<input type="checkbox" name="dia" value="Miercoles<br>" id="dia3">
				Miércoles
			</div>
			<div class="form-check form-check-inline">
				<input type="checkbox" name="dia" value="Jueves<br>" id="dia4">
				<label class="form-check-label" for="inlineCheckbox1">Jueves</label>
			</div>
			<div class="form-check form-check-inline">
				<input type="checkbox" name="dia" value="Viernes<br>" id="dia5">
				Viernes
		</div>
		</div>
	</div>
		<div class="form-check form-check-inline">
			<input type="checkbox" name="dia" value="Sabado<br>" id="dia6">
			Sábado
		</div>
		<div class="form-check form-check-inline">
			<input type="checkbox" name="dia" value="Domingo" id="dia7">
			Domingo
		</div>
		<p></p>
	<label class="control-label">Horario de</label>
	<input style="width:300px;" type="time" class="form-control" name="inicio" id="inicio" autocomplete="off" required="1"/>
	<label class="control-label">a</label>
	<input style="width:300px;" type="time" class="form-control" name="fin" id="fin" autocomplete="off" required="1"/>
	<label class="control-label">Propiedad Privada</label>
	<p></p>
	<select style="width:100px;" class="form-control" name="propiedad" id="propiedad" onchange="mostrarValor3(this.value);">
		<option value="Si">Si</option>
		<option value="No">No</option>
	</select>
	<p></p>
	<button class="btn btn-warning" type="submit" id="return3"> regresar </button>
	<button class="btn btn-warning" type="submit" id="registro3">Siguiente</button>
</div>
<script src="js/formulario.js"></script>
<script type="text/javascript">
	var Calle = $("#12r").val();
	$("#calle").val(Calle);

	var Num = $("#13r").val();
	$("#numerolocal").val(Num);

	var entre = $("#14r").val();
	$("#calles").val(entre);

	var colonia = $("#15r").val();
	$("#colonia2").val(colonia);

	var ref = $("#16r").val();
	$("#referencia").val(ref);

	var giro = $("#campo17r").val();
	giro = giro.substring(0, 1).toUpperCase() + giro.substring(1);
	$("[name=giro]").val(giro);

	var mts2 = $("#18r").val();
	$("#mts2").val(mts2);

	var inicio = $("#19r").val();
	$("#inicio").val(inicio);

	var fin = $("#20r").val();
	$("#fin").val(fin);

	var propiedad = $("#campo21r").val();
	$("#propiedad").val(propiedad);

	var dias = $("#dias").val();
	var lu = dias.indexOf("1"),
		ma = dias.indexOf("2"),
		mi = dias.indexOf("3"),
		ju = dias.indexOf("4"),
		vi = dias.indexOf("5"),
		sa = dias.indexOf("6"),
		dom = dias.indexOf("7");

	if(lu !== -1) $("#dia1").prop("checked", true);
	if(ma !== -1) $("#dia2").prop("checked", true);
	if(mi !== -1) $("#dia3").prop("checked", true);
	if(ju !== -1) $("#dia4").prop("checked", true);
	if(vi !== -1) $("#dia5").prop("checked", true);
	if(sa !== -1) $("#dia6").prop("checked", true);
	if(dom !== -1) $("#dia7").prop("checked", true);
</script>
<script>
	var mostrarValor2 = function(x) {
		console.log("=====> mostrar", x);
		document.getElementById('campo17r').value = x;
	};
</script>
<script>
	var mostrarValor3 = function(x) {
		document.getElementById('campo21r').value = x;
	};
</script>
<script>
	function seleccionar() {
		var chk = document.getElementById('dia1');

		if (chk.checked) {
			document.getElementById('dias').style.display = 'Lunes';
		} else {
			document.getElementById('dias').style.display = '';
		}
	}
</script>
