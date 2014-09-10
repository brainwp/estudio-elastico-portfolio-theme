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
	if( get_option('display_portfolio_meta','1') == '1' ) :
?>
		<div class="three_fourths">
			<?php the_content(); ?>
		</div>
		
		<div class="one_fourth last">
			<h6><?php echo get_option('portfolio_details_title','Project Details'); ?></h6>
			
			<?php if( get_post_meta( $post->ID, '_cmb_the_client', true ) && get_option('portfolio_client', '1') == 1 ) : ?>
				<p>
					<strong><?php _e('CLIENT :','other'); ?></strong> <?php echo get_post_meta( $post->ID, '_cmb_the_client', true ); ?>
				</p>
			<?php 
				endif;
				
				if( get_post_meta( $post->ID, '_cmb_the_client_date', true ) && get_option('portfolio_date', '1') == 1 ) : 
			?>
				<p>
					<strong><?php _e('DATE :','other'); ?></strong> <?php echo get_post_meta( $post->ID, '_cmb_the_client_date', true ); ?>
				</p>
			<?php 
				endif;
				
				if( the_simple_terms() && get_option('portfolio_categories', '1') == 1 ) : 
			?>
				<p>
					<strong><?php _e('TAGS :','other'); ?></strong> <?php echo the_simple_terms_links(); ?>
				</p>
			<?php 
				endif;
			
				if( get_post_meta( $post->ID, '_cmb_the_client_url', true ) && get_option('portfolio_url', '1') == 1 ) : 
			?>
				<p>
					<strong><?php _e('WEBSITE :','other'); ?></strong> 
					<a href="<?php echo esc_url(get_post_meta( $post->ID, '_cmb_the_client_url', true )); ?>" target="_blank">
						<?php echo esc_url(get_post_meta( $post->ID, '_cmb_the_client_url', true )); ?>
					</a>
				</p>
			<?php endif; ?>
			
		</div>
		<div class="clear"></div>
		
<?php 
	else : 
	
	the_content();
	echo '<div class="clear"></div>';
	
	endif;

	if( comments_open() && get_option('portfolio_comments','0') == 1 ) comments_template();
	 
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