<?php session_start(); ?>
<script>
	function init_calendar($objet) {
		console.log("==========> init_calendar", $objet);

		var maxDate = new Date(),
		    today = new Date(),
		    end_date = new Date(),
		    current = new Date();

		end_date.setDate(end_date.getDate() + 30);

		// Today
		var dd = today.getDate();
		var mm = today.getMonth() + 1;
		//January is 0!
		var yyyy = today.getFullYear();
		if (dd < 10)
			dd = '0' + dd;
		if (mm < 10)
			mm = '0' + mm;
		today = yyyy + '-' + mm + '-' + dd;

		// End day
		var ed = end_date.getDate();
		var em = end_date.getMonth() + 1;
		//January is 0!
		var eyyy = end_date.getFullYear();
		if (ed < 10)
			ed = '0' + ed;
		if (em < 10)
			em = '0' + em;
		end_date = eyyy + '-' + em + '-' + ed;

		current.setDate(current.getDate() - 1);
		maxDate.setDate(maxDate.getDate() + 30);

		$('#calendar').fullCalendar({
			header : {
				left : 'prev,next today',
				center : 'title',
				right : 'agendaWeek,agendaDay'
			},
			weekends : false,
			nowIndicator : true,
			navLinks : true, // can click day/week names to navigate views
			selectable : true,
			selectHelper : true,
			select : function(start, end) {

				var minutes = moment().diff(start, 'minutes'),
				    duration = end.diff(start, 'minutes');

				if (minutes > 0) {
					alert("No hay horarios disponibles");
					$('#calendar').fullCalendar('unselect');

					return;
				}

				if (duration > 30) {
					alert("La cita es de maximo 30 min.");
					$('#calendar').fullCalendar('unselect');

					return;
				}

				var title = prompt('Asunto:'),
				    eventData;

				if (title) {
					eventData = {
						title : title,
						start : start,
						end : end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true);

					var f_ini = start.format(),
					    f_end = end.format();

					// Save dating
					help_desk.save_dating({
						title : title,
						f_ini : f_ini,
						f_end : f_end,
						municipality : $("#municipality").val(),
						state : $("#state").val(),
						from_user : 1
					})
				}

				$('#calendar').fullCalendar('unselect');
			},
			editable : false,
			eventLimit : true, // allow "more" link when too many events
			events : $objet,
			locale : 'es',
			showNoncurrents : false,
			dayRender : function(date, cell) {
				$('#calendar').fullCalendar('unselect');
				if (date < current) {
					$(cell).css('background-color', 'grey');
				}
			},
			viewRender : function(view) {
				if (view.start > maxDate) {
					$('#calendar').fullCalendar('gotoDate', current);
				}
			},
			minTime : '09:00',
			maxTime : '16:00',
			selectLongPressDelay : 700,
			allDaySlot : false,
			slotDuration : '00:30:00',
			defaultView : 'agendaWeek',
			visibleRange : {
				start : today,
				end : end_date
			}
		});
	}


	$(document).ready(function() {
		$("#state").val(1);
		$("#municipality").val("Aguascalientes");

		init_calendar([{
			title : 'All Day Event',
			start : '2018-02-01'
		}]);
		
		dependencies.list_municipalities({
			div: 'municipiodep',
			estado: $("#state").val(),
			from_user: 1
		});
		
		help_desk.list_datings({
			json : 1,
			user_id: '<?php echo $_SESSION['user']['id'] ?>',
			estate : $('#state').val(),
			municipality : $('#municipality').val(),
			from_user : 1
		})
	}); 
</script>
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
		id="state"><?php
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
				<option value="<?php echo $value['id'] ?>"><?php echo $state ?></option><?php
			} ?>
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
			user_id: '<?php echo $_SESSION['user']['id'] ?>',
			from_user: 1
		})"
		class="btn btn-success">
			<i class="fa fa-search"></i> Buscar
		</button>
	</div>
</div>
<br />
<br />
<div id="calendar" style="padding: 5px"></div>