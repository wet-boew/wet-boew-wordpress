<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to clf2v2_nsi2v2_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage clf2v2_nsi2v2
 * @since clf2v2_nsi2v2 1.0
 */
?>

		<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( '[:en]This post is password protected. Enter the password to view any comments.[:fr]Ce poste est protégé par mot de passe. Entrez le mot de passe pour voir tous les commentaires.', 'clf2v2_nsi2v2' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
		<section>
			<h2 id="comments-title"><?php
			printf( _n( __("<!--:en-->One Response to<!--:--><!--:fr-->Une réponse à<!--:-->") . ' %2$s', '%1$s ' . __("<!--:en-->Responses to<!--:--><!--:fr-->réponses à<!--:-->") . ' %2$s', get_comments_number(), 'clf2v2_nsi2v2' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> [:en]Older Comments[:fr]Commentaires plus anciens', 'clf2v2_nsi2v2' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( '[:en]Newer Comments [:fr]Commentaires plus récents <span class="meta-nav">&rarr;</span>', 'clf2v2_nsi2v2' ) ); ?></div>
			</div> <!-- .navigation -->
	<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use clf2v2_nsi2v2_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define clf2v2_nsi2v2_comment() and that will be used instead.
					 * See clf2v2_nsi2v2_comment() in clf2v2_nsi2v2/functions.php for more.
					 */
					wp_list_comments( array( 'reply_text' => __("<!--:en-->Reply<!--:--><!--:fr-->Répondre<!--:-->"), 'login_text' => __("<!--:en-->Log in to leave a comment<!--:--><!--:fr-->Connecter pour soumettre un commentaire<!--:-->"), 'callback' => 'clf2v2_nsi2v2_comment' ) );
				?>
			</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span>[:en]Older Comments[:fr]Commentaires plus anciens', 'clf2v2_nsi2v2' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( '[:en]Newer Comments [:fr]Commentaires plus récents <span class="meta-nav">&rarr;</span>', 'clf2v2_nsi2v2' ) ); ?></div>
			</div><!-- .navigation -->
	<?php endif; // check for comment navigation ?>
		</section>
<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
			<p class="nocomments"><?php _e( '[:en]Comments are closed.[:fr]Les commentaires sont fermés.', 'clf2v2_nsi2v2' ); ?></p>
	<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

			<?php comment_form(array( 'fields' => apply_filters( 'comment_form_default_fields', array('author' => '<p class="comment-form-author">' . '<label for="author">' . __('<!--:en-->Name<!--:--><!--:fr-->Nom<!--:-->') . '</label> ' . ( $req ? '<span class="required" title="'. __('<!--:en-->Required<!--:--><!--:fr-->Obligatoire<!--:-->') .'">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>', 'email'  => '<p class="comment-form-email"><label for="email">' . __('<!--:en-->Email<!--:--><!--:fr-->Courriel<!--:-->') . '</label> ' . ( $req ? '<span class="required" title="'. __('<!--:en-->Required<!--:--><!--:fr-->Obligatoire<!--:-->') .'">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>', 'url'    => '<p class="comment-form-url"><label for="url">' . __('<!--:en-->Website<!--:--><!--:fr-->Site Web<!--:-->') . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>' ) ), 'title_reply' => __("<!--:en-->Leave a Reply<!--:--><!--:fr-->Soumettre une réponse<!--:-->"), 'title_reply_to' => __("<!--:en-->Leave a Reply to<!--:--><!--:fr-->Soumettre une réponse à<!--:-->") . ' %s', 'cancel_reply_link' => __("<!--:en-->Cancel reply<!--:--><!--:fr-->Annuler la réponse<!--:-->"), 'label_submit' => __("<!--:en-->Post Comment<!--:--><!--:fr-->Afficher le commentaire<!--:-->"), 'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( '[:en]You may use these HTML tags and attributes:[:fr]Vous pouvez utiliser ces étiquettes et ces attributs de HTML&#160;:' . ' %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>', 'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( __('[:en]Comment[:fr]Commentaire'), 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>', 'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( __('[:en]Logged in as[:fr]Connecter comme') . ' <a href="%1$s">%2$s</a>. <a href="%3$s" title="' . __('[:en]Log out of this account">Log out?[:fr]Fermer la session pour ce compte">Fermer la session?') . '</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>', 'comment_notes_before' => '<p class="comment-notes">' . __('<!--:en-->Your email address will not be published. Required fields are marked <span class="required" title="Required">*</span>.<!--:--><!--:fr-->Votre courriel ne sera pas publié. Les champs obligatoires sont marqués <span class="required" title="Obligatoire">*</span>.<!--:-->') . ( $req ? $required_text : '' ) . '</p>' ) ); ?>
		</div><!-- #comments -->
