/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal */
/*jslint browser: true*/
var admon = {
///////////////// ******** ----						 list_requests						------ ************ //////////////////
//////// Check the requests and return into array or loaded a view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// view -> View to load
		// id_dependencie -> Dependencie ID
		// from_user -> 1-> Call from user directory
		// json -> 1-> Response in JSON
		
	list_requests : function($objet){
		"use strict";
		console.log('==========> $objet list_requests', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../',
			type = ($objet.json === 1) ? 'json' : 'html';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=admon&f=list_requests',
			type : 'post',
			dataType : type
		}).done(function(resp) {
			
			if($objet.json === 1){
				console.log('==========> resp list_requests', resp);
				
				// For future functions
				return resp;
			}
		
		// Load the view
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! list_requests', resp);
			
			swal({
				title : 'Error',
				text : 'Error al cargar las solicitudes',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END list_requests					------ ************ //////////////////

///////////////// ******** ----						 save_request						------ ************ //////////////////
//////// Save the request
	// The parameters that can receive are:
		// title -> Request title
		// id_dependencie -> Dependencie ID
		
	save_request : function($objet){
		"use strict";
		console.log('==========> $objet save_request', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=admon&f=save_request',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> resp save_request', resp);
			
			swal({
				title : 'Solicitud creada',
				text : 'La solicitud se creo con exito, ahora puedes enviar mensajes',
				timer : 5000,
				showConfirmButton : true,
				type : 'success'
			});
		
		// List the requests
			admon.list_requests({
				div: 'contenedor',
				id_dependencie: $objet.id_dependencie
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! save_request', resp);
			
			swal({
				title : 'Error',
				text : 'Error al crear la solicitud',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END new_request						------ ************ //////////////////

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
			url : folder+'ajax.php?c=admon&f=create_question',
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
					
					admon.view_main({
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
			url : folder+'ajax.php?c=admon&f=update_question',
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
			url : folder+'ajax.php?c=admon&f=delete_question',
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
					
				admon.view_main({
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

///////////////// ******** ----						load_messages						------ ************ //////////////////
//////// Check the messages and loaded the view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// from -> Origen message(Dependencie ID)
		// request_id -> Request ID
		
	load_messages : function($objet){
		"use strict";
		console.log('==========> $objet load_messages', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=admon&f=load_messages',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			console.log('==========> done load_messages', resp);
			
			if(!$objet.div){
				$objet.div = 'contenedor';
			}
			
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! load_messages', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----					END load_messages						------ ************ //////////////////

///////////////// ******** ----					send_message							------ ************ //////////////////
//////// Send message between users
	// The parameters can receive:
		// from -> User that send a message
		// to -> User that receive the message
		// request_id -> Request ID
		// message -> Message to send
		// div -> Div where the message is loaded
		
	send_message : function($objet) {
		"use strict";
		var $message = '',	
			content = '',
			folder = ($objet.from_user === 1) ? '' : '../';
	
	// Remove enter, tab, doble space, etc.
		$objet.message = $objet.message.replace(/\s\s+/g, ' ');
		console.log('===============> $objet send_message', $objet);
		console.log('===============> requests.data_messages', requests.data_messages);
		
	// ** Validate that el message no are empty
		if($objet.message === ""){
			$message = 'Escribe algo';
			$.notify($message, {
				position : "top left",
				autoHide : true,
				autoHideDelay : 4000,
				className : 'warn'
			});
			
			$('#message').val('');
			return;
		}
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=admon&f=send_message',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done load_messages', resp);
			
			switch(resp.status) {
			    case 1:
			        var f = new Date(),
					time = f.getHours()+":"+f.getMinutes();
					content += '<div align="right">'+
									'<div class="talk-bubble tri-right round border bg-warning right-top">'+
										'<div class="talktext">'+
											'<p>'+resp.message+'</p>'+
											'<p align="right">'+time+'</p>'+
										'</div>'+
									'</div>'+
								'</div>';
					$('#message').val('');
					$("#"+$objet.div).append(content);
					$("#"+$objet.div).scrollTop($("#"+$objet.div)[0].scrollHeight);
			        break;
			    case 2:
			        $message = 'Escribe algo';
					$.notify($message, {
						position : "top left",
						autoHide : true,
						autoHideDelay : 4000,
						className : 'warn'
					});
					
					$('#message').val('');
			        break;
			    default:
			        $message = 'Error al enviar el mensaje';
					$.notify($message, {
						position : "top left",
						autoHide : true,
						autoHideDelay : 4000,
						className : 'error'
					});
			}
		}).fail(function(resp) {
			console.log('==========> fail !!! load_messages', resp);
			
			swal({
				title : 'Error',
				text : 'Error al enviar el mensaje',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	}

///////////////// ******** ----						END send_message					------ ************ //////////////////
	
};