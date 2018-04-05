<?php
/**
 * binge functions and definitions
 *
 * @package binge
 */



if ( ! function_exists( 'binge_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
 
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
require_once get_template_directory() . '/options.php';
 
function binge_setup() {

		/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	 global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 800; /* pixels */
	}
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on binge, use a find and replace
	 * to change 'binge' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'binge', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('featured-thumb',496,400,true);
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'binge' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'binge_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	add_editor_style('editor-style.css');
}
endif; // binge_setup
add_action( 'after_setup_theme', 'binge_setup' );

function binge_headcode() {
	if ( (function_exists( 'of_get_option' )) && (of_get_option('style2', true) != 1) ) {
	echo "<style>".of_get_option('style2', true)."</style>";
	}
}
add_action('wp_head','binge_headcode');

/**
 * Add title tag.
**/
add_theme_support( 'title-tag' );

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function binge_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'binge_render_title' );
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function binge_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'binge' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'binge' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Center', 'binge' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'binge' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'binge_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function binge_scripts() {
	wp_enqueue_style( 'binge-style', get_stylesheet_uri() );
	 global $opt_binge;
	if (of_get_option('layout') == 'right') {
		wp_enqueue_style('binge-layout',get_template_directory_uri()."/css/layout/content-sidebar.css");
	}
	else 
	{
		wp_enqueue_style('binge-layout',get_template_directory_uri()."/css/layout/sidebar-content.css");
	}
	
	
	wp_enqueue_style('binge-bootstrap-style',get_template_directory_uri()."/css/bootstrap/bootstrap.min.css", array('binge-layout'));

	wp_enqueue_style('binge-main-skin', get_template_directory_uri()."/css/skins/main.css",array('binge-bootstrap-style'));
		
	wp_enqueue_style('bx-slider-default-theme-skin', get_template_directory_uri(). "/css/slider/jquery.bxslider.css", array('binge-main-skin'));
	
	wp_enqueue_script( 'binge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'binge-js', get_template_directory_uri() . '/js/jquery-1.11.2.js', array('jquery'));
	
	wp_enqueue_script( 'binge-slider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), true );

	wp_enqueue_script( 'binge-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function binge_initialize_header() {

	echo "<script>"; ?>
	
		$(document).ready(function(){
		  $('.bxslider').bxSlider({
		  mode: 'fade',
		  adaptiveHeight: true,
		  captions: true
		 });
		});	
		
	<?php
	
	echo "</script>";
	
} 

add_action('wp_head', 'binge_initialize_header');

function binge_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination clearfix"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
}}


add_action( 'wp_enqueue_scripts', 'binge_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


