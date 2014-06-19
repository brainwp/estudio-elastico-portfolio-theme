<?php 
	get_header('404');
	
	global $wp_query;
	$total_results = $wp_query->found_posts;

	/**
	 * ebor_open_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_wrapper_markup - 10
	 */
	do_action('ebor_open_wrapper');
?>
	
	<ul class="grid blog">
	
		<li>
			<h5>
				<?php 
					_e('Your Search For: ','other'); 
					the_search_query(); 
				?>
			</h5>
			<h6 class="remove-bottom">
				<?php 
					_e( 'Returned: ', 'other' ); 
					echo $total_results; 
					( $total_results == '1' ) ? _e(' Item','other') : _e(' Items','other'); 
				?>
			</h6>
		</li>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<li <?php post_class(); ?>>
					
					<?php
						/**
						 * Get /postformats/format-xyz.php
						 * Gets content based on chosen post format
						 */
						$format = get_post_format();
						if(!( $format ) || $format == 'image') $format = 'standard';
						get_template_part( 'postformats/home/format', $format );
					?>
	
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="no-border"><?php echo get_option('blog_continue', 'Continue Reading &rarr;'); ?></a>
			</li>
			
		<?php endwhile; else: ?>
		  
		  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
		  
		<?php endif; ?>
		
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