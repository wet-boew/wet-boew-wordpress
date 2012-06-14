/*!
 * CSS Grid System v1.3b1 / Système de grille CSS v1.3b1
 * Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW)
 * Terms and conditions of use: http://tbs-sct.ircan.gc.ca/projects/gcwwwtemplates/wiki/Terms
 * Conditions régissant l'utilisation : http://tbs-sct.ircan.gc.ca/projects/gcwwwtemplates/wiki/Conditions
 */

/** 
 * 
 *  ie6Reflow - Reflow bug fix for IE6 for @ref http://michelf.com/weblog/2005/liquid-image/ 
 * 
 * **/
 

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}

var ie6Reflow = {
    init: function(){
       if ($.browser.msie && $.browser.version < 8 ) {
         addLoadEvent(screenResolution);
	window.onresize = screenResolution;
	function screenResolution(){
  	var pixels = document.documentElement.clientWidth;
  	var style = (pixels>0&&pixels<=935)?'':(pixels>935&&pixels<=10000)?'gc-elastic':'gc-elastic';
 	 document.body.className=style;
	};
 
       }    
    }
}


/**
 * @plugin Resolution Mapper for Alternating Style Sheets
 * @author Mario Bonito
 * @department Transport Canada / Transports Canada
 * @notes - effects only the grid.css variable in the stylesheets.
 * @todo - look to preload stylesheets inorder to reduce choppiness in switch
 */

var rMapper = {
	adjust : function() {
		$("#grid-framework").attr(
				'href',
				($(window).width() > 935)
						? $("#grid-framework").attr('href').replace(
								/.[^\/]+.css$/i, "/grid-small.css")
						: $("#grid-framework").attr('href').replace(
								/.[^\/]+.css$/i, "/grid-small.css"));
	}

};

/**
 * Strict Runtime Binding - Advanced jQuery
 */

rMapper.adjust();
jQuery.event.add(window, "resize", rMapper.adjust);

/**
 *  Runtime 
 */
 
$("document").ready(function(){   ie6Reflow.init(); });