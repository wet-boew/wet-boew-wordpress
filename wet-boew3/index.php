<?php get_header(); ?>

	<div id="wb-core"><div id="wb-core-in" class="equalize">
    <div id="wb-main" role="main"><div id="wb-main-in">
    <!-- MainContentStart -->
			
		<?php if (have_posts()) : the_post();  ?>
		<article id="article-<?php the_ID(); ?>">
					
		<!-- Content title begins / Début du titre du contenu -->
		<header id="titre-<?php the_ID(); ?>">
			<?php if ($postindex == 0) : ?> 
			<h1 id="cn-cont"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("<!--:en-->Permalink to<!--:--><!--:fr-->Permalien à<!--:-->"); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php else : ?>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("<!--:en-->Permalink to<!--:--><!--:fr-->Permalien à<!--:-->"); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php endif; ?>
		</header>
		<!-- Content Title ends / Fin du titre du contenu -->

				<?php the_content(__("<!--:en--><p>Read this article &raquo;</p><!--:--><!--:fr--><p>Lire cet article &raquo;</p><!--:-->")); ?>
				
				<p class="postmetadata"><?php the_tags(__("<!--:en-->Tags:<!--:--><!--:fr-->Étiquettes&#160;:<!--:-->"), ', ', '<br />'); ?> <?php _e("<!--:en-->In: <!--:--><!--:fr-->Dans la: <!--:-->"); ?> <?php the_category(', ') ?> | <?php edit_post_link(__("<!--:en-->Edit<!--:--><!--:fr-->Modifier<!--:-->"), '', ' | '); ?>  <?php comments_popup_link(__("<!--:en-->No comments &raquo;<!--:--><!--:fr-->Aucuns commentaires &raquo;<!--:-->"), __("<!--:en-->1 comment &raquo;<!--:--><!--:fr-->1 commentaire &raquo;<!--:-->"), __("<!--:en-->% comments &raquo;<!--:--><!--:fr-->% commentaires &raquo;<!--:-->"), 'comments-link', __("<!--:en-->Comments are closed<!--:--><!--:fr-->Les commentaires sont fermés.<!--:-->")); ?></p>
				<hr />
	</article>
<?php while (have_posts()) : the_post(); ?>
	<article id="article-<?php the_ID(); ?>">
					
		<!-- Content title begins / Début du titre du contenu -->
		<header id="titre-<?php the_ID(); ?>">
			<?php if ($postindex == 0) : ?> 
			<h2 id="cn-cont-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("<!--:en-->Permalink to<!--:--><!--:fr-->Permalien à<!--:-->"); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php else : ?>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("<!--:en-->Permalink to<!--:--><!--:fr-->Permalien à<!--:-->"); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php endif; ?>
		</header>
		<!-- Content Title ends / Fin du titre du contenu -->

				<?php the_content(__("<!--:en--><p>Read this article &raquo;</p><!--:--><!--:fr--><p>Lire cet article &raquo;</p><!--:-->")); ?>
				
				<p class="postmetadata"><?php the_tags(__("<!--:en-->Tags:<!--:--><!--:fr-->Étiquettes&#160;:<!--:-->"), ', ', '<br />'); ?> <?php _e("<!--:en-->In: <!--:--><!--:fr-->Dans la: <!--:-->"); ?> <?php the_category(', ') ?> | <?php edit_post_link(__("<!--:en-->Edit<!--:--><!--:fr-->Modifier<!--:-->"), '', ' | '); ?>  <?php comments_popup_link(__("<!--:en-->No comments &raquo;<!--:--><!--:fr-->Aucuns commentaires &raquo;<!--:-->"), __("<!--:en-->1 comment &raquo;<!--:--><!--:fr-->1 commentaire &raquo;<!--:-->"), __("<!--:en-->% comments &raquo;<!--:--><!--:fr-->% commentaires &raquo;<!--:-->"), 'comments-link', __("<!--:en-->Comments are closed<!--:--><!--:fr-->Les commentaires sont fermés.<!--:-->")); ?></p>
				<hr />
	</article>
		<?php endwhile; ?>
			<div class="pages">
				<div class="left"><?php next_posts_link(__("<!--:en-->&laquo; Older Entries<!--:--><!--:fr-->&laquo; Entrées plus anciennes<!--:-->")) ?></div>
				<div class="right"><?php previous_posts_link(__("<!--:en-->Newer Entries &raquo;<!--:--><!--:fr-->Entrées plus récentes &raquo;<!--:-->")) ?></div>
			</div> 
	<?php else : ?>
			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="cn-cont" class="center"><?php _e("<!--:en-->Not Found.<!--:--><!--:fr-->Introuvable.<!--:-->"); ?></h1>
			<!-- Content Title ends / Fin du titre du contenu -->

<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
			<p><?php _e("<!--:en-->Sorry, but you are looking for something that isn't here.<!--:--><!--:fr-->Désolé, mais vous cherchez quelque chose qui n'est pas ici.<!--:-->"); ?></p>
			<!--?php get_search_form(); ?-->
	<?php endif; ?>
				<!-- Date Modified begins / Début de la date de modification -->
                
			<dl id="gcwu-date-mod" role="contentinfo">
				<dt><?php _e("<!--:en-->Date modified: <!--:--><!--:fr-->Date de modification&#160;:<!--:-->"); ?></dt>
				<dd><span><time><?php the_time('Y-m-d') ?></time></span></dd>
			</dl>
			<div class="clear"></div>
			<!-- Date Modified ends / Fin de la date de modification -->
<!-- GC Web Usability theme ends / Fin du thème de la facilité d'emploi GC -->
		</div></div>
		<!-- Main content ends / Fin du contenu principal -->
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>