<?php
	get_header();
	$objeto = get_queried_object();
	// echo '<pre>';
	// print_r($objeto->post_type);
	// echo '</pre>';
?>
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<div class="resenas-single">
			<div class="splash">
				<?php the_post_thumbnail('full'); ?>
			</div><!-- end .splash -->
			<div class="contenido-resena">
				<div class="info-resena">
					<div class="info-resena-izq">
						<h2><?php the_title(); ?></h2>
						<span class="date"><?php echo get_the_date('d.m.y'); ?>  | <?php the_author_posts_link(); ?> | <?php the_category(' - ',$post->ID); ?></span>
					</div><!-- end .info-resena-izq-->
					<div class="resena-score">
						<p><?php echo get_post_meta($post->ID, 'score', true); ?></p>
					</div><!-- end .resena-score -->
				</div><!-- end .info-resena -->
				<div class="single-resena-izq">
					<div class="texto-resena">
						<?php the_content(); ?>
					</div><!-- end .texto-resena -->
					<?php if(get_post_meta($post->ID, 'id_vimeo', true)){ ?>
					<div class="imagenes-single">
						<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'id_vimeo', true); ?>?color=00a6ce" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					</div><!-- end .imagenes-single -->
					<?php } elseif (get_post_meta($post->ID, 'id_youtube', true)) { ?>
					<div class="imagenes-single">
						<iframe width="640" height="360" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allowfullscreen></iframe>
					</div><!-- end .imagenes-single -->
					<?php } ?>
					<div class="votacion-single">
						<div class="vote-left">
							<div class="resena-score">
								<p><?php echo get_post_meta($post->ID, 'score', true); ?></p>
							</div><!-- end .resena-score -->
							<img src="<?php bloginfo('template_url'); ?>/images/logo-foot.png">
						</div><!-- end .vote-left -->
						<div class="vote-right">
							<div class="vox-populi">
								<p><?php echo get_vote_data($post->ID); ?></p>
							</div><!-- end .vox-populi -->

							<?php if ( !isset($_COOKIE["valueFor_$post->ID"]) ) { ?>
								<div class="votar">
									<h6>vox populi</h6>
									<div id="slider-ui" data-post_id="<?php echo $post->ID; ?>"></div>
									<label id="cambiame_cova">0</label>
									<button id="save-vote">VOTA</button>
								</div><!-- end .votar -->
							<?php } else { ?>
								<div class="votar">
									<h6>Ya has votado.</h6>
								</div><!-- end .votar -->
							<?php } ?>
						</div><!-- end .vote-right -->
					</div><!-- end. votacion-single -->
					<ul class="social-post">
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
						<li><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div></li>
						<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="125" data-show-faces="false"></div></li>
						<!-- <li><a href=""><img src=""></a></li>
						<li><a href=""><img src=""></a></li> -->
					</ul>
					<div class="extra-resenas">
						<div class="info-autor">
							<?php echo get_avatar( get_the_author_meta('ID'), 150 ); ?>
							<h4><?php the_author_posts_link(); ?></h4>
							<span class="date"><a href=""><?php echo get_the_author_meta('nombre_columna'); ?></a></span>
							<p><?php echo get_the_author_meta('bio'); ?></p>
						</div><!-- end .info-autor-->
						<h5>Más artículos del autor</h5>
						<div class="relacionados">
							<?php
								$args = array(
									'author' => $post->post_author,
									'posts_per_page' => 5,
									'exclude' => $post->ID
									);
								$relacionadosAutor = get_posts($args);
								foreach ($relacionadosAutor as $post): setup_postdata($post);
							?>
							<div class="post-relacionado">
								<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ',$post->ID); ?></span>
								<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
							</div><!-- end .post-relacionado -->
							<?php endforeach; wp_reset_query(); ?>
						</div><!-- .relacionados -->
						<?php echo get_the_tag_list('<p> ',', ','</p>'); ?>
						<div class="post-nav">
							<?php previous_post_link('%link', '&raquo Anterior'); ?>
							<span class="siguiente-post">
								<?php next_post_link('%link', 'Siguiente &laquo'); ?>
							</span>
						</div><!-- end .post-nav -->
							<?php
								$prev_post = get_previous_post();
								$next_post = get_next_post();
							?>
							<?php
								if(!empty($prev_post)) {
									$previous = get_post($prev_post->ID);
							?>
							<div class="nav-post prev">
								<a href="<?php echo get_permalink( $previous->ID ); ?>"><?php echo get_the_post_thumbnail($previous->ID, 'thumbnail'); ?></a>
								<h4><a href="<?php echo get_permalink( $previous->ID ); ?>"><?php echo $previous->post_title; ?></a></h4>
								<span class="date"><?php the_category(' - ',$previous->ID); ?></span>
							</div><!-- end .nav-post -->
							<?php } ?>
							<?php
								if(!empty($next_post)) {
									$next = get_post($next_post->ID);
							?>
							<div class="nav-post next">
								<a href="<?php echo get_permalink( $next->ID ); ?>"><?php echo get_the_post_thumbnail($next->ID, 'thumbnail'); ?></a>
								<h4><a href="<?php echo get_permalink( $next->ID ); ?>"><?php echo $next->post_title; ?></a></h4>
								<span class="date"><?php the_category(' - ',$next->ID); ?></span>
							</div><!-- end .nav-post -->
							<?php } ?>
						<h5>Relacionados</h5>
						<?php /*
						<div class="relacionados">
							<?php
							$relacionados = mq_get_related_posts($post->ID);
								echo '<pre>';
								echo print_r($relacionados);
								echo '</pre>';
								foreach ($relacionados as $id) {
										$post = get_post($id);
							?>
							<div class="post-relacionado">
								<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ',$post->ID); ?></span>
								<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
							</div><!-- end .post-relacionado -->
							<?php }  wp_reset_query(); ?>
						</div><!-- .relacionados -->
						*/ ?>
						<div class="facebook-comments">
							<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="640" data-num-posts="10"></div>
						</div>
					</div><!-- end .extra-resena -->
				</div><!-- end .single-resena-izq -->
				<div class="sidebar-resena">
					<?php if(get_post_meta($post->ID, 'ficha', true)) { ?>
					<div class="side ficha">
						<h6>Ficha técnica</h6>
						<?php
							$ficha = apply_filters('the_content', get_post_meta($post->ID, 'ficha', true));
							echo $ficha;
							echo get_post_meta($post->ID, 'imagen-resena', true);
						?>
					</div><!-- end .side-->
					<?php } if(get_post_meta($post->ID, 'post_quote', true)) { ?>
					<div class="side uno">
						<img src="<?php bloginfo('template_url'); ?>/images/quote.png">
						<blockquote><?php echo get_post_meta($post->ID, 'post_quote', true) ?></blockquote>
					</div><!-- end .side-->
					<?php } ?>
				</div><!-- end .sidebar-resena-->
			</div><!-- end .contenido-resena -->
		</div><!-- end .resenas-single -->
	<?php endwhile; endif; ?>
<?php get_footer(); ?>