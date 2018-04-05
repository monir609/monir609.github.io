<div class="container-full nav-bg">
	<nav id="sticker">
		<div class="nav ">
		   <div class="nav-box1">
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
			</div>
		  
		  <div class="nav-box2">
			<?php
			$args = array(
			'theme' => 'primary'
			);wp_nav_menu($args);?>
		  </div>
		
			
		</div>
	</nav>
</div>