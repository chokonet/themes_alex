	<?php $girl_id = 10; ?>
	<div class="main" id="edit-photos" data-girl_id="<?php echo $girl_id; ?>">

		<?php include( 'photos-sidebar.php' ); ?>

		<div class="main_fq main_fotos media">

			<div id="plecasup">
				<span><?php _e('SoundCloud & video', 'bemygirl'); ?> </span>
			</div>

			<div class="col1">
				<label for="media-soundcloud"><?php _e('SoundCloud', 'bemygirl'); ?></label>
				<input class="form-text" id="media-soundcloud" name="soundcloud" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
			</div>
			<div class="col1">
				<label for="media-video"><?php _e('Video', 'bemygirl'); ?></label>
				<input class="form-text" id="media-video" name="video" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
			</div>
		</div>

		<div class="main_fq main_fotos">

			<div id="plecasup">
				<span><?php _e('Offline Photos', 'bemygirl'); ?> </span>
			</div>

			<div class="photos_content">
				<p class="bold">Publish a photo</p>
				<p>Please drag & drop the photos on the public website ( right side ) or member section to publish or zoom and publish on public or member</p>
			</div>

			<div class="photos_content">
				<p class="bold">Delete a photo</p>
				<p>To delete a photo please drag & drop on the offline section or zoom and click on delete</p>
			</div>

			<div class="galeria">



				<?php

					$the_query = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'attachment', 'author' => $girl_id, 'post_status' => 'inherit', 'order' => 'ASC' ) );

					if (  $the_query->have_posts()  ) : while ( $the_query->have_posts() ) : $the_query->the_post();

					?>

						<div class="girl float_left draggable">
							<div class="info_container">
								<?php $img_url = wp_get_attachment_image_src('', 'imagen_girl'); ?>
								<img src="<?php echo $img_url[0]; ?>"></a>
							</div>
						</div><!-- end imagen -->

					<?php endwhile; else :

						_e('No attachment found', 'bemygirl');

					endif;
					?>



				<div class="girl float_left add-new-photo">
					<div class="info_container" id="bt-add-photo">
						ADD NEW PHOTO
					</div>
				</div><!-- end imagen -->

				<input type="file" name="foto-paso-uno" id="subir-foto-girl"  multiple accept="image/*">

			</div>
			<input type="submit" name="op" value="Save" class="form-submit-photo-girl" id="form-submit-file-photo" >
		</div>




	</div><!-- end main -->