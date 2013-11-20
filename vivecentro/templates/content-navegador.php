<ul>
	<li class="recorridos <?php nav_is('recorridos'); echo ( is_home() ) ? 'active' : ''; ?>"><h2><a href="<?php echo site_url('recorridos'); ?>">Recorridos</a></h2></li>
	<li class="zonas <?php nav_is('zonas'); ?>"><h2><a href="<?php echo site_url('zonas'); ?>">Zonas</a></h2></li>
	<li class="actividades <?php nav_is('actividades'); ?>"><h2><a href="<?php echo site_url('actividades'); ?>">Actividades</a></h2></li>
	<li class="lugares <?php nav_is('lugares'); ?>"><h2><a href="<?php echo site_url('lugares'); ?>">Lugares</a></h2></li>
</ul>