<ul class="grid blog team">

	<?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		
		if(!( wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full') ))
			continue;
	?>
	
		<li <?php post_class(); ?>>
			<div class="more-hover">
				<?php if( has_post_thumbnail() ) the_post_thumbnail(); ?>
					<div>
						<a href="<?php the_permalink(); ?>">
							<span class="center">
							<h4 class="heavy remove-bottom"><?php the_title(); ?></h4>
							<p class="remove-bottom">
								<?php echo get_post_meta( $post->ID, '_cmb_the_job_title', true ); ?>
							</p>
							<p class="meta">
								<?php echo get_post_meta( $post->ID, '_cmb_date_joined', true ); ?>
							</p>
							</span>
						</a>
					</div>
			</div>
		</li>
	
	<?php endwhile; else: ?>
	  
	  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
	  
	<?php endif; ?>
	
</ul>

<?php 
	ebor_load_more_team();
