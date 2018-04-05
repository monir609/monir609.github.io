<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package binge
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div id="footer-sidebar" class="widget-area clear container" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php 
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
		<div class="footer-column col-lg-4 col-md-4"> <?php
			dynamic_sidebar( 'sidebar-2'); 
		?> </div> <?php	
		}
			
		if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
		<div class="footer-columncol-lg-4 col-md-4"> <?php
			dynamic_sidebar( 'sidebar-3'); 
		?> </div> <?php	
		}

		if ( is_active_sidebar( 'sidebar-4' ) ) { ?>
		<div class="footer-columncol-lg-4 col-md-4"> <?php
			dynamic_sidebar( 'sidebar-4'); 
		?> </div> <?php	
		}
		?>	 		


	</div>
		<div class="site-info container">
			<?php $a = 'www/divjot.co/'; ?>
			<?php printf( __( 'Theme %1$s by %2$s.', 'binge' ), 'binge', '<a href= '.esc_url($a).' rel="designer">Divjot Singh</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
