<?php 
	if( is_single() ){
		$meta_location = 'single_';
	} else {
			$meta_location = 'index_';
	} 	

	if( get_option($meta_location . 'date', '1') == 1 ) : ?>
	<span class="date meta"><?php the_time(get_option('date_format')); ?></span> 
<?php endif; ?>
<?php if( get_option($meta_location . 'categories', '1') == 1 && has_tag() ) : ?>
	 <span class="tags meta"><?php the_tags('', ', ', ''); ?></span> 
<?php endif; ?>
<?php if( get_option($meta_location . 'comments', '1') == 1 && comments_open() ) : ?>
	 <span class="comments meta"><a href="<?php comments_link(); ?>">
		<?php comments_number( __('0 Comments','other'), __('1 Comment','other'), __('% Comments','other') ); ?>
	</a></span> 
<?php endif; ?>
<?php edit_post_link(__('Edit','other')); ?>