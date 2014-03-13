<?php get_header(); ?>

<div class="container">
<div class="row">

<main role="main" property="mainContentOfPage" class="col-md-9 col-md-push-3">

    <!-- MainContentStart -->
			<!-- Content title begins / Début du titre du contenu -->
			<h1 id="wb-cont" property="name">Page not found: 404 error</h1>
			<!-- Content Title ends / Fin du titre du contenu -->
			
<!-- clf2-nsi2 theme begins / Début du thème clf2-nsi2 -->
			<p><?php _e("<!--:en-->Unfortunately the content you're looking for isn't here. There may be a misspelling in your web address or you may have clicked a link for content that no longer exists. Perhaps you would be interested in our most recent articles.<!--:--><!--:fr-->Malheureusement, le contenu que vous recherchez n'est pas ici. Il peut y avoir une faute d'orthographe dans votre adresse web ou que vous ayez cliqué sur un lien pour le contenu qui n'existe plus. Peut-être que vous seriez intéressé par nos articles les plus récents.<!--:-->"); ?></p>
			<section>
				<h2><?php _e("<!--:en-->Recent Articles<!--:--><!--:fr-->Articles récents<!--:-->"); ?></h2>
				   <?php query_posts('cat=&showposts=5'); ?>
					<ul id="recentPosts">
				   <?php while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					<pre><time datetime="<?php the_date('Y-m-d', '', ''); ?>" pubdate><?php the_time('F j, Y'); ?></time></pre></li>
					<?php endwhile; ?>
					</ul>
			</section>
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