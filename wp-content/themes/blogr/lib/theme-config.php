<?php
/**
 * Kirki Advanced Customizer
 * @package blogr
 */

// Early exit if Kirki is not installed
if ( ! class_exists( 'Kirki' ) ) {
	return;
}
  /* Register Kirki config */
  Kirki::add_config( 'blogr_settings', array(
    'capability'    => 'edit_theme_options',
    'option_type' => 'theme_mod',
  ) );

	/**
	 * Add sections
	 */
	Kirki::add_section( 'sidebar_section', array(
		'title'       => __( 'Sidebars', 'blogr' ),
		'priority'    => 10,
		'description' => __( 'Sidebar layouts.', 'blogr' ),
	) );

	Kirki::add_section( 'layout_section', array(
		'title'       => __( 'Main styling', 'blogr' ),
		'priority'    => 10,
		'description' => __( 'Define theme layout', 'blogr' ),
	) );

	Kirki::add_section( 'top_bar_section', array(
		'title'       => __( 'Top Bar & Social icons', 'blogr' ),
		'priority'    => 10,
		'description' => __( 'Top bar text and social icons.', 'blogr' ),
	) );
	
	Kirki::add_section( 'post_section', array(
		'title'       => __( 'Post settings', 'blogr' ),
		'priority'    => 10,
		'description' => __( 'Single post settings', 'blogr' ),
	) );
	
	Kirki::add_section( 'site_bg_section', array(
		'title'       => __( 'Site Background', 'blogr' ),
		'priority'    => 10,
	) );
	Kirki::add_section( 'colors_section', array(
		'title'       => __( 'Colors', 'blogr' ),
		'priority'    => 10,
	) );
  Kirki::add_section( 'links_section', array(
		'title'       => __( 'Theme Important Links', 'blogr' ),
		'priority'    => 190,
	) );
  
  Kirki::add_field( 'blogr_settings', array(
		'type'        => 'checkbox',
  	'settings'    => 'rigth-sidebar-check',
  	'label'       => __( 'Right Sidebar', 'blogr' ),
  	'description' => __( 'Enable the Right Sidebar', 'blogr' ),
  	'section'     => 'sidebar_section',
  	'default'     => 1,
  	'priority'    => 10,
	) );

	Kirki::add_field( 'blogr_settings', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'right-sidebar-size',
		'label'       => __( 'Right Sidebar Size', 'blogr' ),
		'section'     => 'sidebar_section',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => array(
			'1' => '1',
      '2' => '2',
      '3' => '3',
      '4' => '4',
      '5' => '5'
		),
	) );
	
	Kirki::add_field( 'blogr_settings', array(
		'type'        => 'checkbox',
  	'settings'    => 'left-sidebar-check',
  	'label'       => __( 'Left Sidebar', 'blogr' ),
  	'description' => __( 'Enable the Left Sidebar', 'blogr' ),
  	'section'     => 'sidebar_section',
  	'default'     => 0,
  	'priority'    => 10,
	) );

	Kirki::add_field( 'blogr_settings', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'left-sidebar-size',
		'label'       => __( 'Left Sidebar Size', 'blogr' ),
		'section'     => 'sidebar_section',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => array(
			'1' => '1',
      '2' => '2',
      '3' => '3',
      '4' => '4',
      '5' => '5'
		),
	) );


  Kirki::add_field( 'blogr_settings', array(
	  'type'        => 'image',
    'settings'     => 'header-logo',
    'label'       => __( 'Logo', 'blogr' ),
    'description' => __( 'Upload your logo', 'blogr' ),
    'section'     => 'layout_section',
    'default'     => '',
    'priority'    => 10,
	) );
  Kirki::add_field( 'blogr_settings', array(
	  'type'        => 'radio-buttonset',
    'settings'     => 'content-width',
    'label'       => __( 'Theme layout', 'blogr' ),
    'description' => __( 'Define theme layout', 'blogr' ),
    'section'     => 'layout_section',
    'default'     => 'container-fluid',
    'priority'    => 10,
    'choices'     => array(
        'container' => __( 'Boxed', 'blogr' ),
        'container-fluid' => __( 'FullWidth', 'blogr' )
    ),
	) );
   
  Kirki::add_field( 'blogr_settings', array(
		'type'        => 'select',
		'settings'    => 'featured-categories',
		'label'       => __( 'Featured category', 'blogr' ),
		'description' => __( 'Select category for featured section below main menu', 'blogr' ),
		'section'     => 'layout_section',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'  => blogr_get_cats(),
	) );


  Kirki::add_field( 'blogr_settings', array(
		'type'        => 'textarea',
		'settings'    => 'infobox-text',
		'label'       => __( 'Text area', 'blogr' ),
		'description' => __( 'Text area below navigation', 'blogr' ),
		'help'        => __( 'You can add custom text. Only text allowed!', 'blogr' ),
		'section'     => 'top_bar_section',
		'default'     => '',
		'priority'    => 10,
	) );
  Kirki::add_field( 'blogr_settings', array(
		'type'        => 'checkbox',
  	'settings'    => 'blogr_socials',
  	'label'       => __( 'Social Icons', 'blogr' ),
  	'description' => __( 'Enable or Disable the social icons', 'blogr' ),
  	'section'     => 'top_bar_section',
  	'default'     => 0,
  	'priority'    => 10,
	) );   
  $s_social_links = array(
    'twp_social_facebook' 	=> __( 'Facebook', 'blogr' ),
		'twp_social_twitter' 		=> __( 'Twitter', 'blogr' ),
		'twp_social_google' 	=> __( 'Google-Plus' , 'blogr' ),
		'twp_social_instagram' 	=> __( 'Instagram', 'blogr' ),
		'twp_social_pin' 	=> __( 'Pinterest', 'blogr' ),
		'twp_social_youtube' 		=> __( 'YouTube', 'blogr' ),
		'twp_social_reddit' 	=> __( 'Reddit', 'blogr' ),
  );

  foreach ( $s_social_links as $keys => $values ) {                
  Kirki::add_field( 'blogr_settings', array(
		'type'        => 'text',
		'settings'    => $keys,
		'label'       => $values,
		'description' => sprintf( __( 'Insert your custom link to show the %s icon.', 'blogr' ), $values ),
		'help'        => __( 'Leave blank to hide icon.', 'blogr' ),
		'section'     => 'top_bar_section',
		'default'     => '',
		'priority'    => 10,
	) );
  }    


  Kirki::add_field( 'blogr_settings', array(
  'type'        => 'color',
	'settings'    => 'color_site_title',
	'label'       => __( 'Site title color', 'blogr' ),
	'help'        => __( 'Site title text color, if not defined logo.', 'blogr' ),
	'section'     => 'colors_section',
	'default'     => '#222',
	'priority'    => 10,
	'output'      => array(
		array(
			'element'  => '.rsrc-header-text a',
			'property' => 'color',
			'units'    => ' !important',
		),
	),
  ) );
  Kirki::add_field( 'blogr_settings', array(
  'type'        => 'color',
	'settings'    => 'color_site_desc',
	'label'       => __( 'Site description color', 'blogr' ),
	'help'        => __( 'Site title text color, if not defined logo.', 'blogr' ),
	'section'     => 'colors_section',
	'default'     => '#B6B6B6',
	'priority'    => 10,
	'output'      => array(
		array(
			'element'  => '.rsrc-header-text h2, .rsrc-header-text h3',
			'property' => 'color',
		),
	),
  ) );    

	Kirki::add_field( 'blogr_settings', array(
		'type'        => 'switch',
  	'settings'    => 'related-posts-check',
  	'label'       => __( 'Related posts', 'blogr' ),
  	'description' => __( 'Enable or disable related posts', 'blogr' ),
  	'section'     => 'post_section',
  	'default'     => 1,
  	'priority'    => 10,
	) );
	Kirki::add_field( 'blogr_settings', array(
		'type'        => 'switch',
  	'settings'    => 'author-check',
  	'label'       => __( 'Author box', 'blogr' ),
  	'description' => __( 'Enable or disable author box', 'blogr' ),
  	'section'     => 'post_section',
  	'default'     => 1,
  	'priority'    => 10,
	) );
	Kirki::add_field( 'blogr_settings', array(
		'type'        => 'switch',
  	'settings'    => 'post-nav-check',
  	'label'       => __( 'Post navigation', 'blogr' ),
  	'description' => __( 'Enable or disable navigation below post content', 'blogr' ),
  	'section'     => 'post_section',
  	'default'     => 1,
  	'priority'    => 10,
	) );
  Kirki::add_field( 'blogr_settings', array(
		'type'        => 'switch',
  	'settings'    => 'breadcrumbs-check',
  	'label'       => __( 'Breadcrumbs', 'blogr' ),
  	'description' => __( 'Enable or disable Breadcrumbs', 'blogr' ),
  	'section'     => 'post_section',
  	'default'     => 1,
  	'priority'    => 10,
	) );

  Kirki::add_field( 'blogr_settings', array(
  	'type'        => 'background',
  	'settings'    => 'background_site',
  	'label'       => __( 'Background', 'blogr' ),
   	'section'     => 'site_bg_section',
  	'default'     => array(
  		'color'    => '#fff',
  		'image'    => '',
  		'repeat'   => 'no-repeat',
  		'size'     => 'cover',
  		'attach'   => 'fixed',
  		'position' => 'center-top',
  		'opacity'  => 100,
  	),
  	'priority'    => 10,
  	'output'      => 'body',
  ) );
  
  $theme_links = array(
               'documentation' => array(
               'link' => esc_url('http://demo.themes4wp.com/documentation/category/blogr/'),
               'text' => __('Documentation', 'blogr'),
               'settings'    => 'theme-docs',
            ),
               'support' => array(
               'link' => esc_url('http://support.themes4wp.com/'),
               'text' => __('Support', 'blogr'),
               'settings'    => 'theme-support',
            ),
               'demo' => array(
               'link' => esc_url('http://demo.themes4wp.com/blogr/'),
               'text' => __('View Demo', 'blogr'),
               'settings'    => 'theme-demo',
            ),
            'rating' => array(
               'link' => esc_url('https://wordpress.org/support/view/theme-reviews/blogr'),
               'text' => __('Rate This Theme', 'blogr'),
               'settings'    => 'theme-rate',
            )
         );
         
    foreach ($theme_links as $theme_link) {
         Kirki::add_field( 'blogr_settings', array(
            'type'        => 'custom',
            'settings'    => $theme_link['settings'],
            'section'     => 'links_section',
            'default'     => '<div style="padding: 10px; text-align: center; font-size: 20px; font-weight: bold;"><a target="_blank" href="' . $theme_link['link'] . '" >' . esc_attr($theme_link['text']) . ' </a></div>',
            'priority'    => 10,
          ) );    
    }    


