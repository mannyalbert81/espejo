<?php

//require('view/fpdf/fpdf.php');

require_once('view/dompdf/dompdf_config.inc.php' );;
$html =
'<html><body>'.
'<p>Put your html here, or generate it with your favourite '.
'templating system.</p>'.
'</body></html>';
 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("ficha.pdf");

?>