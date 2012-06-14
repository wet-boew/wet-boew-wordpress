/*!
 * jQuery integration v1.3 / Intégration jQuery v1.3
 * Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW)
 * www.tbs.gc.ca/ws-nw/wet-boew/terms / www.sct.gc.ca/ws-nw/wet-boew/conditions
 */
 
/*
 * jQuery browser plugin detection 1.0.0
 *
 */

(function ($) {

	var Plugin = {
		// Library so far
		flash: {
			activex: "ShockwaveFlash.ShockwaveFlash",
			plugin: /flash/gim,
			namespace : 'flash',
			mimeType:'application/x-shockwave-flash',
			classID: "D27CDB6E-AE6D-11CF-96B8-444553540000",
			parameters : {
				allowFullscreen: "false",
				allowScriptAccess: "always",
				bgcolor: "#000000",
				wmode: 'opaque',
				movie : function(obj) { return obj.data },
				// flashvars are a complilations of a few variables
				flashvars : function(obj) {
					var vars = ''; 
						for (var i in obj ) {
						if (!i.match(/activex|classID|data|isAvailable|mimeType|namespace|parameters|plugin|required|embed|isVersionSupported/) && obj[i]) {
							vars += (vars.length > 0 ) ? '&amp;'+i+'='+encodeURIComponent(obj[i]) : i+'='+encodeURIComponent(obj[i]) ;
						}
					}
					return vars;
				}
			}
		},

		silverlight: {
			activex: "AgControl.AgControl",
			plugin: /silverlight/gim,
			namespace : 'silverlight',
			mimeType: 'application/x-silverlight-2',
			data : 'data:application/x-silverlight-2,',
			parameters : {
				uiculture : (PE.language === 'eng') ? 'en' : 'fr',
				windowless : 'true',
				background: '#000000',
				initParams :  function(obj) {
					var vars = ''; 
					for (var i in obj ) {
						if (!i.match(/activex|data|isAvailable|mimeType|namespace|parameters|plugin|required|embed|isVersionSupported/i) && obj[i]) {
							vars += (vars.length > 0 ) ? ','+i+'='+encodeURIComponent(obj[i]) : i+'='+encodeURIComponent(obj[i]) ;
						}
					}
					return vars;
				}
			}
		}
	};   
	// General looping function for the initial checking of the plugin status
	var isSupported = function(p) {
		if (window.ActiveXObject) {
			try {
				// try to see if the we can create an active object for this type of plugin
				var ax = new ActiveXObject(Plugin[p].activex);
				// no error so far so we can safely assume the browser has this plugin
				Plugin[p].isAvailable = true;
				// Map isVersionSupported function to the plugin namespace
				Plugin[p].isVersionSupported = isVersionSupported;
				// Map other functions
				Plugin[p].embed = embed;
			} catch (e) {
				Plugin[p].isAvailable = false;
			}
		} else {
			// Non-IE browser
			$.each(navigator.plugins, function () {
				if (this.name.match(Plugin[p].plugin)) {
					// Set the isAvailable property for faster version checking
					Plugin[p].isAvailable = true;
					// Overide the regex with the correct plugin name for mimetype checking later
					Plugin[p].plugin = this.name;
					// Map isVersionSupported function to the plugin namespace
					Plugin[p].isVersionSupported = isVersionSupported;
					Plugin[p].embed = embed;
					return false;
				} else {
					Plugin[p].isAvailable = false;
				}
			});
		}
	};

	// ActiveX object for Silverlight has a function call isVersionSupported. This is unique for microsoft and there is no
	//  real method other wise. The idea is to create a similiar function for the navigator.plugins family in a small attempt
	//  to normalize version support checking between browers
	var isVersionSupported = function(rv) {
		// Make sure the plugin is available
		if (!this.isAvailable)
			return false;
		// start looking at versions to see if we are supported
		var v;
		var rqv = rv.split(".");
		rqv[0] = parseInt(rqv[0], 10);
		rqv[1] = parseInt(rqv[1], 10) || 0; 
			// supports short notation, e.g. "9" instead of "9.0.0"
		rqv[2] = parseInt(rqv[2], 10) || 0;

		try {
			// IE browser
			v =  new ActiveXObject(this.activex);
			if ('IsVersionSupported' in v) { // Silverlight special method
				return v.IsVersionSupported(rv);
			} else {
				// Manual Method - lets hope this stays standardized for a while
				v = v.getVariable('$version');
				v = v.split(" ")[1].split(","); // Microsoft like to use comma's instead of periods to report build numbers                                                  
				var pv = [parseInt(v[0], 10), parseInt(v[1], 10), parseInt(v[2], 10)];  
				return (pv[0] > rqv[0] || (pv[0] == rqv[0] && pv[1] > rqv[1]) || (pv[0] == rqv[0] && pv[1] == rqv[1] && pv[2] >= rqv[2])) ? true : false; 
			}
		} catch(e) {
			// This is a non IE browser
			try {
				var v;
				if (window.navigator.plugins[this.plugin].version != undefined && window.navigator.plugins[this.plugin].version != "")
				{
				  v = window.navigator.plugins[this.plugin].version;
				}
				else
				{
					var versionRegex = new RegExp('((\\d*\\.){1,3}\\d*)');
					if (window.navigator.plugins[this.plugin].description.match(versionRegex))
					{
						m = versionRegex.exec(window.navigator.plugins[this.plugin].description);
						v = m[0];
					}
				}
				if (v && !(typeof navigator.mimeTypes != "undefined" && navigator.mimeTypes[this.mimeType] && !navigator.mimeTypes[this.mimeType].enabledPlugin)) { 
					var pv = v.split(".");
					pv[1] = (pv[1]) ? pv[1] : 0;
					pv[2] = (pv[2]) ? pv[2] : 0;               
					return (pv[0] > rqv[0] || (pv[0] == rqv[0] && pv[1] > rqv[1]) || (pv[0] == rqv[0] && pv[1] == rqv[1] && pv[2] >= rqv[2])) ? true : false; 
				} 
				return false;
			} catch(e) {
				// return false;
			}
		}
	}

	// Lets give the plugin the ability to generate its own object tag
	// TODO:: Smart Url encoding for the parameters

	// This will extend every plugin
	var embed = function(properties) {
	  
		// use the existing properties but allow for overload
		if ( properties ) { 
			$.extend( true, this, properties );
		};
		 
		// _internal scoped function for output
		var _getAttributeHtml = function(name, value) {
			return (value) ? (" " + name + "=\"" + value + "\"") : "";
		}

		// prepare html code
		var html = "" ;
		// object tag
		html += (window.ActiveXObject && this.classID) ? '<object classid="clsid:'+(this.classID)+'"' : '<object ' ;
		html += _getAttributeHtml("id", this.id);
		html += _getAttributeHtml("data", this.data);
		html += _getAttributeHtml("title", this.title);
		html += _getAttributeHtml("aria-label",this.arialabel);
		html += _getAttributeHtml("width", this.width) + _getAttributeHtml("height", this.height) ;
		html += _getAttributeHtml("type", this.mimeType) + '>\n';
		// html += ($.browser.msie) ? '  <param name="movie" value="'+this.data+'" />' : '';
		for (var i in this.parameters) {
			if (typeof this.parameters[i] === 'function'){
				html += '  <param name="'+i+'" value="'+this.parameters[i](this)+'" />'
			} else {
				html += '  <param name="'+i+'" value="'+this.parameters[i]+'" />';
			}
		}
		// Add in SC 1.1.1 Technical pass for text in object tag ( WCAG 2.0 )
		html += '<p>'+this.title+'</p>';
		html += '</object>\n';
		return html;
	};

	// Now link the objects
	$.browser.plugin = Plugin;
	// loop all plugins to load each instance
	$.each($.browser.plugin, function (i, n) {
		isSupported(i);
	});
})(jQuery);
