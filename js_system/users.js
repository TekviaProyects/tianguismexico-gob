/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal */
/*jslint browser: true*/
var users = {
///////////////// ******** ----							 view_profile					------ ************ //////////////////
//////// Loaded the view profile
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// mail -> User mail
		
	view_profile : function($objet){
		"use strict";
		console.log('==========> $objet view_profile', $objet);
		
		$("#"+$objet.div).html('<iframe id="the_frame" src="ajax.php?c=users&f=view_profile&mail='+$objet.mail+'" style="width: 100%; height: 100vh; margin-bottom: 50px"></iframe>');
	},

///////////////// ******** ----						END view_profile					------ ************ //////////////////

///////////////// ******** ----						view_insurance_policy				------ ************ //////////////////
//////// Loaded the insurance policy view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// mail -> User mail
		
	view_insurance_policy : function($objet){
		"use strict";
		console.log('==========> $objet view_insurance_policy', $objet);
		
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
			url : 'ajax.php?c=users&f=view_insurance_policy',
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
		
		
		
		$("#"+$objet.div).html('<iframe id="the_frame" src="ajax.php?c=users&f=view_insurance_policy&mail='+$objet.mail+'" style="width: 100%; height: 100vh; margin-bottom: 50px"></iframe>');
	}

///////////////// ******** ----						END view_insurance_policy			------ ************ //////////////////

};