<?php
////////////////////////////////////////////////////////////////////
// Settig Theme-options
////////////////////////////////////////////////////////////////////
include_once( trailingslashit( get_template_directory() ) . 'lib/plugin-activation.php' );
include_once( trailingslashit( get_template_directory() ) . 'lib/theme-config.php' );
require_once( trailingslashit( get_template_directory() ) . 'lib/customize-pro/class-customize.php' );

add_action( 'after_setup_theme', 'blogr_setup' );

if ( !function_exists( 'blogr_setup' ) ) :

	function blogr_setup() {

		// Theme lang
		load_theme_textdomain( 'blogr', get_template_directory() . '/languages' );

		// Add Title Tag Support
		add_theme_support( 'title-tag' );

		// Register Menus
		register_nav_menus(
		array(
			'main_menu' => __( 'Main Menu', 'blogr' ),
		)
		);

		// Add support for a featured image and the size
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300, 300, true );
		add_image_size( 'blogr_home', 500, 333, true );
		add_image_size( 'blogr_featured', 832, 300, true );
		add_image_size( 'blogr_single', 1600, 400, true );


		// Adds RSS feed links to for posts and comments.
		add_theme_support( 'automatic-feed-links' );

	}

endif;

// Display a admin notices
add_action( 'admin_notices', 'blogr_admin_notice' );

function blogr_admin_notice() {
	global $current_user;
	$blogr_pro	 = 'http://themes4wp.com/product/blogr-pro/';
	$user_id	 = $current_user->ID;
	/* Check that the user hasn't already clicked to ignore the message */
	if ( !get_user_meta( $user_id, 'blogr_ignore_notice' ) ) {
		echo '<div class="updated notice-info point-notice" style="position:relative;"><p>';
		printf( __( 'Like BlogR theme? You will <strong>LOVE BlogR PRO</strong>!', 'blogr' ) . '<a href="' . esc_url( $blogr_pro ) . '" target="_blank">&nbsp;' . __( 'Click here for all the exciting features.', 'blogr' ) . '</a><a href="%1$s" class="dashicons dashicons-dismiss dashicons-dismiss-icon" style="position: absolute; top: 8px; right: 8px; color: #222; opacity: 0.4; text-decoration: none !important;"></a>', '?blogr_notice_ignore=0' );
		echo "</p></div>";
	}
}

add_action( 'admin_init', 'blogr_notice_ignore' );

function blogr_notice_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET[ 'blogr_notice_ignore' ] ) && '0' == $_GET[ 'blogr_notice_ignore' ] ) {
		add_user_meta( $user_id, 'blogr_ignore_notice', 'true', true );
	}
}

////////////////////////////////////////////////////////////////////
// Set Content Width
////////////////////////////////////////////////////////////////////

function blogr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blogr_content_width', 800 );
}
add_action( 'after_setup_theme', 'blogr_content_width', 0 );

