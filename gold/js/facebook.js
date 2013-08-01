(function($){

	'use strict'

	$(function(){


		var facebookAppData = {
			appId      : '408409585943256',
			channelUrl : '//progress.lamaquiladora.com/momentos-gold',
			status     : true,
			cookie     : true
		};


		var facebookScope = {
			//scope: 'read_stream, email, publish_actions, user_photos, friends_photos'
			scope: 'email,publish_stream,publish_actions,user_birthday,user_location,user_about_me,user_hometown,user_photos,friends_photos'
		};



		function redirectToApp (response) {
			//console.log( response );
			//window.location = home_url + '/momentos-gold/';
		}



		function updateStatusCallback (response) {
			if ( response.status === 'connected' ) {
				FB.api( '/me', redirectToApp ); // User is connected, redirect to app
			}else{
				FB.login( userLoginCallback, facebookScope );
			}
		}



		function userLoginCallback (response) {
			if ( response.status === 'connected' ) {
				FB.api( '/me', redirectToApp );
			} else {
				console.log('User cancelled login or did not fully authorize.');
			}
		}



		function manageUserLoginStatus (FB) {
			if( typeof(FB.getLoginStatus()) === 'undefined' ){
				FB.login( userLoginCallback, facebookScope );
			}
		}


		$(document).ready(function() {
			var altura = $(window).height();
			console.log('width: ' + window.innerWidth );
			console.log('height: ' + window.innerHeight );
			console.log(altura);
			$.ajaxSetup({ cache: true });

			$.getScript('//connect.facebook.net/es_ES/all.js', function () {
				window.fbAsyncInit = function () {
					FB.init( facebookAppData );
					FB.Canvas.setSize({ width: window.innerWidth, height: altura });
					FB.getLoginStatus( updateStatusCallback );
				};
			});

		});




	}); // end

})(jQuery);