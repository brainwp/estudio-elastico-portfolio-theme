<ul class="grid blog one-col">

	<?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	?>
	
		<li <?php post_class(); ?>>
			<div class="one_half">
					
				<?php
					/**
					 * Get /postformats/format-xyz.php
					 * Gets content based on chosen post format
					 */
					$format = get_post_format();
					if(!( $format ) || $format == 'image') $format = 'standard';
					get_template_part( 'postformats/home/format', $format );
				?>
					
			</div>
			<div class="one_half last">
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<?php 
					get_template_part('loop/loop','meta');
					the_excerpt(); 
				?>
				<a href="<?php the_permalink(); ?>" class="no-border"><?php echo get_option('blog_continue', 'Continue Reading &rarr;'); ?></a>
			</div>
		</li>
		
	<?php 
		endwhile; 
		else: 
	?>
	  
	  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
	  
	<?php 
		endif;
		if( function_exists('ebor_pagination') && ebor_pagination() ) : 
	?>
		<li class="pagination">
			<?php echo ebor_pagination(); ?>
		</li>
	<?php 
		else :
		posts_nav_link();
		endif; 
	?>
	
</ul>