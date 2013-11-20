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


/**************************************************
		 _            _ _   _
		| |___      _(_) |_| |_ ___ _ __
		| __\ \ /\ / / | __| __/ _ \ '__|
		| |_ \ V  V /| | |_| ||  __/ |
		 \__| \_/\_/ |_|\__|\__\___|_|

 **************************************************/


(function(d,s,id){
	var js,
		fjs = d.getElementsByTagName(s)[0],
		p   = /^http:/.test(d.location) ? 'http' : 'https';

	if ( ! d.getElementById(id) ) {
		js     = d.createElement(s);
		js.id  = id;
		js.src = p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);
	}
})(document, 'script', 'twitter-wjs');




/**************************************************
	            _             _
	__   _____ | |_ __ _  ___(_) ___  _ __
	\ \ / / _ \| __/ _` |/ __| |/ _ \| '_ \
	 \ V / (_) | || (_| | (__| | (_) | | | |
	  \_/ \___/ \__\__,_|\___|_|\___/|_| |_|

 **************************************************/


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