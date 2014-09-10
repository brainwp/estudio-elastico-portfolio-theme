<?php
	/*
	Template Name: Contact
	*/ 
	
	get_header(); 
	the_post();

	/**
	 * ebor_open_standard_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_standard_wrapper_markup - 10
	 */
	do_action('ebor_open_standard_wrapper');
?>

	<?php if( get_post_meta( $post->ID, '_cmb_map_address', true ) ) : ?>
		<div class="video-container">
			<?php echo get_post_meta( $post->ID, '_cmb_map_address', true ); ?>>
		</div>
	<?php endif; ?>
	
<?php 
	/**
	 * ebor_open_article hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_article_markup - 10
	 */
	do_action('ebor_open_article');
?>
	
	<div class="video-title">
		<h2><?php the_title(); ?></h2>
		<?php if( get_post_meta( $post->ID, '_cmb_the_subtitle', true ) ) : ?>
			<h6 class="remove-bottom">
				<?php echo get_post_meta( $post->ID, '_cmb_the_subtitle', true ); ?>
			</h6>
		<?php endif; ?>
	</div>
		
<?php 
	the_content();

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