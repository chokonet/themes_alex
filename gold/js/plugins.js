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


/**
 * Gold - Wrapper de la libreria FabricJS para la aplicación Momentos Gold
 *
 * @license WTFPL – Do What the Fuck You Want to Public License  http://www.wtfpl.net/about/
 * @author Los Maquiladores
 * @version 1.0
 */
window.Gold = {};

(function(Gold) {

	/**
	* Crea el canvas e inserta la imagen proporcionada
	* @param imageUrl
	*/
	Gold.initPasoDos = function (imageUrl) {
		this.Container = new fabric.Canvas('canvas-container', {
			backgroundColor: '#B2DCF8'
		});
		this.Container.setHeight(400).setWidth(480);

		fabric.Image.fromURL( imageUrl, function (image) {
			image.hasControls = false;
			image.hasBorders  = false;
			Gold.Imagen       = image;

			while( Gold.Imagen.width < 600 ){
				Gold.increaseImageSize();
			}
			Gold.Container.add( Gold.Imagen.set({ left: 260, top: 200 }) );
		});
	};

	Gold.initPasoCuatro = function (imageUrl) {
		this.Container = new fabric.Canvas( 'canvas-container', {
			backgroundColor: '#B2DCF8'
		});
		this.Container.setHeight(418).setWidth(530);

		this.f = fabric.Image.filters;

		fabric.Image.fromURL( imageUrl, function (image) {
			image.hasControls = false;
			image.hasBorders  = false;
			image.selectable  = false;
			Gold.Imagen       = image;

			while( Gold.Imagen.width > 435 ){
				Gold.decreaseImageSize();
			}

			Gold.Container.insertAt( Gold.Imagen.set({ left: 265, top: 209 }), 0 );
			Gold.Container.setActiveObject( Gold.Imagen );
			Gold.ElementsIndex = 4;
			// Gold.Container.setBackgroundImage( paso4Data.tema, Gold.Container.renderAll.bind(Gold.Container));
		});
	};

	Gold.setTheme = function (themeUrl) {
		//console.log(themeUrl);
		fabric.Image.fromURL( themeUrl, function (image) {
			image.hasControls = false;
			image.hasBorders  = false;
			image.selectable  = false;
			Gold.Theme        = image;

			Gold.Theme.setWidth(520);
			Gold.Theme.setHeight(408);
			Gold.Container.insertAt( Gold.Theme.set({ left: 265, top: 209 }), 1 );
		});
	};

	Gold.setBorder = function () {
		var rect = new fabric.Rect({
			left: 265,
			top: 209,
			fill: false,
			width: 530,
			height: 417,
		});
		rect.hasControls = false;
		rect.hasBorders  = false;
		rect.selectable  = false;
		Gold.Border = rect;
		Gold.Container.insertAt( Gold.Border.set({ strokeWidth: 9, stroke: '#FFFFFF' }), 2 );
	};

	Gold.setText = function (text) {
		var leyenda = new fabric.Text( text, {
			fontFamily: 'GothamRnd-Bold_Conv',
			fontSize: 32,
			fill: '#ffffff',
			left: 260,
			top: 35
		});
		Gold.Texto = leyenda;
		Gold.Container.insertAt( Gold.Texto, 3 );
	};

	Gold.addCanvasElement = function(imageUrl){

		fabric.Image.fromURL( imageUrl, function (element) {
			element.hasControls = true;
			element.hasBorders  = true;
			element.selectable  = true;


			element.setWidth(100);
			element.setHeight(100);

			var positionlLeft = 250 + Gold.ElementsIndex*10;
			Gold.Container.insertAt( element.set({ left: positionlLeft, top: 225 }), Gold.ElementsIndex++ );
			Gold.Texto.bringToFront();
			//Gold.Theme.bringToFront();
			Gold.Container.setActiveObject( element );
		});
	};

	/**
	 * Incrementar el tamaño de la imagen 10%
	 */
	Gold.increaseImageSize = function () {
		this.Imagen.setHeight( this.Imagen.getHeight() * 1.1 )
			.setWidth( this.Imagen.getWidth() * 1.1 );

		this.Container.renderAll();
	};


	/**
	 * Reducir el tamaño de la imagen 10%
	 */
	Gold.decreaseImageSize = function () {
		this.Imagen.setHeight( this.Imagen.getHeight() * 0.9 )
			.setWidth( this.Imagen.getWidth() * 0.9 );

		this.Container.renderAll();
	};

	Gold.removeFocus = function () {
		Gold.Container.setActiveObject( Gold.Imagen );
	};

	Gold.deleteActiveElement = function () {
		if( Gold.Container.getActiveGroup() ){

			Gold.Container.getActiveGroup().forEachObject(function(o){
				Gold.Container.remove(o);
			});

			Gold.Container.discardActiveGroup().renderAll();

		} else {
			if( this.Container.getActiveObject() !== this.Imagen )
		  		this.Container.remove( this.Container.getActiveObject() );
	  	}
	};

})(Gold);



/**
 * vintageJS - add a retro/vintage effect to images using the HTML5 canvas element
 *
 * @license Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 * @author Robert Fleischmann
 * @version 1.1.1
 */
(function($, window, document, undefined) {
  'use strict';
  $.fn.vintage = function(options, effect) {
	var VintageJS = function(originalImage, opts, effect) {
	  if (false === (originalImage instanceof HTMLImageElement)) {
		throw 'The element (1st parameter) must be an instance of HTMLImageElement';
	  }

	  var loadResources,
		  applyEffect,
		  vintage,
		  resources,
		  originalSrc,
		  width,
		  height,
		  _effect,
		  resourceName,
		  image   = new Image(),
		  tmpImg  = new Image(),
		  canvas  = document.createElement('canvas'),
		  ctx     = canvas.getContext('2d'),
		  options = {
			onStart: function() {},
			onStop:  function() {},
			onError: function() {},
			mime:    'image/jpeg'
		  },
		  defaultEffect = {
			curves:     false,
			screen:     false,
			desaturate: false,
			vignette:   false,
			lighten:    false,
			noise:      false,
			viewFinder: false,
			sepia:      false,
			brightness: false,
			contrast:   false
		  };

	  image.onerror = options.onError;
	  image.onload = function() {
		// set global variables
		width = canvas.width = image.width;
		height = canvas.height = image.height;

		// load resources
		loadResources();
	  };

	  tmpImg.onerror = options.onError;
	  tmpImg.onload = function() {
		ctx.clearRect(0, 0, width, height);
		ctx.drawImage(tmpImg, 0, 0, width, height);
		(window.vjsImageCache || (window.vjsImageCache = {}))[resourceName] = ctx.getImageData(0, 0, width, height).data;
		loadResources();
	  };

	  applyEffect = function (effect) {
		options.onStart();

		// prepare effect options
		_effect = {};
		for(var name in defaultEffect) {
		  _effect[name] = effect[name] || defaultEffect[name];
		}

		// define resources
		resources = [];
		if (!!_effect.viewFinder) {
		  resources.push(_effect.viewFinder);
		}

		// load base image and trigger onload function
		if (image.src == originalSrc) {
		  loadResources();
		} else {
		  image.src = originalSrc;
		}
	  };

	  loadResources = function() {
		// call callback if all resources are loaded
		if (resources.length === 0) {
		  return vintage();
		}

		// load next resource if the current one is already cached
		var resource     = resources.pop();
		resourceName = [width, height, resource].join('-');
		if (window.vjsImageCache && window.vjsImageCache[resourceName]) {
		  return loadResources();
		}

		// load resource and put into cache
		tmpImg.src = resource;
	  };

	  vintage = function() {
		var outerRadius, gradient, imageData;

		// draw image on canvas
		ctx.clearRect(0, 0, width, height);
		ctx.drawImage(image, 0, 0, width, height);
		// get gradient radius if vignette or lighten center are used
		if (!!_effect.vignette || !!_effect.lighten) {
		  outerRadius = Math.sqrt( Math.pow(width / 2, 2) + Math.pow(height / 2, 2) );
		}

		// vignette
		if (!!_effect.vignette) {
		  ctx.globalCompositeOperation = 'source-over';
		  gradient = ctx.createRadialGradient(width/2, height/2, 0, width/2, height/2, outerRadius);
		  gradient.addColorStop(0, 'rgba(0,0,0,0)');
		  gradient.addColorStop(0.5, 'rgba(0,0,0,0)');
		  gradient.addColorStop(1, ['rgba(0,0,0,', _effect.vignette, ')'].join('') );
		  ctx.fillStyle = gradient;
		  ctx.fillRect(0, 0, width, height);
		}

		if (!!_effect.lighten) {
		  ctx.globalCompositeOperation = 'lighter';
		  gradient = ctx.createRadialGradient(width/2, height/2, 0, width/2, height/2, outerRadius);
		  gradient.addColorStop(0, ['rgba(255,255,255,', _effect.lighten, ')'].join('') );
		  gradient.addColorStop(0.5, 'rgba(255,255,255,0)');
		  gradient.addColorStop(1, 'rgba(0,0,0,0)');
		  ctx.fillStyle = gradient;
		  ctx.fillRect(0, 0, width, height);
		}

		// get image data for pixel manipulation
		imageData  = ctx.getImageData(0, 0, width, height);

		// temporary var for faster looping
		var
		idx,
		j, // for check value loop
		r,g,b, // for sepia
		average,
		sepiatone,
		noise,
		_imageData = imageData.data,
		viewFinderImageData,
		contrastFactor;

		if (!!_effect.contrast) {
		  contrastFactor = (259 * (_effect.contrast + 255)) / (255 * (259 - _effect.contrast));
		}

		if (!!_effect.viewFinder) {
		  viewFinderImageData = window.vjsImageCache[ [width, height, _effect.viewFinder].join('-') ];
		}

		// loop backwards so the length has to be evaluated only once; --i is faster than ++i, i-- or i++
		for (var i = (width * height); i >= 0; --i) {
		  // idx = i * 4;
		  // bitshift operartions are faster
		  idx = i << 2;

		  // curves
		  if (!!_effect.curves) {
			_imageData[idx  ] = _effect.curves.r[ _imageData[idx  ] ];
			_imageData[idx+1] = _effect.curves.g[ _imageData[idx+1] ];
			_imageData[idx+2] = _effect.curves.b[ _imageData[idx+2] ];
		  }

		  // contrast
		  if (!!_effect.contrast) {
			_imageData[idx  ] = contrastFactor * (_imageData[idx  ] - 128) + 128;
			_imageData[idx+1] = contrastFactor * (_imageData[idx+1] - 128) + 128;
			_imageData[idx+2] = contrastFactor * (_imageData[idx+2] - 128) + 128;
		  }

		  // brightness
		  if (!!_effect.brightness) {
			_imageData[idx  ] += _effect.brightness;
			_imageData[idx+1] += _effect.brightness;
			_imageData[idx+2] += _effect.brightness;
		  }

		  // screen
		  if (!!_effect.screen) {
			_imageData[idx  ] = 255 - ((255 - _imageData[idx  ]) * (255 - _effect.screen.r * _effect.screen.a) / 255);
			_imageData[idx+1] = 255 - ((255 - _imageData[idx+1]) * (255 - _effect.screen.g * _effect.screen.a) / 255);
			_imageData[idx+2] = 255 - ((255 - _imageData[idx+2]) * (255 - _effect.screen.b * _effect.screen.a) / 255);
		  }

		  // noise
		  if (!!_effect.noise) {
			noise = _effect.noise - Math.random() * _effect.noise / 2;
			_imageData[idx  ] += noise;
			_imageData[idx+1] += noise;
			_imageData[idx+2] += noise;
		  }

		  // view finder
		  if (!!_effect.viewFinder) {
			_imageData[idx  ] = _imageData[idx  ] * viewFinderImageData[idx  ] / 255;
			_imageData[idx+1] = _imageData[idx+1] * viewFinderImageData[idx+1] / 255;
			_imageData[idx+2] = _imageData[idx+2] * viewFinderImageData[idx+2] / 255;
		  }

		  // sepia
		  if (!!_effect.sepia) {
			r = _imageData[idx  ];
			g = _imageData[idx+1];
			b = _imageData[idx+2];
			_imageData[idx  ] = r * 0.393 + g * 0.769 + b * 0.189;
			_imageData[idx+1] = r * 0.349 + g * 0.686 + b * 0.168;
			_imageData[idx+2] = r * 0.272 + g * 0.534 + b * 0.131;
		  }

		  // desaturate
		  if (!!_effect.desaturate) {
			average = ( _imageData[idx  ] + _imageData[idx+1] + _imageData[idx+2] ) / 3;
			_imageData[idx  ] += ((average - _imageData[idx  ]) * _effect.desaturate);
			_imageData[idx+1] += ((average - _imageData[idx+1]) * _effect.desaturate);
			_imageData[idx+2] += ((average - _imageData[idx+2]) * _effect.desaturate);
		  }

		  // check value range 0-255 and parse to int
		  // http://jsperf.com/min-max-vs-if-else
		  // http://jsperf.com/parseint-vs-double-bitwise-not2
		  for (j=2; j>=0; --j) {
			_imageData[idx+j] = ~~(_imageData[idx+j] > 255 ? 255 : _imageData[idx+j] < 0 ? 0 : _imageData[idx+j]);
		  }
		}

		// write image data, finalize vintageJS
		ctx.putImageData(imageData, 0, 0);
		originalImage.src = ctx.canvas.toDataURL(options.mime);
		options.onStop();
	  };

	  // initialize vintageJS library
	  originalSrc = originalImage.src;
	  opts = opts || {};
	  for(var name in options) {
		options[name] = opts[name] || options[name];
	  }
	  if (effect) {
		applyEffect(effect);
	  }

	  return {
		apply: function() {
		  originalSrc = originalImage.src;
		},
		reset: function() {
		  originalImage.src = originalSrc;
		},
		vintage: applyEffect
	  };
	};
	return this.each(function() {
	  if (!$.data(this, 'vintageJS')) {
		$.data(this, 'vintageJS', new VintageJS( this, options, effect ));
	  }
	});
  };
})(jQuery, window, document);

