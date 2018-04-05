<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	 $themename = get_option( 'stylesheet' );
     $themename = preg_replace( "/\W/", "_", strtolower( $themename ) );
     return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'binge'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'binge'),
		'two' => __('Two', 'binge'),
		'three' => __('Three', 'binge'),
		'four' => __('Four', 'binge'),
		'five' => __('Five', 'binge')
	);
	
	$icon_set = array(
		'def' => __('Default', 'binge'),
		'glossy'  => __('Glossy', 'binge'),
		'soshion'  => __('Soshion', 'binge')
	);
	
	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'binge'),
		'two' => __('Pancake', 'binge'),
		'three' => __('Omelette', 'binge'),
		'four' => __('Crepe', 'binge'),
		'five' => __('Waffle', 'binge')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'binge'),
		'type' => 'heading');
		
		$options[] = array(
		'name' => __('Site Logo', 'binge'),
		'desc' => __('Upload the image of your logo here.', 'binge'),
		'id' => 'logo',
		'class'=>'tiny',
		'type' => 'upload');

		$options[] = array(
		'name'	=> __('Layout Settings',' binge'),
		'type'	=> 'heading' );
		
		$options[] = array(
		'name' => __('Grid layout','binge'),
		'desc' => "Select the grid layout for your site.",
		'id' => 'grid',
		'std' => "four",
		'type' => "images",
		'options' => array(
			'four'  => $imagepath . '4-Box.png',
			'three' => $imagepath . '3-Box.png',
			'two'   => $imagepath . '2-Box.png')
	);
	
	$options[] = array(
	'name'	=> __('Sidebar Layout','binge'),
	'desc'	=> __('Select the alignment of Sidebar','binge'),
	'type'	=> "images",
	'std'	=> "right",
	'id'	=> 'layout',
	'options'=> array(
		'right'	=> $imagepath . '2cr.png',
		'left'	=> $imagepath . '2cl.png')
	);
		
	$options[] = array(
		'name' => __('Custom CSS', 'binge'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'binge'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');
	
	$options[] = array(
		'name'	=> __('Social Settings',' binge'),
		'type'	=> 'heading' );
		
	$options[] = array(
		'name' => __('Enable Social Icons','binge'),
		'desc' => __('Check the box to enable Social Icons.','binge'),
		'id'   => 'social',
		'type' => 'checkbox',
		'std'  => '0'
	);
	
	$options[] = array(
		'name' => __('Icon Set Select', 'binge'),
		'desc' => __('Choose the Icon Set for displaying the Social Media Links.', 'binge'),
		'id' => 'icon',
		'std' => 'Default',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $icon_set);
		
	$options[] = array(
		'name' => __('Facebook', 'binge'),
		'desc' => __('Facebook Profile or Page URL i.e. http://facebook.com/username/ ', 'binge'),
		'id' => 'facebook',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Twitter', 'binge'),
		'desc' => __('Twitter Username', 'binge'),
		'id' => 'twitter',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Google Plus', 'binge'),
		'desc' => __('Google Plus profile url, including "http://"', 'binge'),
		'id' => 'google',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('RSS Feed', 'binge'),
		'desc' => __('URL for your RSS Feeds', 'binge'),
		'id' => 'feedburner',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Instagram', 'binge'),
		'desc' => __('URL of your Instagram Profile', 'binge'),
		'id' => 'instagram',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Flickr', 'binge'),
		'desc' => __('URL for your Flickr Profile', 'binge'),
		'id' => 'flickr',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Linked In', 'binge'),
		'desc' => __('URL for your Linked In Profile', 'binge'),
		'id' => 'linkedin',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Pinterest', 'binge'),
		'desc' => __('URL for your Pinterest Profile', 'binge'),
		'id' => 'pinterest',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('YouTube', 'binge'),
		'desc' => __('URL for your YouTube Channel', 'binge'),
		'id' => 'youtube',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('VK.com', 'binge'),
		'desc' => __('URL for your VK.com Profile. VK.com(Russian Social Network)', 'binge'),
		'id' => 'vk',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Mail', 'binge'),
		'desc' => __('URL for your Contact Page', 'binge'),
		'id' => 'mail',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Vimeo', 'binge'),
		'desc' => __('URL for your YouTube Channel or Profile', 'binge'),
		'id' => 'vimeo',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('SoundCloud', 'binge'),
		'desc' => __('URL for your SoundCloud Profile', 'binge'),
		'id' => 'soundcloud',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Yelp', 'binge'),
		'desc' => __('URL for your Yelp Profile', 'binge'),
		'id' => 'yelp',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('StumbleUpon', 'binge'),
		'desc' => __('URL for your StumbleUpon Profile', 'binge'),
		'id' => 'stumbleupon',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Vine', 'binge'),
		'desc' => __('URL for your Vine Profile', 'binge'),
		'id' => 'vine',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name'	=> __('Slider Settings',' binge'),
		'type'	=> 'heading' );
		
	$options[] = array(
		'name'	=> __('Enable Slider','binge'),
		'desc'	=> __('Tick the checkbox to enable Slider','binge'),
		'id'	=> 'slider-enable',
		'std'	=> 'false',
		'type'	=> 'checkbox'
		);	

	$options[] = array(
		'name' => __('Slider Image 1', 'binge'),
		'desc' => __('First Slide', 'binge'),
		'id' => 'slide1',
		'class' => '',
		'type' => 'upload');
	
	$options[] = array(
		'desc' => __('Title', 'binge'),
		'id' => 'slidetitle1',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'binge'),
		'id' => 'slidedesc1',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Url', 'binge'),
		'id' => 'slideurl1',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'binge'),
		'desc' => __('Second Slide', 'binge'),
		'class' => '',
		'id' => 'slide2',
		'type' => 'upload');
	
	$options[] = array(
		'desc' => __('Title', 'binge'),
		'id' => 'slidetitle2',
		'std' => '',
		'type' => 'text');	
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'binge'),
		'id' => 'slidedesc2',
		'std' => '',
		'type' => 'textarea');		
		
	$options[] = array(
		'desc' => __('Url', 'binge'),
		'id' => 'slideurl2',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Slider Image 3', 'binge'),
		'desc' => __('Third Slide', 'binge'),
		'id' => 'slide3',
		'class' => '',
		'type' => 'upload');	
	
	$options[] = array(
		'desc' => __('Title', 'binge'),
		'id' => 'slidetitle3',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'binge'),
		'id' => 'slidedesc3',
		'std' => '',
		'type' => 'textarea');	
			
	$options[] = array(
		'desc' => __('Url', 'binge'),
		'id' => 'slideurl3',
		'std' => '',
		'type' => 'text');		

	return $options;
}