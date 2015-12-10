<?php

$para = "manuel@masoft.net";
$asunto = "Prueba de SMTP local";
$mensaje = "Mensaje de prueba";
$cabeceras = "From: info@masoft.net" . "\r\n" .
"Reply-To: info@masoft.net" . "\r\n" .
"X-Mailer: PHP/" . phpversion();
ini_set(sendmail_from,'info@masoft.net');
if(mail($para, $asunto, $mensaje, $cabeceras)) {
		echo "Correo enviado correctamente";
} else {
		echo "Error al enviar mensaje";
}


?>