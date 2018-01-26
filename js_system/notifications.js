/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal */
/*jslint browser: true*/
var notifications = {
	actualizar : function($objet) {
		"use strict";
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=notifications&f=actualizar',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> resp list_requests', resp);
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
	
///////////////// ******** ----					list_notifications						------ ************ //////////////////
//////// Check the notifications and load on a view
	// The parameters that can receive are:
		// user_id -> User ID
		
	list_notifications : function($objet){
		"use strict";
		console.log('==========> $objet list_notifications', $objet);
		
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=notifications&f=list_notifications',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! add', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	}

///////////////// ******** ----					END list_notifications					------ ************ //////////////////

};
