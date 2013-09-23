// AVOID CONSOLE ERRORS IN BROWSERS THAT LACK A CONSOLE //////////////////////////////
(function(){

	var method;
	var noop    = function () {};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeStamp', 'trace', 'warn'
	];
	var length  = methods.length;
	var console = (window.console = window.console || {});

	while ( length-- ) {
		method = methods[length];

		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}

})();

// PLACE ANY JQUERY/HELPER PLUGINS IN HERE ///////////////////////////////////////////


/***********************************************************************************************
						  __                _                 _
						 / _| __ _  ___ ___| |__   ___   ___ | | __
						| |_ / _` |/ __/ _ \ '_ \ / _ \ / _ \| |/ /
						|  _| (_| | (_|  __/ |_) | (_) | (_) |   <
						|_|  \__,_|\___\___|_.__/ \___/ \___/|_|\_\

 ***********************************************************************************************/

(function($){

	"use strict";

	$(function(){


		window.DiarioBebeFB = {
			Settings: {
				appId: '459611047479187',
				channelUrl:  template_url + '/js/FacebookSDK/channel.php',
				oauth : true
			},
			Scope: { scope: 'email,publish_stream,user_photos' },
			Friends: {}
		};

	// INTEGRACION API FACEBOOK //////////////////////////////////////////////////////////



		$.ajaxSetup({ cache: true }); // Set default values for future Ajax requests.


		DiarioBebeFB.loginCallback = function (response) {
			if (response.status === 'connected') {
				if ( isset($result['user_id']) ) {

			}
				console.log('autorizo.... ');
			} else if (response.status == 'not_authorized') {
				console.log('no autorizo.... ');
			}
		};


		DiarioBebeFB.loginFacebookUser = function (){
			FB.login( DiarioBebeFB.loginCallback, DiarioBebeFB.Scope );
		};


		DiarioBebeFB.getLoginStatusCallback = function (response){
			if (response.status === 'connected') {
					// mostrar contenido exclusivo para usuarios que autorizaron
			} else {
				DiarioBebeFB.loginFacebookUser();
			}
		};


		DiarioBebeFB.init = function () {
			$.getScript(
				'https://connect.facebook.net/es_ES/all.js'
			).done(function () {
				FB.init( DiarioBebeFB.Settings );
				FB.getLoginStatus( DiarioBebeFB.getLoginStatusCallback );
			});
		};


		$(document).ready(function(){
			DiarioBebeFB.init();
		});


	});

})(jQuery);






/***********************************************************************************************
				 _____ _                ____                               _
				|_   _(_)_ __  _   _   / ___|__ _ _ __ ___  _   _ ___  ___| |
				  | | | | '_ \| | | | | |   / _` | '__/ _ \| | | / __|/ _ \ |
				  | | | | | | | |_| | | |__| (_| | | | (_) | |_| \__ \  __/ |
				  |_| |_|_| |_|\__, |  \____\__,_|_|  \___/ \__,_|___/\___|_|
				               |___/

 ***********************************************************************************************/

(function(a){a.tiny=a.tiny||{};a.tiny.carousel={options:{start:1,display:1,axis:"x",controls:true,pager:false,interval:false,intervaltime:3000,rewind:false,animation:true,duration:1000,callback:null}};a.fn.tinycarousel_start=function(){a(this).data("tcl").start()};a.fn.tinycarousel_stop=function(){a(this).data("tcl").stop()};a.fn.tinycarousel_move=function(c){a(this).data("tcl").move(c-1,true)};function b(q,e){var i=this,h=a(".viewport:first",q),g=a(".overview:first",q),k=g.children(),f=a(".next:first",q),d=a(".prev:first",q),l=a(".pager:first",q),w=0,u=0,p=0,j=undefined,o=false,n=true,s=e.axis==="x";function m(){if(e.controls){d.toggleClass("disable",p<=0);f.toggleClass("disable",!(p+1<u))}if(e.pager){var x=a(".pagenum",l);x.removeClass("active");a(x[p]).addClass("active")}}function v(x){if(a(this).hasClass("pagenum")){i.move(parseInt(this.rel,10),true)}return false}function t(){if(e.interval&&!o){clearTimeout(j);j=setTimeout(function(){p=p+1===u?-1:p;n=p+1===u?false:p===0?true:n;i.move(n?1:-1)},e.intervaltime)}}function r(){if(e.controls&&d.length>0&&f.length>0){d.click(function(){i.move(-1);return false});f.click(function(){i.move(1);return false})}if(e.interval){q.hover(i.stop,i.start)}if(e.pager&&l.length>0){a("a",l).click(v)}}this.stop=function(){clearTimeout(j);o=true};this.start=function(){o=false;t()};this.move=function(y,z){p=z?y:p+=y;if(p>-1&&p<u){var x={};x[s?"left":"top"]=-(p*(w*e.display));g.animate(x,{queue:false,duration:e.animation?e.duration:0,complete:function(){if(typeof e.callback==="function"){e.callback.call(this,k[p],p)}}});m();t()}};function c(){w=s?a(k[0]).outerWidth(true):a(k[0]).outerHeight(true);var x=Math.ceil(((s?h.outerWidth():h.outerHeight())/(w*e.display))-1);u=Math.max(1,Math.ceil(k.length/e.display)-x);p=Math.min(u,Math.max(1,e.start))-2;g.css(s?"width":"height",(w*k.length));i.move(1);r();return i}return c()}a.fn.tinycarousel=function(d){var c=a.extend({},a.tiny.carousel.options,d);this.each(function(){a(this).data("tcl",new b(a(this),c))});return this}}(jQuery));






