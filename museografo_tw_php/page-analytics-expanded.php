<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>

			<div class="content_full">

				<div class="single_admin content">
				<nav class="admin_nav">
					<ul>
						<li class="active">Analytics</li>
						<li>Clientes</li>
						<li>Ventas</li>
						<li>Exportar</li>
					</ul>
				</nav>

				<div class="stats_container_admin col_9b clearfix right">
					
					<article class="each_stat_admin borde_general bloque col_3 inblock margin_right_10">
						<h2>7,250</h2>
						<p>Visitas al sitio</p>
					</article><!-- each_stat_admin -->
					
					<article class="inblock graph col_6 borde_general bloque margin_left_10">
						<img src="<?php echo THEMEPATH; ?>images/graph_large.png" alt="Gráfica">
					</article><!-- graph -->
					
					<article class="graph col_9 borde_general bloque">
						<h2>Edad</h2>
						<img src="<?php echo THEMEPATH; ?>images/bar_graph.png" alt="Gráfica de barras">
					</article><!-- graph col_12 -->
					
					<article class="graph col_9 borde_general bloque">
						<h2>Género</h2>
						<img src="<?php echo THEMEPATH; ?>images/bar_graph2.png" alt="Gráfica de barras">
					</article><!-- graph col_12 -->
					
					<article class="graph col_9 borde_general bloque">
						<h2>Ciudad</h2>
						<img src="<?php echo THEMEPATH; ?>images/bar_graph3.png" alt="Gráfica de barras">
					</article><!-- graph col_12 -->
					

				</div>
					

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ) ?>