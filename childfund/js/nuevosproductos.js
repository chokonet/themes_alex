(function($){

	"use strict";

	$(function(){

		$(document).ready(function(){


			$('.clickme').mouseenter(function () {
				var imagen = $(this).data('img');
				$(imagen).animate({opacity: 1}, 200);
			});


			$('.clickme').mouseleave(function () {
				var imagen = $(this).data('img');
				$(imagen).animate({opacity: 0.8}, 200);
			});


			$('.clickme').on('click', function () {
				$('.programa-info').hide();
			});


			////////////////////////////////////////////////
			// Info boxes over /////////////////////////////
			////////////////////////////////////////////////

			$('#eduWnd').hide();
			$('#salWnd').hide();
			$('#proWnd').hide();
			$('#cuiWnd').hide();

			$('#educlick').live('click', function(){
				$('#eduWnd').fadeIn('fast');
			});

			$('#salclick').live('click', function(){
				$('#salWnd').fadeIn('fast');
			});

			$('#proclick').live('click', function(){
				$('#proWnd').fadeIn('fast');
			});

			$('#cuiclick').live('click', function(){
				$('#cuiWnd').fadeIn('fast');
			});

			$('.close').live('click', function(){
					$(this).parent().fadeOut('fast');
			});

			//Botones del recibo
			$('#formFactura').hide();

			$('.si').mouseenter(function(){
				$(this).css('margin-top','+=2px');
				$(this).find('p').css('margin-top','-=2px');
			}).mouseleave(function(){
				$(this).css('margin-top','-=2px');
				$(this).find('p').css('margin-top','+=2px');
			});
			$('.si').live('click', function(){
				$('#recibo').fadeOut('fast');
				$('#formFactura').fadeIn('fast');
			});

			$('.no').mouseenter(function(){
				$(this).css('margin-top','+=2px');
				$(this).find('p').css('margin-top','-=2px');
			}).mouseleave(function(){
				$(this).css('margin-top','-=2px');
				$(this).find('p').css('margin-top','+=2px');
			});
			$('.no').live('click', function(){
				$('#recibo').fadeOut('fast');
				$('#agradecimiento').fadeIn('fast');
			});



			////////////////////////////////////////////////
			// Formulario de Factura ///////////////////////
			////////////////////////////////////////////////

			 $('#facturaForm').submit(function(e){

		        // Stop the form actually posting
		        e.preventDefault();
		        // Send the request
		        $.post(theme_url+'send_form.php', {
		        	nombre: $('#nombre').val(),
				    apPat: $('#apPat').val(),
				    apMat: $('#apMat').val(),
				    rfc: $('#rfc').val(),
				    mail: $('#mail').val(),
				    calle: $('#calle').val(),
				    colonia: $('#colonia').val(),
				    delegacion: $('#delegacion').val(),
				    ciudad: $('#ciudad').val(),
				    cp: $('#cp').val()
		        }, function(d){
		            alert(d);
		            $('#formFactura').fadeOut('fast');
					$('#agradecimiento').fadeIn('fast');
		        });
		    });






			////////////////////////////////////////////////
			// Formularios de PayPal ///////////////////////
			////////////////////////////////////////////////


			// Tipo de donativo
			$('.tipo-donativo').on('change', function(){
				if ( $(this).is(':checked') ){
					$('#nombre_1').val( 'ChildFund - donativo ' + $(this).attr('id') );
					$('#subscription_name').val( 'ChildFund - donativo ' + $(this).attr('id') );
				}
			});


			// Monto del donativo
			$('.monto-donativo').on('change', function(){
				if ( $(this).is(':checked') ){
					$('#amount_1').val( $(this).val() );
					$('#subscription_amount').val( $(this).val() );
				}
			});


		});
	});

})(jQuery);