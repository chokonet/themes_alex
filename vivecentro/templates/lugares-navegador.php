					<div class="navegador lugares" >

						<?php get_template_part('templates/content', 'navegador'); ?>
						<div id="grid-lugares" class="clearfix">
							<div id="destacados" class="lugar-icon <?php echo where_am_i('categorias', 'destacados') ? 'active' : '' ; ?>">
								<a href="<?php bloginfo('url'); ?>/categorias/destacados"></a>
							</div><!-- end .lugar-icon -->
							<div id="compras" class="lugar-icon <?php echo where_am_i('categorias', 'comercial') ? 'active' : '' ; ?>">
								<a href="<?php bloginfo('url'); ?>/categorias/comercial"></a>
							</div><!-- end .lugar-icon -->
							<div id="monumentos" class="lugar-icon <?php echo where_am_i('categorias', 'identidad-historica') ? 'active' : '' ; ?>">
								<a href="<?php bloginfo('url'); ?>/categorias/identidad-historica"></a>
							</div><!-- end .lugar-icon -->
							<div id="culturales" class="lugar-icon <?php echo where_am_i('categorias', 'cultural') ? 'active' : '' ; ?>">
								<a href="<?php bloginfo('url'); ?>/categorias/cultural"></a>
							</div><!-- end .lugar-icon -->
							<div id="plazas" class="lugar-icon <?php echo where_am_i('categorias', 'plazas-y-parques') ? 'active' : '' ; ?>">
								<a href="<?php bloginfo('url'); ?>/categorias/plazas-y-parques"></a>
							</div><!-- end .lugar-icon -->
							<div id="alimentos" class="lugar-icon <?php echo where_am_i('categorias', 'alimentos') ? 'active' : '' ; ?>">
								<a href="<?php bloginfo('url'); ?>/categorias/alimentos"></a>
							</div><!-- end .lugar-icon -->
						</div><!-- end #grid-lugares -->

					</div>