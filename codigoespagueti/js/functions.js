(function($){

	"use strict";

	$(function(){


		$(document).ready(function(){


		// CYCLE INIT METHOD /////////////////////////////////////////////////////////////////



			if ( $('div#single-slider').length > 0 ) {
				$('div#single-slider').cycle({
					pager: '#nav-slider',
					pagerAnchorBuilder: function(idx, slide) {
						return '#nav-slider li:eq(' + idx + ') a';
					}
				});
			}



		// GUARDAR DATOS DE LA VOTACION //////////////////////////////////////////////////////


			/**
			 * Init method del objeto VoteSlider
			 * @param (optional) element id to set value on change event
			 */
			VoteSlider.init('#cambiame_cova');


			/**
			 * Guardar los datos de la votacion por ajax
			 */
			$('button#save-vote').on('click', function () {
				var saveData = VoteSlider.save();
				saveData.done(function (data) {
					if ( data !== 'false' ) {
						// TODO: Cambiar el alert por otro efecto
						alert('¡Gracias! Tu voto ha sido guardado.');
						 window.location.reload();
					}
				});
			});



		// ANIMACIONES DEL SEARCH INPUT //////////////////////////////////////////////////////



			$("#search").mouseenter(function() {
				$("#form_busqueda").animate({"right":"0px"}, {duration:750, queue:false});
				$("#search").fadeOut(0);
				$("#searcho").fadeIn(0);
			});

			$("#busqueda").mouseleave(function() {
				if( $("#search-input").is(":focus") === false ){
					$('#search-input').trigger('blur');
				}
			});

			$("#searcho").on('click', function () {
				if( $("#search-input").is(":focus") === true ){
					$('#search-input').trigger('blur');
				}else{
					$('#search-input').focus();
				}
			});

			$('#search-input').on('blur', function () {
				$("#form_busqueda").animate({"right":"-210px"}, {duration:750, queue:false});
				$("#search").fadeIn(0);
				$("#searcho").fadeOut(0);
			});



		// ANIMACIÓN TWEETS ////////////////////////////////////////////////////////////////////////



			var countTweets       = $('#tweets').children().length;
			var tweetListElements = $('#tweets').children();
			var index             = 0;

			/**
			 * Mostrar los tweets recursivamente uno por uno con fadeIn y fadeOut
			 */
			(function show_next_tweet(){

				tweetListElements.fadeOut();

				var current = (countTweets <= index+1) ? index = 0 : index++;

				$(tweetListElements[current]).fadeIn();

				setTimeout(show_next_tweet, 12000);

			})();

			// Caja sidebar favoritos ///////////////////////////////////////////////////////////



			$('#noticias').on('click', function () {
				$('.side_noticias').fadeIn(0);
				$('.side_masgustado, .side_comentado, .side_sopitas').fadeOut(0);
				$('.favoritos li').removeClass('select');
				$(this).addClass('select');
			});
			$('#masgustado').on('click', function () {
				$('.side_masgustado').fadeIn(0);
				$('.side_noticias, .side_comentado, .side_sopitas').fadeOut(0);
				$('.favoritos li').removeClass('select');
				$(this).addClass('select');
			});
			$('#comentado').on('click', function () {
				$('.side_comentado').fadeIn(0);
				$('.side_noticias, .side_masgustado, .side_sopitas').fadeOut(0);
				$('.favoritos li').removeClass('select');
				$(this).addClass('select');
			});
			$('#sopitas').on('click', function () {
				$('.side_sopitas').fadeIn(0);
				$('.side_noticias, .side_comentado, .side_masgustado').fadeOut(0);
				$('.favoritos li').removeClass('select');
				$(this).addClass('select');
			});


		}); // end document.ready

	});

})(jQuery);