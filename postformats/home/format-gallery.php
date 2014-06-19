<div class="more-hover">
	<?php if( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
		<div>
			<a href="<?php the_permalink(); ?>">
				<span class="center">
				<h4 class="heavy remove-bottom"><?php the_title(); ?></h4>
				<p>
					<?php 
						foreach((get_the_category()) as $category) { 
							echo $category->cat_name . ', '; 
						} 
						if( comments_open() )
							comments_number( __('0 Comments','other'), __('1 Comment','other'), __('% Comments','other') ); 
					?>
				</p>
				</span>
			</a>
		</div>
</div>