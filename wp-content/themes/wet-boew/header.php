<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage wet-boew
 * @since wet-boew 4.0.23
 * @author duboisp
 */

// TODO: Determine the language of the blog post
// TODO: Create a WP-plugin for that job where
//		* Choose the post language
//		* Choose equivalent link in other language
//		* Include Meta data information
//			- Page description
//
// Define a context with _e(
//	or use the _x with the "variant" :-p

$wblang = "en";
$wbaltPage = "index-fr";
$wbaltLang = "fr";

?>
<!DOCTYPE html><!--[if lt IE 9]><html class="no-js lt-ie9" lang="en" dir="ltr"><![endif]--><!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php _e( "fr", "wet-boew" ) ?>" dir="<?php _e( "ltr", "wet-boew" ) ?>">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Wordpress variant of the Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW) avec Wordpress
wet-boew.github.io/wet-boew/License-en.html / wet-boew.github.io/wet-boew/Licence-fr.html -->

<title><?php bloginfo('name'); ?></title>
<meta content="width=device-width,initial-scale=1" name="viewport">
<!-- Meta data -->
<meta name="description" content="Page description">
<!-- Meta data-->
<!--[if gte IE 9 | !IE ]><!-->
<!-- <link href="<?php bloginfo('template_directory') ?>/<?php echo( get_theme_mod(wet_boew_theme, 'theme-wet-boew')); ?>/assets/favicon.ico" rel="icon" type="image/x-icon"> -->
<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/<?php echo( get_theme_mod(wet_boew_theme, 'theme-wet-boew'));  ?>/css/theme.min.css">
<!--<![endif]-->
<!--[if lt IE 9]>
<link href="<?php bloginfo('template_directory') ?>/<?php echo( get_theme_mod(wet_boew_theme, 'theme-wet-boew')); ?>/assets/favicon.ico" rel="shortcut icon" />
<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/<?php echo( get_theme_mod(wet_boew_theme, 'theme-wet-boew'));  ?>/css/ie8-theme.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/wet-boew/js/ie8-wet-boew.min.js"></script>
<![endif]-->
<noscript><link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/wet-boew/css/noscript.min.css" /></noscript>

<!-- WordPress Begins -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!-- WordPress Ends -->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />

</head>

<body vocab="http://schema.org/" typeof="WebPage" <?php body_class(); ?>>

<ul id="wb-tphp">
<li class="wb-slc">
<a class="wb-sl" href="#wb-cont"><?php _e( "Passer au contenu principal", "wet-boew" ); ?></a>
</li>
<li class="wb-slc visible-sm visible-md visible-lg">
<a class="wb-sl" href="#wb-info"><?php _e( "Passer à «&#160;À propos de ce site&#160;»", "wet-boew" ); ?></a>
</li>
</ul>
<header role="banner">
	<div id="wb-bnr">
		<div id="wb-bar">
			<div class="container">
				<div class="row">
					<!--
					<section id="wb-lng" class="visible-md visible-lg">
						<h2>Sélection de la langue</h2>
						<ul class="text-right">
							<li><a lang="en" hreflang="en" href="#unlien">English</a></li>
							<li class="curr">Français&#32;<span>(actuelle)</span></li>
						</ul>
					</section>
					-->
					<section class="wb-mb-links col-xs-12 visible-sm visible-xs" id="wb-glb-mn">
						<h2><?php _e( "Recherche et menu", "wet-boew" ) ?></h2>
						<ul class="pnl-btn list-inline text-right">
							<li><a href="#mb-pnl" title="<?php _e( "Recherche et menu", "wet-boew" ); ?>" aria-controls="mb-pnl" class="overlay-lnk btn btn-sm btn-default" role="button"><span class="glyphicon glyphicon-search"><span class="glyphicon glyphicon-th-list"><span class="wb-inv"><?php _e( "Recherche et menu", "wet-boew" ); ?></span></span></span></a></li>
						</ul>
						<div id="mb-pnl"></div>
					</section>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div id="wb-sttl" class="col-md-8">
					<a href="<?php bloginfo('url'); ?>">
					<!-- TODO: Personalize the logo -->
					<span><?php bloginfo('name'); ?><span class="wb-inv">, </span><small><?php bloginfo('description'); ?></small></span>
					</a>
				</div>
				<section id="wb-srch" class="col-md-4 visible-md visible-lg">
					<h2><?php _e( "Recherche", "wet-boew" ) ?></h2>
					<form action="<?php bloginfo('url'); ?>/" method="get" role="search" class="form-inline">
						<div class="form-group">
							<label for="wb-srch-q"><?php _e( "Recherchez dans le site Web", "wet-boew" ) ?></label>
							<input id="wb-srch-q" class="form-control" name="s" type="search" value="<?php the_search_query(); ?>" size="27" maxlength="150">
						</div>
						<button type="submit" id="wb-srch-sub" class="btn btn-default"><?php _e( "Recherchez", "wet-boew" ) ?></button>
					</form>
				</section>
			</div>
		</div>
	</div>
	<?php 
		get_site_megamenu(); 
	?>
	<nav role="navigation" id="wb-bc" property="breadcrumb">
		<h2><?php _e( "Vous êtes ici :", "wet-boew" ) ?></h2>
		<div class="container">
			<div class="row">
				<?php the_breadcrumb($post); ?>
			</div>
		</div>
	</nav>
</header>  
