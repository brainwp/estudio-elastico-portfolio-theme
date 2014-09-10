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
	
	<div class="video-title blog">
		<h2>
			<?php if( get_option('single_date','1') == 1 ): ?>
				<small><?php the_time( get_option('date_format') ); ?></small>
			<?php endif; ?>
				<?php the_title(); ?>
			<small><?php _e('Posted In', 'other'); ?>: <?php the_category(', '); ?></small>
		</h2>
		<?php if( get_post_meta( $post->ID, '_cmb_the_subtitle', true ) ) : ?>
			<h6 class="remove-bottom">
				<?php echo get_post_meta( $post->ID, '_cmb_the_subtitle', true ); ?>
			</h6>
		<?php endif; ?>
	</div>
	
<?php 
	/**
	 * Get /postformats/format-xyz.php
	 * Gets content based on chosen post format
	 */
	$format = get_post_format();
	if(!( $format ) || $format == 'image') $format = 'standard';
	get_template_part( 'postformats/format', $format );
	
	/**
	 * ebor_open_article hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_article_markup - 10
	 */
	do_action('ebor_open_article');
	
	the_content();
	wp_link_pages();
?>

	<div class="clear"></div>
		<?php 
			if( get_option('single_categories', '1') == 1 )
				the_tags(__('Tagged: ','other'),', ','');
		?>
	<div class="clear"></div>
		
<?php 
	if( comments_open() && get_option('single_comments','1') == 1 ) comments_template();
	
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