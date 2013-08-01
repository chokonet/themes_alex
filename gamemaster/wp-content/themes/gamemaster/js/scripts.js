//menu_iniciar sesion
$(document).ready(function(){
      //menu_iniciar sesion
    $("#h_sesion").css("cursor","pointer");

	$("#h_sesion").click(function() {
		$("#in_sesion").fadeIn();
		$("#con_face").fadeOut();
		return false;
	});
	$("#in_sesion").mouseleave(function() {
        $("#in_sesion").fadeOut();
		return false;
      });


	//menu_conectar_face
    $("#h_cface").css("cursor","pointer");

	$("#h_cface").click(function() {
		$("#con_face").fadeIn();
		$("#in_sesion").fadeOut();
		return false;
	});
	$("#con_face").mouseleave(function() {
        $("#con_face").fadeOut();
		return false;
      });

	
});