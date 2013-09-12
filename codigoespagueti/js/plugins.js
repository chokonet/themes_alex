// Avoid `console` errors in browsers that lack a console.
	(function() {
		var method;
		var noop = function () {};
		var methods = [
			'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
			'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
			'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
			'timeStamp', 'trace', 'warn'
		];
		var length = methods.length;
		var console = (window.console = window.console || {});

		while (length--) {
			method = methods[length];

			// Only stub undefined methods.
			if (!console[method]) {
				console[method] = noop;
			}
		}
	}());


// VOTACION //////////////////////////////////////////////////////////////////////////


	(function($){

		"use strict";

		$(function(){

			window.VoteSlider = {
				Slider: {}
			};

			/**
			 * Crea el slider con jquery-ui
			 * Elementos necesarios: div#slider-ui, button#save-vote
			 */
			VoteSlider.init = function (id) {
				this.Slider = $('div#slider-ui').slider({
					range: 'min',
					min: 1,
					max: 10,
					change: function( event, ui ) {
						$(id).text(ui.value);
					}

				});
			};

			/**
			 * Regresa el valor seleccionado en el slider
			 */
			VoteSlider.getValue = function () {
				return this.Slider.slider( 'option', 'value' );
			};

			/**
			 * Valida que el numero sea un entero del 0 al 10
			 */
			VoteSlider.validate = function () {
				var vote_value = parseInt(this.getValue(), 10);
				return ( vote_value <= 10 && vote_value >= 0 );
			};

			/**
			 * Ajax guarda el valor del voto en la base de datos
			 */
			VoteSlider.save = function () {
				var vote_value = this.getValue(),
					post_id    = $('#slider-ui').data('post_id');

				if( this.validate() ){
					return $.post( ajax_url, {
						post_id : post_id,
						value   : vote_value,
						action  : 'mq_save_vote_data'
					}, 'json' );
				}else{
					console.log('valor debe ser un numero entre 0 y 10');
				}
			};

		});

	})(jQuery);