<?php get_header(); ?>

<main role="main" property="mainContentOfPage" class="container">
	<?php if (have_posts()) : the_post(); ?>

		<h1 id="wb-cont" property="name"><?php the_title(); ?></h1>
			<?php

			if ( has_post_thumbnail() ) {
				?>
		<div class="row">
			<div class="col-xs-12">
				<img class="img-responsive mrgn-bttm-md" src="<?php echo( wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'full' )[ 0 ] ); ?>" alt="" />
			</div>
		</div>
			<?php } ?>
		<div class="row">
			<div class="col-md-8">
		<?php the_content(); ?>
		
	<?php endif; ?>

		<div class="clearfix"></div>
	<dl id="wb-dtmd" class="pull-right" role="contentinfo" property="dateModified">
		<dt><?php _e( "Modifier le :", "wet-boew" ); ?></dt> 
		 <dd>
		   <time><?php the_time('Y-m-d') ?></time>
		 </dd>
	</dl>
	</div>

	<div class="col-md-4">
		<?php front_page_StickyPost(); ?>
		
		
	
		<section>
			<h2 class="mrgn-tp-sm"><?php _e("Articles récents", "wet-boew"); ?></h2>
			<?php query_posts('cat=&showposts=7'); ?>
			<ul id="recentPosts">
				<?php while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> (<time datetime="<?php the_date('Y-m-d', '', ''); ?>" pubdate><?php the_time('F j, Y'); ?></time>)</li>
				<?php endwhile; ?>
			</ul>
		</section>
	</div>
	</div>
</main>
<?php // get_sidebar(); ?>



<?php get_footer(); ?>
