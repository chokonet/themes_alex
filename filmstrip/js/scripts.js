jQuery(document).ready(function($){
  $('#barra_submnu_options').tinyscrollbar();  
  $('#barra_submnu_options3').tinyscrollbar(); 
});
function mainmenu(){
jQuery(" #insesion ").css({display: "none"});
jQuery(" #comp ").css({display: "none"});
jQuery(" #insesion_cierre").css({cursor: "pointer"});
jQuery(" #col_single_barra_gal_txt").css({cursor: "pointer"});
jQuery(" #ses_bt").css({cursor: "pointer"});
jQuery(" #comp_galeria").css({display: "none"});
jQuery(" .bar1").css({display: "none"});
jQuery(" .bar2").css({display: "none"});
jQuery(" #barra_submnu_list").css({cursor: "pointer"});
//mnu header
jQuery(" .ov1, .ov2, .ov3, .ov4, .ov5, .ov6, .ov7 ").css({display: "none"});

}
//scroll_ submenu options
jQuery(document).ready(function($){
 
    //muesta submenu header
    mainmenu();
    //click_buscador_options
    $(".selec1").click(function(event){
    event.preventDefault();
    $(".bar1").slideDown(400);
   });
    //over_buscador_options
    $("#bus").mouseleave(function(event){
    event.preventDefault();
    $(".bar1").slideUp(400);
   });
    //click_buscador_options
    $(".selec2").click(function(event){
    event.preventDefault();
    $(".bar2").slideDown(400);
   });
    //over_buscador_options
    $("#bus2").mouseleave(function(event){
    event.preventDefault();
    $(".bar2").slideUp(400);
   });

    //mustra inicio de sesion
    $(".sesion_bt").click(function(event){
    event.preventDefault();
    $("#insesion").fadeIn(750);
   });
    //cierra inicio de sesion
    $("#insesion_cierre").click(function(event){
    event.preventDefault();
    $("#insesion").fadeOut(750);
   });
    
$(".compartir").mouseenter(function() {
    $("#comp").fadeIn(0);
  }).mouseleave(function() {
    $("#comp").fadeOut(0);
  });
  //menu header
$("#bt1").hover(function() {
  $(".ov2, .ov3, .ov4, .ov5, .ov6, .ov7").slideUp({duration:0, queue:false});
    $("#bt6, #bt2, #bt3, #bt4, #bt5, #bt7").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
    $(".ov1").slideDown({duration:450, queue:false});
    $("#bt1").css({"border-top":"4px solid #e13310"}).css({"background-color":"#f4f4f4"});
    
  })

$("#bt2").hover(function() {
  $(".ov1, .ov3, .ov4, .ov5, .ov6, .ov7").slideUp({duration:0, queue:false});
    $("#bt6, #bt1, #bt3, #bt4, #bt5, #bt7").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
    $(".ov2").slideDown({duration:450, queue:false});
    $("#bt2").css({"border-top":"4px solid #e13310"}).css({"background-color":"#f4f4f4"});
    
  })

$("#bt3").hover(function() {
  $(".ov1, .ov2, .ov4, .ov5, .ov6, .ov7").slideUp({duration:0, queue:false});
    $("#bt6, #bt1, #bt2, #bt4, #bt5, #bt7").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
    $(".ov3").slideDown({duration:450, queue:false});
    $("#bt3").css({"border-top":"4px solid #e13310"}).css({"background-color":"#f4f4f4"});
    
  })

$("#bt4").hover(function() {
  $(".ov1, .ov3, .ov2, .ov5, .ov6, .ov7").slideUp({duration:0, queue:false});
    $("#bt6, #bt1, #bt3, #bt2, #bt5, #bt7").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
    $(".ov4").slideDown({duration:450, queue:false});
    $("#bt4").css({"border-top":"4px solid #e13310"}).css({"background-color":"#f4f4f4"});
    
  })

$("#bt5").hover(function() {
  $(".ov1, .ov3, .ov4, .ov2, .ov6, .ov7").slideUp({duration:0, queue:false});
    $("#bt6, #bt1, #bt3, #bt4, #bt2, #bt7").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
    $(".ov5").slideDown({duration:450, queue:false});
    $("#bt5").css({"border-top":"4px solid #e13310"}).css({"background-color":"#f4f4f4"});
    
  })

$("#bt6").hover(function() {
  $(".ov1, .ov3, .ov4, .ov5, .ov2, .ov7").slideUp({duration:0, queue:false});
    $("#bt2, #bt1, #bt3, #bt4, #bt5, #bt7").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
    $(".ov6").slideDown({duration:450, queue:false});
    $("#bt6").css({"border-top":"4px solid #e13310"}).css({"background-color":"#f4f4f4"});
    
  })
$("#bt7").hover(function() {
  $(".ov1, .ov3, .ov4, .ov5, .ov6, .ov2").slideUp({duration:0, queue:false});
    $("#bt6, #bt1, #bt3, #bt4, #bt5, #bt2").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
    $(".ov7").slideDown({duration:450, queue:false});
    $("#bt7").css({"border-top":"4px solid #e13310"}).css({"background-color":"#f4f4f4"});
    
  })
$(".ov7, .ov1, .ov3, .ov4, .ov5, .ov6, .ov2").mouseleave(function() {
   $(".ov7, .ov1, .ov3, .ov4, .ov5, .ov6, .ov2").slideUp(400);
    $("#bt7, #bt6, #bt1, #bt3, #bt4, #bt5, #bt2").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
  });
$("#menu").mouseleave(function() {
   $(".ov7, .ov1, .ov3, .ov4, .ov5, .ov6, .ov2").slideUp(400);
    $("#bt7, #bt6, #bt1, #bt3, #bt4, #bt5, #bt2").css({"border-top":"4px solid #fff"}).css({"background-color":"#fff"});
  });
//fin menu header

$("#mn1").hover(function() {
    $("#mn1").animate({"width":"619px"}, {duration:750, queue:false});
    $("#mni1").animate({"width":"619px"}, {duration:750, queue:false});
    $("#mn2").animate({"width":"104.3px"}, {duration:750, queue:false});
    $("#mn3").animate({"width":"104.3px"}, {duration:750, queue:false});
    $("#mn4").animate({"width":"104.3px"}, {duration:750, queue:false});
  })
  $("#mn2").hover(function() {
    $("#mn2").animate({"width":"619px"}, {duration:750, queue:false});
    $("#mni2").animate({"width":"619px"}, {duration:750, queue:false});
    $("#mn1").animate({"width":"104.3px"}, {duration:750, queue:false});
    $("#mn3").animate({"width":"104.3px"}, {duration:750, queue:false});
    $("#mn4").animate({"width":"104.3px"}, {duration:750, queue:false});
  })
  $("#mn3").hover(function() {
    $("#mn3").animate({"width":"619px"}, {duration:750, queue:false});
    $("#mni3").animate({"width":"619px"}, {duration:750, queue:false});
    $("#mn1").animate({"width":"104.3px"}, {duration:750, queue:false});
    $("#mn2").animate({"width":"104.3px"}, {duration:750, queue:false});
    $("#mn4").animate({"width":"104.3px"}, {duration:750, queue:false});
  })
  $("#mn4").hover(function() {
    $("#mn4").animate({"width":"619px"}, {duration:750, queue:false});
    $("#mni4").animate({"width":"619px"}, {duration:750, queue:false});
    $("#mn1").animate({"width":"104.3px"}, {duration:750, queue:false});
    $("#mn2").animate({"width":"104.3px"}, {duration:750, queue:false});
    $("#mn3").animate({"width":"104.3px"}, {duration:750, queue:false});
  })
  $("#menu_home").mouseleave(function() {
   $("#mn4").animate({"width":"234px"}, {duration:750, queue:false});
    $("#mn1").animate({"width":"234px"}, {duration:750, queue:false});
    $("#mn2").animate({"width":"234px"}, {duration:750, queue:false});
    $("#mn3").animate({"width":"234px"}, {duration:750, queue:false});
  });

});
