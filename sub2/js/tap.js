// JavaScript Document

$(document).ready(function(){

    $('.tabs .contlist:eq(0)').show(); 
    $('.tabs .tab1').addClass('current'); 
        
      $('.tabs .tab').click(function(e){
        e.preventDefault();    
        
        var ind = $(this).index('.tabs .tab'); 

        $(".tabs .contlist").hide();
        $(".tabs .contlist:eq("+ind+")").fadeIn('fast'); 
        $('.tab').removeClass('current')      
        $(this).addClass('current'); 
        
    });


  });