(function($){

	"use strict";

	$(function(){



		window.Lugares = {
			Posts: {},
			AutoComplete: {},
			Template: {}
		};


		Lugares.getAllLugares = function () {
			var ajax_result = $.post( ajax_url, {
				action: 'mq_get_lugares'
			}, 'json' );
			return ajax_result;
		};


		var ajax_get_posts = Lugares.getAllLugares();
		var have_posts     = false;

		ajax_get_posts.done(function (data) {
			Lugares.Posts = JSON.parse(data);
			have_posts = true;
		});


		Lugares.init = function () {

			// jQuery UI autocomplete init method
			Lugares.AutoComplete = $('.input-lugar').autocomplete({
				source: Lugares.Posts,
				focus: function (event, ui) {
					$(this).val( ui.item.label );
					Lugares.AutoComplete.focused = { id: ui.item.value, title: ui.item.label };
					return false;
				},
				select: function (event, ui) {
					//RelatedPosts.render({ id: ui.item.value, title: ui.item.label });
					return false;
				}
			});

		};


		(function ui_init(){

			if(have_posts) Lugares.init();

			setTimeout(ui_init, 400);

		})();



		// AGREGAR NUEVO LUGAR ///////////////////////////////////////////////


			$('#lugares-adder').live('click', function(){

				var label1 = $("<br /><label for='lugar'>Lugar: </label>");
				var input1 = $("<input type='text' name='lugar[]' id='lugar' value='' class='normal-text input-lugar'>");
				var label2 = $("<label for='lugar'>&nbsp;&nbsp;Descripcion: </label>&nbsp;");
				var input2 = $("<input type='text' name='descripcion[]' id='descripcion' value='' class='regular-text'><br />");

				$('#lugares-container')
					.append(label1)
					.append(input1)
					.append(label2)
					.append(input2);
			});


	});


})(jQuery);