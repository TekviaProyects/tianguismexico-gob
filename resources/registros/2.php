Selecciona el tipo de espacio que necesitas. <label class="control-label">Fijo, Semi-Fijo, Ambulante</label>
<br>
<select name="estados" id="estados" onchange="mostrarValor1(this.value);">
	<option value="Fijo">Fijo</option>
	<option value="Semi-fijo">Semi-Fijo</option>
	<option value="Ambulante">Ambulante</option>
</select>
<br>
<br>

<div id="google_map" style="width: 100%; height: 90vh">

</div>

<button class="btn btn-success btn-block" type="submit" id="registro2">
	Siguiente
</button>
<script src="js/formulario.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsZOvqzL9c7_O7Fj7t3FDt77nejjwbZXw&libraries=places,geometry&callback=init" async defer></script>
<script>
	var coordenates = {
		lat : 20.6739383,
		lng : -103.405454
	},
	zoom = 15;
	
	if ("geolocation" in navigator) {
		navigator.geolocation.getCurrentPosition(function(position) {
			coordenates.lat = position.coords.latitude, coordenates.lng = position.coords.longitude;

			console.log("========> Coordenates", coordenates);
			
			document.getElementById("lat").value = coordenates.lat;
			document.getElementById("lng").value = coordenates.lng;
		});
	}

///////////////// ******** -------						init						------ ************ //////////////////
//////// Load a Google map
	// The parameters can receive:
	
	function init() {
		if (coordenates.lat === 20.6739383 || coordenates.lng === -103.405454) {
			zoom = 7;
		}

		var myLatlng = {
			lat : coordenates.lat,
			lng : coordenates.lng
		};
			
		var map = new google.maps.Map(document.getElementById('google_map'), {
			zoom : zoom,
			center : myLatlng
		});
		
		var marker = new google.maps.Marker({
			position : myLatlng,
			draggable : true,
			map : map,
			title : 'Arrastrar'
		});

		google.maps.event.addListener(marker, "dragend", function(event) {
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
			
			document.getElementById("lat").value = lat;
			document.getElementById("lng").value = lng;
		});
	}

///////////////// ******** -------					END init						------ ************ //////////////////

	var mostrarValor1 = function(x) {
		document.getElementById('campo11r').value = x;
	}; 
</script>
