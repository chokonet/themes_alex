<?php get_header();

	global $current_user; get_currentuserinfo(); ?>

	<div class="content cf">

		<section id="sliderContainer" class="fade">
			<div class="labelContainer"><p class="pink uppercase">Alertas de Mamá</p></div>
			<a class="leftArrow prev dropSmall"></a>

			<div class="viewport">

				<ul class="overview">

					<li class="eventoThumb"><a href="#">
						<img src="<?php echo THEMEPATH ?>images/evento1.png">
						<p>Lorem ipsum dolor sit amet.</p>
					</a></li><!-- eventoThumb -->


					<li class="eventoThumb"><a href="#">
						<img src="<?php echo THEMEPATH ?>images/evento2.png">
						<p>Lorem ipsum dolor sit amet.</p>
					</a></li><!-- eventoThumb -->


					<li class="eventoThumb"><a href="#">
						<img src="<?php echo THEMEPATH ?>images/evento3.png">
						<p>Lorem ipsum dolor sit amet.</p>
					</a></li><!-- eventoThumb -->


					<li class="eventoThumb"><a href="#">
						<img src="<?php echo THEMEPATH ?>images/evento1.png">
						<p>Lorem ipsum dolor sit amet.</p>
					</a></li><!-- eventoThumb -->

				</ul><!-- slider -->

			</div>

			<a class="rightArrow next dropSmall"></a>
			<div class="cf"></div>

			<div class="nuevo rounded dashed blue">
				<a href="#">Agregar Alerta</a>
			</div>
		</section><!-- sliderContainer -->

		<section id="albums">
			<h3 class="pink">El diario de <span class="blue"><?php echo $current_user->display_name; ?></span></h3>
			<p class="center blue">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, ipsam, ipsum, facere cum aliquam
				numquam voluptatum molestias ratione perspiciatis dolore natus voluptate eaque impedit. Fuga numquam
				saepe voluptas corporis veniam!</p>

				<div class="timeline">
					<div id="ageSlider"></div>
					<div class="ageSliderbg rounded"></div>
					<ul>
						<li class="pink">Embarazo</li>
						<li class="pink">0-6 meses</li>
						<li class="pink">6-12 meses</li>
						<li class="pink">1-3 años</li>
					</ul>
				</div><!-- timeline -->

				<?php get_template_part( 'templates/part', 'gallerya' );
					  get_template_part( 'templates/part', 'galleryb' );
					  get_template_part( 'templates/part', 'galleryc' );
					  get_template_part( 'templates/part', 'galleryd' ); ?>

				<div class="nuevo rounded dashed blue"><a href="">¡Agrega otro logro!</a></div>
				<div class="centerDiv">
					<div class="greenBtn button rounded white drop">Descargar diario</div>
					<div class="pinkBtn button rounded white drop">Compartir álbum</div>
				</div>
		</section>


	</div><!-- content -->

<?php get_footer(); ?>