<ul class="grid portfolio">

	<?php 
		$img_width = get_option('portfolio_width','600');
		(get_option('crop_images','1') == '1') ? $img_height = get_option('portfolio_height','380') : $img_height = '9999';
		
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		if(!( wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full') ))
			continue;
		
		$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		(get_option('crop_images','1') == '1') ? $resized_image = aq_resize($url[0], $img_width, $img_height, 1) : $resized_image = aq_resize($url[0], $img_width);
		
		if(!( $resized_image ))
			$resized_image = $url[0];
	?>
	
		<li <?php post_class(); ?>>
			<img src="<?php echo $resized_image; ?>" alt="<?php the_title(); ?>" width="<?php echo $img_width; ?>" height="<?php echo $img_height; ?>" />
			<div>
				<a href="<?php the_permalink(); ?>">
					<span class="center">
						<h4 class="heavy remove-bottom"><?php the_title(); ?></h4>
						<p>
							<?php 
								the_time( get_option('date_format') );
							?>
						</p>
					</span>
				</a>
			</div>
		</li>
		
	<?php 
		endwhile; 
		else: 
	?>
	  
	  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
	  
	<?php 
		endif;
	?>
	
</ul>

<?php 
	ebor_load_more_blog();