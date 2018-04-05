<div class="container-full">
	<div class="fix container">
		<div class="section1">
			<?php
			 if (have_posts()):
			  while (have_posts()): the_post();
				
			  endwhile;
			  else:
			  echo'Sorry,Nathing post found';
			  endif;
			  ?>
		</div>
	</div>
</div>