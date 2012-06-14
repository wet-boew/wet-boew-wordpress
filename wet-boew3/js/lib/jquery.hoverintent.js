/**
 *
 * Use :
 * $(selector).hoverintent(myEnterFunction, myLeaveFunction [, options]);
 * $(selector).mouseenterintent(myFunction [, options]);
 * $(selector).mouseleaveintent(myFunction [, options]);
 * $(selector).bind('mouseenterintent' [, options], myFunction);
 * $(selector).bind('mouseleaveintent' [, options], myFunction);
 *
 * Options :
 *   maxSpeed           : (default: 150) mouse cursor must go slower than this maximum mouse speed (pixels/s)
 *   enterTimeout       : (default: 500) if mouse cursor stay this time (ms) inside the element the enter event is triggered
 *   leaveTimeout       : (default: 300) if mouse cursor go out of the element more than this time (ms) the leave event is triggered
 *   checkSpeedInterval : (default: 40) interval for mouse speed checks (can't be lower than 10)
 *   group              : (default: false) treat all nodes in the jQuery selection as one element
 *
 *
 * This script was inspired by a script written by : Brian Cherne <brian@cherne.net>
 *
 * Free to use, free to study, free to change, free to redistibute
 *
 * @author  : Nicolas Deveaud <nicolas@deveaud.fr>
 * @version : 1.4.1 (realease date: june 26 2011)
 */

