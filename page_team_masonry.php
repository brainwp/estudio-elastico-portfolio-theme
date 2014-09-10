<?php 
	get_header();

	/**
	 * ebor_open_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_wrapper_markup - 10
	 */
	do_action('ebor_open_wrapper');
?>
	
	<ul class="grid blog team">
	
		<?php 
			$portfolio_query = new WP_Query('post_type=team&posts_per_page=-1');
			if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
			
			if(!( wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full') ))
				continue;
		?>
		
			<li <?php post_class(); ?>>
				<div class="more-hover">
					<?php if( has_post_thumbnail() ) the_post_thumbnail(); ?>
						<div>
							<a href="<?php the_permalink(); ?>">
								<h4 class="heavy remove-bottom"><?php the_title(); ?></h4>
								<p class="remove-bottom">
									<?php echo get_post_meta( $post->ID, '_cmb_the_job_title', true ); ?>
								</p>
								<p class="meta">
									<?php echo get_post_meta( $post->ID, '_cmb_date_joined', true ); ?>
								</p>
							</a>
						</div>
				</div>
			</li>
		
		<?php endwhile; else: ?>
		  
		  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
		  
		<?php 
			endif; 
			wp_reset_query();	
		?>
		
	</ul>
	
<?php 
		
	/**
	 * ebor_close_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_close_wrapper_markup - 10
	 */
	do_action('ebor_close_wrapper');
	
	get_footer();