<?php get_header(); ?>

<main role="main" property="mainContentOfPage" class="container">
	<h1 id="wb-cont" property="name"><span class="glyphicon glyphicon-warning-sign"></span> <?php _e("Erreur HTTP 404 - Article non trouvé", "wet-boew" ); ?></h1>
	<p><?php _e("Malheureusement, le contenu que vous recherchez n'existe pas à cette addresse. Peux-être que le contenu n'existe plus ou il pourrait avoir une faute d'orthographe dans l'adresse web.", "wet-boew"); ?></p>
	<aside>
		<h2><?php _e("Articles récents", "wet-boew"); ?></h2>
		<?php query_posts('cat=&showposts=5'); ?>
		<ul id="recentPosts">
			<?php while (have_posts()) : the_post(); ?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> (<time datetime="<?php the_date('Y-m-d', '', ''); ?>" pubdate><?php the_time('F j, Y'); ?></time>)</li>
			<?php endwhile; ?>
		</ul>
	</aside>
	<dl id="wb-dtmd" role="contentinfo" property="dateModified">
	<dt><?php _e("Date de modification :", "wet-boew"); ?></dt> 
		 <dd>
		   <time><?php the_time('Y-m-d') ?></time>
		 </dd>
	</dl>
</main>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
