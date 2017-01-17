<?php get_header(); ?>
<main role="main" property="mainContentOfPage" class="container">
	<h1 id="wb-cont"><?php single_cat_title(); ?></h1>
	<?php echo( term_description() );

	$i_iterator = 0;
	$date_leadArticle;

	if ( function_exists( 'category_intro' ) ) {
		category_intro();
	}
	
	if (have_posts()) : ?>
		<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			
			<?php 
			if ($i_iterator) {
				echo( '<div class="col-md-6">' );
			} else {
				echo( '<div class="col-sm-12 lead">' );
				$date_leadArticle = get_the_time('j F Y') ;
			} ?>
			
				<a class="list-articles" href="<?php the_permalink() ?>">
					<figure>
						<figcaption class="<? echo ($i_iterator ? "h3": "h2" ); ?>"><?php the_title(); ?></figcaption>
						<div class="row">
						<?php
						if ( has_post_thumbnail() ) {
							?>
						<div class="col-sm-<? echo ($i_iterator ? "4": "3" ); ?> pull-left">
							<img class="img-responsive mrgn-rght-sm mrgn-bttm-sm" src="<?php echo( wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'medium' )[ 0 ] ); ?>" alt="" />
						</div>
						<div class="col-sm-8">
						<?php 
						} else {
							echo( '<div class="col-sm-12">' );
						}
						?>
						
							<p<? echo (!$i_iterator ? ' class="mrgn-tp-lg"': '' ); ?>><?php echo( strip_tags( get_the_excerpt() ) ); ?></p>
							
							<p class="pull-right"><em>(<?php _e("Publié le ", "wet-boew"); ?> <time><?php the_time('j F Y') ?></time>)</em></p>
						</div>
						</div>
					</figure>
				</a>
			</div>
			<?php
			
			if ( fmod($i_iterator, 2) == 0 || !$i_iterator ) {
				echo( '<div class="clearfix"></div>' );
			}

			$i_iterator ++;
			
			?>
		<?php endwhile; ?> 
		</div>
			<!--
			<nav>
				<ul>
					<li><?php next_posts_link(__("Des articles plus anciens", "wet-boew")) ?></li>
					<li><?php previous_posts_link(__("Des article plus récents", "wet-boew")) ?></li>
				</ul>
			</nav>
			-->
	<?php else : ?>
		<p><?php _e("Il n'y a aucun article dans cette catégorie", "wet-boew") ?></p>
	<?php endif; ?>

	<div class="clearfix"></div>
	<?php if ( $date_leadArticle ) : ?>
	<dl id="wb-dtmd" role="contentinfo" property="dateModified">
		<dt><?php _e( "Dernière modification&#160;:", "wet-boew" ); ?></dt> 
		 <dd>
		   <time><?php echo( $date_leadArticle ); ?></time>
		 </dd>
	</dl>
	<?php endif; ?>
</main>
<?php get_footer(); ?>