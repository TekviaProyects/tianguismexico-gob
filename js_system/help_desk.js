/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal */
/*jslint browser: true*/
var help_desk = {
///////////////// ******** ----						 view_main							------ ************ //////////////////
//////// Loaded the view main help desk
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	view_main : function($objet){
		"use strict";
		
		$objet.c = "help_desk";
		$objet.f = "view_main";
		
		var str = Object.keys($objet).map(function(key){
				return encodeURIComponent(key) + '=' + encodeURIComponent($objet[key]); 
			}).join('&'),
			folder = ($objet.from_user === 1) ? '' : '../';
		
		console.log('==========> $objet view_main', str);
		
		$("#"+$objet.div).html('<iframe id="the_frame" src="'+folder+'ajax.php?'+str+'" style="width: 100%; height: 100vh; margin-bottom: 50px"></iframe>');
	},

///////////////// ******** ----						END view_main						------ ************ //////////////////

///////////////// ******** ----						 view_user_main						------ ************ //////////////////
//////// Loaded the view user main help desk
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// mail -> User mail
		
	view_user_main : function($objet){
		"use strict";
		console.log('==========> $objet view_user_main', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
	// Hide menu on mobile
		$("#wrapper").removeClass("toggled");
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=help_desk&f=view_user_main',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! view_user_main', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END view_user_main					------ ************ //////////////////

///////////////// ******** ----						create_question						------ ************ //////////////////
//////// Save the question
	// The parameters that can receive are:
		// question -> Question capturate
		// answer -> Answer to the cuestion
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	create_question : function($objet){
		"use strict";
		console.log('==========> $objet create_question', $objet);
		
		if($objet.question.length < 6 || $objet.answer.length < 6){
		    swal({
				title : 'Informacion no valida',
				text : 'La pregunta o respuesta es demasiado corta',
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			return;
		}
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=help_desk&f=create_question',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done create_question', resp);
			
			switch(resp.status) {
			    case 1:
			       swal({
						title : 'Pregunta guardada',
						text : 'La pregunta se ha guardado correctamente',
						timer : 5000,
						showConfirmButton : true,
						type : 'success'
					});
					
					help_desk.view_main({
						div: 'contenedor',
						state: $objet.state,
						municipality: $objet.municipality
					});
			        break;
			    case 2:
				    swal({
						title : 'Error',
						text : 'Debes llenar ambos campos',
						timer : 5000,
						showConfirmButton : true,
						type : 'warn'
					});
			        break;
			    default:
			       swal({
						title : 'Error',
						text : 'No se puede guardar la pregunta',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
			}
		}).fail(function(resp) {
			console.log('==========> fail !!! create_question', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede guardar la pregunta',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END create_question				------ ************ //////////////////

///////////////// ******** ----						update_question					------ ************ //////////////////
//////// Update the question information
	// The parameters that can receive are:
		// question -> Question capturate
		// answer -> Answer to the cuestion
		// id -> Question ID
		
	update_question : function($objet){
		"use strict";
		console.log('==========> $objet update_question', $objet);
		
		var v1 = $("#input_question_"+$objet.id).val(),
			v2 = $("#input_answer_"+$objet.id).val(),
			folder = ($objet.from_user === 1) ? '' : '../';
		
		if(v1.length < 6 || v2.length < 6){
		    swal({
				title : 'Informacion no valida',
				text : 'La pregunta o respuesta es demasiado corta',
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			return;
		}
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=help_desk&f=update_question',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done update_question', resp);
			
			switch(resp.status) {
			    case 1:
					$("#input_question_"+$objet.id).css('borderColor', 'green');
					$("#input_answer_"+$objet.id).css('borderColor', 'green');
					setTimeout(function() {
						$("#input_question_"+$objet.id).css('borderColor', '');
						$("#input_answer_"+$objet.id).css('borderColor', '');
				    }, 1500);
			        break;
			    case 2:
				    swal({
						title : 'Error',
						text : 'Debes llenar ambos campos',
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});
			        break;
			    default:
			       swal({
						title : 'Error',
						text : 'No se puede guardar la pregunta',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
			}
		}).fail(function(resp) {
			console.log('==========> fail !!! update_question', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede guardar la pregunta',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----					END update_question					------ ************ //////////////////

///////////////// ******** ----					delete_question						------ ************ //////////////////
//////// Delete the question
	// The parameters that can receive are:
		// id -> Question ID
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	delete_question : function($objet){
		"use strict";
		console.log('==========> $objet delete_question', $objet);
		
		if(!confirm("¿Estas seguro de eliminar la pregunta?")){
			return;
		}
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=help_desk&f=delete_question',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done delete_question', resp);
			
			if(resp.status === 1){
				swal({
					title : 'Pregunta eliminada',
					text : 'La pregunta se elimino correctamente',
					timer : 5000,
					showConfirmButton : true,
					type : 'success'
				});
					
				help_desk.view_main({
					div: 'contenedor',
					state: $objet.state,
					municipality: $objet.municipality
				});
			}else{
				swal({
					title : 'Error',
					text : 'No se pudo eliminar la pregunta',
					timer : 5000,
					showConfirmButton : true,
					type : 'warning'
				});
			}
		}).fail(function(resp) {
			console.log('==========> fail !!! delete_question', resp);
			
			swal({
				title : 'Error',
				text : 'No se pudo eliminar la pregunta',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----					END delete_question						------ ************ //////////////////

///////////////// ******** ----						view_dating							----- ************ //////////////////
//////// Loaded the view dating
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// mail -> User mail
		
	view_dating : function($objet){
		"use strict";
		
		$objet.c = "help_desk";
		$objet.f = "view_dating";
		var str = Object.keys($objet).map(function(key){
				return encodeURIComponent(key) + '=' + encodeURIComponent($objet[key]); 
			}).join('&'),
			body = jQuery('body'),
			folder = ($objet.from_user === 1) ? '' : '../';
			
		console.log('==========> $objet view_dating', $objet);
		
	// Hide menu on mobile
		$("#wrapper").removeClass("toggled");
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=help_desk&f=view_dating',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! view_dating', resp);
			
			swal({
				title : 'Error',
				text : 'Error al cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END view_dating						------ ************ //////////////////

///////////////// ******** ----						save_dating							------ ************ //////////////////
//////// Save the dating on the DB
	// The parameters that can receive are:
		// title -> Title dating
		// f_ini -> Dating start
		// f_end -> Dating end
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	save_dating : function($objet){
		"use strict";
		console.log('==========> $objet save_dating', $objet);
		
								
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=help_desk&f=save_dating',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done save_dating', resp);
			
			if(resp.status === 1){
				swal({
					title : 'Cita guardada',
					text : 'La cita se ha guardado correctamente',
					timer : 5000,
					showConfirmButton : true,
					type : 'success'
				});
			}else{
				swal({
					title : 'Error',
					text : 'No se pudo guardar la cita',
					timer : 5000,
					showConfirmButton : true,
					type : 'warning'
				});
			}
		}).fail(function(resp) {
			console.log('==========> fail !!! save_dating', resp);
			
			swal({
				title : 'Error',
				text : 'No se pudo guardar la cita',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END save_dating						------ ************ //////////////////

///////////////// ******** ----						list_datings						------ ************ //////////////////
//////// Check the datings and return into array
	// The parameters that can receive are:
		// state -> State dependencie
		// municipality -> Municipality dependencie
		
	list_datings : function($objet){
		"use strict";
		console.log('==========> $objet list_datings', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=help_desk&f=list_datings',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done list_datings', resp);
			
		// Update calendar
			$('#calendar').fullCalendar('removeEvents');
			$.each(resp, function(index, value) {
				if($objet.from_user === 1){
				// Only show the user dating
					if(value.user_id !== $objet.user_id){
						value.title = ' ';
					}
					
					$('#calendar').fullCalendar('renderEvent', value, true);
				}else{
					$('#calendar').fullCalendar('renderEvent', value, true);
				}
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! list_datings', resp);
			
			swal({
				title : 'Error',
				text : 'Error al cargar las citas',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	}

///////////////// ******** ----						END list_datings					------ ************ //////////////////

};