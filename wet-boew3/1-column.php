<?php
/* Template Name: 1 Column Layout */ 
$clf_col_num = '1';
get_header();
?>
	<div id="wb-core"><div id="wb-core-in" class="equalize">
    <div id="wb-main" role="main"><div id="wb-main-in">
    <!-- MainContentStart -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="wb-cont"><?php the_title(); ?></h1>
			<!-- Content Title ends / Fin du titre du contenu -->
			
<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
			<?php the_content(__("<!--:en--><p>Read this article &raquo;</p><!--:--><!--:fr--><p>Lire cet article &raquo;</p><!--:-->")); ?>
			<?php wp_link_pages(array('before' => __("<!--:en--><p><strong>Pages:</strong> <!--:--><!--:fr--><p><strong>Pages&#160;:</strong> <!--:-->"), 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<pre><?php _e("<!--:en-->Date Issued: <!--:--><!--:fr-->Date de publication&nbsp;: <!--:-->"); ?><time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y-m-d') ?></time></pre>
			<p class="postmetadata"><?php the_tags(__("<!--:en-->Tags: <!--:--><!--:fr-->Étiquettes&#160;: <!--:-->"), ', ', '<br />'); ?> <?php _e("<!--:en-->In: <!--:--><!--:fr-->Dans la: <!--:-->"); ?> <?php the_category(', ') ?> | <?php edit_post_link(__("<!--:en-->Edit<!--:--><!--:fr-->Modifier<!--:-->"), '', ' | '); ?>  <?php comments_popup_link(__("<!--:en-->No comments &raquo;<!--:--><!--:fr-->Aucuns commentaires &raquo;<!--:-->"), __("<!--:en-->1 comment &raquo;<!--:--><!--:fr-->1 commentaire &raquo;<!--:-->"), __("<!--:en-->% comments &raquo;<!--:--><!--:fr-->% commentaires &raquo;<!--:-->"), 'comments-link', __("<!--:en-->Comments are closed<!--:--><!--:fr-->Les commentaires sont fermés.<!--:-->")); ?> | <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("<!--:en-->Permalink to<!--:--><!--:fr-->Permalien à<!--:-->"); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<?php comments_template(); ?>
		<?php endwhile; else: ?>
			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="cn-cont"><?php _e("<!--:en-->404 Error<!--:--><!--:fr-->Erreur 404<!--:-->"); ?></h1>
			<!-- Content Title ends / Fin du titre du contenu -->

<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->        
			<p><?php _e("<!--:en-->Sorry, but you are looking for something that isn't here.<!--:--><!--:fr-->Désolé, mais vous cherchez quelque chose qui n'est pas ici.<!--:-->"); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
<!-- Date Modified begins / Début de la date de modification -->
			<dl id="gcwu-date-mod" role="contentinfo">
				<dt><?php _e("<!--:en-->Date modified: <!--:--><!--:fr-->Date de modification&#160;:<!--:-->"); ?></dt>
				<dd><span><time><?php the_time('Y-m-d') ?></time></span></dd>
			</dl>
			<div class="clear"></div>
			<!-- Date Modified ends / Fin de la date de modification -->
<!-- clf2-nsi2 theme ends / Fin du thème clf2-nsi2 -->
		</div></div>
		<!-- Main content ends / Fin du contenu principal --> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>