<?php
	//Theme
	add_theme_support( 'post-thumbnails' );

	//Image Sizes
	add_image_size( 'seccion_imagen', 619, 175, true );
	add_image_size( 'seccion_imagen_chica', 296, 153, true );
	add_image_size( 'imagen_single', 619, 314, true );
		/*custombox producto*/
		add_action( 'add_meta_boxes', 'custombox_producto' );
		add_action( 'save_post', 'guardar_custombox_producto' );
		 
		/* Adds a box to the main column on the Post and Page edit screens */
		function custombox_producto() {
		    $screens = array( 'post', 'page' );
		    foreach ($screens as $screen) {
		        add_meta_box(
		            'myplugin_dd',
		            __( 'Producto', 'myplugin_producto' ),
		            'campos_custombox_producto',
		            $screen
		        );
		    }
		}
		 
		/* Prints the box content */
		function campos_custombox_producto( $post ) {
		 
		 global $post;
		 
		    $check_prod = get_post_meta( $post->ID, 'check_prod', true );
		
		    // output invlid url message and add the http:// to the input field
		
		?>
			<?php $checked = $check_prod ? 'checked' : ''; ?>
		    <p><label for="check_prod">check_prod:<br />
            <input type="checkbox" name="check_prod" id="check_prod" value="1"  <?php echo $checked; ?> /> Post de Producto</label>	 
        
		<?php
		 
		}
		 
		/* When the post is saved, saves our custom data */
		function guardar_custombox_producto( $post_id ) {
		global $post;  
		    if( $_POST ) {
		        update_post_meta( $post->ID, 'check_prod', $_POST['check_prod'] );
		
		    }
		 
		}
/*
    ---------------------
        LIMIT WORDS
    ---------------------
*/

function string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


/**
	 * Regresa el tiempo desde que se creo el tweet
	 */
	function parsepostDate($fecha){
		$segundos = time() - strtotime($fecha);
		$transcurrido = $segundos/60;

		if($transcurrido <= 59){
			return round($transcurrido).' minutos';
		}else if($transcurrido >= 60 and $transcurrido <= 2599){
			return round($transcurrido/60).' horas';
		}else if($transcurrido >= 3600){
			return round($transcurrido/3600).' días';
		}
	}

?>