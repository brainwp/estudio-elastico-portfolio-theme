<ul class="grid blog">

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
			<?php
				get_template_part('loop/loop','meta');
				the_excerpt(); 
			?>
			<a href="<?php the_permalink(); ?>" class="no-border"><?php echo get_option('blog_continue', 'Continue Reading &rarr;'); ?></a>
		</li>
		
	<?php endwhile; else: ?>
	  
	  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
	  
	<?php endif; ?>
	
</ul>

<?php 
	ebor_load_more_blog();