////////////////////////////////////////////////////////////////////
// Enqueue Styles 
////////////////////////////////////////////////////////////////////
function blogr_theme_stylesheets() {

	wp_enqueue_style( 'blogr-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1', 'all' );
	wp_enqueue_style( 'blogr-stylesheet', get_stylesheet_uri(), array(), '1', 'all' );
	// load Font Awesome css
	wp_enqueue_style( 'blogr-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
}

add_action( 'wp_enqueue_scripts', 'blogr_theme_stylesheets' );

////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
function blogr_theme_js() {
	wp_enqueue_script( 'blogr-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'blogr-theme-js', get_template_directory_uri() . '/js/customscript.js' );
}

add_action( 'wp_enqueue_scripts', 'blogr_theme_js' );


////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

require_once('lib/wp_bootstrap_navwalker.php');

////////////////////////////////////////////////////////////////////
// Theme Info page
////////////////////////////////////////////////////////////////////

if ( is_admin() ) {
	require_once(trailingslashit( get_template_directory() ) . 'lib/theme-info.php');
}

////////////////////////////////////////////////////////////////////
// Register the Sidebar(s)
////////////////////////////////////////////////////////////////////
add_action( 'widgets_init', 'blogr_widgets_init' );

function blogr_widgets_init() {
	register_sidebar(
	array(
		'name'			 => __( 'Right Sidebar', 'blogr' ),
		'id'			 => 'right-sidebar',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );

	register_sidebar(
	array(
		'name'			 => __( 'Left Sidebar', 'blogr' ),
		'id'			 => 'left-sidebar',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );

	register_sidebar(
	array(
		'name'			 => __( 'Area After First Post', 'blogr' ),
		'id'			 => 'post-area',
		'description'	 => __( 'Suitable for text widget.', 'blogr' ),
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	) );
}

////////////////////////////////////////////////////////////////////
// Register hook and action to set Main content area col-md- width based on sidebar declarations
////////////////////////////////////////////////////////////////////

add_action( 'blogr_main_content_width_hook', 'blogr_main_content_width_columns' );

function blogr_main_content_width_columns() {

	$columns = '12';

	if ( get_theme_mod( 'rigth-sidebar-check', 1 ) != 0 ) {
		$columns = $columns - absint( get_theme_mod( 'right-sidebar-size', 3 ) );
	}

	if ( get_theme_mod( 'left-sidebar-check', 0 ) != 0 ) {
		$columns = $columns - absint( get_theme_mod( 'left-sidebar-size', 3 ) );
	}

	echo $columns;
}

function blogr_main_content_width() {
	do_action( 'blogr_main_content_width_hook' );
}

if ( !function_exists( 'blogr_breadcrumb' ) ) :
	////////////////////////////////////////////////////////////////////
	// Breadcrumbs
	////////////////////////////////////////////////////////////////////
	function blogr_breadcrumb() {
		global $post, $wp_query;
		// schema link
		$home		 = esc_html__( 'Home', 'blogr' );
		$delimiter	 = ' &raquo; ';
		$homeLink	 = home_url();
		if ( is_home() || is_front_page() ) {
			// no need for breadcrumbs in homepage
		} else {
			echo '<div id="breadcrumbs" >';
			echo '<div class="breadcrumbs-inner text-right">';
			// main breadcrumbs lead to homepage
			echo '<span><a href="' . esc_url( $homeLink ) . '">' . '<i class="fa fa-home"></i><span>' . esc_attr( $home ) . '</span>' . '</a></span>' . $delimiter . ' ';
			// if blog page exists
			if ( get_page_by_path( 'blog' ) ) {
				if ( !is_page( 'blog' ) ) {
					echo '<span><a href="' . get_permalink( get_page_by_path( 'blog' ) ) . '">' . '<span>' . esc_html_x( 'Blog', 'Breadcrumbs', 'blogr' ) . '</span></a></span>' . $delimiter . ' ';
				}
			}
			if ( is_category() ) {
				$thisCat = get_category( get_query_var( 'cat' ), false );
				if ( $thisCat->parent != 0 ) {
					$category_link = get_category_link( $thisCat->parent );
					echo '<span><a href="' . $category_link . '">' . '<span>' . get_cat_name( $thisCat->parent ) . '</span>' . '</a></span>' . $delimiter . ' ';
				}
				$category_id	 = get_cat_ID( single_cat_title( '', false ) );
				$category_link	 = get_category_link( $category_id );
				echo '<span><a href="' . $category_link . '">' . '<span>' . single_cat_title( '', false ) . '</span>' . '</a></span>';
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type	 = get_post_type_object( get_post_type() );
					$slug		 = $post_type->rewrite;
					echo '<span><a href="' . esc_url( $homeLink ) . '/' . $slug[ 'slug' ] . '">' . '<span>' . $post_type->labels->singular_name . '</span>' . '</a></span>';
					echo ' ' . $delimiter . ' ' . get_the_title();
				} else {
					$category = get_the_category();
					if ( $category ) {
						foreach ( $category as $cat ) {
							echo '<span><a href="' . get_category_link( $cat->term_id ) . '">' . '<span>' . $cat->name . '</span>' . '</a></span>' . $delimiter . ' ';
						}
					}
					echo get_the_title();
				}
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_search() ) {
				$post_type = get_post_type_object( get_post_type() );
				echo $post_type->labels->singular_name;
			} elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				echo '<span><a href="' . get_permalink( $parent ) . '">' . '<span>' . $parent->post_title . '</span>' . '</a></span>';
				echo ' ' . $delimiter . ' ' . get_the_title();
			} elseif ( is_page() && !$post->post_parent ) {
				$get_post_slug	 = $post->post_name;
				$post_slug		 = str_replace( '-', ' ', $get_post_slug );
				echo '<span><a href="' . get_permalink() . '">' . '<span>' . ucfirst( $post_slug ) . '</span>' . '</a></span>';
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id	 = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page			 = get_page( $parent_id );
					$breadcrumbs[]	 = '<span><a href="' . get_permalink( $page->ID ) . '">' . '<span>' . get_the_title( $page->ID ) . '</span>' . '</a></span>';
					$parent_id		 = $page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					echo $breadcrumbs[ $i ];
					if ( $i != count( $breadcrumbs ) - 1 )
						echo ' ' . $delimiter . ' ';
				}
				echo $delimiter . '<span><a href="' . get_permalink() . '">' . '<span>' . the_title_attribute( 'echo=0' ) . '</span>' . '</a></span>';
			}
			elseif ( is_tag() ) {
				$tag_id = get_term_by( 'name', single_cat_title( '', false ), 'post_tag' );
				if ( $tag_id ) {
					$tag_link = get_tag_link( $tag_id->term_id );
				}
				echo '<span><a href="' . $tag_link . '">' . '<span>' . single_cat_title( '', false ) . '</span>' . '</a></span>';
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				echo '<span><a href="' . get_author_posts_url( $userdata->ID ) . '">' . '<span>' . $userdata->display_name . '</span>' . '</a></span>';
			} elseif ( is_404() ) {
				echo __( 'Error 404', 'blogr' );
			} elseif ( is_search() ) {
				echo esc_html__( 'Search results for', 'blogr' ) . ' ' . get_search_query();
			} elseif ( is_day() ) {
				echo '<span><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . '<span>' . get_the_time( 'Y' ) . '</span>' . '</a></span>' . $delimiter . ' ';
				echo '<span><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . '<span>' . get_the_time( 'F' ) . '</span>' . '</a></span>' . $delimiter . ' ';
				echo '<span><a href="' . get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) . '">' . '<span>' . get_the_time( 'd' ) . '</span>' . '</a></span>';
			} elseif ( is_month() ) {
				echo '<span><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . '<span>' . get_the_time( 'Y' ) . '</span>' . '</a></span>' . $delimiter . ' ';
				echo '<span><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . '<span>' . get_the_time( 'F' ) . '</span>' . '</a></span>';
			} elseif ( is_year() ) {
				echo '<span><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . '<span>' . get_the_time( 'Y' ) . '</span>' . '</a></span>';
			}
			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ' (';
				echo esc_html__( 'Page', 'blogr' ) . ' ' . get_query_var( 'paged' );
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ')';
			}
			echo '</div></div>';
		}
	}

