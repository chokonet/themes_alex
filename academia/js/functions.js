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



	// ANIMACIÓN DEL BOTON AGREGAR A FAVORITOS ///////////////////////////////////////////



		$('.agregar_fav, .regresar')
			.on('mousedown', function(){
				$(this).css({
					'-webkit-box-shadow': 'inset 1px 2px 4px 2px #BB6898',
					'box-shadow': 'inset 1px 2px 4px 2px #BB6898'
				});
			})
			.on('mouseup, mouseleave', function(){
				$(this).css({
					'-webkit-box-shadow': 'inset 0px 0px 0px 0px #000',
					'box-shadow': 'inset 0px 0px 0px 0px #000'
				});
			});



		$('.facebook')
			.on('mousedown', function(){
				$(this).css({
					'-webkit-box-shadow': 'inset 1px 2px 4px 2px #2B416F',
					'box-shadow': 'inset 1px 2px 4px 2px #2B416F'
				});
			})
			.on('mouseup, mouseleave', function(){
				$(this).css({
					'-webkit-box-shadow': 'inset 0px 0px 0px 0px #000',
					'box-shadow': 'inset 0px 0px 0px 0px #000'
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
		$('.agregar_fav').on('click', function () {
			var boton = $(this);
			ajax_favoritos( $(this).data('post_id'), 1 )
			.done(function (data){
				console.log('entro al done la siguiente lina le pone la clase');
				boton.addClass('selected_fav');
			});
		});

		// Quitar a favoritos
		$('.selected_fav').live('click', function () {
			var boton = $(this);
			ajax_favoritos( $(this).data('post_id'), 0 )
			.done(function (data){
				boton.removeClass('selected_fav');
			});
		});



	}); //end

})(jQuery);