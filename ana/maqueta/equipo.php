<?php get_header(); ?>

		<div id="slider_wrap_100" class="slider_wrap_equipo">
			<div id="slider_wrap">

				<h2>Equipo</h2>
				<ul id="slider_equi">

					<?php
					$args = array(
						'posts_per_page' => -1,
						'category_name'	 => 'equipo'
					);
					query_posts( $args );
					while ( have_posts() ) : the_post(); ?>

						<li>
							<a href="<?php the_permalink(); ?>?a=rosa"> <?php the_post_thumbnail(); ?> </a>
							<div class="slider_info">
								<h3> <a href="<?php the_permalink(); ?>?a=rosa"> <?php the_title(); ?> </a></h3>
								<p><?php echo get_post_meta($post->ID, 'dbt_puesto', true); ?></p>
							</div><!-- slider_info -->
						</li>

					<?php endwhile; ?>

				</ul><!-- slider_equi -->

				<div id="flechas_slider">
					<div id="slider_prev" class="flechas" ></div>
					<div id="slider_next" class="flechas" ></div>
				</div><!-- flechas_slider -->

			</div><!-- slider_wrap -->
			</div><!-- slider_wrap 100 -->

			<div id="content">

				<div class="single_izq">
					<div class="single_cont">
						
					</div><!-- single_cont -->

					<div class="single_comments">

						<?php
						$commenter = wp_get_current_commenter();
						$req = get_option( 'require_name_email' );
						$aria_req = ( $req ? " aria-required='true'" : '' );

						$args = array(
							'id_submit'       		=> 'single_comm_enviar',
							'title_reply'       	=> '<h4>Deja un comentario</h4>',
  							'title_reply_to'    	=> 'Deja una respuesta a %s',
							'comment_field'			=>  '<div class="single_comm_der"><p class="comment-form-comment"><label for="comment">Comentario</label><textarea id="comment" class="single_comm_in" name="comment" cols="45" rows="8" aria-required="true">' .
												    '</textarea></p><label class="dis_block">
								<small>Al dar clic en “Enviar” aceptas el Aviso de Privacidad</small>
							</label></div>',
							'comment_notes_after'	=> '',
							'label_submit'			=> 'Enviar',
							'fields' => apply_filters( 'comment_form_default_fields', array(

							    'author' =>
							      '<p class="comment-form-author">' .
							      '<label for="author">Nombre</label> ' .
							      ( $req ? '<span class="required">*</span>' : '' ) .
							      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
							      '" size="30"' . $aria_req . ' /></p>',

							    'email' =>
							      '<p class="comment-form-email"><label for="email">Correo</label> ' .
							      ( $req ? '<span class="required">*</span>' : '' ) .
							      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
							      '" size="30"' . $aria_req . ' /></p>',
							  )
							)
						);

						comment_form( $args, $post->ID );

						$args = array(
							'orderby' => '',
							'order' => 'DESC',
							'post_id' => "$post->ID",
							'status' => 'approve'
						);
						$comments = get_comments($args);
						if ( $comments ){?>
							<h3>Comentarios:</h3>
						<?php }
						foreach ( $comments as $comment ){ ?>

							<div class="comentario">
								<h4><?php echo $comment->comment_author; ?>:</h4>
								<p><?php echo $comment->comment_content; ?></p>
							</div><!-- comentario -->

						<?php } ?>
					</div><!-- single_comments -->

					

				</div><!-- single_izq -->

				<div class="single_der">

					<div class="un_tercio tercio preguntale equipo_rosa">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h3 class="brand_rosa">Consulta a Ana</h3></a>
						<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">
						
					</div><!-- un_tercio -->

					<div class="tercio margen_sup_25">
						<div class="tercio_in">
							<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div id="twitter_wid" class="tercio margen_sup_25">
						<a class="twitter-timeline" href="https://twitter.com/anavasquezc" data-widget-id="339810405939552258">Tweets by @anavasquezc</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div><!-- twitter -->

				</div><!-- single_der -->
			</div><!-- content -->
<?php get_footer(); ?>