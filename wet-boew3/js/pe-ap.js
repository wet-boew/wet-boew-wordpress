/*!
 * jQuery integration v1.3 / Intégration jQuery v1.3
 * Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW)
 * www.tbs.gc.ca/ws-nw/wet-boew/terms / www.sct.gc.ca/ws-nw/wet-boew/conditions
 */

/** JavaScript / JQuery Capabilities with Name-spaced HTML **/
var PE = {
    progress: function(props){

	   /** Page Language - is set by the Meta Data Element [ dc.language ] **/
	    PE.language =  this.find_language();
	   /** Page Language - end **/
	   /** JS Location - The browser helps set this up for us **/
	    PE.liblocation = jQuery("script[id='progressive']").attr('src').replace("pe-ap.js","");
	    /** JS Location - end **/
	    PE.uiloaded = false;
	    /** jquery ui load state **/

	    /** Load mandatory supporting library and plugins features **/
	    PE.load('wet-boew.utils.js');
	    PE.load('wet-boew.skipnav.js');
	    PE.load('jquery.hotkeys.js');
	    PE.load('jquery.metadata.js');
	    PE.load('wet-boew.tooltips.js');
		PE.load('jquery.hashchange.min.js');

	    /** Load supporting plugins **/
		PE.load('jquery.resize-events.js');
	    PE.load('wet-boew.pngfix.js');
	    PE.load('wet-boew.storage.js');
		PE.load('wet-boew.pie.js');

		PE.parameters = props /** DEPRECATED: Backward Compatibility **/ ;

		for(key in PE.parameters) {
			/** This is new functionality that will allow for plug-ins to be dynamically loaded per page
			 *  Approach : Parameters passed to be PE object are in a Key / Value pair
			 *  Data Model : Key - is the name of the property which will be the name of the plug-in file
			 *  		   : Value - will be the parameters ( if any ) to pass to the plug-in main function
			 *  Notes : All methods will be fired on the Document.Ready JQuery to ensure proper DOM Loading
			 *  **/
			 var myPluginLoader = PE.liblocation+"plugins/wet-boew."+[key]+".js?";

			 if ( typeof(PE.parameters[key]) == 'object' )
			 {
				 var nCount = 0;
				 for (var name in PE.parameters[key])
				 {
					 var aMpersand = (nCount > 0 ) ? "&" : "" ;
					 myPluginLoader += "" + aMpersand + name + "=" +  escape(PE.parameters[key][name]);
					 ++nCount;
				 }
			 }else {
				 myPluginLoader += "id=" +  PE.parameters[key];
			};
			/** Append the script to the page DOM for autoloading ( Safari 2 & Opera 8 safe ) **/
			document.write('<script type="text/javascript" src="'+myPluginLoader+'" id="wet-boew_plugin_'+[key]+'"><\/script>');
		}
		
		PE.load('wet-boew.equalheight.js');
    },
	
	url : function(d){d=d||window.location.href;if(!/^\w+:/.test(d)){var e=document.createElement('img');e.src=d;d=e.src}var o={key:["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","filename","query","anchor"],parser:{query:/(?:^|&)([^&=]*)=?([^&]*)/g,url:/^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/}};var m=o.parser.url.exec(d);var f={};f.absolute=d;var i=14;while(i--)f[o.key[i]]=m[i]||"";f.parameter={};f[o.key[12]].replace(o.parser.query,function(a,b,c){if(b)f.parameter[b]=c});$.extend(true,f,{queryTokenized : (function(a){var b={};while(a[0]){var p = a.splice(0,1)[0].split("=");b[p[0]] = p[1];}return b;})(f.query.split("&")), pathTokenized : (f.path.split("/"))});return f},

    /** language definition function **/
   find_language : function() {
   	  // let try to find it in the HTML tag
   	  if ( jQuery("html").attr('lang') ) // force en - fr normalization
   	  	return ( jQuery("html").attr('lang').indexOf('en') == 0 ) ? 'eng' : 'fra' ;
   	  // else lets try the metadata route // this should be safe enough to handle multilanguages
   	  return jQuery("meta[name='dc.language'], meta[name='dcterms.language']").attr('content');
   },

	   /** Load Required Obligatory Scripts
	    *   Method: Brute force to ensure Safari 2 compatiblity
	    *   TODO: We may want to look at creator a more elegant Loader method
	    *   	  maybe through an ini file
	    *  **/

   load: function(jsSrc, jParam){
    	if (jParam){
    		document.write('<script type="text/javascript" src="'+PE.liblocation+"lib/"+jsSrc+'?'+jParam+'"><\/script>');
    	}else {
    		document.write('<script type="text/javascript" src="'+PE.liblocation+"lib/"+jsSrc+'"><\/script>');
    	}

    },

   load_ui: function(themeenabled){
        // stop the ui from being loaded more than once
	 if (PE.uiloaded){ return true };

	 var use_theme = (typeof(themeenabled)!='undefined') ? themeenabled : "use-theme";
	 /** load the jquery ui file **/
	 document.write('<script type="text/javascript" src="'+PE.liblocation +"lib/ui/jquery-ui.min.js"+'"><\/script>');

	 if (use_theme != "no-theme") {
	 // load the default style
 	 var $link = jQuery('<link rel="stylesheet" type="text/css" media="all" />').appendTo('head');

	$link.attr(
        {
            	href: PE.liblocation + "support/ui/themes/default/jquery-ui.css",
            	rel: 'stylesheet',
            	type: 'text/css',
            	media: 'all'
        	});
	 }
	 PE.uiloaded = true;
     },

    /** Requested by User
     *  - Suggestion :  http://tbs-sct.ircan.gc.ca/issues/796?lang=eng
     ***********************/
    loadExternal: function(jsSrc){
         document.write('<script type="text/javascript" src="'+jsSrc+'"><\/script>');
    },

    loadParams : function (name, plugin){
    	return jQuery("script[id='wet-boew_plugin_" + name + "']").attr('src');
    }
};




$.extend(window, {cssEnabled : null});

$(document).ready(function() {
	//Functionality to detect if CSS enabled at the browser level
	cssTest = $("<div id=\"cssTest\" style=\"height:0px;\">&#160;</div>");
	$("body").append(cssTest);
	cssEnabled = cssTest.height() === 0;
	$.extend(window, {cssEnabled : cssEnabled});
	$("#cssTest").remove();
	
	 //Set the metadata type (HTML5 or XHTML)
	if (jQuery("html").attr("xml:lang")  == undefined || jQuery("html").attr("xml:lang")  == ""){
		jQuery.metadata.setType("html5"); 
	}
	
	/** Fixes focus issues with anchors in some browsers **/
	//Move the focus to the anchored element on page load 
	if (window.location.hash) $("#"+(window.location.hash).slice(1)+"").attr("tabindex","-1").focus();
	//Move the focus to the anchored element on selecting a link to in page anchor
	$("a[href^='#']").click(function() {$("#"+$(this).attr("href").slice(1)+"").attr("tabindex","-1").focus();});
});
