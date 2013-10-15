(function($){

	"use strict";

	$(function(){

	// TINYCAROUSEL //////////////////////////////////////////////////////////////////////



		$('#sliderContainer, #carrusel_alertas').tinycarousel({ display: 1 });

		$('header').delay(100).fadeIn('slow', function(){
			$('.labelContainer').fadeIn('slow');
			$('.container').delay(100).slideDown('slow');
		});



	// ANIMATE BOX-SHADOW EFFECT /////////////////////////////////////////////////////////



		$('.button, .drop').mousedown(function(){
			$(this).animate({
				boxShadow: 'none'
			}, 50 );
		}).mouseup(function(){
			$(this).animate({
				boxShadow : '-3px 8px 15px 0px rgba(0, 0, 0, 0.2)'
			}, 50 );
		});



	// TWIST THE PICS ////////////////////////////////////////////////////////////////////



		$('.css-picframe').each(function () {
			var degrees = Math.round( Math.random()*12 )-6;
			$(this).css({
				'-webkit-transform' : 'rotate('+ degrees +'deg)',
				'-moz-transform' : 'rotate('+ degrees +'deg)',
				'-ms-transform' : 'rotate('+ degrees +'deg)',
				'transform' : 'rotate('+ degrees +'deg)'
			});
			var theclass = Math.round( Math.random()*2 )+1;
			switch(theclass){
				case 1:
					theclass = 'greenBtn';
					break;
				case 2:
					theclass = 'blueBtn';
					break;
				case 3:
					theclass = 'pinkBtn';
					break;
				default:
					theclass = 'greenBtn';
					break;
			}
			$(this).find('.pin').addClass( theclass );
		});


		function changeGallery(myvalue){

			switch(myvalue){
				case 0: // SHOW GALLERY 0
					$('.albumWrapper').fadeOut('fast', function(){
						$('#FotosA, #temaA, #titulo-temaA').fadeIn(0);
					});
					break;
				case 1: // SHOW GALLERY 1
					$('.albumWrapper').fadeOut('fast', function(){
						$('#FotosB, #temaB, #titulo-temaB').fadeIn(0);
					});
					break;
				case 2: // SHOW GALLERY 2
					$('.albumWrapper').fadeOut('fast', function(){
						$('#FotosC, #temaC, #titulo-temaC').fadeIn(0);
					});
					break;
				case 3: // SHOW GALLERY 3
					$('.albumWrapper').fadeOut('fast', function(){
						$('#FotosD, #temaD, #titulo-temaD').fadeIn(0);
					});
					break;
				default:
					break;
			}
		}


		$.extend($.ui.slider.prototype.options, {
			dragAnimate: true
		});


		var _mouseCapture = $.ui.slider.prototype._mouseCapture;
		$.widget('ui.slider', $.extend({}, $.ui.slider.prototype, {
			_mouseCapture: function(event) {
				_mouseCapture.apply(this, arguments);
				this.options.dragAnimate ? this._animateOff = false : this._animateOff = true;
				return true;
			}
		}));



	// SLIDER EDAD DEL BEBE //////////////////////////////////////////////////////////////



		$('#ageSlider').slider({
			animate : true,
			min     : 0,
			max     : 3,
			step    : 1,
			change: function(event, ui) {
				changeGallery(ui.value);
			}
		});

		$('.ui-slider-handle').addClass('rounded dropSmall');



	// SELECT MENU ///////////////////////////////////////////////////////////////////////



		var config = {
			'.chosen-select'           : {},
			'.chosen-select-deselect'  : {allow_single_deselect:true},
			'.chosen-select-no-single' : {disable_search_threshold:10},
			'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
			'.chosen-select-width'     : {width:"95%"}
		}

		for (var selector in config) {
			$(selector).chosen(config[selector]);
		}

		var configs = {
			'.chosen-hora'           : {},
			'.chosen-hora-deselect'  : {allow_single_deselect:true},
			'.chosen-hora-no-single' : {disable_search_threshold:10},
			'.chosen-hora-no-results': {no_results_text:'Oops, nothing found!'},
			'.chosen-hora-width'     : {width:"95%"}
		}

		for (var selector in configs) {
			$(selector).chosen(config[selector]);
		}



	// TERMINOS Y CONDICIONES ////////////////////////////////////////////////////////////



		$('#termsToggle').live('click', function () {
			$('#terminos').slideToggle('fast');
			$('html, body').css({
				'overflow': 'hidden',
				'height': '100%'
			});
		});

		$('#terminos .close').live('click', function () {
			$('#terminos').slideToggle('fast');
			$('html, body').css({
				'overflow': 'auto',
				'height': 'auto'
			});
		});



	// AVISO DE PRIVACIDAD ///////////////////////////////////////////////////////////////



		$('#privToggle').live('click', function () {
			$('#privacy').slideToggle('fast');
			$('html, body').css({
				'overflow': 'hidden',
				'height': '100%'
			});
		});


		$('#privacy .close').live('click', function () {
			$('#privacy').slideToggle('fast');
			$('html, body').css({
				'overflow': 'auto',
				'height': 'auto'
			});
		});



	// SET MOTHER STATUS /////////////////////////////////////////////////////////////////



		function set_mother_status (meta_value) {
			$('body').addClass(meta_value);
			return $.post(ajax_url, {
				meta_value: meta_value,
				action: 'set_user_mother_status'
			}, 'json');
		}




/*
	88888b.   .d88b.  88888b.  888  888 88888b.  .d8888b
	888 "88b d88""88b 888 "88b 888  888 888 "88b 88K
	888  888 888  888 888  888 888  888 888  888 "Y8888b.
	888 d88P Y88..88P 888 d88P Y88b 888 888 d88P      X88
	88888P"   "Y88P"  88888P"   "Y88888 88888P"   88888P'
	888               888               888
	888               888               888
	888               888               888
 */


 	// POPUPS HELPER FUNCTIONS ///////////////////////////////////////////////////////////


 		// VALIDAR FORMULARIO YA NACIO BEBE
		function validateRegistrationForm (form){
			var name  = form.children('#form-nombre-bebe').val(),
				day   = form.children('#form-dia-nacimiento').val(),
				month = form.children('#form-mes-nacimiento').val(),
				year  = form.children('#form-anio-nacimiento').val();

			return ( name!='' && day!='' && month!='' && year!='' );
		}


		function update_user_meta (meta_key, meta_value) {
			return $.post(ajax_url, {
				meta_key: meta_key,
				meta_value: meta_value,
				action: 'update_bebe_info'
			}, 'json');
		}



		function updateBebeInfo (form) {
			var name  = form.children('#form-nombre-bebe').val(),
				day   = form.children('#form-dia-nacimiento').val(),
				month = form.children('#form-mes-nacimiento').val(),
				year  = form.children('#form-anio-nacimiento').val(),
				fecha = year+'-'+month+'-'+day;

			update_user_meta('nombre_bebe', name);
			update_user_meta('fecha_bebe', fecha);

			$('.no-embarazada').removeClass('no-embarazada');
			$('#cover .blue').text(name);
		}



	// POPUPS ANIMATIONS /////////////////////////////////////////////////////////////////


		$(document).ready(function(){

			if( typeof(user_meta.mother_status) === 'undefined' ){
				muestraRegistroInicial();
			}


			centraVentana();
			$('#ascrail2000-hr').fadeOut;
			$('#ascrail2001-hr').fadeOut;


			function PasarBienvenidadDeMama(){
				set_mother_status('mama');
				ocultaVentanas();
				fondoPopUp();
				$('.overlay').fadeOut('fast');
				$("#bienvenida-diario").fadeIn(0);
			}


			// AGREGAR BIENVENIDA
			$('#bt-registro-mama').live('click', function(){
				if ( validateRegistrationForm($('#form-registro-mama')) ){
					PasarBienvenidadDeMama();
					updateBebeInfo( $('#form-registro-mama') );
				}
			});

			// AGREGAR BIENVENIDA REGISTRO YA NACIO MI BEBE
			$('#bt-registro-ya-nacio').live('click', function(){
				if ( validateRegistrationForm($('#form-ya-nacio')) ){
					PasarBienvenidadDeMama();
					updateBebeInfo( $('#form-ya-nacio') );
				}
			});

			//SALIR DE COMPARTIR FOTOS

			$('#bt-compartir-fotos').on('click', function (e) {
				ocultaVentanas();
			});


			// BOTON ESTOY EMBARAZADA
			$('#bt-estoy-embarazada').click(function(){
				ocultaVentanas();
				fondoPopUp();
				$("#bienvenida-diario").fadeIn(0);
				set_mother_status('embarazada');
				$('body').css( "overflow","hidden" );
			});


			// SOY MAMA
			$('#bt-soy-mama').click(function(){
				set_mother_status('mama');
				ocultaVentanas();
				fondoPopUp();
				$('#bt-ya-nacio').fadeOut();
				$('#registro-mama').fadeIn(0);
				$('body').css( "overflow","hidden" );
			});


			// YA NACIO
			$('#bt-ya-nacio').click(function(){
				ocultaVentanas();
				fondoPopUp();
				$('#registro-ya-nacio').fadeIn(0);
				$('body').css( "overflow","hidden" );
			});


			// AGREGAR ALERTA
			$('#agregar-alerta').click(function(){
				fondoPopUp();
				$('#crea-tu-alerta').fadeIn(0);
				$('body').css( "overflow","hidden" );
				//$('#jquery-datepicker').datepicker().datepicker('show');
				$('#calendario_alerta').datepicker({
					dateFormat: 'yy-mm-dd', //2013-09-22T14:30:00-0500
					inline: true
				});
			});

			//SELECT IMAGEN ALERTA

			$('.selectEvent').on('click', function (e) {
				$('.selectEvent').removeClass('select');
				$(this).addClass('select');
			});

			// AGREGAR LOGRO
			$('#bt-agregar-logro').click(function(){
				ocultaVentanas();
				fondoPopUp();
				$('#generar-logro').fadeIn(0);
				$('body').css( "overflow","hidden" );
			});


			$('.cierre_pop').click(function(){
				ocultaVentanas();
				$('body').css( "overflow","scroll" );

			});




			//ABRE POP FOTO ALBUM /////////////////////////////////////////////////////////////////

			function ContenidoPopUp(data, post_id, post_author){
				$( "#foto-album img, #bt-borrar-logro, #bt-cambiar-foto" ).remove();

				$('#foto-album').append('<img src="'+ data +'">');

				$('<div></div>', {
					'class'        : "boton_pop greenBtn rounded drop",
					'id'           : "bt-borrar-logro",
					'text'         : "BORRAR LOGRO",
					'data-id' : post_id
				}).appendTo('#foto-album');

				$('<div></div>', {
					'class'        : "boton_pop pinkBtn rounded drop",
					'id'           : "bt-cambiar-foto",
					'text'         : "CAMBIAR FOTO",
					'data-post_id' : post_id
				}).appendTo('#foto-album');

				$('#foto-album').fadeIn();
				$('body').css( "overflow","hidden" );
			}

			function enviarIDparaPop(post_id){
				$.post(ajax_url,{
					post_id: post_id,
					action: 'obtieneIDParaPop'
				}, 'json')
				.done(function (data){
					ContenidoPopUp(data, post_id);
					fondoPopUp();
				});

			}

			$('.abre_pop').live('click', function () {
				enviarIDparaPop( $(this).data('post_id') );
				$('#popup_fondo').addClass('quita_fondo');
			});

			$('.quita_fondo').live('click', function () {
				$('#popup_fondo').fadeOut();
				ocultaVentanas();
				$('body').css( "overflow","scroll" );
			});




			//BORRAR POST ALBUM /////////////////////////////////////////////////////////////////

			function BorrarPostAlbum(post_id){
				$.post(ajax_url,{
					post_id: post_id,
					action: 'BorrarPostAlbum'
				}, 'json')
				.done(function (data){
					 location.reload();
				});

			}

			$('#bt-borrar-logro').live('click', function () {
				$('.overlay').fadeIn('fast');
				var post_id = $(this).data('id');
				BorrarPostAlbum(post_id);
			});





		}); // end document.ready



	// HELPER POPUPS FUNCTIONS ///////////////////////////////////////////////////////////



		function centraVentana() {
			//Obtenemos ancho y alto del navegador, y alto y ancho de la popUp
			var windowWidth  = document.documentElement.clientWidth,
				windowHeight = document.documentElement.clientHeight,
				popupHeight  = $('.popups_diario').height(),
				popupWidth   = $('.popups_diario').width();
			//centering
			$('.popups_diario').css({
				'position': 'absolute',
				'top': windowHeight/2-popupHeight/2,
				'left': windowWidth/2-popupWidth/2
			});

			//Solo se necesita para IE6
			$('#popup_fondo').css({
				'height': windowHeight
			});
		}


		function ocultaVentanas() {
			$('#popup_fondo, #crea-tu-alerta, #registro-ya-nacio').fadeOut(0);
			$('#registro-inicial, #compartir-album, #foto-album').fadeOut(0);
			$('#registro-mama').fadeOut(0);
			$('#bienvenida-diario').fadeOut(0);
			$('#generar-logro').fadeOut(0);

		}

		$('#bt-bienvenida-diario').on('click', function (e) {
			ocultaVentanas();
			$('body').css( "overflow","scroll" );

		});


		function muestraRegistroInicial() {
			fondoPopUp();
			$('#registro-inicial').fadeIn(0);
		}


		function fondoPopUp(){
			$('#popup_fondo').css({'opacity':'0.7'}).fadeIn(0);
		}



/*
			 888                  888
			 888                  888
			 888                  888
	 8888b.  888  .d88b.  888d888 888888  8888b.  .d8888b
		"88b 888 d8P  Y8b 888P"   888        "88b 88K
	.d888888 888 88888888 888     888    .d888888 "Y8888b.
	888  888 888 Y8b.     888     Y88b.  888  888      X88
	"Y888888 888  "Y8888  888      "Y888 "Y888888  88888P'
 */




 		function send_ajax_request (json) {
 			return $.post(ajax_url, json, 'json');
 		}



		function saveEventoID (evento_id) {
			return send_ajax_request({
				evento_id:evento_id,
				action:'save_user_event'
			});
		}

		// deprecated
		function sendUserNotification (message) {
			$.post(ajax_url,{
				message: message,
				action: 'send_facebook_notification'
			}, 'json')

			.done(function (data){
				ocultaVentanas();
			});
		}


		$('#bt-empezar').live('click', function (e) {

			e.preventDefault();


			var name       = $('#form-nombre-alerta').val(),
				fecha      = $('#calendario_alerta').val(),
				hora       = $('.chosen-hora').val(),
				imagen     = $('.select').data('imagen'),
				start_time = fecha+'T'+hora+':00-0500';


			var createEvent = send_ajax_request({
				name: name,
				start_time: start_time,
				imagen: imagen,
				action: 'create_facebook_event'
			});


			createEvent.done(function (event){

				if(event){
					var saveEvent = saveEventoID(event.id);

					saveEvent.done(function (save){
						ocultaVentanas();
						location.reload();
						//sendUserNotification('Se creo un nuevo evento en tu calendario.');
					});
				}
			});

		});

		//OVERLAY ///////////////////////////////////////////////////////////////////

		$('#bt-empezar, #bt-subir-logro').live('click', function () {
   			$('.overlay').fadeIn('fast');
   		});


/*
					  888      d8b               .d888         888
					  888      Y8P              d88P"          888
					  888                       888            888
	.d8888b  888  888 88888b.  888 888d888      888888 .d88b.  888888 .d88b.
	88K      888  888 888 "88b 888 888P"        888   d88""88b 888   d88""88b
	"Y8888b. 888  888 888  888 888 888          888   888  888 888   888  888
		 X88 Y88b 888 888 d88P 888 888          888   Y88..88P Y88b. Y88..88P
	 88888P'  "Y88888 88888P"  888 888          888    "Y88P"   "Y888 "Y88P"
 */


	// GUARDAR IMAGE DATA COMO PNG ///////////////////////////////////////////////////////


		function showPerfilFoto(){
			$('#cambiar-foto').hide();
			$('#foto-Computadora').hide();
			$('#foto-facebook').hide();
			$('#ascrail2000, #ascrail2001').hide();
			$('#cover').show();
		}

		function updateCoverImageSource(imageUrl){
			$('#foto-de-perfil img').prop('src', imageUrl);
		}


		/**
		 * Guardar data:image/png;base64 como un archivo PNG
		 * @param: data
		 * @param: directory
		 * @return: ajax_event
		 */
		function saveImageData (image_data, directory) {

			var image;

			if( directory == 'covers'){
				updateCoverImageSource(image_data);
			}

			if( image_data.indexOf('data:image') !== -1 ){
				var data = image_data.split(',');
				image = data[1];
			}else{
				image = image_data;
			}


			return $.post(ajax_url, {
				image_data: image,
				directory: directory,
				action: 'save_imagen_usuario'
			}, 'json' );
		}



	// SUBIR IMAGENES DESDE LA COMPUTADORA ///////////////////////////////////////////////


		/**
		 * Despliega la imagen selecionada en el container indicado
		 * @param: input[type='file']
		 * @param: container jQuery para desplegar la imagen
		 */
		function mq_display_file (input, container) {
			var reader = new FileReader();
			reader.onload = function(e){
				container.attr('style', 'background: url('+ e.target.result +') no-repeat center center; background-size: cover;');
				saveImageData( e.target.result, 'covers' );
			}
			reader.readAsDataURL(input.files[0]);
		}



	// NICE SCROLL INIT //////////////////////////////////////////////////////////////////



		function niceScrollInit () {
			$('#albums-perfil').niceScroll({
				cursorcolor  : '#D289A6',
				cursorwidth  : '30',
				cursorborder : '',
				railpadding  : { top:10, right:0, left:0, bottom:10 }
			});


		}
		function niceScrollInit2 () {

			$('#albums-logro').niceScroll({
				cursorcolor  : '#0000',
				cursorwidth  : '30',
				cursorborder : '',
				railpadding  : { top:10, right:0, left:0, bottom:10 }
			});

		}



	// AGREGAR FOTO PERFIL ///////////////////////////////////////////////////////////////



		$('#bt-cambiar-foto').on('click', function () {
			$('#cover').fadeOut(0);
			$('#cambiar-foto').fadeIn(0);
		});


		// AGREGAR DESDE FACEBOOK
		$('#subir-foto-facebook').on('click', function () {
			$('#cambiar-foto').fadeOut(0);
			$('#foto-facebook, #ascrail2001, #ascrail2000').fadeIn(0);
			setTimeout(niceScrollInit(), 300);
		});


		// AGREGAR DESDE COMPUTADORA
		$('#subir-foto-computadora').on('click', function () {
			$('#cambiar-foto').fadeOut(0);
			$('#foto-Computadora').fadeIn(0);
		});


		// DISPARAR CLICK DEL SELECTOR DE IMAGENES
		$('#clickmecomputer').on('click', function () {
			$('#subir-foto-paso-uno').trigger('click');
		});


		// REGRESAR AL PERFIL DESDE PERFIL-CAMBIAR
		$('#regresar-perfil-foto').click(function(){
			$('#cambiar-foto').fadeOut(0);
			$('#cover').fadeIn(0);
		});


		// REGRESAR AL PERFIL CAMBIAR DESDE PERFIL-FACEBOOK
		$('#regresar-perfil-cambiar').click(function(){
			$('#foto-facebook, #ascrail2001, #ascrail2000').fadeOut(0);
			$('#cambiar-foto').fadeIn(0);
		});


		// REGRESAR AL PERFIL CAMBIAR DESDE PERFIL-COMPUTADORA
		$('#regresar-perfil-cambiar2').click(function(){
			$('#foto-Computadora').fadeOut(0);
			$('#cambiar-foto').fadeIn(0);
		});



	// AGREGAR FOTO LOGRO ////////////////////////////////////////////////////////////////



		$('.picframe').on('click', function () {
			$('#cambiar-foto-logro').fadeIn(0);
			$('#albums').fadeOut(0);
		});

		$('#bt-cambiar-foto').live('click', function () {
			$('#cambiar-foto-logro').fadeIn(0);
			$('#albums').fadeOut(0);
			$('#foto-album').fadeOut(0);
			$('body').css( "overflow","scroll" );
			ocultaVentanas();
		});

		// REGRESAR AL LOGRO DESDE LOGRO-CAMBIAR
		$('#regresar-logro-album').on('click', function (e) {
			$('#cambiar-foto-logro').fadeOut(0);
			$('#albums').fadeIn(0);
		});

		// REGRESAR AL LOGRO CAMBIAR DESDE LOGRO-FACEBOOK
		$('#regresar-logro-cambiar').on('click', function (e) {
			$('#foto-facebook-logro, #ascrail2001, #ascrail2000').fadeOut(0);
			$('#cambiar-foto-logro').fadeIn(0);
		});

		// REGRESAR AL LOGRO CAMBIAR DESDE LOGRO-COMPUTADORA
		$('#regresar-logro-cambiar2').on('click', function (e) {
			$('#foto-Computadora-logro').fadeOut(0);
			$('#foto-facebook-logro').fadeIn(0);
		});

		// AGREGAR DESDE FACEBOOK
		$('#cambiar-foto-logro #subir-foto-facebook').on('click', function () {
			$('#cambiar-foto-logro').fadeOut(0);
			$('#foto-facebook-logro').fadeIn(0);
		});
		// AGREGAR FOTO LOGRO DESDE FACEBOOK
		$('#subir-foto-logro-facebook').on('click', function () {
			$('#cambiar-foto-logro').fadeOut(0);
			$('#foto-facebook-logro, #ascrail2001, #ascrail2000').fadeIn(0);
			setTimeout(niceScrollInit2(), 300);
		});
		// AGREGAR DESDE COMPUTADORA
		$('#cambiar-foto-logro #subir-foto-computadora').on('click', function () {
			$('#cambiar-foto-logro').fadeOut(0);
			$('#foto-Computadora-logro').fadeIn(0);
		});

		// DISPARAR CLICK DEL SELECTOR DE IMAGENES
		$('#foto-Computadora-logro #clickmecomputer').on('click', function () {
			$('#subir-foto-logro').trigger('click');
		});



	// SUBIR FOTO DESDE LA COMPUTADORA ///////////////////////////////////////////////////



		$('.subeFoto img').live('click', function(){
			$('#sube-foto-semana').trigger('click');
		});



		$('#subir-foto-paso-uno').live('change', function () {

			var container = $('#image-from-computer'),
				file      = $(this).val();

			switch( file.substring(file.lastIndexOf('.') + 1).toLowerCase() ){
				case 'png': case 'jpg': case 'jpeg':
					mq_display_file( this, container ); // mostrar la imagen seleccionada
					setTimeout(showPerfilFoto(), 600);
					$('#clickmecomputer').hide();
					break;
				default:
					$(this).val('');
					container.attr('style', 'background: white;');
					break;
			}
		});




/*
	 .d888                          888                        888
	d88P"                           888                        888
	888                             888                        888
	888888 8888b.   .d8888b .d88b.  88888b.   .d88b.   .d88b.  888  888
	888       "88b d88P"   d8P  Y8b 888 "88b d88""88b d88""88b 888 .88P
	888   .d888888 888     88888888 888  888 888  888 888  888 888888K
	888   888  888 Y88b.   Y8b.     888 d88P Y88..88P Y88..88P 888 "88b
	888   "Y888888  "Y8888P "Y8888  88888P"   "Y88P"   "Y88P"  888  888
*/



	// MOSTRAR Y OCULTAR LAS FOTOS/ALBUMS ////////////////////////////////////////////////



		function ocultarAlbums () {
			var done = $.Deferred();
			$('#fb-contenedor-albums, #fb-contenedor-albums-logro').fadeOut(300, function(){
				done.resolve();
			});
			return done.promise();
		}



		function mostrarFotos (album_id) {
			$('.album-'+album_id).fadeIn(200);

		}



		function ocultarFotos () {
			$('.album_fotos_fb').fadeOut(200);
			$('#fb-contenedor-albums, #fb-contenedor-albums-logro').fadeIn(200);
		}



		$('div.album').on('click', function () {
			var album_id   = $(this).data('id'),
				hideAlbums = ocultarAlbums();

			hideAlbums.done(function(){
				mostrarFotos(album_id);
			});
		});



	// MOSTRAR O ESCONDER ELEMENTOS DE FACEBOOK ////////////////////////////////////////



		function show_buttons_step_one () {
			$('#regresar-albums, #regresar-albums-logro').show();
			$('#cambio_album').text('Selecciona entre tus fotos de Facebook:');
		}


		function hide_buttons_step_one () {
			$('#regresar-albums, #regresar-albums-logro').hide();
			$('#cambio_album').text('Selecciona entre tus álbumes de Facebook:');
		}


		/**
		 * Mostrar el contenido (fotos) de un album on user click
		 */
		$('.album').live('click', function () {
			show_buttons_step_one();
		});


		/**
		 * Boton para regresar a ver listado de albums
		*/
		$('#regresar-albums').on('click', function () {
			hide_buttons_step_one();
			ocultarFotos();
		});
		$('#regresar-albums-logro').on('click', function () {
			hide_buttons_step_one();
			ocultarFotos();
		});



	// DISPLAY ALBUM ON CLICK FUNCTION ///////////////////////////////////////////////////



		$('.album-inside').live('click', function(){
			if($(this).hasClass('selectedImage')){

				//Remove class 'selectedImage'
				$('.album-inside').removeClass('selectedImage');
				//Hide overlay
				$(this).children('.selected_check').hide();
				$(this).children('.selected_cross').hide();

			}else{

				// Mostrar overlay
				$('.album-inside').children('.selected_check').hide();
				$('.album-inside').children('.selected_cross').hide();
				$(this).children('.selected_check').show();
				// Add class: 'selectedImage'
				$('.album-inside').removeClass('selectedImage');
				$(this).addClass('selectedImage');
			}
		});


		$('.selectedImage').live("mouseenter", function() {
			$(this).children('.selected_check').hide();
			$(this).children('.selected_cross').show();
		}).live("mouseleave", function() {
			$(this).children('.selected_cross').hide();
			$(this).children('.selected_check').show();
		});



	// NUEVO EVENTO DE FACEBOOK //////////////////////////////////////////////////////////



		$('#add-facebook-event').on('click', function (e) {
			e.preventDefault();
			$.post(ajax_url, {
				action: 'set_facebook_event',
			}, 'json')

			.done(function (data){
			});
		});


		// GUARDAR IMAGEN DESDE ALBUM DE FACEBOOK
		$('#bt-colocar-foto-perfil').live('click', function () {

			var imageUrl  = $('.selectedImage').data('source'),
				saveImage = saveImageData( imageUrl, 'covers' );

			saveImage.done(function (data) {
				showPerfilFoto();

			});
		});




/*
	     888 d8b                  d8b               888               888
	     888 Y8P                  Y8P               888               888
	     888                                        888               888
	 .d88888 888  8888b.  888d888 888  .d88b.       88888b.   .d88b.  88888b.   .d88b.
	d88" 888 888     "88b 888P"   888 d88""88b      888 "88b d8P  Y8b 888 "88b d8P  Y8b
	888  888 888 .d888888 888     888 888  888      888  888 88888888 888  888 88888888
	Y88b 888 888 888  888 888     888 Y88..88P      888 d88P Y8b.     888 d88P Y8b.
	 "Y88888 888 "Y888888 888     888  "Y88P"       88888P"   "Y8888  88888P"   "Y8888
*/



		// REGRESA LA EDAD DEL BEBE EN MESES
		function get_bebe_edad_meses (birthday){
			var date1  = new Date(birthday),
				date2  = new Date(),
				year1  = date1.getFullYear(),
				year2  = date2.getFullYear(),
				month1 = date1.getMonth(),
				month2 = date2.getMonth();

			return ( (year2-year1)*12+(month2-month1) );
		}


		$(document).ready(function () {

			// INICIAR EL SLIDER CON LA EDAD CORRECTA DEL BEBE
			if ( typeof(user_meta.fecha_bebe) !== 'undefined' ){
				var birthday  = user_meta.fecha_bebe[0],
					edadMeses = get_bebe_edad_meses( birthday );

				if ( edadMeses < 6 ){
					$('#ageSlider').slider('value', 1);
				}else if ( edadMeses >= 6 && edadMeses < 12 ){
					$('#ageSlider').slider('value', 2);
				}else if ( edadMeses >= 12 ){
					$('#ageSlider').slider('value', 3);
				}
			}
		});




/*
	888
	888
	888
	888  .d88b.   .d88b.  888d888 .d88b.  .d8888b
	888 d88""88b d88P"88b 888P"  d88""88b 88K
	888 888  888 888  888 888    888  888 "Y8888b.
	888 Y88..88P Y88b 888 888    Y88..88P      X88
	888  "Y88P"   "Y88888 888     "Y88P"   88888P'
	                  888
	             Y8b d88P
	              "Y88P"
*/


		function crear_nuevo_logro ( post_title, category ){
			return $.post(ajax_url, {
				post_title: post_title,
				category: category,
				action: 'crear_nuevo_logro'
			});
		}


		function get_logro_category(){
			var selected = $('#ageSlider').slider('value');
			switch (selected){
				case 0: return 'mi-embarazo';
				case 1: return '0-6-meses';
				case 2: return '6-12-meses';
				case 3: return '1-3-anos';
			}
		}

		// AGREGAR NUEVO LOGRO
		$('#bt-agregar-nuevo-logro').on('click', function (e) {
			e.preventDefault();

			var category = get_logro_category(),
				post_title = $('#form-nombre-logro').val();

			if( post_title !== '' && category ){
				var logro = crear_nuevo_logro(post_title, category);

				logro.done(function (data) {
					location.reload();
				});
			}
		});



		function set_images_as_attachement (post_id, image_url) {
			return $.post(ajax_url, {
				post_id: post_id,
				image_url: image_url,
				action: 'save_image_as_attachment'
			}, 'json')

			.done(function (data){
				location.reload();
			});
		}


		function set_data_as_attachement(post_id, image_data){

			var data  = image_data.split(',');
			var image = data[1];

			return $.post(ajax_url, {
				post_id: post_id,
				image_data: image,
				action: 'save_data_as_attachment'
			}, 'json')

			.done(function (data){
				location.reload();
			});
		}


		// SUBIR IMAGEN DEL LOGRO (FACEBOOK)
		$('#bt-subir-logro').on('click', function () {
			var imageUrl  = $('.selectedImage').data('source');

			set_images_as_attachement(window.the_post_id, imageUrl);

		});



		/**
		 * Despliega la imagen selecionada en el container indicado
		 * @param: input[type='file']
		 * @param: container jQuery para desplegar la imagen
		 */
		function mq_save_attachment_computer (input) {
			var reader = new FileReader();
			reader.onload = function(e){
				set_data_as_attachement( window.the_post_id, e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}


		$('#subir-foto-logro').live('change', function () {

			$('.overlay').fadeIn();

			var file = $(this).val();

			switch( file.substring(file.lastIndexOf('.') + 1).toLowerCase() ){
				case 'png': case 'jpg': case 'jpeg':
					mq_save_attachment_computer( this ); // mostrar la imagen seleccionada

					break;
				default:
					$(this).val('');
					container.attr('style', 'background: white;');
					break;
			}
		});


		// SUBIR IMAGEN DEL LOGRO (COMPUTADORA)
		$('#subir-foto-logro-computadora').on('click', function () {
			$('#subir-foto-logro').trigger('click');
		});



		$('.picframe, #bt-cambiar-foto').live('click', function () {
			window.the_post_id = $(this).data('post_id');
		});

/*
	                                                         888    d8b
	                                                         888    Y8P
	                                                         888
	 .d8888b .d88b.  88888b.d88b.  88888b.   8888b.  888d888 888888 888 888d888
	d88P"   d88""88b 888 "888 "88b 888 "88b     "88b 888P"   888    888 888P"
	888     888  888 888  888  888 888  888 .d888888 888     888    888 888
	Y88b.   Y88..88P 888  888  888 888 d88P 888  888 888     Y88b.  888 888
	 "Y8888P "Y88P"  888  888  888 88888P"  "Y888888 888      "Y888 888 888
	                               888
	                               888
	                               888
*/



		function compartir_album_facebook (category) {
			return $.post(ajax_url, {
				category: category,
				action: 'compartir_album_facebook'
			}, 'json');
		}

		function colocarCategoriaMensaje(category){

			if (category === 'mi-embarazo') {
				$('span.category-album').html('Mi Embarazo');
			}else if(category === '0-6-meses') {
				$('span.category-album').html('0-6 meses');
			}else if(category === '6-12-meses') {
				$('span.category-album').html('6-12 meses');
			}else if(category === '1-3-anos') {
				$('span.category-album').html('1-3 años');
			};


		}

		$('#bt-compartir-album').on('click', function () {
			$('.overlay').fadeIn('fast');
			var category  = get_logro_category();
			var compartir = compartir_album_facebook(category);

			compartir.done(function (data){
				$('.overlay').fadeOut('fast');
				$('#compartir-album').fadeIn();
				colocarCategoriaMensaje(category);
				fondoPopUp();
			});

		});



	});

})(jQuery);
