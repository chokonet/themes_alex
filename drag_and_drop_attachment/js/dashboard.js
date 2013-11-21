(function($){

	"use_strict";

	$(function(){


		$('.no-submit').on('submit', function (e) {
			console.log('preventDefault - dashboard.js:9');
			e.preventDefault();
		});


		$('.disabled').on('click', function (e) {
			e.preventDefault();
		});

		$(document).ready(function(){
			dragdrop();
		});



	/********************************************************

			DRAGGABLE AND DROPPABLE ELEMENTS

	********************************************************/

		// DRAGGABLE ELEMENTS CALLBACK FUNCTIONS /////////////////////////////////////////////

		var draggable_start_function = function(event, ui){
			temp_element      = $(this).css('opacity', '0.2');
			action_from_right = temp_element.parent().parent().hasClass('girl_sidebar');
		};


		var draggable_stop_function = function(){
			$(this).css('opacity', '1');
			$(this).css('z-index', '9999');

		};

		// DROPPABLE ELEMENTS CALLBACK FUNCTIONS /////////////////////////////////////////////

		/**
		 * Clona el draggable element y lo pone en el droppable
		 */
		var droppable_drop_function = function(event, ui){
			var container = $(this);
			if( action_from_right && container.children().length > 0 ){

				temp_element.after(container.find('.girl:first-child'));

			}else if( container.children().length > 0 ){

				temp_element.after(container.find('.girl:first-child'));

			}
			container.append( ui.draggable.context );



		};

		function dragdrop(){

			var action_from_right, temp_element;

			$( ".droppable" ).droppable({
				tolerance: 'pointer',
				hoverClass: 'highlight',
				drop: droppable_drop_function
			});

			$( ".draggable" ).draggable({
				helper: 'clone',
				start: draggable_start_function,
				stop: draggable_stop_function
			});

			$('.elimina_imagen').live('click', function(){
				container = $(this).parent().parent();
				$('.galeria').children('.add-new-photo').after($(this).parent().parent());
				$($(this).parent().parent()).css('border', '1');
				$($(this).parent().parent()).insertBefore('.add-new-photo');
			});


		}






		/*

		8888888888       888                  .d8888b.  d8b         888
		888              888                 d88P  Y88b Y8P         888
		888              888                 888    888             888
		8888888  .d88b.  888888  .d88b.      888        888 888d888 888 .d8888b
		888     d88""88b 888    d88""88b     888  88888 888 888P"   888 88K
		888     888  888 888    888  888     888    888 888 888     888 "Y8888b.
		888     Y88..88P Y88b.  Y88..88P     Y88b  d88P 888 888     888      X88
		888      "Y88P"   "Y888  "Y88P"       "Y8888P88 888 888     888  88888P'

		 */


		function set_add_images_as_dashboard(image_name, data){

			var url_path = upload_dir['url'];

			var span = document.createElement('span');
	        span.innerHTML = ['<img class="thumb" src="',url_path,'/',image_name,'-313x313.png" />'].join('');

	        $('.galeria').append('<div class="girl nueva_image draggable" data-url="'+data+'"><div class="info_container">'+span.innerHTML+'<img class="elimina_imagen" src="http://localhost:8888/girl/wp-content/themes/girl/images/ico-no.png"><div class="crop_image" data-name="'+image_name+'-313x313">crop</div></div></div>')
	        $('.nueva_image').insertBefore( ".add-new-photo" );
	        $( ".draggable" ).draggable({
				helper: 'clone',
				start: draggable_start_function,
				stop: draggable_stop_function
			});

		}


		function set_images_as_attachement (image_data, image_name) {
			var girl_id = $('#edit-photos').data('girl_id');
			var data  = image_data.split(',');
			var image = data[1];

			return $.post(ajax_url, {
				image_data: image,
				image_name: image_name,
				girl_id   : girl_id,
				action    : 'save_image_as_attachment'
			}, 'json')
			.done(function (data){

					set_add_images_as_dashboard(image_name, data);

			});

		}

		function addPhotosScort(files){

			for (var i = 0; i < files.length; i++){
				var name_img = files[i].name;
				var reader = new FileReader();
				reader.onload = function(e){

					set_images_as_attachement(e.target.result, e.total);

				}
				reader.readAsDataURL(files[i]);
			}

		}




		$('#bt-add-photo').on('click', function () {
			$('#subir-foto-girl').trigger('click');
		});

		$('#subir-foto-girl').live('change', function (e) {

			var files = $(this)[0].files;
			addPhotosScort(files);

		});




		/********************************************************

			CROP FOTO GIRLS

		********************************************************/


		// Updating cropping x, y, width and height values
		function updateSelection(img, selection) {
			$('#x1').val(selection.x1);
			$('#y1').val(selection.y1);
			$('#w').val(selection.width);
			$('#h').val(selection.height);
		}

		//Save cropped image
		function saveImage(selector) {

			var crop = $(selector).find('.crop');

			if (crop.html()!='') {
				var x1 = $('#x1').val(),
					y1 = $('#y1').val(),
					w = $('#w').val(),
					h = $('#h').val();

				//Check if the crop selection was made, otherwhise set default values
				if (w == "" || w == 0)
					w  = crop.find('img').width();
				if (h == "" || h == 0)
					h  = crop.find('img').height();
				if (x1 == "" || x1 == 0) x1 = Math.round((w-h)/2);
				if (y1 == "") y1 = 0;

				var girl_id = $('#edit-photos').data('girl_id');
				var img = $('#photo').attr('src');
				var image_name = $('#photo').data('name');

				$.post(ajax_url, {
					x1        : x1,
					y1        : y1,
					w         : w,
					h         : h,
					img       : img,
					image_name: image_name,
					girl_id   : girl_id,
					action    : 'crop_save_image'
				}, 'json')

				.done(function (data){

					$('#content_crop_image, #fondo_media').fadeOut();
					$('.imgareaselect-outer, .imgareaselect-selection, .imgareaselect-border1, .imgareaselect-border2').remove();
					$('.crop').empty();

					var currSrc = bt_crops.parent().children('.thumb').attr("src");
					bt_crops.parent().children('.thumb').attr( 'src',currSrc);

				});

			}


		}

		$('#bt-saveImage').live('click', function () {
			var uploadC = '#upload_container';
			saveImage(uploadC);
		});

		$('.cancel').live('click', function () {
			$('#content_crop_image, #fondo_media').fadeOut();
			$('.imgareaselect-outer, .imgareaselect-selection, .imgareaselect-border1, .imgareaselect-border2').remove();
			$('.crop').empty();
		});



		//Updating cropping x, y, width and height values
		function updateSelection(img, selection) {
			$('#x1').val(selection.x1);
			$('#y1').val(selection.y1);
			$('#w').val(selection.width);
			$('#h').val(selection.height);
		}

		function initialize_imgAreaSelect(){
			$('#photo').imgAreaSelect({
				minxWidth: 314,
				minHeight: 314,
				aspectRatio: '4:4',
				onSelectChange: updateSelection
		    });
		}

		function add_image_content_crop(imagen, name_image){

			$('.crop').html('<div class="thumbnail"><img id="photo" data-name="'+name_image+'" src="'+imagen+'" /></div><p><button type="button" class="btn btn-small cancel"> <i class="icon-remove"></i> Cancel</button> <button type="button" class="btn btn-primary btn-small" id="bt-saveImage"><i class="icon-ok-sign icon-white"></i> Save Image</button></p>');

			initialize_imgAreaSelect();

		}
		$('.crop_image').live('click', function () {
			window.bt_crops = $(this);
			var imagen      = $(this).parent().parent().data('url');
			var name_image  = $(this).data('name');
			$('#content_crop_image, #fondo_media').fadeIn();
			add_image_content_crop(imagen, name_image);
		});






	/*
	888b     d888                     d8888                                              888
	8888b   d8888                    d88888                                              888
	88888b.d88888                   d88P888                                              888
	888Y88888P888 888  888         d88P 888  .d8888b  .d8888b  .d88b.  888  888 88888b.  888888
	888 Y888P 888 888  888        d88P  888 d88P"    d88P"    d88""88b 888  888 888 "88b 888
	888  Y8P  888 888  888       d88P   888 888      888      888  888 888  888 888  888 888
	888   "   888 Y88b 888      d8888888888 Y88b.    Y88b.    Y88..88P Y88b 888 888  888 Y88b.
	888       888  "Y88888     d88P     888  "Y8888P  "Y8888P  "Y88P"   "Y88888 888  888  "Y888
	                   888
	              Y8b d88P
	               "Y88P"
	*/



		function validateEmail (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		}



		function update_data_account(getRequest){
			return $.get(getRequest, {
				action: 'update_data_account'
			}, 'json')

		}




		function respuesta_update_data(ajaxMail){
			ajaxMail.done(function(result){

				$('.pop-mensajes').fadeIn(750).delay(5000).fadeOut(750);
				$('.notice-body').html(result);
				$('#edit-information-new-password, #edit-information-confirm-pasword, #edit-information-current-password').val('');

			});
		}




		$('#form-my-account').on('submit', function (event) {
			event.preventDefault();
			$('input').css('border','1px solid #D8D8D8');

			var userEmail   = $('#edit-information-email').val();
			var newPass     = $('#edit-information-new-password').val();
			var longitud    = newPass.length;
			var confirmPass = $('#edit-information-confirm-pasword').val();

			if( ! validateEmail(userEmail) ){

				$('#edit-information-email').css('border','1px solid #E34234');
				$('.pop-mensajes').fadeIn(750).delay(5000).fadeOut(750);
				$('.notice-body').html('The email field is invalid.');

			}else if(longitud > 0 && longitud <= 5){

				$('.pop-mensajes').fadeIn(750).delay(5000).fadeOut(750);
				$('.notice-body').html('Make it at least 6 characters.');

			}else if(newPass != confirmPass){

				$('#edit-information-new-password, #edit-information-confirm-pasword').css('border','1px solid #E34234');
				$('.pop-mensajes').fadeIn(750).delay(5000).fadeOut(750);
				$('.notice-body').html('Passwords Do not match.');

			}else{
				var getRequest = ajax_url+'?'+$(this).serialize();
				var ajaxMail   = update_data_account(getRequest);

				respuesta_update_data(ajaxMail);

			}

		});





/*
	 .d8888b.                            d8b
	d88P  Y88b                           Y8P
	Y88b.
	 "Y888b.    .d88b.  888d888 888  888 888  .d8888b .d88b.  .d8888b
		"Y88b. d8P  Y8b 888P"   888  888 888 d88P"   d8P  Y8b 88K
		  "888 88888888 888     Y88  88P 888 888     88888888 "Y8888b.
	Y88b  d88P Y8b.     888      Y8bd8P  888 Y88b.   Y8b.          X88
	 "Y8888P"   "Y8888  888       Y88P   888  "Y8888P "Y8888   88888P'
*/






		// Crear contenedor de servicios
		function crearContenedorServicios(){
			return $('<div></div>', {
				'class': 'cont_services'
			});
		}


		function createServiceDomElement(prefix, id, label){

			label  = $.trim(label);
			prefix = prefix.substring(8);

			var contenedor = crearContenedorServicios();

			$('<input></input>',{
				'type'   : 'checkbox',
				'name'   : prefix+'-'+id,
				'value'  : label,
				'id'     : prefix+'-'+id
			}).appendTo(contenedor);

			$('<label></label>',{
				'for'    : prefix+'-'+id,
				'class'  : 'withheld services',
				'text'   : label
			}).appendTo(contenedor);

			$('<img />', {
				'class' :'elimina_check',
				'src'   : theme_url+'/images/ico-no.png'
			}).appendTo(contenedor);

			return contenedor;
		}



		function getServiceLabel(message){
			var servicio = prompt(message, ''),
				regExp   = /^[a-zA-Z0-9 _]*[a-zA-Z0-9][a-zA-Z0-9 _+]*$/;

			if ( _.isNull(servicio) || _.isEmpty( $.trim(servicio)) ){
				return false;
			}
			if ( ! regExp.test(servicio) ){
				alert('Carateres invalidos');
				return getServiceLabel();
			}
			return servicio;
		}



	// ADD SERVICES ///////////////////////////////////////////////////////////////////////



		function update_service_table( type, name ){
			// insertar nuevo servicio en la base de datos
			return $.post(ajax_url, {
				service_type: type,
				service_name: name,
				action: 'update_service_table'
			}, 'json');
		}



		$('.bt-add-service').on('click', function () {
			var service_name = getServiceLabel('Enter the name:'),
				service_type = $(this).data('service'),
				$container   = $(this).prev('.service-container');

			if ( service_name ){
				// actualizar la base de datos
				var update = update_service_table( service_type, service_name );

				update.done(function (result) {

					console.log(result);
					if ( result.data ){
						// Mostrar el nuevo servicio
						var newService = createServiceDomElement( service_type, result.data, service_name );
						$container.append( newService );
					}else{
						alert('Error cannot add duplicate entry');
					}
				});
			}
		});



	// DELETE SERVICE /////////////////////////////////////////////////////////////////////



		$('.elimina_check').live('click', function () {
			var contenido = $(this).prev('label').text(),
				confirmar = confirm('Are you sure you want to delete '+contenido+'?');
			if ( confirmar == true ){

				var service_id = $(this).data('service_id');

				$.post(ajax_url, {
					service_id: service_id,
					action: 'ajax_delete_service'
				})

				.done(function (result){
					console.log(result);
				});


				$(this).parent('.cont_services').remove();
			}
		});





/*
	888b     d888                                                   888     888
	8888b   d8888                                                   888     888
	88888b.d88888                                                   888     888
	888Y88888P888  8888b.  88888b.   8888b.   .d88b.   .d88b.       888     888 .d8888b   .d88b.  888d888 .d8888b
	888 Y888P 888     "88b 888 "88b     "88b d88P"88b d8P  Y8b      888     888 88K      d8P  Y8b 888P"   88K
	888  Y8P  888 .d888888 888  888 .d888888 888  888 88888888      888     888 "Y8888b. 88888888 888     "Y8888b.
	888   "   888 888  888 888  888 888  888 Y88b 888 Y8b.          Y88b. .d88P      X88 Y8b.     888          X88
	888       888 "Y888888 888  888 "Y888888  "Y88888  "Y8888        "Y88888P"   88888P'  "Y8888  888      88888P'
												  888
											 Y8b d88P
											  "Y88P"
*/


		/**
		 * Mapea los datos de un formulario a un objeto JSON
		 * @param  selector    id o classe del formulario
		 * @return json
		 */
		function getFormData(selector) {
			var result = [],
				data   = $(selector).serializeArray();

			$.map(data, function (attr) {
				result[attr.name] = attr.value;
			});
			return result;
		}



	// SUBMENU USER-EDIT /////////////////////////////////////////////////////////////////



		function desapareVentanasEditUser(){
			$('#edit-account, #edit-profile').fadeOut(0);
			$('#edit-administration, #edit-services, #edit-photos').fadeOut(0);
			$('#edit-contact, #edit-hours, #edit-message, #edit-history').fadeOut(0);
			$('.barra-edit-users ul li a').removeClass('active-edit');
			$('body').removeClass('m-calendario');
			$('.user-create-tabs a').removeClass('active-edit');
		}


		function get_horarios_form_data(){
			var json = {};

			$('.select-horario-from').each(function (index, selectFrom){
				var day   = $(selectFrom).data('day');
				json[day] = {
					'from' : $(selectFrom).val(),
					'to'   : ''
				};
			});

			$('.select-horario-to').each(function (index, selectTo){
				var day      = $(selectTo).data('day');
				json[day].to = $(selectTo).val();
			});

			return json;
		}


		$('.user-create-tabs').on('click', function () {
			var activeTab = $(this).data('active');
			desapareVentanasEditUser();
			$(this).children('a').addClass('active-edit');
			if (activeTab == 'edit-account') {
				$('body').addClass('m-calendario');
			}
			$('#'+activeTab).fadeIn(0);
		});


		// CREATE NEW ESCORT USER
		$('#create-new-escort').on('click', function () {

			// make all create account tabs clickable
			$('.menu-add-user li').addClass('user-create-tabs');

			// create new user in the database save ID in model
			var userData = getFormData('#form-myCount-edit');

			// initialize new model with the user data
			window.account = new Escort(userData);

			// make contact tab the current active tab
			//$('.user-create-tabs[data-active="edit-contact"]').trigger('click');
		});


		$('#form-girlcontact-edit').on('submit', function () {
			if( _.isObject(account) ){
				var userContactData = getFormData(this);
				account.update( userContactData );
			}
		});


		$('#form-girlProfile-edit').on('submit', function () {
			if( _.isObject(account) ){
				var userProfileData = getFormData(this);
				account.update( userProfileData );
			}
		});


		$('#form-girlservices-edit').live('submit', function () {
			if( _.isObject(account) ){
				var userProfileData = getFormData(this);
				account.update( userProfileData );
			}
		});


		$('#form-girlMessage-edit').on('submit', function () {
			if( _.isObject(account) ){
				var userProfileData = getFormData(this);
				account.update( userProfileData );
			}
		});


		$('#form-girlhours-edit').on('submit', function () {

			var horarios = get_horarios_form_data();

			// if( _.isObject(account) ){}

		});



	// DELETE USER ///////////////////////////////////////////////////////////////////////



		function delete_user (user_id){
			return $.post(ajax_url, {
				user_id: user_id,
				security: ajax_nonce,
				action: 'ajax_delete_user'
			}, 'json');
		}


		$('.delete-user').on('click', function (e) {
			e.preventDefault();

			if ( confirm('Are you sure that you want to permanently delete the selected user?') ){
				var user_id = $(this).data('user_id'),
					remove  = delete_user(user_id);

				remove.done(function (result){
					window.location.reload();
				});
			}
		});



	// CHANGE USER ACTIVE STATUS /////////////////////////////////////////////////////////



		function set_user_active_status (user_id, status){
			return $.post(ajax_url, {
				user_id: user_id,
				status: status,
				security: ajax_nonce,
				action: 'set_user_active_status'
			}, 'json');
		}

		$('.toggle-active-status').live('click', function (e) {
			e.preventDefault();
			var $this   = $(this),
				user_id = $this.data('user_id'),
				status  = $this.data('active'),
				toggle  = set_user_active_status(user_id, status);

			toggle.done(function (result){
				if ( result.success ){
					var container = $this.parent('.views-profile-active').empty();

					if ( status == 0 ){
						container.append("<img class='toggle-active-status' src='"+theme_url+"/images/ico-no.png' data-user_id='"+user_id+"' data-active='1'>");
					} else {
						container.append("<img class='toggle-active-status' src='"+theme_url+"/images/ico-yes.png' data-user_id='"+user_id+"' data-active='0'>");
					}
				}
			});
		});




/*
	8888888888                                  888
	888                                         888
	888                                         888
	8888888   .d8888b   .d8888b .d88b.  888d888 888888
	888       88K      d88P"   d88""88b 888P"   888
	888       "Y8888b. 888     888  888 888     888
	888            X88 Y88b.   Y88..88P 888     Y88b.
	8888888888 88888P'  "Y8888P "Y88P"  888      "Y888
*/





		window.Escort = function(json) {
			this.attrs = {};
			$.extend(this.attrs, json);
			this.init();
		};


		Escort.prototype.set  = function(key, value){
			this.attrs[key] = value;
		};


		Escort.prototype.get  = function(key){
			return this.attrs[key];
		};


		Escort.prototype.save = function(event, escort){
			$.post(ajax_url, {
				user_data: escort.toJSON(),
				action: 'update_account_data'
			}, 'json')

			.done(function (data){
				console.log(data);
			});
		};


		Escort.prototype.create = function(event, escort){
			$.post(ajax_url, {
				user_data: escort.attrs,
				action: 'create_user_account'
			}, 'json').done(function (result){

				console.log(result);
				if ( result.success ){
					escort.set('ID', result.data.ID);
				}
			});
		};


		Escort.prototype.update = function(json){
			$.extend(this.attrs, json);
			this.eventListener.trigger('save', this);
		};


		Escort.prototype.toJSON = function(){
			return this.attrs;
		};


		Escort.prototype.validateUsername = function (username){
			return $.get(ajax_url, {
				username: username,
				action: 'check_username_availability'
			}, 'json');
		};


		Escort.prototype.validateEmail = function (email){
			return $.get(ajax_url, {
				email: email,
				action: 'check_email_availability'
			}, 'json');
		};


		Escort.prototype.validate = function(){

			var result = $.Deferred();
			var escort = this;

			this.validateUsername(this.attrs.username)
			.done(function (username){
				escort.valid = username.available;
			});

			this.validateEmail(this.attrs.email)
			.done(function (email){
				escort.valid = email.available;
				result.resolve(escort);
			});

			return result.promise();
		};


		Escort.prototype.addEventListener = function(){
			return this.eventListener = $(document);
		};


		Escort.prototype.init = function(){
			this.addEventListener();
			this.eventListener.on('save', this.save);
			this.eventListener.on('create', this.create);

			this.validate().done(function (escort){
				escort.eventListener.trigger('create', escort);
			});
		};


	});

})(jQuery);
