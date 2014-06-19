<?php
	/*
	Template Name: Blog Large
	*/
	get_header(); 
	the_post();

	/**
	 * ebor_open_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_wrapper_markup - 10
	 */
	do_action('ebor_open_wrapper');
?>
	
	<ul class="grid blog one-col">
	
		<?php 
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$blog_query = new WP_Query('post_type=post&paged=' . $paged);
			if( $blog_query->have_posts() ) : while( $blog_query->have_posts() ) : $blog_query->the_post(); 
			global $post; 
		?>
		
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
				<?php 
					get_template_part('loop/loop','meta');
					the_excerpt(); 
				?>
				<a href="<?php the_permalink(); ?>" class="no-border"><?php echo get_option('blog_continue', 'Continue Reading &rarr;'); ?></a>
			</li>
			
		<?php 
			endwhile;
			else: 
		?>
		  
		  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
		  
		<?php 
			endif;
			if( function_exists('ebor_pagination') && ebor_pagination($blog_query->max_num_pages) ) : 
		?>
			<li class="pagination">
				<?php echo ebor_pagination($blog_query->max_num_pages); ?>
			</li>
		<?php 
			else :
			posts_nav_link();
			endif; 
		?>
		
	</ul>
	
<?php
	wp_reset_query(); 
	
	/**
	 * ebor_close_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_close_wrapper_markup - 10
	 */
	do_action('ebor_close_wrapper');
	
	get_footer();
?>