		<?php $escort = get_queried_object() ?>

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
						<div id="textos" class="bold_text"><?php the_author_meta( 'mobile', $escort->ID ); ?></div>
					</div>
					<div class="col1_filas instructions">
						<h2 class="size-font"><?php _e('Instructions', 'bemygirl'); ?>:  </h2>
						<div id="textos" class="size-font"><?php _e('SMS', 'bemygirl'); ?> & <?php _e('Call', 'bemygirl'); ?></div>

					</div>
					<div class="col1_filas">
						<span><?php _e('Appearance', 'bemygirl'); ?></span>
						<span class="on"><img src="<?php bloginfo('template_url'); ?>/images/heart.png"></span>
						<span><?php _e('Personality', 'bemygirl'); ?></span>
						<span class="on"><img src="<?php bloginfo('template_url'); ?>/images/heart.png"></span>
						<span><?php _e('Service', 'bemygirl'); ?></span>
						<span class="on"><img src="<?php bloginfo('template_url'); ?>/images/heart.png"></span>
						<span><?php _e('Place', 'bemygirl'); ?></span>
						<span class="on"><img src="<?php bloginfo('template_url'); ?>/images/heart.png"></span>
					</div>

				</div>

				<div class="col2">
					<h2><?php _e('Address', 'bemygirl'); ?>: </h2>
					<p>Avenue de Chailly 57 1212 Lausanne Switzerland</p>
					<a target="_blank" class="noiPhone" href="http://maps.google.com/maps?q=Avenue de Chailly 57 1212 Lausanne, Lausanne Center, Vaud, Switzerland">See map</a>
				</div>
				<div class="col3">
					<div class="col3a">
						<div class="col3_filas">
							<h2><?php _e('Region', 'bemygirl'); ?>:</h2><a href="#"> <p>Vaud</p></a>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Area', 'bemygirl'); ?>:</h2> <p>Lausanne Center</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Type', 'bemygirl'); ?>:</h2> <p>Massage Parlour</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Appointment', 'bemygirl'); ?>:</h2> <p>Incall</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Service for', 'bemygirl'); ?>:</h2> <p>Men</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Nationality', 'bemygirl'); ?>:</h2> <p>Spanish</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Ethnicity', 'bemygirl'); ?>:</h2> <p>Caucasian</p>
						</div>
						<div class="col3_filas">
							<h2 ><?php _e('Languages', 'bemygirl'); ?>:</h2 > <div style="width: 120px; float:left; "> <p>English**</p> <p>French***</p> <p>Spanish*</p></div>
						</div>
					</div>

					<div class="col3a col3_margin">
						<div class="col3_filas">
							<h2><?php _e('Age', 'bemygirl'); ?>:</h2> <p>18-22</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Weight', 'bemygirl'); ?>:</h2> <p>54 kg</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Height', 'bemygirl'); ?>:</h2> <p>170 cm</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Eyes', 'bemygirl'); ?>:</h2> <p>Blue</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Hair', 'bemygirl'); ?>:</h2> <p> Blonde</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Shoe size', 'bemygirl'); ?>:</h2> <p>37</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Breast size', 'bemygirl'); ?>:</h2> <p>Large</p>
						</div>
						<div class="col3_filas">
							<h2><?php _e('Pubic Hair', 'bemygirl'); ?>:</h2>  <p>Shaved </p>
						</div>
					</div>
				</div>
			</div>
