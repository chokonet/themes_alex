// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());


(function($){

	"use strict";

	$(function(){


		$('#submit-intencion-apadrinar').on('click', function (e) {
			e.preventDefault();
			$('#aviso-container').show();
		});

		$('#submit-paypal-form').on('click', function (e) {

			e.preventDefault();
			if ( $('#unico').is(':checked')
				|| $('#mensual').is(':checked')
				&& $('#educacion').is(':checked')
					|| $('#salud').is(':checked')
					|| $('#proteccion').is(':checked')
					|| $('#cuidado').is(':checked')
					|| $('#cualquiera').is(':checked')
				&& $('#150').is(':checked')
					|| $('#300').is(':checked')
					|| $('#500').is(':checked')
					|| $('#1000').is(':checked')
					|| $('#2000').is(':checked')
					|| $('#2500').is(':checked') ) {
				$('#aviso-container').show();
			} else {
				alert('Por favor llene todo el formulario.');
			}

		});


		$('#aviso-container').on('click', function (e) {
			if (e.target == this) {
				$(this).fadeOut();
			}
		});


		$('#submit-aviso-privacidad').on('click', function () {
			if( $('#autorizo').is(':checked') ){
				$('#aviso-container').hide();
				$('#datos_padrino').submit();
			}else{
				$('#autorizo').focus();
			}
		});


		$('#submit-aviso-paypal').on('click', function () {

			if( $('#autorizo').is(':checked') ){

				$('#aviso-container').hide();
				$('#donativo').hide();
				$('#factura-container').show();

			}else{
				$('#autorizo').focus();
			}
		});


		$('#aviso-container .cerrar').on('click', function () {
			$('#aviso-container').hide();
		});


		$('#factura-container').hide();


		function cancelformFactura (selected) {
			$(selected).focus();
			$('.error-message').fadeIn(300);
		}


		$('#submit-formFactura').on('click', function (e) {

			e.preventDefault();

			var nombre     = $('#nombre').val(),
				apPat      = $('#apPat').val(),
				apMat      = $('#apMat').val(),
				rfc        = $('#rfc').val(),
				mail       = $('#mail').val(),
				calle      = $('#calle').val(),
				colonia    = $('#colonia').val(),
				delegacion = $('#delegacion').val(),
				ciudad     = $('#ciudad').val(),
				cp         = $('#cp').val();


			if( nombre == '' ){
				cancelformFactura('#nombre');
			}else if ( apPat == '' ){
				cancelformFactura('#apPat');
			}else if ( apMat == '' ){
				cancelformFactura('#apMat');
			}else if ( rfc == '' ){
				cancelformFactura('#rfc');
			}else if ( mail == '' ){
				cancelformFactura('#mail');
			}else if ( calle == '' ){
				cancelformFactura('#calle');
			}else if ( colonia == '' ){
				cancelformFactura('#colonia');
			}else if ( delegacion == '' ){
				cancelformFactura('#delegacion');
			}else if ( ciudad == '' ){
				cancelformFactura('#ciudad');
			}else if ( cp == '' ){
				cancelformFactura('#cp');
			} else {

				var custom = $('#form-facturaForm').serialize();

				if( $('#unico').is(':checked') ){
					$('#onetime-custom').val(custom);
					$('form#donativo').submit();
				}
				if( $('#mensual').is(':checked') ){
					$('#subscription-custom').val(custom);
					$('#subscription').submit();
				}
			}
		});


		$('#desea_recibo li.no').on('click', function (e) {
			e.preventDefault();
			if( $('#unico').is(':checked') ){
				$('#onetime-custom').val('');
				$('<h1></h1>',{
					text: 'Redirigiendo a Paypal...',
					css: {
						'text-align': 'center',
						'font-size': '28px',
						'margin': '100px 20px 0 20px',
						'padding-bottom': '200px'
					}
				}).appendTo('#wrapper header');

				$('form#donativo').submit();
			}
			if( $('#mensual').is(':checked') ){
				$('#subscription-custom').val('');
				$('#subscription').submit();
			}
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
