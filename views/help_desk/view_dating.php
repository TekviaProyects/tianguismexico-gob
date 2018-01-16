<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" />
		<script type="text/javascript" src="plugins/moment/moment.js"></script>
		<script src="plugins/jquery-1.11.2.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
		<script src='plugins/fullCalendarLang.js'></script>
	<!-- sweetalert -->
		<link rel="stylesheet" href="plugins/sweetalert-master/dist/sweetalert.css" />
		<script type="text/javascript" src="plugins/sweetalert-master/dist/sweetalert.min.js"></script>
		
		
		<script src="js_system/dependencies.js"></script>
		<script src="js_system/help_desk.js"></script>
		<script>
			function init_calendar($objet){
				console.log("==========> init_calendar", $objet);
				
				var maxDate = new Date(),
					today = new Date(),
					end_date = new Date(),
					current = new Date();
				
				end_date.setDate(end_date.getDate() + 30);
			
			// Today
				var dd = today.getDate();
				var mm = today.getMonth() + 1;//January is 0!
				var yyyy = today.getFullYear();
				if (dd < 10) dd = '0' + dd;
				if (mm < 10) mm = '0' + mm;
				today = yyyy + '-' + mm + '-' + dd;
			
			// End day
				var ed = end_date.getDate();
				var em = end_date.getMonth() + 1;//January is 0!
				var eyyy = end_date.getFullYear();
				if (ed < 10) ed = '0' + ed;
				if (em < 10) em = '0' + em;
				end_date = eyyy + '-' + em + '-' + ed;
				
				current.setDate(current.getDate() - 1);
				maxDate.setDate(maxDate.getDate() + 30);
				
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'agendaWeek,agendaDay'
					},
					weekends: false,
					nowIndicator: true,
					navLinks: true, // can click day/week names to navigate views
					selectable: true,
					selectHelper: true,
					select: function(start, end) {
						
						var minutes = moment().diff(start, 'minutes'),
							duration = end.diff(start, 'minutes');
						
						if (minutes > 0){
							alert("No hay horarios disponibles");
							$('#calendar').fullCalendar('unselect');
							
							return;
						}
						
						if (duration > 30){
							alert("La cita es de maximo 30 min.");
							$('#calendar').fullCalendar('unselect');
							
							return;
						}
						
						var title = prompt('Asunto:'),
						    eventData;
						
						if (title) {
							eventData = {
								title: title,
								start: start,
								end: end
							};
							$('#calendar').fullCalendar('renderEvent', eventData, true);
							
							var f_ini = start.format(),
								f_end = end.format();
							
						// Save dating
							help_desk.save_dating({
								title: title,
								f_ini: f_ini,
								f_end: f_end,
								municipality: $("#municipality").val(),
								state: $("#state").val(),
								from_user: 1
							})
						}
						
						$('#calendar').fullCalendar('unselect');
					},
					editable: false,
					eventLimit: true, // allow "more" link when too many events
					events: $objet,
					locale: 'es',
					showNoncurrents: false,
					dayRender: function(date, cell) {
						$('#calendar').fullCalendar('unselect');
						if (date < current) {
							$(cell).css('background-color', 'grey');
						}
					},
					viewRender: function(view) {
						if (view.start > maxDate){
							$('#calendar').fullCalendar('gotoDate', current);
						}
					},
					minTime: '09:00', 
					maxTime: '16:00',
					selectLongPressDelay: 700,
					allDaySlot: false,
					slotDuration: '00:30:00',
					defaultView: 'agendaWeek',
					visibleRange: {
						start: today,
						end: end_date
					}
				});
			}
			
			$(document).ready(function() {
				$("#state").val(1);
				$("#municipality").val("Aguascalientes");
				
				init_calendar([{
					title: 'All Day Event',
					start: '2018-02-01'
				}]);
				
				help_desk.list_datings({
					json: 1,
					estate: $('#state').val(),
					municipality: $('#municipality').val(),
					from_user: 1
				})
			});
		</script>
	</head>
	<div class="row">
		<div class="col-sm-12 col-md-5">
			<label class="control-label">Estado</label>
			<select 
				onchange="dependencies.list_municipalities({
					div: 'municipality',
					estado: $(this).val(),
					from_user: 1
				})"
				required="1" 
				class="form-control" 
				name="state" 
				id="state">
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
			<select required="1" class="form-control" name="municipality" id="municipality">
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
		<div class="col-sm-12 col-md-2" style="padding-top: 30px">
			<button 
				onclick="help_desk.list_datings({
					json: 1,
					estate: $('#state').val(),
					municipality: $('#municipality').val(),
					from_user: 1
				})"
				class="btn btn-success">
				<i class="fa fa-search"></i> Buscar
			</button>
		</div>
	</div><br /><br />
	<div id="calendar" style="padding: 5px"></div>
</html>