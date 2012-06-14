<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage gcwu-fegc
 * @since gcwu-fegc 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]> <html lang="<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>" class="no-js ie7"> <![endif]-->
<!--[if IE 8]> <html lang="<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?php _e("<!--:en-->en<!--:--><!--:fr-->fr<!--:-->"); ?>" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
<!-- Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW)
www.tbs.gc.ca/ws-nw/wet-boew/terms / www.sct.gc.ca/ws-nw/wet-boew/conditions -->
	<title><?php bloginfo('name'); ?></title>

	<link rel="shortcut icon" href="../build/theme-gcwu-fegc/images/favicon.ico" />
<meta name="dcterms.description" content="Web Experience Toolkit (WET) includes reusable components for building and maintaining innovative Web sites that are accessible, usable, and interoperable. These reusable components are open source software and free for use by departments and external Web communities." />
<meta name="description" content="Web Experience Toolkit (WET) includes reusable components for building and maintaining innovative Web sites that are accessible, usable, and interoperable. These reusable components are open source software and free for use by departments and external Web communities." />
<meta name="keywords" content="Web, reusable components, toolkit, accessibility, usability, open source software" />
<meta name="dcterms.creator" content="Government of Canada, Treasury Board of Canada Secretariat, Chief Information Officer Branch, IT Project Review and Oversight, Web Standards Office" />
<meta name="dcterms.title" content="<?php bloginfo('name'); ?>" />
<meta name="dcterms.issued" title="W3CDTF" content="<?php the_time('Y-m-d') ?>" />
<meta name="dcterms.modified" title="W3CDTF" content="<?php the_modified_time('Y-m-d') ?>" />
<meta name="dcterms.subject" title="gccore" content="Internet;Standards;Design" />
<meta name="dcterms.language" title="ISO639-2" content="<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
	
<script src="<?php bloginfo('template_directory'); ?>/build/js/jquery.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/build/grids/css/util-min.css" />
<!--[if lte IE 8]>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/build/js/css/pe-ap-ie-min.css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/build/theme-gcwu-fegc/css/theme-ie-min.css" />
<![endif]-->
<!--[if gt IE 8]><!-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/build/js/css/pe-ap-min.css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/build/theme-gcwu-fegc/css/theme-min.css" />
<!--<![endif]-->

<!-- CustomScriptsCSSStart -->
<?php gcwu_fegc_css_options();?>
<!-- CustomScriptsCSSEnd -->

<!-- WordPress Begins -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!-- WordPress Ends -->
</head>
<body <?php body_class(); ?>>

<?php
global $clf_col_num;
if ($clf_col_num=='1') {
	echo "<!-- One column layout begins / Début de la mise en page d\'une colonne -->\r\n";
	echo "<div id=\"wb-body\">\r\n";
} elseif ($clf_col_num=='3') {
	echo "<!-- Three column layout begins / Début de la mise en page de trois colonnes -->\r\n";
	echo "<div id=\"wp-body-thi\">\r\n";
} else {
	echo "<!-- Two column layout begins / Début de la mise en page de deux colonnes -->\r\n";
	echo "<div id=\"wb-body-sec\">\r\n";
}
?>

<div id="wb-skip">
<ul id="wb-tphp">
<li id="wb-skip1"><a href="#wb-cont"><?php _e("<!--:en-->Skip to main content<!--:--><!--:fr-->Passer au contenu principal<!--:-->"); ?></a></li>
<li id="wb-skip2"><a href="#wb-nav"><?php _e("<!--:en-->Skip to footer<!--:--><!--:fr-->Passer au pied de page<!--:-->"); ?></a></li>
</ul>
</div>
    
    <div id="wb-head"><div id="wb-head-in"><header>
