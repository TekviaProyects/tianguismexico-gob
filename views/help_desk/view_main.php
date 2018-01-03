<!-- Include external CSS. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<div class="row" style="padding: 10px">
	<div class="col-sm-12 col-md-4">
		<div class="input-group">
			<span class="input-group-btn">
				<button id="saveButton" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
			</span>
		</div>
	</div>
	<div class="col-sm-12 col-md-8" id="message"align="left" style="padding-top: 7px">

	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div id="froala-editor">
			<?php echo $content ?>
		</div>
	</div>
</div>

<!-- Include external JS libs. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="plugins/froala/js/languages/es.js"></script>

<!-- Sytem -->
<script src="js_system/help_desk.js"></script>

<!-- Initialize the editor. -->
<script>
	$('div#froala-editor').froalaEditor({
        saveParam: 'content',
        saveURL: 'ajax.php?c=help_desk&f=create_question',
        saveMethod: 'POST',
	// Additional save params.
        saveParams: {
        	state: '<?php echo $_REQUEST['state'] ?>',
			municipality: '<?php echo $_REQUEST['municipality'] ?>'
		},
		fileUploadURL: 'upload_files_editor.php',
		imageUploadURL: 'upload_images_editor.php',
		language: 'es',
		toolbarButtons : [
			'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 
			'fontSize', 'color', 'paragraphStyle', '|', 'align', 'formatOL', 'formatUL', 'outdent', 
			'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'embedly', 'insertFile', 'insertTable', '|', 
			'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'spellChecker', '|', 'undo', 'redo'
		],
		imageStyles:{
			imageDisplay: 'inline'
		}
	}).on('froalaEditor.save.after', function (e, editor, response) {
		console.log("=========> Todo cool: ", response);
		
		$("#message").html("Todos los cambios han sido guardados");
	}).on('froalaEditor.save.error', function (e, editor, error) {
		console.log("=========> Error: ", e, editor, error);
		
		$("#message").html("Problema al guardar los cambios, intenta otra vez");
	}).on('froalaEditor.file.error', function (e, editor, error, response) {
		console.log("==========> Error: ", error, response);
		
		$("#message").html("Problema al guardar los cambios, intenta otra vez");
    }).on('froalaEditor.image.error', function (e, editor, error, response) {
		console.log("==========> Error: ", error, response);
		
		$("#message").html("Problema al guardar los cambios, intenta otra vez");
	}).on('froalaEditor.contentChanged', function (e, editor) {
	// Hide buy message
		$('div[style*="z-index: 9999;width: 100%; position: relative"]').hide();
		$(".fr-dib").removeClass("fr-dib").addClass("fr-dii");
	});
	
	$('#saveButton').click (function () {
		var editor = $('#froala-editor').data('froala.editor');
		var newOpts = {saveParams: {
	        	state: '<?php echo $_REQUEST['state'] ?>',
				municipality: '<?php echo $_REQUEST['municipality'] ?>'
		}};
		
		$.extend(editor.opts, newOpts);
		
		$('#froala-editor').froalaEditor('save.save')
	});
	
// Hide buy message
	$('div[style*="z-index: 9999;width: 100%; position: relative"]').hide();
</script>