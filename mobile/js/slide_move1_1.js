$(document).ready(function () {


   //메뉴 클릭 이동 코드
   $('.subNav a').click(function(e){
         e.preventDefault();

         var value=0;

         if($(this).hasClass('link1')){
            value= $('.slide_con:eq(0)').offset().top-160; 
         }else if($(this).hasClass('link2')){  
            value= $('.slide_con:eq(1)').offset().top-160; 
         }else if($(this).hasClass('link3')){
            value= $('.slide_con:eq(2)').offset().top-210; 
         }
         
       $("html,body").stop().animate({"scrollTop":value},1000);
       
   });

   

   /* -------------상단 스티키메뉴 & 섹션 애니메이션 코드------------- */


        $('.subNav li:eq(0)').find('a').addClass('spy');
        //첫번째 서브메뉴 활성화
        
        $('#content_area .main_txt').addClass('boxMove1');  
        
        var smh= $('.visual').offset().top+310 ;

        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
           
            
            //sticky menu 처리
            if(scroll>smh){ 
                $('.subNav').addClass('navOn');                
                $('header').css('box-shadow','none');
                $('.subNav ul').css('margin','80px 0 0 0');
            }else{
                $('.subNav').removeClass('navOn');
                $('header').css('box-shadow','none');
                $('.subNav ul').css('margin','0 auto');
            }
            
            
            
            $('.subNav li').find('a').removeClass('spy');
            
            
            
            if(scroll>=0 && scroll<200){
                
                $('#content .main_txt').addClass('boxMove1');
                $('.subNav li:eq(0)').find('a').addClass('spy');
            }else if(scroll>=200 && scroll<1000){
                $('.subNav li:eq(0)').find('a').addClass('spy');
                
                $('#content section:eq(0)').addClass('boxMove');
                
            }else if(scroll>=1000 && scroll<2000){
                $('.subNav li:eq(1)').find('a').addClass('spy');
                
                 $('#content section:eq(1)').addClass('boxMove');
            }else if(scroll>=2000){
                $('.subNav li:eq(2)').find('a').addClass('spy');
                
                 $('#content section:eq(2)').addClass('boxMove');
            }
            
            
            
        });



});