

$(function(){
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
						<span id="playtoggle" />\
						<audio preload="metadata">\
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
		}
		else {
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
			$("#playtoggle").addClass('playing');
		}).bind('pause ended', function() {
			$("#playtoggle").removeClass('playing');
		});

		$("#playtoggle").click(function() {
			if (audio.paused) {	audio.play();	}
			else { audio.pause(); }
		});
		}
		});