/**
 * Configuration sample for the blogr Customizer.
 */
function blogr_configuration_sample() {
	
	$config['logo_image']   = get_template_directory_uri() . '/img/logo.png';
  $config['description']  = __( 'BlogR is a simple way to create your Personal WordPress Blog, with no technical knowledge or expertise required.', 'blogr' );
  $config['color_back']   = '#192429';
  $config['color_accent'] = '#008ec2';
  $config['width']        = '25%';

  return $config;

}

add_filter( 'kirki/config', 'blogr_configuration_sample' );

function blogr_configuration_sample_i18n( $config ) {

    $strings = array(
        'background-color' => __( 'Background Color', 'blogr' ),
        'background-image' => __( 'Background Image', 'blogr' ),
        'no-repeat' => __( 'No Repeat', 'blogr' ),
        'repeat-all' => __( 'Repeat All', 'blogr' ),
        'repeat-x' => __( 'Repeat Horizontally', 'blogr' ),
        'repeat-y' => __( 'Repeat Vertically', 'blogr' ),
        'inherit' => __( 'Inherit', 'blogr' ),
        'background-repeat' => __( 'Background Repeat', 'blogr' ),
        'cover' => __( 'Cover', 'blogr' ),
        'contain' => __( 'Contain', 'blogr' ),
        'background-size' => __( 'Background Size', 'blogr' ),
        'fixed' => __( 'Fixed', 'blogr' ),
        'scroll' => __( 'Scroll', 'blogr' ),
        'background-attachment' => __( 'Background Attachment', 'blogr' ),
        'left-top' => __( 'Left Top', 'blogr' ),
        'left-center' => __( 'Left Center', 'blogr' ),
        'left-bottom' => __( 'Left Bottom', 'blogr' ),
        'right-top' => __( 'Right Top', 'blogr' ),
        'right-center' => __( 'Right Center', 'blogr' ),
        'right-bottom' => __( 'Right Bottom', 'blogr' ),
        'center-top' => __( 'Center Top', 'blogr' ),
        'center-center' => __( 'Center Center', 'blogr' ),
        'center-bottom' => __( 'Center Bottom', 'blogr' ),
        'background-position' => __( 'Background Position', 'blogr' ),
        'background-opacity' => __( 'Background Opacity', 'blogr' ),
        'ON' => __( 'ON', 'blogr' ),
        'OFF' => __( 'OFF', 'blogr' ),
        'all' => __( 'All', 'blogr' ),
        'cyrillic' => __( 'Cyrillic', 'blogr' ),
        'cyrillic-ext' => __( 'Cyrillic Extended', 'blogr' ),
        'devanagari' => __( 'Devanagari', 'blogr' ),
        'greek' => __( 'Greek', 'blogr' ),
        'greek-ext' => __( 'Greek Extended', 'blogr' ),
        'khmer' => __( 'Khmer', 'blogr' ),
        'latin' => __( 'Latin', 'blogr' ),
        'latin-ext' => __( 'Latin Extended', 'blogr' ),
        'vietnamese' => __( 'Vietnamese', 'blogr' ),
        'serif' => _x( 'Serif', 'font style', 'blogr' ),
        'sans-serif' => _x( 'Sans Serif', 'font style', 'blogr' ),
        'monospace' => _x( 'Monospace', 'font style', 'blogr' ),
    );

    $config['i18n'] = $strings;

    return $config;

}
add_filter( 'kirki/config', 'blogr_configuration_sample_i18n' );

function blogr_get_cats() {
  /*GET LIST OF CATEGORIES*/
  $layercats = get_categories(); 
  $newList = array();
  $newList['0'] = __('All categories', 'blogr');
  foreach($layercats as $category) {
      $newList[$category->term_id] = $category->cat_name;
  }
  return $newList; 
}
