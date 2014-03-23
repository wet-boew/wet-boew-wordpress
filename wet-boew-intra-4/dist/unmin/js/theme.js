/*
 * Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW)
 * wet-boew.github.io/wet-boew/License-en.html / wet-boew.github.io/wet-boew/Licence-fr.html
 */
(function( $, wb ) {
"use strict";

/*
 * Variable and function definitions.
 * These are global to the plugin - meaning that they will be initialized once per page,
 * not once per instance of plugin on the page. So, this is a good place to define
 * variables that are common to all instances of the plugin on a page.
 */
var $document = wb.doc,
	smallViews = "xxsmallview.wb xsmallview.wb smallview.wb",
	largeViews = "mediumview.wb largeview.wb xlargeview.wb",
	$fipImg,

onSmallView = function () {
	$fipImg.attr( "src", $fipImg.attr( "src" ).replace( "wmms-intra", "wmms" ) );
},

onMediumLargeView = function () {
	$fipImg.attr( "src", $fipImg.attr( "src" ).replace( /wmms\./, "wmms-intra." ) );
};

$document.on( smallViews, function() {

	//Disable event if SVG polyfill is not used for FIP
	if ( $fipImg.length === 0 ) {
		$document.off( smallViews );
		return;
	}

	onSmallView();
});

$document.on( largeViews, function() {

	//Disable event if SVG polyfill is not used for FIP
	if ( $fipImg.length === 0 ) {
		$document.off( largeViews );
		return;
	}

	onMediumLargeView();
});

$document.one( "timerpoke.wb", function() {
	$fipImg = $( "img#wmms" );
	if ( document.documentElement.className.indexOf( "smallview" ) !== -1 ) {
	    onSmallView();
	}
});

})( jQuery, wb );
