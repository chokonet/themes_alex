jQuery(document).ready(function($) {


	// Margen auto menu peliculas
	$(document).ready(function(){
		if($('.colSinopsis').height() > $('#theimg img').attr("height")){
			var height = $('.col1Datos').height() - $('.colSinopsis').height() -55;
			if(height>=1){
				$('.col1Datos #menuSeccion').css("margin-top", height);
			}
		}else{
			var height = $('.col1Datos').height() - $('#theimg img').attr("height") -55;
			if(height>=1){
				$('.col1Datos #menuSeccion').css("margin-top", height);
			}
		}

	});

	//Click en press kit sin permiso para el usuario
	$('#btn_no_permiso').on('click', function (e) {
		e.preventDefault();
		alert('No tienes pertmisos para descargar este archivo');
	});

	var login_screen = $('.login_wrap');

	$('.open-login-form').on('click', function(){
		login_screen.fadeIn();
		$('#username').focus();
	});

	$(login_screen).find('.cerrar').on('click', function(){
		login_screen.fadeOut();
	});

	$('.login_wrap').on('click', function (e){
		if (e.target == this) {
       		$(this).hide();
   		}
	});

	// enviar el formulario de login
	$('#submit.login').on('click', function (e) {
		$('#login-form').submit();
	});

	$('#slide').bjqs({
		speed       : 900,
		height      : 509,
		width       : 975,
		responsive  : true,
		showmarkers : false,
		nexttext    : '',
		prevtext    : ''
	});

	function scrollSobre (idTema,id_btn){
		$('html, body').animate({
			scrollTop: $(idTema).position().top - 55
		}, 1000);
		$('.actual').removeClass();
		$(id_btn).addClass('actual');
	}


	$('#menuAcerca #menuSeccion li').click(function(){
		//scrollSobre('#' + $(this).attr('rel'),'#' + $(this).attr('id'));
	});

	$('.pelicula_hover').hover(
		function () {
			console.log('in');
			$(this).find('.infoPelicula').stop().animate({ top: 0 }, 500 );
			$(this).find('.catalogoContiene img').stop().animate({ top: 100 }, 500 );
			$(this).find('.catalogoContiene #now_playing').stop().animate({ top: 255 }, 500 );
		},
		function () {
			console.log('out');
			$(this).find('.infoPelicula').stop().animate({ top: -100 }, 500 );
			$(this).find('.catalogoContiene img').stop().animate({ top: 0 }, 500 );
			$(this).find('.catalogoContiene #now_playing').stop().animate({ top: 155 }, 500 );
		}
	);

	$('.bordeBlancoVert').css('height',$('.contenidoTemaPelicula').height());
	$('.bordeBlancoBlog:last-of-type').css('border-bottom','0');


	function extraInfo (idExtra, id_extrabtn) {
		$('.activo').slideUp(400);
		$(idExtra).slideDown(400).removeClass('oculto').addClass('activo');
		$('.actual').removeClass();
		$(id_extrabtn).addClass('actual');
		$('.bordeBlancoVert').animate({
			height: $('.col1Datos').height()
		}, 1000);
	}

	$('#borde3 li').click(function(){
		extraInfo('#' + $(this).attr('rel'),'#' + $(this).attr('id'));
	});

	function curriculumCol (idcurr) {
		$('.activoCurr').slideUp(300);
		$(idcurr)
			.slideDown(300)
			.removeClass('oculto')
			.addClass('activoCurr');
	}

	$('.colaborador').click( function(){

		var colaborador = $(this);
		if ( !colaborador.hasClass('botonActivoCurr') ){
			curriculumCol('#' + colaborador.attr('rel'));
			$('.botonActivoCurr').removeClass('botonActivoCurr');
			colaborador.addClass('botonActivoCurr');
		}
	});

	//var posicionScroll = $(window).scrollTop();

	// $(window).scroll(function(){
	// 	if ($(window).scrollTop() > 113){
	// 		$('#menuAcerca').css('position','fixed').css('top','0');
	// 		$('#menuSeccion').css('margin-top','0');
	// 		$('#slide').css('margin-top','95px');
	// 	} else {
	// 		$('#menuAcerca').css('position','static');
	// 		$('#menuSeccion').css('margin-top','15px');
	// 		$('#slide').css('margin-top','25px');
	// 	}
	// });

	$('#busca').focus(function(){
		$(this).attr('value','');
	});
	$('#newsletter').focus(function(){
		$(this).attr('value','');
	});
	$('#busca').blur(function(){
		$(this).attr('value','Buscar');
	});
	$('#newsletter').blur(function(){
		if($(this).attr('value') === ''){
			$(this).attr('value','Newsletter');
		}
	});
	$('.txtBlog').height();


	$('.ficm_not_featured select').change(function() {
		var this_changed = $(this);
		var not_featured_id  = this_changed.val();
		var path = php2js_vars_obj.template_url + '/post_functions.php';

		$.post(path, { not_featured_id: not_featured_id },
			function(data){

				var html = '';

				this_changed.siblings('.ficm_not_featured_msj').text('Para guardar cambios dar click en "update post"');
				this_changed.parent().siblings('.ficm_not_featured').append(html);

				if( this_changed.siblings('img').length > 0){
					this_changed.siblings('img').attr('src', data);
				}else{
					html = '<img src="'+data+'"/>';
					this_changed.parent().append(html);
				}
			}
		);
	});

	//enviar búsqueda
	$('#lupaBusqueda').click(function() {
		$('#searchForm').submit();
	});


	$("#redesHead img")
		.mouseover(function() {
				var src = $(this).attr("src").replace('.gif', '_sobre.gif');
				$(this).attr("src", src);
		})
		.mouseout(function() {
				var src = $(this).attr("src").replace("_sobre.gif", ".gif");
				$(this).attr("src", src);

		});



	if ( $('#mensajeNews').length ) {
		alert( $('#mensajeNews').html() );
	}

	var alturaVentana1 = $(window).height();
	$('.contenido').css('min-height',alturaVentana1);

	$(window).resize(function() {
		var alturaVentana2 = $(window).height();
		$('.contenido').css('min-height',alturaVentana2);
	});


	if ( $('#acercaPost').length ) {
		var alturaInicial = $('#acercaPost:last-of-type').height();
		var restaExtraespacio = alturaVentana1 - $('#acercaPost:last-of-type').height() - $('#menuSeccion').height() - $('#peliculaFoot').height();
		//$('#acercaPost:last-of-type').css('height',$('#acercaPost:last-of-type').height() + restaExtraespacio);

		$(window).resize(function() {
			var alturaVentana3 = $(window).height();
			$('.contenido').css('min-height',alturaVentana3);
			var restaExtraespacio2 = alturaVentana3 - $('#menuSeccion').height() - $('#peliculaFoot').height();
			if($('#acercaPost:last-of-type').height() > alturaInicial ){
				$('#acercaPost:last-of-type').css('height',restaExtraespacio2);
			}
			if($('#acercaPost:last-of-type').height() < alturaInicial + 2 ){
				$('#acercaPost:last-of-type').css('height',alturaInicial + 2);
			}
		});
	}


	if ( $('#extraPadInt').length){
		var alturaInicial = $('#extraPadInt').height();
		var restaExtraespacio = alturaVentana1 - $('#borde2').height() - $('#menuPrincipal').height() - $('#pleca').height() - $('#peliculaFoot').height();
		if (restaExtraespacio > alturaInicial ){
			$('#extraPadInt').css('height',restaExtraespacio);
		}

		$(window).resize(function() {
			var alturaVentana3 = $(window).height();
			$('.contenido').css('min-height',alturaVentana3);
			var restaExtraespacio2 = alturaVentana3 - $('#borde2').height() - $('#menuPrincipal').height() - $('#pleca').height() - $('#peliculaFoot').height();
			if( $('#extraPadInt').height() > alturaInicial ) {
				$('#extraPadInt').css('height',restaExtraespacio2);
			}
			if( $('#extraPadInt').height() < alturaInicial + 2 ) {
				$('#extraPadInt').css('height',alturaInicial + 2);
			}
		});
	}

	if ( $('#extraPadInt2').length ){
		var alturaInicial = $('#extraPadInt2').height();
		var restaExtraespacio = alturaVentana1 - $('#borde2').height() - $('#l1').height() - $('#l2').height() - $('#menuPrincipal').height() - $('#pleca').height() - $('#peliculaFoot').height();
		if (restaExtraespacio > alturaInicial ){
			$('#extraPadInt2').css('min-height',restaExtraespacio);
		}

		$(window).resize(function() {
			var alturaVentana3 = $(window).height();
			$('.contenido').css('min-height',alturaVentana3);
			var restaExtraespacio2 = alturaVentana3 - $('#borde2').height() - $('#l1').height() - $('#l2').height() - $('#menuPrincipal').height() - $('#pleca').height() - $('#peliculaFoot').height();
			if ($('#extraPadInt2').height() > alturaInicial ) {
				$('#extraPadInt2').css('height',restaExtraespacio2);
			}
			if ($('#extraPadInt2').height() < alturaInicial + 2 ){
				$('#extraPadInt2').css('height',alturaInicial + 2);
			}
		});
	}

	//Fancybox
	$('.fancybox-media').fancybox({
		helpers : {
			media : {}
		}
	});

});