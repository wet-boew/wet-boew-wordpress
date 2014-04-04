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
	$fipImg,

onSmallView = function () {
	$fipImg.attr( "src", $fipImg.attr( "src" ).replace( "wmms-intra", "wmms" ) );
},

onMediumLargeView = function () {
	$fipImg.attr( "src", $fipImg.attr( "src" ).replace( /wmms\./, "wmms-intra." ) );
};

$document.one( "timerpoke.wb", function() {
	$fipImg = $( "img#wmms" );

	if ( $fipImg.length !== 0 ) {
		if ( document.documentElement.className.indexOf( "smallview" ) !== -1 ) {
			onSmallView();
		}

		$document.on( wb.resizeEvents, function( event ) {
			if ( $fipImg.length !== 0 ) {
				if ( event.type.indexOf( "smallview" ) !== -1 ) {
					onSmallView();
				} else {
					onMediumLargeView();
				}
			}
		});
	}
});

})( jQuery, wb );
