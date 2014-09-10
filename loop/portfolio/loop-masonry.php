<ul class="grid portfolio">

	<?php 
		$img_width = get_option('portfolio_width','600');
		$img_height = get_option('portfolio_height','380');
		
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		
		if(!( wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full') ))
			continue;
		
		$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		$resized_image = aq_resize($url[0], $img_width, $img_height, 1);
		
		if(!( $resized_image ))
			$resized_image = $url[0];
	?>
	
		<li <?php post_class( the_isotope_terms() ); ?>>
			<img src="<?php echo $resized_image; ?>" alt="<?php the_title(); ?>" width="<?php echo $img_width; ?>" height="<?php echo $img_height; ?>" />
			<div>
				<a href="<?php the_permalink(); ?>">
					<span class="center">
					<h4 class="heavy remove-bottom"><?php the_title(); ?></h4>
					<?php 
						if( get_option('portfolio_index_categories','1') == 1)
							echo wpautop( the_simple_terms());
					?>
					</span>
				</a>
			</div>
		</li>
		
	<?php endwhile; else: ?>
	  
	  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
	  
	<?php endif; ?>
	
</ul>

<?php 
	ebor_load_more();