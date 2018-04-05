<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package binge
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'binge' ); ?></a>

<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="primary-menu container">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'binge' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
			
		</nav><!-- #site-navigation -->

	<header id="masthead" class="site-header container" role="banner">
		<div class="site-branding col-lg-6 col-md-6 col-sm-12 col-xs-12">
		
		<?php if (of_get_option('logo') != "") { ?>
			<h1 class = "site-logo"> <a href = "<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<?php echo "<img class = 'logo-image' src = '".of_get_option('logo', true)."' ></a></h1>";
		    } 
		
		 else { ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			
			<?php }  ?>
		</div>
		
		<?php if (of_get_option('social')): 
			get_template_part('social'); 
		endif; ?>
		
	</header><!-- #masthead -->
	
	<?php
	if (is_home() || is_front_page()) {
	 if (of_get_option('slider-enable')) { ?>
	<ul class="bxslider">
		<?php 
		for($i = 1; $i <= 3; $i++) { 
			$s = 'slide' . $i;
			$d = 'slidetitle' . $i;
			$de= 'slidedesc' . $i;
			$u = 'slideurl' . $i;
		?>	
			<li><a href = "<?php echo of_get_option($u); ?>"><div class="slide"><div class="bx-caption"><?php printf(of_get_option($d)); ?></div><div class = 'slide-desc'><?php printf(of_get_option($de)); ?></div><img src = <?php echo of_get_option($s); ?>></div></a>
			 </li>
		<?php } ?>
	</ul>
	<?php } 
	}?>

	<div id="content" class="site-content container">
