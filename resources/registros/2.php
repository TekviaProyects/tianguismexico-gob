<div style="padding:2%;" class="">
	<label>Ingresa Dirección</label>
	<input style="width:300px;" type="text" class="form-control" id="in_add">
	<small id="" class="form-text text-muted">Ingresa tu direccion para que el mapa pueda localizarla</small>
</div>
<div style="padding:2%;" class="row">
	<div class="col-md-6 col-sm-12">
		<div id="google_map" style="width: 100%; height: 60vh">
		</div>
	</div>
	<div class="col-md-6 col-sm-12">
		<p>Selecciona el tipo de espacio que necesitas.</p>
		<p>Fijo, Semi-Fijo, Ambulante</p>
		<p></p>
		<select style="width:300px;" class="form-control" name="estados" id="estados" onchange="mostrarValor1(this.value);">
			<option value="Fijo">Fijo</option>
			<option value="Semi-fijo">Semi-Fijo</option>
			<option value="Ambulante">Ambulante</option>
		</select>
		<p></p>
		<button class="btn btn-warning" type="button" id="return2"> Regresar </button>
		<button class="btn btn-warning" type="button" id="registro2">Siguiente</button>
	</div>
</div>

<script src="js/formulario.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsZOvqzL9c7_O7Fj7t3FDt77nejjwbZXw&libraries=places,geometry&callback=init" async defer></script>
<script>

	var valor = $("#campo11r").val();
	$("#estados").val(valor);

	var coordenates = {
		lat : Number($("#lat").val()),
		lng : Number($("#lng").val())
	},
	zoom = 15;

	if(coordenates.lat === 0) coordenates.lat = 20.6739383;
	if(coordenates.lng === 0) coordenates.lng = -103.405454;


	console.log("===========coordenates", coordenates);
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
		
	// Imput para busqueda en google maps
		var input = document.getElementById('in_add');
		var searchBox = new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	// mostrar resultados de la busqueda
		map.addListener('bounds_changed', function() {
			searchBox.setBounds(map.getBounds());
		});
		
        var markers = [];
        
		searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();
			
			if (places.length == 0) {
				return;
			}
			
		// Clear out the old markers.
			markers.forEach(function(marker) {
				marker.setMap(null);
			});
			markers = [];
			
			// For each place, get the icon, name and location.
			var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place) {
				if (!place.geometry) {
					console.log("Returned place contains no geometry");
					return;
				}
				var icon = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				};
				
				var marker = new google.maps.Marker({
						position: place.geometry.location,
						draggable : true,
						map : map,
						title : 'Arrastrar'
					});
				
			// Create a marker for each place.
				markers.push(marker);
				
				google.maps.event.addListener(marker, "dragend", function(event) {
					var lat = event.latLng.lat();
					var lng = event.latLng.lng();
		
					document.getElementById("lat").value = lat;
					document.getElementById("lng").value = lng;
				});
				
				if (place.geometry.viewport) {
				// Only geocodes have viewport.
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(place.geometry.location);
				}
			});
			map.fitBounds(bounds);
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