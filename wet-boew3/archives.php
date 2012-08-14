<?php get_header(); ?>
	<div id="wb-core"><div id="wb-core-in" class="equalize">
    <div id="wb-main" role="main"><div id="wb-main-in">
    <!-- MainContentStart -->
			
			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="wb-cont"><?php the_title(); ?></h1>
			<!-- Content Title ends / Fin du titre du contenu -->
			
<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
			<?php get_search_form(); ?>
			<section>
				<h2><?php _e("<!--:en-->Months<!--:--><!--:fr-->Mois<!--:-->"); ?></h2>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</section>		
			<section>
				<h2><?php _e("<!--:en-->Categories<!--:--><!--:fr-->Catégories<!--:-->"); ?></h2>
				<ul>
					<?php wp_list_categories(); ?>
				</ul>
			</section>
			<section>
				<h2><?php _e("<!--:en-->Tags<!--:--><!--:fr-->Étiquettes<!--:-->"); ?></h2>
				<ul>
					<?php wp_tag_cloud('format=list'); ?>
				</ul>
			</section>
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