window.effects = {
  /**
   * Basic retro effect
   */
  retro: {
	curves: (function() {
	  var rgb = function (x) {
		return -12 * Math.sin( x * 2 * Math.PI / 255 ) + x;
	  },
	  r = function(x) {
		return -0.2 * Math.pow(255 * x, 0.5) * Math.sin(Math.PI * (-0.0000195 * Math.pow(x, 2) + 0.0125 * x ) ) + x;
	  },
	  g = function(x) {
		return -0.001045244139166791 * Math.pow(x,2) + 1.2665372554875318 * x;
	  },
	  b = function(x) {
		return 0.57254902 * x + 53;
	  },
	  c = {r:[],g:[],b:[]};
	  for(var i=0;i<=255;++i) {
		c.r[i] = r( rgb(i) );
		c.g[i] = g( rgb(i) );
		c.b[i] = b( rgb(i) );
	  }
	  return c;
	})(),
	screen: {
	  r: 80,
	  g: 40,
	  b: 140,
	  a: 0.15
	},
	vignette: 0.2,
  },
  /**
   * Basic vintage effect
   */
  vintage: {
	curves: (function() {
	  var rgb = function (x) {
		return -12 * Math.sin( x * 2 * Math.PI / 255 ) + x;
	  },
	  r = function(x) {
		return -0.2 * Math.pow(255 * x, 0.5) * Math.sin(Math.PI * (-0.0000195 * Math.pow(x, 2) + 0.0125 * x ) ) + x;
	  },
	  g = function(x) {
		return -0.001045244139166791 * Math.pow(x,2) + 1.2665372554875318 * x;
	  },
	  b = function(x) {
		return 0.57254902 * x + 53;
	  },
	  c = {r:[],g:[],b:[]};
	  for(var i=0;i<=255;++i) {
		c.r[i] = r( rgb(i) );
		c.g[i] = g( rgb(i) );
		c.b[i] = b( rgb(i) );
	  }
	  return c;
	})(),
	screen: {
	  r: 227,
	  g: 12,
	  b: 169,
	  a: 0.15
	},
	vignette: 0.5,
	viewFinder: images_url+'viewfinder.jpg'
  },
  /**
   * Sepia effect
   */
  sepia: {
	curves: (function() {
	  var rgb = function (x) {
		return -12 * Math.sin( x * 2 * Math.PI / 255 ) + x;
	  },
	  c = {r:[],g:[],b:[]};
	  for(var i=0;i<=255;++i) {
		c.r[i] = rgb(i);
		c.g[i] = rgb(i);
		c.b[i] = rgb(i);
	  }
	  return c;
	})(),
	sepia: true
  },
  /**
   * Greenish effect
   */
  greenish: {
	curves: (function() {
	  var rgb = function (x) {
		return -12 * Math.sin( x * 2 * Math.PI / 255 ) + x;
	  },
	  c = {r:[],g:[],b:[]};
	  for(var i=0;i<=255;++i) {
		c.r[i] = rgb(i);
		c.g[i] = rgb(i);
		c.b[i] = rgb(i);
	  }
	  return c;
	})(),
	vignette: 0.6,
	lighten: 0.1,
	screen: {
	  r: 255,
	  g: 255,
	  b: 0,
	  a: 0.15
	}
  },
  /**
   * Reddish effect
   */
  reddish: {
	curves: (function() {
	  var rgb = function (x) {
		return -12 * Math.sin( x * 2 * Math.PI / 255 ) + x;
	  },
	  c = {r:[],g:[],b:[]};
	  for(var i=0;i<=255;++i) {
		c.r[i] = rgb(i);
		c.g[i] = rgb(i);
		c.b[i] = rgb(i);
	  }
	  return c;
	})(),
	vignette: 0.6,
	lighten: 0.1,
	screen: {
	  r: 255,
	  g: 0,
	  b: 0,
	  a: 0.15
	}
  },
  /**
   * Movies effect
   */
  movies: {
	curves: (function() {
	  var rgb = function (x) {
		return -12 * Math.sin( x * 2 * Math.PI / 255 ) + x;
	  },
	  c = {r:[],g:[],b:[]};
	  for(var i=0;i<=255;++i) {
		c.r[i] = rgb(i);
		c.g[i] = rgb(i);
		c.b[i] = rgb(i);
	  }
	  return c;
	})(),
	vignette: 0.8,
	lighten: 0.1,
	screen: {
	  r: 10,
	  g: 20,
	  b: 40,
	  a: 0.20
	},
	viewFinder: images_url+'movies.jpg'
  }
};








