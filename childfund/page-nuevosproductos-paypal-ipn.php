<?php

	$admin_email  = 'childfundmexico@childfundmexico.org.mx';
	$paypal_email = 'childfundmexico@childfundmexico.org.mx';

	$sandbox = false;

	date_default_timezone_set('America/Mexico_City');

	//reading raw POST data from input stream. reading pot data from $_POST may cause serialization issues since POST data may contain arrays
	$raw_post_data  = file_get_contents('php://input');
	$raw_post_array = explode('&', $raw_post_data);
	$myPost = array();
	foreach ($raw_post_array as $keyval) {
		$keyval = explode ('=', $keyval);
		if (count($keyval) == 2){
			$myPost[$keyval[0]] = urldecode($keyval[1]);
		}
	}

	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	if(function_exists('get_magic_quotes_gpc')){
		$get_magic_quotes_exits = true;
	}
	foreach ($myPost as $key => $value){
		if($get_magic_quotes_exits == true && get_magic_quotes_gpc() == 1){
			$value = urlencode(stripslashes($value));
		}else{
			$value = urlencode($value);
		}
		$req .= "&$key=$value";
	}

	$ch = curl_init();
	if($sandbox):
		curl_setopt($ch, CURLOPT_URL, 'https://www.sandbox.paypal.com/cgi-bin/webscr');
	else:
		curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/cgi-bin/webscr');
	endif;
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", "Content-Length: " . strlen($req)));

	$res = curl_exec($ch);
	curl_close($ch);

	$req = str_replace( "&", "\n", $req ); //replace & with \n for readability


	if (strcmp ($res, "VERIFIED") == 0){
		mail( $admin_email, "Donativo ChildFund: Verificado!", $req, "From: $admin_email");
	}else if (strcmp ($res, "INVALID") == 0) {
		exit;
	}

	// assign posted variables to local variables
	$payment_status = $_POST['payment_status'];
	$receiver_email = $_POST['receiver_email'];
	$txn_id         = $_POST['txn_id'];
	$monto          = $_POST['mc_gross'];
	$programa       = $_POST['item_name1'];
	$custom         = $_POST['custom'];


	if($receiver_email != $paypal_email){
		// log for manual investigation
		mail( $admin_email, "PayPal - Reciver email is wrong contact support!", $req, "From: $admin_email");
		exit;
	}


	/* validar el estatus de la operacion */
	switch($payment_status){
		case 'Completed':
			mail( $admin_email, "Donativo Childfund: Operación de PayPal completada!", $req, "From: $admin_email");

			if( $custom != '' ){
				parse_str($custom);
				$message = "Datos para el comprobante fiscal de un donativo: \n\n";
				$message .= "Nombre: $nombre\n";
				$message .= "Apellido Paterno: $apPat\n";
				$message .= "Apellido Materno: $apMat\n";
				$message .= "RFC: $rfc\n";
				$message .= "Email: $mail\n";
				$message .= "Calle: $calle\n";
				$message .= "Colonia: $colonia\n";
				$message .= "Delegación: $delegacion\n";
				$message .= "Ciudad: $ciudad\n";
				$message .= "C.P.: $cp\n";
				$message .= "Monto: $monto\n";
				$message .= "Transaction ID: $txn_id\n";
				$message .= "Payment Status: $payment_status\n";

				wp_mail( $admin_email, "Solicitud de recibo", $message, "From: $admin_email" );
			}
			break;
		case 'Created':
			mail( $admin_email, "PayPal - Payment Status - Created", $req, "From: $admin_email");
			exit;
		case 'Denied':
			mail( $admin_email, "PayPal - Payment Status - Denied", $req, "From: $admin_email");
			exit;
		case 'Fraud_Management_Filters_x':
			mail( $admin_email, "PayPal - Payment Status - Fraud_Management_Filters_x", $req, "From: $admin_email");
			exit;
		case 'Expired':
			mail( $admin_email, "PayPal - Payment Status - Expired", $req, "From: $admin_email");
			exit;
		case 'Failed':
			mail( $admin_email, "PayPal - Payment Status - Failed", $req, "From: $admin_email");
			exit;
		case 'Pending':
			mail( $admin_email, "PayPal - Payment Status - Pending", $req, "From: $admin_email");
			exit;
		case 'Refunded':
			mail( $admin_email, "PayPal - Payment Status - Refunded", $req, "From: $admin_email");
			exit;
		case 'Reversed':
			mail( $admin_email, "PayPal - Payment Status - Reversed", $req, "From: $admin_email");
			exit;
		case 'Processed':
			mail( $admin_email, "PayPal - Payment Status - Processed", $req, "From: $admin_email");
			exit;
		case 'Voided':
			mail( $admin_email, "PayPal - Payment Status - Voided", $req, "From: $admin_email");
			exit;
	}

	$fecha = date('Y-m-d H:i:s');

	global $wpdb;
	$wpdb->query(
		$wpdb->prepare(
			"INSERT INTO wp_donativos ( tipo, programa, monto, txn_id, payment_status, fecha )
				VALUES ( %s, %s, %d, %s, %s, %s )",
				'unico', $programa, $monto, $txn_id, $payment_status, $fecha
		)
	);