<?php
/////////////////////////////////////////////
////////ADD THEME SUPPORT///////////////////
///////////////////////////////////////////

//ADD FEATURED IMAGES
add_theme_support( 'post-thumbnails' );

add_theme_support( 'woocommerce' );

//IMAGE SIZES
add_image_size( 'admin-list-thumb', 60, 60, true );
add_image_size( 'page', 1000, 9999, false );

//FEED LINKS
add_theme_support( 'automatic-feed-links' );

add_theme_support( 'post-formats', array( 'gallery', 'video', 'image', 'audio' ) );

add_editor_style('editor-style.css');

if ( ! isset( $content_width ) ) $content_width = 1000;

add_action('after_setup_theme', 'other_setup');
function other_setup(){
	load_theme_textdomain('other', get_template_directory() . '/languages');
}

//ADDITIONAL POST THUMBNAILS
if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(array(
	    'label' => 'Featured Image for Single Post',
	    'id' => 'single-featured',
	    'post_type' => 'post',
	    )
	);
	new MultiPostThumbnails(array(
	    'label' => 'Featured Image for Single Post',
	    'id' => 'single-featured',
	    'post_type' => 'portfolio',
	    )
	);
    new MultiPostThumbnails(array(
        'label' => 'Vertical Strip Image',
        'id' => 'portfolio-vertical',
        'post_type' => 'portfolio',
        )
    );
    new MultiPostThumbnails(array(
        'label' => 'Horizontal Strip Image',
        'id' => 'portfolio-horizontal',
        'post_type' => 'portfolio'
        )
    );
    new MultiPostThumbnails(array(
        'label' => 'Vertical Strip Image',
        'id' => 'team-vertical',
        'post_type' => 'team',
        )
    );
    new MultiPostThumbnails(array(
        'label' => 'Horizontal Strip Image',
        'id' => 'team-horizontal',
        'post_type' => 'team'
        )
    );
    new MultiPostThumbnails(array(
        'label' => 'Custom Background Image',
        'id' => 'background',
        'post_type' => 'team'
        )
    );
    new MultiPostThumbnails(array(
        'label' => 'Custom Background Image',
        'id' => 'background',
        'post_type' => 'post'
        )
    );
    new MultiPostThumbnails(array(
        'label' => 'Custom Background Image',
        'id' => 'background',
        'post_type' => 'page'
        )
    );
    new MultiPostThumbnails(array(
        'label' => 'Custom Background Image',
        'id' => 'background',
        'post_type' => 'portfolio'
        )
    );
};