/**
 * jQuery Plugin to obtain touch gestures from iPhone, iPod Touch and iPad, should also work with Android mobile phones (not tested yet!)
 * Common usage: wipe images (left and right to show the previous or next image)
 *
 * @author Andreas Waltl, netCU Internetagentur (http://www.netcu.de)
 * @version 1.1.1 (9th December 2010) - fix bug (older IE's had problems)
 * @version 1.1 (1st September 2010) - support wipe up and wipe down
 * @version 1.0 (15th July 2010)
 */
(function($) {
$.fn.touchwipe = function(settings) {
    var config = {
            min_move_x: 20,
            min_move_y: 20,
            wipeLeft: function(e) { },
            wipeRight: function(e) { },
            wipeUp: function(e) { },
            wipeDown: function(e) { },
            preventDefaultEvents: true
    };

    if (settings) $.extend(config, settings);

    this.each(function() {
        var startX;
        var startY;
        var isMoving = false;

        function cancelTouch() {
            this.removeEventListener('touchmove', onTouchMove);
            startX = null;
            isMoving = false;
        }

        function onTouchMove(e) {
            if(config.preventDefaultEvents) {
                e.preventDefault();
            }
            if(isMoving) {
                var x = e.touches[0].pageX;
                var y = e.touches[0].pageY;
                var dx = startX - x;
                var dy = startY - y;
                if(Math.abs(dx) >= config.min_move_x) {
                    cancelTouch();
                    if(dx > 0) {
                        config.wipeLeft(e);
                    }
                    else {
                        config.wipeRight(e);
                    }
                }
                else if(Math.abs(dy) >= config.min_move_y) {
                        cancelTouch();
                        if(dy > 0) {
                            config.wipeDown(e);
                        }
                        else {
                            config.wipeUp(e);
                        }
                    }
            }
        }

        function onTouchStart(e)
        {
            if (e.touches.length == 1) {
                startX = e.touches[0].pageX;
                startY = e.touches[0].pageY;
                isMoving = true;
                this.addEventListener('touchmove', onTouchMove, false);
            }
        }
        if ('ontouchstart' in document.documentElement) {
            this.addEventListener('touchstart', onTouchStart, false);
        }
    });

    return this;
};

})(jQuery);
/*tinycarousel*/
;(function(a){a.tiny=a.tiny||{};a.tiny.carousel={options:{start:1,display:1,axis:"x",controls:true,pager:false,interval:false,intervaltime:3000,rewind:false,animation:true,duration:1000,callback:null}};a.fn.tinycarousel_start=function(){a(this).data("tcl").start()};a.fn.tinycarousel_stop=function(){a(this).data("tcl").stop()};a.fn.tinycarousel_move=function(c){a(this).data("tcl").move(c-1,true)};function b(q,e){var i=this,h=a(".viewport:first",q),g=a(".overview:first",q),k=g.children(),f=a(".next:first",q),d=a(".prev:first",q),l=a(".pager:first",q),w=0,u=0,p=0,j=undefined,o=false,n=true,s=e.axis==="x";function m(){if(e.controls){d.toggleClass("disable",p<=0);f.toggleClass("disable",!(p+1<u))}if(e.pager){var x=a(".pagenum",l);x.removeClass("active");a(x[p]).addClass("active")}}function v(x){if(a(this).hasClass("pagenum")){i.move(parseInt(this.rel,10),true)}return false}function t(){if(e.interval&&!o){clearTimeout(j);j=setTimeout(function(){p=p+1===u?-1:p;n=p+1===u?false:p===0?true:n;i.move(n?1:-1)},e.intervaltime)}}function r(){if(e.controls&&d.length>0&&f.length>0){d.click(function(){i.move(-1);return false});f.click(function(){i.move(1);return false})}if(e.interval){q.hover(i.stop,i.start)}if(e.pager&&l.length>0){a("a",l).click(v)}}this.stop=function(){clearTimeout(j);o=true};this.start=function(){o=false;t()};this.move=function(y,z){p=z?y:p+=y;if(p>-1&&p<u){var x={};x[s?"left":"top"]=-(p*(w*e.display));g.animate(x,{queue:false,duration:e.animation?e.duration:0,complete:function(){if(typeof e.callback==="function"){e.callback.call(this,k[p],p)}}});m();t()}};function c(){w=s?a(k[0]).outerWidth(true):a(k[0]).outerHeight(true);var x=Math.ceil(((s?h.outerWidth():h.outerHeight())/(w*e.display))-1);u=Math.max(1,Math.ceil(k.length/e.display)-x);p=Math.min(u,Math.max(1,e.start))-2;g.css(s?"width":"height",(w*k.length));i.move(1);r();return i}return c()}a.fn.tinycarousel=function(d){var c=a.extend({},a.tiny.carousel.options,d);this.each(function(){a(this).data("tcl",new b(a(this),c))});return this}}(jQuery));

/*!
 * jQuery Cycle Lite Plugin
 * http://malsup.com/jquery/cycle/lite/
 * Copyright (c) 2008-2012 M. Alsup
 * Version: 1.7 (20-FEB-2013)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Requires: jQuery v1.3.2 or later
 */
