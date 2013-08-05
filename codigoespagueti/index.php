<?php get_header(); ?>

	<div id="slider">
		<?php
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 1,
			'meta_key'       => 'top_home',
			'meta_value'     => 'true'
		);
		$slides = get_posts($args);
		foreach($slides as $post): setup_postdata($post); ?>

			<div class="slide">
				<a rel="nofollow" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide'); ?></a>
				<div class="slide-info">
					<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
					<h2><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h2>
					<?php the_excerpt(10); ?>
					<ul class="share-slide">
						<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="125" data-show-faces="false"></div></li>
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
						<li><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div></li>
					</ul>
				</div><!-- end .slide-info-->
			</div><!-- end .slide -->

		<?php endforeach; wp_reset_query(); ?>
	</div><!-- end #slider -->
	<?php get_sidebar(); ?>
	<div id="content">
		<div id="content-destacados">
			<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 4,
				'meta_key'       => 'grid_home',
				'meta_value'     => 'true'
			);
			$destacados = get_posts($args);
			foreach ($destacados as $post): setup_postdata($post); ?>

				<div class="post">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_post');?></a>
					<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
					<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
					<?php the_excerpt();?>
				</div><!-- end .post -->

			<?php endforeach; wp_reset_query(); ?>
		</div><!-- end #content-destacados -->
		<h5>Entrevistas</h5>
		<div id="content-entrevistas">
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4,
				'category' => 13
			);
			$entrevistas = get_posts($args);
			foreach ($entrevistas as $post): setup_postdata($post); ?>

				<div class="post">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_post');?></a>
					<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ',$post->ID); ?></span>
					<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
					<?php the_excerpt();?>
				</div><!-- end .post -->
			<?php endforeach; wp_reset_query(); ?>
		</div><!-- end #content-entrevistas -->
		<h5>Colaboradores</h5>
		<div id="content-colaboradores">
			<div class="colaborador">
				<a href=""><?php the_post_thumbnail('thumbnail');?></a>
				<h6>Nombre Apellido</h6>
				<a href="">Categoría</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipscin elit.</p>
			</div><!-- end .colaborador -->
			<div class="colaborador">
				<a href=""><img src="http://placehold.it/80x80"></a>
				<h6>Nombre Apellido</h6>
				<a href="">Categoría</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipscin elit.</p>
			</div><!-- end .colaborador -->
			<div class="colaborador">
				<a href=""><img src="http://placehold.it/80x80"></a>
				<h6>Nombre Apellido</h6>
				<a href="">Categoría</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipscin elit.</p>
			</div><!-- end .colaborador -->
			<div class="colaborador">
				<a href=""><img src="http://placehold.it/80x80"></a>
				<h6>Nombre Apellido</h6>
				<a href="">Categoría</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipscin elit.</p>
			</div><!-- end .colaborador -->
			<div class="colaborador">
				<a href=""><img src="http://placehold.it/80x80"></a>
				<h6>Nombre Apellido</h6>
				<a href="">Categoría</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipscin elit.</p>
			</div><!-- end .colaborador -->
			<div class="colaborador">
				<a href=""><img src="http://placehold.it/80x80"></a>
				<h6>Nombre Apellido</h6>
				<a href="">Categoría</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipscin elit.</p>
			</div><!-- end .colaborador -->
		</div><!-- end #content-colaboradores -->
		<h5>Reseñas</h5>
		<div id="content-resenas">
			<?php
			$args = array(
					'post_type'      => 'resenas',
					'posts_per_page' => 4,

				);
			$resenas = get_posts($args);
			foreach ($resenas as $post): setup_postdata($post); ?>
				<div class="post">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_post'); ?></a>
					<a href="<?php the_permalink(); ?>">
						<div class="resena-score">
							<p><?php echo get_vote_data($post->ID); ?></p>
						</div><!-- end .resena-score -->
					</a>
					<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
					<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
					<?php the_excerpt();?>
				</div><!-- end .post -->
			<?php endforeach; wp_reset_query(); ?>
		</div><!-- end #content-resenas -->
		<?php /* LO COMENTAMOS POR SI LO QUIEREN DESPUÉS
		<h5>Estamos leyendo</h5>
		<div id="content-estamos">
			<?php
				$args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
						'category' => 20
					);
				$estamosleyendo = get_posts($args);
				foreach ($estamosleyendo as $post): setup_postdata($post);
			?>
			<div class="post-estamos">
				<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ',$post->ID); ?></span>
				<p><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></p>
			</div><!-- end .post-estamos -->
			<?php endforeach; wp_reset_query(); ?>
		</div><!-- end #content-estamos -->
		*/ ?>
	</div><!-- end #content -->
	<div id="videos-home">
		<h5>Video</h5>
		<?php
		$args = array(
			'post_type'      => 'videos',
			'posts_per_page' => 1,
		);
		$videos = get_posts($args);
		foreach($videos as $post): setup_postdata($post); ?>

			<div class="video-main-home">
				<?php if(get_post_meta($post->ID, 'id_vimeo', true)){ ?>
					<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'id_vimeo', true); ?>?color=00a6ce" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<?php } elseif (get_post_meta($post->ID, 'id_youtube', true)) { ?>
					<iframe width="630" height="360" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allowfullscreen></iframe>
				<?php } ?>
				<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ',$post->ID); ?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
			</div>
		<?php endforeach; wp_reset_query(); ?>
		<div class="lista-videos">
			<ul>
				<?php
				$args = array(
					'post_type'      => 'videos',
					'posts_per_page' => 5,
					'offset'         => 1
				);
				$videos = get_posts($args);
				foreach($videos as $post): setup_postdata($post); ?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('fetured'); ?></a>
						<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ',$post->ID); ?></span>
						<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
					</li>
				<?php endforeach; wp_reset_query(); ?>
			</ul>
		</div><!-- end .lista-videos -->
	</div><!-- end #videos-home -->
<?php get_footer(); ?>