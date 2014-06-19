<?php  
	global $post
?>

<ul class="grid portfolio">

	<?php 
		$the_taxonomy = get_post_meta($post->ID, '_cmb_the_taxonomy_category',true );
		
		$img_width = get_option('portfolio_width','600');
		(get_option('crop_images','1') == '1') ? $img_height = get_option('portfolio_height','380') : $img_height = '9999';
		
		$paged = (get_query_var('page')) ? get_query_var('page') : 1;
		
		if( $the_taxonomy !=='' && $the_taxonomy !== '-1' ) {
			$portfolio_query = new WP_Query(array( 
			    'post_type' => 'portfolio',
			    'showposts' => -1,
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'portfolio-category',
			            'terms' => $the_taxonomy,
			            'field' => 'term_id',
			        )
			    ),
			    'orderby' => 'date',
			    'order' => 'DESC' )
			); 
		} else { 
			$portfolio_query = new WP_Query('post_type=portfolio&posts_per_page='.get_option('portfolio_posts_per_page','16').'&paged='.$paged);
		}
		
		if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
		
		if(!( wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full') ))
			continue;
		
		$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		(get_option('crop_images','1') == '1') ? $resized_image = aq_resize($url[0], $img_width, $img_height, 1) : $resized_image = aq_resize($url[0], $img_width);
		
		if(!( $resized_image ))
			$resized_image = $url[0];
	?>
	
		<li <?php post_class( the_isotope_terms() ); ?>>
			<img src="<?php echo $resized_image; ?>" alt="<?php the_title(); ?>" width="<?php echo $img_width; ?>" height="<?php echo $img_height; ?>" />
			<div>
				<a href="<?php the_permalink(); ?>">
					<span class="center">
					<h4 class="heavy remove-bottom"><?php the_title(); ?></h4>
					<?php 
						if( get_option('portfolio_index_categories','1') == 1)
							echo wpautop( the_simple_terms());
					?>
					</span>
				</a>
			</div>
		</li>
		
	<?php 
		endwhile; 
		else: 
	?>
	  
	  	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
	  
	<?php 
		endif;
	?>
	
</ul>

<?php 
	ebor_load_more($portfolio_query->max_num_pages);
	wp_reset_query(); 