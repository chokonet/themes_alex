(function($){

	"use strict";

	$(function(){
		//quitar mangen derecho ultimo de la fila

		$('.marcas').each(function(index, value){
			if( (index+1)%4 === 0){
				$(this).addClass('margen_derecho');
			}
		});

		//menu marcas propias

		$(document).ready(function(){
		  $('.contenido_56').fadeIn(0);

		});

		$('.abre_contenidoA').on('click', function () {
			$('.contenido_56').fadeIn(0);
			$('.contenido_58').fadeOut(0);
			$('.contenido_60').fadeOut(0);
			$('.abre_contenidoA').addClass('active');
			$('.abre_contenidoB').removeClass('active');
			$('.abre_contenidoC').removeClass('active');
		});

		$('.abre_contenidoB').on('click', function () {
			$('.contenido_58').fadeIn(0);
			$('.contenido_56').fadeOut(0);
			$('.contenido_60').fadeOut(0);
			$('.abre_contenidoB').addClass('active');
			$('.abre_contenidoA').removeClass('active');
			$('.abre_contenidoC').removeClass('active');
		});
		$('.abre_contenidoC').on('click', function () {
			$('.contenido_60').fadeIn(0);
			$('.contenido_58').fadeOut(0);
			$('.contenido_56').fadeOut(0);
			$('.abre_contenidoC').addClass('active');
			$('.abre_contenidoB').removeClass('active');
			$('.abre_contenidoA').removeClass('active');
		});

		//Formulario Escribenos///////////////////////////////////////////////////////


		function validateEmail (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		}


		function enviarEscribenosMail (getRequest) {
			return $.get(getRequest, {
				action: 'ajax_envia_mail'
			}, 'json');
		}


		$('#form_escribenos').on('submit', function (event) {
			event.preventDefault();

			var userEmail = $('#form-escribenos-email').val();

			if( ! validateEmail(userEmail)){
				alert('El campo de mail no es valido');
				$('#form-escribenos-email').focus();
			}else{
				var getRequest = ajax_url+'?'+$(this).serialize();
				var ajaxMail   = enviarEscribenosMail(getRequest);

				ajaxMail.done(function (data) {
					$('#form_escribenos').hide();
				});
			}
		});

		function enviarClientesMail (getRequest) {
			return $.get(getRequest, {
				action: 'ajax_envia_mail_clientes'
			}, 'json');
		}

		$('#servicio-s-clientes').on('submit', function (event) {
			event.preventDefault();

			var userEmail = $('#form-clientes-email').val();

			if( ! validateEmail(userEmail)){
				alert('El campo de mail no es valido');
				$('#form-clientes-email').focus();
			}else{
				var getRequest = ajax_url+'?'+$(this).serialize();
				var ajaxMail   = enviarClientesMail(getRequest);

				ajaxMail.done(function (data) {
					$('#servicio-s-clientes').hide();
				});
			}
		});

		$(document).ready(function(){
			$('.lang-en a span').html('ENG');
			$('.lang-es a span').html('ESP');
		});

	});

})(jQuery);