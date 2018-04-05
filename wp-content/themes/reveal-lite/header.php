 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Reveal Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header">
	<div class="header-inner">
      <div class="logo">
       <?php reveal_lite_the_custom_logo(); ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_attr($description); ?></p>
					<?php endif; ?>
    </div><!-- .logo -->                 
    <div class="header_right">
        	<div id="navigation">
    	<div class="toggle">
            <a class="toggleMenu" href="#">
                <?php esc_html_e('Menu','reveal-lite'); ?>                
            </a>
    	</div><!-- toggle -->    
    <div class="sitenav">                   
   	 	<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>   
    </div><!--.sitenav -->
    <div class="clear"></div>
</div><!-- navigation -->
	
    </div><!--header_right-->    
 <div class="clear"></div>
</div><!-- .header-inner-->
</div><!-- .header -->