/* jquery.nicescroll
-- version 3.4.1
-- copyright 2011-12-13 InuYaksa*2013
-- licensed under the MIT
--
-- http://areaaperta.com/nicescroll
-- https://github.com/inuyaksa/jquery.nicescroll
--
*/
(function(e){var D=!1,G=!1,N=5E3,O=2E3,C=0,J,u=document.getElementsByTagName("script"),u=u[u.length-1].src.split("?")[0];J=0<u.split("/").length?u.split("/").slice(0,-1).join("/")+"/":"";Array.prototype.forEach||(Array.prototype.forEach=function(e,d){for(var k=0,s=this.length;k<s;++k)e.call(d,this[k],k,this)});var w=window.requestAnimationFrame||!1,x=window.cancelAnimationFrame||!1;["ms","moz","webkit","o"].forEach(function(e){w||(w=window[e+"RequestAnimationFrame"]);x||(x=window[e+"CancelAnimationFrame"]||
window[e+"CancelRequestAnimationFrame"])});var E=window.MutationObserver||window.WebKitMutationObserver||!1,K={zindex:"auto",cursoropacitymin:0,cursoropacitymax:1,cursorcolor:"#424242",cursorwidth:"5px",cursorborder:"1px solid #fff",cursorborderradius:"5px",scrollspeed:60,mousescrollstep:24,touchbehavior:!1,hwacceleration:!0,usetransition:!0,boxzoom:!1,dblclickzoom:!0,gesturezoom:!0,grabcursorenabled:!0,autohidemode:!0,background:"",iframeautoresize:!0,cursorminheight:32,preservenativescrolling:!0,
railoffset:!1,bouncescroll:!0,spacebarenabled:!0,railpadding:{top:0,right:0,left:0,bottom:0},disableoutline:!0,horizrailenabled:!0,railalign:"right",railvalign:"bottom",enabletranslate3d:!0,enablemousewheel:!0,enablekeyboard:!0,smoothscroll:!0,sensitiverail:!0,enablemouselockapi:!0,cursorfixedheight:!1,directionlockdeadzone:6,hidecursordelay:400,nativeparentscrolling:!0,enablescrollonselection:!0,overflowx:!0,overflowy:!0,cursordragspeed:0.3,rtlmode:!1,cursordragontouch:!1},H=!1,P=function(j,d){function k(){var c=
b.win;if("zIndex"in c)return c.zIndex();for(;0<c.length&&9!=c[0].nodeType;){var g=c.css("zIndex");if(!isNaN(g)&&0!=g)return parseInt(g);c=c.parent()}return!1}function s(c,g,p){g=c.css(g);c=parseFloat(g);return isNaN(c)?(c=B[g]||0,p=3==c?p?b.win.outerHeight()-b.win.innerHeight():b.win.outerWidth()-b.win.innerWidth():1,b.isie8&&c&&(c+=1),p?c:0):c}function n(c,g,p,d){b._bind(c,g,function(b){b=b?b:window.event;var d={original:b,target:b.target||b.srcElement,type:"wheel",deltaMode:"MozMousePixelScroll"==
b.type?0:1,deltaX:0,deltaZ:0,preventDefault:function(){b.preventDefault?b.preventDefault():b.returnValue=!1;return!1},stopImmediatePropagation:function(){b.stopImmediatePropagation?b.stopImmediatePropagation():b.cancelBubble=!0}};"mousewheel"==g?(d.deltaY=-0.025*b.wheelDelta,b.wheelDeltaX&&(d.deltaX=-0.025*b.wheelDeltaX)):d.deltaY=b.detail;return p.call(c,d)},d)}function v(c,g,d){var f,e;0==c.deltaMode?(f=-Math.floor(c.deltaX*(b.opt.mousescrollstep/54)),e=-Math.floor(c.deltaY*(b.opt.mousescrollstep/
54))):1==c.deltaMode&&(f=-Math.floor(c.deltaX*b.opt.mousescrollstep),e=-Math.floor(c.deltaY*b.opt.mousescrollstep));g&&(0==f&&e)&&(f=e,e=0);f&&(b.scrollmom&&b.scrollmom.stop(),b.lastdeltax+=f,b.debounced("mousewheelx",function(){var c=b.lastdeltax;b.lastdeltax=0;b.rail.drag||b.doScrollLeftBy(c)},120));if(e){if(b.opt.nativeparentscrolling&&d&&!b.ispage&&!b.zoomactive)if(0>e){if(b.getScrollTop()>=b.page.maxh)return!0}else if(0>=b.getScrollTop())return!0;b.scrollmom&&b.scrollmom.stop();b.lastdeltay+=
e;b.debounced("mousewheely",function(){var c=b.lastdeltay;b.lastdeltay=0;b.rail.drag||b.doScrollBy(c)},120)}c.stopImmediatePropagation();return c.preventDefault()}var b=this;this.version="3.4.0";this.name="nicescroll";this.me=d;this.opt={doc:e("body"),win:!1};e.extend(this.opt,K);this.opt.snapbackspeed=80;if(j)for(var m in b.opt)"undefined"!=typeof j[m]&&(b.opt[m]=j[m]);this.iddoc=(this.doc=b.opt.doc)&&this.doc[0]?this.doc[0].id||"":"";this.ispage=/BODY|HTML/.test(b.opt.win?b.opt.win[0].nodeName:
this.doc[0].nodeName);this.haswrapper=!1!==b.opt.win;this.win=b.opt.win||(this.ispage?e(window):this.doc);this.docscroll=this.ispage&&!this.haswrapper?e(window):this.win;this.body=e("body");this.iframe=this.isfixed=this.viewport=!1;this.isiframe="IFRAME"==this.doc[0].nodeName&&"IFRAME"==this.win[0].nodeName;this.istextarea="TEXTAREA"==this.win[0].nodeName;this.forcescreen=!1;this.canshowonmouseevent="scroll"!=b.opt.autohidemode;this.page=this.view=this.onzoomout=this.onzoomin=this.onscrollcancel=
this.onscrollend=this.onscrollstart=this.onclick=this.ongesturezoom=this.onkeypress=this.onmousewheel=this.onmousemove=this.onmouseup=this.onmousedown=!1;this.scroll={x:0,y:0};this.scrollratio={x:0,y:0};this.cursorheight=20;this.scrollvaluemax=0;this.observerremover=this.observer=this.scrollmom=this.scrollrunning=this.checkrtlmode=!1;do this.id="ascrail"+O++;while(document.getElementById(this.id));this.hasmousefocus=this.hasfocus=this.zoomactive=this.zoom=this.selectiondrag=this.cursorfreezed=this.cursor=
this.rail=!1;this.visibility=!0;this.hidden=this.locked=!1;this.cursoractive=!0;this.overflowx=b.opt.overflowx;this.overflowy=b.opt.overflowy;this.nativescrollingarea=!1;this.checkarea=0;this.events=[];this.saved={};this.delaylist={};this.synclist={};this.lastdeltay=this.lastdeltax=0;if(H)m=H;else{m=document.createElement("DIV");var h={haspointerlock:"pointerLockElement"in document||"mozPointerLockElement"in document||"webkitPointerLockElement"in document};h.isopera="opera"in window;h.isopera12=h.isopera&&
"getUserMedia"in navigator;h.isie="all"in document&&"attachEvent"in m&&!h.isopera;h.isieold=h.isie&&!("msInterpolationMode"in m.style);h.isie7=h.isie&&!h.isieold&&(!("documentMode"in document)||7==document.documentMode);h.isie8=h.isie&&"documentMode"in document&&8==document.documentMode;h.isie9=h.isie&&"performance"in window&&9<=document.documentMode;h.isie10=h.isie&&"performance"in window&&10<=document.documentMode;h.isie9mobile=/iemobile.9/i.test(navigator.userAgent);h.isie9mobile&&(h.isie9=!1);
h.isie7mobile=!h.isie9mobile&&h.isie7&&/iemobile/i.test(navigator.userAgent);h.ismozilla="MozAppearance"in m.style;h.iswebkit="WebkitAppearance"in m.style;h.ischrome="chrome"in window;h.ischrome22=h.ischrome&&h.haspointerlock;h.ischrome26=h.ischrome&&"transition"in m.style;h.cantouch="ontouchstart"in document.documentElement||"ontouchstart"in window;h.hasmstouch=window.navigator.msPointerEnabled||!1;h.ismac=/^mac$/i.test(navigator.platform);h.isios=h.cantouch&&/iphone|ipad|ipod/i.test(navigator.platform);
h.isios4=h.isios&&!("seal"in Object);h.isandroid=/android/i.test(navigator.userAgent);h.trstyle=!1;h.hastransform=!1;h.hastranslate3d=!1;h.transitionstyle=!1;h.hastransition=!1;h.transitionend=!1;for(var q=["transform","msTransform","webkitTransform","MozTransform","OTransform"],r=0;r<q.length;r++)if("undefined"!=typeof m.style[q[r]]){h.trstyle=q[r];break}h.hastransform=!1!=h.trstyle;h.hastransform&&(m.style[h.trstyle]="translate3d(1px,2px,3px)",h.hastranslate3d=/translate3d/.test(m.style[h.trstyle]));
h.transitionstyle=!1;h.prefixstyle="";h.transitionend=!1;for(var q="transition webkitTransition MozTransition OTransition OTransition msTransition KhtmlTransition".split(" "),A=" -webkit- -moz- -o- -o -ms- -khtml-".split(" "),u="transitionend webkitTransitionEnd transitionend otransitionend oTransitionEnd msTransitionEnd KhtmlTransitionEnd".split(" "),r=0;r<q.length;r++)if(q[r]in m.style){h.transitionstyle=q[r];h.prefixstyle=A[r];h.transitionend=u[r];break}h.ischrome26&&(h.prefixstyle=A[1]);h.hastransition=
h.transitionstyle;b:{q=["-moz-grab","-webkit-grab","grab"];if(h.ischrome&&!h.ischrome22||h.isie)q=[];for(r=0;r<q.length;r++)if(A=q[r],m.style.cursor=A,m.style.cursor==A){q=A;break b}q="url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur),n-resize"}h.cursorgrabvalue=q;h.hasmousecapture="setCapture"in m;h.hasMutationObserver=!1!==E;m=null;m=H=h}this.detected=m;var f=e.extend({},this.detected);this.ishwscroll=(this.canhwscroll=f.hastransform&&b.opt.hwacceleration)&&b.haswrapper;this.istouchcapable=
!1;f.cantouch&&(f.ischrome&&!f.isios&&!f.isandroid)&&(this.istouchcapable=!0,f.cantouch=!1);f.cantouch&&(f.ismozilla&&!f.isios)&&(this.istouchcapable=!0,f.cantouch=!1);b.opt.enablemouselockapi||(f.hasmousecapture=!1,f.haspointerlock=!1);this.delayed=function(c,g,d,f){var e=b.delaylist[c],h=(new Date).getTime();if(!f&&e&&e.tt)return!1;e&&e.tt&&clearTimeout(e.tt);if(e&&e.last+d>h&&!e.tt)b.delaylist[c]={last:h+d,tt:setTimeout(function(){b.delaylist[c].tt=0;g.call()},d)};else if(!e||!e.tt)b.delaylist[c]=
{last:h,tt:0},setTimeout(function(){g.call()},0)};this.debounced=function(c,g,d){var e=b.delaylist[c];(new Date).getTime();b.delaylist[c]=g;e||setTimeout(function(){var g=b.delaylist[c];b.delaylist[c]=!1;g.call()},d)};this.synched=function(c,g){b.synclist[c]=g;b.onsync||(w(function(){b.onsync=!1;for(c in b.synclist){var g=b.synclist[c];g&&g.call(b);b.synclist[c]=!1}}),b.onsync=!0);return c};this.unsynched=function(c){b.synclist[c]&&(b.synclist[c]=!1)};this.css=function(c,g){for(var d in g)b.saved.css.push([c,
d,c.css(d)]),c.css(d,g[d])};this.scrollTop=function(c){return"undefined"==typeof c?b.getScrollTop():b.setScrollTop(c)};this.scrollLeft=function(c){return"undefined"==typeof c?b.getScrollLeft():b.setScrollLeft(c)};BezierClass=function(b,g,d,e,f,h,k){this.st=b;this.ed=g;this.spd=d;this.p1=e||0;this.p2=f||1;this.p3=h||0;this.p4=k||1;this.ts=(new Date).getTime();this.df=this.ed-this.st};BezierClass.prototype={B2:function(b){return 3*b*b*(1-b)},B3:function(b){return 3*b*(1-b)*(1-b)},B4:function(b){return(1-
b)*(1-b)*(1-b)},getNow:function(){var b=1-((new Date).getTime()-this.ts)/this.spd,g=this.B2(b)+this.B3(b)+this.B4(b);return 0>b?this.ed:this.st+Math.round(this.df*g)},update:function(b,g){this.st=this.getNow();this.ed=b;this.spd=g;this.ts=(new Date).getTime();this.df=this.ed-this.st;return this}};if(this.ishwscroll){this.doc.translate={x:0,y:0,tx:"0px",ty:"0px"};f.hastranslate3d&&f.isios&&this.doc.css("-webkit-backface-visibility","hidden");var z=function(){var c=b.doc.css(f.trstyle);return c&&"matrix"==
c.substr(0,6)?c.replace(/^.*\((.*)\)$/g,"$1").replace(/px/g,"").split(/, +/):!1};this.getScrollTop=function(c){if(!c){if(c=z())return 16==c.length?-c[13]:-c[5];if(b.timerscroll&&b.timerscroll.bz)return b.timerscroll.bz.getNow()}return b.doc.translate.y};this.getScrollLeft=function(c){if(!c){if(c=z())return 16==c.length?-c[12]:-c[4];if(b.timerscroll&&b.timerscroll.bh)return b.timerscroll.bh.getNow()}return b.doc.translate.x};this.notifyScrollEvent=document.createEvent?function(b){var g=document.createEvent("UIEvents");
g.initUIEvent("scroll",!1,!0,window,1);b.dispatchEvent(g)}:document.fireEvent?function(b){var g=document.createEventObject();b.fireEvent("onscroll");g.cancelBubble=!0}:function(){};f.hastranslate3d&&b.opt.enabletranslate3d?(this.setScrollTop=function(c,g){b.doc.translate.y=c;b.doc.translate.ty=-1*c+"px";b.doc.css(f.trstyle,"translate3d("+b.doc.translate.tx+","+b.doc.translate.ty+",0px)");g||b.notifyScrollEvent(b.win[0])},this.setScrollLeft=function(c,g){b.doc.translate.x=c;b.doc.translate.tx=-1*c+
"px";b.doc.css(f.trstyle,"translate3d("+b.doc.translate.tx+","+b.doc.translate.ty+",0px)");g||b.notifyScrollEvent(b.win[0])}):(this.setScrollTop=function(c,g){b.doc.translate.y=c;b.doc.translate.ty=-1*c+"px";b.doc.css(f.trstyle,"translate("+b.doc.translate.tx+","+b.doc.translate.ty+")");g||b.notifyScrollEvent(b.win[0])},this.setScrollLeft=function(c,g){b.doc.translate.x=c;b.doc.translate.tx=-1*c+"px";b.doc.css(f.trstyle,"translate("+b.doc.translate.tx+","+b.doc.translate.ty+")");g||b.notifyScrollEvent(b.win[0])})}else this.getScrollTop=
function(){return b.docscroll.scrollTop()},this.setScrollTop=function(c){return b.docscroll.scrollTop(c)},this.getScrollLeft=function(){return b.docscroll.scrollLeft()},this.setScrollLeft=function(c){return b.docscroll.scrollLeft(c)};this.getTarget=function(b){return!b?!1:b.target?b.target:b.srcElement?b.srcElement:!1};this.hasParent=function(b,g){if(!b)return!1;for(var d=b.target||b.srcElement||b||!1;d&&d.id!=g;)d=d.parentNode||!1;return!1!==d};var B={thin:1,medium:3,thick:5};this.getOffset=function(){if(b.isfixed)return{top:parseFloat(b.win.css("top")),
left:parseFloat(b.win.css("left"))};if(!b.viewport)return b.win.offset();var c=b.win.offset(),g=b.viewport.offset();return{top:c.top-g.top+b.viewport.scrollTop(),left:c.left-g.left+b.viewport.scrollLeft()}};this.updateScrollBar=function(c){if(b.ishwscroll)b.rail.css({height:b.win.innerHeight()}),b.railh&&b.railh.css({width:b.win.innerWidth()});else{var g=b.getOffset(),d=g.top,e=g.left,d=d+s(b.win,"border-top-width",!0);b.win.outerWidth();b.win.innerWidth();var e=e+(b.rail.align?b.win.outerWidth()-
s(b.win,"border-right-width")-b.rail.width:s(b.win,"border-left-width")),f=b.opt.railoffset;f&&(f.top&&(d+=f.top),b.rail.align&&f.left&&(e+=f.left));b.locked||b.rail.css({top:d,left:e,height:c?c.h:b.win.innerHeight()});b.zoom&&b.zoom.css({top:d+1,left:1==b.rail.align?e-20:e+b.rail.width+4});b.railh&&!b.locked&&(d=g.top,e=g.left,c=b.railh.align?d+s(b.win,"border-top-width",!0)+b.win.innerHeight()-b.railh.height:d+s(b.win,"border-top-width",!0),e+=s(b.win,"border-left-width"),b.railh.css({top:c,left:e,
width:b.railh.width}))}};this.doRailClick=function(c,g,d){var e;b.locked||(b.cancelEvent(c),g?(g=d?b.doScrollLeft:b.doScrollTop,e=d?(c.pageX-b.railh.offset().left-b.cursorwidth/2)*b.scrollratio.x:(c.pageY-b.rail.offset().top-b.cursorheight/2)*b.scrollratio.y,g(e)):(g=d?b.doScrollLeftBy:b.doScrollBy,e=d?b.scroll.x:b.scroll.y,c=d?c.pageX-b.railh.offset().left:c.pageY-b.rail.offset().top,d=d?b.view.w:b.view.h,e>=c?g(d):g(-d)))};b.hasanimationframe=w;b.hascancelanimationframe=x;b.hasanimationframe?b.hascancelanimationframe||
(x=function(){b.cancelAnimationFrame=!0}):(w=function(b){return setTimeout(b,15-Math.floor(+new Date/1E3)%16)},x=clearInterval);this.init=function(){b.saved.css=[];if(f.isie7mobile)return!0;f.hasmstouch&&b.css(b.ispage?e("html"):b.win,{"-ms-touch-action":"none"});b.zindex="auto";b.zindex=!b.ispage&&"auto"==b.opt.zindex?k()||"auto":b.opt.zindex;!b.ispage&&"auto"!=b.zindex&&b.zindex>C&&(C=b.zindex);b.isie&&(0==b.zindex&&"auto"==b.opt.zindex)&&(b.zindex="auto");if(!b.ispage||!f.cantouch&&!f.isieold&&
!f.isie9mobile){var c=b.docscroll;b.ispage&&(c=b.haswrapper?b.win:b.doc);f.isie9mobile||b.css(c,{"overflow-y":"hidden"});b.ispage&&f.isie7&&("BODY"==b.doc[0].nodeName?b.css(e("html"),{"overflow-y":"hidden"}):"HTML"==b.doc[0].nodeName&&b.css(e("body"),{"overflow-y":"hidden"}));f.isios&&(!b.ispage&&!b.haswrapper)&&b.css(e("body"),{"-webkit-overflow-scrolling":"touch"});var g=e(document.createElement("div"));g.css({position:"relative",top:0,"float":"right",width:b.opt.cursorwidth,height:"0px","background-color":b.opt.cursorcolor,
border:b.opt.cursorborder,"background-clip":"padding-box","-webkit-border-radius":b.opt.cursorborderradius,"-moz-border-radius":b.opt.cursorborderradius,"border-radius":b.opt.cursorborderradius});g.hborder=parseFloat(g.outerHeight()-g.innerHeight());b.cursor=g;var d=e(document.createElement("div"));d.attr("id",b.id);d.addClass("nicescroll-rails");var h,j,y=["left","right"],s;for(s in y)j=y[s],(h=b.opt.railpadding[j])?d.css("padding-"+j,h+"px"):b.opt.railpadding[j]=0;d.append(g);d.width=Math.max(parseFloat(b.opt.cursorwidth),
g.outerWidth())+b.opt.railpadding.left+b.opt.railpadding.right;d.css({width:d.width+"px",zIndex:b.zindex,background:b.opt.background,cursor:"default"});d.visibility=!0;d.scrollable=!0;d.align="left"==b.opt.railalign?0:1;b.rail=d;g=b.rail.drag=!1;b.opt.boxzoom&&(!b.ispage&&!f.isieold)&&(g=document.createElement("div"),b.bind(g,"click",b.doZoom),b.zoom=e(g),b.zoom.css({cursor:"pointer","z-index":b.zindex,backgroundImage:"url("+J+"zoomico.png)",height:18,width:18,backgroundPosition:"0px 0px"}),b.opt.dblclickzoom&&
b.bind(b.win,"dblclick",b.doZoom),f.cantouch&&b.opt.gesturezoom&&(b.ongesturezoom=function(c){1.5<c.scale&&b.doZoomIn(c);0.8>c.scale&&b.doZoomOut(c);return b.cancelEvent(c)},b.bind(b.win,"gestureend",b.ongesturezoom)));b.railh=!1;if(b.opt.horizrailenabled){b.css(c,{"overflow-x":"hidden"});g=e(document.createElement("div"));g.css({position:"relative",top:0,height:b.opt.cursorwidth,width:"0px","background-color":b.opt.cursorcolor,border:b.opt.cursorborder,"background-clip":"padding-box","-webkit-border-radius":b.opt.cursorborderradius,
"-moz-border-radius":b.opt.cursorborderradius,"border-radius":b.opt.cursorborderradius});g.wborder=parseFloat(g.outerWidth()-g.innerWidth());b.cursorh=g;var l=e(document.createElement("div"));l.attr("id",b.id+"-hr");l.addClass("nicescroll-rails");l.height=Math.max(parseFloat(b.opt.cursorwidth),g.outerHeight());l.css({height:l.height+"px",zIndex:b.zindex,background:b.opt.background});l.append(g);l.visibility=!0;l.scrollable=!0;l.align="top"==b.opt.railvalign?0:1;b.railh=l;b.railh.drag=!1}b.ispage?
(d.css({position:"fixed",top:"0px",height:"100%"}),d.align?d.css({right:"0px"}):d.css({left:"0px"}),b.body.append(d),b.railh&&(l.css({position:"fixed",left:"0px",width:"100%"}),l.align?l.css({bottom:"0px"}):l.css({top:"0px"}),b.body.append(l))):(b.ishwscroll?("static"==b.win.css("position")&&b.css(b.win,{position:"relative"}),c="HTML"==b.win[0].nodeName?b.body:b.win,b.zoom&&(b.zoom.css({position:"absolute",top:1,right:0,"margin-right":d.width+4}),c.append(b.zoom)),d.css({position:"absolute",top:0}),
d.align?d.css({right:0}):d.css({left:0}),c.append(d),l&&(l.css({position:"absolute",left:0,bottom:0}),l.align?l.css({bottom:0}):l.css({top:0}),c.append(l))):(b.isfixed="fixed"==b.win.css("position"),c=b.isfixed?"fixed":"absolute",b.isfixed||(b.viewport=b.getViewport(b.win[0])),b.viewport&&(b.body=b.viewport,!1==/relative|absolute/.test(b.viewport.css("position"))&&b.css(b.viewport,{position:"relative"})),d.css({position:c}),b.zoom&&b.zoom.css({position:c}),b.updateScrollBar(),b.body.append(d),b.zoom&&
b.body.append(b.zoom),b.railh&&(l.css({position:c}),b.body.append(l))),f.isios&&b.css(b.win,{"-webkit-tap-highlight-color":"rgba(0,0,0,0)","-webkit-touch-callout":"none"}),f.isie&&b.opt.disableoutline&&b.win.attr("hideFocus","true"),f.iswebkit&&b.opt.disableoutline&&b.win.css({outline:"none"}));!1===b.opt.autohidemode?(b.autohidedom=!1,b.rail.css({opacity:b.opt.cursoropacitymax}),b.railh&&b.railh.css({opacity:b.opt.cursoropacitymax})):!0===b.opt.autohidemode?(b.autohidedom=e().add(b.rail),f.isie8&&
(b.autohidedom=b.autohidedom.add(b.cursor)),b.railh&&(b.autohidedom=b.autohidedom.add(b.railh)),b.railh&&f.isie8&&(b.autohidedom=b.autohidedom.add(b.cursorh))):"scroll"==b.opt.autohidemode?(b.autohidedom=e().add(b.rail),b.railh&&(b.autohidedom=b.autohidedom.add(b.railh))):"cursor"==b.opt.autohidemode?(b.autohidedom=e().add(b.cursor),b.railh&&(b.autohidedom=b.autohidedom.add(b.cursorh))):"hidden"==b.opt.autohidemode&&(b.autohidedom=!1,b.hide(),b.locked=!1);if(f.isie9mobile)b.scrollmom=new L(b),b.onmangotouch=
function(){var c=b.getScrollTop(),d=b.getScrollLeft();if(c==b.scrollmom.lastscrolly&&d==b.scrollmom.lastscrollx)return!0;var g=c-b.mangotouch.sy,e=d-b.mangotouch.sx;if(0!=Math.round(Math.sqrt(Math.pow(e,2)+Math.pow(g,2)))){var f=0>g?-1:1,p=0>e?-1:1,h=+new Date;b.mangotouch.lazy&&clearTimeout(b.mangotouch.lazy);80<h-b.mangotouch.tm||b.mangotouch.dry!=f||b.mangotouch.drx!=p?(b.scrollmom.stop(),b.scrollmom.reset(d,c),b.mangotouch.sy=c,b.mangotouch.ly=c,b.mangotouch.sx=d,b.mangotouch.lx=d,b.mangotouch.dry=
f,b.mangotouch.drx=p,b.mangotouch.tm=h):(b.scrollmom.stop(),b.scrollmom.update(b.mangotouch.sx-e,b.mangotouch.sy-g),b.mangotouch.tm=h,g=Math.max(Math.abs(b.mangotouch.ly-c),Math.abs(b.mangotouch.lx-d)),b.mangotouch.ly=c,b.mangotouch.lx=d,2<g&&(b.mangotouch.lazy=setTimeout(function(){b.mangotouch.lazy=!1;b.mangotouch.dry=0;b.mangotouch.drx=0;b.mangotouch.tm=0;b.scrollmom.doMomentum(30)},100)))}},d=b.getScrollTop(),l=b.getScrollLeft(),b.mangotouch={sy:d,ly:d,dry:0,sx:l,lx:l,drx:0,lazy:!1,tm:0},b.bind(b.docscroll,
"scroll",b.onmangotouch);else{if(f.cantouch||b.istouchcapable||b.opt.touchbehavior||f.hasmstouch){b.scrollmom=new L(b);b.ontouchstart=function(c){if(c.pointerType&&2!=c.pointerType)return!1;if(!b.locked){if(f.hasmstouch)for(var d=c.target?c.target:!1;d;){var g=e(d).getNiceScroll();if(0<g.length&&g[0].me==b.me)break;if(0<g.length)return!1;if("DIV"==d.nodeName&&d.id==b.id)break;d=d.parentNode?d.parentNode:!1}b.cancelScroll();if((d=b.getTarget(c))&&/INPUT/i.test(d.nodeName)&&/range/i.test(d.type))return b.stopPropagation(c);
!("clientX"in c)&&"changedTouches"in c&&(c.clientX=c.changedTouches[0].clientX,c.clientY=c.changedTouches[0].clientY);b.forcescreen&&(g=c,c={original:c.original?c.original:c},c.clientX=g.screenX,c.clientY=g.screenY);b.rail.drag={x:c.clientX,y:c.clientY,sx:b.scroll.x,sy:b.scroll.y,st:b.getScrollTop(),sl:b.getScrollLeft(),pt:2,dl:!1};if(b.ispage||!b.opt.directionlockdeadzone)b.rail.drag.dl="f";else{var g=e(window).width(),p=e(window).height(),h=Math.max(document.body.scrollWidth,document.documentElement.scrollWidth),
k=Math.max(document.body.scrollHeight,document.documentElement.scrollHeight),p=Math.max(0,k-p),g=Math.max(0,h-g);b.rail.drag.ck=!b.rail.scrollable&&b.railh.scrollable?0<p?"v":!1:b.rail.scrollable&&!b.railh.scrollable?0<g?"h":!1:!1;b.rail.drag.ck||(b.rail.drag.dl="f")}b.opt.touchbehavior&&(b.isiframe&&f.isie)&&(g=b.win.position(),b.rail.drag.x+=g.left,b.rail.drag.y+=g.top);b.hasmoving=!1;b.lastmouseup=!1;b.scrollmom.reset(c.clientX,c.clientY);if(!f.cantouch&&!this.istouchcapable&&!f.hasmstouch){if(!d||
!/INPUT|SELECT|TEXTAREA/i.test(d.nodeName))return!b.ispage&&f.hasmousecapture&&d.setCapture(),b.cancelEvent(c);/SUBMIT|CANCEL|BUTTON/i.test(e(d).attr("type"))&&(pc={tg:d,click:!1},b.preventclick=pc)}}};b.ontouchend=function(c){if(c.pointerType&&2!=c.pointerType)return!1;if(b.rail.drag&&2==b.rail.drag.pt&&(b.scrollmom.doMomentum(),b.rail.drag=!1,b.hasmoving&&(b.hasmoving=!1,b.lastmouseup=!0,b.hideCursor(),f.hasmousecapture&&document.releaseCapture(),!f.cantouch)))return b.cancelEvent(c)};var n=b.opt.touchbehavior&&
b.isiframe&&!f.hasmousecapture;b.ontouchmove=function(c,d){if(c.pointerType&&2!=c.pointerType)return!1;if(b.rail.drag&&2==b.rail.drag.pt){if(f.cantouch&&"undefined"==typeof c.original)return!0;b.hasmoving=!0;b.preventclick&&!b.preventclick.click&&(b.preventclick.click=b.preventclick.tg.onclick||!1,b.preventclick.tg.onclick=b.onpreventclick);c=e.extend({original:c},c);"changedTouches"in c&&(c.clientX=c.changedTouches[0].clientX,c.clientY=c.changedTouches[0].clientY);if(b.forcescreen){var g=c;c={original:c.original?
c.original:c};c.clientX=g.screenX;c.clientY=g.screenY}g=ofy=0;if(n&&!d){var p=b.win.position(),g=-p.left;ofy=-p.top}var h=c.clientY+ofy,p=h-b.rail.drag.y,k=c.clientX+g,j=k-b.rail.drag.x,t=b.rail.drag.st-p;b.ishwscroll&&b.opt.bouncescroll?0>t?t=Math.round(t/2):t>b.page.maxh&&(t=b.page.maxh+Math.round((t-b.page.maxh)/2)):(0>t&&(h=t=0),t>b.page.maxh&&(t=b.page.maxh,h=0));if(b.railh&&b.railh.scrollable){var l=b.rail.drag.sl-j;b.ishwscroll&&b.opt.bouncescroll?0>l?l=Math.round(l/2):l>b.page.maxw&&(l=b.page.maxw+
Math.round((l-b.page.maxw)/2)):(0>l&&(k=l=0),l>b.page.maxw&&(l=b.page.maxw,k=0))}g=!1;if(b.rail.drag.dl)g=!0,"v"==b.rail.drag.dl?l=b.rail.drag.sl:"h"==b.rail.drag.dl&&(t=b.rail.drag.st);else{var p=Math.abs(p),j=Math.abs(j),y=b.opt.directionlockdeadzone;if("v"==b.rail.drag.ck){if(p>y&&j<=0.3*p)return b.rail.drag=!1,!0;j>y&&(b.rail.drag.dl="f",e("body").scrollTop(e("body").scrollTop()))}else if("h"==b.rail.drag.ck){if(j>y&&p<=0.3*az)return b.rail.drag=!1,!0;p>y&&(b.rail.drag.dl="f",e("body").scrollLeft(e("body").scrollLeft()))}}b.synched("touchmove",
function(){b.rail.drag&&2==b.rail.drag.pt&&(b.prepareTransition&&b.prepareTransition(0),b.rail.scrollable&&b.setScrollTop(t),b.scrollmom.update(k,h),b.railh&&b.railh.scrollable?(b.setScrollLeft(l),b.showCursor(t,l)):b.showCursor(t),f.isie10&&document.selection.clear())});f.ischrome&&b.istouchcapable&&(g=!1);if(g)return b.cancelEvent(c)}}}b.onmousedown=function(c,d){if(!(b.rail.drag&&1!=b.rail.drag.pt)){if(b.locked)return b.cancelEvent(c);b.cancelScroll();b.rail.drag={x:c.clientX,y:c.clientY,sx:b.scroll.x,
sy:b.scroll.y,pt:1,hr:!!d};var g=b.getTarget(c);!b.ispage&&f.hasmousecapture&&g.setCapture();b.isiframe&&!f.hasmousecapture&&(b.saved.csspointerevents=b.doc.css("pointer-events"),b.css(b.doc,{"pointer-events":"none"}));return b.cancelEvent(c)}};b.onmouseup=function(c){if(b.rail.drag&&(f.hasmousecapture&&document.releaseCapture(),b.isiframe&&!f.hasmousecapture&&b.doc.css("pointer-events",b.saved.csspointerevents),1==b.rail.drag.pt))return b.rail.drag=!1,b.cancelEvent(c)};b.onmousemove=function(c){if(b.rail.drag&&
1==b.rail.drag.pt){if(f.ischrome&&0==c.which)return b.onmouseup(c);b.cursorfreezed=!0;if(b.rail.drag.hr){b.scroll.x=b.rail.drag.sx+(c.clientX-b.rail.drag.x);0>b.scroll.x&&(b.scroll.x=0);var d=b.scrollvaluemaxw;b.scroll.x>d&&(b.scroll.x=d)}else b.scroll.y=b.rail.drag.sy+(c.clientY-b.rail.drag.y),0>b.scroll.y&&(b.scroll.y=0),d=b.scrollvaluemax,b.scroll.y>d&&(b.scroll.y=d);b.synched("mousemove",function(){b.rail.drag&&1==b.rail.drag.pt&&(b.showCursor(),b.rail.drag.hr?b.doScrollLeft(Math.round(b.scroll.x*
b.scrollratio.x),b.opt.cursordragspeed):b.doScrollTop(Math.round(b.scroll.y*b.scrollratio.y),b.opt.cursordragspeed))});return b.cancelEvent(c)}};if(f.cantouch||b.opt.touchbehavior)b.onpreventclick=function(c){if(b.preventclick)return b.preventclick.tg.onclick=b.preventclick.click,b.preventclick=!1,b.cancelEvent(c)},b.bind(b.win,"mousedown",b.ontouchstart),b.onclick=f.isios?!1:function(c){return b.lastmouseup?(b.lastmouseup=!1,b.cancelEvent(c)):!0},b.opt.grabcursorenabled&&f.cursorgrabvalue&&(b.css(b.ispage?
b.doc:b.win,{cursor:f.cursorgrabvalue}),b.css(b.rail,{cursor:f.cursorgrabvalue}));else{var m=function(c){if(b.selectiondrag){if(c){var d=b.win.outerHeight();c=c.pageY-b.selectiondrag.top;0<c&&c<d&&(c=0);c>=d&&(c-=d);b.selectiondrag.df=c}0!=b.selectiondrag.df&&(b.doScrollBy(2*-Math.floor(b.selectiondrag.df/6)),b.debounced("doselectionscroll",function(){m()},50))}};b.hasTextSelected="getSelection"in document?function(){return 0<document.getSelection().rangeCount}:"selection"in document?function(){return"None"!=
document.selection.type}:function(){return!1};b.onselectionstart=function(){b.ispage||(b.selectiondrag=b.win.offset())};b.onselectionend=function(){b.selectiondrag=!1};b.onselectiondrag=function(c){b.selectiondrag&&b.hasTextSelected()&&b.debounced("selectionscroll",function(){m(c)},250)}}f.hasmstouch&&(b.css(b.rail,{"-ms-touch-action":"none"}),b.css(b.cursor,{"-ms-touch-action":"none"}),b.bind(b.win,"MSPointerDown",b.ontouchstart),b.bind(document,"MSPointerUp",b.ontouchend),b.bind(document,"MSPointerMove",
b.ontouchmove),b.bind(b.cursor,"MSGestureHold",function(b){b.preventDefault()}),b.bind(b.cursor,"contextmenu",function(b){b.preventDefault()}));this.istouchcapable&&(b.bind(b.win,"touchstart",b.ontouchstart),b.bind(document,"touchend",b.ontouchend),b.bind(document,"touchcancel",b.ontouchend),b.bind(document,"touchmove",b.ontouchmove));b.bind(b.cursor,"mousedown",b.onmousedown);b.bind(b.cursor,"mouseup",b.onmouseup);b.railh&&(b.bind(b.cursorh,"mousedown",function(c){b.onmousedown(c,!0)}),b.bind(b.cursorh,
"mouseup",function(c){if(!(b.rail.drag&&2==b.rail.drag.pt))return b.rail.drag=!1,b.hasmoving=!1,b.hideCursor(),f.hasmousecapture&&document.releaseCapture(),b.cancelEvent(c)}));if(b.opt.cursordragontouch||!f.cantouch&&!b.opt.touchbehavior)b.rail.css({cursor:"default"}),b.railh&&b.railh.css({cursor:"default"}),b.jqbind(b.rail,"mouseenter",function(){b.canshowonmouseevent&&b.showCursor();b.rail.active=!0}),b.jqbind(b.rail,"mouseleave",function(){b.rail.active=!1;b.rail.drag||b.hideCursor()}),b.opt.sensitiverail&&
(b.bind(b.rail,"click",function(c){b.doRailClick(c,!1,!1)}),b.bind(b.rail,"dblclick",function(c){b.doRailClick(c,!0,!1)}),b.bind(b.cursor,"click",function(c){b.cancelEvent(c)}),b.bind(b.cursor,"dblclick",function(c){b.cancelEvent(c)})),b.railh&&(b.jqbind(b.railh,"mouseenter",function(){b.canshowonmouseevent&&b.showCursor();b.rail.active=!0}),b.jqbind(b.railh,"mouseleave",function(){b.rail.active=!1;b.rail.drag||b.hideCursor()}),b.opt.sensitiverail&&(b.bind(b.railh,"click",function(c){b.doRailClick(c,
!1,!0)}),b.bind(b.railh,"dblclick",function(c){b.doRailClick(c,!0,!0)}),b.bind(b.cursorh,"click",function(c){b.cancelEvent(c)}),b.bind(b.cursorh,"dblclick",function(c){b.cancelEvent(c)})));!f.cantouch&&!b.opt.touchbehavior?(b.bind(f.hasmousecapture?b.win:document,"mouseup",b.onmouseup),b.bind(document,"mousemove",b.onmousemove),b.onclick&&b.bind(document,"click",b.onclick),!b.ispage&&b.opt.enablescrollonselection&&(b.bind(b.win[0],"mousedown",b.onselectionstart),b.bind(document,"mouseup",b.onselectionend),
b.bind(b.cursor,"mouseup",b.onselectionend),b.cursorh&&b.bind(b.cursorh,"mouseup",b.onselectionend),b.bind(document,"mousemove",b.onselectiondrag)),b.zoom&&(b.jqbind(b.zoom,"mouseenter",function(){b.canshowonmouseevent&&b.showCursor();b.rail.active=!0}),b.jqbind(b.zoom,"mouseleave",function(){b.rail.active=!1;b.rail.drag||b.hideCursor()}))):(b.bind(f.hasmousecapture?b.win:document,"mouseup",b.ontouchend),b.bind(document,"mousemove",b.ontouchmove),b.onclick&&b.bind(document,"click",b.onclick),b.opt.cursordragontouch&&
(b.bind(b.cursor,"mousedown",b.onmousedown),b.bind(b.cursor,"mousemove",b.onmousemove),b.cursorh&&b.bind(b.cursorh,"mousedown",b.onmousedown),b.cursorh&&b.bind(b.cursorh,"mousemove",b.onmousemove)));b.opt.enablemousewheel&&(b.isiframe||b.bind(f.isie&&b.ispage?document:b.docscroll,"mousewheel",b.onmousewheel),b.bind(b.rail,"mousewheel",b.onmousewheel),b.railh&&b.bind(b.railh,"mousewheel",b.onmousewheelhr));!b.ispage&&(!f.cantouch&&!/HTML|BODY/.test(b.win[0].nodeName))&&(b.win.attr("tabindex")||b.win.attr({tabindex:N++}),
b.jqbind(b.win,"focus",function(c){D=b.getTarget(c).id||!0;b.hasfocus=!0;b.canshowonmouseevent&&b.noticeCursor()}),b.jqbind(b.win,"blur",function(){D=!1;b.hasfocus=!1}),b.jqbind(b.win,"mouseenter",function(c){G=b.getTarget(c).id||!0;b.hasmousefocus=!0;b.canshowonmouseevent&&b.noticeCursor()}),b.jqbind(b.win,"mouseleave",function(){G=!1;b.hasmousefocus=!1}))}b.onkeypress=function(c){if(b.locked&&0==b.page.maxh)return!0;c=c?c:window.e;var d=b.getTarget(c);if(d&&/INPUT|TEXTAREA|SELECT|OPTION/.test(d.nodeName)&&
(!d.getAttribute("type")&&!d.type||!/submit|button|cancel/i.tp))return!0;if(b.hasfocus||b.hasmousefocus&&!D||b.ispage&&!D&&!G){d=c.keyCode;if(b.locked&&27!=d)return b.cancelEvent(c);var g=c.ctrlKey||!1,e=c.shiftKey||!1,f=!1;switch(d){case 38:case 63233:b.doScrollBy(72);f=!0;break;case 40:case 63235:b.doScrollBy(-72);f=!0;break;case 37:case 63232:b.railh&&(g?b.doScrollLeft(0):b.doScrollLeftBy(72),f=!0);break;case 39:case 63234:b.railh&&(g?b.doScrollLeft(b.page.maxw):b.doScrollLeftBy(-72),f=!0);break;
case 33:case 63276:b.doScrollBy(b.view.h);f=!0;break;case 34:case 63277:b.doScrollBy(-b.view.h);f=!0;break;case 36:case 63273:b.railh&&g?b.doScrollPos(0,0):b.doScrollTo(0);f=!0;break;case 35:case 63275:b.railh&&g?b.doScrollPos(b.page.maxw,b.page.maxh):b.doScrollTo(b.page.maxh);f=!0;break;case 32:b.opt.spacebarenabled&&(e?b.doScrollBy(b.view.h):b.doScrollBy(-b.view.h),f=!0);break;case 27:b.zoomactive&&(b.doZoom(),f=!0)}if(f)return b.cancelEvent(c)}};b.opt.enablekeyboard&&b.bind(document,f.isopera&&
!f.isopera12?"keypress":"keydown",b.onkeypress);b.bind(window,"resize",b.lazyResize);b.bind(window,"orientationchange",b.lazyResize);b.bind(window,"load",b.lazyResize);if(f.ischrome&&!b.ispage&&!b.haswrapper){var r=b.win.attr("style"),d=parseFloat(b.win.css("width"))+1;b.win.css("width",d);b.synched("chromefix",function(){b.win.attr("style",r)})}b.onAttributeChange=function(){b.lazyResize(250)};!b.ispage&&!b.haswrapper&&(!1!==E?(b.observer=new E(function(c){c.forEach(b.onAttributeChange)}),b.observer.observe(b.win[0],
{childList:!0,characterData:!1,attributes:!0,subtree:!1}),b.observerremover=new E(function(c){c.forEach(function(c){if(0<c.removedNodes.length)for(var d in c.removedNodes)if(c.removedNodes[d]==b.win[0])return b.remove()})}),b.observerremover.observe(b.win[0].parentNode,{childList:!0,characterData:!1,attributes:!1,subtree:!1})):(b.bind(b.win,f.isie&&!f.isie9?"propertychange":"DOMAttrModified",b.onAttributeChange),f.isie9&&b.win[0].attachEvent("onpropertychange",b.onAttributeChange),b.bind(b.win,"DOMNodeRemoved",
function(c){c.target==b.win[0]&&b.remove()})));!b.ispage&&b.opt.boxzoom&&b.bind(window,"resize",b.resizeZoom);b.istextarea&&b.bind(b.win,"mouseup",b.lazyResize);b.checkrtlmode=!0;b.lazyResize(30)}if("IFRAME"==this.doc[0].nodeName){var q=function(){b.iframexd=!1;try{var c="contentDocument"in this?this.contentDocument:this.contentWindow.document}catch(d){b.iframexd=!0,c=!1}if(b.iframexd)return"console"in window&&console.log("NiceScroll error: policy restriced iframe"),!0;b.forcescreen=!0;b.isiframe&&
(b.iframe={doc:e(c),html:b.doc.contents().find("html")[0],body:b.doc.contents().find("body")[0]},b.getContentSize=function(){return{w:Math.max(b.iframe.html.scrollWidth,b.iframe.body.scrollWidth),h:Math.max(b.iframe.html.scrollHeight,b.iframe.body.scrollHeight)}},b.docscroll=e(b.iframe.body));if(!f.isios&&b.opt.iframeautoresize&&!b.isiframe){b.win.scrollTop(0);b.doc.height("");var g=Math.max(c.getElementsByTagName("html")[0].scrollHeight,c.body.scrollHeight);b.doc.height(g)}b.lazyResize(30);f.isie7&&
b.css(e(b.iframe.html),{"overflow-y":"hidden"});b.css(e(b.iframe.body),{"overflow-y":"hidden"});"contentWindow"in this?b.bind(this.contentWindow,"scroll",b.onscroll):b.bind(c,"scroll",b.onscroll);b.opt.enablemousewheel&&b.bind(c,"mousewheel",b.onmousewheel);b.opt.enablekeyboard&&b.bind(c,f.isopera?"keypress":"keydown",b.onkeypress);if(f.cantouch||b.opt.touchbehavior)b.bind(c,"mousedown",b.onmousedown),b.bind(c,"mousemove",function(c){b.onmousemove(c,!0)}),b.opt.grabcursorenabled&&f.cursorgrabvalue&&
b.css(e(c.body),{cursor:f.cursorgrabvalue});b.bind(c,"mouseup",b.onmouseup);b.zoom&&(b.opt.dblclickzoom&&b.bind(c,"dblclick",b.doZoom),b.ongesturezoom&&b.bind(c,"gestureend",b.ongesturezoom))};this.doc[0].readyState&&"complete"==this.doc[0].readyState&&setTimeout(function(){q.call(b.doc[0],!1)},500);b.bind(this.doc,"load",q)}};this.showCursor=function(c,d){b.cursortimeout&&(clearTimeout(b.cursortimeout),b.cursortimeout=0);if(b.rail){b.autohidedom&&(b.autohidedom.stop().css({opacity:b.opt.cursoropacitymax}),
b.cursoractive=!0);if(!b.rail.drag||1!=b.rail.drag.pt)"undefined"!=typeof c&&!1!==c&&(b.scroll.y=Math.round(1*c/b.scrollratio.y)),"undefined"!=typeof d&&(b.scroll.x=Math.round(1*d/b.scrollratio.x));b.cursor.css({height:b.cursorheight,top:b.scroll.y});b.cursorh&&(!b.rail.align&&b.rail.visibility?b.cursorh.css({width:b.cursorwidth,left:b.scroll.x+b.rail.width}):b.cursorh.css({width:b.cursorwidth,left:b.scroll.x}),b.cursoractive=!0);b.zoom&&b.zoom.stop().css({opacity:b.opt.cursoropacitymax})}};this.hideCursor=
function(c){!b.cursortimeout&&(b.rail&&b.autohidedom)&&(b.cursortimeout=setTimeout(function(){if(!b.rail.active||!b.showonmouseevent)b.autohidedom.stop().animate({opacity:b.opt.cursoropacitymin}),b.zoom&&b.zoom.stop().animate({opacity:b.opt.cursoropacitymin}),b.cursoractive=!1;b.cursortimeout=0},c||b.opt.hidecursordelay))};this.noticeCursor=function(c,d,e){b.showCursor(d,e);b.rail.active||b.hideCursor(c)};this.getContentSize=b.ispage?function(){return{w:Math.max(document.body.scrollWidth,document.documentElement.scrollWidth),
h:Math.max(document.body.scrollHeight,document.documentElement.scrollHeight)}}:b.haswrapper?function(){return{w:b.doc.outerWidth()+parseInt(b.win.css("paddingLeft"))+parseInt(b.win.css("paddingRight")),h:b.doc.outerHeight()+parseInt(b.win.css("paddingTop"))+parseInt(b.win.css("paddingBottom"))}}:function(){return{w:b.docscroll[0].scrollWidth,h:b.docscroll[0].scrollHeight}};this.onResize=function(c,d){if(!b.win)return!1;if(!b.haswrapper&&!b.ispage){if("none"==b.win.css("display"))return b.visibility&&
b.hideRail().hideRailHr(),!1;!b.hidden&&!b.visibility&&b.showRail().showRailHr()}var e=b.page.maxh,f=b.page.maxw,h=b.view.w;b.view={w:b.ispage?b.win.width():parseInt(b.win[0].clientWidth),h:b.ispage?b.win.height():parseInt(b.win[0].clientHeight)};b.page=d?d:b.getContentSize();b.page.maxh=Math.max(0,b.page.h-b.view.h);b.page.maxw=Math.max(0,b.page.w-b.view.w);if(b.page.maxh==e&&b.page.maxw==f&&b.view.w==h){if(b.ispage)return b;e=b.win.offset();if(b.lastposition&&(f=b.lastposition,f.top==e.top&&f.left==
e.left))return b;b.lastposition=e}0==b.page.maxh?(b.hideRail(),b.scrollvaluemax=0,b.scroll.y=0,b.scrollratio.y=0,b.cursorheight=0,b.setScrollTop(0),b.rail.scrollable=!1):b.rail.scrollable=!0;0==b.page.maxw?(b.hideRailHr(),b.scrollvaluemaxw=0,b.scroll.x=0,b.scrollratio.x=0,b.cursorwidth=0,b.setScrollLeft(0),b.railh.scrollable=!1):b.railh.scrollable=!0;b.locked=0==b.page.maxh&&0==b.page.maxw;if(b.locked)return b.ispage||b.updateScrollBar(b.view),!1;!b.hidden&&!b.visibility?b.showRail().showRailHr():
!b.hidden&&!b.railh.visibility&&b.showRailHr();b.istextarea&&(b.win.css("resize")&&"none"!=b.win.css("resize"))&&(b.view.h-=20);b.cursorheight=Math.min(b.view.h,Math.round(b.view.h*(b.view.h/b.page.h)));b.cursorheight=b.opt.cursorfixedheight?b.opt.cursorfixedheight:Math.max(b.opt.cursorminheight,b.cursorheight);b.cursorwidth=Math.min(b.view.w,Math.round(b.view.w*(b.view.w/b.page.w)));b.cursorwidth=b.opt.cursorfixedheight?b.opt.cursorfixedheight:Math.max(b.opt.cursorminheight,b.cursorwidth);b.scrollvaluemax=
b.view.h-b.cursorheight-b.cursor.hborder;b.railh&&(b.railh.width=0<b.page.maxh?b.view.w-b.rail.width:b.view.w,b.scrollvaluemaxw=b.railh.width-b.cursorwidth-b.cursorh.wborder);b.checkrtlmode&&b.railh&&(b.checkrtlmode=!1,b.opt.rtlmode&&0==b.scroll.x&&b.setScrollLeft(b.page.maxw));b.ispage||b.updateScrollBar(b.view);b.scrollratio={x:b.page.maxw/b.scrollvaluemaxw,y:b.page.maxh/b.scrollvaluemax};b.getScrollTop()>b.page.maxh?b.doScrollTop(b.page.maxh):(b.scroll.y=Math.round(b.getScrollTop()*(1/b.scrollratio.y)),
b.scroll.x=Math.round(b.getScrollLeft()*(1/b.scrollratio.x)),b.cursoractive&&b.noticeCursor());b.scroll.y&&0==b.getScrollTop()&&b.doScrollTo(Math.floor(b.scroll.y*b.scrollratio.y));return b};this.resize=b.onResize;this.lazyResize=function(c){c=isNaN(c)?30:c;b.delayed("resize",b.resize,c);return b};this._bind=function(c,d,e,f){b.events.push({e:c,n:d,f:e,b:f,q:!1});c.addEventListener?c.addEventListener(d,e,f||!1):c.attachEvent?c.attachEvent("on"+d,e):c["on"+d]=e};this.jqbind=function(c,d,f){b.events.push({e:c,
n:d,f:f,q:!0});e(c).bind(d,f)};this.bind=function(c,d,e,h){var k="jquery"in c?c[0]:c;"mousewheel"==d?"onwheel"in b.win?b._bind(k,"wheel",e,h||!1):(c="undefined"!=typeof document.onmousewheel?"mousewheel":"DOMMouseScroll",n(k,c,e,h||!1),"DOMMouseScroll"==c&&n(k,"MozMousePixelScroll",e,h||!1)):k.addEventListener?(f.cantouch&&/mouseup|mousedown|mousemove/.test(d)&&b._bind(k,"mousedown"==d?"touchstart":"mouseup"==d?"touchend":"touchmove",function(b){if(b.touches){if(2>b.touches.length){var c=b.touches.length?
b.touches[0]:b;c.original=b;e.call(this,c)}}else b.changedTouches&&(c=b.changedTouches[0],c.original=b,e.call(this,c))},h||!1),b._bind(k,d,e,h||!1),f.cantouch&&"mouseup"==d&&b._bind(k,"touchcancel",e,h||!1)):b._bind(k,d,function(c){if((c=c||window.event||!1)&&c.srcElement)c.target=c.srcElement;"pageY"in c||(c.pageX=c.clientX+document.documentElement.scrollLeft,c.pageY=c.clientY+document.documentElement.scrollTop);return!1===e.call(k,c)||!1===h?b.cancelEvent(c):!0})};this._unbind=function(b,d,e,f){b.removeEventListener?
b.removeEventListener(d,e,f):b.detachEvent?b.detachEvent("on"+d,e):b["on"+d]=!1};this.unbindAll=function(){for(var c=0;c<b.events.length;c++){var d=b.events[c];d.q?d.e.unbind(d.n,d.f):b._unbind(d.e,d.n,d.f,d.b)}};this.cancelEvent=function(b){b=b.original?b.original:b?b:window.event||!1;if(!b)return!1;b.preventDefault&&b.preventDefault();b.stopPropagation&&b.stopPropagation();b.preventManipulation&&b.preventManipulation();b.cancelBubble=!0;b.cancel=!0;return b.returnValue=!1};this.stopPropagation=
function(b){b=b.original?b.original:b?b:window.event||!1;if(!b)return!1;if(b.stopPropagation)return b.stopPropagation();b.cancelBubble&&(b.cancelBubble=!0);return!1};this.showRail=function(){if(0!=b.page.maxh&&(b.ispage||"none"!=b.win.css("display")))b.visibility=!0,b.rail.visibility=!0,b.rail.css("display","block");return b};this.showRailHr=function(){if(!b.railh)return b;if(0!=b.page.maxw&&(b.ispage||"none"!=b.win.css("display")))b.railh.visibility=!0,b.railh.css("display","block");return b};this.hideRail=
function(){b.visibility=!1;b.rail.visibility=!1;b.rail.css("display","none");return b};this.hideRailHr=function(){if(!b.railh)return b;b.railh.visibility=!1;b.railh.css("display","none");return b};this.show=function(){b.hidden=!1;b.locked=!1;return b.showRail().showRailHr()};this.hide=function(){b.hidden=!0;b.locked=!0;return b.hideRail().hideRailHr()};this.toggle=function(){return b.hidden?b.show():b.hide()};this.remove=function(){b.stop();b.cursortimeout&&clearTimeout(b.cursortimeout);b.doZoomOut();
b.unbindAll();!1!==b.observer&&b.observer.disconnect();!1!==b.observerremover&&b.observerremover.disconnect();b.events=[];b.cursor&&b.cursor.remove();b.cursorh&&b.cursorh.remove();b.rail&&b.rail.remove();b.railh&&b.railh.remove();b.zoom&&b.zoom.remove();for(var c=0;c<b.saved.css.length;c++){var d=b.saved.css[c];d[0].css(d[1],"undefined"==typeof d[2]?"":d[2])}b.saved=!1;b.me.data("__nicescroll","");e.nicescroll.remove(b);for(var f in b)b[f]=null,delete b[f];b=null};this.scrollstart=function(c){this.onscrollstart=
c;return b};this.scrollend=function(c){this.onscrollend=c;return b};this.scrollcancel=function(c){this.onscrollcancel=c;return b};this.zoomin=function(c){this.onzoomin=c;return b};this.zoomout=function(c){this.onzoomout=c;return b};this.isScrollable=function(b){b=b.target?b.target:b;if("OPTION"==b.nodeName)return!0;for(;b&&1==b.nodeType&&!/BODY|HTML/.test(b.nodeName);){var d=e(b),d=d.css("overflowY")||d.css("overflowX")||d.css("overflow")||"";if(/scroll|auto/.test(d))return b.clientHeight!=b.scrollHeight;
b=b.parentNode?b.parentNode:!1}return!1};this.getViewport=function(b){for(b=b&&b.parentNode?b.parentNode:!1;b&&1==b.nodeType&&!/BODY|HTML/.test(b.nodeName);){var d=e(b),f=d.css("overflowY")||d.css("overflowX")||d.css("overflow")||"";if(/scroll|auto/.test(f)&&b.clientHeight!=b.scrollHeight||0<d.getNiceScroll().length)return d;b=b.parentNode?b.parentNode:!1}return!1};this.onmousewheel=function(c){if(b.locked)return!0;if(b.rail.drag)return b.cancelEvent(c);if(!b.rail.scrollable)return b.railh&&b.railh.scrollable?
b.onmousewheelhr(c):!0;var d=+new Date,e=!1;b.opt.preservenativescrolling&&b.checkarea+600<d&&(b.nativescrollingarea=b.isScrollable(c),e=!0);b.checkarea=d;if(b.nativescrollingarea)return!0;if(c=v(c,!1,e))b.checkarea=0;return c};this.onmousewheelhr=function(c){if(b.locked||!b.railh.scrollable)return!0;if(b.rail.drag)return b.cancelEvent(c);var d=+new Date,e=!1;b.opt.preservenativescrolling&&b.checkarea+600<d&&(b.nativescrollingarea=b.isScrollable(c),e=!0);b.checkarea=d;return b.nativescrollingarea?
!0:b.locked?b.cancelEvent(c):v(c,!0,e)};this.stop=function(){b.cancelScroll();b.scrollmon&&b.scrollmon.stop();b.cursorfreezed=!1;b.scroll.y=Math.round(b.getScrollTop()*(1/b.scrollratio.y));b.noticeCursor();return b};this.getTransitionSpeed=function(c){var d=Math.round(10*b.opt.scrollspeed);c=Math.min(d,Math.round(c/20*b.opt.scrollspeed));return 20<c?c:0};b.opt.smoothscroll?b.ishwscroll&&f.hastransition&&b.opt.usetransition?(this.prepareTransition=function(c,d){var e=d?20<c?c:0:b.getTransitionSpeed(c),
h=e?f.prefixstyle+"transform "+e+"ms ease-out":"";if(!b.lasttransitionstyle||b.lasttransitionstyle!=h)b.lasttransitionstyle=h,b.doc.css(f.transitionstyle,h);return e},this.doScrollLeft=function(c,d){var e=b.scrollrunning?b.newscrolly:b.getScrollTop();b.doScrollPos(c,e,d)},this.doScrollTop=function(c,d){var e=b.scrollrunning?b.newscrollx:b.getScrollLeft();b.doScrollPos(e,c,d)},this.doScrollPos=function(c,d,e){var h=b.getScrollTop(),k=b.getScrollLeft();(0>(b.newscrolly-h)*(d-h)||0>(b.newscrollx-k)*
(c-k))&&b.cancelScroll();!1==b.opt.bouncescroll&&(0>d?d=0:d>b.page.maxh&&(d=b.page.maxh),0>c?c=0:c>b.page.maxw&&(c=b.page.maxw));if(b.scrollrunning&&c==b.newscrollx&&d==b.newscrolly)return!1;b.newscrolly=d;b.newscrollx=c;b.newscrollspeed=e||!1;if(b.timer)return!1;b.timer=setTimeout(function(){var e=b.getScrollTop(),h=b.getScrollLeft(),k,p;k=c-h;p=d-e;k=Math.round(Math.sqrt(Math.pow(k,2)+Math.pow(p,2)));k=b.newscrollspeed&&1<b.newscrollspeed?b.newscrollspeed:b.getTransitionSpeed(k);b.newscrollspeed&&
1>=b.newscrollspeed&&(k*=b.newscrollspeed);b.prepareTransition(k,!0);b.timerscroll&&b.timerscroll.tm&&clearInterval(b.timerscroll.tm);0<k&&(!b.scrollrunning&&b.onscrollstart&&b.onscrollstart.call(b,{type:"scrollstart",current:{x:h,y:e},request:{x:c,y:d},end:{x:b.newscrollx,y:b.newscrolly},speed:k}),f.transitionend?b.scrollendtrapped||(b.scrollendtrapped=!0,b.bind(b.doc,f.transitionend,b.onScrollEnd,!1)):(b.scrollendtrapped&&clearTimeout(b.scrollendtrapped),b.scrollendtrapped=setTimeout(b.onScrollEnd,
k)),b.timerscroll={bz:new BezierClass(e,b.newscrolly,k,0,0,0.58,1),bh:new BezierClass(h,b.newscrollx,k,0,0,0.58,1)},b.cursorfreezed||(b.timerscroll.tm=setInterval(function(){b.showCursor(b.getScrollTop(),b.getScrollLeft())},60)));b.synched("doScroll-set",function(){b.timer=0;b.scrollendtrapped&&(b.scrollrunning=!0);b.setScrollTop(b.newscrolly);b.setScrollLeft(b.newscrollx);if(!b.scrollendtrapped)b.onScrollEnd()})},50)},this.cancelScroll=function(){if(!b.scrollendtrapped)return!0;var c=b.getScrollTop(),
d=b.getScrollLeft();b.scrollrunning=!1;f.transitionend||clearTimeout(f.transitionend);b.scrollendtrapped=!1;b._unbind(b.doc,f.transitionend,b.onScrollEnd);b.prepareTransition(0);b.setScrollTop(c);b.railh&&b.setScrollLeft(d);b.timerscroll&&b.timerscroll.tm&&clearInterval(b.timerscroll.tm);b.timerscroll=!1;b.cursorfreezed=!1;b.showCursor(c,d);return b},this.onScrollEnd=function(){b.scrollendtrapped&&b._unbind(b.doc,f.transitionend,b.onScrollEnd);b.scrollendtrapped=!1;b.prepareTransition(0);b.timerscroll&&
b.timerscroll.tm&&clearInterval(b.timerscroll.tm);b.timerscroll=!1;var c=b.getScrollTop(),d=b.getScrollLeft();b.setScrollTop(c);b.railh&&b.setScrollLeft(d);b.noticeCursor(!1,c,d);b.cursorfreezed=!1;0>c?c=0:c>b.page.maxh&&(c=b.page.maxh);0>d?d=0:d>b.page.maxw&&(d=b.page.maxw);if(c!=b.newscrolly||d!=b.newscrollx)return b.doScrollPos(d,c,b.opt.snapbackspeed);b.onscrollend&&b.scrollrunning&&b.onscrollend.call(b,{type:"scrollend",current:{x:d,y:c},end:{x:b.newscrollx,y:b.newscrolly}});b.scrollrunning=
!1}):(this.doScrollLeft=function(c,d){var e=b.scrollrunning?b.newscrolly:b.getScrollTop();b.doScrollPos(c,e,d)},this.doScrollTop=function(c,d){var e=b.scrollrunning?b.newscrollx:b.getScrollLeft();b.doScrollPos(e,c,d)},this.doScrollPos=function(c,d,e){function f(){if(b.cancelAnimationFrame)return!0;b.scrollrunning=!0;if(n=1-n)return b.timer=w(f)||1;var c=0,d=sy=b.getScrollTop();if(b.dst.ay){var d=b.bzscroll?b.dst.py+b.bzscroll.getNow()*b.dst.ay:b.newscrolly,e=d-sy;if(0>e&&d<b.newscrolly||0<e&&d>b.newscrolly)d=
b.newscrolly;b.setScrollTop(d);d==b.newscrolly&&(c=1)}else c=1;var g=sx=b.getScrollLeft();if(b.dst.ax){g=b.bzscroll?b.dst.px+b.bzscroll.getNow()*b.dst.ax:b.newscrollx;e=g-sx;if(0>e&&g<b.newscrollx||0<e&&g>b.newscrollx)g=b.newscrollx;b.setScrollLeft(g);g==b.newscrollx&&(c+=1)}else c+=1;2==c?(b.timer=0,b.cursorfreezed=!1,b.bzscroll=!1,b.scrollrunning=!1,0>d?d=0:d>b.page.maxh&&(d=b.page.maxh),0>g?g=0:g>b.page.maxw&&(g=b.page.maxw),g!=b.newscrollx||d!=b.newscrolly?b.doScrollPos(g,d):b.onscrollend&&b.onscrollend.call(b,
{type:"scrollend",current:{x:sx,y:sy},end:{x:b.newscrollx,y:b.newscrolly}})):b.timer=w(f)||1}d="undefined"==typeof d||!1===d?b.getScrollTop(!0):d;if(b.timer&&b.newscrolly==d&&b.newscrollx==c)return!0;b.timer&&x(b.timer);b.timer=0;var h=b.getScrollTop(),k=b.getScrollLeft();(0>(b.newscrolly-h)*(d-h)||0>(b.newscrollx-k)*(c-k))&&b.cancelScroll();b.newscrolly=d;b.newscrollx=c;if(!b.bouncescroll||!b.rail.visibility)0>b.newscrolly?b.newscrolly=0:b.newscrolly>b.page.maxh&&(b.newscrolly=b.page.maxh);if(!b.bouncescroll||
!b.railh.visibility)0>b.newscrollx?b.newscrollx=0:b.newscrollx>b.page.maxw&&(b.newscrollx=b.page.maxw);b.dst={};b.dst.x=c-k;b.dst.y=d-h;b.dst.px=k;b.dst.py=h;var j=Math.round(Math.sqrt(Math.pow(b.dst.x,2)+Math.pow(b.dst.y,2)));b.dst.ax=b.dst.x/j;b.dst.ay=b.dst.y/j;var l=0,s=j;0==b.dst.x?(l=h,s=d,b.dst.ay=1,b.dst.py=0):0==b.dst.y&&(l=k,s=c,b.dst.ax=1,b.dst.px=0);j=b.getTransitionSpeed(j);e&&1>=e&&(j*=e);b.bzscroll=0<j?b.bzscroll?b.bzscroll.update(s,j):new BezierClass(l,s,j,0,1,0,1):!1;if(!b.timer){(h==
b.page.maxh&&d>=b.page.maxh||k==b.page.maxw&&c>=b.page.maxw)&&b.checkContentSize();var n=1;b.cancelAnimationFrame=!1;b.timer=1;b.onscrollstart&&!b.scrollrunning&&b.onscrollstart.call(b,{type:"scrollstart",current:{x:k,y:h},request:{x:c,y:d},end:{x:b.newscrollx,y:b.newscrolly},speed:j});f();(h==b.page.maxh&&d>=h||k==b.page.maxw&&c>=k)&&b.checkContentSize();b.noticeCursor()}},this.cancelScroll=function(){b.timer&&x(b.timer);b.timer=0;b.bzscroll=!1;b.scrollrunning=!1;return b}):(this.doScrollLeft=function(c,
d){var e=b.getScrollTop();b.doScrollPos(c,e,d)},this.doScrollTop=function(c,d){var e=b.getScrollLeft();b.doScrollPos(e,c,d)},this.doScrollPos=function(c,d){var e=c>b.page.maxw?b.page.maxw:c;0>e&&(e=0);var f=d>b.page.maxh?b.page.maxh:d;0>f&&(f=0);b.synched("scroll",function(){b.setScrollTop(f);b.setScrollLeft(e)})},this.cancelScroll=function(){});this.doScrollBy=function(c,d){var e=0,e=d?Math.floor((b.scroll.y-c)*b.scrollratio.y):(b.timer?b.newscrolly:b.getScrollTop(!0))-c;if(b.bouncescroll){var f=
Math.round(b.view.h/2);e<-f?e=-f:e>b.page.maxh+f&&(e=b.page.maxh+f)}b.cursorfreezed=!1;py=b.getScrollTop(!0);if(0>e&&0>=py)return b.noticeCursor();if(e>b.page.maxh&&py>=b.page.maxh)return b.checkContentSize(),b.noticeCursor();b.doScrollTop(e)};this.doScrollLeftBy=function(c,d){var e=0,e=d?Math.floor((b.scroll.x-c)*b.scrollratio.x):(b.timer?b.newscrollx:b.getScrollLeft(!0))-c;if(b.bouncescroll){var f=Math.round(b.view.w/2);e<-f?e=-f:e>b.page.maxw+f&&(e=b.page.maxw+f)}b.cursorfreezed=!1;px=b.getScrollLeft(!0);
if(0>e&&0>=px||e>b.page.maxw&&px>=b.page.maxw)return b.noticeCursor();b.doScrollLeft(e)};this.doScrollTo=function(c,d){d&&Math.round(c*b.scrollratio.y);b.cursorfreezed=!1;b.doScrollTop(c)};this.checkContentSize=function(){var c=b.getContentSize();(c.h!=b.page.h||c.w!=b.page.w)&&b.resize(!1,c)};b.onscroll=function(){b.rail.drag||b.cursorfreezed||b.synched("scroll",function(){b.scroll.y=Math.round(b.getScrollTop()*(1/b.scrollratio.y));b.railh&&(b.scroll.x=Math.round(b.getScrollLeft()*(1/b.scrollratio.x)));
b.noticeCursor()})};b.bind(b.docscroll,"scroll",b.onscroll);this.doZoomIn=function(c){if(!b.zoomactive){b.zoomactive=!0;b.zoomrestore={style:{}};var d="position top left zIndex backgroundColor marginTop marginBottom marginLeft marginRight".split(" "),h=b.win[0].style,k;for(k in d){var j=d[k];b.zoomrestore.style[j]="undefined"!=typeof h[j]?h[j]:""}b.zoomrestore.style.width=b.win.css("width");b.zoomrestore.style.height=b.win.css("height");b.zoomrestore.padding={w:b.win.outerWidth()-b.win.width(),h:b.win.outerHeight()-
b.win.height()};f.isios4&&(b.zoomrestore.scrollTop=e(window).scrollTop(),e(window).scrollTop(0));b.win.css({position:f.isios4?"absolute":"fixed",top:0,left:0,"z-index":C+100,margin:"0px"});d=b.win.css("backgroundColor");(""==d||/transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(d))&&b.win.css("backgroundColor","#fff");b.rail.css({"z-index":C+101});b.zoom.css({"z-index":C+102});b.zoom.css("backgroundPosition","0px -18px");b.resizeZoom();b.onzoomin&&b.onzoomin.call(b);return b.cancelEvent(c)}};this.doZoomOut=
function(c){if(b.zoomactive)return b.zoomactive=!1,b.win.css("margin",""),b.win.css(b.zoomrestore.style),f.isios4&&e(window).scrollTop(b.zoomrestore.scrollTop),b.rail.css({"z-index":b.zindex}),b.zoom.css({"z-index":b.zindex}),b.zoomrestore=!1,b.zoom.css("backgroundPosition","0px 0px"),b.onResize(),b.onzoomout&&b.onzoomout.call(b),b.cancelEvent(c)};this.doZoom=function(c){return b.zoomactive?b.doZoomOut(c):b.doZoomIn(c)};this.resizeZoom=function(){if(b.zoomactive){var c=b.getScrollTop();b.win.css({width:e(window).width()-
b.zoomrestore.padding.w+"px",height:e(window).height()-b.zoomrestore.padding.h+"px"});b.onResize();b.setScrollTop(Math.min(b.page.maxh,c))}};this.init();e.nicescroll.push(this)},L=function(e){var d=this;this.nc=e;this.steptime=this.lasttime=this.speedy=this.speedx=this.lasty=this.lastx=0;this.snapy=this.snapx=!1;this.demuly=this.demulx=0;this.lastscrolly=this.lastscrollx=-1;this.timer=this.chky=this.chkx=0;this.time=function(){return+new Date};this.reset=function(e,j){d.stop();var n=d.time();d.steptime=
0;d.lasttime=n;d.speedx=0;d.speedy=0;d.lastx=e;d.lasty=j;d.lastscrollx=-1;d.lastscrolly=-1};this.update=function(e,j){var n=d.time();d.steptime=n-d.lasttime;d.lasttime=n;var n=j-d.lasty,v=e-d.lastx,b=d.nc.getScrollTop(),m=d.nc.getScrollLeft(),b=b+n,m=m+v;d.snapx=0>m||m>d.nc.page.maxw;d.snapy=0>b||b>d.nc.page.maxh;d.speedx=v;d.speedy=n;d.lastx=e;d.lasty=j};this.stop=function(){d.nc.unsynched("domomentum2d");d.timer&&clearTimeout(d.timer);d.timer=0;d.lastscrollx=-1;d.lastscrolly=-1};this.doSnapy=function(e,
j){var n=!1;0>j?(j=0,n=!0):j>d.nc.page.maxh&&(j=d.nc.page.maxh,n=!0);0>e?(e=0,n=!0):e>d.nc.page.maxw&&(e=d.nc.page.maxw,n=!0);n&&d.nc.doScrollPos(e,j,d.nc.opt.snapbackspeed)};this.doMomentum=function(e){var j=d.time(),n=e?j+e:d.lasttime;e=d.nc.getScrollLeft();var v=d.nc.getScrollTop(),b=d.nc.page.maxh,m=d.nc.page.maxw;d.speedx=0<m?Math.min(60,d.speedx):0;d.speedy=0<b?Math.min(60,d.speedy):0;n=n&&50>=j-n;if(0>v||v>b||0>e||e>m)n=!1;e=d.speedx&&n?d.speedx:!1;if(d.speedy&&n&&d.speedy||e){var h=Math.max(16,
d.steptime);50<h&&(e=h/50,d.speedx*=e,d.speedy*=e,h=50);d.demulxy=0;d.lastscrollx=d.nc.getScrollLeft();d.chkx=d.lastscrollx;d.lastscrolly=d.nc.getScrollTop();d.chky=d.lastscrolly;var q=d.lastscrollx,r=d.lastscrolly,u=function(){var e=600<d.time()-j?0.04:0.02;if(d.speedx&&(q=Math.floor(d.lastscrollx-d.speedx*(1-d.demulxy)),d.lastscrollx=q,0>q||q>m))e=0.1;if(d.speedy&&(r=Math.floor(d.lastscrolly-d.speedy*(1-d.demulxy)),d.lastscrolly=r,0>r||r>b))e=0.1;d.demulxy=Math.min(1,d.demulxy+e);d.nc.synched("domomentum2d",
function(){d.speedx&&(d.nc.getScrollLeft()!=d.chkx&&d.stop(),d.chkx=q,d.nc.setScrollLeft(q));d.speedy&&(d.nc.getScrollTop()!=d.chky&&d.stop(),d.chky=r,d.nc.setScrollTop(r));d.timer||(d.nc.hideCursor(),d.doSnapy(q,r))});1>d.demulxy?d.timer=setTimeout(u,h):(d.stop(),d.nc.hideCursor(),d.doSnapy(q,r))};u()}else d.doSnapy(d.nc.getScrollLeft(),d.nc.getScrollTop())}},z=e.fn.scrollTop;e.cssHooks.pageYOffset={get:function(j){var d=e.data(j,"__nicescroll")||!1;return d&&d.ishwscroll?d.getScrollTop():z.call(j)},
set:function(j,d){var k=e.data(j,"__nicescroll")||!1;k&&k.ishwscroll?k.setScrollTop(parseInt(d)):z.call(j,d);return this}};e.fn.scrollTop=function(j){if("undefined"==typeof j){var d=this[0]?e.data(this[0],"__nicescroll")||!1:!1;return d&&d.ishwscroll?d.getScrollTop():z.call(this)}return this.each(function(){var d=e.data(this,"__nicescroll")||!1;d&&d.ishwscroll?d.setScrollTop(parseInt(j)):z.call(e(this),j)})};var B=e.fn.scrollLeft;e.cssHooks.pageXOffset={get:function(j){var d=e.data(j,"__nicescroll")||
!1;return d&&d.ishwscroll?d.getScrollLeft():B.call(j)},set:function(j,d){var k=e.data(j,"__nicescroll")||!1;k&&k.ishwscroll?k.setScrollLeft(parseInt(d)):B.call(j,d);return this}};e.fn.scrollLeft=function(j){if("undefined"==typeof j){var d=this[0]?e.data(this[0],"__nicescroll")||!1:!1;return d&&d.ishwscroll?d.getScrollLeft():B.call(this)}return this.each(function(){var d=e.data(this,"__nicescroll")||!1;d&&d.ishwscroll?d.setScrollLeft(parseInt(j)):B.call(e(this),j)})};for(var F=function(j){var d=this;
this.length=0;this.name="nicescrollarray";this.each=function(e){for(var j=0,k=0;k<d.length;k++)e.call(d[k],j++);return d};this.push=function(e){d[d.length]=e;d.length++};this.remove=function(e){d.each(function(j){this.id===e.id&&(delete d[j],d.length--)})};this.eq=function(e){return d[e]};if(j)for(a=0;a<j.length;a++){var k=e.data(j[a],"__nicescroll")||!1;k&&(this[this.length]=k,this.length++)}return this},u=F.prototype,M="show hide toggle onResize resize remove stop doScrollPos".split(" "),Q=function(e,
d){e[d]=function(){var e=arguments;return this.each(function(){this[d].apply(this,e)})}},I=0;I<M.length;I++)Q(u,M[I]);e.fn.getNiceScroll=function(j){return"undefined"==typeof j?new F(this):e.data(this[j],"__nicescroll")||!1};e.extend(e.expr[":"],{nicescroll:function(j){return e.data(j,"__nicescroll")?!0:!1}});e.fn.niceScroll=function(j,d){"undefined"==typeof d&&("object"==typeof j&&!("jquery"in j))&&(d=j,j=!1);var k=new F;"undefined"==typeof d&&(d={});j&&(d.doc=e(j),d.win=e(this));var s=!("doc"in
d);!s&&!("win"in d)&&(d.win=e(this));this.each(function(){var j=e(this).data("__nicescroll")||!1;j||(d.doc=s?e(this):d.doc,j=new P(d,e(this)),e(this).data("__nicescroll",j));k.push(j)});return 1==k.length?k[0]:k};window.NiceScroll={getjQuery:function(){return e}};e.nicescroll||(e.nicescroll=new F,e.nicescroll.options=K)})(jQuery);

