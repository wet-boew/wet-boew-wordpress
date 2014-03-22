<?php get_header(); ?>

<div class="container">
<div class="row">

<main role="main" property="mainContentOfPage" class="col-md-9 col-md-push-3">
    <!-- MainContentStart -->
	<?php if (have_posts()) : ?>

			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="wb-cont"><?php _e("<!--:en-->Search Results<!--:--><!--:fr-->Résultats de la recherche<!--:-->"); ?></h1>
			<!-- Content Title ends / Fin du titre du contenu -->
			
<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
			<?php while (have_posts()) : the_post(); ?>
			<article id="article-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permalink to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<pre><?php _e("<!--:en-->Date Issued: <!--:--><!--:fr-->Date de publication&nbsp;: <!--:-->"); ?><time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('j F Y') ?></time></pre>
				<?php the_excerpt(__("<!--:en--><p>Read this article &raquo;</p><!--:--><!--:fr--><p>Lire cet article &raquo;</p><!--:-->")); ?>
				<p class="postmetadata"><?php the_tags(__("<!--:en-->Tags:<!--:--><!--:fr-->Étiquettes&#160;:<!--:-->"), ', ', '<br />'); ?> <?php _e("<!--:en-->In:<!--:--><!--:fr-->dans&nbsp;: <!--:-->"); ?> <?php the_category(', ') ?> | <?php edit_post_link(__("<!--:en-->Modifier<!--:--><!--:fr-->Modifier<!--:-->"), '', ' | '); ?>  <?php comments_popup_link(__("<!--:en-->No comments &raquo;<!--:--><!--:fr-->Aucuns commentaires &raquo;<!--:-->"), __("<!--:en-->1 comment &raquo;<!--:--><!--:fr-->1 commentaire &raquo;<!--:-->"), __("<!--:en-->% comments &raquo;<!--:--><!--:fr-->% commentaires &raquo;<!--:-->"), 'comments-link', __("<!--:en-->Comments are closed<!--:--><!--:fr-->Les commentaires sont fermés.<!--:-->")); ?></p>
			</article>	
			<?php endwhile; ?>
			
			<div class="page">
				<div class="left"><?php next_posts_link(__("<!--:en-->&laquo; Older Entries<!--:--><!--:fr-->&laquo; Entrées plus anciennes<!--:-->")) ?></div>
				<div class="right"><?php previous_posts_link(__("<!--:en-->Newer Entries &raquo;<!--:--><!--:fr-->Entrées plus récentes &raquo;<!--:-->")) ?></div>
			</div>   
	<?php else : ?>

			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="wb-cont" class="center"><?php _e("<!--:en-->Not Found<!--:--><!--:fr-->Introuvable<!--:-->"); ?></h1>
			<!-- Content Title ends / Fin du titre du contenu -->

<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
			<p class="center"><?php _e("<!--:en-->Sorry, no posts matched your criteria.<!--:--><!--:fr-->Désolé, aucun article ne correspond à vos critères.<!--:-->"); ?></p>
	<?php endif; ?>
    <!-- Date Modified begins / Début de la date de modification -->
			<!-- Date Modified begins / Début de la date de modification -->
			<dl id="wb-dtmd" role="contentinfo" property="dateModified">
            <dt><?php _e("<!--:en-->Date modified: <!--:--><!--:fr-->Date de modification&#160;:<!--:-->"); ?></dt> 
                 <dd>
                   <time><?php the_time('Y-m-d') ?></time>
                 </dd>
            </dl>
		</main>
		<!-- Main content ends / Fin du contenu principal --> 

<?php get_sidebar(); ?>
</div></div>
<?php get_footer(); ?>
