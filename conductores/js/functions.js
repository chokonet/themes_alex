;(function($){

	"use strict";

	$(function(){

		//galeria de video
		$(".video_gal", this).click(function() {


			var ajax_promise = $.get(
				ajax_url, {
					post_id: $(this).data('post_id'),
					action: 'get_capsula_video'
				}, 'json'
			);

			ajax_promise.done(function (data) {
				$(".videos").empty().html( JSON.parse(data) );
			});

		});

		// rotate menu
		$(".conductores").rotate(-54);
		$(".capsulas").rotate(-71);
		$(".social").rotate(-52);
		$(".principal").rotate(-76);
		$("#pm_fer").rotate(22);
		$("#pm_david").rotate(-45);
		$("#pm_juan").rotate(-35);
		$(".trending").rotate(-12);
		$(".juan").rotate(-79);
		$(".fer").rotate(-65);
		$(".david").rotate(-62);
		$(".lakshmi").rotate(-54);


		$( ".conductores, .submenu" ).mouseover(function() {
			 $(".submenu").fadeIn({duration:0, queue:false});
			 $(".conductores").addClass('select');

		});

		$('.submenu, .conductores').mouseleave(function() {
			$('.submenu').fadeOut({duration:0, queue:false});
			$(".conductores").removeClass('select');
		});

		//movimientos
		$( ".animate" ).mouseover(function() {
			 $(this).animate({top: "+=5"}, 200);
		}).mouseleave(function() {
			 $(this).animate({top: "-=5"}, 200);
		});

		//slide
		$('.nextBtn').fadeTo('slow', 1);
		$('.prevBtn').fadeTo('slow', 1);

		$("#slider_home").sudoSlider({
			effect: "fade"
		});

	});

})(jQuery);