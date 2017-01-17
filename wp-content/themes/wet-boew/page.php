<?php get_header(); ?>

<main role="main" property="mainContentOfPage" class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 id="wb-cont" property="name"><?php the_title(); ?></h1>
			
			<?php the_content(); ?>

			<?php wp_link_pages(array('before' => __("<p><strong>Pages:</strong>"), 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
	<?php endwhile; endif; ?>

	<div class="clearfix"></div>
	<dl id="wb-dtmd" class="pull-right" role="contentinfo" property="dateModified">
		<dt><?php _e( "Modifier le :", "wet-boew" ); ?></dt> 
		 <dd>
		   <time><?php the_time('Y-m-d') ?></time>
		 </dd>
	</dl>
</main>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
