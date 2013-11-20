<?php get_header();

	$objeto = get_queried_object();

	if(have_posts()): while(have_posts()): the_post(); ?>

		<div class="content-single">

			<h2><?php the_title(); ?></h2>

			<span class="date"><?php the_date('d.m.y', '', ' |'); ?> <?php the_author_posts_link(); ?> | <?php the_category(' - ',$post->ID); ?></span>

			<?php if(!get_post_meta($post->ID,'slider',true)) {  ?>
				<div class="imagenes-single">
					<?php the_post_thumbnail('featured'); ?>
				</div><!-- end .imagenes-single -->
			<?php } else { ?>

				<div id="single-slider" class="imagenes-single">

					<?php $args = array(
						'post_type' => 'attachment',
						'post_parent' => $post->ID,
						'posts_per_page' => -1
					);

					$attachments = get_posts($args);

					if($attachments) : foreach ($attachments as $attachment) :
						$src = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
						<img src="<?php echo isset($src[0]) ? $src[0] : ''; ?>"><?php
					endforeach; endif; ?>

				</div><!-- end .slider -->

				<div id="nav-slider">
					<ul>
					<?php $attachments = get_posts($args);
						if($attachments) : foreach ($attachments as $attachment) :
							$src = wp_get_attachment_image_src($attachment->ID, 'thumbnail'); ?>
							<li><a href=""><img src="<?php echo isset($src[0]) ? $src[0] : ''; ?>"></a></li><?php
						endforeach; endif; ?>
					</ul>
				</div>

			<?php } ?>



			<?php the_content(); ?>

			<?php if(get_post_meta($post->ID, 'id_vimeo', true)){ ?>

				<div class="imagenes-single">
					<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'id_vimeo', true); ?>?color=00a6ce" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div><!-- end .imagenes-single -->

			<?php } elseif (get_post_meta($post->ID, 'id_youtube', true)) { ?>

				<div class="imagenes-single">
					<iframe width="640" height="360" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allowfullscreen></iframe>
				</div><!-- end .imagenes-single -->

			<?php }

				echo "<p class = 'source'>";
					if( get_post_meta($post->ID, 'post_via', true) ){
						echo "<a class='title'>vía</a>
								<a class='gap' target = ".'_blank'." href=".get_post_meta($post->ID, 'link_via', true)." >" . get_post_meta($post->ID, 'post_via', true) .
								"</a>";
					}
					if( get_post_meta($post->ID, 'post_fuente', true) ){
						echo "<a class='title'>fuente</a>
								<a target = ".'_blank'." href=".get_post_meta($post->ID, 'link_fuente', true).">" . get_post_meta($post->ID, 'post_fuente', true) .
								"</a>";
					}
				echo "</p>";
			echo get_the_tag_list('<p class = "tagwrap"> <a class = "title">etiquetas</a> ',' ','</p>'); ?>


			<ul class="social-post">
				<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
				<li><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div></li>
				<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="125" data-show-faces="false"></div></li>
			</ul>

			<div class="info-autor">
				<a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php echo get_avatar( get_the_author_meta('ID'), 150 ); ?></a>
				<h4><?php the_author_posts_link(); ?></h4>
				<span class="date"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php echo get_the_author_meta('nombre_columna'); ?></a></span>
				<p><?php echo get_the_author_meta('bio'); ?></p>
			</div><!-- end .info-autor-->

			<h5>Más artículos del autor</h5>

			<div class="relacionados">
				<?php $args = array(
					'author'         => $post->post_author,
					'posts_per_page' => 5,
					'exclude'        => $post->ID
				);

				$relacionadosAutor = get_posts($args);

				foreach ($relacionadosAutor as $post): setup_postdata($post); ?>

					<div class="post-relacionado">
						<span class="date"><?php the_date('d.m.y', '', ' |'); ?> <?php the_category(' - ',$post->ID); ?></span>
						<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
					</div><!-- end .post-relacionado -->

				<?php endforeach; wp_reset_query(); ?>
			</div><!-- .relacionados -->


			<div class="post-nav">
				<?php previous_post_link('%link', '&raquo Anterior'); ?>
				<span class="siguiente-post">
					<?php next_post_link('%link', 'Siguiente &laquo'); ?>
				</span>
			</div><!-- end .post-nav -->

			<?php
				$prev_post = get_previous_post();
				$next_post = get_next_post();

				if(!empty($prev_post)) {
					$previous = get_post($prev_post->ID); ?>

					<div class="nav-post prev">
						<a href="<?php echo get_permalink( $previous->ID ); ?>"><?php echo get_the_post_thumbnail($previous->ID, 'thumbnail'); ?></a>
						<h4><a href="<?php echo get_permalink( $previous->ID ); ?>"><?php echo $previous->post_title; ?></a></h4>
						<span class="date"><?php the_category(' - ','',$previous->ID); ?></span>
					</div><!-- end .nav-post -->
			<?php }

				if(!empty($next_post)) {
					$next = get_post($next_post->ID); ?>
					<div class="nav-post next">
						<a href="<?php echo get_permalink( $next->ID ); ?>"><?php echo get_the_post_thumbnail($next->ID, 'thumbnail'); ?></a>
						<h4><a href="<?php echo get_permalink( $next->ID ); ?>"><?php echo $next->post_title; ?></a></h4>
						<span class="date"><?php the_category(' - ', '', $next->ID); ?></span>
					</div><!-- end .nav-post -->
			<?php } ?>

			<div class="facebook-comments">
				<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="640" data-num-posts="10"></div>
			</div>

		</div><!-- end .content-single -->

	<?php endwhile; endif; wp_reset_query(); ?>

	<?php include_once('side-general.php'); ?>

<?php get_footer(); ?>