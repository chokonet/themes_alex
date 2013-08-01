$(function(){
	//console.log('s');

	var filtro = $('#ul_filters li'),
	subfiltro = $('#ul_filters li ul');

	subfiltro.each(function(){
		$(this).css('height', $(this).height());
		$(this).hide();
	});

	filtro.on( 'click', function(){
		//console.log('s');
		subfiltro = $(this).children('ul');

		if ( subfiltro.hasClass('abierto') ){
			subfiltro.removeClass('abierto');
			subfiltro.slideUp();
		} else {
			subfiltro.addClass('abierto');
			subfiltro.slideDown();
		}

	});

	//Tabs
	var selector_tab = $('#nav_tabs li a'),
		content_tab = $('.content_tabs'),
		content_tab_id;

	selector_tab.on('click', function(e){
		e.preventDefault();
		content_tab_id = $(this).data('id');

		content_tab.css({
			'height': '0px'
		});

		$('#'+content_tab_id).css({
			'height': 'auto'
		});
		selector_tab.removeClass('active');
		$(this).addClass('active');
	});

	//grids
	var grid = $('.girls_grid'),
		grid_selector = $('#displays li'),
		grid_type;

	grid_selector.on('click', function(){
		grid_type = $(this).data('id');
		console.log(grid_type);

		grid.removeClass('big small');
		grid.addClass(grid_type);
	});

	//Back2top
	var b2s = $('.back_to_top');

	b2s.on('click', function(){
		$("html, body").animate({ scrollTop: 0 }, "slow");
 		return false;
	});

});