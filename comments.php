<div class="comments scroll-animate">
	<h5 id="comment-title"><?php comments_number( __('0 Comments','other'), __('1 Comment','other'), __('% Comments','other') ); ?></h5>
	<hr />
	
	<?php if( have_comments() ) : ?>
		  <ol id="comments" class="commentlist clearfix">
		  		<?php wp_list_comments('type=comment&callback=custom_comment'); ?>
		  </ol>
	<?php 
		endif;
		paginate_comments_links();
		echo wpautop(get_option('comments_title','Would you like to share your thoughts?'));
	
		$custom_comment_form = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
	    'author' => '<input type="text" id="author" name="author" placeholder="' . __('Name *','other') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" />',
	    'email'  => '<input name="email" type="text" id="email" placeholder="' . __('Email *','other') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" />',
	    'url'    => '<input name="url" type="text" id="url" placeholder="' . __('Website','other') . '" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" /></div>') ),
	  	'comment_field' => '<textarea name="comment" placeholder="' . __('Enter your comment here...','other') . '" id="comment" aria-required="true"></textarea>',
	  	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out?</a>','other' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	  	'cancel_reply_link' => __( 'Cancel' , 'other' ),
	  	'comment_notes_before' => '',
	  	'comment_notes_after' => '',
	  	'label_submit' => __( 'Submit' , 'other' )
	  ); comment_form($custom_comment_form); 
	?>
</div>