/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal, pdf, jsPDF */
/*jslint browser: true*/
var requests = {
// Initialize vars
	data_messages:{},
	
///////////////// ******** ----							list_requests						------ ************ //////////////////
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

///////////////// ******** ----						END list_requests						------ ************ //////////////////

///////////////// ******** ----						load_info_buttons						------ ************ //////////////////
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
	},

///////////////// ******** ----						END authorize							------ ************ //////////////////

///////////////// ******** ----						update_authorize						------ ************ //////////////////
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

///////////////// ******** ----					END update_authorize						------ ************ //////////////////

///////////////// ******** ----						load_format								------ ************ //////////////////
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
		
		swal({
			title : '',
			imageUrl : 'resources/images/spiner.gif',
			text : 'Cargando información',
			showConfirmButton : false
		});
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$("#"+$objet.div).html('<iframe id="the_frame" src="'+folder+'new.php?'+'&mail='+$objet.mail+'" style="width: 100%; height: 100vh; margin-bottom: 50px"></iframe>');
		
		$("#btn_new_request").prop("disabled", false);
		swal.close();
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
	}

///////////////// ******** ----					END view_upload_files					------ ************ //////////////////

};