<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
	<?php // You can start editing here -- including this comment! ?>

		<h2 class="h4 comments-title">
			<?php
				printf( _n( '1 kommentar', '%1$s kommentarer', get_comments_number(), 'aky' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="commentlist twelvecol clearfix">
			<?php wp_list_comments( array( 'callback' => 'aky_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'aky' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'aky' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'aky' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
		
		<?php
	$comments_args = array(
        // change the title of send button 
        'label_submit'=>'Skicka',
        // change the title of the reply section
        'title_reply'=>'Lämna en kommentar',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
                
        'logged_in_as' => '<p class="logged-in-as">' .
	    sprintf(
	    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>',
	
	  'comment_notes_before' => '<p class="comment-notes">' .
	    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
	    '</p>',
	    
	    'author' =>
		'<p class="comment-form-author">' .
		'<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
		( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		
		'email' =>
		'<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
		( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		
		'url' =>
		'<p class="comment-form-url"><label for="url">' .
		__( 'Website', 'domainreference' ) . '</label>' .
		'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		
		'comment_field' =>
		'<p class="comment-form-comment"><label for="comment">' . 
		_x( 'Comment', 'noun' ) . '</label>' .
		'<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
    );
    ?>

	<?php comment_form($comments_args); ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Kommentarerna är stängda' , 'aky' ); ?></p>
		<?php endif; ?>