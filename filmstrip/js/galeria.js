
$(document).ready(function() {
$("#galeria_barra_gal_txt").css({cursor: "pointer"});
$("#comp_galeria").css({display: "none"});
 
$(".compartir3").mouseenter(function() {
    $("#comp_galeria").fadeIn(0);
  }).mouseleave(function() {
    $("#comp_galeria").fadeOut(0);
  });

});


