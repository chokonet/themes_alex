(function($){

	"use strict";

	$(function(){


	// ANIMACIÓN DE INICIO INDEX//////////////////////////////////////////////////////////



		if ( typeof(is_home) !== 'undefined' ){
			$('.logo').css('margin-top','-168px')
				.animate({'margin-top': '0px'}, 1000)
				.animate({'margin-top': '-40px'}, 300)
				.animate({'margin-top': '0px'}, 300);

			$('.main, .fondo_dorado, .footer').fadeOut(0).delay(1800).slideDown();
		}



	// ANIMACIÓN DE LOS BOTONES BARRA SUPERIROR //////////////////////////////////////////



		$('button.boton_barra').not('.rosa')
			.on('mouseover', function(){
				$(this).css({
					'border-bottom': 'none',
					'opacity': '0.8'
				});
			})
			.on('mouseleave', function(){
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



		// AGREGAR A FAVORITOS
		$('body.no-favorito .agregar_fav').live('click', function () {
			var boton = $(this);
			ajax_favoritos( $(this).data('post_id'), 1 )
			.done(function (data){
				boton.addClass('selected_fav');
				$('body').removeClass('no-favorito').addClass('favorito');
			});
			$('.felicidades').fadeIn(750);
		});



		//POP_UP FAVORITOS
		$('.cierre_pop').live('click', function () {
			$('.felicidades').fadeOut(750);
		});



		// QUITAR A FAVORITOS
		$('body.favorito .agregar_fav').live('click', function () {
			var boton = $(this);
			ajax_favoritos( $(this).data('post_id'), 0 )
			.done(function (data){
				boton.removeClass('selected_fav');
				$('body').addClass('no-favorito').removeClass('favorito');
			});
		});



	// TERMINOS Y CONDICIONES ////////////////////////////////////////////////////////////



		$('#termsToggle').live('click', function () {
			$('#terminos').slideToggle('fast');
		});

		$('#terminos .close').live('click', function () {
			$('#terminos').slideToggle('fast');
		});



	// AVISO DE PRIVACIDAD ///////////////////////////////////////////////////////////////



		$('#privToggle').live('click', function () {
			$('#privacy').slideToggle('fast');
		});

		$('#privacy .close').live('click', function () {
			$('#privacy').slideToggle('fast');
		});


		//POPUP leyeron

		//carga de página, se ejecuta solamente 1 vez cuando la página cargo por completo
		$(document).ready(function(){
		  centraVentana();
		  muestraVentana();

		});

		function centraVentana() {
		    //Obtenemos ancho y alto del navegador, y alto y ancho de la popUp
		    var windowWidth = document.documentElement.clientWidth;
		    var windowHeight = document.documentElement.clientHeight;
		    var popupHeight = $("#popup_leyeron").height();
		    var popupWidth = $("#popup_leyeron").width();
		    //centering
		    $("#popup_leyeron").css({
		        "position": "fixed",
		        "top": windowHeight/2-popupHeight/2,
		        "left": windowWidth/2-popupWidth/2
		    });

		    //Solo se necesita para IE6
		    $("#popup_leyeron_fondo").css({
		        "height": windowHeight
		    });
		}

		function ocultaVentana() {
		     $("#popup_leyeron_fondo").fadeOut(750);
		     $("#popup_leyeron").fadeOut(750);
		     $("#cierre_pop").fadeOut(750);
		 }

		function muestraVentana() {
		    $("#popup_leyeron_fondo").css({
		        "opacity": "0.7"
		    });
		    $("#popup_leyeron_fondo").fadeIn(0);
		    $("#popup_leyeron").fadeIn(0);
		}

	}); //end

})(jQuery);