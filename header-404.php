<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php if (is_home() || is_front_page()) { echo bloginfo('name'); } else { echo wp_title('| ', true, 'right'); } ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		
	<div id="mobile-nav">
		<i class="icon-reorder"></i>
		<?php if( get_option('small_logo') ) : ?>
			<img src="<?php echo get_option('small_logo'); ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" />
		<?php else : ?>
			<h3><?php echo bloginfo('title'); ?></h3>
		<?php endif; ?>
	</div>
	
	<header id="main">
	
		<div id="logo">
			<?php if( get_option('custom_logo') ) : ?>
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_option('custom_logo'); ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" class="retina" />
				</a>
			<?php else : ?>
				<a href="<?php echo home_url(); ?>"><?php echo bloginfo('title'); ?><small><?php echo bloginfo('description'); ?></small></a>
			<?php endif; ?>
		</div>
		
		<nav>
			<?php wp_nav_menu( array( 'menu_id' => 'main_menu', 'theme_location' => 'primary', 'container' => 'false' ) ); ?>
		</nav>
		
		<?php 
			if( is_active_sidebar('primary') )
				/**
				 * ebor_sidebar hook - gets the sidebar and allows developers to hook into
				 * All actions contained in /ebor_framework/theme_actions.php
				 *
				 * @hooked ebor_sidebar_markup - 10
				 */
				do_action('ebor_sidebar');
		?>
		
	</header>