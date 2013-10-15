<?php get_header(); ?>
	<?php $escort = get_queried_object() ?>
	<div class="main">
		<div class="next_prev">
			<a class="back-results" href="<?php echo site_url(); ?>"><?php _e('Back to search results', 'bemygirl'); ?></a>
			<a class="prev-link" href="#"><?php _e('PREVIOUS', 'bemygirl'); ?></a>
			<a class="next-link" href="#"><?php _e('Next', 'bemygirl'); ?></a>
		</div>
		<div class="iphoneLine soloiPhone"></div>
		<div class="mobile_next_prev soloiPhone">
			<a class="prev-link" href="#"></a>
			<h1><?php echo $escort->display_name; ?></h1>
			<a class="next-link" href="#"></a>
		</div>

		<?php get_template_part( 'templates/escort', 'sidebar' ) ?>

		<div class="cont_single">

			<?php get_template_part( 'templates/escort', 'profile' ) ?>
			<?php get_template_part( 'templates/escort', 'service' ) ?>
			<?php get_template_part( 'templates/escort', 'hours' ) ?>

		</div>
	</div><!-- end #main -->
<?php get_footer(); ?>