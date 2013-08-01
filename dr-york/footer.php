</div><!-- container -->
<div class="clear">
</div>

		<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.pause.min.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/froogaloop.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.backstretch.min.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.masonry.min.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.cycle.all.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/cookie.js"></script>

		<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.scrollTo-1.4.2-min.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.tinycarousel.min.js"></script>
		<script src="<?php echo get_bloginfo('template_url'); ?>/js/jQuery.BlackAndWhite.min.js"></script>

		<script src="<?php echo get_bloginfo('template_url'); ?>/js/functions.js" type="text/javascript"></script>

		<?php  if (!is_single() && !is_page()):  ?>

			<script type="text/javascript">
			   jQuery(document).ready(function($) {
			        var count = 2; //número de la página a cargar, empieza en 2 porque se usa la función desde la segunda página
			        var total = <?php  $published_posts = wp_count_posts('gente'); //Número total de posts tipo GENTE
			        					echo ceil($published_posts->publish/40); //Número de páginas = Número de posts / Post por página redondeado ?>; //toma el número total de páginas que hay
			        $(window).load(function(){

		                $('.persona').BlackAndWhite({
		                    hoverEffect:true
		                });
		            });
			        $(window).scroll(function(){
			                if  ($(window).scrollTop() == $(document).height() - $(window).height()){ //Checa si ya llegaste al final de la ventana
			                   if (count > total){ //checa si ya estás en la última página para no seguir cargando
			                   	  	return false;
			                   }else{
			                   		loadArticle(count); //Carga los siguientes posts
			                   }
			                   count++; //Cambia el número de la página
			                }
			        });
			        function loadArticle(pageNumber){
			                $('a#inifiniteLoader').fadeIn('5000'); //Muestra el loader de ajax que se puso
			                $.ajax({
			                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php", //Manda llamar el ajax de WP
			                    type:'POST', //Tipo de llamado, POST o GET
			                    data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop-gente', //mana los parámetros de la acción a realizar, el número de página y el archivo de loop a cargar
			                    success: function(html){
			                        $('a#inifiniteLoader').fadeOut('5000'); //Esconde el AJAX loader
			                        $('#grid').append(html);    // Pone los nuevos posts en este div
			                        $('a.mouse .small').on("load",function (){
										$(this).parent().BlackAndWhite({
											hoverEffect: true,
											 speed: { //this property could also be just speed: value for both fadeIn and fadeOut
									            fadeIn: 200, // 200ms for fadeIn animations
									            fadeOut: 800 // 800ms for fadeOut animations
									        }
										});
									});
			                    }
			                });
			            return false;
			        }

			    });
			</script>
		<?php elseif(is_page('blog')): ?>
			<script type="text/javascript">
			    jQuery(document).ready(function($) {
			        var count = 2;
			        var total = <?php  $published_posts = wp_count_posts();
			        			echo ceil($published_posts->publish/3); ?>;
			        //console.log(count);
			        //console.log(total);

			        $(window).scroll(function(){
		                if  ($(window).scrollTop() == $(document).height() - $(window).height()){

		                   if (count > total){
		                   	  	return false;
		                   }else{
		                   		loadArticle(count);
		                   }
		                   count++;
		                }
			        });

			        function loadArticle(pageNumber){
		                $('a#inifiniteLoader').fadeIn('5000');
		                $.ajax({
		                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php",
		                    type:'POST', //Tipo de llamado, POST o GET
		                    data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop-blog',
		                    success: function(html){
		                        $('a#inifiniteLoader').fadeOut('5000');
		                        $('.entrada').append(html);
		                    }
		                });
		            	return false;
			        }
			    });
			</script>
		<?php endif; ?>
	</body>
</html>