<?php 

/////////////////////////////////////////////
////////custom functions ///////////////////
///////////////////////////////////////////


/**
 * Portfolio Unlimited
 *
 * Uses pre_get_posts to provide unlimited portfolio posts when viewing the /portfolio/ archive
 *
 * @since 1.0.0
 */
 
function ebor_portfolio_unlimited( $query ) {
    if ( $query-> is_main_query() && is_post_type_archive('portfolio') && !( is_admin() ) && get_option('portfolio_layout','masonry') == 'masonry' ) {
        $query->set( 'posts_per_page', get_option('portfolio_posts_per_page','16') );
        return;
    } elseif( $query-> is_main_query() && is_post_type_archive('portfolio') && !( is_admin() ) ) {
    	$query->set( 'posts_per_page', '-1' );
    	return;
    }
    if ( $query-> is_main_query() && is_tax('portfolio-category') && !( is_admin() ) ) {
        $query->set( 'posts_per_page', '-1' );
        return;
    }
}
add_action( 'pre_get_posts', 'ebor_portfolio_unlimited' );

/**
 * HEX to RGB Converter
 *
 * Converts a HEX input to an RGB array.
 * @param $hex - the inputted HEX code, can be full or shorthand, #ffffff or #fff
 * @since 1.0.0
 * @return string
 */
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

/**
 * Add Thumbnails to Dashbaord
 *
 * @since 1.0.0
 */
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);

// Add the column
function tcb_add_post_thumbnail_column($cols){
  $cols['tcb_post_thumb'] = __('Featured Image','other');
  return $cols;
}

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);

// Grab featured-thumbnail size post thumbnail and display it.
function tcb_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'tcb_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in theme';
      break;
  }
}

/**
 * ebor load favicons
 *
 * Grab all favicons from the theme options, and place into wp_head
 * Conditionally checks that favicons exist before adding to wp_head
 *
 * @since 1.0.0
 */
function ebor_load_favicons() {
	if ( get_option('144_favicon') ) echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'.get_option('144_favicon').'">';
	if ( get_option('114_favicon') ) echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'.get_option('114_favicon').'">';
	if ( get_option('72_favicon') ) echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'.get_option('72_favicon').'">';
	if ( get_option('mobile_favicon') ) echo '<link rel="apple-touch-icon-precomposed" href="'.get_option('mobile_favicon').'">';
	if ( get_option('custom_favicon') ) echo '<link rel="shortcut icon" href="'.get_option('custom_favicon').'">';
}
add_action('wp_head', 'ebor_load_favicons');


/**
 * Portfolio taxonomy terms output.
 *
 * Checks that terms exist in the portfolio-category taxonomy, then returns a comma seperated string of results.
 * @todo Allow for taxonomy input for differing taxonmoies through the same function.
 * @since 1.0.0
 * @return string
 */
function the_simple_terms() {
global $post;
	if( get_the_terms($post->ID,'portfolio-category') !='' ) {
		$terms = get_the_terms($post->ID,'portfolio-category','',', ','');
		$terms = array_map('_simple_cb', $terms);
		return implode(', ', $terms);
	}
}

/**
 * Term name return
 *
 * Returns the Pretty Name of a term array
 * @param $t - the term array object
 * @since 1.0.0
 * @return string
 */
function _simple_cb($t) {  return $t->name; }

/**
 * Portfolio taxonomy terms output.
 *
 * Checks that terms exist in the portfolio-category taxonomy, then returns a space seperated string of results.
 * @todo Allow for taxonomy input for differing taxonmoies through the same function.
 * @since 1.0.0
 * @return string
 */
function the_isotope_terms() {
global $post;
	if( get_the_terms($post->ID,'portfolio-category') ) {
		$terms = get_the_terms($post->ID,'portfolio-category','','','');
		$terms = array_map('_isotope_cb', $terms);
		return implode(' ', $terms);
	}
}

/**
 * Term Slug Return
 *
 * Returns the slug of a term array
 * @param $t - the term array object
 * @since 1.0.0
 * @return string
 */
function _isotope_cb($t) {  return $t->slug; }


/**
 * Portfolio taxonomy terms output.
 *
 * Checks that terms exist in the portfolio-category taxonomy, then returns a comma seperated string of results.
 * @todo Allow for taxonomy input for differing taxonmoies through the same function.
 * @since 1.0.0
 * @return string
 */
