<?php get_header(); $estado = isset( $_GET['estado'] ) ? $_GET['estado'] : false; ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
<script type="text/javascript">
  
    $(document).ready(function() {
        if($('#location-map')) {
            $('#location-map area').each(function() {
                var id = $(this).attr('id');
                $(this).mouseover(function() {
                    $('#e_'+id).show();
                    
                });
                
                $(this).mouseout(function() {
                    var id = $(this).attr('id');
                    $('#e_'+id).hide();
                });
            
            });
        }
    });
</script>
<div class="cont_map">
		<div class="centros_cont_map">
	  <!--overs-->
	<img src="<?php bloginfo('template_url'); ?>/images/veracruz.png" id="e_ver"/>
	<img src="<?php bloginfo('template_url'); ?>/images/puebla.png" id="e_pue"/>
	<img src="<?php bloginfo('template_url'); ?>/images/michoacan.png" id="e_mich"/>
	<img src="<?php bloginfo('template_url'); ?>/images/edomex.png" id="e_edo"/>
	<img src="<?php bloginfo('template_url'); ?>/images/hidalgo.png" id="e_hid"/>
	<img src="<?php bloginfo('template_url'); ?>/images/chiapas.png" id="e_chi"/>
	<img src="<?php bloginfo('template_url'); ?>/images/oaxaca.png" id="e_oax"/>

	<img src="<?php bloginfo('template_url'); ?>/images/over.png" name="mexico" usemap="#bebe1" id="mapa_mx" border=0 />
	<img src="<?php bloginfo('template_url'); ?>/images/mapa_mexico.jpg" width="605" height="450" border="0" />
	<MAP NAME="bebe1" id="location-map">


	 <area shape=poly coords="245,327,249,324,252,324,255,319,262,322,265,320,267,323,267,330,271,330,275,330,278,326,285,326,286,321,282,318,281,314,282,312,276,310,277,307,282,307,297,300,297,292,303,281,303,277,304,271,297,268,292,274,286,274,286,268,281,269,285,277,281,281,276,282,275,287,263,284,263,277,267,276,267,270,275,263,271,260,266,266,264,259,262,262,262,256,259,254,258,257,260,259,253,261,252,262,252,266,255,270,254,277,257,280,252,285,252,292,243,288,236,290,235,295,234,298,227,299,229,309,240,325" href="#" alt="JAL">
	  <area shape=poly coords="203,193,210,191,214,189,217,185,217,179,218,178,223,172,235,178,250,180,256,174,265,174,273,182,271,192,270,203,274,208,281,213,285,207,287,214,287,219,271,220,263,226,262,236,257,240,252,261,250,260,246,258,240,257,240,251,237,247,232,247,228,242,227,236,223,230,224,224,218,220,211,219,210,214,203,207" href="#" alt="DUR">
	  <area shape=poly coords="360,259,365,259,373,260,378,276,383,280,385,287,386,291,403,314,407,326,415,333,429,334,432,337,437,338,441,344,443,346,449,343,450,346,450,348,453,350,457,355,459,358,454,363,436,363,432,361,431,359,429,358,429,354,418,358,415,353,417,348,415,346,410,346,407,345,406,340,403,337,399,337,396,339,396,338,393,338,391,337,390,336,388,334,387,334,386,331,389,331,390,329,389,327,388,326,391,325,390,322,387,321,385,319,385,315,387,314,386,310,389,306,384,302,382,304,378,302,376,298,380,298,381,296,378,294,376,293,376,292,374,291,373,293,373,296,373,298,372,298,371,295,370,294,362,299,362,296,362,293,363,290,367,291,368,286,366,283,362,282,362,280,361,277,361,275,360,274,361,270,361,268,361,267,362,266,363,264,363,262,362,261" href="<?php echo site_url('organizaciones_comunitarias'); ?>?estado=veracruz" alt="VER" id="ver">
	  <area shape=poly coords="347,327,346,328,346,332,342,336,347,340,349,340,353,343,355,340,359,340,359,330,354,329,349,328" href="#" alt="MOR">
	  <area shape=poly coords="35,37,77,38,70,52,75,58,72,74,74,93,96,120,101,131,103,138,79,136,81,126,51,94,49,84,45,71,34,41" href="#" alt="BCN" tooltip="Baja California Norte">
	  <area shape=poly coords="348,318,351,319,354,323,354,328,351,329,349,327,347,326,347,322" href="#" alt="DF">
	  <area shape=poly coords="459,358,463,353,466,346,472,348,471,350,473,354,475,358,483,350,488,348,491,347,494,347,495,349,496,354,498,354,502,358,504,359,510,364,515,368,518,372,523,374,522,382,496,382,489,400,493,405,491,407,491,417,478,407,477,404,451,384,450,378,450,373,453,365,456,360" href="<?php echo site_url('organizaciones_comunitarias'); ?>?estado=chiapas" alt="CHIS"  id="chi">
	  <area shape=poly coords="338,155,341,157,339,160,342,163,342,168,349,179,353,180,357,183,362,183,367,187,375,187,379,189,384,187,385,190,385,192,383,198,379,200,374,203,374,208,376,210,374,220,375,252,373,257,374,261,365,260,358,260,352,261,348,260,345,256,340,257,333,252,335,247,331,243,332,240,337,239,337,234,339,233,342,229,339,226,339,218,348,211,349,206,354,206,361,198,357,192,357,187,353,187,349,185,346,180,342,179,343,175,339,174,339,171,338,170,338,159,335,157" href="#" alt="TAM">
	  <area shape=poly coords="164,178,161,186,162,191,169,195,184,204,186,213,194,215,196,223,201,226,220,251,226,258,230,258,230,252,232,246,227,242,227,236,223,230,224,226,218,220,212,220,210,215,203,208,202,203,203,194,190,181,187,168,180,164" href="#" alt="SIN">
	  <area shape=poly coords="286,267,286,274,288,274,292,275,297,268,296,265,290,260,287,263,286,263" href="#" alt="AGS">
	  <area shape=poly coords="286,208,297,207,303,212,310,213,315,216,317,218,308,226,291,244,293,247,293,251,300,260,303,258,307,258,307,263,306,268,304,271,298,268,296,263,290,260,287,263,286,263,285,265,286,267,286,268,281,270,283,274,285,277,281,282,276,282,275,287,263,284,263,278,267,277,267,272,275,264,272,260,266,267,265,259,262,262,262,259,262,256,260,254,258,258,260,260,252,262,253,258,256,240,262,236,262,226,271,220,286,218,287,213" href="#" alt="ZAC">
	  <area shape=poly coords="294,351,295,348,299,345,299,341,301,340,305,342,313,341,320,342,319,335,323,334,328,341,333,338,338,339,339,336,343,337,347,340,349,340,351,340,353,343,353,346,359,350,365,350,367,353,366,360,367,363,370,367,373,369,373,372,373,377,372,377,368,383,364,383,359,381,338,376,335,371,329,371,312,364,297,351" href="#" alt="GUE">
	  <area shape=poly coords="235,294,229,292,234,287,235,278,231,276,227,267,228,263,231,266,229,260,229,258,230,256,230,252,232,247,237,247,240,251,240,256,245,258,249,260,252,261,252,266,255,271,254,277,258,280,253,285,252,293,243,288,236,290" href="#" alt="NAY">
	  <area shape=poly coords="262,337,267,344,292,352,294,351,295,348,299,345,298,342,300,340,306,341,314,341,321,342,319,335,322,334,331,321,331,314,332,311,328,307,324,312,320,310,318,311,314,308,307,308,306,304,303,302,301,304,297,304,296,301,282,307,277,308,277,310,281,311,281,318,285,321,285,325,279,325,275,330,267,330" href="<?php echo site_url('organizaciones_comunitarias'); ?>?estado=michoacan" alt="MICH" id="mich">
	  <area shape=poly coords="246,326,259,334,261,337,264,334,266,331,267,329,266,322,264,320,261,322,255,320,252,324" href="#" alt="COL">
	  <area shape=poly coords="303,271,308,271,310,273,315,272,321,278,326,276,338,279,338,282,338,285,334,285,331,290,325,291,322,295,328,306,324,312,320,309,318,311,314,308,307,308,306,304,303,302,301,305,297,304,296,301,297,299,296,292,303,281,303,274" href="#" alt="GUA">
	  <area shape=poly coords="338,304,338,298,341,296,341,292,346,289,346,285,351,285,351,282,355,285,360,283,362,280,363,284,367,284,369,287,368,289,368,292,363,292,362,293,362,296,362,299,362,301,371,295,372,299,370,301,370,305,370,308,368,311,369,315,366,316,361,316,360,313,354,313,353,310,351,310,348,311,346,313" href="<?php echo site_url('organizaciones_comunitarias'); ?>?estado=hidalgo" alt="HGO" id="hid">
	  <area shape=poly coords="336,150,338,155,335,158,338,160,338,170,339,172,339,174,343,175,343,180,347,181,349,185,354,187,357,187,358,193,361,198,353,206,349,206,348,212,339,217,339,226,342,229,339,233,337,234,336,239,332,241,332,243,325,244,325,235,322,230,322,226,318,217,318,209,318,206,325,202,318,191,317,188,312,180,318,175,322,172,321,168,318,166,318,162,325,157,329,152" href="#" alt="NUE">
	  <area shape=poly coords="274,125,278,125,283,118,286,110,291,110,293,108,298,110,305,110,320,124,328,141,336,152,332,155,329,152,325,156,324,158,318,163,319,167,322,168,322,172,319,175,317,175,311,180,318,188,318,192,325,202,318,206,319,209,318,217,314,216,310,213,303,212,297,207,285,207,280,212,270,203,273,182,266,174,263,147" href="#" alt="COA">
	  <area shape=poly coords="79,137,103,138,115,158,124,169,126,182,131,191,135,206,135,216,142,217,150,225,159,240,148,247,109,201,107,177,85,164,63,141,81,143" href="#" alt="BCS" class="BCS">
	  <area shape=poly coords="74,43,139,72,176,76,178,138,169,138,176,155,176,162,179,166,164,178,163,174,160,170,153,170,152,164,143,157,141,145,136,145,131,139,127,132,120,127,118,123,115,118,115,113,112,110,106,100,106,93,104,89,101,84,101,79,102,73,98,72,90,65,85,66,75,58,70,52" href="#" alt="SON">
	  <area shape=poly coords="317,217,322,226,321,230,325,234,325,244,331,244,335,247,333,252,340,256,345,256,349,260,360,260,363,263,363,266,361,268,362,271,360,276,362,278,362,281,360,283,355,285,351,282,348,277,343,279,339,277,338,279,325,276,321,278,315,273,310,273,308,271,304,271,306,268,307,263,307,258,303,257,300,259,293,251,293,247,291,243,309,226" href="#" alt="SLP">
	  <area shape=poly coords="360,321,362,321,369,327,373,326,375,326,379,322,375,321,374,317,373,315,370,315,368,314,368,310,371,307,371,301,373,298,373,293,374,292,377,294,380,297,377,302,379,305,383,304,386,305,389,307,386,310,386,314,384,317,385,321,388,323,390,324,389,327,388,328,389,330,387,332,386,335,391,338,393,338,396,340,396,344,393,346,388,347,385,349,379,344,378,350,373,350,372,350,367,351,363,349,359,349,354,345,353,342,355,340,358,340,359,330,360,324" href="<?php echo site_url('organizaciones_comunitarias'); ?>?estado=puebla" alt="PUE" id="pue">
	  <area shape=poly coords="361,321,360,315,365,316,368,315,371,315,373,316,374,316,375,319,375,321,380,322,375,326,372,327,370,328,363,322" href="#" alt="TLA">
	  <area shape=poly coords="449,343,450,346,450,347,453,350,458,358,464,352,466,346,472,350,475,357,482,351,493,347,496,353,504,358,510,358,511,345,502,343,494,344,486,339,485,335,481,332,467,338,454,339" href="#" alt="TAB">
	  <area shape=poly coords="177,74,188,74,189,67,218,68,245,93,249,101,249,108,263,119,274,125,262,148,266,174,256,173,250,180,235,178,228,174,223,171,218,178,216,180,216,185,214,189,204,192,191,180,187,168,182,164,178,165,175,154,170,138,178,138,180,96" href="#" alt="CHI">
	  <area shape=poly coords="480,331,484,330,488,330,491,330,489,333,493,335,495,335,500,333,503,329,500,326,511,314,512,307,517,301,515,290,517,281,518,287,522,288,523,291,526,290,526,288,528,288,529,292,529,293,532,293,534,296,534,300,544,313,544,320,544,330,544,336,544,339,544,344,510,346,509,343,506,343,501,342,498,342,495,344,493,344,488,340,487,337,486,335" href="#" alt="CAM">
	  <area shape=poly coords="541,307,544,312,544,330,544,340,547,339,551,340,556,334,556,329,561,327,565,322,565,328,569,331,568,335,571,327,572,322,575,315,575,311,572,312,572,310,575,307,576,305,571,304,570,302,573,300,575,300,575,293,576,291,579,285,580,281,583,277,585,273,585,267,579,262,576,264,573,266,571,266,569,268,569,271,573,271,574,273,572,276,570,278,571,281,569,284,567,285,567,287,563,287,562,290,558,291,556,291,551,293,549,296,547,301,544,305" href="#" alt="QROO">
	  <area shape=poly coords="517,281,518,286,521,287,523,290,526,287,528,287,529,289,529,292,531,293,535,296,534,300,541,308,544,304,546,300,549,297,551,294,554,293,559,291,562,290,564,286,568,287,568,283,571,283,570,276,574,274,574,271,569,272,569,271,569,268,570,268,571,266,552,265,549,268,529,273" href="#" alt="YUC">
	  <area shape=poly coords="323,334,328,342,334,338,338,338,339,336,342,337,346,332,346,328,348,327,347,324,348,321,348,318,351,319,352,320,354,323,354,326,354,328,355,330,360,330,360,315,359,313,354,313,353,311,350,310,346,313,338,305,331,309,331,321" href="<?php echo site_url('organizaciones_comunitarias'); ?>?estado=estado-de-mexico" alt="MEX" id="edo">
	  <area shape=poly coords="364,383,369,385,378,391,392,391,401,397,407,397,424,390,435,381,437,380,439,382,442,383,444,382,446,382,451,383,451,381,450,376,451,373,452,369,454,363,435,363,431,360,429,358,428,354,418,357,414,352,416,349,416,347,411,345,407,345,402,337,399,337,396,339,396,342,394,344,390,346,388,346,385,348,381,346,378,343,378,348,375,349,373,349,369,350,368,351,367,357,366,360,369,363,371,367,373,369,373,376,369,381" href="<?php echo site_url('organizaciones_comunitarias'); ?>?estado=oaxaca" alt="OAX" id="oax">
	  <area shape=poly coords="332,310,329,306,322,294,325,290,332,290,334,285,338,285,338,282,338,279,339,278,342,279,348,276,351,282,351,285,346,285,346,289,341,292,341,296,338,298,338,304" href="#" alt="QRO">
	</MAP>
				
	</div><!-- izquierda -->
	
	<div class="cont_map">
		<span>
			<?php if ($estado == 'estado-de-mexico'):
					echo 'Estado de Mexico';
				  else:
				  	echo $estado;
				  endif;
			?>
	    </span>
		<?php if ($estado != ""):?>
		
			<?php 

			 $args = array( 'posts_per_page' => -1,	
					        'post_type'      => 'centros',
					        'tax_query'      => array(
					  array(
							 'taxonomy' => 'centros_comunitarios_estados',
							 'field'    => 'slug',
							 'terms'    => $estado
			     				)
							)
					);
			  query_posts($args);
			  while( have_posts() ) : the_post(); ?>
								
				<h2><?php the_title(); ?></h2>
				<p><?php the_content();?></p>
						
			  <?php endwhile;  ?>

		<?php endif; ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>