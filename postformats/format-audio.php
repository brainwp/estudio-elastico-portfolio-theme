<?php 
	$i=0; 
	while( $i < 5 ) :
		$i++;
		if ( get_post_meta( $post->ID, "_cmb_the_video_$i", true ) ) : 
?>

		<div class="soundcloud-container">
		  <?php echo apply_filters('the_content', get_post_meta( $post->ID, "_cmb_the_video_$i", true )); ?>
		</div>
			
<?php 
		endif;
	endwhile;
