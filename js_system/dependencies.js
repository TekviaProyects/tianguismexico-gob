/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal */
/*jslint browser: true*/
var dependencies = {
// Initialize vars
	edit: 0,

///////////////// ******** ----							 save							------ ************ //////////////////
//////// Save customer
	// The parameters that can receive are:
		// form -> Form with the inputs with the customer values
		
	save : function($objet){
		"use strict";
		console.log('==========> $objet save', $objet);
		
		var data = {},
			$required = [],
			message = 'Debes llenar los siguientes campos: \n',
			error = 0, 
			count = 0,
			$function  =  'save';
		
	// Direction to save or edit
		if($objet.edit === 1){
			$function = 'edit';
		}
		
		$("#"+$objet.form).find(':input').each(function(key, value){
			var required = $(this).attr('required'),
				valor = $(this).val(),
				id = this.id;
			
		// Validate that the required input not are empty
			if (required === '1' && valor.length <= 0) {
				error = 1;

				$required.push(id);
			}
			
			if(id){
				if(value.type === 'checkbox'){
				// Validate the selected days
					if(!$("#"+id).prop("checked")){
						count ++;
						data[id] = 0;
					}else{
						data[id] = 1;
					}
				}else{
					data[id] = $(this).val();
				}
			}
		});
		
	// Build the error message
		if ($required.length > 0) {
			$.each($required, function(index, value) {
				message += '-->' + this + ' \n';
			});
		}
		
	// Error
		if (error === 1) {
			swal({
				title : 'Campos no validos',
				text : message,
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			
			return;
		}
		
	// Validate the selected days
		if(count > 6){
			swal({
				title : 'Horario no valido',
				text : 'Tienes que seleccionar al menos un dia',
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			
			return;
		}
		
		console.log('==========> data', data);
		
		$.ajax({
			data : data,
			url : 'ajax.php?c=dependencies&f='+$function,
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done agregar_nombre', resp);
			
			swal({
				title : 'Datos guardados',
				text : 'Los datos se han guardado con exito',
				timer : 5000,
				showConfirmButton : true,
				type : 'success'
			});
		
		// List dependencies
            dependencies.list_dependencies({name: $('#input_search').val()});
		}).fail(function(resp) {
			console.log('==========> fail !!! save', resp);
			
			swal({
				title : 'Error',
				text : 'A ocurrido un problema al guardar los datos',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----							END save						------ ************ //////////////////

///////////////// ******** ----							 add							------ ************ //////////////////
//////// Loaded the view to add a customer
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		
	add : function($objet){
		"use strict";
		console.log('==========> $objet add', $objet);
		
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=dependencies&f=add',
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

///////////////// ******** ----							END add						------ ************ //////////////////

///////////////// ******** ----							list_dependencies				------ ************ //////////////////
////////Check the dependencies and loaded the view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// name -> Customer name
		
	list_dependencies : function($objet){
		"use strict";
		console.log('==========> $objet list_dependencies', $objet);
		
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=dependencies&f=list_dependencies',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			
			if(!$objet.div){
				$objet.div = 'container';
			}
			
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! list_dependencies', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----					END list_dependencies					------ ************ //////////////////

///////////////// ******** ----					list_municipalities						------ ************ //////////////////
//////// Loaded the view of the municipalities
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// estado -> state ID
		
	list_municipalities : function($objet){
		"use strict";
		console.log('==========> $objet list_municipalities', $objet);
		
		var folder = ($objet.from_user === 1) ? 'dep/' : '';
		
		$.ajax({
			data : $objet,
			url : folder+'buscarmunicipio.php',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! list_municipalities', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----				END list_municipalities						------ ************ //////////////////

///////////////// ******** ----					view_config								------ ************ //////////////////
//////// Loaded the view of the configurations
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// id -> Dependencie ID
		
	view_config : function($objet){
		"use strict";
		console.log('==========> $objet view_config', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=dependencies&f=view_config',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! view_config', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END view_config						------ ************ //////////////////

///////////////// ******** ----						update_config						------ ************ //////////////////
//////// Update the dependencie configuration
	// The parameters that can receive are:
		// column -> Column to update
		// val -> Value of the column
		// id -> Dependencie ID
		
	update_config : function($objet){
		"use strict";
		console.log('==========> $objet update_config', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=dependencies&f=update_config',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			$("#"+$objet.column).css('borderColor', 'green');
			setTimeout(function() {
				$("#"+$objet.column).css('borderColor', '');
		    }, 1500);
		}).fail(function(resp) {
			console.log('==========> fail !!! update_config', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END update_config					------ ************ //////////////////

///////////////// ******** ----							save_document					------ ************ //////////////////
//////// Save the info of the documento on the DB
	// The parameters that can receive are:
		// name -> Title name
		// url -> Document URL
		
	save_document : function($objet){
		"use strict";
		console.log('==========> $objet save_document', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=dependencies&f=save_document',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done save_document', resp);
			
			swal({
				title : 'Datos guardados',
				text : 'Los datos se han guardado con exito',
				timer : 5000,
				showConfirmButton : true,
				type : 'success'
			});
			
			dependencies.view_config({
				div: 'contenedor',
				id: $objet.dependency_id
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! save_document', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede guardar el document',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END save_document					------ ************ //////////////////

///////////////// ******** ----						delete_document						------ ************ //////////////////
//////// Delete document from disk and DB
	// The parameters that can receive are:
		// id -> Document ID
		// url -> Document URL
		// dependency_id -> Dependency ID
		
	delete_document : function($objet){
		"use strict";
		console.log('==========> $objet delete_document', $objet);
		
	// Validation
		if(!confirm("¿Eliminar documento?")){
			return;
		}
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=dependencies&f=delete_document',
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done delete_document', resp);
			
			swal({
				title : 'Documento eliminado',
				text : 'El documento se ha eliminado con exito',
				timer : 5000,
				showConfirmButton : true,
				type : 'success'
			});
			
			dependencies.view_config({
				div: 'contenedor',
				id: $objet.dependency_id
			});
		}).fail(function(resp) {
			console.log('==========> fail !!! delete_document', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede eliminar el documento',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END delete_document					------ ************ //////////////////

///////////////// ******** ----							load_pdf						------ ************ //////////////////
//////// Load a PDF
	// The parameters that can receive are:
		// url -> PDF URL
		
	load_pdf : function($objet){
		"use strict";
		console.log('==========> $objet load_pdf', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		var url = folder+$objet.url;
			
		$.ajax({
			data : {url: url},
			url : folder+'pdfjs.php?url='+url,
			type : 'post',
			dataType : 'html'
		}).done(function(resp_html) {
			console.log('==========> done load_pdf', resp_html);
			
			$("#div_format").html(resp_html);
			
			$("#btn_dowload_document").attr("href", url);
		}).fail(function(resp) {
			console.log('==========> fail !!! load_pdf', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar el documento',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END load_pdf						------ ************ //////////////////

///////////////// ******** ----						view_documets						------ ************ //////////////////
//////// Loaded the view of the documents
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		
	view_documets : function($objet){
		"use strict";
		console.log('==========> $objet view_documets', $objet);
		
	// Hide menu on mobile
		$("#wrapper").removeClass("toggled");
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=dependencies&f=view_documets',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! view_config', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----						END view_documets					------ ************ //////////////////

///////////////// ******** ----						list_documents						------ ************ //////////////////
//////// Check the documents and load the view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// estate -> Estate to search
		// municipality -> Municipality to search
		
	list_documents : function($objet){
		"use strict";
		console.log('==========> $objet list_documents', $objet);
		
		var folder = ($objet.from_user === 1) ? '' : '../';
		
		$.ajax({
			data : $objet,
			url : folder+'ajax.php?c=dependencies&f=list_documents',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! view_config', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	}

///////////////// ******** ----						END list_documents					------ ************ //////////////////

};