<div class="row">
	<div class="col-sm-12 col-md-5">
		<label class="control-label">Estado</label>
		<select 
			onchange="dependencies.list_municipalities({
				div: 'municipiodep',
				estado: $(this).val()
			})"
			required="1" 
			class="form-control" 
			name="estadodep" 
			id="estadodep">
			<option value="1">Aguascalientes</option>
			<option value="2">Baja California</option>
			<option value="3">Baja California Sur</option>
			<option value="4">Campeche</option>
			<option value="5">Coahuila de Zaragoza</option>
			<option value="6">Colima</option>
			<option value="7">Chiapas</option>
			<option value="8">Chihuahua</option>
			<option value="9">Distrito Federal</option>
			<option value="10">Durango</option>
			<option value="11">Guanajuato</option>
			<option value="12">Guerrero</option>
			<option value="13">Hidalgo</option>
			<option value="14">Jalisco</option>
			<option value="15">México</option>
			<option value="16">Michoacán de Ocampo</option>
			<option value="17">Morelos</option>
			<option value="18">Nayarit</option>
			<option value="19">Nuevo León</option>
			<option value="20">Oaxaca</option>
			<option value="21">Puebla</option>
			<option value="22">Querétaro</option>
			<option value="23">Quintana Roo</option>
			<option value="24">San Luis Potosí</option>
			<option value="25">Sinaloa</option>
			<option value="26">Sonora</option>
			<option value="27">Tabasco</option>
			<option value="28">Tamaulipas</option>
			<option value="29">Tlaxcala</option>
			<option value="30">Veracruz de Ignacio de la Llave</option>
			<option value="31">Yucatán</option>
			<option value="32">Zacatecas</option>
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