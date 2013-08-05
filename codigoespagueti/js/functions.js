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



		// ANIMACIÓN TWWETS ////////////////////////////////////////////////////////////////////////



			$("#tweets").liScroll();



		}); // end document.ready

	});

})(jQuery);