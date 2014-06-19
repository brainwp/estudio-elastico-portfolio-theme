<?php

////////////////////////////////////////////////////////
////////QUEUE UP FRAMEWORK/////////////////////////////
//////////////////////////////////////////////////////

//POST THUMBNAILS
	require_once( 'ebor_framework/post_thumbnails.php');
	
//MENUS & WIDGETS
	require_once ( "ebor_framework/mandw.php");
	
//STYLES & SCRIPTS
	require_once ( "ebor_framework/styles_scripts.php");
	
//THEME OPTIONS
	require_once ( "ebor_framework/theme_options.php");
	
//THEME SUPPORT
	require_once ( "ebor_framework/theme_support.php");
	
//THEME CUSTOM FILTERS
	require_once ( "ebor_framework/theme_filters.php");
	
//THEME CUSTOM FUNCTIONS
	require_once ( "ebor_framework/theme_functions.php");
	
//THEME ACTIONS
	require_once ( "ebor_framework/theme_actions.php");
	
//IMAGE RESIZER
	require_once( 'ebor_framework/aq_resizer.php');
	
//METABOXES
	require_once ( "ebor_framework/metaboxes.php");
	
//COLOURS
	require_once('ebor_framework/custom_colours.php');
	
//REQUIRED PLUGINS TGM CLASS
	require_once('ebor_framework/class-tgm-plugin-activation.php');
	
//REQUIRED PLUGINS
	require_once('ebor_framework/plugins_load.php');
	
//PAGE BUILDER ADDITIONAL BLOCKS
	require_once ('ebor_framework/page_builder.php');

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework/inc/options-framework.php';

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>
	<script type="text/javascript">
	jQuery(document).ready(function() {

		jQuery('#example_showhidden').click(function() {
	  		jQuery('#section-example_text_hidden').fadeToggle(400);
		});

		if (jQuery('#example_showhidden:checked').val() !== undefined) {
			jQuery('#section-example_text_hidden').show();
		}

	});
	</script>
<?php
}

include ( dirname( __FILE__ ) . "/options.php" );
	
/////////////////////////////////////////////
////////CUSTOM COMMENTS/////////////////////
///////////////////////////////////////////

function custom_comment($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	  	  <?php 
	  	  		echo get_avatar( $comment->comment_author_email, 70 ); 
	  	  ?>
	  	  <div class="comment-content">
			  <h6 class="margin-bottom-10"><a href="<?php echo get_comment_author_url(); ?>" rel="nofollow" target="_blank"><?php echo get_comment_author(); ?></a> <span class="meta"> &bull; <?php echo get_comment_date(); ?></span></h6>
		        <?php 
		      		$text = get_comment_text() . ' ' . get_comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
		      		echo wpautop( $text );
		      		if ($comment->comment_approved == '0') : 
		      	?>
		      	<p><em><?php _e('Your comment is awaiting moderation.', 'other') ?></em></p>
		        <?php 
		      		endif; 
		      	?>
		      <hr />
	      </div>
	</li>
<?php }

