
(function($){

	$(document).ready(function(){

	// SLIDER HOME /////////////////////////////////////

		$('.slides').cycle();

	// ISOTOPE HOME ////////////////////////////////////

		var container = $('.loop-lugares');

	    container.isotope({
	    	itemSelector : '.lugar-home',
	  		layoutMode : 'masonry',
	    	masonry : {
	          columnWidth : 287,
	        }
	    });


	// SINGLE RECORRIDOS //////////////////////////////

		$('.recorrido-single').mouseenter(function(){
			$(this).find('.info_toggle').slideDown('fast');
		}).mouseleave(function(){
			$(this).find('.info_toggle').slideUp('fast');
		});

		$('.info-recorrido-abierto').hide();
		$('.abrir-info').on('click', function(){
			$(this).removeClass('abrir-info');
			$(this).addClass('cerrar-info');
			$(this).css({'opacity':'0'});
			$(this).siblings('.info-recorrido-abierto').slideDown('slow');
			$(this).siblings('.info-recorrido-cerrado').fadeOut('slow');
		});
		$('a.close').on('click', function(){
			console.log('flag');
			$(this).parent().slideUp('slow');
			$(this).parents('.recorrido-single').find('.info_toggle').removeClass('cerrar-info');
			$(this).parents('.recorrido-single').find('.info_toggle').addClass('abrir-info');
			$(this).parent().prev('.info-recorrido-cerrado').fadeIn('slow', function(){
				$(this).parents('.recorrido-single').find('.info_toggle').animate({opacity: 1}, 200);
			});


		});



		// Map highlight
		$('img[usemap]').maphilight();
		$('.active img[usemap]').data({alwaysOn: true});

		$('.trigger_hover').not('.active').mouseover(function(){
			$(this).next('.info').fadeIn('fast');
		}).mouseleave(function(){
			$(this).next('.info').fadeOut('fast');
		});


		// Side Strip gallery
		var myViewport = $('.big_viewport');
		var myStrip = $('.imgStrip');

		myStrip.find('li a').live('click', function(e){
			e.preventDefault();
			$(this).parent().siblings('.selected').removeClass('selected');
			$(this).parent().addClass('selected');
			myViewport.html( $(this).html() );
		});

		$('.sliderContainer').mouseenter(function(){
			myStrip.animate({
				right : '+=65px'
			}, 300, 'swing');
		}).mouseleave(function(){
			myStrip.animate({
				right : '-=65px'
			}, 200, 'swing');
		});

		//ScrollIt
		if( $('.scrollIt').length ){
			$('body').animate({
		        scrollTop	: '700'
		    }, 700, 'swing');
		}

		// //Show hide Zona
		// $('.lugar-zona-single').on('click', function(){
		// 	var post_id   = $(this).data('post_id'),
		// 		desplegado = $('.content_lugar.'+post_id);
		// 		initialize();

		// 		$('.content_lugar').hide();
		// 		//ScrollTo
		// 		$.scrollTo( $('.navegador'), 500, {offset: 550, onAfter: function(){
		// 			desplegado.slideDown();
		// 		}});
		// });

		// //Show hide recorrido
		// $('.lugar-recorrido-single').on('click', function(){
		// 	var post_id   = $(this).data('post_id'),
		// 		desplegado = $('.content_lugar.'+post_id);
		// 		initialize();

		// 		$('.content_lugar').hide();
		// 		//ScrollTo
		// 		$.scrollTo( $('.navegador'), 500, {offset: 550, onAfter: function(){
		// 			desplegado.slideDown();
		// 		}});
		// });

		// //Show hide actividad
		// $('.lugar-home').not('.no_click').on('click', function(e){
		// 	e.preventDefault();
		// 	var post_id   = $(this).data('post_id'),
		// 		desplegado = $('.content_lugar.'+post_id);
		// 		initialize();

		// 		$('.content_lugar').hide();
		// 		//ScrollTo
		// 		$.scrollTo( $('.navegador'), 500, {offset: 550, onAfter: function(){
		// 			desplegado.slideDown();
		// 		}});

		// });

		// //Cerrar
		// $('.close').on('click', function(){
		// 	$(this).parent().parent('.content_lugar').slideUp();
		// });


	});

})(jQuery);