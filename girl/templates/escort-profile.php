			<div id = "info" class="profile">

				<div class="rate noiPhone">
					<h3>
					<span><?php _e('Rate her', 'bemygirl'); ?></span>
					</h3>
					<span class="flag-span"><?php _e('Add to favorite', 'bemygirl'); ?></span>
				</div>

				<h1 class="noiPhone"><?php echo $escort->display_name; ?></h1>

				<div class="col1">

					<div class="col1_filas">
						<h2><?php _e('Mobile', 'bemygirl'); ?>: </h2>
						<div id="textos" class="bold_text"><?php the_author_meta( 'contact_mobile', $escort->ID ); ?></div>
					</div><!-- mobile -->
					<div class="col1_filas instructions">
						<h2 class="size-font"><?php _e('Instructions', 'bemygirl'); ?>:  </h2>
						<div id="textos" class="size-font"><?php _e(the_author_meta( 'contact_instructions', $escort->ID ), 'bemygirl'); ?></div>
					</div><!-- instructions -->
					<div class="col1_filas">
						<span><?php _e('Appearance', 'bemygirl'); ?></span>
						<span class="on"><img src="<?php bloginfo('template_url'); ?>/images/heart.png"></span>
						<span><?php _e('Personality', 'bemygirl'); ?></span>
						<span class="on"><img src="<?php bloginfo('template_url'); ?>/images/heart.png"></span>
						<span><?php _e('Service', 'bemygirl'); ?></span>
						<span class="on"><img src="<?php bloginfo('template_url'); ?>/images/heart.png"></span>
						<span><?php _e('Place', 'bemygirl'); ?></span>
						<span class="on"><img src="<?php bloginfo('template_url'); ?>/images/heart.png"></span>
					</div><!-- rate corazones -->

				</div>

				<div class="col2">
					<h2><?php _e('Mail', 'bemygirl'); ?>: </h2>
					<p><?php the_author_meta( 'email', $escort->ID ); ?></p>
				</div><!-- mail -->
				<div class="col2">
					<h2><?php _e('Website', 'bemygirl'); ?>: </h2>
					<p><?php echo $escort->user_url ?></p>
				</div><!-- website -->
				<div class="col2">
					<?php $address = get_the_author_meta( 'contact_address', $escort->ID ); ?>
					<h2><?php _e('Address', 'bemygirl'); ?>: </h2>
					<p><?php echo $address; ?></p>
					<a target="_blank" class="noiPhone" href="http://maps.google.com/maps?q=<?php echo $address; ?>">See map</a>
				</div><!-- address -->

				<div class="col3">
					<div class="col3a">
						<div class="col3_filas">
							<h2><?php _e('Region', 'bemygirl'); ?>:</h2><a href="#"> <p><?php echo $escort->region; ?></p></a>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Area', 'bemygirl'); ?>:</h2> <p><?php echo $escort->area; ?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Type', 'bemygirl'); ?>:</h2> <p></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Appointment', 'bemygirl'); ?>:</h2> <p><?php the_author_meta('contact_appointment', $escort->ID);?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Service for', 'bemygirl'); ?>:</h2>
							<p>
								<?php $service_for = get_user_services($escort->ID, 'service_for');
								$services_for = isset($service_for) ? $service_for :'';
								$num_service=0;
								foreach ($services_for as $service):
									 $num_service++;
										if ($num_service >= 2 ) echo', ';
									 _e($service->name, 'bemygirl');
								 endforeach; ?>
							</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Nationality', 'bemygirl'); ?>:</h2> <p><?php echo $escort->nationality; ?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Ethnicity', 'bemygirl'); ?>:</h2> <p><?php echo $escort->ethnicity; ?></p>
						</div>
						<div class="col3_filas">
							<h2 ><?php _e('Languages', 'bemygirl'); ?>:</h2 > <div style="width: 120px; float:left; "> <p>English**</p> <p>French***</p> <p>Spanish*</p></div>
						</div>
					</div>

					<div class="col3a col3_margin">
						<div class="col3_filas">
							<h2><?php _e('Age', 'bemygirl'); ?>:</h2> <p><?php echo $escort->age; ?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Weight', 'bemygirl'); ?>:</h2> <p><?php echo $escort->weight; ?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Height', 'bemygirl'); ?>:</h2> <p><?php echo $escort->height; ?> cm</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Eyes', 'bemygirl'); ?>:</h2> <p><?php echo $escort->eyes_color; ?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Hair', 'bemygirl'); ?>:</h2> <p> <?php echo $escort->hair_color; ?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Shoe size', 'bemygirl'); ?>:</h2> <p><?php echo $escort->shoe_size; ?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Breast size', 'bemygirl'); ?>:</h2> <p><?php echo $escort->breast_size; ?></p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Pubic Hair', 'bemygirl'); ?>:</h2>  <p><?php echo $escort->pubic_hair; ?></p>
						</div>
					</div>

				</div>

			</div>
