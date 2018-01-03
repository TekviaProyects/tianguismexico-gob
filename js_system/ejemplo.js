var ejemplo = {
	
///////////////// ******** ---- 			agregar_nombre			------ ************ //////////////////
//////// Agrega un nombre a la BD
	// Como parametros puede recibir:
		// nombre -> String con el nombre
		
	agregar_nombre : function($objeto) {
		console.log('==========> $objeto agregar_nombre');
		console.log($objeto);
	
	// Valida que se capture el nombre
		if(!$objeto.nombre){
			alert("Nombre no valido");
			
			return;
		}
		
		$.ajax({
			data : $objeto,
			url : 'ajax.php?c=ejemplo&f=agregar_nombre',
			type : 'post',
			dataType : 'json',
		}).done(function(resp) {
			console.log('==========> done agregar_nombre');
			console.log(resp);
			
			alert("Nombre agregado");
			
			ejemplo.listar_nombres({div: 'contenedor'});
		}).fail(function(resp) {
			console.log('==========> fail agregar_nombre');
			console.log(resp);
			
			alert("Error interno");
		});
	},

///////////////// ******** ---- 		FIN agregar_nombre			------ ************ //////////////////

///////////////// ******** ---- 			listar_nombres			------ ************ //////////////////
//////// Consulta los nombre y carga una vista
	// Como parametros puede recibir:
		// div -> ID de la div donde se carga el HTML
		
	listar_nombres : function($objeto) {
		console.log('==========> $objeto listar_nombres');
		console.log($objeto);

		$.ajax({
			data : $objeto,
			url : 'ajax.php?c=ejemplo&f=listar_nombres',
			type : 'post',
			dataType : 'html',
		}).done(function(resp) {
			console.log('==========> done listar_nombres');
			console.log(resp);
			
			$("#"+$objeto.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail listar_nombres');
			console.log(resp);
			
			alert("Error interno");
		});
	},

///////////////// ******** ---- 		FIN listar_nombres			------ ************ //////////////////

};
