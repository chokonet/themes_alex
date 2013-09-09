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
			Scope: { scope: 'email,publish_stream' },
			Friends: {}
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
				$('body').removeClass('no-facebook');
			}else if (response.status == 'not_authorized'){
				$('body').addClass('no-facebook');
			}
		};


		AcademiaFB.loginFacebookUser = function (){
			FB.login( AcademiaFB.loginCallback, AcademiaFB.Scope );
		};


		AcademiaFB.getUserProfilePicture = function (friend) {
			FB.api("/"+friend.facebook_id+"/picture?width=180&height=180",  function (response) {
				$('<img />',{
					src: response.data.url,
					class: 'user'
				}).appendTo('.usuarios');

				$('.loading').hide();
			});
		};


		AcademiaFB.showFiendsWhoReadThisPost = function (friends, post_id) {
			$.get(ajax_url, {
				friends: friends,
				post_id: post_id,
				action: 'get_friends_posts'
			}, 'json')
			.done(function (data) {


				var friends = JSON.parse(data);

				if( friends.length > 0){
					$('.loading').show();
				}else{
					$('.loading').hide();
				}


				$.each(friends, function (index, friend){
					AcademiaFB.getUserProfilePicture( friend );
				});
			});
		};


		AcademiaFB.getUserFriends = function(){
			FB.api('/me/friends',function(response) {
				if( ! response.data) {
					return false;
				}

				AcademiaFB.Friends = $.map(response.data, function (friend, index) {
					return friend.id;
				});
				AcademiaFB.showFiendsWhoReadThisPost(
					AcademiaFB.Friends,
					$('.titulo_single').data('post_id')
				);
			});
		};


		AcademiaFB.getLoginStatusCallback = function (response){
			if (response.status === 'connected') { // mostrar contenido exclusivo para usuarios que autorizaron

				// mostrarcontenidos del single
				if ( is_single === '1'){
					AcademiaFB.getUserFriends();
				}

				$('body').removeClass('no-facebook');
			} else {
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


		$(document).ready(function(){
			AcademiaFB.init();
		});



	});

})(jQuery);