(function (window, Math, $, undef) {
    if ($ === undef) {
        throw new window.Error('Unsolved Dependency : jQuery');
    }

    function HoverIntent(elem, options) {
        var timeoutEnter,
        timeoutLeave,
        checkSpeedInterval,

        inside,

        event,

        // Stores current cursor position
        cur = {},

        // Stores previous cursor position
        prv = {};

        // When the "enter engine" is started, on every mouse move, the cursor
        // location is registered to be able to get the mouse speed
        function mousemove(e) {
            cur.X = e.pageX;
            cur.Y = e.pageY;
        }

        // Some things to be done before throwing the mouse enter event, or when
        // mouse enter is aborted :
        //     Stop cheking speed every [options.checkSpeedInterval]ms
        //     Abort enter timeout
        //     Stop mousemove event handling
        function stopEnterEngine() {
            window.clearInterval(checkSpeedInterval);
            window.clearTimeout(timeoutEnter);
            $(elem).unbind('mousemove', mousemove);
            prv = {};
        }

        // Triggers the event
        function triggerEvent() {
            inside = !inside;
            event.type = inside ? 'mouseenterintent' : 'mouseleaveintent';
            $.event.handle.call(elem, event);
        }

        // for mouseEnter, we have some things to do before throwing the event
        function triggerMouseEnter() {
            stopEnterEngine();
            triggerEvent();
        }

        // Every [options.checkSpeedInterval]ms, wee check mouse speed. If it's
        // lower than [options.maxSpeed]px/s the event is thrown
        function checkSpeed() {
            if (prv.X !== undef && prv.Y !== undef) {
                var speed = (Math.sqrt(Math.pow(prv.X - cur.X, 2) + Math.pow(prv.Y - cur.Y, 2)) / options.checkSpeedInterval) * 1000;
                if (speed <= options.maxSpeed) {
                    window.clearInterval(checkSpeedInterval);
                }
            }
            prv.X = cur.X;
            prv.Y = cur.Y;
        }

        // What to do when mouse cursor enters or leaves the HTML object (real
        // event, not intent)
        function hoverHandler(e) {
            // Register the event to be thrown
            event = e;

            // Abort entering
            stopEnterEngine();
            // Stops the leave timeout if it has been started
            window.clearTimeout(timeoutLeave);

            if (e.type === 'mouseenter' && !inside) {
                // start the enter engine :
                //     start handling mousemove event
                //     each [options.checkSpeedInterval]ms => check speed
                //     after [options.enterTimeout]ms without leaving => trigger the enter event

                // If maxSpeed is set to negative, no speed check, only timeout
                /// will work
                if (options.maxSpeed >= 0) {
                    $(elem).mousemove(mousemove);
                    checkSpeedInterval = window.setInterval(checkSpeed, options.checkSpeedInterval);
                }
                timeoutEnter = window.setTimeout(triggerMouseEnter, options.enterTimeout);
            }
            else if (e.type === 'mouseleave' && inside) {
                // Start leave timeout that will throw the event, unless mouse
                // enters before timeout ends
                timeoutLeave = window.setTimeout(triggerEvent, options.leaveTimeout);
            }
        }

        function init() {
            options = $.extend({
                maxSpeed        : -1,
                enterTimeout    : 0,
                leaveTimeout    : 0
            }, options);

            // It's useless, and probably bad for perfs to have a value under 10
            // for speed check interval. So bad values are not used
            if (!options.checkSpeedInterval || options.checkSpeedInterval < 10) {
                options.checkSpeedInterval = 10;
            }

            // Start handling mouseenter and mouseleave events
            $(elem)
                .bind('mouseenter mouseleave', hoverHandler);
        }

        this.changeOptions = function changeOptions(opt) {
            for (var i in opt) {
                if (typeof opt[i] === 'number') {
                    options[i] = opt[i];
                }
            }
        };

        this.unbind = function unbind(eventName) {
            if (eventName === 'enter') {
                options.enterTimeout = 0;
                options.maxSpeed = -1; // no need to check speed => better for perfs
            }
            else if (eventName === 'leave') {
                options.leaveTimeout = 0;
            }
            // Il n'est peut-être pas bon de couper les captures d'événements.
            // Si j'ai des timeout à 0, cela revient à un hover simple. Et si j'unbind le
            // enterintent seulement par exemple, avec les unbind je vais me retrouver sans
            // leaveintent non plus... Alors que je voudrais qu'il se comporte toujours comme
            // un leave normal.
/*          if (options.enterTimeout === 0 && options.leaveTimeout === 0) {
                $(elem)
                    .unbind('mousemove', mousemove)
                    .unbind('mouseleave mouseenter', hoverHandler)
                    .removeData('hoverintent');
            }
*/      };

        init();
    }

    // Shortcut function to declare both enter and leave special events
    function specialEventSetter(eventName, defaultValues) {
        return {
            setup: function (options) {
                options = $.extend({}, defaultValues, options);
                $(this)
                    .each(function () {
                        var instance = $(this).data('HoverIntent');
                        if (instance && typeof instance.changeOptions === 'function') {
                            instance.changeOptions(options);
                        }
                        else {
                            $(this).data('HoverIntent', new HoverIntent(this, options));
                        }
                    });
            },

            teardown: function () {
                var instance = $(this).data('HoverIntent');
                if (instance) {
                    instance.unbind(eventName);
                }
            }
        };
    }

    function mouseenterintent(fn, options) {
        if (typeof options === 'number') {
            options = {maxSpeed : options};
            if (typeof arguments[2] === 'number') {
                options.enterTimeout = arguments[2];
            }
            if (typeof arguments[3] === 'number') {
                options.checkSpeedInterval = arguments[3];
            }
        }
        return this.bind('mouseenterintent', options, fn);
    }

    function mouseleaveintent(fn, options) {
        if (typeof options === 'number') {
            options = {leaveTimeout : options};
        }
        return this.bind('mouseleaveintent', options, fn);
    }

    function hoverintent(fnin, fnout, options) {
        if(options && options.group) {

            // if the "group" option is true, we use a "spectre" object to
            // represente the nodes group. Than we transmit events from the
            // nodes to the "spectre" object.
            var spectre = {
                    cible   : this
                };

            $(spectre)
                .bind('mouseenterintent', function() {
                    fnin.apply(this.cible, arguments);
                })
                .bind('mouseleaveintent', options, function() {
                    fnout.apply(this.cible, arguments);
                });

            return this.bind('mouseenter mouseleave mousemove', function(evt) {
                $.event.handle.call(spectre, evt);
            });
        }
        // Both events will be manage with the same HoverIntent instance, so we can set options just on the second one, it will impact the first event too.
        return this
            .bind('mouseenterintent', fnin)
            .bind('mouseleaveintent', options, fnout);
    }

    // Declaring special events
    $.event.special.mouseenterintent = $.event.special.mouseenterintent ||
        specialEventSetter('enter', {
            maxSpeed            : 150,
            enterTimeout        : 400, // orig 400
            checkSpeedInterval  : 40
        });

    $.event.special.mouseleaveintent = $.event.special.mouseleaveintent ||
        specialEventSetter('leave', {
            leaveTimeout : 200 // orig 200
        });


    // Declaring jQuery plugins
    $.fn.mouseenterintent = $.fn.mouseenterintent || mouseenterintent;
    $.fn.mouseleaveintent = $.fn.mouseleaveintent || mouseleaveintent;
    $.fn.hoverintent = $.fn.hoverintent || hoverintent;

    // Compatibility with Brian Cherne's plugin
    $.fn.hoverIntent = $.fn.hoverIntent || function(f, g) {
        var cfg = $.extend({}, g ? { over: f, out: g } : f ),
            options = {};

        if(cfg.sensitivity) {
            // Convert sensibility to maxSpeed.
            // TODO : Find a good convertion algorythm. This one is just quick and durty.
            options.maxSpeed = (cfg.sensitivity / 7) * 150;
        }

        if(cfg.timeout) {
            options.leaveTimeout = cfg.timeout;
        }

        if(cfg.interval) {
            options.checkSpeedInterval = cfg.interval;
        }

        return $.fn.hoverintent.apply(this, [cfg.over, cfg.out, options]);
    };

}(this, this.Math, this.jQuery));