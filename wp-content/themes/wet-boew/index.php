<?php get_header(); ?>


<main role="main" property="mainContentOfPage" class="container">

<?php

/* 
 * Default: Show the first post, the the exerpt for the rest
 *
 * - h1
 * - [Author function/action]
 * - 

*/

if (have_posts()) : the_post();
?>
	<article id="<?php the_ID(); ?>">
		<header>
			<h1 id="wb-cont" property="name"><?php the_title(); ?> <!--<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Lien permanent pour", "wet-boew"); ?> <?php the_title_attribute(); ?>"></a> --></h1>

			<?php if ( is_author() ) ?>
				<p class="pull-right wp-wb-author"><span class="glyphicon glyphicon-pencil"></span> <?php edit_post_link( __("Modifier", "wet-boew") ); ?></p>
			<?php endif; ?>
		</header>
		
		<aside>
			<p><?php the_category( ', ' ); ?><?php the_tags( ' - (', ', ', ')' ); ?></p>
		</aside>
		
		<?php the_content( __( "Lire cet article", "wet-boew" ) ); ?>
<!--
		<aside>
			<h2><?php _e( "Commentaires", "wet-boew" ); ?></h2>
			<p><?php comments_popup_link(
				__("Aucuns commentaires"), 
				__("1 commentaire"), 
				__("% commentaires"), 
				'comments-link', 
				__("Les commentaires sont fermés.")); ?></p>
		<aside>
-->		
		<dl id="wb-dtmd" class="pull-right" role="contentinfo" property="dateModified">
			<dt><?php _e( "Publié le :", "wet-boew" ); ?></dt> 
			 <dd>
			   <time><?php the_time('Y-m-d') ?></time>
			 </dd>
		</dl>
		
	</article>
</main>
<?php // get_sidebar(); ?>

<?php get_footer(); ?>