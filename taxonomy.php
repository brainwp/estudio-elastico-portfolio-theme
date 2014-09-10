<?php 
	get_header();

	/**
	 * ebor_open_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_open_wrapper_markup - 10
	 */
	do_action('ebor_open_wrapper');
	
	/**
	 * Get /loop/portfolio/loop-xyz.php
	 * Gets loop based on layout chosen in theme options.
	 */
	get_template_part('loop/portfolio/loop', get_option('portfolio_layout','masonry'));
		
	/**
	 * ebor_close_wrapper hook
	 * All actions contained in /ebor_framework/theme_actions.php
	 *
	 * @hooked ebor_close_wrapper_markup - 10
	 */
	do_action('ebor_close_wrapper');
	
	get_footer();