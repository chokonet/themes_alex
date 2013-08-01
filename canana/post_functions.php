<?php
require_once("../../../wp-load.php");

if(isset($_POST['not_featured_id'])){
	$src = wp_get_attachment_image_src( $_POST['not_featured_id'], 'large' );
	$src = $src[0];
	echo $src;
}
?>