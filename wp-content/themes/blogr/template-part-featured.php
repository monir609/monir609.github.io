<?php
$get_featured_posts = new WP_Query( array(
	'posts_per_page' => 2,
	'post_type'		 => 'post',
	'category__in'	 => get_theme_mod( 'featured-categories' )
) );
while ( $get_featured_posts->have_posts() ) : $get_featured_posts->the_post();
	?>
	<article class="featured-article col-md-6"> 
		<div <?php post_class( 'home-featured' ); ?>>                            
			<?php if ( has_post_thumbnail() ) : ?>                               
				<div class="featured-thumbnail"><?php the_post_thumbnail( 'blogr_featured' ); ?></div>                                                           
			<?php endif; ?>
			<div class="home-header"> 
				<header>
					<h2 class="page-header">                                
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>                            
					</h2> 
				</header>
				<div class="entry-summary hidden-xs">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->                                                                                                                                                                                                                                          
			</div>                      
		</div>
	</article>
	<?php
endwhile;
// Reset Post Data
wp_reset_postdata();