<!-- HeaderStart -->
<nav role="navigation"><div id="gcwu-gcnb"><h2><?php _e("<!--:en-->Government of Canada navigation bar<!--:--><!--:fr-->Barre de navigation de la gouvernement de Canada<!--:-->"); ?></h2>
<div id="gcwu-gcnb-in"><div id="gcwu-gcnb-fip">
<div id="gcwu-sig"><div id="gcwu-sig-in"><div id="gcwu-sig-<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>" title="<?php _e("<!--:en-->Government of Canada<!--:--><!--:fr-->Gouvernement du Canada<!--:-->"); ?>"><img src="<?php bloginfo('template_directory'); ?>/build/theme-gcwu-fegc/images/sig-<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>.gif" width="214" height="20" alt="<?php _e("<!--:en-->Government of Canada<!--:--><!--:fr-->Gouvernement du Canada<!--:-->"); ?>" /></div></div></div>
<ul>
<li id="gcwu-gcnb1"><a rel="external" href="http://www.canada.gc.ca/<?php _e("<!--:en-->home.html<!--:--><!--:fr-->accueil.html<!--:-->"); ?>">Canada.gc.ca</a></li>
<li id="gcwu-gcnb2"><a rel="external" href="http://www.servicecanada.gc.ca/<?php _e("<!--:en-->eng/home.shtml<!--:--><!--:fr-->fra/accueil.shtml<!--:-->"); ?>">Services</a></li>
<li id="gcwu-gcnb3"><a rel="external" href="http://www.canada.gc.ca/depts/major/depind-<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>.html">Departments</a></li>
<li id="gcwu-gcnb-lang"><a href="<?php _e("<!--:en-->" . qtrans_convertURL($url, 'fr') . "<!--:--><!--:fr-->" . qtrans_convertURL($url, 'en') . "<!--:-->"); ?>" lang="<?php _e("<!--:en-->fr<!--:--><!--:fr-->en<!--:-->"); ?>"><?php _e("<!--:en-->Français<!--:--><!--:fr-->English<!--:-->"); ?></a></li>
</ul>
</div></div></div></nav>
    
    <div id="gcwu-bnr" role="banner"><div id="gcwu-bnr-in">
<div id="gcwu-wmms"><div id="gcwu-wmms-in"><div id="gcwu-wmms-fip" title="<?php _e("<!--:en-->Symbol of the Government of Canada<!--:--><!--:fr-->Symbole du gouvernement du Canada<!--:-->"); ?>"><img src="<?php bloginfo('template_directory'); ?>/build/theme-gcwu-fegc/images/wmms.gif" width="126" height="30" alt="<?php _e("<!--:en-->Symbol of the Government of Canada<!--:--><!--:fr-->Symbole du gouvernement du Canada<!--:-->"); ?>" /></div></div></div>
<div id="gcwu-title"><p id="gcwu-title-in"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></p></div>

<!-- Site search begins / Début de la recherche du site -->
<section role="search"><div id="gcwu-srchbx">
  <h2><?php _e("<!--:en-->Search<!--:--><!--:fr-->Recherche<!--:-->"); ?></h2>
    <form action="<?php bloginfo('url'); ?>" method="get" id="searchform" >
      <div id="gcwu-srchbx-in">
        <label for="s">Search website</label>
        <input id="s" name="s" type="text" value="<?php the_search_query(); ?>" size="27" maxlength="150" />
        <input id="gcwu-srch-submit" name="gcwu-srch-submit" type="submit" value="<?php _e("<!--:en-->Search<!--:--><!--:fr-->Recherche<!--:-->"); ?>" data-icon="search" />
        <?php if(qtrans_getLanguage()=='fr'): ?>
		<input id="lang" name="lang" type="hidden" value="fr" />
		<?php endif; ?>
</div></form>
</div></section>
<!-- Site search ends / Fin de la recherche du site -->
</div></div>
<!-- Site navigation bar begins / Début de la barre de navigation du site -->
<nav role="navigation">
<div id="gcwu-psnb"><h2><span>Site</span> menu</h2><div id="gcwu-psnb-in"><div class="wet-boew-menubar mb-mega"><div>
<ul class="mb-menu" data-ajax-replace="<?php bloginfo('template_directory'); ?>/demos/includes/menu-<?php _e("<!--:en-->eng<!--:--><!--:fr-->fra<!--:-->"); ?>.html">
<li><section><h3><a href="#">Section 1</a></h3></section></li>
<li><section><h3><a href="section2-eng.html">Section 2</a></h3></section></li>
<li><section><h3><a href="#">Section 3</a></h3></section></li>
<li><section><h3><a href="#">Section 4</a></h3></section></li>
<li><div><a href="#">Section 5</a></div></li>
<li><section><h3><a href="#">Section 6</a></h3></section></li>
<li><section><h3><a href="#">Section 7</a></h3></section></li>
</ul>
</div></div></div></div>

<div id="gcwu-bc"><h2><?php _e("<!--:en-->Breadcrumb<!--:--><!--:fr-->Fil d'Ariane<!--:-->"); ?></h2>
<div id="gcwu-bc-in">
<?php the_breadcrumb($post); ?>
</div></div>
</nav>
<!-- HeaderEnd -->
</header></div></div>
    
    
    