;(function($) {
"use strict";

var ver = 'Lite-1.7';
var msie = /MSIE/.test(navigator.userAgent);

$.fn.cycle = function(options) {
    return this.each(function() {
        options = options || {};

        if (this.cycleTimeout)
            clearTimeout(this.cycleTimeout);

        this.cycleTimeout = 0;
        this.cyclePause = 0;

        var $cont = $(this);
        var $slides = options.slideExpr ? $(options.slideExpr, this) : $cont.children();
        var els = $slides.get();
        if (els.length < 2) {
            if (window.console){
            }
            return; // don't bother

        }

        // support metadata plugin (v1.0 and v2.0)
        var opts = $.extend({}, $.fn.cycle.defaults, options || {}, $.metadata ? $cont.metadata() : $.meta ? $cont.data() : {});
        var meta = $.isFunction($cont.data) ? $cont.data(opts.metaAttr) : null;
        if (meta)
            opts = $.extend(opts, meta);

        opts.before = opts.before ? [opts.before] : [];
        opts.after = opts.after ? [opts.after] : [];
        opts.after.unshift(function(){ opts.busy=0; });

        // allow shorthand overrides of width, height and timeout
        var cls = this.className;
        opts.width = parseInt((cls.match(/w:(\d+)/)||[])[1], 10) || opts.width;
        opts.height = parseInt((cls.match(/h:(\d+)/)||[])[1], 10) || opts.height;
        opts.timeout = parseInt((cls.match(/t:(\d+)/)||[])[1], 10) || opts.timeout;

        if ($cont.css('position') == 'static')
            $cont.css('position', 'relative');
        if (opts.width)
            $cont.width(opts.width);
        if (opts.height && opts.height != 'auto')
            $cont.height(opts.height);

        var first = 0;
        $slides.css({position: 'absolute', top:0}).each(function(i) {
            $(this).css('z-index', els.length-i);
        });

        $(els[first]).css('opacity',1).show(); // opacity bit needed to handle reinit case
        if (msie)
            els[first].style.removeAttribute('filter');

        if (opts.fit && opts.width)
            $slides.width(opts.width);
        if (opts.fit && opts.height && opts.height != 'auto')
            $slides.height(opts.height);
        if (opts.pause)
            $cont.hover(function(){this.cyclePause=1;}, function(){this.cyclePause=0;});

        var txFn = $.fn.cycle.transitions[opts.fx];
        if (txFn)
            txFn($cont, $slides, opts);

        $slides.each(function() {
            var $el = $(this);
            this.cycleH = (opts.fit && opts.height) ? opts.height : $el.height();
            this.cycleW = (opts.fit && opts.width) ? opts.width : $el.width();
        });

        if (opts.cssFirst)
            $($slides[first]).css(opts.cssFirst);

        if (opts.timeout) {
            // ensure that timeout and speed settings are sane
            if (opts.speed.constructor == String)
                opts.speed = {slow: 600, fast: 200}[opts.speed] || 400;
            if (!opts.sync)
                opts.speed = opts.speed / 2;
            while((opts.timeout - opts.speed) < 250)
                opts.timeout += opts.speed;
        }
        opts.speedIn = opts.speed;
        opts.speedOut = opts.speed;

        opts.slideCount = els.length;
        opts.currSlide = first;
        opts.nextSlide = 1;

        // fire artificial events
        var e0 = $slides[first];
        if (opts.before.length)
            opts.before[0].apply(e0, [e0, e0, opts, true]);
        if (opts.after.length > 1)
            opts.after[1].apply(e0, [e0, e0, opts, true]);

        if (opts.click && !opts.next)
            opts.next = opts.click;
        if (opts.next)
            $(opts.next).unbind('click.cycle').bind('click.cycle', function(){return advance(els,opts,opts.rev?-1:1);});
        if (opts.prev)
            $(opts.prev).unbind('click.cycle').bind('click.cycle', function(){return advance(els,opts,opts.rev?1:-1);});

        if (opts.timeout)
            this.cycleTimeout = setTimeout(function() {
                go(els,opts,0,!opts.rev);
            }, opts.timeout + (opts.delay||0));
    });
};

function go(els, opts, manual, fwd) {
    if (opts.busy)
        return;
    var p = els[0].parentNode, curr = els[opts.currSlide], next = els[opts.nextSlide];
    if (p.cycleTimeout === 0 && !manual)
        return;

    if (manual || !p.cyclePause) {
        if (opts.before.length)
            $.each(opts.before, function(i,o) { o.apply(next, [curr, next, opts, fwd]); });
        var after = function() {
            if (msie)
                this.style.removeAttribute('filter');
            $.each(opts.after, function(i,o) { o.apply(next, [curr, next, opts, fwd]); });
            queueNext(opts);
        };

        if (opts.nextSlide != opts.currSlide) {
            opts.busy = 1;
            $.fn.cycle.custom(curr, next, opts, after);
        }
        var roll = (opts.nextSlide + 1) == els.length;
        opts.nextSlide = roll ? 0 : opts.nextSlide+1;
        opts.currSlide = roll ? els.length-1 : opts.nextSlide-1;
    } else {
      queueNext(opts);
    }

    function queueNext(opts) {
        if (opts.timeout)
            p.cycleTimeout = setTimeout(function() { go(els,opts,0,!opts.rev); }, opts.timeout);
    }
}

// advance slide forward or back
function advance(els, opts, val) {
    var p = els[0].parentNode, timeout = p.cycleTimeout;
    if (timeout) {
        clearTimeout(timeout);
        p.cycleTimeout = 0;
    }
    opts.nextSlide = opts.currSlide + val;
    if (opts.nextSlide < 0) {
        opts.nextSlide = els.length - 1;
    }
    else if (opts.nextSlide >= els.length) {
        opts.nextSlide = 0;
    }
    go(els, opts, 1, val>=0);
    return false;
}

$.fn.cycle.custom = function(curr, next, opts, cb) {
    var $l = $(curr), $n = $(next);
    $n.css(opts.cssBefore);
    var fn = function() {$n.animate(opts.animIn, opts.speedIn, opts.easeIn, cb);};
    $l.animate(opts.animOut, opts.speedOut, opts.easeOut, function() {
        $l.css(opts.cssAfter);
        if (!opts.sync)
            fn();
    });
    if (opts.sync)
        fn();
};

$.fn.cycle.transitions = {
    fade: function($cont, $slides, opts) {
        $slides.not(':eq(0)').hide();
        opts.cssBefore = { opacity: 0, display: 'block' };
        opts.cssAfter  = { display: 'none' };
        opts.animOut = { opacity: 0 };
        opts.animIn = { opacity: 1 };
    },
    fadeout: function($cont, $slides, opts) {
        opts.before.push(function(curr,next,opts,fwd) {
            $(curr).css('zIndex',opts.slideCount + (fwd === true ? 1 : 0));
            $(next).css('zIndex',opts.slideCount + (fwd === true ? 0 : 1));
        });
        $slides.not(':eq(0)').hide();
        opts.cssBefore = { opacity: 1, display: 'block', zIndex: 1 };
        opts.cssAfter  = { display: 'none', zIndex: 0 };
        opts.animOut = { opacity: 0 };
        opts.animIn = { opacity: 1 };
    }
};

$.fn.cycle.ver = function() { return ver; };

// @see: http://malsup.com/jquery/cycle/lite/
$.fn.cycle.defaults = {
    animIn:        {},
    animOut:       {},
    fx:           'fade',
    after:         null,
    before:        null,
    cssBefore:     {},
    cssAfter:      {},
    delay:         0,
    fit:           0,
    height:       'auto',
    metaAttr:     'cycle',
    next:          null,
    pause:         false,
    prev:          null,
    speed:         1000,
    slideExpr:     null,
    sync:          true,
    timeout:       4000
};

})(jQuery);