endif;


////////////////////////////////////////////////////////////////////
// Social links
////////////////////////////////////////////////////////////////////
if ( !function_exists( 'blogr_social_links' ) ) :

	/**
	 * This function is for social links display on header
	 * Get links through Theme Options
	 */
	function blogr_social_links() {
		$twp_social_links	 = array( 
			'twp_social_facebook'	 => 'Facebook',
			'twp_social_twitter'	 => 'Twitter',
			'twp_social_google'		 => 'Google-Plus',
			'twp_social_instagram'	 => 'Instagram',
			'twp_social_pin'		 => 'Pinterest',
			'twp_social_youtube'	 => 'YouTube',
			'twp_social_reddit'		 => 'Reddit',
		);
		?>
		<div class="social-links col-sm-4">
			<ul>
				<?php
				$i					 = 0;
				$twp_links_output	 = '';
				foreach ( $twp_social_links as $key => $value ) {
					$link = get_theme_mod( $key, '' );
					if ( !empty( $link ) ) {

						$twp_links_output .=
						'<li><a href="' . esc_url( $link ) . '" target="_blank"><i class="fa fa-' . strtolower( $value ) . '"></i></a></li>';
					}
					$i++;
				}
				echo $twp_links_output;
				?>
			</ul>
		</div><!-- .social-links -->
		<?php
	}

endif;


////////////////////////////////////////////////////////////////////
// Excerpt functions
////////////////////////////////////////////////////////////////////
function blogr_excerpt_length( $length ) {
	return 25;
}

add_filter( 'excerpt_length', 'blogr_excerpt_length', 999 );

function blogr_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'blogr_excerpt_more' );
