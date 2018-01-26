/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal */
/*jslint browser: true*/
var notifications = {
	actualizar : function($objet) {
		"use strict";
			console.log('==========> $objet actualizar', $objet);
			
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=notifications&f=actualizar',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> resp list_requests', resp);
			
			$("#"+$objet.div).html(0);
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
	},

///////////////// ******** ----					END list_notifications					------ ************ //////////////////

///////////////// ******** ----					count_notifications						------ ************ //////////////////
//////// Count number of notifications
	// The parameters that can receive are:
		// user_id -> User ID
		
	count_notifications : function($objet){
		"use strict";
		console.log('==========> $objet count_notifications', $objet);
		
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=notifications&f=count_notifications',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> resp count_notifications', resp);
			
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! count_notifications', resp);
			
			swal({
				title : 'Error',
				text : 'Error al contar las notificaciones',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	}

///////////////// ******** ----					END count_notifications					------ ************ //////////////////

};