/*
* jQuery Cycle2; v20130525
* http://jquery.malsup.com/cycle2/
* Copyright (c) 2013 M. Alsup; Dual licensed: MIT/GPL
*/
(function(e){"use strict";function t(e){return(e||"").toLowerCase()}var i="20130409";e.fn.cycle=function(i){var n;return 0!==this.length||e.isReady?this.each(function(){var n,s,o,c,r=e(this),l=e.fn.cycle.log;if(!r.data("cycle.opts")){(r.data("cycle-log")===!1||i&&i.log===!1||s&&s.log===!1)&&(l=e.noop),l("--c2 init--"),n=r.data();for(var a in n)n.hasOwnProperty(a)&&/^cycle[A-Z]+/.test(a)&&(c=n[a],o=a.match(/^cycle(.*)/)[1].replace(/^[A-Z]/,t),l(o+":",c,"("+typeof c+")"),n[o]=c);s=e.extend({},e.fn.cycle.defaults,n,i||{}),s.timeoutId=0,s.paused=s.paused||!1,s.container=r,s._maxZ=s.maxZ,s.API=e.extend({_container:r},e.fn.cycle.API),s.API.log=l,s.API.trigger=function(e,t){return s.container.trigger(e,t),s.API},r.data("cycle.opts",s),r.data("cycle.API",s.API),s.API.trigger("cycle-bootstrap",[s,s.API]),s.API.addInitialSlides(),s.API.preInitSlideshow(),s.slides.length&&s.API.initSlideshow()}}):(n={s:this.selector,c:this.context},e.fn.cycle.log("requeuing slideshow (dom not ready)"),e(function(){e(n.s,n.c).cycle(i)}),this)},e.fn.cycle.API={opts:function(){return this._container.data("cycle.opts")},addInitialSlides:function(){var t=this.opts(),i=t.slides;t.slideCount=0,t.slides=e(),i=i.jquery?i:t.container.find(i),t.random&&i.sort(function(){return Math.random()-.5}),t.API.add(i)},preInitSlideshow:function(){var t=this.opts();t.API.trigger("cycle-pre-initialize",[t]);var i=e.fn.cycle.transitions[t.fx];i&&e.isFunction(i.preInit)&&i.preInit(t),t._preInitialized=!0},postInitSlideshow:function(){var t=this.opts();t.API.trigger("cycle-post-initialize",[t]);var i=e.fn.cycle.transitions[t.fx];i&&e.isFunction(i.postInit)&&i.postInit(t)},initSlideshow:function(){var t,i=this.opts(),n=i.container;i.API.calcFirstSlide(),"static"==i.container.css("position")&&i.container.css("position","relative"),e(i.slides[i.currSlide]).css("opacity",1).show(),i.API.stackSlides(i.slides[i.currSlide],i.slides[i.nextSlide],!i.reverse),i.pauseOnHover&&(i.pauseOnHover!==!0&&(n=e(i.pauseOnHover)),n.hover(function(){i.API.pause(!0)},function(){i.API.resume(!0)})),i.timeout&&(t=i.API.getSlideOpts(i.nextSlide),i.API.queueTransition(t,t.timeout+i.delay)),i._initialized=!0,i.API.updateView(!0),i.API.trigger("cycle-initialized",[i]),i.API.postInitSlideshow()},pause:function(t){var i=this.opts(),n=i.API.getSlideOpts(),s=i.hoverPaused||i.paused;t?i.clickPaused=!0:i.paused=!0,s||(i.container.addClass("cycle-paused"),i.API.trigger("cycle-paused",[i]).log("cycle-paused"),n.timeout&&(clearTimeout(i.timeoutId),i.timeoutId=0,i._remainingTimeout-=e.now()-i._lastQueue,(0>i._remainingTimeout||isNaN(i._remainingTimeout))&&(i._remainingTimeout=void 0)))},resume:function(e){var t=this.opts(),i=!t.hoverPaused&&!t.paused;e?t.hoverPaused=!1:t.paused=!1,i||(t.container.removeClass("cycle-paused"),t.API.queueTransition(t.API.getSlideOpts(),t._remainingTimeout),t.API.trigger("cycle-resumed",[t,t._remainingTimeout]).log("cycle-resumed"))},add:function(t,i){var n,s=this.opts(),o=s.slideCount,c=!1;"string"==e.type(t)&&(t=e.trim(t)),e(t).each(function(){var t,n=e(this);i?s.container.prepend(n):s.container.append(n),s.slideCount++,t=s.API.buildSlideOpts(n),s.slides=i?e(n).add(s.slides):s.slides.add(n),s.API.initSlide(t,n,--s._maxZ),n.data("cycle.opts",t),s.API.trigger("cycle-slide-added",[s,t,n])}),s.API.updateView(!0),c=s._preInitialized&&2>o&&s.slideCount>=1,c&&(s._initialized?s.timeout&&(n=s.slides.length,s.nextSlide=s.reverse?n-1:1,s.timeoutId||s.API.queueTransition(s)):s.API.initSlideshow())},calcFirstSlide:function(){var e,t=this.opts();e=parseInt(t.startingSlide||0,10),(e>=t.slides.length||0>e)&&(e=0),t.currSlide=e,t.reverse?(t.nextSlide=e-1,0>t.nextSlide&&(t.nextSlide=t.slides.length-1)):(t.nextSlide=e+1,t.nextSlide==t.slides.length&&(t.nextSlide=0))},calcNextSlide:function(){var e,t=this.opts();t.reverse?(e=0>t.nextSlide-1,t.nextSlide=e?t.slideCount-1:t.nextSlide-1,t.currSlide=e?0:t.nextSlide+1):(e=t.nextSlide+1==t.slides.length,t.nextSlide=e?0:t.nextSlide+1,t.currSlide=e?t.slides.length-1:t.nextSlide-1)},calcTx:function(t,i){var n,s=t;return i&&s.manualFx&&(n=e.fn.cycle.transitions[s.manualFx]),n||(n=e.fn.cycle.transitions[s.fx]),n||(n=e.fn.cycle.transitions.fade,s.API.log('Transition "'+s.fx+'" not found.  Using fade.')),n},prepareTx:function(e,t){var i,n,s,o,c,r=this.opts();return 2>r.slideCount?(r.timeoutId=0,void 0):(!e||r.busy&&!r.manualTrump||(r.API.stopTransition(),r.busy=!1,clearTimeout(r.timeoutId),r.timeoutId=0),r.busy||(0!==r.timeoutId||e)&&(n=r.slides[r.currSlide],s=r.slides[r.nextSlide],o=r.API.getSlideOpts(r.nextSlide),c=r.API.calcTx(o,e),r._tx=c,e&&void 0!==o.manualSpeed&&(o.speed=o.manualSpeed),r.nextSlide!=r.currSlide&&(e||!r.paused&&!r.hoverPaused&&r.timeout)?(r.API.trigger("cycle-before",[o,n,s,t]),c.before&&c.before(o,n,s,t),i=function(){r.busy=!1,r.container.data("cycle.opts")&&(c.after&&c.after(o,n,s,t),r.API.trigger("cycle-after",[o,n,s,t]),r.API.queueTransition(o),r.API.updateView(!0))},r.busy=!0,c.transition?c.transition(o,n,s,t,i):r.API.doTransition(o,n,s,t,i),r.API.calcNextSlide(),r.API.updateView()):r.API.queueTransition(o)),void 0)},doTransition:function(t,i,n,s,o){var c=t,r=e(i),l=e(n),a=function(){l.animate(c.animIn||{opacity:1},c.speed,c.easeIn||c.easing,o)};l.css(c.cssBefore||{}),r.animate(c.animOut||{},c.speed,c.easeOut||c.easing,function(){r.css(c.cssAfter||{}),c.sync||a()}),c.sync&&a()},queueTransition:function(t,i){var n=this.opts(),s=void 0!==i?i:t.timeout;return 0===n.nextSlide&&0===--n.loop?(n.API.log("terminating; loop=0"),n.timeout=0,s?setTimeout(function(){n.API.trigger("cycle-finished",[n])},s):n.API.trigger("cycle-finished",[n]),n.nextSlide=n.currSlide,void 0):(s&&(n._lastQueue=e.now(),void 0===i&&(n._remainingTimeout=t.timeout),n.paused||n.hoverPaused||(n.timeoutId=setTimeout(function(){n.API.prepareTx(!1,!n.reverse)},s))),void 0)},stopTransition:function(){var e=this.opts();e.slides.filter(":animated").length&&(e.slides.stop(!1,!0),e.API.trigger("cycle-transition-stopped",[e])),e._tx&&e._tx.stopTransition&&e._tx.stopTransition(e)},advanceSlide:function(e){var t=this.opts();return clearTimeout(t.timeoutId),t.timeoutId=0,t.nextSlide=t.currSlide+e,0>t.nextSlide?t.nextSlide=t.slides.length-1:t.nextSlide>=t.slides.length&&(t.nextSlide=0),t.API.prepareTx(!0,e>=0),!1},buildSlideOpts:function(i){var n,s,o=this.opts(),c=i.data()||{};for(var r in c)c.hasOwnProperty(r)&&/^cycle[A-Z]+/.test(r)&&(n=c[r],s=r.match(/^cycle(.*)/)[1].replace(/^[A-Z]/,t),o.API.log("["+(o.slideCount-1)+"]",s+":",n,"("+typeof n+")"),c[s]=n);c=e.extend({},e.fn.cycle.defaults,o,c),c.slideNum=o.slideCount;try{delete c.API,delete c.slideCount,delete c.currSlide,delete c.nextSlide,delete c.slides}catch(l){}return c},getSlideOpts:function(t){var i=this.opts();void 0===t&&(t=i.currSlide);var n=i.slides[t],s=e(n).data("cycle.opts");return e.extend({},i,s)},initSlide:function(t,i,n){var s=this.opts();i.css(t.slideCss||{}),n>0&&i.css("zIndex",n),isNaN(t.speed)&&(t.speed=e.fx.speeds[t.speed]||e.fx.speeds._default),t.sync||(t.speed=t.speed/2),i.addClass(s.slideClass)},updateView:function(e){var t=this.opts();if(t._initialized){var i=t.API.getSlideOpts(),n=t.slides[t.currSlide];!e&&(t.API.trigger("cycle-update-view-before",[t,i,n]),0>t.updateView)||(t.slideActiveClass&&t.slides.removeClass(t.slideActiveClass).eq(t.currSlide).addClass(t.slideActiveClass),e&&t.hideNonActive&&t.slides.filter(":not(."+t.slideActiveClass+")").hide(),t.API.trigger("cycle-update-view",[t,i,n,e]),t.API.trigger("cycle-update-view-after",[t,i,n]))}},getComponent:function(t){var i=this.opts(),n=i[t];return"string"==typeof n?/^\s*[\>|\+|~]/.test(n)?i.container.find(n):e(n):n.jquery?n:e(n)},stackSlides:function(t,i,n){var s=this.opts();t||(t=s.slides[s.currSlide],i=s.slides[s.nextSlide],n=!s.reverse),e(t).css("zIndex",s.maxZ);var o,c=s.maxZ-2,r=s.slideCount;if(n){for(o=s.currSlide+1;r>o;o++)e(s.slides[o]).css("zIndex",c--);for(o=0;s.currSlide>o;o++)e(s.slides[o]).css("zIndex",c--)}else{for(o=s.currSlide-1;o>=0;o--)e(s.slides[o]).css("zIndex",c--);for(o=r-1;o>s.currSlide;o--)e(s.slides[o]).css("zIndex",c--)}e(i).css("zIndex",s.maxZ-1)},getSlideIndex:function(e){return this.opts().slides.index(e)}},e.fn.cycle.log=function(){window.console&&console.log},e.fn.cycle.version=function(){return"Cycle2: "+i},e.fn.cycle.transitions={custom:{},none:{before:function(e,t,i,n){e.API.stackSlides(i,t,n),e.cssBefore={opacity:1,display:"block"}}},fade:{before:function(t,i,n,s){var o=t.API.getSlideOpts(t.nextSlide).slideCss||{};t.API.stackSlides(i,n,s),t.cssBefore=e.extend(o,{opacity:0,display:"block"}),t.animIn={opacity:1},t.animOut={opacity:0}}},fadeout:{before:function(t,i,n,s){var o=t.API.getSlideOpts(t.nextSlide).slideCss||{};t.API.stackSlides(i,n,s),t.cssBefore=e.extend(o,{opacity:1,display:"block"}),t.animOut={opacity:0}}},scrollHorz:{before:function(e,t,i,n){e.API.stackSlides(t,i,n);var s=e.container.css("overflow","hidden").width();e.cssBefore={left:n?s:-s,top:0,opacity:1,display:"block"},e.cssAfter={zIndex:e._maxZ-2,left:0},e.animIn={left:0},e.animOut={left:n?-s:s}}}},e.fn.cycle.defaults={allowWrap:!0,autoSelector:".cycle-slideshow[data-cycle-auto-init!=false]",delay:0,easing:null,fx:"fade",hideNonActive:!0,loop:0,manualFx:void 0,manualSpeed:void 0,manualTrump:!0,maxZ:100,pauseOnHover:!1,reverse:!1,slideActiveClass:"cycle-slide-active",slideClass:"cycle-slide",slideCss:{position:"absolute",top:0,left:0},slides:"> img",speed:500,startingSlide:0,sync:!0,timeout:4e3,updateView:-1},e(document).ready(function(){e(e.fn.cycle.defaults.autoSelector).cycle()})})(jQuery),function(e){"use strict";function t(t,n){var s,o,c,r=n.autoHeight;if("container"==r)o=e(n.slides[n.currSlide]).outerHeight(),n.container.height(o);else if(n._autoHeightRatio)n.container.height(n.container.width()/n._autoHeightRatio);else if("calc"===r||"number"==e.type(r)&&r>=0){if(c="calc"===r?i(t,n):r>=n.slides.length?0:r,c==n._sentinelIndex)return;n._sentinelIndex=c,n._sentinel&&n._sentinel.remove(),s=e(n.slides[c].cloneNode(!0)),s.removeAttr("id name rel").find("[id],[name],[rel]").removeAttr("id name rel"),s.css({position:"static",visibility:"hidden",display:"block"}).prependTo(n.container).addClass("cycle-sentinel cycle-slide").removeClass("cycle-slide-active"),s.find("*").css("visibility","hidden"),n._sentinel=s}}function i(t,i){var n=0,s=-1;return i.slides.each(function(t){var i=e(this).height();i>s&&(s=i,n=t)}),n}function n(t,i,n,s){var o=e(s).outerHeight(),c=i.sync?i.speed/2:i.speed;i.container.animate({height:o},c)}function s(i,o){o._autoHeightOnResize&&(e(window).off("resize orientationchange",o._autoHeightOnResize),o._autoHeightOnResize=null),o.container.off("cycle-slide-added cycle-slide-removed",t),o.container.off("cycle-destroyed",s),o.container.off("cycle-before",n),o._sentinel&&(o._sentinel.remove(),o._sentinel=null)}e.extend(e.fn.cycle.defaults,{autoHeight:0}),e(document).on("cycle-initialized",function(i,o){function c(){t(i,o)}var r,l=o.autoHeight,a=e.type(l),d=null;("string"===a||"number"===a)&&(o.container.on("cycle-slide-added cycle-slide-removed",t),o.container.on("cycle-destroyed",s),"container"==l?o.container.on("cycle-before",n):"string"===a&&/\d+\:\d+/.test(l)&&(r=l.match(/(\d+)\:(\d+)/),r=r[1]/r[2],o._autoHeightRatio=r),"number"!==a&&(o._autoHeightOnResize=function(){clearTimeout(d),d=setTimeout(c,50)},e(window).on("resize orientationchange",o._autoHeightOnResize)),setTimeout(c,30))})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{caption:"> .cycle-caption",captionTemplate:"{{slideNum}} / {{slideCount}}",overlay:"> .cycle-overlay",overlayTemplate:"<div>{{title}}</div><div>{{desc}}</div>",captionModule:"caption"}),e(document).on("cycle-update-view",function(t,i,n,s){"caption"===i.captionModule&&e.each(["caption","overlay"],function(){var e=this,t=n[e+"Template"],o=i.API.getComponent(e);o.length&&t?(o.html(i.API.tmpl(t,n,i,s)),o.show()):o.hide()})}),e(document).on("cycle-destroyed",function(t,i){var n;e.each(["caption","overlay"],function(){var e=this,t=i[e+"Template"];i[e]&&t&&(n=i.API.getComponent("caption"),n.empty())})})}(jQuery),function(e){"use strict";var t=e.fn.cycle;e.fn.cycle=function(i){var n,s,o,c=e.makeArray(arguments);return"number"==e.type(i)?this.cycle("goto",i):"string"==e.type(i)?this.each(function(){var r;return n=i,o=e(this).data("cycle.opts"),void 0===o?(t.log('slideshow must be initialized before sending commands; "'+n+'" ignored'),void 0):(n="goto"==n?"jump":n,s=o.API[n],e.isFunction(s)?(r=e.makeArray(c),r.shift(),s.apply(o.API,r)):(t.log("unknown command: ",n),void 0))}):t.apply(this,arguments)},e.extend(e.fn.cycle,t),e.extend(t.API,{next:function(){var e=this.opts();if(!e.busy||e.manualTrump){var t=e.reverse?-1:1;e.allowWrap===!1&&e.currSlide+t>=e.slideCount||(e.API.advanceSlide(t),e.API.trigger("cycle-next",[e]).log("cycle-next"))}},prev:function(){var e=this.opts();if(!e.busy||e.manualTrump){var t=e.reverse?1:-1;e.allowWrap===!1&&0>e.currSlide+t||(e.API.advanceSlide(t),e.API.trigger("cycle-prev",[e]).log("cycle-prev"))}},destroy:function(){this.stop();var t=this.opts(),i=e.isFunction(e._data)?e._data:e.noop;clearTimeout(t.timeoutId),t.timeoutId=0,t.API.stop(),t.API.trigger("cycle-destroyed",[t]).log("cycle-destroyed"),t.container.removeData(),i(t.container[0],"parsedAttrs",!1),t.retainStylesOnDestroy||(t.container.removeAttr("style"),t.slides.removeAttr("style"),t.slides.removeClass("cycle-slide-active")),t.slides.each(function(){e(this).removeData(),i(this,"parsedAttrs",!1)})},jump:function(e){var t,i=this.opts();if(!i.busy||i.manualTrump){var n=parseInt(e,10);if(isNaN(n)||0>n||n>=i.slides.length)return i.API.log("goto: invalid slide index: "+n),void 0;if(n==i.currSlide)return i.API.log("goto: skipping, already on slide",n),void 0;i.nextSlide=n,clearTimeout(i.timeoutId),i.timeoutId=0,i.API.log("goto: ",n," (zero-index)"),t=i.currSlide<i.nextSlide,i.API.prepareTx(!0,t)}},stop:function(){var t=this.opts(),i=t.container;clearTimeout(t.timeoutId),t.timeoutId=0,t.API.stopTransition(),t.pauseOnHover&&(t.pauseOnHover!==!0&&(i=e(t.pauseOnHover)),i.off("mouseenter mouseleave")),t.API.trigger("cycle-stopped",[t]).log("cycle-stopped")},reinit:function(){var e=this.opts();e.API.destroy(),e.container.cycle()},remove:function(t){for(var i,n,s=this.opts(),o=[],c=1,r=0;s.slides.length>r;r++)i=s.slides[r],r==t?n=i:(o.push(i),e(i).data("cycle.opts").slideNum=c,c++);n&&(s.slides=e(o),s.slideCount--,e(n).remove(),t==s.currSlide&&s.API.advanceSlide(1),s.API.trigger("cycle-slide-removed",[s,t,n]).log("cycle-slide-removed"),s.API.updateView())}}),e(document).on("click.cycle","[data-cycle-cmd]",function(t){t.preventDefault();var i=e(this),n=i.data("cycle-cmd"),s=i.data("cycle-context")||".cycle-slideshow";e(s).cycle(n,i.data("cycle-arg"))})}(jQuery),function(e){"use strict";function t(t,i){var n;return t._hashFence?(t._hashFence=!1,void 0):(n=window.location.hash.substring(1),t.slides.each(function(s){return e(this).data("cycle-hash")==n?(i===!0?t.startingSlide=s:(t.nextSlide=s,t.API.prepareTx(!0,!1)),!1):void 0}),void 0)}e(document).on("cycle-pre-initialize",function(i,n){t(n,!0),n._onHashChange=function(){t(n,!1)},e(window).on("hashchange",n._onHashChange)}),e(document).on("cycle-update-view",function(e,t,i){i.hash&&(t._hashFence=!0,window.location.hash=i.hash)}),e(document).on("cycle-destroyed",function(t,i){i._onHashChange&&e(window).off("hashchange",i._onHashChange)})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{loader:!1}),e(document).on("cycle-bootstrap",function(t,i){function n(t,n){function o(t){var o;"wait"==i.loader?(r.push(t),0===a&&(r.sort(c),s.apply(i.API,[r,n]),i.container.removeClass("cycle-loading"))):(o=e(i.slides[i.currSlide]),s.apply(i.API,[t,n]),o.show(),i.container.removeClass("cycle-loading"))}function c(e,t){return e.data("index")-t.data("index")}var r=[];if("string"==e.type(t))t=e.trim(t);else if("array"===e.type(t))for(var l=0;t.length>l;l++)t[l]=e(t[l])[0];t=e(t);var a=t.length;a&&(t.hide().appendTo("body").each(function(t){function c(){0===--l&&(--a,o(d))}var l=0,d=e(this),u=d.is("img")?d:d.find("img");return d.data("index",t),u=u.filter(":not(.cycle-loader-ignore)").filter(':not([src=""])'),u.length?(l=u.length,u.each(function(){this.complete?c():e(this).load(function(){c()}).error(function(){0===--l&&(i.API.log("slide skipped; img not loaded:",this.src),0===--a&&"wait"==i.loader&&s.apply(i.API,[r,n]))})}),void 0):(--a,r.push(d),void 0)}),a&&i.container.addClass("cycle-loading"))}var s;i.loader&&(s=i.API.add,i.API.add=n)})}(jQuery),function(e){"use strict";function t(t,i,n){var s,o=t.API.getComponent("pager");o.each(function(){var o=e(this);if(i.pagerTemplate){var c=t.API.tmpl(i.pagerTemplate,i,t,n[0]);s=e(c).appendTo(o)}else s=o.children().eq(t.slideCount-1);s.on(t.pagerEvent,function(e){e.preventDefault(),t.API.page(o,e.currentTarget)})})}function i(e,t){var i=this.opts();if(!i.busy||i.manualTrump){var n=e.children().index(t),s=n,o=s>i.currSlide;i.currSlide!=s&&(i.nextSlide=s,i.API.prepareTx(!0,o),i.API.trigger("cycle-pager-activated",[i,e,t]))}}e.extend(e.fn.cycle.defaults,{pager:"> .cycle-pager",pagerActiveClass:"cycle-pager-active",pagerEvent:"click.cycle",pagerTemplate:"<span>&bull;</span>"}),e(document).on("cycle-bootstrap",function(e,i,n){n.buildPagerLink=t}),e(document).on("cycle-slide-added",function(e,t,n,s){t.pager&&(t.API.buildPagerLink(t,n,s),t.API.page=i)}),e(document).on("cycle-slide-removed",function(t,i,n){if(i.pager){var s=i.API.getComponent("pager");s.each(function(){var t=e(this);e(t.children()[n]).remove()})}}),e(document).on("cycle-update-view",function(t,i){var n;i.pager&&(n=i.API.getComponent("pager"),n.each(function(){e(this).children().removeClass(i.pagerActiveClass).eq(i.currSlide).addClass(i.pagerActiveClass)}))}),e(document).on("cycle-destroyed",function(e,t){var i=t.API.getComponent("pager");i&&(i.children().off(t.pagerEvent),t.pagerTemplate&&i.empty())})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{next:"> .cycle-next",nextEvent:"click.cycle",disabledClass:"disabled",prev:"> .cycle-prev",prevEvent:"click.cycle",swipe:!1}),e(document).on("cycle-initialized",function(e,t){if(t.API.getComponent("next").on(t.nextEvent,function(e){e.preventDefault(),t.API.next()}),t.API.getComponent("prev").on(t.prevEvent,function(e){e.preventDefault(),t.API.prev()}),t.swipe){var i=t.swipeVert?"swipeUp.cycle":"swipeLeft.cycle swipeleft.cycle",n=t.swipeVert?"swipeDown.cycle":"swipeRight.cycle swiperight.cycle";t.container.on(i,function(){t.API.next()}),t.container.on(n,function(){t.API.prev()})}}),e(document).on("cycle-update-view",function(e,t){if(!t.allowWrap){var i=t.disabledClass,n=t.API.getComponent("next"),s=t.API.getComponent("prev"),o=t._prevBoundry||0,c=t._nextBoundry||t.slideCount-1;t.currSlide==c?n.addClass(i).prop("disabled",!0):n.removeClass(i).prop("disabled",!1),t.currSlide===o?s.addClass(i).prop("disabled",!0):s.removeClass(i).prop("disabled",!1)}}),e(document).on("cycle-destroyed",function(e,t){t.API.getComponent("prev").off(t.nextEvent),t.API.getComponent("next").off(t.prevEvent),t.container.off("swipeleft.cycle swiperight.cycle swipeLeft.cycle swipeRight.cycle swipeUp.cycle swipeDown.cycle")})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{progressive:!1}),e(document).on("cycle-pre-initialize",function(t,i){if(i.progressive){var n,s,o=i.API,c=o.next,r=o.prev,l=o.prepareTx,a=e.type(i.progressive);if("array"==a)n=i.progressive;else if(e.isFunction(i.progressive))n=i.progressive(i);else if("string"==a){if(s=e(i.progressive),n=e.trim(s.html()),!n)return;if(/^(\[)/.test(n))try{n=e.parseJSON(n)}catch(d){return o.log("error parsing progressive slides",d),void 0}else n=n.split(RegExp(s.data("cycle-split")||"\n")),n[n.length-1]||n.pop()}l&&(o.prepareTx=function(e,t){var s,o;return e||0===n.length?(l.apply(i.API,[e,t]),void 0):(t&&i.currSlide==i.slideCount-1?(o=n[0],n=n.slice(1),i.container.one("cycle-slide-added",function(e,t){setTimeout(function(){t.API.advanceSlide(1)},50)}),i.API.add(o)):t||0!==i.currSlide?l.apply(i.API,[e,t]):(s=n.length-1,o=n[s],n=n.slice(0,s),i.container.one("cycle-slide-added",function(e,t){setTimeout(function(){t.currSlide=1,t.API.advanceSlide(-1)},50)}),i.API.add(o,!0)),void 0)}),c&&(o.next=function(){var e=this.opts();if(n.length&&e.currSlide==e.slideCount-1){var t=n[0];n=n.slice(1),e.container.one("cycle-slide-added",function(e,t){c.apply(t.API),t.container.removeClass("cycle-loading")}),e.container.addClass("cycle-loading"),e.API.add(t)}else c.apply(e.API)}),r&&(o.prev=function(){var e=this.opts();if(n.length&&0===e.currSlide){var t=n.length-1,i=n[t];n=n.slice(0,t),e.container.one("cycle-slide-added",function(e,t){t.currSlide=1,t.API.advanceSlide(-1),t.container.removeClass("cycle-loading")}),e.container.addClass("cycle-loading"),e.API.add(i,!0)}else r.apply(e.API)})}})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{tmplRegex:"{{((.)?.*?)}}"}),e.extend(e.fn.cycle.API,{tmpl:function(t,i){var n=RegExp(i.tmplRegex||e.fn.cycle.defaults.tmplRegex,"g"),s=e.makeArray(arguments);return s.shift(),t.replace(n,function(t,i){var n,o,c,r,l=i.split(".");for(n=0;s.length>n;n++)if(c=s[n]){if(l.length>1)for(r=c,o=0;l.length>o;o++)c=r,r=r[l[o]]||i;else r=c[i];if(e.isFunction(r))return r.apply(c,s);if(void 0!==r&&null!==r&&r!=i)return r}return i})}})}(jQuery);


