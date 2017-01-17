<?php get_header(); ?>
<main role="main" property="mainContentOfPage" class="container">
<?php if (have_posts()) : the_post(); ?>
	<h1 id="wb-cont" property="name"><?php the_title(); ?></h1>
	
	<?php if ( is_author() ) ?>
		<p class="pull-right wp-wb-author"><span class="glyphicon glyphicon-pencil"></span> <?php edit_post_link( __("Modifier", "wet-boew") ); ?></p>
	<?php endif; ?>
	
	<aside>
		<p><?php 
		
		the_tags( '(', ', ', ') - ' );
		
		echo ("<em>"); 
		
		comments_popup_link(
			__("Aucuns commentaires", "wet-boew" ), 
			__("1 commentaire", "wet-boew" ), 
			__("% commentaires", "wet-boew" ), 
			'comments-link', 
			__("Les commentaires sont fermés.", "wet-boew" )
		);

		echo ("</em>"); 

		?></p>
	</aside>
	
	<?php

	if ( has_post_thumbnail() ) {
		?> <img class="col-md-4 pull-right mrgn-bttm-sm mrgn-lft-sm img-responsive" src="<?php echo( wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'large' )[ 0 ] ); ?>" alt="" />
		<?php
	} 
	
	if ( has_excerpt() ) {
		?>
		<p property="description"><?php echo( strip_tags( get_the_excerpt() ) ); ?></p>
		<?php
	}

	the_content(); ?>
	
	<div class="clearfix"></div>
	<dl id="wb-dtmd" class="pull-right" role="contentinfo" property="dateModified">
		<dt><?php _e( "Publié le :", "wet-boew" ); ?></dt> 
		 <dd>
		   <time><?php the_time('Y-m-d') ?></time>
		 </dd>
	</dl>

	
	<?php comments_template(); ?>
	
	<nav>
		<h2 class="h3"><?php _e("Voir aussi:", "wet-boew") ?></h2>
<?php
	$prev_post = get_previous_post();
	$notEmpty_prev_post = !empty( $prev_post );
	$next_post = get_next_post();
	$notEmpty_next_post = !empty( $next_post );

	if ( $notEmpty_prev_post || $notEmpty_next_post ) {
		echo( "<ul>" );
		
		if ( $notEmpty_prev_post ) {
			echo( '<li><a href="' . get_permalink( $prev_post->ID ) . '">' . $prev_post->post_title . '</a></li>' );
		}

		if ( $notEmpty_next_post ){
			echo( '<li><a href="' . get_permalink( $next_post->ID ) . '">' . $next_post->post_title . '</a></li>' );
		}
		echo( "</ul>" );
		
	} else {
		_e("Il n'y a pas d'article précédent ni suivant dans cette catégorie", "wet-boew");
	}
?>
	</nav>


</main>
<?php // get_sidebar(); ?>
<?php get_footer(); ?>