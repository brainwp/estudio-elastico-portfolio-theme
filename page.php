<?php 
	get_header(); 
	the_post();

	/**
	 * ebor_open_standard_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_standard_wrapper_markup - 10
	 */
	do_action('ebor_open_standard_wrapper');
	
	if( has_post_thumbnail() ) {
		the_post_thumbnail('page');
		echo '<div class="clear break small"></div>';
	}
	
	/**
	 * ebor_open_article hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_article_markup - 10
	 */
	do_action('ebor_open_article');
?>

	<div class="text-center">
	
		<h2>
			<?php the_title(); ?>
			<?php if( get_post_meta( $post->ID, '_cmb_the_subtitle', true ) ) : ?>
				<small>
					<?php echo get_post_meta( $post->ID, '_cmb_the_subtitle', true ); ?>
				</small>
			<?php endif; ?>
		</h2>

		<div class="clear break"></div>
	</div>
	
<?php 
	the_content(); 
	wp_link_pages(); 

	/**
	 * ebor_close_article hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_close_article_markup - 10
	 */
	do_action('ebor_close_article');

	/**
	 * ebor_close_standard_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_close_standard_wrapper_markup - 10
	 */
	do_action('ebor_close_standard_wrapper');
	
	get_footer();
?>