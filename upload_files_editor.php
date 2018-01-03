<?php
	require 'plugins/froala/wysiwyg-editor-php-sdk-master/lib/FroalaEditor.php';
	// Store the file.
	try {
		$url = ($_SERVER['SERVER_NAME'] == 'localhost') ? '/tianguismexico-gob' : '';
		
		$response = FroalaEditor_File::upload($url.'/dep_files/html_files');
		echo stripslashes(json_encode($response));
	} catch (Exception $e) {
		http_response_code(404);
	}
?>