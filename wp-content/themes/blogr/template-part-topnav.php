<div class="row rsrc-top-menu" >
	<nav id="site-navigation" class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
				<span class="sr-only"><?php _e( 'Toggle navigation', 'blogr' ); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="visible-xs navbar-brand"><?php esc_html_e( 'Menu', 'blogr' ); ?></div>
		</div>

		<?php
		wp_nav_menu( array(
			'theme_location'	 => 'main_menu',
			'depth'				 => 3,
			'container'			 => 'div',
			'container_class'	 => 'collapse navbar-collapse navbar-1-collapse',
			'menu_class'		 => 'nav navbar-nav',
			'fallback_cb'		 => 'wp_bootstrap_navwalker::fallback',
			'walker'			 => new wp_bootstrap_navwalker() )
		);
		?>

	</nav>
</div>

<?php if ( get_theme_mod( 'blogr_socials', 0 ) == 1 || get_theme_mod( 'infobox-text', '' ) != '' ) : ?>
	<div class="top-section row">
		<div class="top-infobox col-sm-8">
			<?php
			if ( get_theme_mod( 'infobox-text', '' ) != '' ) {
				echo wp_kses_post( get_theme_mod( 'infobox-text' ) );
			}
			?> 
		</div>
		<?php
		if ( get_theme_mod( 'blogr_socials', 0 ) == 1 ) {
			blogr_social_links();
		}
		?>                 
	</div>
<?php endif; ?>
