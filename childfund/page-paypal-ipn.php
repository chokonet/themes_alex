<?php

	$admin_email = 'childfundmexico@childfundmexico.org.mx';
	$paypal_email = 'childfundmexico@childfundmexico.org.mx';
	$sandbox = false;
	
	date_default_timezone_set('America/Mexico_City');

	//reading raw POST data from input stream. reading pot data from $_POST may cause serialization issues since POST data may contain arrays
	$raw_post_data = file_get_contents('php://input');
	$raw_post_array = explode('&', $raw_post_data);
	$myPost = array();
	foreach ($raw_post_array as $keyval){
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
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: www.paypal.com'));

	$res = curl_exec($ch);
	curl_close($ch);	
	
	$req = str_replace( "&", "\n", $req ); //replace & with \n for readability
	
	if (strcmp ($res, "VERIFIED") == 0){	
		mail( $admin_email, "Compra en ChildFund: operación de PayPal completada!", $req, "From: $admin_email");
	}else if (strcmp ($res, "INVALID") == 0) {
		//mail("$admin_email", "NOT VERIFIED!", $req, "From: $admin_email");
		exit;
	}
	
	// assign posted variables to local variables
	$payment_status = $_POST['payment_status'];
	$txn_id = $_POST['txn_id'];
	$receiver_email = $_POST['receiver_email'];
	$custom = $_POST['custom'];
	
	if($receiver_email != $paypal_email){
		// log for manual investigation
		mail( $admin_email, "PayPal - Reciver email is wrong contact support!", $req, "From: $admin_email");
		exit;
	}
	
	/* validar el estatus de la operacion */
	if($payment_status != 'Completed'){
		// log for manual investigation
		mail( $admin_email, "PayPal - Payment Status NOT Completed", $req, "From: $admin_email");
		exit;
	}
	
	global $wpdb;
	
	/* comparar el txn_id que regresa paypal con la base, para no duplicar entradas */
	$query = "SELECT txn_id FROM wp_cart WHERE txn_id = '$txn_id' LIMIT 1;";
	$result = mysql_query($query);
	if(mysql_num_rows($result)){
		mail( $admin_email, "PayPal - Duplicate transaction id", $req, "From: $admin_email");
		exit;
	}
	
	$pieces = array();
	/* actualizar la tabla wp_cart */

	$pieces = explode("-", "$custom");
	
	/* Actualizar la base de datos */
	for($i=0; $i<count($pieces); $i++){
		$cart_id = $pieces[$i];
		$update = "UPDATE wp_cart SET beneficiario = 'NA', cart_status = '$payment_status', nino_id_chf = 'NA', padrino_id_chf = 'NA', txn_id = '$txn_id' WHERE cart_id = '$cart_id';";
		$result = mysql_query($update);
	}
	
	