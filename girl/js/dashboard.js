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



		// drag and drop
		function dragdrop(){

			$( ".draggable" ).draggable({
				revert: function ( event, ui ) {
					return !event;
				},
				// start: function(event, ui) {
				// 	ui.helper.data('containsDrop', 0);
				// },
			});
			 $(".droppable").droppable({

		    });


		}



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


		function createServiceDomElement(prefix, label){

			var label = $.trim(label);

			var contenedor = crearContenedorServicios();

			$('<input></input>',{
				'type'   : 'checkbox',
				'name'   : prefix,
				'value'  : label,
				'id'     : prefix+'-'+label
			}).appendTo(contenedor);

			$('<label></label>',{
				'for'    : prefix+'-'+label,
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
				regExp   = /^[a-zA-Z0-9 _]*[a-zA-Z0-9][a-zA-Z0-9 _]*$/;

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



		$('#bt-add-services').on('click', function () {
			var servicio = getServiceLabel('Please enter new service name:');
			if ( servicio ){
				var contenedor = createServiceDomElement( 'ordinary', servicio );
				contenedor.appendTo('#add-services');
			}
		});



	// ADD EXTRA SERVICES ///////////////////////////////////////////////////////////////////



		$('#bt-add-extra-services').on('click', function () {
			var extraServicio = getServiceLabel('Please enter new extra service name:');
			if ( extraServicio ){
				var contenedor = createServiceDomElement( 'extra', extraServicio );
				contenedor.appendTo('#add-extra-services');
			}
		});



	// ADD TAGS ///////////////////////////////////////////////////////////////////////////



		$('#bt-add-tags').on('click', function () {
			var tags = getServiceLabel('Please enter new tag name:');
			if ( tags ){
				var contenedor = createServiceDomElement( 'tags', tags );
				contenedor.appendTo('#add-tags');
			}
		});



	// DELETE SERVICE /////////////////////////////////////////////////////////////////////



		$('.elimina_check').live('click', function () {
			var contenido = $(this).prev('label').text(),
				confirmar = confirm('Are you sure you want to delete '+contenido+'?');
			if ( confirmar == true ){
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
		});


		$('#form-girlcontact-edit').on('submit', function () {
			if( _.isObject(account) ){
				var userContactData = getFormData(this);
				account.update(userContactData);
			}
		});


		$('#form-girlProfile-edit').on('submit', function () {
			if( _.isObject(account) ){
				var userProfileData = getFormData(this);
				account.update(userProfileData);
			}
		});


		$('#form-girlservices-edit').on('submit', function () {
			console.log('entro');
			if( _.isObject(account) ){
				var userProfileData = getFormData(this);
				account.update(userProfileData);
			}
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

				escort.set('ID', result.data.ID);

				console.log(result);
				// if ( result.success ){
					// escort.set('ID', result.data.ID);
				// }
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
