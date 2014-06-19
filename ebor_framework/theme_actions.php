<?php 

/*
 * Displays the opening page wrapper.
 */
add_action( 'ebor_open_wrapper', 'ebor_open_wrapper_markup', 10 );
function ebor_open_wrapper_markup(){
	echo '<div id="content"><div id="loader"></div>';
}

/*
 * Displays the closing page wrapper.
 */
add_action( 'ebor_close_wrapper', 'ebor_close_wrapper_markup', 10 );
function ebor_close_wrapper_markup(){
	echo '<div class="clear"></div></div>';
}

/*
 * Displays the opening page wrapper for standard pages & posts.
 */
add_action( 'ebor_open_standard_wrapper', 'ebor_open_standard_wrapper_markup', 10 );
function ebor_open_standard_wrapper_markup(){
	echo '<section id="content">';
}

/*
 * Displays the closing page wrapper for standard pages & posts.
 */
add_action( 'ebor_close_standard_wrapper', 'ebor_close_standard_wrapper_markup', 10 );
function ebor_close_standard_wrapper_markup(){
	echo '</section>';
}

/*
 * Displays the sidebar.
 */
add_action( 'ebor_sidebar', 'ebor_sidebar_markup', 10 );
function ebor_sidebar_markup(){
	get_sidebar();
}

/*
 * Opens the article on single posts / pages
 */
add_action( 'ebor_open_article', 'ebor_open_article_markup', 10 );
function ebor_open_article_markup(){ ?>
	<article <?php post_class(); ?>>
<?php }

/*
 * Closes the article on single posts / pages
 */
add_action( 'ebor_close_article', 'ebor_close_article_markup', 10 );
function ebor_close_article_markup(){
	echo '<div class="clear"></div></article>';
}