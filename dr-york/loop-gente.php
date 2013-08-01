	
	<style> /*parche de estilo para el fancybox de la página principal*/
		.fancybox-skin {
			/* height: 600px !important; */ /*width mínimo para el contenedor del fancybo*/
			background: url('<?php echo get_bloginfo('template_url'); ?>/images/dryorklogo2.png') top center no-repeat transparent;
			-webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0) !important;
			-moz-box-shadow:    0px 0px 0px rgba(0, 0, 0, 0) !important;
			box-shadow:         0px 0px 0px rgba(0, 0, 0, 0) !important;
			padding-top: 100px !important; 
			
		}
	</style>
	
	
	<?php
		/*global $post;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array ('post_type' => 'gente', 'posts_per_page' => 40, 'paged' => $paged);
		$posts_array = get_posts($args);
		
			foreach($posts_array as $post) : setup_postdata($post);
			if( $post->ID == $do_not_duplicate ): continue; endif;
			print_r($do_not_duplicate);*/ ?>
			
	<?php
		
		global $wp_query;
		$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'gente', 'posts_per_page' => 40, 'paged' => $paged ) );
		query_posts( $args );
		while ( have_posts() ) : the_post();

	?>
			
			<div class="persona">
				<a class="mouse gentefancybox" id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" rel="prensa"> 
				
				<?php the_post_thumbnail( 'prensa_thumb', 
											array(	'alt'	=> trim(strip_tags( $post->post_title )),
													'title'	=> trim(strip_tags( $post->post_title )),
													'class' => ' small'
									));?>
				</a>
			</div><!-- persona -->
			<?php /*endforeach;*/ endwhile;
		wp_reset_query(); ?>
			
			<!-- <div class="persona_large">
					<?php /*
the_post_thumbnail( array(431, 431,
													'alt'	=> trim(strip_tags( $post->post_title )),
													'title'	=> trim(strip_tags( $post->post_title )),
													'class' => ' large',
									));
					echo '<h4>';
						the_title();
					echo '</h4>';
					echo '<p>';
						the_content();
					echo '</p>';
			echo '</div>';
-->
			echo '</div>';
			endforeach;
		wp_reset_query();
*/
	?>