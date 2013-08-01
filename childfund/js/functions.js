(function($){
	"use strict";

	$(function(){


		$('#submit-intencion-apadrinar').on('click', function (e) {
			e.preventDefault();
			$('#aviso-container').fadeIn('slow');
		});

		$('#aviso-container').on('click', function (e) {
			if (e.target == this) {
				$(this).fadeOut();
			}
		});

		$('#submit-aviso-privacidad').on('click', function () {
			if( $('#autorizo').is(':checked') ){
				$('#aviso-container').fadeOut();
				$('#datos_padrino').submit();
			}else{
				$('#autorizo').focus();
			}
		});

		$('#aviso-container .cerrar').on('click', function () {
			$('#aviso-container').fadeOut();
		});


		function openPopup (url) {
			var left = ($(window).width()/2)-800/2,
				top  = ($(window).height()/2)-600/2,
				pop  = window.open( url, "popup", "width=800, height=600, top="+top+", left="+left );
		}

		function goBack(){
			window.history.back();
		}

		$(document).ready(function() {


			$('#submit-login-form').on('click', function (e) {

				e.preventDefault();

				var username = $('#login_username').val(),
					userpass = $('#login_userpass').val();

				$.ajax({
					type: 'POST',
					url: ajax_url,
					data: {
						login_username: username,
						login_userpass: userpass,
						action: 'childfund_login'
					},
					dataType: 'json'
				})
				.done(function (data) {

					if( typeof(data) === 'object' ){
						location.reload();
					}else{
						$('#login_error').empty().html(data);
					}

				});
			});



			//validación de formularios
			$('form#datos_padrino').validate();

			//QuickSand:
			//obtiene el filtro activo en la carga de la página y lo guarda en $filterType
			var $filterType = $('#filterOptions li.active a').attr('class');

			//obtiene y asigna elque contenendor
			var $holder = $('div.holder_tienda');

			//función extra para eventos hover en los elementos reordenados por quicksand
			$('.sinopsis').hide();
			$('div.holder_tienda > div').live( 'mouseenter', function(){
				$(this).find('.sinopsis').fadeIn();
			});

			$('div.holder_tienda > div').live( 'mouseleave', function(){
				$(this).find('.sinopsis').fadeOut();
			});


			//clona todos los elementos del contenedor
			var $data = $holder.clone();

			//clic en alguno de los filtros
			$('#filterOptions li a').click(function(e) {
			//quita la clase active a cualquiera que la tenga
				$('#filterOptions li').removeClass('active');

			//obtiene la clase del clic y asigna la clase active al li paterno
				var $filterType = $(this).attr('class');
				$(this).parent().addClass('active');
				if ($filterType == 'all') {
			//cuando se selecciona ver todos, carga todos los items hijos del holder
				var $filteredData = $data.find('div.item');
				}
				else {
				//en caso contrario busca el data-type pertinente
					var $filteredData = $data.find('div[data-type=' + $filterType + ']');
				}

			//llamado del quicksand con el contenedor clonado y los elementos filtrados ;)
				$holder.quicksand($filteredData, {
					duration: 800,
					easing: 'easeInOutQuad'
				});
				return false;
			});



			// Enviar mensaje a un ahijado
			//----------------------------------------------------



			var contactForm = {

				container: $('#contact'),

				show: function(position, ahijado, url){

					var container = contactForm.container;

					$('#contact-submit').attr('ahijado', ahijado);

					container.css({
						'top': position.top + 20,
						'left': position.left
					});



					var imageSource = $(url).attr('src');

					$('#contact-img').attr('src', imageSource);

					if ( container.is(':hidden') ) {
						contactForm.close.call(container);
						container.toggle();
					}
				},

				close: function() {
					var container       = $(this); // #contact
					var buttonContainer = $('#form-buttons');
					var enviarButton    = $(this).find('#contact-submit');


					if ( container.find('input#contact-cerrar').length ) return;

					var buttonClose = $('<input />', {
						'class': 'boton',
						'type': 'submit',
						'id': 'contact-cerrar',
						'value': 'Cerrar',
						css:{
							'background-color': '#fd9000'
						}
					}).appendTo(buttonContainer);

					$(buttonClose).on('click', function(e) {
						e.preventDefault();
						container.toggle();
					});



					enviarButton.on('click', function (e) {

						var container = contactForm.container;

						var ahijado = $(this).attr('ahijado');

						e.preventDefault();
						var message = $('#comments').val();

						// falta enviar el mensaje
						$.ajax({
							type: 'POST',
							url: ajax_url,
							data: {
								message: message,
								post_id: ahijado,
								action: 'add_ahijado_message'
							},
							dataType: 'json'
						})
						.done(function (data){
							container.toggle();
							alert('Tu mensaje ha sido enviado correctamente.')
						});
					});


				}
			};


			$('.send-msg').on('click', function (e){
				e.preventDefault();

				var position = $(this).position();
				var ahijado  = $(this).data('ahijado');


				$.ajax({
					type: 'POST',
					url: ajax_url,
					data: {
						post_id: ahijado,
						action: 'get_post_thumb'
					},
					dataType: 'json'
				})
				.done(function (data){
					contactForm.show(position, ahijado, data);
				});

			});


		}); // end

	});

})(jQuery);
