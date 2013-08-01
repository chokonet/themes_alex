<?php
get_header(); $color = isset( $_GET['a'] ) ? $_GET['a'] : false; ?>

		<div class="clear"></div>

		<?php the_post(); ?>

		<div id="content">

				<div class="single_izq izq_single">

					<div class="tercio">
						<h3 class="<?php if ($color != ""):  ?>brand_<?php echo $color;?><?php else: ?>ana_verde<?php endif; ?>"><?php the_title(); ?></h3>
					</div><!-- tercio -->

					<div class="single_cont">
						<?php $catergorias = get_the_category($post->ID); ?>
						<h4 class="post_h"><?php the_category(', ');?></h4>
						<?php if ($color == 'videos'): ?>
							<?php
								$videosdeo_url = get_post_meta($post->ID, 'dbt_link_video', true);
							?>
							<iframe width="571" height="428" src="http://www.youtube.com/embed/<?php echo $videosdeo_url; ?>" frameborder="0" allowfullscreen></iframe>
							<?php the_content(); ?>
						<?php else: ?>
							<?php the_content(); ?>
						<?php endif; ?>

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

				<div class="single_der <?php if($color != ""): ?>ana_<?php echo $color;?><?php else: ?>ana_verde2<?php endif; ?>">
					<div class="tercio">

						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/'); ?>"><h4 class="<?php if ($color != ""):  ?>brand_<?php echo $color;?><?php else: ?>ana_verde<?php endif; ?>">Ana Vásquez Colmenares</h4></a>

						<div class="tercio_in">
							<?php
					$args = array(
						'posts_per_page' => 1,
						'category_name'	 => 'pensamientos'
					);
					query_posts( $args );
					while( have_posts() ) : the_post(); ?>
						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
					<?php endwhile; ?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->


					<div class="tercio margen_sup_25">

						<h3 class="<?php if ($color != ""):  ?>brand_<?php echo $color;?><?php else: ?>ana_verde<?php endif; ?>">Conferencias</h3>

						<div class="tercio_in">
							<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'conferencias'
							);
							query_posts( $args );
							while ( have_posts() ) : the_post();?>
								<a href="<?php echo home_url('/category/ana-vasquez-colmenares/conferencias/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
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