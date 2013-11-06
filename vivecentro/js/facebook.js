(function($){

	"use strict";

	$(function(){


		/**************************************************
			  __                _                 _
			 / _| __ _  ___ ___| |__   ___   ___ | | __
			| |_ / _` |/ __/ _ \ '_ \ / _ \ / _ \| |/ /
			|  _| (_| | (_|  __/ |_) | (_) | (_) |   <
			|_|  \__,_|\___\___|_.__/ \___/ \___/|_|\_\

		 **************************************************/

		//window.AppIdVive = 654519584568126;//local alex
		window.AppIdVive = 251814941633434;//hacemos codigo

		window.ViveCentro = {
			Settings: {
				appId: AppIdVive,
				channelUrl: template_url + '/js/FacebookSDK/channel.php',
				cookie:true,
				status:true,
				xfbml:true
			},
			Scope: { scope: 'email,publish_stream,read_stream,export_stream,publish_actions,offline_access' },
		};

		$('.comprtirFB').live('click', function (e) {
			e.preventDefault();
			var button = $(this);

			FB.ui({
				method:     'feed',
				link:        button.data('permalink'),
				name:       'Vive el Centro',
				caption:     button.data('title'),       // post_title
				description: button.data('description'), // the_excerpt
				picture:     button.data('image')
			});
		});



		// INTEGRACION API FACEBOOK //////////////////////////////////////////////////////////



		$.ajaxSetup({ cache: true }); // Set default values for future Ajax requests.


		ViveCentro.loginCallback = function (response) {
			if (response.status === 'connected') {

				FB.api('/me', function(response) {
					$('.logout').text(response.name);
					window.id_user = response.id;
				});

				$('.login-facebook').addClass('logout');
				$('.logout').removeClass('login-facebook');

			}
		};


		ViveCentro.loginFacebookUser = function (){
			FB.login( ViveCentro.loginCallback, ViveCentro.Scope );
		};

		ViveCentro.getLoginStatusCallback = function (response){

			if (response.status === 'connected') { // mostrar contenido exclusivo para usuarios que autorizaron

				FB.api('/me', function(response) {
					$('.logout').text(response.name);
					window.id_user = response.id;
					check_if_post_favorito(window.id_user);
				});

				$('.login-facebook').addClass('logout');
				$('.logout').removeClass('login-facebook');

			}
		};

		ViveCentro.init = function (response) {
			$.getScript(
				'https://connect.facebook.net/es_ES/all.js'
			).done(function () {
				FB.init( ViveCentro.Settings );
				FB.getLoginStatus( ViveCentro.getLoginStatusCallback );
			});
		};

		ViveCentro.facebooklogout = function () {
			FB.logout(function (response) {
			   location.reload();
			}
		)};


		$(document).ready(function(){
			ViveCentro.init();

			feedFacebook();

			$('.login-facebook').live('click', function () {
				ViveCentro.loginFacebookUser();
			});

			$('.logout').live('click', function () {
				ViveCentro.facebooklogout();
			});



		});



		/*

		8888888888                                 d8b 888
		888                                        Y8P 888
		888                                            888
		8888888  8888b.  888  888  .d88b.  888d888 888 888888  .d88b.  .d8888b
		888         "88b 888  888 d88""88b 888P"   888 888    d88""88b 88K
		888     .d888888 Y88  88P 888  888 888     888 888    888  888 "Y8888b.
		888     888  888  Y8bd8P  Y88..88P 888     888 Y88b.  Y88..88P      X88
		888     "Y888888   Y88P    "Y88P"  888     888  "Y888  "Y88P"   88888P'
		*/


		// CHECA SI POST ES FAVORITO /////////////////////////////////////////////////////////
		function check_if_post_favorito(user_id){

			var post_id = $('.like_icon').data('post_id');

			$.post(ajax_url, {
				post_id: post_id,
				user_id: user_id,
				action : 'check_if_post_favorito'
			}, 'json')
			.done(function (data){
				if (data == '1') {
					$('body').addClass('favorito');
				};
			});

		}

		// CLICK LIKE POST ///////////////////////////////////////////////////////////////////


		function ajax_favoritos(post_id, user_id) {

			return $.post(ajax_url, {
				post_id: post_id,
				user_id: user_id,
				action: 'marcar_favoritos'
			}, 'json');
		}



		function obtener_megusta_delpost(post_id){

			$.post(ajax_url, {
				post_id: post_id,
				action: 'numero_megusta_post'
			}, 'json')
			.done(function (data){
				$('.like_icon').text(data);
			});


		}



		$('.like_icon').live('click', function (e) {
			e.preventDefault();

			var post_id = $(this).data('post_id');

			ajax_favoritos(post_id, window.id_user)
			.done(function (data){

				if (data == 'listo') {
					$('body').addClass('favorito');
					obtener_megusta_delpost( post_id );
				};

			});




		});




	// FACEBOOK COMENTS //////////////////////////////////////////////////////////////

		(function(d, s, id) {
			var js,
				fjs = d.getElementsByTagName(s)[0];

			if ( d.getElementById(id) ) return;

			js     = d.createElement(s);
			js.id  = id;
			js.src = "https://connect.facebook.net/es_ES/all.js#xfbml=1&appId="+AppIdVive;

			fjs.parentNode.insertBefore(js, fjs);

		}(document, 'script', 'facebook-jssdk'));





	/*
	8888888888                     888
	888                            888
	888                            888
	8888888  .d88b.   .d88b.   .d88888
	888     d8P  Y8b d8P  Y8b d88" 888
	888     88888888 88888888 888  888
	888     Y8b.     Y8b.     Y88b 888
	888      "Y8888   "Y8888   "Y88888



	8888888888                         888                        888
	888                                888                        888
	888                                888                        888
	8888888  8888b.   .d8888b  .d88b.  88888b.   .d88b.   .d88b.  888  888
	888         "88b d88P"    d8P  Y8b 888 "88b d88""88b d88""88b 888 .88P
	888     .d888888 888      88888888 888  888 888  888 888  888 888888K
	888     888  888 Y88b.    Y8b.     888 d88P Y88..88P Y88..88P 888 "88b
	888     "Y888888  "Y8888P  "Y8888  88888P"   "Y88P"   "Y88P"  888  888 */




	// FEED FACEBOOK VIVE CENTRO ///////////////////////////////////////////////////


		function ajax_get_token(){
			return $.get(ajax_url, {
				action: 'get_ajax_token'
			}, 'json');
		}

		function feedFacebook(){

			var get_token = ajax_get_token();

			get_token.done(function (token){
				$.getJSON( "https://graph.facebook.com/100006933429693/posts?limit=7&access_token="+token, function( data ) {
					var html     = $('#template-facebook-feed').html();
					var template = Handlebars.compile(html);
					var result   = template(data);
					$('.fb-feed').empty().append(result);
				});
			});


		}


	}); //end

})(jQuery);
