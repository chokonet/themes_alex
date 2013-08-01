;(function($){

	"use strict";

	$(function(){

		$('#slider, #slider_ana1, #slider_branding, #slider_equi').roundabout({
			btnPrev:    '#slider_prev',
			btnNext:    '#slider_next',
			responsive: true
		});

		$('#carusel-diccionario, #carusel-articulos, #carusel_videos_verde').tinycarousel({ display: 2 });

		$('#carusel-moda').tinycarousel({ display: 2 });

		$('.pD').click(function(e){
			e.preventDefault();
		});

		//nunca pude usar el cylce
		$('.iframe_wrap:first-child').show();

		var videos_nav_a = $('.videos_nav_a');
		videos_nav_a.click(function(){
			var class_selector = $(this).attr('class_selector');
			$('.videos_nav_a').removeClass('videos_nav_aselec');
			$(this).addClass('videos_nav_aselec');
			$('.iframe_wrap').hide();
			$('.' + class_selector).show();
		});

		//POPUP INDEX
		//carga de página, se ejecuta solamente 1 vez cuando la página cargo por completo
		$(document).ready(function(){
		  centraVentana();
		  muestraVentana();
		  //Agregamos el evento "click" del div: cerrar_pop
		  $("#cierre_pop").click(function(){
		    	ocultaVentana();
		  });

		});

		function centraVentana() {
		    //Obtenemos ancho y alto del navegador, y alto y ancho de la popUp
		    var windowWidth = document.documentElement.clientWidth;
		    var windowHeight = document.documentElement.clientHeight;
		    var popupHeight = $("#popup_hm").height();
		    var popupWidth = $("#popup_hm").width();
		    //centering
		    $("#popup_hm").css({
		        "position": "absolute",
		        "top": windowHeight/2-popupHeight/2,
		        "left": windowWidth/2-popupWidth/2
		    });

		    //Solo se necesita para IE6
		    $("#popup_hm_fondo").css({
		        "height": windowHeight
		    });
		}

		function ocultaVentana() {
		     $("#popup_hm_fondo").fadeOut(750);
		     $("#popup_hm").fadeOut(750);
		     $("#cierre_pop").fadeOut(750);
		 }

		function muestraVentana() {
		    $("#popup_hm_fondo").css({
		        "opacity": "0.7"
		    });
		    $("#popup_hm_fondo").fadeIn(0);
		    $("#popup_hm").fadeIn(0);
		}
		//formulario consulta a ana
		$('#forma_consulta').on('submit', function (event) {
			event.preventDefault();

			// tomar datos del form
			var name     = $('#form-name').val();
			var email    = $('#form-email').val();
			var pregunta = $('#form-pregunta').val();

			// mandar por ajax a una funcion que crea el post
			$.ajax({
				type: 'POST',
				url: ajax_url, // esta definido en functions.php
				data: {
					name: name,
					email: email,
					pregunta: pregunta,
					action: 'crear_nueva_pregunta'
				},
				dataType: 'json'
			})
			.done(function(data){
				window.test = data;
				if( typeof(data) === 'number' ){
					// mostrar mensaje de exito
					$('#forma_consulta').empty();
					$('<p></p>',{
						text: 'Hemos recibido tu pregunta, pronto la contestaremos, gracias.'
					}).appendTo('.single_cont');
				}else{
					$('#forma_consulta').empty();
					$('<p></p>',{
						text: 'No se envió la pregunta, intémntalo de nuevo.'
					}).appendTo('.single_cont');
				}
			});

		});

	});
})(jQuery);