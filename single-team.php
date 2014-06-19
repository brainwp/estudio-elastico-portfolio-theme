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
	
	/**
	 * Get /loop/nav-single.php
	 * Creates post by post navigation for single post items
	 */
	get_template_part('loop/nav','single');
?>
	
	<div class="video-title team">
		<h2>
			<small>
				<?php echo get_post_meta( $post->ID, '_cmb_date_joined', true ); ?>
			</small>
			<?php the_title(); ?>
			<small>
				<?php echo get_post_meta( $post->ID, '_cmb_the_job_title', true ); ?>
			</small>
		</h2>
		<?php if( get_post_meta( $post->ID, '_cmb_the_subtitle', true ) ) : ?>
			<h6 class="remove-bottom">
				<?php echo get_post_meta( $post->ID, '_cmb_the_subtitle', true ); ?>
			</h6>
		<?php endif; ?>
	</div>
	
	<?php the_post_thumbnail('full'); ?>
	<div class="clear break small"></div>
	
<?php 
	/**
	 * ebor_open_article hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_article_markup - 10
	 */
	do_action('ebor_open_article');
	
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