function the_simple_terms_links() {
global $post;
	if( get_the_terms($post->ID,'portfolio-category') !='' ) {
		$terms = get_the_terms($post->ID,'portfolio-category','',', ','');
		$terms = array_map('_simple_link', $terms);
		return implode(', ', $terms);
	}
}

/**
 * Term name return
 *
 * Returns the Pretty Name of a term array
 * @param $t - the term array object
 * @since 1.0.0
 * @return string
 */
function _simple_link($t) {  return '<a href="'.get_term_link( $t, 'portfolio-category' ).'">'.$t->name.'</a>'; }


/**
 * Custom Pagination
 *
 * Returns a more usable pagination element than the standard WP pagination.
 * @since 1.0.0
 * @return pagination element
 */
function ebor_pagination($pages = '', $range = 2){
	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
	}
	
	$output = '';
	
	if(1 != $pages){
		$output .= "<div class='pagination'>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output .= "<a href='".get_pagenum_link(1)."'>".__('First','other')."</a>";
		
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				$output .= ($paged == $i)? "<a href='".get_pagenum_link($i)."' class='active'>".$i."</a>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
			}
		}
	
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output .= "<a href='".get_pagenum_link($pages)."'>".__('Last','other')."</a>";
		$output.= "</div>";
	}
	
	return $output;
}

/**
 * Custom Pagination
 *
 * Returns a load-more button which needs to be tied into .js for optimum uasge
 * @since 1.0.0
 * @return pagination element
 */
function ebor_load_more($pages = '', $range = 2){
	$showitems = ($range * 2)+1;
		
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
				if(!$pages) {
					$pages = 1;
				}
		}
		
		$displays = get_option('ebor_cpt_display_options');
		if( $displays['portfolio_slug'] ){ $slug = $displays['portfolio_slug']; } else { $slug = 'portfolio'; }
		
		if(1 != $pages){
			echo "<div class='load-more'><ul>";
			
			for ($i=1; $i <= $pages; $i++){
					echo ($paged == $i)? "":"<li><a href='".home_url('/'.$slug.'/page/'.$i)."'>".get_option('load_more_title', 'Load More')." <i class='icon-arrows-cw'></i></a></li>";
			}
	
			echo "</ul></div>";
		}
}

/**
 * Custom Pagination
 *
 * Returns a load-more button which needs to be tied into .js for optimum uasge
 * @since 1.0.0
 * @return pagination element
 */
function ebor_load_more_blog($pages = '', $range = 2){
	$showitems = ($range * 2)+1;
		
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
				if(!$pages) {
					$pages = 1;
				}
		}
			
		( get_option('show_on_front') == 'page') ? $permalink = get_permalink( get_option( 'page_for_posts' ) ) : $permalink = trailingslashit( home_url() );
		
		if( is_category() ){
			$cat = get_queried_object()->slug;
			$permalink = trailingslashit( home_url() ) . 'category/' . $cat . '/';
		}
		
		if(1 != $pages){
			echo "<div class='load-more blog-load-more'><ul>";
			
			for ($i=1; $i <= $pages; $i++){
					echo ($paged == $i)? "":"<li><a href='".$permalink.'page/'.$i."'>".get_option('load_more_title', 'Load More')." <i class='icon-arrows-cw'></i></a></li>";
			}
	
			echo "</ul></div>";
		}
}

/**
 * Custom Pagination
 *
 * Returns a load-more button which needs to be tied into .js for optimum uasge
 * @since 1.0.0
 * @return pagination element
 */
function ebor_load_more_team($pages = '', $range = 2){
	$showitems = ($range * 2)+1;
		
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
				if(!$pages) {
					$pages = 1;
				}
		}
		
		if(1 != $pages){
			echo "<div class='load-more team-load-more'><ul>";
			
			$displays = get_option('ebor_cpt_display_options');
			( $displays['team_slug'] ) ? $slug = $displays['team_slug'] : $slug = 'team';
			
			for ($i=1; $i <= $pages; $i++){
					echo ($paged == $i)? "":"<li><a href='".home_url('/'.$slug.'/page/'.$i)."'>".get_option('load_more_title', 'Load More')." <i class='icon-arrows-cw'></i></a></li>";
			}
	
			echo "</ul></div>";
		}
}