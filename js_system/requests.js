/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */
/*global define, $, jQuery, swal, pdf, jsPDF, MouseEvent */
/*jslint browser: true*/
var requests = {
// Initialize vars
	data_messages:{},
	temp_data_pay:{},

///////////////// ******** ----							list_requests					------ ************ //////////////////
//////// Check the requests and loaded the view
	// The parameters that can receive are:
		// search -> Word or ID to search
		// div -> Div where the content is loaded
		// state -> Dependencie state
		// municipality -> Dependencie municipality
		// status -> Requests status

	list_requests : function($objet){
		"use strict";
		console.log('==========> $objet list_requests', $objet);

		var folder = ($objet.from_user === 1) ? '' : '../';

	// Hide menu on mobile
		$("#wrapper").removeClass("toggled");
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=requests&f=list_requests',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			console.log('==========> done list_requests', resp);

			if(!$objet.div){
				$objet.div = 'contenedor';
			}

			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! list_requests', resp);

			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END list_requests					------ ************ //////////////////

///////////////// ******** ----						load_info_buttons					------ ************ //////////////////
//////// Load the info on the buttons
	// The parameters that can receive are:
		// c_aceptacion -> Name archive card aceptation
		// c_delegado -> Name archive card delegate
		// c_salubridad -> Name archive card healthiness
		// croquis -> Name croquis archive
		// formato -> Name format archive
		// fotos -> Name photo archive
		// identificacion -> Name identification archive

	load_info_buttons : function($objet){
		"use strict";
		console.log('==========> $objet load_info_buttons', $objet);

	// Clean document and coment
		$("#image_view").attr("src", "");
		$('#div_write_coment').html('');
		$("#div_360").html('');
		$('#div_format').html('');
		$('#google_map').hide();
		$('#google_street').hide();
		$('#div_format').hide();

	// Quests
		$("#btn_c_aceptacion").attr("request_id", $objet.id);
		$("#btn_c_delegado").attr("request_id", $objet.id);
		$("#btn_c_salubridad").attr("request_id", $objet.id);
		$("#btn_croquis").attr("request_id", $objet.id);
		$("#btn_formato").attr("request_id", $objet.id);
		$("#btn_fotos").attr("request_id", $objet.id);
		$("#btn_identificacion").attr("request_id", $objet.id);

	// Archive
		$("#btn_c_aceptacion").attr("archive", $objet.c_aceptacion);
		$("#btn_c_delegado").attr("archive", $objet.c_delegado);
		$("#btn_c_salubridad").attr("archive", $objet.c_salubridad);
		$("#btn_croquis").attr("archive", $objet.croquis);
		$("#btn_formato").attr("archive", $objet.formato);
		$("#btn_fotos").attr("f1", $objet.f1);
		$("#btn_fotos").attr("f2", $objet.f2);
		$("#btn_fotos").attr("f3", $objet.f3);
		$("#btn_fotos").attr("f4", $objet.f4);
		$("#btn_identificacion").attr("archive", $objet.identificacion);

	// coordenates
		$("#btn_croquis").attr("lat", $objet.lat);
		$("#btn_croquis").attr("lng", $objet.lng);

	// Coment
		$("#btn_coment").attr("coment", $objet.coment);
	},

///////////////// ******** ----						END load_info_buttons					------ ************ //////////////////

///////////////// ******** ----						load_document							------ ************ //////////////////
//////// Load the document on the image
	// The parameters that can receive are:
		// archive -> Name archive to load
		// request_id -> Quest ID

	load_document : function($objet){
		"use strict";
		console.log('==========> $objet load_document', $objet);

		$objet.archive = $objet.archive || '';

	// Clean coment and load document
		$('#div_write_coment').html('');
		$('#div_format').html('');
		$("#div_360").html('');
		$('#google_map').hide();
		$('#google_street').hide();
		$('#div_format').hide();
		$("#image_view").attr("src", $objet.archive);
		$("#btn_dowload_document").attr("href", $objet.archive);

	// Document name
		var tarr = $objet.archive.split('/');
		var file = tarr[tarr.length-1];

		$("#btn_dowload_document").attr("download", file);
	},

///////////////// ******** ----						END load_document						------ ************ //////////////////

///////////////// ******** ----							authorize							------ ************ //////////////////
//////// Load the info on the authorize button
	// The parameters that can receive are:
		// status -> Request status
		// request_id -> Quest ID

	authorize : function($objet){
		"use strict";
		console.log('==========> $objet authorize', $objet);

		$("#btn_authorize").attr("status", $objet.status);
		$("#btn_authorize").attr("request_id", $objet.id);
		$("#btn_authorize").attr("user_id", $objet.user_id);
		$("#btn_authorize").attr("estadomx", $objet.estadomx);
		$("#btn_authorize").attr("municipiomx", $objet.municipiomx);
	},

///////////////// ******** ----						END authorize						------ ************ //////////////////

///////////////// ******** ----						update_authorize					------ ************ //////////////////
//////// Update the request information
	// The parameters that can receive are:
		// request_id -> Request ID
		// status -> 1-> Approved, 2-> Denied
		// coment -> Request coment

	update_authorize : function($objet){
		"use strict";
		console.log('==========> $objet update_authorize', $objet);

	// Validate the coment if the requet is denied
		if($objet.status === "2" && $objet.coment === ""){
			swal({
				title : 'Comentario no valido',
				text : 'Es necesario explicar por que la solicitud fue rechazada',
				timer : 7000,
				showConfirmButton : true,
				type : 'warning'
			});

			return;
		}

		var folder = ($objet.from_user === 1) ? '' : '../';

		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=requests&f=update_authorize',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done update_authorize', resp);
			
			$('#btn_approved_'+$objet.request_id).prop('disabled', true);
			$('#btn_denied_'+$objet.request_id).prop('disabled', true);

		// Hide buttons
			if($objet.status === "1"){
				$('#btn_denied_'+$objet.request_id).hide();
			}
			if($objet.status === "2"){
				$('#btn_approved_'+$objet.request_id).hide();
			}

		// Hide modal
			$("#modal_authorize").modal('hide');

		// Loaded format aprobation
			if($objet.status === "1"){
				requests.load_format({
					request_id: $objet.request_id,
					div: 'div_modal_authorize',
					doc: 'aprobacion'
				});
			}else{
				$('#coment').val('');
			}
		}).fail(function(resp) {
			console.log('==========> fail !!! update_authorize', resp);

			swal({
				title : 'Error',
				text : 'No se puede autorizar la solicitud',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},
	
///////////////// ******** ----					END update_authorize					------ ************ //////////////////

///////////////// ******** ----						load_format							------ ************ //////////////////
//////// Load the view of the format
	// The parameters that can receive are:
		// request_id -> Request ID
		// div -> Div where the content is loaded

	load_format : function($objet){
		"use strict";
		console.log('==========> $objet load_format', $objet);

	// Clean document and coment
		$("#image_view").attr("src", "");
		$('#div_write_coment').html('');
		$("#div_360").html('');
		$('#div_format').html('');
		$('#google_map').hide();
		$('#google_street').hide();
		$('#div_format').show();

		var folder = ($objet.from_user === 1) ? '' : '../';

		$.ajax({
			data : $objet,
			url : folder+'pdf.php?request_id='+$objet.request_id,
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done load_format', resp);

			$("#modal_details").modal('show');

			var url = folder+resp;

			$.ajax({
				data : {url: url},
				url : folder+'pdfjs.php?url='+url,
				type : 'post',
				dataType : 'html'
			}).done(function(resp_html) {
				console.log('==========> done pdfjs', resp_html);

				$("#div_format").html(resp_html);

				$("#btn_dowload_document").attr("href", folder+resp);
			}).fail(function(resp) {
				console.log('==========> fail !!! pdfjs', resp);

				swal({
					title : 'Error',
					text : 'No se puede cargar el formato',
					timer : 5000,
					showConfirmButton : true,
					type : 'error'
				});
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! load_format', resp);

			swal({
				title : 'Error',
				text : 'No se puede cargar el formato',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END load_format							------ ************ //////////////////

///////////////// ******** ----						main_requests							------ ************ //////////////////
//////// Check the requests and write the values
	// The parameters that can receive are:
		// state -> Dependencie state
		// municipality -> Dependencie municipality

	main_requests : function($objet){
		"use strict";
		console.log('==========> $objet main_requests', $objet);

		var folder = ($objet.from_user === 1) ? '' : '../';
		$objet.json = 1;
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=requests&f=list_requests',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done main_requests', resp);

			var sum_fixed = 0,
				sum_semi_fixed = 0,
				sum_walking = 0;

			$.each(resp, function(key, value){
				switch(value.estado) {
				    case "Fijo":
				        sum_fixed ++;
				        $("#sum_fixed").html(sum_fixed).fadeIn();
				        break;
				    case "Semi-fijo":
				        sum_semi_fixed ++;
				        $("#sum_semi_fixed").html(sum_semi_fixed).fadeIn();
				        break;
				    case "Ambulante":
				        sum_walking ++;
				        $("#sum_walking").html(sum_walking).fadeIn();
				        break;
				}
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! main_requests', resp);

			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END main_requests						------ ************ //////////////////

///////////////// ******** ----						main_user_requests						------ ************ //////////////////
//////// Check the requests and write the values
	// The parameters that can receive are:
		// mail -> User mail

	main_user_requests : function($objet){
		"use strict";
		console.log('==========> $objet main_user_requests', $objet);

		$objet.json = 1;
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=requests&f=list_requests',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done main_user_requests', resp);

			var sum_aceppted = 0,
				sum_rejected = 0,
				sum_requests = 0;

			$.each(resp, function(key, value){
				switch(value.status) {
				    case "0":
				        sum_requests ++;
				        $("#sum_requests").html(sum_requests).fadeIn();
				        break;
				    case "1":
				        sum_aceppted ++;
				        $("#sum_aceppted").html(sum_aceppted).fadeIn();
				        break;
				    case "2":
				        sum_rejected ++;
				        $("#sum_rejected").html(sum_rejected).fadeIn();
				        break;
				}
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! main_user_requests', resp);

			swal({
				title : 'Error',
				text : 'No se pueden cargar las solicitudes',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----					END main_user_requests				------ ************ //////////////////

///////////////// ******** ----						load_messages					------ ************ //////////////////
//////// Check the messages and loaded the view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// from -> Origen message(user mail or estate and municipality dependencie)
		// to -> Destination message(user mail or estate and municipality dependencie)
		// request_id -> Request id

	load_messages : function($objet){
		"use strict";
		console.log('==========> $objet load_messages', $objet);

		var folder = ($objet.from_user === 1) ? '' : '../';

		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=requests&f=load_messages',
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

///////////////// ******** ----					END load_messages					------ ************ //////////////////

///////////////// ******** ----					send_message						------ ************ //////////////////
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
			url : folder+'ajax.php?c=requests&f=send_message',
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
	},

///////////////// ******** ----					END send_message						------ ************ //////////////////

///////////////// ******** ----					new_request								------ ************ //////////////////
//////// Load the view to create a new requet
	// The parameters that can receive are:
		// mail -> User mail

	new_request : function($objet){
		"use strict";
		console.log('==========> $objet new_request', $objet);

		$("#btn_new_request").prop("disabled", true);

	// Hide menu on mobile
		$("#wrapper").removeClass("toggled");
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'new.php',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			console.log('==========> done transfer_rights', resp);
			
			$("#btn_new_request").prop("disabled", false);
			
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! transfer_rights', resp);
			
			$("#btn_new_request").prop("disabled", false);
		
			swal({
				title : 'Error',
				text : 'Error al ceder los derechos, intenta mas tarde',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END new_request						------ ************ //////////////////

///////////////// ******** ----						covert_360							------ ************ //////////////////
//////// Conver a div en 360 container
	// The parameters that can receive are:
		// folder -> content images folder

	covert_360 : function($objet){
		"use strict";
		console.log('==========> $objet covert_360', $objet);

	// Clean coment and load document
		$('#div_write_coment').html('');
		$('#div_format').html('');
		$("#div_360").html('');
		$('#google_map').hide();
		$('#google_street').hide();
		$('#div_format').hide();
		$("#image_view").attr("src", "");
		$("#btn_dowload_document").attr("href", '');

		var folder = ($objet.from_user === 1) ? '' : '../';

		$.ajax({
			data : $objet,
			url : folder+'360.php',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#div_360").html(resp);

			$('.carousel').carousel({
				interval: 3000,
				pause: null
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! new_request', resp);

			swal({
				title : 'Error',
				text : 'No se pueden cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END covert_360						------ ************ //////////////////

///////////////// ******** ----						transfer_rights						------ ************ //////////////////
//////// Transfer the request to another user
	// The parameters that can receive are:
		// request_id -> Request ID
		// mail -> New user mail
		// reason -> Reason to transfer
		// cost -> Cost of the dependencie

	transfer_rights : function($objet){
		"use strict";

	// ** Validations
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
			canvas1 = document.getElementById("canvas1"),
			dataURL1 = canvas1.toDataURL(),
			canvas2 = document.getElementById("canvas2"),
			dataURL2 = canvas2.toDataURL();

		re = re.test($objet.mail.toLowerCase());
		$objet.transferor = dataURL1;
		$objet.assignee = dataURL2;

		console.log('==========> $objet transfer_rights', $objet);

		if(re === false){
			swal({
				title : 'Datos no validos',
				text : 'Correo no valido',
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});

			return;
		}

		if($objet.reason === ""){
			swal({
				title : 'Datos no validos',
				text : 'Razon no valida',
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});

			return;
		}

		if(parseInt($objet.canva1) === 0 || parseInt($objet.canva2) === 0){
			swal({
				title : 'Datos no validos',
				text : 'Falta alguna firma',
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});

			return;
		}

		$("#btn_transfer").prop("disabled", true);

		var folder = ($objet.from_user === 1) ? '' : '../';

		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=requests&f=transfer_rights',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done transfer_rights', resp);

			$("#btn_transfer").prop("disabled", false);

			if(resp.status === 2){
				swal({
					title : 'Datos no validos',
					text : resp.message,
					timer : 5000,
					showConfirmButton : true,
					type : 'warning'
				});

				return;
			}

			swal({
				title : 'Cesión de derechos solicitada',
				text : 'La solicitud de la cesión de derechos ha sido creada exitosamente',
				timer : 5000,
				showConfirmButton : true,
				type : 'success'
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! transfer_rights', resp);

			$("#btn_transfer").prop("disabled", false);
			swal({
				title : 'Error',
				text : 'Error al ceder los derechos, intenta mas tarde',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----					END transfer_rights						------ ************ //////////////////

///////////////// ******** ----					details_transfer						------ ************ //////////////////
//////// Load the info details of the request
	// The parameters that can receive are:
		// reason -> Reason to transfer
		// cost -> Cost of the dependencie
		// assignee -> Base 64 string with the frim of the assignee
		// transferor -> Base 64 string with the frim of the transferor
		// date -> Create request date

	details_transfer : function($objet){
		"use strict";
		console.log('==========> $objet details_transfer', $objet);

		$('#div_reason').html($objet.reason);
		$('#div_date').html($objet.date);
		$("#img_assignee").attr('src', $objet.assignee);
		$("#img_transferor").attr('src', $objet.transferor);

	},

///////////////// ******** ----						END details_transfer				------ ************ //////////////////

///////////////// ******** ----						view_upload_files					------ ************ //////////////////
//////// Load the view of the upload files
	// The parameters that can receive are:
		// id -> Request ID
		// div -> Div where the content is loaded

	view_upload_files : function($objet){
		"use strict";
		console.log('==========> $objet view_upload_files', $objet);

		var folder = ($objet.from_user === 1) ? '' : '../';

		$.ajax({
			data : $objet,
			url : folder+'views/solicitudDenegada/ejemplo.php?request_id='+$objet.id,
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			if(!$objet.div){
				$objet.div = 'contenedor';
			}

			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! view_upload_files', resp);

			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----					END view_upload_files					------ ************ //////////////////

///////////////// ******** ----						search								------ ************ //////////////////
//////// Searchs requests
	// The parameters that can receive are:
		// sears -> String to search
		// mail -> User mail
		
	search : function($objet){
		"use strict";
		console.log('==========> $objet search', $objet);
		
		var algo = $('#search_expedients').val();
		
		if(algo.length > 0){
			requests.list_requests({
				search: $objet.search,
				from_user: 1,
				view: 'list_user_requests',
				div: 'div_search_results',
				mail: $objet.mail
			});
		} else{
			$('#div_search_results').html('');
			$('#search_expedients').focus();
		}
	},
	
///////////////// ******** ----						END search							------ ************ //////////////////

///////////////// ******** ----						search_dep							------ ************ //////////////////
//////// Searchs requests
	// The parameters that can receive are:
		// sears -> String to search
		// mail -> User mail
		
	search_dep : function($objet){
		"use strict";
		console.log('==========> $objet search_dep', $objet);
		
		var algo = $('#search_expedients').val();
		
		if(algo.length > 0){
			requests.list_requests({
				search: $objet.search,
				view: 'list_user_requests',
				div: 'div_search_results',
				mail: $objet.mail
			});
		} else{
			$('#div_search_results').html('');
			$('#search_expedients').focus();
		}
	},
	
///////////////// ******** ----					END search_dep							------ ************ //////////////////

///////////////// ******** ----						new_pay								------ ************ //////////////////
//////// Generate a new pay
	// The parameters that can receive are:
	
	new_pay : function($objet){
		"use strict";
		console.log('==========> $objet new_pay', $objet);
		
		$("#"+$objet.btn).prop('disabled', true);
		$("#"+$objet.btn).html('Cargando...');
		
		setTimeout(function(){
			var folder = ($objet.from_user === 1) ? '' : '../';
			
			$.ajax({
				data : $objet,
				url : folder+'ajax.php?c=pays&f=new_pay',
				type : 'post',
				dataType : 'json'
			}).done(function(resp) {
				console.log('==========> Done new_pay', resp);
				
				var link = document.createElement('a');
				link.href = resp.url;
				link.download = 'ficha.pdf';
				link.dispatchEvent(new MouseEvent('click'));
				
				$("#"+$objet.btn).prop('disabled', false);
				$("#"+$objet.btn).html('<i class="fa fa-check fa-lg"></i> Tienda');
				
				$("#modal_pay").modal('hide');
			
				setTimeout(function(){
					swal({
						title : 'Ficha de pago creada',
						text : 'Tu ficha de pago ha sido creada con exito',
						timer : 5000,
						showConfirmButton : true,
						type : 'success'
					});
				}, 500);
			}).fail(function(resp) {
				console.log('==========> fail !!! new_pay', resp);
				
				$("#"+$objet.btn).prop('disabled', false);
				$("#"+$objet.btn).html('<i class="fa fa-check fa-lg"></i> Tienda');
				
				swal({
					title : 'Error',
					text : 'Error al generar el pago',
					timer : 5000,
					showConfirmButton : true,
					type : 'error'
				});
			});
		}, 100);
	},

///////////////// ******** ----						END new_pay							------ ************ //////////////////

///////////////// ******** ----						data_pay							------ ************ //////////////////
//////// Load the data pay on the buttons
	// The parameters that can receive are:

	data_pay : function($objet){
		"use strict";
		console.log('==========> $objet data_pay', $objet);
		
		requests.temp_data_pay = $objet;
		console.log('==========> data', requests.temp_data_pay);
		
		$("#btn_pay_store").attr("cost_request", $objet.cost_request);
		$("#btn_pay_store").attr("request_id", $objet.request_id);
	},

///////////////// ******** ----					END load_info_buttons					------ ************ //////////////////

///////////////// ******** ----					new_card_pay							------ ************ //////////////////
//////// Generate a new pay
	// The parameters that can receive are:
	
	new_card_pay : function($objet){
		"use strict";
		console.log('==========> $objet new_card_pay', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../',
			data = {};
		
		data = requests.temp_data_pay;
		
		data.token_id = $objet.data.token_id;
		data.deviceIdHiddenFieldName = $objet.data.deviceIdHiddenFieldName;
		console.log('==========> data', data);
		
		$.ajax({
			data : data,
			url : folder+'ajax.php?c=pays&f=new_card_pay',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> Done new_card_pay', resp);
			
			$("#pay-button").prop("disabled", false);
			$("#pay-button").html("Pagar");
			
			$("#modal_pay").modal('hide');
			
			setTimeout(function(){
				swal({
					title : 'Solicitud pagada',
					text : 'Tu solicitud ha sido pagada con exito',
					timer : 5000,
					showConfirmButton : true,
					type : 'success'
				});
				
				requests.list_requests({
					div: 'contenedor',
					view: 'list_user_requests',
					mail: resp.mail,
					from_user: 1
				});
			}, 500);
		}).fail(function(resp) {
			console.log('==========> fail !!! new_card_pay', resp);
			
			$("#pay-button").prop("disabled", false);
			$("#pay-button").html("Pagar");
		
			swal({
				title : 'Error',
				text : 'Error al generar el pago',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----					END new_card_pay						------ ************ //////////////////

///////////////// ******** ----					save_permits							------ ************ //////////////////
//////// Save a permits
	// The parameters that can receive are:
		// period -> Period request
		// description -> Request description 
		// id_request -> Request ID
	
	save_permits : function($objet){
		"use strict";
		console.log('==========> $objet save_permits', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		if($objet.period === "" || $objet.description === ""){
			swal({
				title : 'Campos no validos',
				text : 'Debes llenar todos los campos',
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			
			return;
		}
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=requests&f=save_permits',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> Done save_permits', resp);
			
			swal({
				title : 'Solicitud creada',
				text : 'Tu solicitud ha sido creada con exito',
				timer : 5000,
				showConfirmButton : true,
				type : 'success'
			});
			
			requests.list_requests({
				div: 'contenedor',
				status: 1,
				mail: resp.mail,
				view: 'view_permits',
				from_user: 1
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! save_permits', resp);
		
			swal({
				title : 'Error',
				text : 'Error al crear la solicitud',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END save_permits					------ ************ //////////////////

///////////////// ******** ----						list_permits						------ ************ //////////////////
//////// Check the permits and loaded the view
	// The parameters that can receive are:
		// mail -> User mail
		// div -> Div where the content is loaded

	list_permits : function($objet){
		"use strict";
		console.log('==========> $objet list_permits', $objet);

		var folder = ($objet.from_user === 1) ? '' : '../';

	// Hide menu on mobile
		$("#wrapper").removeClass("toggled");
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=requests&f=list_permits',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			console.log('==========> done list_permits', resp);

			if(!$objet.div){
				$objet.div = 'contenedor';
			}

			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! list_permits', resp);

			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END list_permits					------ ************ //////////////////

///////////////// ******** ----						update_permit						------ ************ //////////////////
//////// Update the request information
	// The parameters that can receive are:
		// request_id -> Request ID
		// status -> 1-> Approved, 2-> Denied
		// coment -> Request coment
		// state -> State dependencie
		// municipality -> Municipality dependencie
	
	update_permit : function($objet){
		"use strict";
		console.log('==========> $objet update_permit', $objet);

	// Validate the coment if the requet is denied
		if($objet.status === "2" && $objet.coment === ""){
			swal({
				title : 'Comentario no valido',
				text : 'Es necesario explicar por que la solicitud fue rechazada',
				timer : 7000,
				showConfirmButton : true,
				type : 'warning'
			});

			return;
		}

		var folder = ($objet.from_user === 1) ? '' : '../';

		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=requests&f=update_permit',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done update_permit', resp);
			
			$("#modal_authorize").modal('hide');
			
			setTimeout(function(){
				swal({
					title : 'Cambios guardados',
					text : 'Los cambios han sido guardados',
					timer : 5000,
					showConfirmButton : true,
					type : 'success'
				});
				
				requests.list_requests({
					div: 'contenedor',
					status_per: '0 OR per.status = 1 OR per.status = 2',
					state: $objet.state,
					municipality: $objet.municipality,
					view: 'view_permits_dep'
				});
			}, 500);
		}).fail(function(resp) {
			console.log('==========> fail !!! update_authorize', resp);

			swal({
				title : 'Error',
				text : 'No se puede autorizar la solicitud',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	}
	
///////////////// ******** ----					END update_authorize					------ ************ //////////////////

};