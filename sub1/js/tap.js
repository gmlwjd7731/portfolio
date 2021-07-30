// JavaScript Document

$(document).ready(function(){
    $('#content .contlist:eq(0)').show(); 
    $('#content .tab1').addClass('current');
        
      $('#content .tab').click(function(e){
        e.preventDefault(); 
        
        var ind = $(this).index('#content .tab'); 

        $("#content .contlist").hide();
        $("#content .contlist:eq("+ind+")").fadeIn('fast'); 
        $('.tab').removeClass('current')       
        $(this).addClass('current');
        
    });

    $('.video ul li a').click(function(){

      $("html,body").stop().animate({"scrollTop":1220},400);

  });



  });