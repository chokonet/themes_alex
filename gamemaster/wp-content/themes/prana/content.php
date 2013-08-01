<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  
  <div class="entry-meta">    
	
  </div><!-- .entry-meta -->
  
  <?php prana_featured_image(); ?>
  
  <div class="entry-content clearfix">	
	<?php prana_post_style(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo prana_link_pages(); ?>
  
  <div class="entry-meta-bottom">    
  <?php echo prana_post_category() . prana_post_tags(); ?>    
  </div><!-- .entry-meta-bottom -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->