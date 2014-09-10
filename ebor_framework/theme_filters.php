<?php 

/////////////////////////////////////////////
////////CUSTOM FILTERS  ////////////////////
///////////////////////////////////////////

function custom_admin_post_thumbnail_html( $content ) {
    return $content = str_replace( __( 'Set featured image' ), __( 'Set featured image (Min 600px Width)' ), $content);
}
add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html' );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter('widget_text', 'do_shortcode');

/**
 * Filters previous post link and adds a class
 */
add_filter('previous_post_link', 'prev_post_link_attributes');
function prev_post_link_attributes($output) {
    $class = 'class="post-nav"';
    return str_replace('<a href=', '<a '.$class.' href=', $output);
}

/**
 * Filters next post link and adds a class
 */
add_filter('next_post_link', 'next_post_link_attributes');
function next_post_link_attributes($output) {
    $class = 'class="post-nav"';
    return str_replace('<a href=', '<a '.$class.' href=', $output);
}

/**
 * Filters the_content to find iframes and then fixes them for IE9+
 */
add_filter( 'the_content' , 'mh_youtube_wmode' , 15 );
function mh_youtube_wmode( $content ) {
	$mh_youtube_regex = "/\<iframe .*\.com.*><\/iframe>/";
	preg_match_all( $mh_youtube_regex , $content, $mh_matches );
	if ( $mh_matches ) {;
    	for ( $mh_count = 0; $mh_count < count( $mh_matches[0] ); $mh_count++ ){
            $mh_old = $mh_matches[0][$mh_count];
            $mh_new = str_replace( "?feature=oembed" , "?wmode=transparent" , $mh_old );
            $mh_new = preg_replace( '/\><\/iframe>$/' , ' wmode="Opaque"></iframe></figure>' , $mh_new );
            $mh_new = str_replace( "<iframe" , "<figure class='media-wrapper player'><iframe" , $mh_new );
            $content = str_replace( $mh_old, $mh_new , $content );
        }
    }
	return $content;
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function _s_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', '_s_wp_title', 10, 2 );

/**
 * Custom gallery shortcode
 *
 * Filters the standard WordPress gallery to create a gallery using revolution slider.
 *
 * @since 1.0.0
 * @return Revolution Slider Gallery
 */
add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
function my_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'li',
        'icontag'    => 'dt',
        'captiontag' => 'div',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', "<ul class='rslides'>");

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $output .= "<{$itemtag}>";
        $image = wp_get_attachment_image_src( $attachment->ID, 'full' );
        $output .= "<img src='" . $image[0] . "' />";
        $output .= "</{$itemtag}>";
    }

    $output .= "</ul><div class='clear break small'></div>\n";

    return $output;
}