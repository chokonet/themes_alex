<?php get_header(); ?>

		<div id="content">
				<?php the_post(); ?>
				<div class="single_izq">
					<div class="tercio">
						<h2 class="ana_verde">Ana Vásquez Colmenares</h2>
					</div>

					<div class="single_cont">

						<?php the_content(); ?>

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
							<h2>Comentarios:</h2>
						<?php }
						foreach ( $comments as $comment ){ ?>

							<div class="comentario">
								<h4><?php echo $comment->comment_author; ?>:</h4>
								<p><?php echo $comment->comment_content; ?></p>
							</div><!-- comentario -->

						<?php } ?>
					</div><!-- single_comments -->



				</div>


				<div class="single_der ana_azul2">

					<div class="un_tercio tercio preguntale ana_verde">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h2 class="brand_azul">Consulta a Ana</h2></a>
						<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">
					</div><!-- un_tercio -->

					<div class="tercio margen_sup_25">

						<h2 class="ana_verde">Conferencias</h2>


						<div class="tercio_in">
							<?php
					$args = array(
						'posts_per_page' => 1,
						'category_name'	 => 'conferencias'
					);
					query_posts( $args );
					while( have_posts() ) : the_post(); ?>
						<a href="<?php echo home_url('/category/conferencias/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
					<?php endwhile; ?>
						</div><!-- tercio_in -->


					</div><!-- tercio -->


					<div id="twitter_wid" class="tercio margen_sup_25">
						<a class="twitter-timeline" href="https://twitter.com/anavasquezc" data-widget-id="339810405939552258">Tweets by @anavasquezc</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div><!-- twitter -->



				</div><!-- single_der -->


			</div><!-- content -->

<?php get_footer(); ?>