/**
 * jQuery Roundabout - v2.4.2
 * http://fredhq.com/projects/roundabout
 *
 * Moves list-items of enabled ordered and unordered lists long
 * a chosen path. Includes the default "lazySusan" path, that
 * moves items long a spinning turntable.
 *
 * Terms of Use // jQuery Roundabout
 *
 * Open source under the BSD license
 *
 * Copyright (c) 2011-2012, Fred LeBlanc
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *   - Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *   - Redistributions in binary form must reproduce the above
 *     copyright notice, this list of conditions and the following
 *     disclaimer in the documentation and/or other materials provided
 *     with the distribution.
 *   - Neither the name of the author nor the names of its contributors
 *     may be used to endorse or promote products derived from this
 *     software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */
(function(a){"use strict";var b,c,d;a.extend({roundaboutShapes:{def:"lazySusan",lazySusan:function(a,b,c){return{x:Math.sin(a+b),y:Math.sin(a+3*Math.PI/2+b)/8*c,z:(Math.cos(a+b)+1)/2,scale:Math.sin(a+Math.PI/2+b)/2+.5}}}});b={bearing:0,tilt:0,minZ:100,maxZ:280,minOpacity:.4,maxOpacity:1,minScale:.4,maxScale:1,duration:600,btnNext:null,btnNextCallback:function(){},btnPrev:null,btnPrevCallback:function(){},btnToggleAutoplay:null,btnStartAutoplay:null,btnStopAutoplay:null,easing:"swing",clickToFocus:true,clickToFocusCallback:function(){},focusBearing:0,shape:"lazySusan",debug:false,childSelector:"li",startingChild:null,reflect:false,floatComparisonThreshold:.001,autoplay:false,autoplayDuration:1e3,autoplayPauseOnHover:false,autoplayCallback:function(){},autoplayInitialDelay:0,enableDrag:false,dropDuration:600,dropEasing:"swing",dropAnimateTo:"nearest",dropCallback:function(){},dragAxis:"x",dragFactor:4,triggerFocusEvents:true,triggerBlurEvents:true,responsive:false};c={autoplayInterval:null,autoplayIsRunning:false,autoplayStartTimeout:null,animating:false,childInFocus:-1,touchMoveStartPosition:null,stopAnimation:false,lastAnimationStep:false};d={init:function(e,f,g){var h,i=(new Date).getTime();e=typeof e==="object"?e:{};f=a.isFunction(f)?f:function(){};f=a.isFunction(e)?e:f;h=a.extend({},b,e,c);return this.each(function(){var b=a(this),c=b.children(h.childSelector).length,e=360/c,i=h.startingChild&&h.startingChild>c-1?c-1:h.startingChild,j=h.startingChild===null?h.bearing:360-i*e,k=b.css("position")!=="static"?b.css("position"):"relative";b.css({padding:0,position:k}).addClass("roundabout-holder").data("roundabout",a.extend({},h,{startingChild:i,bearing:j,oppositeOfFocusBearing:d.normalize.apply(null,[h.focusBearing-180]),dragBearing:j,period:e}));if(g){b.unbind(".roundabout").children(h.childSelector).unbind(".roundabout")}else{if(h.responsive){a(window).bind("resize",function(){d.stopAutoplay.apply(b);d.relayoutChildren.apply(b)})}}if(h.clickToFocus){b.children(h.childSelector).each(function(c){a(this).bind("click.roundabout",function(){var e=d.getPlacement.apply(b,[c]);if(!d.isInFocus.apply(b,[e])){d.stopAnimation.apply(a(this));if(!b.data("roundabout").animating){d.animateBearingToFocus.apply(b,[e,b.data("roundabout").clickToFocusCallback])}return false}})})}if(h.btnNext){a(h.btnNext).bind("click.roundabout",function(){if(!b.data("roundabout").animating){d.animateToNextChild.apply(b,[b.data("roundabout").btnNextCallback])}return false})}if(h.btnPrev){a(h.btnPrev).bind("click.roundabout",function(){d.animateToPreviousChild.apply(b,[b.data("roundabout").btnPrevCallback]);return false})}if(h.btnToggleAutoplay){a(h.btnToggleAutoplay).bind("click.roundabout",function(){d.toggleAutoplay.apply(b);return false})}if(h.btnStartAutoplay){a(h.btnStartAutoplay).bind("click.roundabout",function(){d.startAutoplay.apply(b);return false})}if(h.btnStopAutoplay){a(h.btnStopAutoplay).bind("click.roundabout",function(){d.stopAutoplay.apply(b);return false})}if(h.autoplayPauseOnHover){b.bind("mouseenter.roundabout.autoplay",function(){d.stopAutoplay.apply(b,[true])}).bind("mouseleave.roundabout.autoplay",function(){d.startAutoplay.apply(b)})}if(h.enableDrag){if(!a.isFunction(b.drag)){if(h.debug){alert("You do not have the drag plugin loaded.")}}else if(!a.isFunction(b.drop)){if(h.debug){alert("You do not have the drop plugin loaded.")}}else{b.drag(function(a,c){var e=b.data("roundabout"),f=e.dragAxis.toLowerCase()==="x"?"deltaX":"deltaY";d.stopAnimation.apply(b);d.setBearing.apply(b,[e.dragBearing+c[f]/e.dragFactor])}).drop(function(a){var c=b.data("roundabout"),e=d.getAnimateToMethod(c.dropAnimateTo);d.allowAnimation.apply(b);d[e].apply(b,[c.dropDuration,c.dropEasing,c.dropCallback]);c.dragBearing=c.period*d.getNearestChild.apply(b)})}b.each(function(){var b=a(this).get(0),c=a(this).data("roundabout"),e=c.dragAxis.toLowerCase()==="x"?"pageX":"pageY",f=d.getAnimateToMethod(c.dropAnimateTo);if(b.addEventListener){b.addEventListener("touchstart",function(a){c.touchMoveStartPosition=a.touches[0][e]},false);b.addEventListener("touchmove",function(b){var f=(b.touches[0][e]-c.touchMoveStartPosition)/c.dragFactor;b.preventDefault();d.stopAnimation.apply(a(this));d.setBearing.apply(a(this),[c.dragBearing+f])},false);b.addEventListener("touchend",function(b){b.preventDefault();d.allowAnimation.apply(a(this));f=d.getAnimateToMethod(c.dropAnimateTo);d[f].apply(a(this),[c.dropDuration,c.dropEasing,c.dropCallback]);c.dragBearing=c.period*d.getNearestChild.apply(a(this))},false)}})}d.initChildren.apply(b,[f,g])})},initChildren:function(b,c){var e=a(this),f=e.data("roundabout");b=b||function(){};e.children(f.childSelector).each(function(b){var f,g,h,i=d.getPlacement.apply(e,[b]);if(c&&a(this).data("roundabout")){f=a(this).data("roundabout").startWidth;g=a(this).data("roundabout").startHeight;h=a(this).data("roundabout").startFontSize}a(this).addClass("roundabout-moveable-item").css("position","absolute");a(this).data("roundabout",{startWidth:f||a(this).width(),startHeight:g||a(this).height(),startFontSize:h||parseInt(a(this).css("font-size"),10),degrees:i,backDegrees:d.normalize.apply(null,[i-180]),childNumber:b,currentScale:1,parent:e})});d.updateChildren.apply(e);if(f.autoplay){f.autoplayStartTimeout=setTimeout(function(){d.startAutoplay.apply(e)},f.autoplayInitialDelay)}e.trigger("ready");b.apply(e);return e},updateChildren:function(){return this.each(function(){var b=a(this),c=b.data("roundabout"),e=-1,f={bearing:c.bearing,tilt:c.tilt,stage:{width:Math.floor(a(this).width()*.9),height:Math.floor(a(this).height()*.9)},animating:c.animating,inFocus:c.childInFocus,focusBearingRadian:d.degToRad.apply(null,[c.focusBearing]),shape:a.roundaboutShapes[c.shape]||a.roundaboutShapes[a.roundaboutShapes.def]};f.midStage={width:f.stage.width/2,height:f.stage.height/2};f.nudge={width:f.midStage.width+f.stage.width*.05,height:f.midStage.height+f.stage.height*.05};f.zValues={min:c.minZ,max:c.maxZ,diff:c.maxZ-c.minZ};f.opacity={min:c.minOpacity,max:c.maxOpacity,diff:c.maxOpacity-c.minOpacity};f.scale={min:c.minScale,max:c.maxScale,diff:c.maxScale-c.minScale};b.children(c.childSelector).each(function(g){if(d.updateChild.apply(b,[a(this),f,g,function(){a(this).trigger("ready")}])&&(!f.animating||c.lastAnimationStep)){e=g;a(this).addClass("roundabout-in-focus")}else{a(this).removeClass("roundabout-in-focus")}});if(e!==f.inFocus){if(c.triggerBlurEvents){b.children(c.childSelector).eq(f.inFocus).trigger("blur")}c.childInFocus=e;if(c.triggerFocusEvents&&e!==-1){b.children(c.childSelector).eq(e).trigger("focus")}}b.trigger("childrenUpdated")})},updateChild:function(b,c,e,f){var g,h=this,i=a(b),j=i.data("roundabout"),k=[],l=d.degToRad.apply(null,[360-j.degrees+c.bearing]);f=f||function(){};l=d.normalizeRad.apply(null,[l]);g=c.shape(l,c.focusBearingRadian,c.tilt);g.scale=g.scale>1?1:g.scale;g.adjustedScale=(c.scale.min+c.scale.diff*g.scale).toFixed(4);g.width=(g.adjustedScale*j.startWidth).toFixed(4);g.height=(g.adjustedScale*j.startHeight).toFixed(4);i.css({left:(g.x*c.midStage.width+c.nudge.width-g.width/2).toFixed(0)+"px",top:(g.y*c.midStage.height+c.nudge.height-g.height/2).toFixed(0)+"px",width:g.width+"px",height:g.height+"px",opacity:(c.opacity.min+c.opacity.diff*g.scale).toFixed(2),zIndex:Math.round(c.zValues.min+c.zValues.diff*g.z),fontSize:(g.adjustedScale*j.startFontSize).toFixed(1)+"px"});j.currentScale=g.adjustedScale;if(h.data("roundabout").debug){k.push('<div style="font-weight: normal; font-size: 10px; padding: 2px; width: '+i.css("width")+'; background-color: #ffc;">');k.push('<strong style="font-size: 12px; white-space: nowrap;">Child '+e+"</strong><br />");k.push("<strong>left:</strong> "+i.css("left")+"<br />");k.push("<strong>top:</strong> "+i.css("top")+"<br />");k.push("<strong>width:</strong> "+i.css("width")+"<br />");k.push("<strong>opacity:</strong> "+i.css("opacity")+"<br />");k.push("<strong>height:</strong> "+i.css("height")+"<br />");k.push("<strong>z-index:</strong> "+i.css("z-index")+"<br />");k.push("<strong>font-size:</strong> "+i.css("font-size")+"<br />");k.push("<strong>scale:</strong> "+i.data("roundabout").currentScale);k.push("</div>");i.html(k.join(""))}i.trigger("reposition");f.apply(h);return d.isInFocus.apply(h,[j.degrees])},setBearing:function(b,c){c=c||function(){};b=d.normalize.apply(null,[b]);this.each(function(){var c,e,f,g=a(this),h=g.data("roundabout"),i=h.bearing;h.bearing=b;g.trigger("bearingSet");d.updateChildren.apply(g);c=Math.abs(i-b);if(!h.animating||c>180){return}c=Math.abs(i-b);g.children(h.childSelector).each(function(c){var e;if(d.isChildBackDegreesBetween.apply(a(this),[b,i])){e=i>b?"Clockwise":"Counterclockwise";a(this).trigger("move"+e+"ThroughBack")}})});c.apply(this);return this},adjustBearing:function(b,c){c=c||function(){};if(b===0){return this}this.each(function(){d.setBearing.apply(a(this),[a(this).data("roundabout").bearing+b])});c.apply(this);return this},setTilt:function(b,c){c=c||function(){};this.each(function(){a(this).data("roundabout").tilt=b;d.updateChildren.apply(a(this))});c.apply(this);return this},adjustTilt:function(b,c){c=c||function(){};this.each(function(){d.setTilt.apply(a(this),[a(this).data("roundabout").tilt+b])});c.apply(this);return this},animateToBearing:function(b,c,e,f,g){var h=(new Date).getTime();g=g||function(){};if(a.isFunction(f)){g=f;f=null}else if(a.isFunction(e)){g=e;e=null}else if(a.isFunction(c)){g=c;c=null}this.each(function(){var i,j,k,l=a(this),m=l.data("roundabout"),n=!c?m.duration:c,o=e?e:m.easing||"swing";if(!f){f={timerStart:h,start:m.bearing,totalTime:n}}i=h-f.timerStart;if(m.stopAnimation){d.allowAnimation.apply(l);m.animating=false;return}if(i<n){if(!m.animating){l.trigger("animationStart")}m.animating=true;if(typeof a.easing.def==="string"){j=a.easing[o]||a.easing[a.easing.def];k=j(null,i,f.start,b-f.start,f.totalTime)}else{k=a.easing[o](i/f.totalTime,i,f.start,b-f.start,f.totalTime)}if(d.compareVersions.apply(null,[a().jquery,"1.7.2"])>=0&&!a.easing["easeOutBack"]){k=f.start+(b-f.start)*k}k=d.normalize.apply(null,[k]);m.dragBearing=k;d.setBearing.apply(l,[k,function(){setTimeout(function(){d.animateToBearing.apply(l,[b,n,o,f,g])},0)}])}else{m.lastAnimationStep=true;b=d.normalize.apply(null,[b]);d.setBearing.apply(l,[b,function(){l.trigger("animationEnd")}]);m.animating=false;m.lastAnimationStep=false;m.dragBearing=b;g.apply(l)}});return this},animateToNearbyChild:function(b,c){var e=b[0],f=b[1],g=b[2]||function(){};if(a.isFunction(f)){g=f;f=null}else if(a.isFunction(e)){g=e;e=null}return this.each(function(){var b,h,i=a(this),j=i.data("roundabout"),k=!j.reflect?j.bearing%360:j.bearing,l=i.children(j.childSelector).length;if(!j.animating){if(j.reflect&&c==="previous"||!j.reflect&&c==="next"){k=Math.abs(k)<j.floatComparisonThreshold?360:k;for(b=0;b<l;b+=1){h={lower:j.period*b,upper:j.period*(b+1)};h.upper=b===l-1?360:h.upper;if(k<=Math.ceil(h.upper)&&k>=Math.floor(h.lower)){if(l===2&&k===360){d.animateToDelta.apply(i,[-180,e,f,g])}else{d.animateBearingToFocus.apply(i,[h.lower,e,f,g])}break}}}else{k=Math.abs(k)<j.floatComparisonThreshold||360-Math.abs(k)<j.floatComparisonThreshold?0:k;for(b=l-1;b>=0;b-=1){h={lower:j.period*b,upper:j.period*(b+1)};h.upper=b===l-1?360:h.upper;if(k>=Math.floor(h.lower)&&k<Math.ceil(h.upper)){if(l===2&&k===360){d.animateToDelta.apply(i,[180,e,f,g])}else{d.animateBearingToFocus.apply(i,[h.upper,e,f,g])}break}}}}})},animateToNearestChild:function(b,c,e){e=e||function(){};if(a.isFunction(c)){e=c;c=null}else if(a.isFunction(b)){e=b;b=null}return this.each(function(){var f=d.getNearestChild.apply(a(this));d.animateToChild.apply(a(this),[f,b,c,e])})},animateToChild:function(b,c,e,f){f=f||function(){};if(a.isFunction(e)){f=e;e=null}else if(a.isFunction(c)){f=c;c=null}return this.each(function(){var g,h=a(this),i=h.data("roundabout");if(i.childInFocus!==b&&!i.animating){g=h.children(i.childSelector).eq(b);d.animateBearingToFocus.apply(h,[g.data("roundabout").degrees,c,e,f])}})},animateToNextChild:function(a,b,c){return d.animateToNearbyChild.apply(this,[arguments,"next"])},animateToPreviousChild:function(a,b,c){return d.animateToNearbyChild.apply(this,[arguments,"previous"])},animateToDelta:function(b,c,e,f){f=f||function(){};if(a.isFunction(e)){f=e;e=null}else if(a.isFunction(c)){f=c;c=null}return this.each(function(){var g=a(this).data("roundabout").bearing+b;d.animateToBearing.apply(a(this),[g,c,e,f])})},animateBearingToFocus:function(b,c,e,f){f=f||function(){};if(a.isFunction(e)){f=e;e=null}else if(a.isFunction(c)){f=c;c=null}return this.each(function(){var g=a(this).data("roundabout").bearing-b;g=Math.abs(360-g)<Math.abs(g)?360-g:-g;g=g>180?-(360-g):g;if(g!==0){d.animateToDelta.apply(a(this),[g,c,e,f])}})},stopAnimation:function(){return this.each(function(){a(this).data("roundabout").stopAnimation=true})},allowAnimation:function(){return this.each(function(){a(this).data("roundabout").stopAnimation=false})},startAutoplay:function(b){return this.each(function(){var c=a(this),e=c.data("roundabout");b=b||e.autoplayCallback||function(){};clearInterval(e.autoplayInterval);e.autoplayInterval=setInterval(function(){d.animateToNextChild.apply(c,[b])},e.autoplayDuration);e.autoplayIsRunning=true;c.trigger("autoplayStart")})},stopAutoplay:function(b){return this.each(function(){clearInterval(a(this).data("roundabout").autoplayInterval);a(this).data("roundabout").autoplayInterval=null;a(this).data("roundabout").autoplayIsRunning=false;if(!b){a(this).unbind(".autoplay")}a(this).trigger("autoplayStop")})},toggleAutoplay:function(b){return this.each(function(){var c=a(this),e=c.data("roundabout");b=b||e.autoplayCallback||function(){};if(!d.isAutoplaying.apply(a(this))){d.startAutoplay.apply(a(this),[b])}else{d.stopAutoplay.apply(a(this),[b])}})},isAutoplaying:function(){return this.data("roundabout").autoplayIsRunning},changeAutoplayDuration:function(b){return this.each(function(){var c=a(this),e=c.data("roundabout");e.autoplayDuration=b;if(d.isAutoplaying.apply(c)){d.stopAutoplay.apply(c);setTimeout(function(){d.startAutoplay.apply(c)},10)}})},normalize:function(a){var b=a%360;return b<0?360+b:b},normalizeRad:function(a){while(a<0){a+=Math.PI*2}while(a>Math.PI*2){a-=Math.PI*2}return a},isChildBackDegreesBetween:function(b,c){var d=a(this).data("roundabout").backDegrees;if(b>c){return d>=c&&d<b}else{return d<c&&d>=b}},getAnimateToMethod:function(a){a=a.toLowerCase();if(a==="next"){return"animateToNextChild"}else if(a==="previous"){return"animateToPreviousChild"}return"animateToNearestChild"},relayoutChildren:function(){return this.each(function(){var b=a(this),c=a.extend({},b.data("roundabout"));c.startingChild=b.data("roundabout").childInFocus;d.init.apply(b,[c,null,true])})},getNearestChild:function(){var b=a(this),c=b.data("roundabout"),d=b.children(c.childSelector).length;if(!c.reflect){return(d-Math.round(c.bearing/c.period)%d)%d}else{return Math.round(c.bearing/c.period)%d}},degToRad:function(a){return d.normalize.apply(null,[a])*Math.PI/180},getPlacement:function(a){var b=this.data("roundabout");return!b.reflect?360-b.period*a:b.period*a},isInFocus:function(a){var b,c=this,e=c.data("roundabout"),f=d.normalize.apply(null,[e.bearing]);a=d.normalize.apply(null,[a]);b=Math.abs(f-a);return b<=e.floatComparisonThreshold||b>=360-e.floatComparisonThreshold},getChildInFocus:function(){var b=a(this).data("roundabout");return b.childInFocus>-1?b.childInFocus:false},compareVersions:function(a,b){var c,d=a.split(/\./i),e=b.split(/\./i),f=d.length>e.length?d.length:e.length;for(c=0;c<=f;c++){if(d[c]&&!e[c]&&parseInt(d[c],10)!==0){return 1}else if(e[c]&&!d[c]&&parseInt(e[c],10)!==0){return-1}else if(d[c]===e[c]){continue}if(d[c]&&e[c]){if(parseInt(d[c],10)>parseInt(e[c],10)){return 1}else{return-1}}}return 0}};a.fn.roundabout=function(b){if(d[b]){return d[b].apply(this,Array.prototype.slice.call(arguments,1))}else if(typeof b==="object"||a.isFunction(b)||!b){return d.init.apply(this,arguments)}else{a.error("Method "+b+" does not exist for jQuery.roundabout.")}}})(jQuery);


