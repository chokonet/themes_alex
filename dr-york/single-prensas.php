<style>
body{
	margin: 0px;
	padding: 0px;
	border: none;
	background-color: black;
}

#prensa_single{
	width: 600px;
	
	margin: 0 auto;
	overflow: hidden;
	position: relative;
	padding-bottom: 15px;
}

#prensa_single #titulo_prensa{
	color: #FFF;
	font-family: 'Conv_ClarendonLTStd-Light', Georgia, "Times New Roman", Times, serif;
	font-size: 16px;
	width: 600px;
	margin: 12px 0px;
	text-align: center;
}

#prensa_single .articulo_prensa{
	float: right;
	left: -50%;
	position: relative;
	margin-bottom: 12px;
}

#prensa_single .articulo_prensa img{
	left: 50%;
	position: relative;
}
</style>

<div id="prensa_single">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

$thumb_id = get_post_thumbnail_id(get_the_ID());
$args = array(
'post_type' => 'attachment',
'numberposts' => -1,
'post_status' => null,
'post_parent' => $post->ID,
'exclude' => $thumb_id
);

$attachments = get_posts( $args );
	echo '<div id="titulo_prensa">';
		the_title();
	echo '</div>';
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				echo '<div class="articulo_prensa">';
					echo wp_get_attachment_image( $attachment->ID, array(99999,99999) );
				echo '</div>';
			}
		}

endwhile; endif; ?>
</div>