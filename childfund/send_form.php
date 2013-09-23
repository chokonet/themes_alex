<?php

// Blank message to start with so we can append to it.
$message = '';


// Check empty fields.
if(empty($_POST['nombre'])
		|| empty($_POST['apPat'])
		|| empty($_POST['apMat'])
		|| empty($_POST['rfc'])
		|| empty($_POST['mail'])
		|| empty($_POST['calle'])
		|| empty($_POST['colonia'])
		|| empty($_POST['delegacion'])
		|| empty($_POST['ciudad'])
		|| empty($_POST['cp'])) {
    die('Por favor llene todos los campos');
}


// Construct the message
$message .= <<<EMAIL
	Datos para el comprobante fiscal de un donativo:
    Nombre: {$_POST['nombre']}
    Apellido Paterno: {$_POST['apPat']}
    Apellido Materno: {$_POST['apMat']}
    RFC: {$_POST['rfc']}
    Email: {$_POST['mail']}
    Calle: {$_POST['calle']}
    Colonia: {$_POST['colonia']}
    Delegación: {$_POST['delegacion']}
    Ciudad: {$_POST['ciudad']}
    CP: {$_POST['cp']}
EMAIL;


$to      = 'childfundmexico@childfundmexico.org.mx'; // Email to send to
$subject = 'Solicitud de Recibo de donativo';        // Email Subject
$from    = 'ChildFund donativos';                    // Name to show email from
$header  = 'De: ' . $from;                           // Construct a header to send who the email is from


// Try sending the email
if( ! mail($to, $subject, $message, $header)){
    die('Error en el envío de los datos');
}else{
    die('Sus datos se han enviado correctamente!');
}