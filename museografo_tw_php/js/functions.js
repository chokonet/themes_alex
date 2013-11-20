(function($){

	// --------- HEADER
	$('.buscador_header').on( 'click', function(){
		$('.categorias_buscador').show();
	});

	$('.username').on( 'click', function(){
		$('.username ul').show();
	});

	$('.notifications').on('click', function(){
		( $('#notifications_drop').not(':visible') ) ? $('#notifications_drop').show() :  $('#notifications_drop').hide();
	});

	$('body').on('click', function (e) {
		if ( ! $(e.target).hasClass('buscador_header_input') ) {
			$('.categorias_buscador').hide();
	   	}
	});

	$('body').on('click', function (e) {
		if ( ! $(e.target).hasClass('username') ) {
			$('.username ul').hide();
	   	}
	});

	$('body').on('click', function (e) {
		if ( ! $(e.target).hasClass('notifications') ) {
			$('#notifications_drop').hide();
	   	}
	});

	// --------- GALERÍA
	$('.foto_galeria').on('click', function(){
		$('.galeria_lightbox').css({ 'display': 'block' });
	});

	$('.galeria_lightbox').on('click', function (e) {
		if ( $(e.target).hasClass('galeria_lightbox') ) {
			$('.galeria_lightbox').hide();
	   	}
	});

	// -------- CHOSEN
	$('.chosen-select').chosen({disable_search: true, width: '200px'});

	//ROTATE FIX
	$.fn.rotate = function(degrees, step, current) {
	    var self = $(this);
	    current = current || 0;
	    step = step || 5;
	    (degrees > 0) ? current += step : current -= step;
	    self.css({
	        '-webkit-transform' : 'rotate(' + current + 'deg)',
	        '-moz-transform' : 'rotate(' + current + 'deg)',
	        '-ms-transform' : 'rotate(' + current + 'deg)',
	        'transform' : 'rotate(' + current + 'deg)'
	    });
	    if (current != degrees) {
	        setTimeout(function() {
	            self.rotate(degrees, step, current);
	        }, 5);
	    }
	};

	function slide_open(mySub){
		var $mySub = $(mySub);
		var myArrow = $('a#trigger');
		var option = null;
		$mySub.is(':visible') ? option = 'close' : option = 'open';
		switch(option){
			case 'close':
			$mySub.slideUp('slow');
			myArrow.rotate(0, 5, 45);
			$("html, body").animate({ scrollTop: 0 }, 'slow');
			break;

			case 'open':
			$mySub.slideDown('slow');
			myArrow.rotate(45);
			$("html, body").animate({ scrollTop: $mySub.offset().top-180 }, 'slow');
			break;

			default: break;
		}
	};

	$('a#trigger').on('click', function(){
		slide_open('#nuevo_evento');
	});
	

})(jQuery);