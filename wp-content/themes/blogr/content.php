<article> 
	<div <?php post_class(); ?>>                            
		<?php if ( has_post_thumbnail() ) : ?>                               
			<a href="<?php the_permalink(); ?>"><div class="featured-thumbnail col-md-5"><?php the_post_thumbnail( 'blogr_home' ); ?></div></a>                                                           
		<?php endif; ?>
		<div class="home-header col-md-7"> 
			<header>
				<h2 class="page-header">                                
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>                            
				</h2> 
				<?php get_template_part( 'template-part', 'postmeta' ); ?>
			</header>                                                      
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->                                                                                                                       
			<div class="clear"></div>                                  
			<p class="text-left">                                      
				<a class="btn btn-primary btn-md outline" href="<?php the_permalink(); ?>">
					<?php esc_html_e( 'Read more', 'blogr' ); ?> 
				</a>                                  
			</p>                            
		</div>                      
	</div>
	<div class="clear"></div>
</article>
<?php if ( $wp_query->current_post == 0 && is_active_sidebar( 'post-area' ) ) { ?>
	<div class="first-textarea">
		<?php dynamic_sidebar( 'post-area' ); ?>
	</div> 
<?php } ?>