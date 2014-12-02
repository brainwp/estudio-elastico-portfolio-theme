<?php
	$home_url = home_url();
	
	$displays = get_option('ebor_cpt_display_options');
	( $displays['portfolio_slug'] ) ? $slug = $displays['portfolio_slug'] : $slug = 'portfolio';
	
	if( get_post_type() == 'portfolio' ) 
		$home_url = home_url() . '/' . $slug;
?>

<div class="article-nav <?php if( get_post_type() == 'post' || get_post_type() == 'team' ) echo 'blog'; ?>">
	
	<?php next_post_link('%link', "<i class='icon-angle-left'></i>".__('Proximo','other')); ?>
	
	<a href="<?php echo $home_url; ?>" class="close"><i class="icon-angle-right"></i><i class="icon-angle-left"></i></a>
	
	<?php previous_post_link('%link', __('Anterior','other')."<i class='icon-angle-right'></i>"); ?>
	
</div>