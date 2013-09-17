;(function($){

	"use strict";

	$(function(){

		$('.page-numbers').each(function(index, value){
			if(!$(this).hasClass('next') && !$(this).hasClass('prev') && !$(this).is(':nth-last-child(2)')){
				$(this).append(' - ');
			}
		});


		$('#slider, #slider_ana1, #slider_branding, #slider_equi').roundabout({
			btnPrev:    '#slider_prev',
			btnNext:    '#slider_next',
			responsive: true
		});

		$('#carusel-diccionario, #carusel-articulos, #carusel_videos_verde, #slider_wrap').tinycarousel({ display: 1 });


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
		$(".videos_ventana").click(function(){
		    	$(".videos_ventana").addClass('cycle-paused');
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
	//video_segundo
	$('.video_wrap_el').each(function(index, value){
				if( (index+1)%2 === 0){
					$(this).addClass('segundo_vid');
				}
			});
	//responsive menu
	$('.nav_mobile').live('click', function(){

		if ($(this).hasClass('on') ){
			$('.menu_mobile ').slideUp();
			$(this).removeClass('on');
		} else {
			$('.menu_mobile ').slideDown();
			$(this).addClass('on');
		}
	});
	//submenu
	$('.abre_submenu').live('click', function(){

		if ($(this).hasClass('active') ){
			$(this).next('.submenu_mobile').slideUp();
			$(this).removeClass('active');

		} else {

			$('.submenu_mobile').slideUp();
			$(this).next('.submenu_mobile').slideDown();
			$('.abre_submenu').removeClass('active');
			$(this).addClass('active');
		}
	});
	//subsub menu
	$('.abre_subsubmenu').live('click', function(){

		if ($(this).hasClass('on2') ){
			$('.subsubmenu_mobile').slideUp();
			$(this).removeClass('on2');

		} else {

			$('.subsubmenu_mobile').slideDown();
			$(this).addClass('on2');
		}
	});

	//slider
	$('#right_scroll').click(function(){

		var item_width = $('#carousel_ul li').outerWidth() + 20;
		var parse = parseInt($('#carousel_ul').css('left'));
		var left_indent = parse - item_width;

		$('#carousel_ul').animate({
			'left' : left_indent}, 500, function () {

			$('#carousel_ul').css({'left' : '0px'});
			$('#carousel_ul li:last').after($('#carousel_ul li:first'));
		});

	});

	$('#left_scroll').click(function(){

		var item_width = $('#carousel_ul li').outerWidth() + 20;
		var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;

		$('#carousel_ul').animate({
			'left' : left_indent}, 500 ,function () {

			$('#carousel_ul').css({'left' : '0px'});
			$('#carousel_ul li:first').before($('#carousel_ul li:last'));
		});
	});


	// Touch --------------------------
	$("#carousel_ul").touchwipe({
		preventDefaultEvents: false,
		wipeLeft: function() {

			var item_width = $('#carousel_ul li').outerWidth() + 20;
			var parse = parseInt($('#carousel_ul').css('left'));
			var left_indent = parse - item_width;

			$('#carousel_ul').animate({
				'left' : left_indent}, 500, function () {

				$('#carousel_ul').css({'left' : '0px'});
				$('#carousel_ul li:last').after($('#carousel_ul li:first'));
			});
			return false;
		},
		wipeRight: function() {

			var item_width = $('#carousel_ul li').outerWidth() + 20;
			var parse = parseInt($('#carousel_ul').css('left'));
			var left_indent = parse + item_width;

			$('#carousel_ul').animate({
				'left' : left_indent}, 500 ,function () {

				$('#carousel_ul').css({'left' : '0px'});
				$('#carousel_ul li:first').before($('#carousel_ul li:last'));
			});
			return false;
		}
	});
	// Touch diccionario--------------------------
	$("#carousel_uls").touchwipe({
		preventDefaultEvents: false,
		wipeLeft: function() {

			var item_width = $('#carousel_uls li').outerWidth() + 20;
			var parse = parseInt($('#carousel_uls').css('left'));
			var left_indent = parse - item_width;

			$('#carousel_uls').animate({
				'left' : left_indent}, 500, function () {

				$('#carousel_uls').css({'left' : '0px'});
				$('#carousel_uls li:last').after($('#carousel_uls li:first'));
			});
			return false;
		},
		wipeRight: function() {

			var item_width = $('#carousel_uls li').outerWidth() + 20;
			var parse = parseInt($('#carousel_uls').css('left'));
			var left_indent = parse + item_width;

			$('#carousel_uls').animate({
				'left' : left_indent}, 500 ,function () {

				$('#carousel_uls').css({'left' : '0px'});
				$('#carousel_uls li:first').before($('#carousel_uls li:last'));
			});
			return false;
		}
	});
	// Touch diccionario--------------------------
	$("#carousel_articulos").touchwipe({
		preventDefaultEvents: false,
		wipeLeft: function() {

			var item_width = $('#carousel_articulos li').outerWidth() + 20;
			var parse = parseInt($('#carousel_articulos').css('left'));
			var left_indent = parse - item_width;

			$('#carousel_articulos').animate({
				'left' : left_indent}, 500, function () {

				$('#carousel_articulos').css({'left' : '0px'});
				$('#carousel_articulos li:last').after($('#carousel_articulos li:first'));
			});
			return false;
		},
		wipeRight: function() {

			var item_width = $('#carousel_articulos li').outerWidth() + 20;
			var parse = parseInt($('#carousel_articulos').css('left'));
			var left_indent = parse + item_width;

			$('#carousel_articulos').animate({
				'left' : left_indent}, 500 ,function () {

				$('#carousel_articulos').css({'left' : '0px'});
				$('#carousel_articulos li:first').before($('#carousel_articulos li:last'));
			});
			return false;
		}
	});


})(jQuery);