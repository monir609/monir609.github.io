<!-- start content container -->
<div class="row rsrc-content">    
	<?php //left sidebar ?>    
	<?php get_sidebar( 'left' ); ?>    
	<article class="col-md-<?php blogr_main_content_width(); ?> rsrc-main">        
		<?php
		// theloop
		if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>         
				<?php
				if ( function_exists( 'blogr_breadcrumb' ) && get_theme_mod( 'breadcrumbs-check', 1 ) != 0 ) {
					blogr_breadcrumb();
				}
				?>         
				<?php if ( has_post_thumbnail() ) : ?>                                
					<div class="single-thumbnail"><?php the_post_thumbnail( 'blogr_single' ); ?></div>                                     
					<div class="clear">
					</div>                            
				<?php endif; ?>          
				<div <?php post_class( 'rsrc-post-content' ); ?>>                            
					<header>                              
						<h1 class="entry-title page-header">
							<?php the_title(); ?>
						</h1>                              
						<?php get_template_part( 'template-part', 'postmeta' ); ?>                            
					</header>                            
					<div class="entry-content">                              
						<?php the_content(); ?>                            
					</div>                               
					<?php wp_link_pages(); ?> 
					<?php get_template_part( 'template-part', 'posttags' ); ?>
					<?php if ( get_theme_mod( 'post-nav-check', 1 ) == 1 ) : ?>                            
						<div class="post-navigation row">
							<div class="post-previous col-md-6"><?php previous_post_link( '%link', '<span class="meta-nav">' . __( 'Previous:', 'blogr' ) . '</span> %title' ); ?></div>
							<div class="post-next col-md-6"><?php next_post_link( '%link', '<span class="meta-nav">' . __( 'Next:', 'blogr' ) . '</span> %title' ); ?></div>
						</div>                             
					<?php endif; ?>                            
					<?php if ( get_theme_mod( 'related-posts-check', 1 ) == 1 ) : ?>
						<?php get_template_part( 'template-part', 'related' ); ?>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'author-check', 1 ) == 1 ) : ?>                               
						<?php get_template_part( 'template-part', 'postauthor' ); ?> 
					<?php endif; ?>                              
					<?php comments_template(); ?>                         
				</div>        
			<?php endwhile; ?>        
		<?php else: ?>            
			<?php get_404_template(); ?>        
		<?php endif; ?>    
	</article>    
	<?php //get the right sidebar   ?>    
	<?php get_sidebar( 'right' ); ?>
</div>
<!-- end content container -->