<!-- reutilizando el código de prensa para el lightbox/slider de gente -->
<style> 
	body{
		margin: 0px;
		padding: 0px;
		border: none;
		background: transparent;
	}
	
	#gente_single{
		width: auto;
		height: 90%;
		margin: 0 auto;
		overflow: hidden;
		position: relative;
		padding-bottom: 15px;
	}
	
	#gente_single #titulo_gente{
		color: #fff;
		font-family: 'Conv_ClarendonLTStd-Light', Georgia, "Times New Roman", Times, serif;
		font-size: 16px;
		width: 70%;
		display: block;
		margin: 12px auto;
		text-align: center;
	}
	
	#gente_single .articulo_gente{
		float: right;
		left: -50%;
		position: relative;
		margin-bottom: 12px;
	}
	
	#gente_single img{
		height: 97.5% !important;
		max-height: 426px;
		max-width: 640px;
		width: auto;
		display: block;
		margin: 0 auto;
	}
</style> <!-- fin del código de prensa -->

<div id="gente_single"> <!-- inicio contendedor prensa -->
	<?php while ( have_posts() ) : the_post(); ?>
		<h4 id="titulo_gente"><?php the_title(); ?></h4>
		
			<?php the_post_thumbnail('gente'); ?>
		
	<?php endwhile; ?>
</div> <!-- fin contenedor prensa -->