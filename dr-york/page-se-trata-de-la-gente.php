<?php get_header(); ?>

<div id="gente">

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<h3><?php the_title(); ?></h3>
	<p id="ver_descripcion"><?php if (qtrans_getLanguage()=='es') { ?>Ver descripción<?php } elseif (qtrans_getLanguage()=='en') { ?>See about<?php } ?></p>
	<div id="texto_se_trata_de_la_gente">
	<div id="cerrar_texto">X</div>
		<?php the_content();?>
	</div>

	<?php endwhile; endif; ?>


<div id="slidergente">
	<div class="nav">
		<a class="prev" href="#"><img src="<?php echo get_bloginfo('template_url'); ?>/images/prev.png" alt="prev" width="16" height="22"/></a>
		<a class="next" href="#"><img src="<?php echo get_bloginfo('template_url'); ?>/images/next.png" alt="next" width="16" height="22"/></a>
	</div><!-- nav -->

	<div id="cajota">


	</div><!-- cajota -->

	<div id="sliderpager">
		<a class="buttons left" href="#">left</a>

		<div class="viewport">

			<ul id="pager" class="overview">

			<?php
			global $post;
			$args = array ('post_type' => 'personajes', 'posts_per_page' => -1);
			$posts_array = get_posts($args);
				foreach($posts_array as $post) : setup_postdata($post);
				echo '<li alt="';
				the_title();
				echo '">';
					echo '<a class="link_a_la_persona" href="';
						the_permalink();
					echo '">';
						the_post_thumbnail( array(104,104) );
					echo '</a>';
				echo '</li>';
				endforeach;
			wp_reset_query();
			?>
			</ul><!-- pager overview -->
		</div><!-- viewport -->
		<a class="buttons right" href="#">right</a>
	</div><!-- sliderpager -->

</div><!-- slidergente -->

</div><!-- gente -->

<?php get_footer(); ?>
