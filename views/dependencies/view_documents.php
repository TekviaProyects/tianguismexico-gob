<div class="row">
	<div class="col-sm-12 col-md-5">
		<label class="control-label">Estado</label>
		<select 
			onchange="dependencies.list_municipalities({
				div: 'municipiodep',
				estado: $(this).val(),
				from_user: 1
			})"
			required="1" 
			class="form-control" 
			name="estadodep" 
			id="estadodep"><?php
			foreach ($states as $key => $value) { 
				switch ($value['id']) {
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
				} ?>
				<option value="<?php echo $value['id'] ?>" selected><?php echo $state ?></option><?php
			} ?>
		</select>
	</div>
	<div class="col-sm-12 col-md-5">
		<label class="control-label">Municipio</label>
		<select required="1" class="form-control" name="municipiodep" id="municipiodep">
			<option value="Aguascalientes">Aguascalientes</option>
			<option value="Asientos">Asientos</option>
			<option value="Calvillo">Calvillo</option>
			<option value="Cosio">Cosio</option>
			<option value="Jesus Maria">Jesus Maria</option>
			<option value="Pabellon de Arteaga">Pabellon de Arteaga</option>
			<option value="Rincon de Romos">Rincon de Romos</option>
			<option value="San Jose de Gracia">San Jose de Gracia</option>
			<option value="Tepezala">Tepezala</option>
			<option value="El Llano">El Llano</option>
			<option value="San Francisco de los Romo">San Francisco de los Romo</option>
		</select>
	</div>
	<div class="col-sm-12 col-md-2" style="padding-top: 20px">
		<button 
			onclick="dependencies.list_documents({
				div: 'div_documents',
				estate: $('#estadodep').val(),
				municipality: $('#municipiodep').val(),
				from_user: 1
			})"
			class="btn btn-success">
			<i class="fa fa-search"></i> Buscar
		</button>
	</div>
</div>
<div id="div_documents" style="padding-top: 20px"> </div>
<script>
	dependencies.list_municipalities({
		div: 'municipiodep',
		estado: $("#estadodep").val(),
		from_user: 1
	})
</script>