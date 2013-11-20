
<div class="sidebar">
	<div class="app">
		<img src="<?php echo THEMEPATH; ?>images/iphone-vive-centro.png">
		<p>Descarga la aplicación para dispositivos móviles para <a href="">iPhone</a> y <a href="">Android</a>.</p>
	</div>
	<?php if ( is_home() || is_archive() || ! is_single() || ! is_tax( 'zonas') ) : ?>
	<div class="side-social clearfix">
		<div class="siguenos clearfix">
			<h5>Síguenos</h5>
			<ul>
				<li><a class="fbk" href=""></a></li>
				<li><a class="twt" href=""></a></li>
				<li><a class="instgrm" href=""></a></li>
				<li class="tmblr" ><a class="tmblr" href=""></a></li>
			</ul>
		</div><!-- end .siguenos -->
	
		<div class="fb-feed"><!-- aqui se renderea el template de handlebars -->
		</div>


	</div><!-- end .side-social -->
	<?php elseif ( is_single() ) : ?>
		<div class="side-social single clearfix">
			<?php if( !is_single() ) : ?>
				<div class="siguenos megusta social">
					<h5>Me gusta</h5>
					<a class="like_icon" href="#" data-post_id="<?php the_ID(); ?>"><?php echo numero_favoritos_post($post->ID); ?></a>
				</div><!-- end .megusta -->
			<?php endif; ?>
			<div class="siguenos comparte social clearfix">
				<?php global $post; setup_postdata($post); ?>
				<h5>Comparte</h5>
				<ul>
					<li><a class="fbk comprtirFB"
							data-permalink="<?php the_permalink() ?>"
							data-title="<?php the_title() ?>"
							data-description="<?php the_content(); ?>"
							data-image="<?php attachment_image_url($post->ID, 'thumbnail') ?>">
						</a>
					</li>
					<li><a class="twt" href="#"></a></li>
				</ul>
				<?php wp_reset_postdata(); ?>
			</div><!-- end .comparte -->
		</div><!-- end side-social single -->
		

		<?php
		if ( $post->post_type == 'recorridos' ) {
			
			$thispostid = $post->ID;
			$query = new WP_Query( array( 
				'post_type' => 'recorridos',
				'post__not_in' => array($thispostid)

				)); 

			echo '<h5>Otros recorridos</h5>';
		
			while ($query->have_posts()) : $query->the_post(); ?>

				<div class="sidebar_post">
					<?php the_post_thumbnail(); ?>
					<h3><?php the_title(); ?></h3>
					<a href="<?php the_permalink(); ?>">></a>
				</div><!-- sidebar_post -->

			<?php endwhile; 
		}

		if ( $post->post_type =='lugares' ) {
			
			$thispostid = $post->ID;
			$query = new WP_Query( array( 
				'post_type' => 'lugares',
				'cat' => 'zonas'

				)); 

			echo '<h5>Otros lugares</h5>';
		
			while ($query->have_posts()) : $query->the_post(); ?>

				<div class="sidebar_post">
					<?php the_post_thumbnail(); ?>
					<h3><?php the_title(); ?></h3>
					<a href="<?php the_permalink(); ?>">></a>
				</div><!-- sidebar_post -->

			<?php endwhile; 
		}?>
		


	<?php endif; ?>
</div><!-- end .sidebar -->

<script id="template-facebook-feed" type="text/x-handlebars-template">
	<ul>
		{{#each data}}
			<li><a href="http://www.facebook.com/{{id}}">{{ message }}</a></li>
		{{/each}}
	</ul>
</script>