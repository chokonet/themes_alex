<?php
	/**
	 * Descargar imagenes:
	 * Postear a este script el path de la imagen para iniciar la descarga en el browser.
	 *
	 * @author Los Maquiladores
	 * @param $_POST['image'] (string) 'path/to/image/file.png'
	 * @return attachment
	 */

	if( isset($_POST['image']) ){

		$file = $_POST['image'];

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		//header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Content-Disposition: attachment; filename="MomentosGold.png"');
		header('Content-Transfer-Encoding: binary');
		header('Connection: Keep-Alive');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}