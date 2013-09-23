;(function($){

	"use strict";

	$(function(){


	//------------------------------------ Verificar si el browser soporta input type date


		if (!Modernizr.inputtypes.date) {

			// Crear datepickers con jQuery UI
			$('input[type="date"]').datepicker({
				dateFormat: 'yy-mm-dd'
			});

		}


	//------------------------------------ save attachments (facturas)

		var save_attachment = function(attachment, user_id, fecha){

			//console.log(attachment.compat.item);

			var jqxhr = $.ajax({
				type: 'POST',
				url: ajax_url,
				data: {
					attachment: attachment.id,
					user_id: user_id,
					fecha: fecha,
					action: 'save_factura'
				}
			});

			jqxhr.done(function (data){
				// Parse string to JSON object
				var jsonImage = JSON.parse(data);
			});
		};

	//------------------------------------ upload files
		var file_frame, attachment;

		$('.upload_factura_button').live('click', function (e){

			var user_id = $(this).data('user_id');

			e.preventDefault();

			if ( file_frame ) {
				file_frame.open(); return;
			}

			// Crear el media frame.
			file_frame = wp.media.frames.file_frame = wp.media({
				title: $(this).data('uploader_title'),
				button: {
					text: $(this).data('uploader_button_text'),
				},
				multiple: true
			});

			file_frame.on('select', function(){
				attachment = file_frame.state().get('selection').first().toJSON();

				var fecha = $('.fecha-factura').val();

				save_attachment(attachment, user_id, fecha);
			});

			// open the modal
			file_frame.open();
		});



	}); // end

})(jQuery);