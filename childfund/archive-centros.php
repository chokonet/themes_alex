<?php get_header(); ?>

	<div class="centros_cont">
		<h2>Organizaciones comunitarias</h2>
		
		<?php if ( function_exists('build_i_world_map') ){
			build_i_world_map(2);			
		}	?>
		<div id='imap2message'></div>		
	</div><!-- end .centros -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>