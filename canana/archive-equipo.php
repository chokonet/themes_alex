<?php get_header(); ?>
<div id="contenido">
	<div class="bordeBlanco" id="l1">

		<div class="tema2">
			<div class="bordeBlanco centrado sinBordeAbajo">
				<div class="tituloPuesto"><?php if (qtrans_getLanguage() == 'es') { ?>SOCIOS<?php } else { ?>PARTNERS<?php }; ?>
				</div>
			</div>

			<div class="contenidoTemaSobre colCol">

			<?php
			$args = array(
				'post_type'   => 'equipo',
				'puestos'     => 'socios',
				'post_status' => 'publish'
			);

				$my_query = new WP_Query($args);

				while ($my_query->have_posts()) : $my_query->the_post();
					$metabox_datos = get_post_custom(); ?>

					<div class="colaborador" rel="colaborador_<?php the_ID(); ?>">

						<div class="nombreColaborador">
							<h4><?php the_title(); ?></h4>
						</div><!-- nombreColaborador -->

						<div class="datosColaborador">
							<?php $valor_meta = $metabox_datos ['linea2equipo'];
							foreach ( $valor_meta as $key => $valor ){
									echo $valor;
							} ?>
						</div><!-- datosColaborador -->
					</div><!-- colaborador -->
				<?php endwhile;

				while ($my_query->have_posts()) : $my_query->the_post(); ?>

					<div id="colaborador_<?php the_ID(); ?>" class="oculto extraCurr">
						<div class="nombreActivoCurr">
							<?php the_title(); ?>
						</div><!-- nombreActivoCurr -->
						<?php the_content(); ?>
					</div> <!-- colaborador_ -->
					<?php wp_reset_query(); // reset query
				endwhile; ?>

				<div class="clear"></div>
			</div><!-- contenidoTemaSobre -->
		</div><!-- tema2 -->
	</div><!-- bordeBlanco -->

	<div class="bordeBlanco" id="l2">
		<div class="tema2">
			<div class="bordeBlanco centrado sinBordeAbajo">
				<div class="tituloPuesto">
					<h1><?php if (qtrans_getLanguage() == 'es') { ?>DIRECCIÓN<?php } else { ?>MANAGEMENT<?php }; ?></h1>
				</div><!-- tituloPuesto -->
			</div><!-- bordeBlanco -->

			<div class="contenidoTemaSobre">
				<?php
				$args=array(
					'post_type'   => 'equipo',
					'puestos'     => 'direccion',
					'post_status' => 'publish',
					'order'       => 'ASC'
				);
				$counter = 1;
				$my_query = new WP_Query($args);
				while ($my_query->have_posts()) : $my_query->the_post();

					$metabox_datos =  get_post_custom();
					if(trim($post->post_content) != '' ){ ?>
						<div class="colaborador <?php if ( $counter <= 3 ){ echo 'tres'; } else if ( $counter >= 4 ){ echo 'dos';} ?>" rel="direccion_<?php the_ID(); ?>">
					<?php } else { ?>
						<div class="colaborador_none <?php if ( $counter <= 3 ){ echo 'tres'; } else if ( $counter >= 4 ){ echo 'dos';} ?>">
					<?php } ?>

							<div class="nombreColaborador">
								<h4><?php the_title(); ?></h4>
							</div><!-- nombreColaborador -->

							<div class="datosColaborador">
								<?php
								$valor_meta = $metabox_datos ['linea2equipo'];
								foreach ( $valor_meta as $key => $valor )
									echo $valor; ?>
							</div><!-- datosColaborador -->
						</div><!-- colaboradorN2 -->

				<?php $counter++; wp_reset_query();  // reset query
				endwhile;

				while ($my_query->have_posts()) : $my_query->the_post(); ?>

					<div id="direccion_<?php the_ID(); ?>" class="oculto extraCurr">
						<div class="nombreActivoCurr">
							<?php the_title(); ?>
						</div><!-- nombreActivoCurr -->
							<?php the_content(); ?>
					</div>
				<?php
				wp_reset_query(); // reset query
				endwhile;
				?>

				<div class="clear"></div>
			</div><!-- contenidoTemaSobre -->
		</div><!-- tema2 -->
	</div><!-- bordeBlanco -->

	<div class="bordeBlanco">
		<div class="tema2" id="extraPadInt2">
			<div class="contenidoTemaSobre">

				<div class="colaboradorN2">
					<div class="tituloPuesto">
						<h1><?php if (qtrans_getLanguage() == 'es') { ?>DISTRIBUCIÓN<?php } else { ?>DISTRIBUTION<?php }; ?></h1>
					</div><!-- tituloPuesto -->

					<?php
					$args=array(
						'post_type' => 'equipo',
						'puestos' => 'distribucion',
						'post_status' => 'publish',
						'order' => 'ASC'
					);

					$my_query = new WP_Query($args);
					$id_dist = array();
					while ($my_query->have_posts()) : $my_query->the_post();
					   $id_dist[] = $post->ID;
						$metabox_datos =  get_post_custom();
						if(trim($post->post_content) != '' ){ ?>
							<div class="colaboradorN2 colaborador" rel="dist_<?php the_ID(); ?>">
						<?php }else{ ?>
							<div class="colaboradorN2">
						<?php } ?>

								<div class="nombreColaborador">
									<h4><?php the_title(); ?></h4>
								</div><!-- nombreColaborador -->

								<div class="datosColaborador">

									<?php $valor_meta = $metabox_datos ['linea2equipo'];
									foreach ( $valor_meta as $key => $valor )
										echo $valor;
									?>
								</div><!-- datosColaborador -->
							</div><!-- colaboradorN2 -->

						<?php
						wp_reset_query();  // reset query
					endwhile; ?>
				</div><!-- colaboradorN2 -->

				<div class="colaboradorN2">
					<div class="tituloPuesto">
						<h1><?php if (qtrans_getLanguage() == 'es') { ?>ADMINISTRACIÓN<?php } else { ?>ADMINISTRATION<?php }; ?></h1>
					</div><!-- tituloPuesto -->
					<?php
					$args=array(
						'post_type' => 'equipo',
						'puestos' => 'administracion',
						'post_status' => 'publish',
						'order' => 'ASC'
					);
					$my_query = new WP_Query($args);
					$id_admon = array();
					while ($my_query->have_posts()) : $my_query->the_post();
						$id_admon[] = $post->ID;
						$metabox_datos =  get_post_custom();
						if(trim($post->post_content) != '' ){ ?>
							<div class="colaboradorN2 colaborador" rel="administrador_<?php the_ID(); ?>">
						<?php } else { ?>
							<div class="colaboradorN2">
						<?php } ?>
								<div class="nombreColaborador">
									<h4><?php the_title(); ?></h4>
								</div><!-- nombreColaborador -->

								<div class="datosColaborador">
									<?php
									$valor_meta = $metabox_datos ['linea2equipo'];
									foreach ( $valor_meta as $key => $valor ){
										echo $valor;
									} ?>
								</div><!-- datosColaborador -->
							</div><!-- colaboradorN2 -->
					<?php
					wp_reset_query();  // reset query
					endwhile; ?>

				</div><!-- colaboradorN2 -->

				<div class="colaboradorN2">
					<div class="tituloPuesto">
						<h1>PR</h1>
					</div><!-- tituloPuesto -->

					<?php
					$args=array(
						'post_type' 		=> 'equipo',
						'puestos' 			=> 'pr',
						'post_status' 		=> 'publish',
						'order' 			=> 'ASC',
						'posts_per_page'	=> -1
					);

					$my_query = new WP_Query($args);
					while ($my_query->have_posts()) : $my_query->the_post();

						$metabox_datos =  get_post_custom();
						if(trim($post->post_content) != '' ){ ?>
							<div class="colaboradorN2 colaborador" rel="pr_<?php the_ID(); ?>">
						<?php }else{ ?>
							<div class="colaboradorN2">
						<?php } ?>
								<div class="nombreColaborador">
									<h4><?php the_title(); ?></h4>
								</div><!-- nombreColaborador -->

								<div class="datosColaborador">
									<?php
									$valor_meta = $metabox_datos ['linea2equipo'];
									foreach ( $valor_meta as $key => $valor ){
										echo $valor;
									} ?>
								</div><!-- datosColaborador -->
							</div><!-- colaboradorN2 -->
					<?php
					wp_reset_query();  // reset query
					endwhile;

					$id_pr = array();
					while ($my_query->have_posts()) : $my_query->the_post();
						$id_pr[] = $post->ID;
					wp_reset_query();  // reset query
					endwhile;
					?>
				</div><!-- colaboradorN2 -->
			</div><!-- contenidoTemaSobre -->

			<div class="clear"></div>

			<div id="afuera" >

			<!-- DIVS Distribucion -->

			<?php for ( $i=0; $i < count($id_dist); $i++ ){ ?>
				<div id="dist_<?php echo $id_dist[$i]; ?>" class="oculto extraCurr_3cols">
					<div class="nombreActivoCurr">
						<?php echo get_the_title($id_dist[$i]); ?>
					</div><!-- nombreActivoCurr -->
					<?php echo _e(get_post_field('post_content', $id_dist[$i])); ?>
				</div> <!-- colaborador -->
			<?php } ?>

			<!-- DIVS Administración -->

			<?php for ( $i=0; $i < count($id_admon); $i++ ){ ?>
				<div id="administrador_<?php echo $id_admon[$i]; ?>" class="oculto extraCurr_3cols">
					<div class="nombreActivoCurr">
						<?php echo get_the_title($id_admon[$i]); ?>
					</div><!-- nombreActivoCurr -->
					<?php echo _e( get_post_field('post_content', $id_admon[$i]) ); ?>
				</div> <!-- colaborador -->
			<?php } ?>

			<!-- DIVS PR -->

			<?php for ( $i=0; $i < count($id_pr); $i++ ){ ?>
				<div id="pr_<?php echo $id_pr[$i]; ?>" class="oculto extraCurr_3cols">
					<div class="nombreActivoCurr">
						<?php echo get_the_title($id_pr[$i]); ?>
					</div><!-- nombreActivoCurr -->
					<?php echo _e( get_post_field('post_content', $id_pr[$i]) ); ?>
				</div> <!-- colaborador -->
			<?php } ?>

		</div><!-- afuera -->

		</div><!-- tema2 -->

	</div><!-- bordeBlanco -->

	<div class="bordeBlanco">
		<div class="staff2cols">
			<div class = "col1">
				<div class="tituloPuesto">
					<h1>AMBULANTE</h1>
				</div><!-- tituloPuesto -->

				<?php
				$args = array(
					'post_type' 		=> 'equipo',
					'puestos' 			=> 'ambulante',
					'post_status' 		=> 'publish',
					'order' 			=> 'ASC',
					'posts_per_page'	=> -1
				);
				$my_query = new WP_Query($args);
				while( $my_query->have_posts() ) : $my_query->the_post(); ?>

					<?php
					$metabox_datos =  get_post_custom();
					if(trim($post->post_content) != '' ){ ?>
						<div class="colaboradorN2 colaborador dos_col" rel="am_<?php the_ID(); ?>">
					<?php }else{ ?>
						<div class="colaboradorN2 dos_col">
					<?php } ?>
							<div class="nombreColaborador">
								<h4><?php the_title(); ?></h4>
							</div><!-- nombreColaborador -->

							<div class="datosColaborador">
								<?php
								$valor_meta = $metabox_datos ['linea2equipo'];
								foreach ( $valor_meta as $key => $valor ){
									echo $valor;
								} ?>
							</div><!-- datosColaborador -->
						</div><!-- colaboradorN2 -->

					<?php
					wp_reset_query();
				endwhile;

				$id_am = array();
				while ($my_query->have_posts()) : $my_query->the_post();
					$id_am[] = $post->ID;
				wp_reset_query();  // reset query
				endwhile;
				?>

			</div><!-- col1 -->

			<div class = "col1">
				<div class="tituloPuesto">
					<h1>MUNDIAL</h1>
				</div><!-- tituloPuesto -->

				<?php
					$args = array(
						'post_type'   		=> 'equipo',
						'puestos'     		=> 'mundial',
						'post_status' 		=> 'publish',
						'order'       		=> 'ASC',
						'posts_per_page'  	=> -1
					);

					$my_query = new WP_Query($args);
					while( $my_query->have_posts() ) : $my_query->the_post();
						$metabox_datos =  get_post_custom();
						if(trim($post->post_content) != '' ){ ?>
							<div class="colaboradorN2 colaborador dos_col" rel="mu_<?php the_ID(); ?>">
						<?php }else{ ?>
							<div class="colaboradorN2 dos_col">
						<?php } ?>
							<div class="nombreColaborador">
								<h4><?php the_title(); ?></h4>
							</div><!-- nombreColaborador -->

							<div class="datosColaborador">
								<?php
								$valor_meta = $metabox_datos ['linea2equipo'];
								foreach ( $valor_meta as $key => $valor ){
									echo $valor;
								} ?>
							</div><!-- datosColaborador -->
						</div><!-- colaboradorN2 -->

					<?php
					wp_reset_query();
					endwhile;

				$id_mu = array();
				while ($my_query->have_posts()) : $my_query->the_post();
					$id_mu[] = $post->ID;
				wp_reset_query();  // reset query
				endwhile;
				?>

			</div><!-- col1 -->
		</div><!-- staff2cols -->

		<div class="clear"></div>

		<div id="afuera" >

			<!-- DIVS AMBULANTE -->

			<?php for ( $i=0; $i < count($id_am); $i++ ){ ?>
				<div id="am_<?php echo $id_am[$i]; ?>" class="oculto extraCurr_3cols">
					<div class="nombreActivoCurr">
						<?php echo get_the_title($id_am[$i]); ?>
					</div><!-- nombreActivoCurr -->
					<?php echo _e( get_post_field('post_content', $id_am[$i]) ); ?>
				</div> <!-- colaborador -->
			<?php } ?>

			<!-- DIVS MUNDIAL -->

			<?php for ( $i=0; $i < count($id_mu); $i++ ){ ?>
				<div id="mu_<?php echo $id_mu[$i]; ?>" class="oculto extraCurr_3cols">
					<div class="nombreActivoCurr">
						<?php echo get_the_title($id_mu[$i]); ?>
					</div><!-- nombreActivoCurr -->
					<?php echo _e( get_post_field('post_content', $id_mu[$i]) ); ?>
				</div> <!-- colaborador -->
			<?php } ?>

		</div><!-- afuera -->
	</div><!-- bordeBlanco -->


<?php get_footer(); ?>