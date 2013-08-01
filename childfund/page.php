<?php get_header(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('li#menu-item-128').addClass('current-menu-item');
	});
</script>

<div class="acerca">
	
	<img src="<?php bloginfo('template_url'); ?>/images/banner_interiores_acerca.jpg" />
	
	<ul class="acerca-menu">
		<?php 
			$acerca_pages = get_pages( array( 'child_of' => 5, 'sort_column' => 'menu_order', 'sort_order' => 'asc' ) );
			foreach( $acerca_pages as $page ):
				$active = '';
				if(is_page($page->post_name)) $active = ' active';
				echo '<li class="'.$page->post_name.''.$active.'">
				<a href="'.get_permalink($page->ID).'">'.$page->post_title.'</a></li>';
			endforeach;
		?>
	</ul><!-- end .acerca-menu -->
	
	<?php 
	if(have_posts()): while(have_posts()): the_post();
	?>
	
	<div class="contenido">
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	
	<?php endwhile; endif; ?>
	</div><!-- end .contenido -->
	
</div><!-- end .acerca -->

<?php get_footer(); ?>