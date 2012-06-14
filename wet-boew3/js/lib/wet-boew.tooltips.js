/*!
 * jQuery integration v1.3 / Intégration jQuery v1.3
 * Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW)
 * www.tbs.gc.ca/ws-nw/wet-boew/terms / www.sct.gc.ca/ws-nw/wet-boew/conditions
 */

/*
	Init Class for all manditory elements of the Web Experience Toolkit (WET)
*/
var Tltps = {
    "tooltip": null,
    "parent": null,
    "timer": null,
    "delay": null,
    init: function(){
	        jQuery("a").each(function (i) {
	            if (this.title) {
	                     this.onfocus = Tltps.focusTimer;
	                     this.onblur = Tltps.blurTip;
	                     this.onmouseover = Tltps.blurTip;
	              }
	            });
    },
    focusTip: function(obj){
        Tltps.blurTip();
        Tltps.delay = setInterval("Tltps.blurTip()", 4000);
        if (Tltps.tooltip == null) {
            if (typeof window.innerWidth != "undefined") {
                Tltps.window = {
                    x: window.innerWidth,
                    y: window.innerHeight
                };
            }
            else {
                if (typeof document.documentElement.offsetWidth != "undefined") {
                    Tltps.window = {
                        x: document.documentElement.offsetWidth,
                        y: document.documentElement.offsetHeight
                    };
                }
                else {
                    Tltps.window = {
                        x: document.body.offsetWidth,
                        y: document.body.offsetHeight
                    };
                }
            }
            Tltps.tooltip = (typeof document.createElementNS != "undefined") ? document.createElementNS("http://www.w3.org/1999/xhtml", "div") : document.createElement("div");
            Tltps.tooltip.setAttribute("class", "");
            Tltps.tooltip.className = (navigator.userAgent.indexOf("AppleWebKit/") > -1) ? "safetooltip" : "tooltip";
            if (Tltps.parent == null) {
                Tltps.parent = {
                    x: Tltps.getRealPosition(obj, "x") - 3,
                    y: Tltps.getRealPosition(obj, "y") + ($.browser.msie ? 2 : 12)
                };
            }
			if (/MSIE ((5\.5)|6)/.test(navigator.userAgent) && navigator.platform == "Win32") Tltps.parent.x = Tltps.parent.x - 280; // Fix IE6 positioning
            Tltps.parent.y += obj.offsetHeight;
            Tltps.tooltip.style.left = Tltps.parent.x + "px";
            Tltps.tooltip.style.top = Tltps.parent.y + "px";
            Tltps.tooltip.appendChild(document.createTextNode(obj.title));
            document.getElementsByTagName("body")[0].appendChild(Tltps.tooltip);
            if (Tltps.tooltip.offsetWidth > 300) {
                Tltps.tooltip.style.width = "300px";
            }
            Tltps.extent = {
                x: Tltps.tooltip.offsetWidth,
                y: Tltps.tooltip.offsetHeight
            };
            if ((Tltps.parent.x + Tltps.extent.x) >= Tltps.window.x) {
                Tltps.parent.x -= Tltps.extent.x;
                Tltps.tooltip.style.left = Tltps.parent.x + "px";
            }
            if (typeof window.pageYOffset != "undefined") {
                Tltps.scroll = window.pageYOffset;
            }
            else {
                if (typeof document.documentElement.scrollTop != "undefined") {
                    Tltps.scroll = document.documentElement.scrollTop;
                }
                else {
                    Tltps.scroll = document.body.scrollTop;
                }
            }
            if ((Tltps.parent.y + Tltps.extent.y) >= (Tltps.window.y + Tltps.scroll)) {
                Tltps.parent.y -= (Tltps.extent.y + obj.offsetHeight + 4);
                Tltps.tooltip.style.top = Tltps.parent.y + "px";
            }
        }
    },
    getRealPosition: function(ele, dir){
        Tltps.pos = (dir == "x") ? ele.offsetLeft : ele.offsetTop;
        Tltps.tmp = ele.offsetParent;
        while (Tltps.tmp != null) {
            Tltps.pos += (dir == "x") ? Tltps.tmp.offsetLeft : Tltps.tmp.offsetTop;
            Tltps.tmp = Tltps.tmp.offsetParent;
        }
        return Tltps.pos;
    },
    blessLink: function(_8c){
        _8c.onfocus = Tltps.focusTimer;
        _8c.onblur = Tltps.blurTip;
        _8c.onmouseover = Tltps.blurTip;
    },
    focusTimer: function(e){
        if (Tltps.timer != null) {
            clearInterval(Tltps.timer);
            Tltps.timer = null;
            Tltps.focusTip(e);
        }
        else {
            Tltps.tmp = (e) ? e.target : event.srcElement;
            Tltps.timer = setInterval("Tltps.focusTimer(Tltps.tmp)", 400);
        }
    },
    blurTip: function(){
        if (Tltps.tooltip != null) {
            document.getElementsByTagName("body")[0].removeChild(Tltps.tooltip);
            Tltps.tooltip = null;
            Tltps.parent = null;
        }
        clearInterval(Tltps.timer);
        clearInterval(Tltps.delay);
        Tltps.timer = Tltps.delay = null;
    }
};

/**
 *  Tooltips Runtime
 **/

//Add the stylesheet for this plugin
Utils.addCSSSupportFile( Utils.getSupportPath()+"/tooltip/style.css");

$("document").ready(function(){   Tltps.init(); });
