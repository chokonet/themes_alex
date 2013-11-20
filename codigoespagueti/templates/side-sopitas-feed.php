
	<div class="side_sopitas">

		<h2>sopitas.com</h2>

		<?php

		$rss_sopitas = fetch_feed('http://www.sopitas.com/site/cat/editors-choice/feed/');

		if( ! is_wp_error($rss_sopitas)) :

			$feed_elements = $rss_sopitas->get_items( 0, 6 );

		 	foreach ( $feed_elements as $element ) :

				$imagen = $element->get_item_tags('http://search.yahoo.com/mrss/', 'content');
				$imagen = isset($imagen[0]['attribs']['']['url']) ? $imagen[0]['attribs']['']['url'] : 'http://placehold.it/80x80';

				// $categories = $element->get_categories();
				// $category   = isset($categories[0]) ? $categories[0]->term : ''; ?>

				<div class="cont_post">
					<a href="<?php echo $element->get_permalink() ?>">
						<img src="<?php echo $imagen ?>">
					</a>
					<h3>
						<a href="<?php echo $element->get_permalink() ?>" target="_blank">
							<?php echo $element->get_title() ?>
						</a>
					</h3>
					<a href="<?php echo $element->get_permalink() ?>" target="_blank"><h4>Editors Choice</h4></a>
					<a href="<?php echo $element->get_permalink() ?>" target="_blank"><p><?php echo wp_trim_words( $element->get_content(), 10 )?></p></a>
				</div><?php

			endforeach;

		endif; ?>

	</div><!-- end sopitas.com-->