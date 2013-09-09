(function($){

	"use strict";

	$(function(){


	// ANIMACIÓN DE LOS BOTONES BARRA SUPERIROR //////////////////////////////////////////



		$('button.boton_barra').not('.rosa')
			.on('mousedown', function(){
				$(this).css({
					'border-bottom': 'none',
					'opacity': '0.8'
				});
			})
			.on('mouseup, mouseleave', function(){
				$(this).css({
					'border-bottom': '3px solid #3c7bb0',
					'opacity': '1'
				});
			});



	// AGREGAR O ELEMINIAR DE LOS FAVORITOS //////////////////////////////////////////////



		function ajax_favoritos(post_id, favorito) {
			return $.post(ajax_url, {
				post_id: post_id,
				favorito: favorito,
				action: 'administrar_favoritos'
			}, 'json');
		}


		// Agregar a favoritos
		$('body.no-favorito .agregar_fav').live('click', function () {
			var boton = $(this);
			ajax_favoritos( $(this).data('post_id'), 1 )
			.done(function (data){
				boton.addClass('selected_fav');
				$('body').removeClass('no-favorito').addClass('favorito');
			});
		});


		// Quitar a favoritos
		$('body.favorito .agregar_fav').live('click', function () {
			var boton = $(this);
			ajax_favoritos( $(this).data('post_id'), 0 )
			.done(function (data){
				boton.removeClass('selected_fav');
				$('body').addClass('no-favorito').removeClass('favorito');
			});
		});



	}); //end

})(jQuery);