<?php session_start() ?>

<div id="calendar" style="padding: 5px"></div>
<div class="modal" tabindex="-1" role="dialog" id="modal_details">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detalles de la cita</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Comerciante:<br />
				<p id="dating_name"></p>
				Asunto:<br />
				<p id="dating_title"></p>
				Horario:<br />
				<span id="dating_f_ini"></span> - <span id="dating_f_end"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>
	</div>
</div>
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
				$('#calendar').fullCalendar('unselect');
			},
			eventClick: function(calEvent, jsEvent, view) {
				$("#modal_details").modal('show');
				
				$("#dating_name").html(calEvent.name);
				$("#dating_title").html(calEvent.title);
				$("#dating_f_ini").html(calEvent.f_ini);
				$("#dating_f_end").html(calEvent.f_end);
				
		        $(this).css('border-color', 'orange');
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
	
	init_calendar([{
		title: 'All Day Event',
		start: '2018-02-01'
	}]);
	
	help_desk.list_datings({
		json: 1,
		state: <?php echo $_SESSION['dependencie']['estadodep'] ?>,
		municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
	})
</script>