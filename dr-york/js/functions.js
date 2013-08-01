$(function(){

	$('#video').addClass('video-escondido');

	/* Cookie video */
	var cerrar = $('#cerrar_video');
	var galleta = $.cookie('video');

	$('#cerrar_video').click(function(){
		$('#video').addClass('video_escondido');
		player.stopVideo();
		$.cookie('video', 'video_visto', { expires: 30});
	});

	if ($.cookie('video')=='video_visto'){
		$('#video').addClass('video_escondido');
	} else{
		$('#video').removeClass('video_escondido');
	}
	/* Cookie video */

	/* Abrir Video */
	$('#ver_video p').click(function(){
		$('#video').removeClass('video_escondido');
	});
	/* Abrir Video */

	/* Cookie texto */
	var cerrar_texto = $('#cerrar_texto');
	var galleta_texto = $.cookie('texto');

	$('#cerrar_texto').click(function(){
		$('#texto_se_trata_de_la_gente').addClass('video_escondido');
		$.cookie('texto', 'texto_leido', { expires: 30});
	});

	if ($.cookie('texto')=='texto_leido'){
			$('#texto_se_trata_de_la_gente').addClass('video_escondido');
		} else{
			$('#texto_se_trata_de_la_gente').removeClass('video_escondido');
		}
	/* Cookie texto */

	/* Abrir Texto */
	$('#ver_descripcion').click(function(){
		$('#texto_se_trata_de_la_gente').removeClass('video_escondido');
	});
	/* Abrir Texto */

	$(".prensafancybox").fancybox({
		'type': 'iframe',
		'mouseWheel': false,
		'autoSize': true,
		'autoScale': true,
		'autoDimensions': true,
		'arrows': false
	});

	$(".gentefancybox").fancybox({
		'type': 'iframe',
		'mouseWheel': false,
		'autoSize': false,
		/* 'fitToView': false, */
		'arrows': false,
		'width': '98%',
		'height': '98%',
		'maxWidth': 800,
		'maxHeight': 600,
		'closeClick': true
	});

	/* FANCYBOX */

	/* SLIDER */

	if ( $('.cajita').length > 0 ){

		$('.cajita').cycle({
			fx: 'fade',
			timeout: 90,
			prev: '.prev',
			next: '.next'
		});
	}

	$('#pager li').live('click', function(){

		var personaje = $(this);
		var imgPersonaje = personaje.find('img');
		var texto = '<p class="nombre_chiquito">'+personaje.attr('alt')+'</p>';

		if(personaje.hasClass('seleccionado')){

		} else {
			$('#pager li').removeClass('seleccionado');
			$('#pager li').find('img').css({
				opacity: 1
			});
			$('#pager li').find('p').remove();


			personaje.addClass('seleccionado');
			imgPersonaje.css({
				opacity: 0.5
			});
			personaje.append(texto);
			var seleccionado = $('.seleccionado');
		}
	});

	$('#sliderpager').tinycarousel({
		display: 4,
		controls: true
	});
	/* SLIDER */

	/* LOCURA DE BACKSTRETCH */

	function horitas() {
		var local = new Date(),
			hours = local.getHours(),
			timeOfDay;
		if (hours < 12) {
			timeOfDay = "1";
		} else if (hours < 17) {
			timeOfDay = "2";
		} else if (hours <= 24) {
			timeOfDay = "3";
		}
		return timeOfDay;
	}

	var url = location.pathname;
	var n = url.split("/");
	//console.log(n);
	// console.log(n[1]);
	// console.log(n[2]);

	if(n[1] == 'en'){
		if(n[2] != undefined){
			$.backstretch('/wp-content/themes/dr-york/images/'+n[2]+horitas()+'.jpg');
		} else {
			$.backstretch('/wp-content/themes/dr-york/images/'+''+horitas()+'.jpg');
		}
	} else{
		$.backstretch('/wp-content/themes/dr-york/images/'+n[1]+horitas()+'.jpg');
	}

	$('.menu').hover(
		function(){
			var id = $(this).attr('id');
			$.backstretch('../images/'+id+'.jpg');
		},
		function(){
			$.backstretch('../images/'+n[1]+horitas()+'.jpg');
		}
	);

	function cycle_gente() {
		$('.cajita').cycle({
			fx: 'fade',
			timeout: 90,
			next: '.next',
			prev: '.prev',
		});
	}

	//-------------cuando llega a "se trata de la gente" vacía y carga cajita desde "personaje/nombre_del_personaje"

	if (window.location == "http://www.dr-york.com/se-trata-de-la-gente/" || window.location == "http://www.dr-york.com/en/se-trata-de-la-gente/" || window.location == "http://localhost:8888/york/se-trata-de-la-gente/" || window.location == "http://localhost:8888/york/en/se-trata-de-la-gente/") {

		var quasiultimo = $("ul#pager li:first-child").attr("alt");
		var ultimo = quasiultimo.replace(/ /g, '-');

		$('#cajota').empty();
		$('#cajota').load('/personajes/'+ ultimo, function(response, status, xhr){
			if (status == "success") {
				cycle_gente();
				$('.cajita').cycle('toggle');

				var supportsAudio = !!document.createElement('audio').canPlayType,
				audio,
				loadingIndicator,
				positionIndicator,
				timeleft,
				loaded = false,
				manualSeek = false;

				if (supportsAudio) {

					var este_audio_ogg = $('.nadita-ogg');
					var episodeTitle_ogg = este_audio_ogg.attr('src');
					var este_audio_mp3 = $('.nadita-mp3');
					var episodeTitle_mp3 = este_audio_mp3.attr('src');

					var player = '<p class="player">\
									<span class="playtoggle" />\
									<span class="play_large" />\
									<audio>\
										<source src=' + episodeTitle_ogg + ' type="audio/ogg"></source>\
										<source src=' + episodeTitle_mp3 + ' type="audio/mpeg"></source>\
									</audio>\
								</p>';

					$(player).insertAfter(".cajita");

					audio = $('.player audio').get(0);
					loadingIndicator = $('.player #loading');
					positionIndicator = $('.player #handle');
					timeleft = $('.player #timeleft');

					if ((audio.buffered != undefined) && (audio.buffered.length != 0)) {
						$(audio).bind('progress', function() {
							var loaded = parseInt(((audio.buffered.end(0) / audio.duration) * 100), 10);
							loadingIndicator.css({width: loaded + '%'});
						});
					} else {
						loadingIndicator.remove();
					}

					$(audio).bind('timeupdate', function() {

						var rem = parseInt(audio.duration - audio.currentTime, 10),
								pos = (audio.currentTime / audio.duration) * 100,
								mins = Math.floor(rem/60,10),
								secs = rem - mins*60;

						timeleft.text('-' + mins + ':' + (secs < 10 ? '0' + secs : secs));
						if (!manualSeek) { positionIndicator.css({left: pos + '%'}); }
						if (!loaded) {
							loaded = true;

							$('.player #gutter').slider({
								value: 0,
								step: 0.01,
								orientation: "horizontal",
								range: "min",
								max: audio.duration,
								animate: true,
								slide: function(){
									manualSeek = true;
								},
								stop:function(e,ui){
									manualSeek = false;
									audio.currentTime = ui.value;
								}
							});
						}

					}).bind('play',function(){
						$(".playtoggle").addClass('playing');
						$(".play_large").addClass('playing');
					}).bind('pause ended', function() {
						$(".playtoggle").removeClass('playing');
						$(".play_large").removeClass('playing');
					});

					$(".playtoggle").click(function() {
						if (audio.paused) { audio.play(); }
						else { audio.pause(); }
						$(".play_large").hide();
						$('.cajita').cycle('toggle');
						$('#audioplayer_1').cycle('toggle');


					});

					$(".play_large").click(function() {
						if (audio.paused) { audio.play(); }
						else { audio.pause(); }
						$(".play_large").hide();
						$('.cajita').cycle('toggle');
						$('#audioplayer_1').cycle('toggle');
					});
				}
			};
		});
	}


	window.Player = {
		audio: {},
		isPlaying: false
	};


	//--- Llamado a cajita que carga desde Personajes/nombre_del_personaje

	$('.link_a_la_persona').click(function(e){

		var link = $(this).attr('href');
		e.preventDefault();
		$('#cajota').empty();
		$('#cajota').load(link , function(response, status, xhr){
			if (status == "success") {
				cycle_gente();
				$('.cajita').cycle('toggle');

				var supportsAudio = !!document.createElement('audio').canPlayType,
				audio,
				loadingIndicator,
				positionIndicator,
				timeleft,
				loaded = false,
				manualSeek = false;

				if (supportsAudio) {

					var este_audio_ogg   = $('.nadita-ogg');
					var episodeTitle_ogg = este_audio_ogg.attr('src');
					var este_audio_mp3   = $('.nadita-mp3');
					var episodeTitle_mp3 = este_audio_mp3.attr('src');
					var player = '<p class="player">\
									<span class="playtoggle" />\
									<span class="play_large" />\
									<audio>\
										<source src=' + episodeTitle_ogg + ' type="audio/ogg"></source>\
										<source src=' + episodeTitle_mp3 + ' type="audio/mpeg"></source>\
									</audio>\
								</p>';

					$(player).insertAfter(".cajita");

					audio = $('.player audio').get(0);
					loadingIndicator = $('.player #loading');
					positionIndicator = $('.player #handle');
					timeleft = $('.player #timeleft');




					if ((audio.buffered != undefined) && (audio.buffered.length != 0)) {
						$(audio).bind('progress', function() {
							var loaded = parseInt(((audio.buffered.end(0) / audio.duration) * 100), 10);
							loadingIndicator.css({width: loaded + '%'});
						});
					} else {
						loadingIndicator.remove();
					}

					$(audio).bind('timeupdate', function() {

						Player.audio.duration = audio.duration;
						//var dur = audio.duration;
						//console.log(dur);
						var rem = parseInt(audio.duration - audio.currentTime, 10),
								pos = (audio.currentTime / audio.duration) * 100,
								mins = Math.floor(rem/60,10),
								secs = rem - mins*60;

						timeleft.text('-' + mins + ':' + (secs < 10 ? '0' + secs : secs));
						if (!manualSeek) { positionIndicator.css({left: pos + '%'}); }
						if (!loaded) {
							loaded = true;

							$('.player #gutter').slider({
									value: 0,
									step: 0.01,
									orientation: "horizontal",
									range: "min",
									max: audio.duration,
									animate: true,
									slide: function(){
										manualSeek = true;
									},
									stop:function(e,ui){
										manualSeek = false;
										audio.currentTime = ui.value;
									}
								});
						}

					}).bind('play',function(){
						$(".playtoggle").addClass('playing');
						$(".play_large").addClass('playing');
					}).bind('pause ended', function() {
						$(".playtoggle").removeClass('playing');
						$(".play_large").removeClass('playing');
					});
					//valor del alto de del objeto que contiene el texto
					 var div_alto = $(".text_subtitulo").height();
					 var alto_t = div_alto - 104;



					function terminaAudio(){
						$(".text_subtitulo").css("top","0");
					}


					function animate_text() {

						$('.text_subtitulo').animate(
							{top:-alto_t},
							Player.audio.duration*1000,
							'linear',
							terminaAudio
						);

						Player.isPlaying = true;
					}




					$(".playtoggle").click(function() {

						if (audio.paused) {
							audio.play();

							if (div_alto >= 140){
								$(".text_subtitulo").resume();
								if( Player.isPlaying === false ){
									animate_text();
								}
							}
						} else {
							audio.pause();
							$(".text_subtitulo").pause();
						}

						$(".play_large").hide();
						$('.cajita').cycle('toggle');
						$('#audioplayer_1').cycle('toggle');

					});

					$(".play_large").click(function() {

						if (audio.paused) {
							audio.play();
							if (div_alto >= 140){
								$(".text_subtitulo").resume();
								animate_text();
							}
						} else {
							audio.pause();
							$(".text_subtitulo").pause();
						}

						$(".play_large").hide();
						$('.cajita').cycle('toggle');
						$('#audioplayer_1').cycle('toggle');

					});

					$("#cont").scroll(function() {
						$(".text_subtitulo").pause();
						$("#cont").css("overflow","scroll");
						$(".text_subtitulo").css("top","0");
					});
				}
			};
		});
	});

	var fade = function(){
		$('#container').fadeIn('slow');
		//$('#map').css('display','block');

		var i = $('#map');
	    var is = $(i).attr('src');
	    i.delay(250).attr('src', is);

	}
	setTimeout(fade,1500)

});