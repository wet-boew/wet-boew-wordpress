<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to gcwu_fegc_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage wet-boew
 * @since wet-boew 4.0
 */
?>
<section id="comments">
<h2 class="wb-inv"><?php _e( 'Commentaires', 'wet-boew' ); ?></h2>
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'Ce poste est protégé par mot de passe. Entrez le mot de passe pour voir tous les commentaires.', 'wet-boew' ); ?></p>
	</section><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
		<section>
			<h3 id="comments-title"><?php
			printf( _n( __("Une réponse à") . ' %2$s', '%1$s ' . __("réponses à") . ' %2$s', get_comments_number(), 'wet-boew' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Commentaires plus anciens', 'wet-boew' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Commentaires plus récents <span class="meta-nav">&rarr;</span>', 'wet-boew' ) ); ?></div>
			</div>
	<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use clf2v2_nsi2v2_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define clf2v2_nsi2v2_comment() and that will be used instead.
					 * See clf2v2_nsi2v2_comment() in clf2v2_nsi2v2/functions.php for more.
					 */
					wp_list_comments( array( 'reply_text' => __("Répondre", 'wet-boew'), 'login_text' => __("Connecter pour soumettre un commentaire", 'wet-boew'), 'callback' => 'gcwu_fegc_comment' ) );
				?>
			</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Commentaires plus anciens', 'wet-boew' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Commentaires plus récents <span class="meta-nav">&rarr;</span>', 'wet-boew' ) ); ?></div>
			</div>
	<?php endif; // check for comment navigation ?>
		</section>
<?php else :

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
			<p class="nocomments"><?php _e( 'Les commentaires sont fermés.', 'wet-boew' ); ?></p>
	<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php 
	comment_form(
		array( 
			'fields' => 
				apply_filters( 
					'comment_form_default_fields', 
					
					array( 
						'author' => '<p class="comment-form-author">' . 
							'<label for="author" class="required"><span class="field-name">' . 
							__('Nom', 'wet-boew') . 
							'</span> <strong class="required">' . 
							_x( '(requis)', 'noun', 'wet-boew' ) . 
							'</strong></label> ' . 
							( $req ? '<span class="required">*</span>' : '' ) . 
							'<input id="author" name="author" type="text" value="' . 
							esc_attr( $commenter[ 'comment_author' ] ) . '" size="30"' . $aria_req . 
							' /></p>', 
						
						'email' => 
							'<p class="comment-form-email"><label for="email" class="required"><span class="field-name">' . 
							__('Courriel', 'wet-boew') . 
							'</span> <strong class="required">' . 
							_x( '(requis)', 'noun', 'wet-boew' ) . 
							'</strong></label> ' . 
							( $req ? '<span class="required" >*</span>' : '' ) . 
							'<input id="email" name="email" type="text" value="' . 
							esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . 
							' /></p>', 
						
						'url'    => '<p class="comment-form-url"><label for="url">' . __('Site Web', 'wet-boew') . '</label>' . 
							'<input id="url" name="url" type="text" value="' . 
							esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>' 
					) 
				), 

			'title_reply' => __("Soumettre une réponse", 'wet-boew'), 
			
			'title_reply_to' => __("Soumettre une réponse à %s", 'wet-boew'),

			'cancel_reply_link' => __("Annuler la réponse", 'wet-boew'), 
			
			'label_submit' => __("Transmettre votre commentaire", 'wet-boew'), 
			
			'comment_field' => '<div class="form-group"><label for="comment" class="required"><span class="field-name">' . 
				_x( 'Commentaire', 'noun', 'wet-boew' ) . 
				'</span> <strong class="required">' . 
				_x( '(requis)', 'noun', 'wet-boew' ) . 
				'</strong></label> <a class="wb-lbx" href="#comment-info-popup" aria-controls="comment-info-popup" role="button"><span class=" glyphicon glyphicon-info-sign"></span><span class="wb-inv">Information</span></a><textarea id="comment" name="comment" cols="45" rows="3" required="required" class="form-control"></textarea></div>', 
			
			'logged_in_as' => '<p class="logged-in-as">' . 
				sprintf( 
					__( 'Connecter étant <a href="%1$s">%2$s</a>. <a href="%3$s">Fermer la session?</a>', 'wet-boew' ), 
					admin_url( 'profile.php' ), 
					$user_identity,
					wp_logout_url(
						apply_filters( 'the_permalink', get_permalink( $post_id ) ) 
					)
				) . '</p>',

			'comment_notes_before' => '<p class="comment-notes">' . 
				__('Votre courriel ne sera pas publié. Les champs obligatoires sont marqués <span class="required">*</span>.', 'wet-boew') .
					( $req ? $required_text : '' ) .
					'</p>' 
		) 
	); 
?>

	<section id="comment-info-popup" class="mfp-hide modal-dialog modal-content overlay-def">
		<header class="modal-header">
			<h3 class="modal-title"><?php _e( 'Votre commentaire', 'wet-boew' ); ?></h3>
		</header>
		<div class="modal-body">
			<dl>
				<dt><?php _e( 'Contenu', 'wet-boew' ); ?></dt>
				<dd><?php _e( '<strong>Doit</strong> être respectueux et convenable.', 'wet-boew' ); ?></dd>
				
				<dt><?php _e( 'Publication', 'wet-boew' ); ?></dt>
				<dd><?php _e( '<strong>Indiquer clairement</strong> si vous ne voulez pas que votre commentaire soit publié. Ceci peut être fait en ajoutant un texte similaire à "message à l\'auteur seulement; privé; ne pas publié;..." au début ou à la fin de votre commentaire.', 'wet-boew' ); ?></dd>
				
				<dt><?php _e( 'Attribut HTML', 'wet-boew' ); ?></dt>
				<dd><?php echo( sprintf( __( 'Vous pouvez utiliser ces étiquettes et ces attributs de HTML&#160;: <code>%s</code>', 'wet-boew' ), allowed_tags() ) ); ?></dd>
			</dl>
		</div>
	</section>
</section><!-- #comments -->

