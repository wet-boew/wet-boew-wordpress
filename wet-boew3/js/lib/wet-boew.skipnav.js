/*!
 * jQuery integration v1.3 / Intégration jQuery v1.3
 * Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW)
 * www.tbs.gc.ca/ws-nw/wet-boew/terms / www.sct.gc.ca/ws-nw/wet-boew/conditions
 */

/**
 *  SkipNavFix - A balancing function to address some cross-browser 
 *  		  issues with Opacity and relative positioning of Skip Nav Elements
 *  State : Depreciated
 */

var SkipNavFix = {
	 init: function(){
        if (!jQuery.support.opacity) {
            var aTags = $("a");
            for (var i = 1; aTags[i].parentNode.className == "navaid"; i++) {
                SkipNavFix._patchNavLink(aTags[i]);
            }
        }
    },
    _patchNavLink: function(obj, ref){
        obj.style.zoom = 1;
        obj.style.filter = "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        obj.onmouseover = function(){
            SkipNavFix.changeIEOpacity(this, 100);
        };
        obj.onmouseout = function(){
            SkipNavFix.changeIEOpacity(this, 0);
        };
        obj.onfocus = function(){
            SkipNavFix.changeIEOpacity(this, 100);
        };
        obj.onblur = function(){
            SkipNavFix.changeIEOpacity(this, 0);
        };
    },
    changeIEOpacity: function(obj, opacity){
        obj.style.filter = "progid:DXImageTransform.Microsoft.Alpha(Opacity=" + opacity + ")";
    }
	
};

/**
 *  SkipNav Runtime
 **/

$("document").ready(function(){   SkipNavFix.init(); });