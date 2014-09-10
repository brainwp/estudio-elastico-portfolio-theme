<?php 

add_action('wp_head','ebor_custom_colours', 100);
function ebor_custom_colours(){ 

	$highlight = get_option('highlight_colour','#e74c3c');
	$highlight_hover = get_option('highlight_hover_colour','#c0392b');
	$wrapper = get_option('wrapper_background', '#ffffff');
	$text_colour = get_option('text_colour','#444444');
	$highlightrgb = hex2rgb( get_option('hover_background', '#000000') );
	$hover_text = get_option('hover_background_text', '#ffffff');
?>

<style type="text/css">

	a:hover, .social a:hover, .filters li:hover, .filters li.active, .filters li:hover a, .filters li.active a, p a, nav li:hover > a, nav li.current-menu-item > a, nav li.current-menu-parent > a, .gallery li:hover a {
		color: <?php echo $highlight; ?>; border-color: <?php echo $highlight; ?>;
	}
	
	nav a.active, dl.accordion dt.active a {
		color: <?php echo $highlight; ?>;
	}
	
	pre, dl.accordion dt.active, .pagination a.active {
		border-left: 3px solid <?php echo $highlight; ?>;
	}
	
	p a:hover {
		color: <?php echo $highlight_hover; ?>;
	}
	
	header#main, nav, #logo, .grid.blog li, .load-more li a, .pagination a {
		background: #<?php echo get_background_color(); ?>;
	}
	
	#logo:hover, nav li, .grid.blog li:hover, section, .gallery.vertical li .gallery-details, .gallery.horizontal li .gallery-details, .widget {
		background: <?php echo $wrapper; ?>;
	}
	
	body, a {
		color: <?php echo $text_colour; ?>;
	}
	
	.more-hover div, .grid.portfolio li div {
		background: rgba(<?php echo $highlightrgb; ?>,0.85); border-color: <?php echo get_option('hover_background', '#000000')?>;
	}
	
	.grid.portfolio li div, .more-hover div, .grid.portfolio li a, .more-hover a {
		color: <?php echo $hover_text; ?> !important;
	}
	
	<?php echo get_option('custom_css',''); ?>
	
</style>
	
<?php }