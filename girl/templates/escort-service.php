	<div class="profile">
			<div id="pleca">
				<p>Services</p>
			</div>
			<div id="service">
				<?php $services = get_user_services($escort->ID, 'services');
				foreach ($services as $service):?>

                	<div class="service_list"><?php echo $service->name; ?></div>

           		<?php endforeach; ?>

			</div>
			<div id="service" class="top ">
				<p><?php the_author_meta('message_en', $escort->ID);?></p>

				<?php $musica = get_the_author_meta('media_music', $escort->ID);

				if ($musica != '' ):?>

				<p><strong><u>Music I like</u></strong> :</p>
				<?php echo $musica;

				endif; ?>
			</div>
		</div>