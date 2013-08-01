(function($){

	'use_strict';

	$(function(){

	// SLIDE PASO 3 //////////////////////////////////////////////////////////////////

	    $('.slider_options_box').tinycarousel({ display: 2 });

	// NICE SCROLL INIT //////////////////////////////////////////////////////////////////



		function niceScrollInit () {
			$('.albums').niceScroll({
				cursorcolor  : '#D289A6',
				cursorwidth  : '30',
				cursorborder : '',
				railpadding  : { top:10, right:0, left:0, bottom:10 }
			});
		}



	// DISPLAY ALBUM ON CLICK FUNCTION ///////////////////////////////////////////////////



		$('.album-inside').live('click', function(){

			// Mostrar overlay
			$('.album-inside').children('.selected').hide();
			$(this).children('.selected').show();

			// Add class: 'selectedImage'
			$('.album-inside').removeClass('selectedImage');
			$(this).addClass('selectedImage');
		});



	// ANIMATE BOX-SHADOW EFFECT /////////////////////////////////////////////////////////



		$('.boton').mousedown(function(){
			$(this).animate({
				boxShadow: 'none'
			}, 50 );
		}).mouseup(function(){
			$(this).animate({
				boxShadow : '-3px 8px 15px 0px rgba(0, 0, 0, 0.2)'
			}, 50 );
		});



	// GUARDAR IMAGE DATA COMO PNG ///////////////////////////////////////////////////////



		/**
		 * Guardar data:image/png;base64 como un archivo PNG
		 * @param: data
		 * @param: directory
		 * @return: ajax_event
		 */
		function saveImageData (image_data, directory) {

			var image;

			if( image_data.indexOf('data:image') !== -1 ){
				var data = image_data.split(',');
				image = data[1];
			}else{
				image = image_data;
			}

			var ajax_response = $.post( ajax_url, {
				image_data: image,
				directory: directory,
				action: 'save_temporal_image'
			}, 'json' );

			return ajax_response;
		}



	// WEBCAM CONFIGURATION //////////////////////////////////////////////////////////////



		webcam.set_shutter_sound( true, webcam_shutter_url ); // play shutter click sound
		$('#webcam-container').html( webcam.get_html(566, 500) );



	// TOMAR UNA FOTO - WEBCAM - PASO 1 //////////////////////////////////////////////////



		$('#take_snapshot').live('click', function () {
			webcam.snap(); // take snapshot and upload to server
		});



		$('#reset_webcam').live('click', function () {
			webcam.reset();
		});



	/* ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄

								[ MOMENTOS GOLD: PASO 1 ]

	▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀ */



	// TABS QUE MUESTRAN EL CONTENIDO PARA SUBIR FOTOS ( FACEBOOK, CAMARA, COMPU ) ///////



		// Mostrar los tabs para subir fotos
		$('#sube-foto-tabs a').on('click', function (e) {
			e.preventDefault();

			var selected = $(this).attr('rel');

			// Mostrar/ocultar contenido
			$("#sube-foto-tabs").fadeOut('fast', function () {

				// mostrar / ocultar custom scrollbar
				if ( selected === 'facebook' ){
					niceScrollInit();
					$('.albums').getNiceScroll().show();
				}else{
					$('.albums').getNiceScroll().hide();
				}

				$('#content-'+selected).addClass('activeTabContent').fadeIn('fast');

			});
		});



		// Ocultar tabs y regresar al paso 1
		$('.regresar-paso-uno').on('click', function () {

			$('.albums').getNiceScroll().hide();

			$('#sube_foto_face1').fadeOut(0);
			$('#titulo_paso1').fadeIn(0);

			$('.activeTabContent').removeClass('activeTabContent').fadeOut('fast', function () {
				$("#sube-foto-tabs").fadeIn('fast');
			});
		});




		$('#submit-paso-uno-facebook').on('click', function (e) {
			e.preventDefault();

			var imageUrl = $('.selectedImage').data('source');

			var ajaxPaso1 = saveImageData( imageUrl, 'imagenesPaso1' );

			ajaxPaso1.done(function (data) {
				if(data){
					$('#form-paso-uno-facebook').submit();
				}
			});

		});


	// MOSTRAR LAS FOTOS DE FACEBOOK - PASO 1 ////////////////////////////////////////////



		function display_facebook_albums () {

			// #albumTemplate: templates/momentos-gold/subir-foto/foto-facebook.php
			var albumTemplate  = $.trim( $('#albumTemplate').html() ),
				albumContainer = $('#facebook-albums-container').empty();

			$.each(paso1Data, function (index, photo) {
				var temp = albumTemplate.replace(/{{cover}}/ig, photo.url)
										.replace(/{{name}}/ig, photo.name)
										.replace(/{{id}}/ig, photo.id);

				albumContainer.append(temp);
			});
		}


		if ( typeof( paso1Data ) !== 'undefined' ) {
			display_facebook_albums();
		}



	// HELPER FUNCTIONS PARA MOSTRAR O ESCONDER ELEMENTOS - FACEBOOK - PASO 1 ////////////



		function show_buttons_step_one () {
			$('#regresar-albums').show();
			$('#submit-paso-uno-facebook').show();
			$('#sube_foto_face1').text('Selecciona una foto');
			$('#cambio_album').text('Selecciona entre tus fotos de Facebook:');
		}


		function hide_buttons_step_one () {
			$('#regresar-albums').hide();
			$('#submit-paso-uno-facebook').hide();
			$('#sube_foto_face1').text('Selecciona un álbum ');
			$('#cambio_album').text('Selecciona entre tus álbumes de Facebook:');
		}



	// MOSTRAR LAS PORTADAS DE CADA ALBUM - FACEBOOK - PASO 1 ////////////////////////////



		$(document).ready(function () {

			hide_buttons_step_one();


			$.ajaxSetup({ cache: true });


			// Facebook API init method
			$.getScript('//connect.facebook.net/es_ES/all.js', function () {
				window.fbAsyncInit = function () {
					FB.init({
						appId      : '408409585943256',
						channelUrl : '//progress.lamaquiladora.com/momentos-gold',
						status     : true,
						cookie     : true
					});
				};
			});



			/**
			 * Mostrar el contenido (fotos) de un album on user click
			 */
			$('.album').live('click', function () {

				show_buttons_step_one();

				var album = $(this).data('id'), accessToken;

				// Generar un access token
				FB.getLoginStatus(function (response) { accessToken = response.authResponse.accessToken; });


				// Query album metadata
				FB.api('/'+album+'/photos?access_token='+accessToken, {'limit': '60'}, function (response) {

					// #albumContentsTemplate: templates/momentos-gold/subir-foto/foto-facebook.php
					var albumContentsTemplate  = $.trim( $('#albumContentsTemplate').html() ),
						albumContainer = $('#facebook-albums-container').empty();

					// Mostrar las fotos
				    $.each(response.data, function (index, photo) {

				    	console.log(photo);
					    var temp = albumContentsTemplate.replace(/{{cover}}/ig, photo.source)
														.replace(/{{id}}/ig, photo.id);

						albumContainer.append(temp);
				    });

				    $('html, body').animate({ scrollTop: '280px' });
				});
			});


			/**
			 * Boton para regresar a ver listado de albums
			 */
			$('#regresar-albums').on('click', function () {
				hide_buttons_step_one();
				display_facebook_albums();
			});


		}); // ends - document.ready.function





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

				saveImageData( e.target.result, 'imagenesPaso1' );
			}
			reader.readAsDataURL(input.files[0]);

		}



	// SUBIR IMAGENES DESDE LA COMPUTADORA - PASO 1 //////////////////////////////////////



		$('#subir-foto-paso-uno').live('change', function () {
			var container = $('#image-from-computer');

			var file = $(this).val();

			switch( file.substring(file.lastIndexOf('.') + 1).toLowerCase() ){
				case 'png': case 'jpg': case 'jpeg':
					mq_display_file( this, container ); // mostrar la imagen seleccionada
					break;
				default:
					$(this).val('');
					// alert('Tipo de archivo no permitido');
					break;
            }
		});


		//Verificar que el usuario selecciono una imagen antes de enviar el formulario
		$('#form-paso-uno-computadora').on('submit', function (e) {
			if ( $('#subir-foto-paso-uno').val() === '' ){
				// alert('Selecciona una imagen');
				e.preventDefault();
			}
		});




	/* ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄

								[ MOMENTOS GOLD: PASO 2 ]

	▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀ */



	// INICIAR EL CANVAS - PASO 2 ////////////////////////////////////////////////////////



		if( typeof( paso2Data ) !== 'undefined' ){

			console.log(paso2Data);
			Gold.initPasoDos( paso2Data.imagen );
		}



	// BOTONES PARA AUMENTAR / DISMINUIR TAMAÑO DE LA IMAGEN /////////////////////////////



		$('.zoom_in').on('click', function(){
			Gold.increaseImageSize();
			//console.log( JSON.stringify(Gold.Container) );
		});

		$('.zoom_out').on('click', function(){
			Gold.decreaseImageSize();
		});



	// GUARDAR LA IMAGEN DEL PASO DOS ////////////////////////////////////////////////////



		$('#submit-paso-dos').on('click', function (e){
			e.preventDefault();
			var image_data = Gold.Container.toDataURL();

			var ajaxPaso2 = saveImageData( image_data, 'imagenesPaso2' );

			ajaxPaso2.done(function (data) {
				if(data){ $('#form-paso-dos').submit(); }
			});
		});




	/* ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄

								[ MOMENTOS GOLD: PASO 3 ]

	▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀ */



	// FILTROS/EFFECTOS DE LAS IMAGENES - PASO 3 /////////////////////////////////////////



		$('#imagen-paso3').vintage( { mime: 'image/png' } ); // VintageJS Init

		var vintageJS = $('#imagen-paso3').data('vintageJS');

		$('.effects').on('click', function () {
			var selected = $(this).data('effect');

			$.each( effects, function (name, effect) {
				if( name === selected ){
					vintageJS.vintage( effect );
					return false;
				}
			});
		});



	// GUARDAR LA IMAGEN DEL - PASO 3 ////////////////////////////////////////////////////



		$('#submit-paso-tres').on('click', function (e) {
			e.preventDefault();
			var image_data = $('#imagen-paso3').attr('src');

			var ajaxPaso3 = saveImageData( image_data, 'imagenesPaso3' );

			ajaxPaso3.done(function (data) {
				if(data){ $('#form-paso-tres').submit(); }
			});
		});



	// CAMBIAR EL TEMA DE LA IMAGEN - PASO 3 /////////////////////////////////////////////



		$('.temas').on('click', function () {
			var selected = $(this).data('tema');
			$('.footer_resultado').attr('src', images_url+'momentos-gold-temas/'+selected );
			$('form#form-paso-tres #theme').val( selected );
		});



	// ACTUALIZAR EL TEXTO DE LA IMAGEN - PASO 3 /////////////////////////////////////////



		$('#leyenda-text').on('keyup', function () {
			$('#leyenda-label').text( $(this).val() );
			$('form#form-paso-tres #texto').val( $('#leyenda-label').text() );
		});




	/* ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄

								[ MOMENTOS GOLD: PASO 4 ]

	▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀ */



	// INICIAR EL CANVAS - PASO 4 ////////////////////////////////////////////////////////



		if( typeof( paso4Data ) !== 'undefined' ){
			Gold.initPasoCuatro( paso4Data.imagen );
			Gold.setTheme( paso4Data.theme );
			Gold.setBorder();
			Gold.setText( paso4Data.texto );
		}



	// AGREGAR ELEMENTOS AL CANVAS - PASO 4 //////////////////////////////////////////////



		$('.img-canvas-element').on('click', function () {
			var imageUrl = $(this).attr('src');
			Gold.addCanvasElement( imageUrl );
		});



	// GUARDAR LA IMAGEN - PASO 4 ////////////////////////////////////////////////////////



		$('#submit-paso-cuatro').on('click', function (e) {
			e.preventDefault();

			Gold.removeFocus();

			var image_data = Gold.Container.toDataURL();

			var ajaxPaso4 = saveImageData( image_data, 'imagenesPaso4' );

			ajaxPaso4.done(function (data) {
				if(data){ $('#form-paso-cuatro').submit(); }
			});
		});



	// ELIMINAR ELEMENTOS DEL CANVAS - PASO 4 ////////////////////////////////////////////



		$('#delete-canvas-element').on('click', function () {
			Gold.deleteActiveElement();
		});




	/* ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄

								[ MOMENTOS GOLD: PASO 5 ]

	▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀ */



	// GUARDAR LA IMAGEN DEL - PASO 5 ////////////////////////////////////////////////////



		$('.descargar').on('click', function () {
			$('#form-descargar-imagen').submit();
		});



	// PUBLICAR IMAGEN EN EL TIMELINE - PASO 5 ///////////////////////////////////////////



		$('#publish-to-wall').on('click', function(){
			FB.getLoginStatus(function (response) {

				//var accessToken = response.authResponse.accessToken;

				var userID      = response.authResponse.userID;
				var newImageURL = '/'+userID+'/photos';
				var imageURL    = 'https://progress.lamaquiladora.com/wp-content/themes/gold/img/imagenesPaso4/'+user_login+'.png';

				FB.api(newImageURL, 'post', {
				    message:'Momento Gold',
				    url:imageURL
				}, function(response){

				    if ( !response || response.error ) {
				       console.log('Error occured');
				    } else {
				        alert('La imagen se guardo correctamente');
				    }

				});
			});
		});



	// USAR IMAGEN COMO FOTO DE PERFIL - PASO 5 //////////////////////////////////////////



		$('#set-as-profile-picture').on('click', function () {
			FB.getLoginStatus(function (response) {

				var userID      = response.authResponse.userID;
				var newImageURL = '/'+userID+'/photos';
				var imageURL    = 'https://progress.lamaquiladora.com/wp-content/themes/gold/img/imagenesPaso4/'+user_login+'.png';

				FB.api(newImageURL, 'post', {
				    message:'Momento Gold',
				    url:imageURL
				}, function(response){
				    if ( !response || response.error ) {
				       console.log('Error occured');
				    } else {
				    	window.top.location.href = 'https://www.facebook.com/photo.php?fbid='+response.id+'&makeprofile=1';
				    }
				});
			});
		});





	}); //end

	$('.sube_fb').on('click', function () {
				$('#sube_foto_face1').fadeIn(0);
				$('#titulo_paso1').fadeOut(0);
		});



})(jQuery);