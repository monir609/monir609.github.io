<?php $social_icon_path = get_template_directory_uri().'/images/social/'.of_get_option('icon'); ?>

<div class="social-icons col-lg-6 col-md-6 col-sm-12 col-xs-12">

		<?php $sa = array(
						'Facebook',
						'Twitter',
						'Google Plus',
						'RSS Feeds',
						'Instagram',
						'Flickr',
						'Linked In',
						'Pinterest',
						'Youtube',
						'SoundCloud',
						'Yelp',
						'Vimeo',
						'E-Mail',
						'VK',
						'Stumble Upon',
						'Vine');
						
				$sb = array(
						'facebook',
						'twitter',
						'google',
						'feedburner',
						'instagram',
						'flickr',
						'linkedin',
						'pinterest',
						'youtube',
						'soundcloud',
						'yelp',
						'vimeo',
						'mail',
						'vk',
						'stumbleupon',
						'vine');
				
				for($i = 0; $i <16; $i++) {
					 if ( of_get_option($sb[$i], true) != "") { ?>
						 <a target="_blank" href="<?php echo esc_url(of_get_option($sb[$i])); ?>" title=<?php echo $sa[$i]; ?> ><img src="<?php echo esc_url($social_icon_path).'/'.$sb[$i].'.png'; ?>"></a>
	             <?php } 
	             } ?>
</div>	             