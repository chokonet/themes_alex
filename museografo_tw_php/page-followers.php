<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>

			<div class="content_full">

				<div class="content">

					<div class="user_perfil bloque col_12 borde_user clearfix">

						<div class="datos left clearfix margin_right">
							<img class="user left" src="<?php echo $template_url; ?>/images/raul.jpg" alt="User">
							<h3 class="username">zolitariuz</h3>
							<p class="nombre">
								Raúl De Zamacona<br />
								México, D.F.<br />
								Hombre, 25 años
							</p>
						</div><!-- left -->

						<div class="bio text left col_4 margin_right">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Expectoque quid ad id, quod quaerebam, respondeas. Non quaeritur autem quid naturae tuae consent.</p>
						</div>


						<div class="conexiones left col_3">

							<h4>Siguiendo</h4> <a class="label_password" href="#">ver todos</a>
							<ul class="siguiendo borde_gris round_corners_2 active">
								<li class="museos">
									<h4 class="numero">256</h4>
									<p>Museos</p>
								</li>
								<li class="artistas">
									<h4 class="numero">38</h4>
									<p>Artistas</p>
								</li>
								<li class="museografos">
									<h4 class="numero">10</h4>
									<p>Museógrafos</p>
								</li>
							</ul><!-- siguiendo -->

							<h4>Te siguen</h4> <a class="label_password" href="#">ver todos</a>
							<ul class="te_siguen borde_gris round_corners_2">
								<li class="artistas">
									<h4 class="numero">12</h4>
									<p>Artistas</p>
								</li>
								<li class="museografos">
									<h4 class="numero">42</h4>
									<p>Museógrafos</p>
								</li>
							</ul><!-- siguiendo -->

						</div><!-- conexiones -->

					</div><!-- user_perfil -->

					<div class="tesiguen col_4 left margin_right bloque borde_venue clearfix">

							<h3>Museos <span>(256)</span></h3>
							<div class="user_container">
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								
							</div><!-- user_container -->

						
					</div><!-- tesiguen_museos -->



					<div class="tesiguen col_4 bloque borde_artista left margin_right">
						<h3>Artistas <span>(38)</span></h3>
						<div class="user_container">
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								
							</div><!-- user_container -->
						

					</div><!-- tesiguen_artistas -->

					<div class="tesiguen col_4 bloque borde_user left">
						<h3>Museógrafos <span>(10)</span></h3>
						<div class="user_container">
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								<article class="each_user borde_top_gris">
									<h4>Pixel Pancho</h4>
									<img src="<?php echo $template_url; ?>/images/user.jpg" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, repellendus, consequatur, soluta assumenda delectus.</p>
									<a class="red_button round_corners_2" href="#">Dejar de Seguir</a>
								</article>
								
							</div><!-- user_container -->

					</div><!-- tesiguen_museografos -->

					<div class="clear"></div>

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ); ?>