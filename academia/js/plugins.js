// AVOID CONSOLE ERRORS IN BROWSERS THAT LACK A CONSOLE.
(function() {
	var method;
	var noop = function () {};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];

		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());



/**************************************************
		 _            _ _   _
		| |___      _(_) |_| |_ ___ _ __
		| __\ \ /\ / / | __| __/ _ \ '__|
		| |_ \ V  V /| | |_| ||  __/ |
		 \__| \_/\_/ |_|\__|\__\___|_|

 **************************************************/


(function(d,s,id){
	var js,
		fjs = d.getElementsByTagName(s)[0],
		p   = /^http:/.test(d.location) ? 'http' : 'https';

	if ( ! d.getElementById(id) ) {
		js     = d.createElement(s);
		js.id  = id;
		js.src = p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);
	}
})(document, 'script', 'twitter-wjs');



/**************************************************
	  __                _                 _
	 / _| __ _  ___ ___| |__   ___   ___ | | __
	| |_ / _` |/ __/ _ \ '_ \ / _ \ / _ \| |/ /
	|  _| (_| | (_|  __/ |_) | (_) | (_) |   <
	|_|  \__,_|\___\___|_.__/ \___/ \___/|_|\_\

 **************************************************/



(function($){

	"use strict";

	$(function(){

		window.AcademiaFB = {
			Settings: {
				appId: '672465082763688',
				channelUrl: template_url + '/js/FacebookSDK/channel.php',
				oauth : true
			},
			Scope: { scope: 'email,publish_stream' }
		};


		// Share buttons
		window.shareOnFacebook = function () {
			window.open(
				'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),
				'facebook-share-dialog',
				'width=626,height=436'
			);
			return false;
		};


		// Integracion API Facebook
		$.ajaxSetup({ cache: true }); // Set default values for future Ajax requests.


		AcademiaFB.loginCallback = function (response) {

			if (response.status === 'connected') {
				console.log('el usuario ya autorizo la APP!!!');
			}else if (response.status == 'not_authorized'){
				alert('necitas acceptar para usar el sitio');
			}
		};


		AcademiaFB.loginFacebookUser = function (){
			FB.login( AcademiaFB.loginCallback, AcademiaFB.Scope );
		};


		AcademiaFB.getLoginStatusCallback = function (response){
			if (response.status === 'connected') {
				console.log('el usuario esta conectado y ya autorizo');
				// mostrar contenido exclusivo para usuarios que autorizaron


			} else if (response.status === 'not_authorized') {
				//el usuario SI esta conectado a Facebook falta autorizar la APP
				AcademiaFB.loginFacebookUser();
				$('body').addClass('no-facebook');
			} else {
				//el usuario NO esta conectado a Facebook
				AcademiaFB.loginFacebookUser();
				$('body').addClass('no-facebook');
			}
		};


		AcademiaFB.init = function () {
			$.getScript(
				'https://connect.facebook.net/es_ES/all.js'
			).done(function () {
				FB.init( AcademiaFB.Settings );
				FB.getLoginStatus( AcademiaFB.getLoginStatusCallback );
			});
		};



	});

})(jQuery);