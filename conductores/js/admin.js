(function($){

	"use strict";

	$(function(){


	//------------------------------------ save attachments (user images)


		function save_attachment(attachment, user_id){

			var jqxhr = $.ajax({
				type: 'POST',
				url: ajax_url,
				data: {
					attachment: attachment.id,
					user_id: user_id,
					action: 'save_user_image'
				}
			});
		}


	//------------------------------------ upload files


		var file_frame, attachment;

		$('#upload_user_image').live('click', function (e){

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
				save_attachment(attachment, user_id);
			});

			// open the modal
			file_frame.open();
		});





	});

})(jQuery);