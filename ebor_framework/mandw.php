<?php

//REGISTER CUSTOM MENUS
function register_ebor_menus() {
  register_nav_menus( array(
  	'primary' => __( 'Main Navigation', 'other' ),
  ) );
}
add_action( 'init', 'register_ebor_menus' );

//REGISTER SIDEBARS
function ebor_register_sidebars() {

	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Sidebar', 'other' ),
			'description' => __( 'Widgets to be displayed in the sidebar.', 'other' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="widget-title">',
			'after_title' => '</h6>'
		)
	);

}
add_action( 'widgets_init', 'ebor_register_sidebars' );