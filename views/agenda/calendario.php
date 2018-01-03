

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="css/style.default.css" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="css/style.default-rtl.css" rel="stylesheet">
  </head>
  <body>
    <div class="contentpanel">
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-default panel-dark panel-alt">
            <div class="panel-heading">
              <h4 class="panel-title">Citas Para agendar</h4>
            </div>
            <div class="panel-body">
              <div id='external-events'>
                <div id="cita" class='external-event' style="height:30px; color:white;"> <p>my Event 1</p> </div>
                <div class='external-event'>My Event 2</div>
                <div class='external-event'>My Event 3</div>
                <div class='external-event'>My Event 4</div>
                <div class='external-event'>My Event 5</div>
              </div>
            </div>
          </div>
        </div><!-- col-md-3 -->
        <div class="col-md-9">
          <div id="calendar"></div>
        </div><!-- col-md-9 -->
      </div>
    </div>
  </body>

  <script src="https://cdn.rawgit.com/konvajs/konva/1.7.6/konva.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/jquery-migrate-1.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/modernizr.min.js"></script>
  <script src="js/jquery.sparkline.min.js"></script>
  <script src="js/toggles.min.js"></script>
  <script src="js/retina.min.js"></script>
  <script src="js/jquery.cookies.js"></script>

  <script src="js/jquery-ui-1.10.3.min.js"></script>
  <script src="js/fullcalendar.min.js"></script>
  <script src="js/jquery.ui.touch-punch.min.js"></script>

  <script src="js/custom.js"></script>

  <script>

    jQuery(document).ready(function() {

      "use strict";


  		/* initialize the external events
  		-----------------------------------------------------------------*/

  		jQuery('#external-events div.external-event').each(function() {

  			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
  			// it doesn't need to have a start or end
  			var eventObject = {
  				title: $.trim($(this).text()) // use the element's text as the event title
  			};

  			// store the Event Object in the DOM element so we can get to it later
  			jQuery(this).data('eventObject', eventObject);

  			// make the event draggable using jQuery UI
  			jQuery(this).draggable({
  				zIndex: 999,
  				revert: true,      // will cause the event to go back to its
  				revertDuration: 0  //  original position after the drag
  			});

  		});


  		/* initialize the calendar
  		-----------------------------------------------------------------*/

  		jQuery('#calendar').fullCalendar({
  			header: {
  				left: 'prev,next today',
  				center: 'title',
  				right: 'month,agendaWeek,agendaDay'
  			},
  			editable: true,
  			droppable: true, // this allows things to be dropped onto the calendar !!!
  			drop: function(date, allDay) { // this function is called when something is dropped

  				// retrieve the dropped element's stored Event Object
  				var originalEventObject = jQuery(this).data('eventObject');

  				// we need to copy it, so that multiple events don't have a reference to the same object
  				var copiedEventObject = $.extend({}, originalEventObject);

  				// assign it the date that was reported
  				copiedEventObject.start = date;
  				copiedEventObject.allDay = allDay;

  				// render the event on the calendar
  				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
  				jQuery('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

  				// is the "remove after drop" checkbox checked?
  				if (jQuery('#drop-remove').is(':checked')) {
  					// if so, remove the element from the "Draggable Events" list
  					jQuery(this).remove();
  				}

  			}
  		});


  	});

    var width = window.innerWidth;
    var height = window.innerHeight;

    var stage = new Konva.Stage({
        container: 'cita',
    });

    var layer = new Konva.Layer();
    var rectX = stage.getWidth() / 2 - 50;
    var rectY = stage.getHeight() / 2 - 25;

    var box = new Konva.Rect({
        draggable: true

    });

    // add cursor styling
    box.on('mouseover', function() {
        document.body.style.cursor = 'pointer';
    });
    box.on('mouseout', function() {
        document.body.style.cursor = 'default';
    });

    layer.add(box);
    stage.add(layer);

  </script>
</html>
