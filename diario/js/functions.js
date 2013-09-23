(function($){

	"use strict";

	$(function(){



		$('#sliderContainer').tinycarousel({ display: 1 });

		$('header').delay(100).fadeIn('slow', function(){
			$('.labelContainer').fadeIn('slow');
			$('.container').delay(100).slideDown('slow');
		});



	// TERMINOS Y CONDICIONES ////////////////////////////////////////////////////////////



		$('#termsToggle').live('click', function () {
			$('#terminos').slideToggle('fast');
			$('html, body').css({
				'overflow': 'hidden',
				'height': '100%'
			});
		});

		$('#terminos .close').live('click', function () {
			$('#terminos').slideToggle('fast');
			$('html, body').css({
				'overflow': 'auto',
				'height': 'auto'
			});
		});



	// AVISO DE PRIVACIDAD ///////////////////////////////////////////////////////////////



		$('#privToggle').live('click', function () {
			$('#privacy').slideToggle('fast');
			$('html, body').css({
				'overflow': 'hidden',
				'height': '100%'
			});
		});

		$('#privacy .close').live('click', function () {
			$('#privacy').slideToggle('fast');
			$('html, body').css({
				'overflow': 'auto',
				'height': 'auto'
			});
		});



	// ANIMATE BOX-SHADOW EFFECT /////////////////////////////////////////////////////////



		$('.button').mousedown(function(){
			$(this).animate({
				boxShadow: 'none'
			}, 50 );
		}).mouseup(function(){
			$(this).animate({
				boxShadow : '-3px 8px 15px 0px rgba(0, 0, 0, 0.2)'
			}, 50 );
		});



	// TWIST THE PICS ////////////////////////////////////////////////////////////////////



		$('.picframe').each(function () {
			var degrees = Math.round( Math.random()*12 )-6;
			$(this).css({
				'-webkit-transform' : 'rotate('+ degrees +'deg)',
				'-moz-transform' : 'rotate('+ degrees +'deg)',
				'-ms-transform' : 'rotate('+ degrees +'deg)',
				'transform' : 'rotate('+ degrees +'deg)'
			});
			var theclass = Math.round( Math.random()*2 )+1;
			switch(theclass){
				case 1:
					theclass = 'greenBtn';
					break;
				case 2:
					theclass = 'blueBtn';
					break;
				case 3:
					theclass = 'pinkBtn';
					break;
				default:
					console.log('entre al default');
					theclass = 'greenBtn';
					break;
			}
			$(this).find('.pin').addClass( theclass );
		});


		function changeGallery(myvalue){

			switch(myvalue){
				case 0: // SHOW GALLERY 0
					$('.albumWrapper').not('.albumWrapper:hidden').fadeOut('fast', function(){
						$('#FotosA').fadeIn('fast');
					});
					// FOTO COVER A
					$('.foto_cover').fadeOut(0, function(){
						$('#fotoCoverA').fadeIn(0);
					});
					break;
				case 1: // SHOW GALLERY 1
					$('.albumWrapper').not('.albumWrapper:hidden').fadeOut('fast', function(){
						$('#FotosB').fadeIn('fast');
					});
					// FOTO COVER B
					$('.foto_cover').fadeOut(0, function(){
						$('#fotoCoverB').fadeIn(0);
					});
					break;
				case 2: // SHOW GALLERY 2
					$('.albumWrapper').not('.albumWrapper:hidden').fadeOut('fast', function(){
						$('#FotosC').fadeIn('fast');
					});
					// FOTO COVER C
					$('.foto_cover').fadeOut(0, function(){
						$('#fotoCoverC').fadeIn(0);
					});
					break;
				case 3: // SHOW GALLERY 3
					$('.albumWrapper').not('.albumWrapper:hidden').fadeOut('fast', function(){
						$('#FotosD').fadeIn('fast');
					});
					// FOTO COVER D
					$('.foto_cover').fadeOut(0, function(){
						$('#fotoCoverD').fadeIn(0);
					});
					break;
				default:
					break;
			}
		}


		$.extend($.ui.slider.prototype.options, {
			dragAnimate: true
		});


		var _mouseCapture = $.ui.slider.prototype._mouseCapture;
		$.widget("ui.slider", $.extend({}, $.ui.slider.prototype, {
			_mouseCapture: function(event) {
				_mouseCapture.apply(this, arguments);
				this.options.dragAnimate ? this._animateOff = false : this._animateOff = true;
				return true;
			}
		}));



	// SLIDER EDAD DEL BEBE //////////////////////////////////////////////////////////////



		$('#ageSlider').slider({
			animate: true,
			min: 0,
			max: 3,
			step: 1,
			change: function(event,ui) {
				var selection = $( "#ageSlider" ).slider( "value" );
				changeGallery(selection);
			}
		});

		$('.ui-slider-handle').addClass('rounded dropSmall');



	});

})(jQuery);