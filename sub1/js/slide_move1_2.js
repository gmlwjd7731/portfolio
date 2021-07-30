$(document).ready(function () {

   $('.tit_box a').click(function(e){
         e.preventDefault();

         var value=0;

         if($(this).hasClass('link1')){ 
            value= $('.slide_con:eq(0)').offset().top-200;  
         }else if($(this).hasClass('link2')){  
            value= $('.slide_con:eq(1)').offset().top-200; 
         }
         
       $("html,body").stop().animate({"scrollTop":value},1000);
   });

   //코카콜라 히스토리 코드
   $('.img_box .con li:first').fadeIn('fast');
   $('.img_box .thum li:first').addClass('current');

        $('.img_box .thum a').click(function(e){
            e.preventDefault();
            var ind = $(this).index('.img_box .thum a'); 
        
            $('.img_box .con li').hide();
            $('.img_box .con li:eq('+ind+')').fadeIn('fast');
            $('.img_box .thum li').removeClass('current')
            $('.img_box .thum li:eq('+ind+')').addClass('current');
        });

});