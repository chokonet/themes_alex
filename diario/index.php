<?php get_header();

	global $current_user; get_currentuserinfo(); ?>

	<div class="tema_seccion">
		 <p class="verde uppercase albumWrapper h	idden" id="titulo-temaB">0-6 MESES</p>
		 <p class="rosaTema uppercase albumWrapper hidden" id="titulo-temaC">6-12 MESES</p>
		 <p class="anaraTema regresar-albums uppercase albumWrapper hidden" id="titulo-temaD">1-3 AÑOS</p>
	</div>

	<div class="content cf">

		<?php get_template_part( 'templates/alertas', 'embarazo' ); ?>

		<section id="albums">

			<div class="labelContainer">
				<p class="pink uppercase">EL DIARIO DE MI BEBÉ</p>
			</div>

			<p class="blue description">
				Aquí podrás tener un álbum de los momentos más importantes de la vida de tu pequeño.
				Haz clic en los cuadritos para subir una imagen o crea tus propios logros haciendo clic en “agregar”.
				Puedes navegar las distintas etapas moviendo el slider de abajo.
			</p>

			<div class="timeline">
				<div id="ageSlider"></div>
				<div class="ageSliderbg rounded"></div>
				<ul>
					<li class="pink">Embarazo</li>
					<li class="pink">0-6 meses</li>
					<li class="pink">6-12 meses</li>
					<li class="pink ultimo_elemento">1-3 años</li>
				</ul>
			</div><!-- timeline -->

			<?php get_template_part( 'templates/diario', 'gallery-a' );
				  get_template_part( 'templates/diario', 'gallery-b' );
				  get_template_part( 'templates/diario', 'gallery-c' );
				  get_template_part( 'templates/diario', 'gallery-d' ); ?>

			<a class="nuevo_logro"><p class="etiqueta rounded drop" id="bt-agregar-logro">+ Agregar otro logro</p></a>

		</section>

		<?php get_template_part( 'templates/cambiar-foto/logro', 'cambiar' ); ?><!-- cambiarfoto logro paso1 -->
		<?php get_template_part( 'templates/cambiar-foto/logro', 'facebook' ); ?><!-- cambiarfoto desde-facebook -->
		<?php get_template_part( 'templates/cambiar-foto/logro', 'computadora' ); ?><!-- cambiarfoto desde-facebook -->

		<div class="centerDiv">
			<div class="labelContainer"><p class="pink uppercase">¿Lista para compartir sus logros con el mundo?</p></div>
			<div class="pinkBtn button rounded white drop" id="bt-compartir-album">Compartir álbum</div>
		</div>

	</div><!-- content -->

<?php get_footer(); ?>