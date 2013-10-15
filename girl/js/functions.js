(function($){

	"use strict";

	$(function(){

	// ADMIN //////////////////////////////////////////////////////////////////////


		// TOOLTIP ///////////////////////////////////////////////////////////////////////////


		$('.tooltip-image').tooltip({
			track: true,
			delay: 0,
			showURL: false,
			bodyHandler: function() {
				return $("<img/>").attr("src", this.src);
			}
		});



		// SUBMENU USER-EDIT
		function desapareVentanasEditUser(){
			$('#edit-account, #edit-profile').fadeOut(0);
			$('#edit-administration, #edit-services, #edit-photos').fadeOut(0);
			$('#edit-contact, #edit-hours, #edit-message').fadeOut(0);
			$('.barra-edit-users ul li a').removeClass('active-edit');
			$('body').removeClass('m-calendario')
		}

		$('#bt-acount').on('click', function (e) {
			desapareVentanasEditUser();
			$('#edit-account').fadeIn(0);
			$('#bt-acount a').addClass('active-edit');
		});

		$('#bt-administration').on('click', function () {
			desapareVentanasEditUser();
			$('#edit-administration').fadeIn(0);
			$('#bt-administration a').addClass('active-edit');
			$('body').addClass('m-calendario');
			$( "#datepicker" ).datepicker();
		});
		$('#bt-contact').on('click', function () {
			desapareVentanasEditUser();
			$('#edit-contact').fadeIn(0);
			$('#bt-contact a').addClass('active-edit');
		});

		$('#bt-profile').on('click', function () {
			desapareVentanasEditUser();
			$('#edit-profile').fadeIn(0);
			$('#bt-profile a').addClass('active-edit');
		});

		$('#bt-services').on('click', function () {
			desapareVentanasEditUser();
			$('#edit-services').fadeIn(0);
			$('#bt-services a').addClass('active-edit');
		});

		$('#bt-hours').on('click', function () {
			desapareVentanasEditUser();
			$('#edit-hours').fadeIn(0);
			$('#bt-hours a').addClass('active-edit');
		});
		$('#bt-photos').on('click', function () {
			desapareVentanasEditUser();
			$('#edit-photos').fadeIn(0);
			$('#bt-photos a').addClass('active-edit');
		});
		$('#bt-message').on('click', function () {
			desapareVentanasEditUser();
			$('#edit-message').fadeIn(0);
			$('#bt-message a').addClass('active-edit');
		});

		$('#edit-user-create').on('click', function () {
			$('body').addClass('edit-user-create');
		});



	// SELECT LANGUAGE ////////////////////////////////////////////////////////////



		$('.eliminar-language').live('click', function () {
			$(this).next('p').remove();
			$(this).remove();
		});


		$('#bt-select-languages').on('click', function () {
			var language = $('#languages-button span.ui-selectmenu-status').text();
			if(language != ''){
				$( ".coloca-language" ).append(' <div class="language"><span class="eliminar-language" data-language="'+language+'"></span><p>'+language+'</p></div>' );
			}

		});



	// SELECT COUNTRIE ////////////////////////////////////////////////////////////



		$('.eliminar-countries').live('click', function () {
			$(this).next('p').remove();
			$(this).remove();
		});


		$('#bt-select-countries').on('click', function () {
			var countries = $('#countries-button span.ui-selectmenu-status').text();
			if(countries != ''){
				$( ".coloca-countries" ).append(' <div class="countries"><span class="eliminar-countries" data-countries="'+countries+'"></span><p>'+countries+'</p></div>' );
			}
		});



	// SITIO GIRL /////////////////////////////////////////////////////////////////



		if ( $(".slide_box").length ){
			$(".slide_box").colorbox({rel:'slide_box', transition:"fade"});
		}

		//select
		$('select').selectmenu();

		//slide single
		$('.hover').fadeTo('slow', 0);
		$('.hover2').fadeTo('slow', 0);

		$('.hover').mouseover(function() {
			$('.hover').fadeTo('0', 1);
		});
		$('.hover').mouseout(function() {
			$('.hover').fadeTo('0', 0);
		});

		$('.hover2').mouseover(function() {
			$(this).fadeTo('0', 1);
		});
		$('.hover2').mouseout(function() {
			$(this).fadeTo('0', 0);
		});



	// FORMULARIOS CONTACTO ///////////////////////////////////////////////////////



		function validateEmail (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		}


		function enviarMail (getRequest) {
			return $.get(getRequest, {
				action: 'ajax_envia_mail'
			}, 'json');
		}

		function datosForm (datos){

			var getRequest = ajax_url+'?'+datos
			var ajaxMail   = enviarMail(getRequest);

			ajaxMail.done(function (data) {
				$('.pop-mensajes').fadeIn(750).delay(5000).fadeOut(750);
				$('.notice-body').html('Your message has been sent.')
				document.getElementById("form-contact-footer").reset();
				document.getElementById("form-contact-bemygirl").reset();
			});
		}

		function mensajeMailInvalid (userEmail){
			var email = userEmail + "is not a valid email address.";
			$('.pop-mensajes').fadeIn(750).delay(5000).fadeOut(750);
			$('.notice-body').html(email);
			$('#form-footer-email').addClass('error');
			$('#form-contact-girl-emai').addClass('error');
		}

		// formulario contacto footer

		$('#form-contact-footer').on('submit', function (event) {
			event.preventDefault();
			var userEmail = $('#form-footer-email').val();
			if( ! validateEmail(userEmail)){
				mensajeMailInvalid(userEmail);
			}else{
				var datos = $(this).serialize();
				datosForm(datos);
			}
		});

		// formulario contacto Page

		$('#form-contact-bemygirl').on('submit', function (event) {
			event.preventDefault();

			var userEmail = $('#form-contact-girl-email').val();

			if( ! validateEmail(userEmail)){
				mensajeMailInvalid(userEmail);
			}else{
				var datos = $(this).serialize();
				datosForm(datos);
			}
		});


		//MUESTRA PASSWORD-SUGGESTIONS
		$('#edit-information-password').on('click', function (e) {
			$('.password-suggestions').fadeIn();
		});

		//PASSWORD STRENGTH FORULARIO
		$("#edit-information-password").each(function(){


			$(this).keyup(function(){
				var password  = $('#form-edit-password').val();
				var longitud  = $(this).val().length;

				if ( longitud <= 5 ) $('.indicator').css('width', '20%');
				if ( longitud >= 6 ) $('.indicator').css('width', '60%'); $('#caracter6').fadeOut(0);
				if ( password.match(/([0-9])/) ) $('#numeros-pass').fadeOut(0);
				if ( password.match(/([A-Z])/) ) $('#letra-mayuscula').fadeOut(0);
				if ( password.match(/([a-z])/) ) $('#letra-minuscula').fadeOut(0);
				if ( password.match(/([!,%,&,@,#,$,^,*,?,_,~])/) ) $('#caracteres-especiales').fadeOut(0);
				if ( longitud >= 6 && password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) $('.indicator').animate({width: "+=3%"}, 200);
				if ( longitud >= 6 && password.match(/([0-9])/) ) $('.indicator').animate({width: "+=3%"}, 200);
				if ( longitud >= 6 && password.match(/([A-Z])/) ) $('.indicator').animate({width: "+=3%"}, 200);

				if(longitud >= 6 && password.match(/([0-9])/) && password.match(/([A-Z])/) && password.match(/([a-z])/) && password.match(/([!,%,&,@,#,$,^,*,?,_,~])/) ) {
					$('.password-suggestions').fadeOut(0);
					$('.indicator').css('width', '100%');
				}
			});

		});

		// INFORMACION DE IMAGEN
		$('.informacion').fadeTo('slow', 0);

		$('.informacion, #name').mouseover(function() {
			$(this).fadeTo({duration:150, queue:false}, 1);
		});

		$('.informacion').mouseout(function() {
			$(this).fadeTo({duration:150, queue:false}, 0);
		});

		// box_share magazine
		$('.box_share').fadeTo('slow', 0);

		$('.share').click(function() {
			$(this).next('.box_share').fadeTo({duration:150, queue:false}, 1);
		});

		$('.box_share').mouseleave(function() {
			$('.box_share').fadeTo({duration:150, queue:false}, 0);
		});


		// DISPLAYS
		function set_margin_small_grid(){
			$('.girl').each(function(index, value){
				if( (index+1)%5 === 0){
					$(this).addClass('ultima_img');
				}
			});
		}

		function set_margin_big_grid(){
			$('.girl').each(function(index, value){
				if( (index+1)%3 === 0){
					$(this).addClass('ultima_img');
					$(this).addClass('ultima_img_big');
				}
			});
		}


		//COLOR FONDO CADA DOS TABLAS LISTA DE SCORTS
		$('.views-escort').each(function(index, value){
			if( (index+1)%2 === 0){
				$(this).addClass('gris_claro');
			}
		});



		$(document).ready( set_margin_small_grid() );


		function girl_big() {
			$(".girl").css( "width", "30.4%" ).css( "margin-right", "4.37%" ).css( "margin-bottom", "4.3%" );
			$(".girl").addClass('girl2');
			$(".girl").removeClass('girl3');
			$(".informacion").addClass('informacion2');
			$(".girl").removeClass('ultima_img');
			set_margin_big_grid();
			$(".ultima_img").removeClass('girl2');
		}


		$( "#big" ).click(function() {
			girl_big();
		});


		$( "#small" ).click(function() {
			$(".girl").css( "width", "16.5%" ).css( "margin-right", "4.37%" ).css( "margin-bottom", "4.3%" );
			$(".galeria").css( "margin-left", "0px" );
			$(".girl").removeClass('girl2');
			$(".girl").addClass('girl3');
			$(".girl").removeClass('ultima_img');
			$(".informacion").removeClass('informacion2');
			set_margin_small_grid();
			$(".girl").removeClass('ultima_img_big');
		});

		// ADVANCED SEARCH
		$('#hover_service').fadeTo({duration:150, queue:false}, 0);

		$( '.profile' ).click(function() {
			$('.cont_profile').css( "display", "block" );
			$('.cont_service').css( "display", "none" );
			$('#hover_service').fadeTo({duration:150, queue:false}, 0);
			$('#hover_profile').fadeTo({duration:150, queue:false}, 1);
		});
		$( '.services' ).click(function() {
			$('.cont_profile').css( "display", "none" );
			$('.cont_service').css( "display", "block" );
			$('#hover_service').fadeTo({duration:150, queue:false}, 1);
			$('#hover_profile').fadeTo({duration:150, queue:false}, 0);
		});


		// CSS OVERRIDES-CHEATS
		var bodyWidth;
		$(window).resize(function(){
			bodyWidth = $(window).width();
			var mycol1height = $('.second-col').css('height');
			$('.first-col').css('height' , mycol1height);
		});
		if( bodyWidth >= 768 && bodyWidth <= 1024){
			var mycol1height = $('.second-col').css('height');
			$('.first-col').css('height' , mycol1height);
		}

		// MOBILE SIDE MENU
		$('#sidrTrigger').sidr();

		// SIDE MENU OPEN AND CLOSE
		$(window).swipe({
			swipeRight:function(event, direction, distance, duration, fingerCount) {
				$.sidr('open', 'sidr', function(){
					$('body').css({
						'overflow': 'hidden',
						'height': '100%',
						'position': 'fixed'
					});
				});
			},
			swipeLeft:function(event, direction, distance, duration, fingerCount) {
				$.sidr('close', 'sidr', function(){
					$('body').css({
						'overflow': 'auto',
						'height': 'auto',
						'position': 'relative'
					});
				});
			},
			threshold: '50',
			triggerOnTouchEnd: false
		});


		// DISABLE SWIPE
		if( $(window).width() >= 568 ){
			$(window).swipe('disable');
		}

		var mybodyWidth;
		$(window).resize(function(){
			mybodyWidth = $(window).width();
			if( mybodyWidth > 568 ){
				$.sidr('close', 'sidr');
				$(window).swipe('disable');
			}else if( mybodyWidth <= 568 ){
				$(window).swipe('enable');
			}
		});


		// DISABLE SWIPE ON GALLERY
		$('.girl_sidebar').live('click', function(){
			if( $('.link_phone_gallery:visible').length>0 ) $(window).swipe('disable');
		});


		// MOBILE GALLERY
		if ( $('.girl_sidebar li a').length &&  $('.girl_sidebar li a').is(':visible') ){
			var myPhotoSwipe = $('.girl_sidebar li a').photoSwipe({
				enableMouseWheel: false ,
				enableKeyboard: false,
				captionAndToolbarHide: false,
				preventSlideshow: true,
				allowUserZoom: false,
				backButtonHideEnabled: true
			});
		}


		$('li#refresh').on('click', function () {
			$('form#filter').submit();
		});


/*
	                                           888            .d888 d8b 888 888
	                                           888           d88P"  Y8P 888 888
	                                           888           888        888 888
	.d8888b   .d88b.   8888b.  888d888 .d8888b 88888b.       888888 888 888 888888 .d88b.  888d888
	88K      d8P  Y8b     "88b 888P"  d88P"    888 "88b      888    888 888 888   d8P  Y8b 888P"
	"Y8888b. 88888888 .d888888 888    888      888  888      888    888 888 888   88888888 888
	     X88 Y8b.     888  888 888    Y88b.    888  888      888    888 888 Y88b. Y8b.     888
	 88888P'  "Y8888  "Y888888 888     "Y8888P 888  888      888    888 888  "Y888 "Y8888  888
*/

		var filterForm = $('form#filter');

		$('.select-filter').on('change', function () {
			filterForm.submit();
		});




	});

})(jQuery);