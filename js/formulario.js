$(document).ready(function() {
	$("#registro1").click(function(event){
		var error = 0,
			message = 'Debes llenar los siguientes campos:  <br>',
			$required = [];
		
	// Validations
		$("#formulario").find(':input').each(function(key, value){
			var required = $(this).attr('required'),
				valor = $(this).val(),
				id = this.id;
			
		// Validate that the required input not are empty
			if (required === 'required' && valor.length <= 0) {
				error = 1;

				$required.push(id);
			}
		});
		
	// Build the error message
		if ($required.length > 0) {
			$.each($required, function(index, value) {
				message += '-->' + this + ' <br>';
			});
		}
		
	// Error
		if (error === 1) {
			swal({
				html: message,
				title : 'Campos no validos',
				text : message,
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			
			return;
		}
		
		event.preventDefault();
		var form = $('#santoysena')[0];
		var data = new FormData(form);
		data.append("CustomField", "This is some extra data, testing");
		
		
		swal({
			title : '',
			imageUrl : 'resources/images/spiner.gif',
			text : 'Cargando información',
			showConfirmButton : false
		});
		
		$.ajax({
			type : "POST",
			enctype : 'multipart/form-data',
			url : "php/back/santoysena.php",
			data : data,
			processData : false,
			contentType : false,
			cache : false,
			timeout : 600000,
			success : function(data) {
				swal.close();
				console.log(data);
				if (data === 'false') {
					swal({
						title : 'Contraseña invalida',
						text : 'Ya existe un registro con el mismo correo, verificalo!',
						type : 'error',
						showCancelButton : true,
						confirmButtonClass : 'ui primary button azuli',
						cancelButtonClass : 'ui button',
						confirmButtonText : 'ACEPTAR',
						cancelButtonText : 'NO'
					});
				} else {
					$('#panelR').load('resources/registros/mexico.php');
				}
			},error : function(e) {
				swal.close();
				console.log("================> Error:", e);
			}
		});
	});
	
	$("#registromx").click(function() {
		$('#panelR').load('resources/registros/2.php');
	});
	$("#registro2").click(function() {
		$('#panelR').load('resources/registros/3.php');
	});

	$("#nombre").keyup(function() {
		var value = $(this).val();
		$("#1r").val(value);
	});
	$("#paterno").keyup(function() {
		var value = $(this).val();
		$("#2r").val(value);
	});
	$("#materno").keyup(function() {
		var value = $(this).val();
		$("#3r").val(value);
	});
	$("#correo").keyup(function() {
		var value = $(this).val();
		$("#4r").val(value);
		$("#correor").val(value);
	});
	$("#domicilio").keyup(function() {
		var value = $(this).val();
		$("#5r").val(value);
	});
	$("#colonia1").keyup(function() {
		var value = $(this).val();
		$("#6r").val(value);
	});
	$("#municipio1").keyup(function() {
		var value = $(this).val();
		$("#7r").val(value);
	});
	$("#postal").keyup(function() {
		var value = $(this).val();
		$("#8r").val(value);
	});
	$("#telefono").keyup(function() {
		var value = $(this).val();
		$("#9r").val(value);
	});
	$("#password").keyup(function() {
		var value = $(this).val();
		$("#10r").val(value);
		$("#passwordr").val(value);
	});
	$("#calle").keyup(function() {
		var value = $(this).val();
		$("#12r").val(value);
	});
	$("#numerolocal").keyup(function() {
		var value = $(this).val();
		$("#13r").val(value);
	});
	$("#colonia2").keyup(function() {
		var value = $(this).val();
		$("#14r").val(value);
	});
	$("#calles").keyup(function() {
		var value = $(this).val();
		$("#15r").val(value);
	});
	$("#referencia").keyup(function() {
		var value = $(this).val();
		$("#16r").val(value);
	});
	$("#mts2").keyup(function() {
		var value = $(this).val();
		$("#18r").val(value);
	});
	$("#inicio").keyup(function() {
		var value = $(this).val();
		$("#19r").val(value);
	});
	$("#fin").keyup(function() {
		var value = $(this).val();
		$("#20r").val(value);
	});

	$("#registro3").click(function(event) {
		console.log('culo');
		
		var error = 0,
			message = 'Debes llenar los siguientes campos:  <br>',
			$required = [];
		
	// Validations
		$("#panelR").find(':input').each(function(key, value){
			var required = $(this).attr('required'),
				valor = $(this).val(),
				id = this.id;
			
		// Validate that the required input not are empty
			if (required === 'required' && valor.length <= 0) {
				error = 1;

				$required.push(id);
			}
		});
		
	// Build the error message
		if ($required.length > 0) {
			$.each($required, function(index, value) {
				message += '-->' + this + ' <br>';
			});
		}
		
	// Error
		if (error === 1) {
			swal({
				html: message,
				title : 'Campos no validos',
				text : message,
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			
			return;
		}
		
		event.preventDefault();
		var form = $('#giro')[0],
			data = new FormData(form),
			days = '';
			
		data.append("CustomField", "This is some extra data, testing");
		
	// Build string days
		days += ($("#dia1")[0].checked) ? 1+', ' : '';
		days += ($("#dia2")[0].checked) ? 2+', ' : '';
		days += ($("#dia3")[0].checked) ? 3+', ' : '';
		days += ($("#dia4")[0].checked) ? 4+', ' : '';
		days += ($("#dia5")[0].checked) ? 5+', ' : '';
		days += ($("#dia6")[0].checked) ? 6+', ' : '';
		days += ($("#dia7")[0].checked) ? 7+', ' : '';
		days = days.substring(0, days.length - 2);
		data.dias = days;
		
		$("#dias").val(days);
		
		swal({
			title : '',
			imageUrl : 'resources/images/spiner.gif',
			text : 'Cargando información',
			showConfirmButton : false
		});
		
		$.ajax({
			type : "POST",
			enctype : 'multipart/form-data',
			url : "php/back/giro.php",
			data : data,
			processData : false,
			contentType : false,
			cache : false,
			timeout : 600000,
			success : function(data) {
				console.log(data);
				
				swal.close();
				
				if (data == '1') {
					$('#panelR').load('resources/registros/nosanidad.php');
				}
				if (data == '2') {
					$('#panelR').load('resources/registros/sanidad.php');
				}

			},
			error : function(e) {
				swal.close();
			}
		});
	});

	$("#registrar1").click(function(event) {
		var error = 0,
			message = 'Debes llenar los siguientes campos:  <br>',
			$required = [];
		
	// Validations
		$("#panelR").find(':input').each(function(key, value){
			var required = $(this).attr('required'),
				valor = $(this).val(),
				id = this.id;
			
		// Validate that the required input not are empty
			if (required === 'required' && valor.length <= 0) {
				error = 1;

				$required.push(id);
			}
		});
		
	// Build the error message
		if ($required.length > 0) {
			$.each($required, function(index, value) {
				message += '-->' + this + ' <br>';
			});
		}
		
	// Error
		if (error === 1) {
			swal({
				html: message,
				title : 'Campos no validos',
				text : message,
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			
			return;
		}
		
		event.preventDefault();
		swal({
			title : '',
			imageUrl : 'resources/images/spiner.gif',
			text : 'Cargando información',
			showConfirmButton : false
		});
		var form = $('#todof')[0];
		var data = new FormData(form);
		console.log("==========> data: ", data);
		
		data.append("CustomField", "This is some extra data, testing");
		$.ajax({
			type : "POST",
			enctype : 'multipart/form-data',
			url : "php/back/subirinfo.php",
			data : data,
			processData : false,
			contentType : false,
			cache : false,
			timeout : 600000,
			success : function(data) {
				console.log(data);
				
				location.href = "panel.php";
				
				swal({
					title : 'Registro Exitoso',
					type : 'success',
					showCancelButton : true,
					confirmButtonClass : 'ui primary button azuli',
					cancelButtonClass : 'ui button',
					confirmButtonText : 'ACEPTAR',
					cancelButtonText : 'NO'
				});
			},
			error : function(e) {
			}
		});
	});

	$("#registrar2").click(function(event) {
		event.preventDefault();
		swal({
			title : '',
			imageUrl : 'resources/images/spiner.gif',
			text : 'Cargando información',
			showConfirmButton : false
		});
		var form = $('#todof')[0];
		var data = new FormData(form);
		data.append("CustomField", "This is some extra data, testing");
		$.ajax({
			type : "POST",
			enctype : 'multipart/form-data',
			url : "php/back/subirinfo.php",
			data : data,
			processData : false,
			contentType : false,
			cache : false,
			timeout : 600000,
			success : function(data) {
				location.href = "panel.php";
				swal({
					title : 'Registro Exitoso',
					type : 'success',
					confirmButtonClass : 'ui primary button azuli',
					cancelButtonClass : 'ui button',
					confirmButtonText : 'ACEPTAR',
					onClose : function() {
						location.href = "panel.php";
					}
				});
			},
			error : function(e) {
			}
		});
	});

});
