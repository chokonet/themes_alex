
	<div class="galeria">

		<?php $query = new Escort\Query();

		if ( $query->have_escorts() ) : while( $query->have_escorts() ) : $escort = $query->the_escort(); ?>

			<div class="girl float_left">
				<div class="info_container">
					<a href="<?php Escort\Account::url($escort->ID); ?>" class="informacion">
						<div id="name"><?php echo $escort->display_name ?></div>
						<div id="name"> <?php echo $escort->area ?>, <?php echo $escort->region ?></div>
						<span> </span>
					</a>
					<img src="<?php the_author_meta('url_imagen', $escort->ID); ?>"></a>
				</div>

				<h4 class="name_big">
					<a href="<?php Escort\Account::url($escort->ID); ?>">
						<?php echo $escort->display_name ?>
					</a>
				</h4>

			</div><!-- end .girl -->
			<?php

		endwhile; else :

			_e('No girls found', 'bemygirl');

		endif; ?>

		<div class="view-footer noiPhone">
			<?php _e('All Photos are', 'bemygirl'); ?> 100% <?php _e('real', 'bemygirl'); ?> - <?php _e('photo shot by', 'bemygirl'); ?> bemygirl - <?php _e('Copyright', 'bemygirl'); ?> © 2012 - 2013
		</div>

	</div>