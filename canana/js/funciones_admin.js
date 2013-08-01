 //Funciones Sitio canana

(function($){

		"use strict";

		$(function(){


			$(document).ready(function(){

				$('.ficm_not_featured select').change(function() {
					var this_changed = $(this);
					var not_featured_id  = this_changed.val();
					var path = php2js_vars_obj.template_url + '/post_functions.php';

					$.post(
						path,
						{
							not_featured_id: not_featured_id
						},
						function(data){

							var html = '';

							this_changed.siblings('.ficm_not_featured_msj').text('Para guardar cambios dar click en "update post"');
							this_changed.parent().siblings('.ficm_not_featured').append(html);

							if( this_changed.siblings('img').length > 0){
								this_changed.siblings('img').attr('src', data);
							}else{
								html = '<img src="'+data+'"/>';
								this_changed.parent().append(html);
							}
						}
					);
				});
			});


		}); //end

})(jQuery);