<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>

			<div class="content_full">

				<div class="single_admin content">
				<nav class="admin_nav">
					<ul>
						<li>Analytics</li>
						<li class="active">Clientes</li>
						<li>Ventas</li>
						<li>Exportar</li>
					</ul>
				</nav>

				<div class="stats_container_admin col_10 bloque borde_general clearfix right">
					
				<h2 class="smaller">Clientes</h2>

				<form class="search_user" action="">
					<input type="text" value="Busca un Cliente" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >
					<button class="boton margin_top_10">Buscar</button>
				</form>

				<section class="two_cols inblock">
					<h3 class="title_venue">Venues</h3>
					
					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>		
					
					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>		
					
					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>		
					
					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>		
					
					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>		
					
				</section> <!-- section 2cols -->
				
				<section class="two_cols margin_left_10 inblock">
					<h3 class="title_artista">Artistas</h3>
					

					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>	
					
					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>		
					
					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>		
					
					<article class="each_cliente">
						<img src="<?php echo THEMEPATH; ?>images/mna.png" alt="MNA">
						<div class="info inblock">
							<h4>Museo Nacional de Antropología</h4>
							<a href="">contacto_venta@venue.com</a>
						</div>
					</article>		
					
				</section> <!-- section 2cols -->
					
					
					

				</div>
					

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ) ?>