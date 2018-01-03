Seleccione estado y municipio.
<label class="control-label">*Donde se instalara su negocio.</label>

  <select name="mexico" id="mexico" onchange="mostrarInputs(this.value)">
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
<br><br>
  <select name="mexico" id="losmuni" onchange="mostrarValormu(this.value)">
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
<div class="notoy">
<form method="post" id="estado" enctype="multipart/form-data">
  <input name="estado" type="text" id="1muni"/>
</form>
</div>
<br><br>
<button class="btn btn-success btn-block" type="submit" id="registromx">Siguiente</button>
<script src="js/formulario.js"></script>
<script>
function mostrarInputs(dato) {
        document.getElementById('1muni').value=dato;
        document.getElementById('iestado').value=dato;
        event.preventDefault();
      var form = $('#estado')[0];
      var data = new FormData(form);
      data.append("CustomField", "This is some extra data, testing");
      $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "php/back/buscarestado.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
          $('#losmuni').html('');
            $('#losmuni').html(data);

        },
        error: function (e) {
        }
      });
      event.preventDefault();
    var form = $('#estado')[0];
    var data = new FormData(form);
    data.append("CustomField", "This is some extra data, testing");
    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "php/back/buscarmunicipio.php",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      success: function (data) {
        console.log(data);
        document.getElementById('imunicipio').value=data;

      },
      error: function (e) {
      }
    });
    }
</script>
<script>
var mostrarValormu = function(x){
     document.getElementById('imunicipio').value=x;
};
</script>
