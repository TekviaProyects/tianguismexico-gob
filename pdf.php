<?php
	$request_id = $_REQUEST['request_id'];
	$doc = (!empty($_REQUEST['doc'])) ? $_REQUEST['doc'] : 'solicituddepermiso' ;
	
	
	
	// header("Content-Disposition: attachment; filename=\"".$request_id."-solicituddepermiso.pdf\"");
	
// Dowload the PDF if exists
	if(file_exists('pdfs/'.$request_id.'/'.$doc.'.pdf')){
		// $file = 'pdfs/'.$request_id.'/solicituddepermiso.pdf';
		// header("Cache-Control: public");
	    // header("Content-Description: File Transfer");
	    // header("Content-type: application/pdf");
	    // header("Content-Transfer-Encoding: binary");
// 		
	    // readfile($file);
		
		echo json_encode('pdfs/'.$request_id.'/'.$doc.'.pdf');
		
		return ;
	}
	
// Load Html2Pdf via composer
	require __DIR__.'/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	
// Create the HTML
	ob_start();
	include ('formatostianguis/'.$doc.'.php');
	$my_html = ob_get_clean();

// Create the folder if not exists
	$carpeta = 'pdfs/'.$request_id;
	if (!file_exists($carpeta)) {
	    mkdir($carpeta, 0777, true);
	}

// Create the PDF
	$html2pdf = new HTML2PDF();
	$html2pdf->writeHTML($my_html);
	$html2pdf->Output($carpeta.'/'.$doc.'.pdf', 'F'); // Save PDF on the server
	// $html2pdf->Output("".$request_id."-solicituddepermiso.pdf"); // Dowload the PDF
	
	echo json_encode($carpeta.'/'.$doc.'.pdf');
?>