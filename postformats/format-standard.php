<?php 
	/**
	 * Get the vertical thumbnail.
	 * Gets a secondary featured image assigned for the vertical layout.
	 * Class defined in /ebor_framework/post_thumbnails.php
	 */
	MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'single-featured');
	echo '<div class="clear break small"></div>';