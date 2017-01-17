<?php get_header(); ?>
<main role="main" property="mainContentOfPage" class="container">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
	<h1 id="wb-cont"><?php _e("Section :", "wet-boew"); ?> <?php single_cat_title(); ?></h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?> 
	<h1 id="wb-cont"><?php _e("Étiquette :", "wet-boew"); ?> <?php single_tag_title(); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1 id="wb-cont"><?php _e("Jour :", "wet-boew"); ?> <?php the_time('F j, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1 id="wb-cont"><?php _e("Mois :", "wet-boew"); ?> <?php the_time('F Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1 id="wb-cont"><?php _e("Année :", "wet-boew"); ?> <?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1 id="wb-cont"><?php _e("Auteur :", "wet-boew"); ?> <?php the_author() ?></h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 id="wb-cont"><?php _e("Archive du blogue", "wet-boew"); ?></h1>
		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>

			<section id="article-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
	
				<p><small><?php 
					the_category(', ');
					
					the_tags( ' - (', ', ', ') - ' );
					
					echo (" <em>"); 
					
					comments_popup_link(
						__("Aucuns commentaires", "wet-boew" ), 
						__("1 commentaire", "wet-boew" ), 
						__("% commentaires", "wet-boew" ), 
						'comments-link', 
						__("Les commentaires sont fermés.", "wet-boew" )
					);

					echo ("</em>"); 
				?></small></p>
				

				<p><a href="<?php the_permalink() ?>"> <?php echo( strip_tags( get_the_excerpt() ) );	?></a></p>
				
				<p><?php _e("Publié le :", "wet-boew"); ?> <time><?php the_time('j F Y') ?></time>, <?php _e("par", "wet-boew"); ?> <?php the_author() ?></p>

			</section>
		<?php endwhile; ?> 
				
			<nav>
				<ul>
					<li><?php next_posts_link(__("Des articles plus anciens", "wet-boew")) ?></li>
					<li><?php previous_posts_link(__("Des article plus récents", "wet-boew")) ?></li>
				</ul>
			</nav>    
	<?php else :
			if ( is_category() ) { // If this is a category archive
				printf(__("<h1 id=\"wb-cont\">Aucun article dans la catégorie : %s</h1>", "wet-boew"), single_cat_title('',false));
			} else if ( is_date() ) { // If this is a date archive
				printf(__("<h1 id=\"wb-cont\">Désolé, aucun article pour la date : %s</h1>", "wet-boew"), the_time('F j, Y'));
			} else if ( is_author() ) { // If this is a category archive
				$userdata = get_userdatabylogin(get_query_var('author_name'));
				printf(__("<h1 id=\"wb-cont\">Désolé, %s n'a pas écrit un article</h1>", "wet-boew"), $userdata->display_name);
			} else {
				echo(__("<h1 id=\"wb-cont\">Introuvable</h1>", "wet-boew"));
			}
			get_search_form();

		endif;
	?>

	<div class="clearfix"></div>
	<dl id="wb-dtmd" role="contentinfo" property="dateModified">
		<dt><?php _e( "Dernière modification&#160;:", "wet-boew" ); ?></dt> 
		 <dd>
		   <time><?php the_time('Y-m-d') ?></time>
		 </dd>
	</dl>
</main>
<?php get_footer(); ?>