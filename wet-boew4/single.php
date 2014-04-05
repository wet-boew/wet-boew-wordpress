<?php get_header(); ?>

<div class="container">
<div class="row">

<main role="main" property="mainContentOfPage" class="col-md-9 col-md-push-3">
    <!-- MainContentStart -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="wb-cont" property="name"><?php the_title(); ?></h1>
			<!-- Content Title ends / Fin du titre du contenu -->
			
<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
			<div class="entry-content">
				<?php the_content(__("<!--:en--><p>Read this article &raquo;</p><!--:--><!--:fr--><p>Lire cet article &raquo;</p><!--:-->")); ?>
				<?php wp_link_pages(array('before' => __("<!--:en--><p><strong>Pages:</strong> <!--:--><!--:fr--><p><strong>Pages&#160;:</strong> <!--:-->"), 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
				
			<p class="postmetadata"><?php the_tags(__("<!--:en-->Tags: <!--:--><!--:fr-->Étiquettes&#160;: <!--:-->"), ', ', '<br />'); ?> <?php _e("<!--:en-->In: <!--:--><!--:fr-->dans&nbsp;: <!--:-->"); ?> <?php the_category(', ') ?> | <?php edit_post_link(__("<!--:en-->Edit<!--:--><!--:fr-->Modifier<!--:-->"), '', ' | '); ?>  <?php comments_popup_link(__("<!--:en-->No comments &raquo;<!--:--><!--:fr-->Aucuns commentaires &raquo;<!--:-->"), __("<!--:en-->1 comment &raquo;<!--:--><!--:fr-->1 commentaire &raquo;<!--:-->"), __("<!--:en-->% comments &raquo;<!--:--><!--:fr-->% commentaires &raquo;<!--:-->"), 'comments-link', __("<!--:en-->Comments are closed<!--:--><!--:fr-->Les commentaires sont fermés.<!--:-->")); ?></p>
			<?php comments_template(); ?>
	<?php endwhile; else: ?>

			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="wb-cont" property="name">404 Error</h1>
			<!-- Content Title ends / Fin du titre du contenu -->

<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
			<p><?php _e("<!--:en-->Sorry, no posts matched your criteria.<!--:--><!--:fr-->Désolé, aucun article correspond à vos critères.<!--:-->"); ?></p>
			<?php get_search_form(); ?>
	<?php endif; ?>
			<div class="pages">
				<div class="left"><?php previous_post_link('&laquo; %link') ?></div>
				<div class="right"><?php next_post_link('%link &raquo;') ?></div>
			</div>
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