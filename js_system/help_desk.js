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
		
		
		return;
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=help_desk&f=view_main',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! view_main', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
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
		
	// Hide menu on mobile
		var body = jQuery('body');
		function adjustmainpanelheight() {
			var docHeight = jQuery(document).height();
			if (docHeight > jQuery('.mainpanel').height())
				jQuery('.mainpanel').height(docHeight);
		}
		if (body.hasClass('leftpanel-show'))
			body.removeClass('leftpanel-show');
		else
			body.addClass('leftpanel-show');
		adjustmainpanelheight();
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
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
	}

///////////////// ******** ----					END delete_question						------ ************ //////////////////

};