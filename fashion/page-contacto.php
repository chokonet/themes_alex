<?php get_header(); ?>
		<div class="main tema_morado" id="escribenos">

			<h3 class="texto_morado"><?php _e('ESCRÍBENOS', 'fashion'); ?></h3>

		 	<form id="form_escribenos">
				<div class="campo_form">
					 <label for="edit-name"><?php _e('NOMBRE', 'fashion'); ?>:</label>
					 <input id="form-escribenos-name" name="nombre" >
				</div>
				<div class="campo_form">
					 <label for="edit-correo"><?php _e('CORREO', 'fashion'); ?>:</label>
					 <input id="form-escribenos-email" name="email" >
				</div>
				<div class="campo_form">
					 <label for="edit-mensaje"><?php _e('MENSAJE', 'fashion'); ?>:</label>
					<textarea id="form-escribenos-mensaje" name="mensaje"></textarea>
				</div>

				<div class="campo_form">
					<input class="enviar" type="submit" name="submit" value="<?php _e('ENVIAR', 'fashion'); ?>">
			    </div>
            </form>

		</div><!-- acerca de -->

		<div class="main tema_morado" id="sevicio_clientes">
			<h3 class="texto_morado"><?php _e('SERVICIOS A CLIENTES', 'fashion'); ?></h3>
			<form id="servicio-s-clientes">
				<div class="campo_form">
					 <label for="edit-name"><?php _e('NOMBRE', 'fashion'); ?>:</label>
					 <input name="nombre"  id="form-clientes-nombre">
				</div>
				<div class="campo_form">
					 <label for="edit-name"><?php _e('APELLIDO', 'fashion'); ?>:</label>
					 <input name="apellido" id="form-clientes-apellido">
				</div>
				<div class="campo_form">
					 <label for="edit-name"><?php _e('CORREO', 'fashion'); ?>:</label>
					 <input name="correo" id="form-clientes-email">
				</div>
				<div class="campo_form">
					 <label for="edit-name"><?php _e('EMPRESA', 'fashion'); ?>:</label>
					 <input name="empresa" id="form-clientes-empresa">
				</div>
				<div class="campo_form">
					 <label for="edit-name"><?php _e('PUESTO', 'fashion'); ?>:</label>
					 <input name="puesto" id="form-clientes-puesto">
				</div>
				<div class="campo_form">
					 <label for="edit-name"><?php _e('MENSAJE', 'fashion'); ?>:</label>
					<textarea name="mesaje" id="form-clientes-mensaje"></textarea>
				</div>

				<div class="campo_form">
					<input class="enviar" type="submit" name="submit" value="<?php _e('ENVIAR', 'fashion'); ?>">
			    </div>
            </form>
		</div><!-- clientes -->
<?php get_footer(); ?>