/*
 Shadow animation 20130124
 http://www.bitstorm.org/jquery/shadow-animation/
 Copyright 2011, 2013 Edwin Martin <edwin@bitstorm.org>
 Contributors: Mark Carver, Xavier Lepretre
 Released under the MIT and GPL licenses.
*/
jQuery(function(e,i){function j(){var b=e("script:first"),a=b.css("color"),c=false;if(/^rgba/.test(a))c=true;else try{c=a!=b.css("color","rgba(0, 0, 0, 0.5)").css("color");b.css("color",a)}catch(d){}return c}function k(b,a,c){var d=[];b.b&&d.push("inset");typeof a.left!="undefined"&&d.push(parseInt(b.left+c*(a.left-b.left),10)+"px "+parseInt(b.top+c*(a.top-b.top),10)+"px");typeof a.blur!="undefined"&&d.push(parseInt(b.blur+c*(a.blur-b.blur),10)+"px");typeof a.a!="undefined"&&d.push(parseInt(b.a+c*
(a.a-b.a),10)+"px");if(typeof a.color!="undefined"){var g="rgb"+(e.support.rgba?"a":"")+"("+parseInt(b.color[0]+c*(a.color[0]-b.color[0]),10)+","+parseInt(b.color[1]+c*(a.color[1]-b.color[1]),10)+","+parseInt(b.color[2]+c*(a.color[2]-b.color[2]),10);if(e.support.rgba)g+=","+parseFloat(b.color[3]+c*(a.color[3]-b.color[3]));g+=")";d.push(g)}return d.join(" ")}function h(b){var a,c,d={};if(a=/#([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})/.exec(b))c=[parseInt(a[1],16),parseInt(a[2],16),parseInt(a[3],
16),1];else if(a=/#([0-9a-fA-F])([0-9a-fA-F])([0-9a-fA-F])/.exec(b))c=[parseInt(a[1],16)*17,parseInt(a[2],16)*17,parseInt(a[3],16)*17,1];else if(a=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(b))c=[parseInt(a[1],10),parseInt(a[2],10),parseInt(a[3],10),1];else if(a=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9\.]*)\s*\)/.exec(b))c=[parseInt(a[1],10),parseInt(a[2],10),parseInt(a[3],10),parseFloat(a[4])];d=(a=/(-?[0-9]+)(?:px)?\s+(-?[0-9]+)(?:px)?(?:\s+(-?[0-9]+)(?:px)?)?(?:\s+(-?[0-9]+)(?:px)?)?/.exec(b))?
{left:parseInt(a[1],10),top:parseInt(a[2],10),blur:a[3]?parseInt(a[3],10):0,a:a[4]?parseInt(a[4],10):0}:{left:0,top:0,blur:0,a:0};d.b=/inset/.test(b);d.color=c;return d}e.extend(true,e,{support:{rgba:j()}});var l=e("html").prop("style"),f;e.each(["boxShadow","MozBoxShadow","WebkitBoxShadow"],function(b,a){if(typeof l[a]!=="undefined"){f=a;return false}});if(f)e.Tween.propHooks.boxShadow={get:function(b){return e(b.elem).css(f)},set:function(b){var a=b.elem.style,c=h(e(b.elem).get(0).style[f]||e(b.elem).css(f)),
d=e.extend({},c,h(b.end));if(c.color==i)c.color=d.color||[0,0,0];b.run=function(g){a[f]=k(c,d,g)}}}});