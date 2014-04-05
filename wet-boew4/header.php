<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage wet-boew4
 * @since wet-boew 4.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 9]><html class="no-js lt-ie9" lang="<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>">
<!--<![endif]-->

<head>

<meta charset="utf-8" />

<title><?php bloginfo('name'); ?></title>

<meta name="description" content="English description / Description en anglais" />

<meta name="dcterms.creator" content="English name of the content author / Nom en anglais de l'auteur du contenu" />

<meta name="dcterms.title" content="<?php bloginfo('name'); ?>" />

<meta name="dcterms.issued" title="W3CDTF" content="<?php the_time('Y-m-d') ?>" />

<meta name="dcterms.modified" title="W3CDTF" content="<?php the_modified_time('Y-m-d') ?>" />

<meta name="dcterms.subject" title="scheme" content="English subject terms / Termes de sujet en anglais" />

<meta name="dcterms.language" title="ISO639-2" content="<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1" />

<!--[if gte IE 9 | !IE ]><!-->
<link href="<?php bloginfo('template_directory'); ?>/dist/assets/favicon.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dist/css/wet-boew.min.css" />
<!--<![endif]-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dist/css/theme.min.css" />
<!--[if lt IE 9]>
<link href="<?php bloginfo('template_directory'); ?>/dist/assets/favicon.ico" rel="shortcut icon"/>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dist/css/ie8-wet-boew.css"/>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dist/css/ie8-theme.min.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/dist/js/ie8-wet-boew.min.js"></script>
<![endif]-->

<noscript>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dist/css/noscript.min.css" />
</noscript>

<!-- WordPress Begins -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<!-- WordPress Ends -->

</head>

<body vocab="http://schema.org/" typeof="WebPage" <?php body_class(); ?>>

<ul id="wb-tphp">
        <li class="wb-slc"> <a class="wb-sl" href="#wb-cont"><?php _e("<!--:en-->Skip to main content<!--:--><!--:fr-->Passer au contenu principal<!--:-->"); ?></a> 
        </li>
        <li class="wb-slc visible-md visible-lg"> <a class="wb-sl" href="#wb-info"><?php _e("<!--:en-->Skip to site information<!--:--><!--:fr-->Passer aux informations sur le site<!--:-->"); ?></a> 
        </li>
        <?php if ($clf_col_num=='1') {
		} else {
	_e("<!--:en--><li class=\"wb-slc visible-md visible-lg\"> <a class=\"wb-sl\" href=\"#wb-sec\">Skip to secondary menu</a></li><!--:--><!--:fr--><li class=\"wb-slc visible-md visible-lg\"> <a class=\"wb-sl\" href=\"#wb-sec\">Passer au menu secondaire</a></li><!--:-->");

} ?>

</ul>

<!-- HeaderStart -->
<header role="banner">
        <div id="wb-bnr">
            <div id="wb-bar">
                <div class="container">
                    <div class="row">
                        <object id="gcwu-sig" type="image/svg+xml" tabindex="-1" role="img" data="<?php bloginfo('template_directory'); ?>/dist/assets/sig-en.svg" aria-label="<?php _e("<!--:en-->Government of Canada<!--:--><!--:fr-->Gouvernement du Canada<!--:-->"); ?>"></object>
                        <ul id="gc-bar" class="list-inline">
                            <li><a href="http://www.canada.ca/<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>/index.html" rel="external">Canada.ca</a>
                            </li>
                            <li><a href="http://www.canada.ca/<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>/services/index.html" rel="external">Services</a>
                            </li>
                            <li><a href="http://www.canada.ca/<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>/gov/dept/index.html" rel="external"><?php _e("<!--:en-->Departments<!--:--><!--:fr-->Ministères<!--:-->"); ?></a>
                            </li>
                            <li id="wb-lng">
                                <h2><?php _e("<!--:en-->Language selection<!--:--><!--:fr-->Sélection de la langue<!--:-->"); ?></h2> 
                                <ul class="list-inline">
                                    <li><a lang="<?php _e("<!--:en-->fr<!--:--><!--:fr-->en<!--:-->"); ?>" href="<?php _e("<!--:en-->" . qtrans_convertURL($url, 'fr') . "<!--:--><!--:fr-->" . qtrans_convertURL($url, 'en') . "<!--:-->"); ?>"><?php _e("<!--:en-->Français<!--:--><!--:fr-->English<!--:-->"); ?></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <section class="wb-mb-links col-xs-12 visible-sm visible-xs" id="wb-glb-mn">
                            <h2>Menu</h2> 
                            <ul class="pnl-btn list-inline text-right">
                                <li><a href="#mb-pnl" title="Menu" aria-controls="mb-pnl" class="overlay-lnk" role="button"><span class="glyphicon glyphicon-th-list"><span class="wb-inv">Menu</span></span></a>
                                </li>
                            </ul>
                            <div id="mb-pnl"></div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div id="wb-sttl" class="col-md-5">
                        <a href="<?php bloginfo('url'); ?>"> <span><?php bloginfo('name'); ?></span> 
                        </a>
                    </div>
                    <object id="wmms" type="image/svg+xml" tabindex="-1" role="img" data="<?php bloginfo('template_directory'); ?>/dist/assets/wmms.svg" aria-label="Symbol of the Government of Canada"></object>
                    <section id="wb-srch" class="visible-md visible-lg">
                        <h2><?php _e("<!--:en-->Search<!--:--><!--:fr-->Recherche<!--:-->"); ?></h2> 
                        <form action="<?php bloginfo('url'); ?>/" method="get" role="search" class="form-inline">
                            <div class="form-group">
                                <label for="wb-srch-q"><?php _e("<!--:en-->Search website<!--:--><!--:fr-->Recherchez le site Web<!--:-->"); ?></label>
                                <input id="wb-srch-q" class="form-control" name="s" type="search" value="<?php the_search_query(); ?>" size="27" maxlength="150" />
                            </div>
                            <button type="submit" id="wb-srch-sub" class="btn btn-default"><?php _e("<!--:en-->Search<!--:--><!--:fr-->Recherche<!--:-->"); ?></button>
                        </form>
                    </section>
                </div>
            </div>
        </div>

        <nav role="navigation" id="wb-sm" data-ajax-fetch="<?php bloginfo('template_directory'); ?>/dist/ajax/sitemenu-<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>.html" data-trgt="mb-pnl" class="wb-menu visible-md visible-lg" typeof="SiteNavigationElement">
            <div class="container nvbar">
                <h2><?php _e("<!--:en-->Site menu<!--:--><!--:fr-->Menu du site<!--:-->"); ?></h2> 
                <div class="row">
                    <ul class="list-inline menu">
                        <li><a href="http://wet-boew.github.io/wet-boew/index-en.html">WET project</a>
                        </li>
                        <li><a href="http://wet-boew.github.io/wet-boew/docs/gs-cd/impl-en.html">Implement WET</a>
                        </li>
                        <li><a href="http://wet-boew.github.io/wet-boew/docs/gs-cd/contrib-en.html">Contribute to WET</a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <nav role="navigation" id="wb-bc" property="breadcrumb">
            <h2><?php _e("<!--:en-->You are here:<!--:--><!--:fr-->Vous êtes dans :<!--:-->"); ?></h2> 
            <div class="container">
                <div class="row">
                    <?php the_breadcrumb($post); ?>
                </div>
            </div>
        </nav>
    </header>
    
