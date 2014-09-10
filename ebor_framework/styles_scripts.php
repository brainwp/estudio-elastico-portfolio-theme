<?php

//ENQUEUE JQUERY & CUSTOM SCRIPTS
function ebor_load_scripts() {
	$protocol = is_ssl() ? 'https' : 'http';
	
	wp_enqueue_style( 'ebor-font-oswald', "$protocol://fonts.googleapis.com/css?family=Oswald:400,300,700" );
	wp_enqueue_style( 'ebor-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'ebor-framework', get_template_directory_uri() . '/css/framework.css' );
	wp_enqueue_style( 'ebor-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ebor-custom', get_template_directory_uri() . '/custom.css' );
	wp_dequeue_style('aqpb-view-css');
	wp_deregister_style('aqpb-view-css');
	
	wp_enqueue_script( 'ebor-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), false, true  );
	
	wp_enqueue_script( 'ebor-view', get_template_directory_uri() . '/js/view.min.js?auto', array('jquery'), false, true  );
	
	$script_data = array( 
		'ajax_control' => get_option('ajax_control', '1'),
		'slider_delay' => get_option('delay_time','5000')
	);
	wp_localize_script( 'ebor-custom', 'script_data', $script_data );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
	
	wp_dequeue_script('aqpb-view-js');
	wp_deregister_script('aqpb-view-js');
}
add_action('wp_enqueue_scripts', 'ebor_load_scripts');

function ebor_load_non_standard_scripts() {
	echo '<!--[if IE 7]><link href="'.get_template_directory_uri().'/css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->
		  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->'; }
add_action('wp_head', 'ebor_load_non_standard_scripts', 95);