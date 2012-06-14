/*!
 * jQuery integration v1.3 / Intégration jQuery v1.3
 * Web Experience Toolkit (WET) / Boîte à outils de l'expérience Web (BOEW)
 * www.tbs.gc.ca/ws-nw/wet-boew/terms / www.sct.gc.ca/ws-nw/wet-boew/conditions
 */

/**
 * A wrapper for pie
 */
if ($.browser.msie){ PE.load('PIE.js'); }

(function($) {
	$.fn.wbpie = function() {
		var $this = $(this);
		var pieEnabled = false;
		var $cols = $("#cn-cols");
		var $colsInner = $cols.children("#cn-cols-inner");
		var colsMargBottom = $cols.css("margin-bottom");

		// now attach PIE to bound objects
		if (window.PIE) {
			$($this).filter(function(index) {return $(this).css("position") == "static";}).css("position","relative");
			
			if (/MSIE (7)/.test(navigator.userAgent)) {
				var body = document.body,r = body.getBoundingClientRect();
				if ((r.left-r.right)/body.offsetWidth == -1) pieEnabled = setupPIE();
				else $cols.css("margin-bottom",($colsInner.offset().top + $colsInner.height()) - ($cols.offset().top + $cols.height()));
			} else if (/MSIE (8)/.test(navigator.userAgent)) {
				/*if (screen.deviceXDPI / screen.logicalXDPI == 1)*/ pieEnabled = setupPIE();
			} else pieEnabled = setupPIE();

			ResizeEvents.eventElement.bind('x-text-resize x-zoom-resize x-window-resize', function (){
				if (/MSIE (7)/.test(navigator.userAgent)) {
					var body = document.body,r = body.getBoundingClientRect();
					if ((r.left-r.right)/body.offsetWidth != -1) {
						pieEnabled = cleanup($this);
						$cols.css("margin-bottom",($colsInner.offset().top + $colsInner.height()) - ($cols.offset().top + $cols.height()));
					} else {
						if (!pieEnabled) setupPIE();
						$cols.css("margin-bottom",colsMargBottom);
					}
				} /*else if (/MSIE (8)/.test(navigator.userAgent)) {
					if (screen.deviceXDPI / screen.logicalXDPI != 1) pieEnabled = cleanup();
					else if (!pieEnabled) pieEnabled = setupPIE();
				}*/
			});
			ResizeEvents.initialise();
		}
		
		function setupPIE() {
			$this.each(function() {
				PIE.attach(this);
			});
			return true;
		}
		function cleanup(){
			$this.each(function() {
				PIE.detach(this);
			});
			return false;
		}
	}
	
	$(document).ready(function() {
		if ($.browser.msie){
			$(".rounded, .pie-enhance").wbpie();
		}
	})
})(jQuery) 