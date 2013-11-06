<?php get_header(); the_post(); ?>

	<div class="main_fq border_fq">

		<div class="iphoneLine soloiPhone"></div>

		<div id="plecasup"><span>FAQ</span></div>

		<div class="columna_izq"><?php the_content(); ?></div>

		<div class="columna_der noiPhone">
			<div class="girl tamano">
				<?php if ( has_post_thumbnail() ) : the_post_thumbnail('large');
				else : echo "<img src='".THEMEPATH."/images/img-faq.jpg' alt='faq'>"; endif; ?>
			</div>
		</div>

	</div>

<?php get_footer(); ?>