/***********************************************************************************************
	 ____  _               _                             _                 _   _
	/ ___|| |__   __ _  __| | _____      __   __ _ _ __ (_)_ __ ___   __ _| |_(_) ___  _ __
	\___ \| '_ \ / _` |/ _` |/ _ \ \ /\ / /  / _` | '_ \| | '_ ` _ \ / _` | __| |/ _ \| '_ \
	 ___) | | | | (_| | (_| | (_) \ V  V /  | (_| | | | | | | | | | | (_| | |_| | (_) | | | |
	|____/|_| |_|\__,_|\__,_|\___/ \_/\_/    \__,_|_| |_|_|_| |_| |_|\__,_|\__|_|\___/|_| |_|


 ***********************************************************************************************/

/*
 Shadow animation 20130124
 http://www.bitstorm.org/jquery/shadow-animation/
 Copyright 2011, 2013 Edwin Martin <edwin@bitstorm.org>
 Contributors: Mark Carver, Xavier Lepretre
 Released under the MIT and GPL licenses.
*/
jQuery(function(e,i){function j(){var b=e("script:first"),a=b.css("color"),c=false;if(/^rgba/.test(a))c=true;else try{c=a!=b.css("color","rgba(0, 0, 0, 0.5)").css("color");b.css("color",a)}catch(d){}return c}function k(b,a,c){var d=[];b.b&&d.push("inset");typeof a.left!="undefined"&&d.push(parseInt(b.left+c*(a.left-b.left),10)+"px "+parseInt(b.top+c*(a.top-b.top),10)+"px");typeof a.blur!="undefined"&&d.push(parseInt(b.blur+c*(a.blur-b.blur),10)+"px");typeof a.a!="undefined"&&d.push(parseInt(b.a+c*
(a.a-b.a),10)+"px");if(typeof a.color!="undefined"){var g="rgb"+(e.support.rgba?"a":"")+"("+parseInt(b.color[0]+c*(a.color[0]-b.color[0]),10)+","+parseInt(b.color[1]+c*(a.color[1]-b.color[1]),10)+","+parseInt(b.color[2]+c*(a.color[2]-b.color[2]),10);if(e.support.rgba)g+=","+parseFloat(b.color[3]+c*(a.color[3]-b.color[3]));g+=")";d.push(g)}return d.join(" ")}function h(b){var a,c,d={};if(a=/#([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})/.exec(b))c=[parseInt(a[1],16),parseInt(a[2],16),parseInt(a[3],
16),1];else if(a=/#([0-9a-fA-F])([0-9a-fA-F])([0-9a-fA-F])/.exec(b))c=[parseInt(a[1],16)*17,parseInt(a[2],16)*17,parseInt(a[3],16)*17,1];else if(a=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(b))c=[parseInt(a[1],10),parseInt(a[2],10),parseInt(a[3],10),1];else if(a=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9\.]*)\s*\)/.exec(b))c=[parseInt(a[1],10),parseInt(a[2],10),parseInt(a[3],10),parseFloat(a[4])];d=(a=/(-?[0-9]+)(?:px)?\s+(-?[0-9]+)(?:px)?(?:\s+(-?[0-9]+)(?:px)?)?(?:\s+(-?[0-9]+)(?:px)?)?/.exec(b))?
{left:parseInt(a[1],10),top:parseInt(a[2],10),blur:a[3]?parseInt(a[3],10):0,a:a[4]?parseInt(a[4],10):0}:{left:0,top:0,blur:0,a:0};d.b=/inset/.test(b);d.color=c;return d}e.extend(true,e,{support:{rgba:j()}});var l=e("html").prop("style"),f;e.each(["boxShadow","MozBoxShadow","WebkitBoxShadow"],function(b,a){if(typeof l[a]!=="undefined"){f=a;return false}});if(f)e.Tween.propHooks.boxShadow={get:function(b){return e(b.elem).css(f)},set:function(b){var a=b.elem.style,c=h(e(b.elem).get(0).style[f]||e(b.elem).css(f)),
d=e.extend({},c,h(b.end));if(c.color==i)c.color=d.color||[0,0,0];b.run=function(g){a[f]=k(c,d,g)}}}});
