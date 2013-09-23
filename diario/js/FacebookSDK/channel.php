<?php
	header("Pragma: public");
	header("Cache-Control: maxage=31536000");
	header('Expires: '.gmdate('D, d M Y H:i:s', time()+31536000).' GMT'); ?>

<script src="https://connect.facebook.net/es_ES/all.js"></script>