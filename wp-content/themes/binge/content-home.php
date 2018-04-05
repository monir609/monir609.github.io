<?php
/**
 * @package binge
 */
?>

<?php
	if (of_get_option('grid', true) == 'two'): ?>
	<div class = "grid2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	
	<?php elseif(of_get_option('grid', true) == 'three'): ?>
	<div class = "grid3 col-lg-4 col-md-4 col-sm-12 col-xs-12">

	<?php else:  ?>
	<div class = "grid4 col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<?php endif; ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class('homepage-article'); ?>>
<div class = "featured-wrapper">
<div class="featured-image">

<?php if (has_post_thumbnail()) : ?>
	
	<?php the_post_thumbnail('featured-thumb'); ?></a>
<?php else: ?>
	<img src="<?php echo get_template_directory_uri()."/images/dthumb.jpg";?>"></a>
		<?php endif;?> 


<header class="entry-header">
		
		<?php 
			if (strlen(get_the_title()) >= 75) { ?>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" rel="bookmark">
		<?php echo substr(get_the_title(), 0, 74)."...";
		}
				
			else { ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php	the_title();	
			}	
				 ?>
	</a></h1>
	</header><!-- .entry-header -->
</div>
</DIV>
</article><!-- #post-## -->
</div>