<?php


	/**
	 * Envia mail el formulario de contacto
	 * @param  $_GET email data
	 * @return boolean
	 */
	function ajax_envia_mail(){

		if ( ! isset($_GET)) wp_send_json_error();

		if ( ! filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
			wp_send_json_error('El campo de mail es invalido');

		extract($_GET);

		$fecha = date('d-m-Y H:i:s');
		$subject_form = "Subject: $subject \n\r";

		$mailContent = "Mensaje de $name \n\rEmail: $email  \n\rFecha: $fecha \n\r $subject_form Mensaje: $comment";
		$mailResult  = wp_mail( 'alex@losmaquiladores.com', 'bemygirl', $mailContent );
		wp_send_json($mailResult);
	}
	add_action('wp_ajax_ajax_envia_mail', 'ajax_envia_mail');
	add_action('wp_ajax_nopriv_ajax_envia_mail', 'ajax_envia_mail');