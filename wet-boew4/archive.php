<?php get_header(); ?>

<div class="container">
<div class="row">

<main role="main" property="mainContentOfPage" class="col-md-9 col-md-push-3">
    <!-- MainContentStart -->
		
			<div class="page">
				<div class="alignleft"><?php next_posts_link(__("<!--:en-->&laquo; Older Entries<!--:--><!--:fr-->&laquo; Entrées plus vielles<!--:-->")) ?></div>
				<div class="alignright"><?php previous_posts_link(__("<!--:en-->Newer Entries &raquo;<!--:--><!--:fr-->Entrées plus récentes &raquo;<!--:-->")) ?></div>
			</div>
			
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<!-- Content title begins / Début du titre du contenu -->	
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h1 id="wb-cont"><?php _e("<!--:en-->Category:<!--:--><!--:fr-->Catégorie&#160;:<!--:-->"); ?> <?php single_cat_title(); ?></h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?> 
			<h1 id="wb-cont"><?php _e("<!--:en-->Tag:<!--:--><!--:fr-->Étiquette&#160;:<!--:-->"); ?> <?php single_tag_title(); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h1 id="wb-cont"><?php _e("<!--:en-->Day:<!--:--><!--:fr-->Jour&#160;:<!--:-->"); ?> <?php the_time('F j, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1 id="wb-cont"><?php _e("<!--:en-->Month:<!--:--><!--:fr-->Mois&#160;:<!--:-->"); ?> <?php the_time('F Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h1 id="wb-cont"><?php _e("<!--:en-->Year:<!--:--><!--:fr-->Année&#160;:<!--:-->"); ?> <?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h1 id="wb-cont"><?php _e("<!--:en-->Author<!--:--><!--:fr-->Auteur<!--:-->"); ?></h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1 id="wb-cont"><?php _e("<!--:en-->Blog's Archives<!--:--><!--:fr-->Archives du blogue<!--:-->"); ?></h1>
		<?php } ?>
			<!-- Content Title ends / Fin du titre du contenu -->

<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
		<?php while (have_posts()) : the_post(); ?>
			<article id="article-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<pre><?php _e("<!--:en-->Date Issued: <!--:--><!--:fr-->Date de publication&nbsp;: <!--:-->"); ?><time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('j F Y') ?></time></pre>
				<?php the_content(__("<!--:en--><p>Read this article &raquo;</p><!--:--><!--:fr--><p>Lire cet article &raquo;</p><!--:-->")); ?>
				<p class="postmetadata"><?php the_tags(__("<!--:en-->Tags: <!--:--><!--:fr-->Étiquettes&#160;: <!--:-->"), ', ', '<br />'); ?> In: <?php the_category(', ') ?> | <?php edit_post_link(__("<!--:en-->Edit<!--:--><!--:fr-->Modifier<!--:-->"), '', ' | '); ?>  <?php comments_popup_link(__("<!--:en-->No comments &raquo;<!--:--><!--:fr-->Aucuns commentaires &raquo;<!--:-->"), __("<!--:en-->1 comment &raquo;<!--:--><!--:fr-->1 commentaire &raquo;<!--:-->"), __("<!--:en-->% comments &raquo;<!--:--><!--:fr-->% commentaires &raquo;<!--:-->"), 'comments-link', __("<!--:en-->Comments are closed<!--:--><!--:fr-->Commentaires sont fermés<!--:-->")); ?></p>
			</article>
		<?php endwhile; ?> 
				
			<div class="page">
				<div class="left"><?php next_posts_link(__("<!--:en-->&laquo; Older Entries<!--:--><!--:fr-->&laquo; Entrées plus vielles<!--:-->")) ?></div>
				<div class="right"><?php previous_posts_link(__("<!--:en-->Newer Entries &raquo;<!--:--><!--:fr-->Entrées plus récentes &raquo;<!--:-->")) ?></div>
			</div>    
	<?php else :
			if ( is_category() ) { // If this is a category archive
				printf(__("<!--:en--><h1 id=\"wb-cont\">No article in this category %s</h2><!--:--><!--:fr--><h1 id=\"wb-cont\">Aucun article dans cette catégorie %s</h1><!--:-->"), single_cat_title('',false));
			} else if ( is_date() ) { // If this is a date archive
				echo(__("<!--:en--><h1 id=\"wb-cont\">Sorry, no article for this date<!--:--><!--:fr--><h1 id=\"wb-cont\">Désolé, aucun article pour cette date</h1><!--:-->"));
			} else if ( is_author() ) { // If this is a category archive
				$userdata = get_userdatabylogin(get_query_var('author_name'));
				printf(__("<!--:en--><h1 id=\"wb-cont\">Sorry, %s didn't write any articles yet</h1><!--:--><!--:fr--><h1 id=\"wb-cont\">Désolé, %s n'a pas écrit un article</h1><!--:-->"), $userdata->display_name);
			} else {
				echo(__("<!--:en--><h1 id=\"wb-cont\">Not found</h1><!--:--><!--:fr--><h1 id=\"wb-cont\">Introuvable</h1><!--:-->"));
			}
			get_search_form();

		endif;
	?>
    <!-- Date Modified begins / Début de la date de modification -->
			<dl id="wb-dtmd" role="contentinfo" property="dateModified">
            <dt><?php _e("<!--:en-->Date modified: <!--:--><!--:fr-->Date de modification&#160;:<!--:-->"); ?></dt> 
                 <dd>
                   <time><?php the_time('Y-m-d') ?></time>
                 </dd>
            </dl>
			<!-- Date Modified ends / Fin de la date de modification -->
		</main>
		<!-- Main content ends / Fin du contenu principal --> 

<?php get_sidebar(); ?>
		</div></div>
<?php get_footer(); ?>