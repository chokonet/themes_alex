<?php get_header(); ?>

	<!-- main-->
	<div class="main">

		<?php get_template_part( 'templates/nav', 'filters' ); ?>

		<?php get_template_part( 'templates/loop', 'escorts' ); ?>

	</div><!-- fin main-->

<?php get_footer(); ?>