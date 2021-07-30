$(document).ready(function () {

   $('.tit_box a').click(function(e){
         e.preventDefault();

         var value=0;

         if($(this).hasClass('link1')){ 
            value= $('.slide_con:eq(0)').offset().top-200;  
         }else if($(this).hasClass('link2')){  
            value= $('.slide_con:eq(1)').offset().top-200; 
         }else if($(this).hasClass('link3')){
            value= $('.slide_con:eq(2)').offset().top-200; 
         }
         
       $("html,body").stop().animate({"scrollTop":value},1000);
   });


   /* -------------상단 스티키메뉴 & 섹션 애니메이션 코드------------- */


   $('.tit_box li:eq(0)').find('a').addClass('spy');
   
   $('#content_area section:eq(0)').addClass('boxMove');  
   
   var smh= $('.title_area').offset().top+200 ;
   var h1= $('.content_area section:eq(1)').offset().top-450;
   var h2= $('.content_area section:eq(2)').offset().top-300;

   $(window).on('scroll',function(){
       var scroll = $(window).scrollTop();
      
       
       if(scroll>smh){ 
           $('.subNav').addClass('navOn');           
           $('header').hide();
       }else{
           $('.subNav').removeClass('navOn');
           $('header').show();
       }
          
       
       $('.tit_box li').find('a').removeClass('spy');
       
       if(scroll>=0 && scroll<1300){
           $('.tit_box li:eq(0)').find('a').addClass('spy');
           
           $('#content section:eq(0)').addClass('boxMove');

       }else if(scroll>=1300 && scroll<2200){
           $('.tit_box li:eq(1)').find('a').addClass('spy');
           
            $('#content section:eq(1)').addClass('boxMove');
       }else if(scroll>=2200){
           $('.tit_box li:eq(2)').find('a').addClass('spy');
           
            $('#content section:eq(2)').addClass('boxMove');
       }
       
       
       
   });

});