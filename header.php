<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="ie9 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo (is_home() || is_front_page()) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<?php 
	/**
	 * Get the custom background image.
	 * Gets a custom backgorund image on an entry by entry basis
	 * Class defined in /ebor_framework/post_thumbnails.php
	 */
	$ebor_custom_background =  MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'background', get_queried_object_id() ); 
	($ebor_custom_background) ? $cover = 'cover' : $cover = '';
	($ebor_custom_background) ? $body_style = 'style="background-image: url('.$ebor_custom_background.');"' : $body_style = '';
?>

<body <?php body_class($cover); ?> <?php echo $body_style; ?>>

	<?php
		global $post;
		if( post_password_required() && !is_home() && !is_front_page() ){
			echo get_the_password_form();
		}
	?>

	<?php if($ebor_custom_background) : ?>
		<a href="#" class="view-background"><i class="icon-eye-close icon-2x"></i></a>
	<?php endif; ?>
		
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
		
		<?php if( is_page_template('page_home.php') && get_post_meta($post->ID, '_cmb_the_taxonomy_category',true ) == '-1' || is_post_type_archive('portfolio') && get_option('portfolio_layout','masonry') == 'masonry' ) : ?>
			<ul class="filters">
				<li class="active">
					<a href="#" data-href="*"><?php _e('All','other'); ?></a>
				</li>
				<?php 
					$categories = get_categories('taxonomy=portfolio-category&orderby=term_group');
					foreach ($categories as $category){
						if( $category->category_parent ){
							echo '<li class="has-parent"><a href="#" data-href=".'.$category->slug.'">' . $category->name . '</a></li>';
						} else {
							echo '<li><a href="#" data-href=".'.$category->slug.'">' . $category->name . '</a></li>';
						}
					}
				?>
			</ul>
		<?php endif; ?>
		
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