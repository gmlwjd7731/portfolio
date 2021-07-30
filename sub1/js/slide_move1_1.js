$(document).ready(function () {

   //메뉴 클릭 이동 코드
   $('.tit_box a').click(function(e){
         e.preventDefault();

         var value=0;

         if($(this).hasClass('link1')){
            value= $('.slide_con:eq(0)').offset().top-100; 
         }else if($(this).hasClass('link2')){  
            value= $('.slide_con:eq(1)').offset().top-100; 
         }else if($(this).hasClass('link3')){
            value= $('.slide_con:eq(2)').offset().top-150; 
         }
         
       $("html,body").stop().animate({"scrollTop":value},1000);
   });

   /* -------------상단 스티키메뉴 & 섹션 애니메이션 코드------------- */


        $('.tit_box li:eq(0)').find('a').addClass('spy');
        //첫번째 서브메뉴 활성화
        
        $('#content_area .main_txt').addClass('boxMove1');  
        
        var smh= $('.title_area').offset().top+750 ;

        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
           
            
            //sticky menu 처리
            if(scroll>smh){ 
                $('.subNav').addClass('navOn');
                
                $('header').hide();
            }else{
                $('.subNav').removeClass('navOn');
                
                $('header').show();
            }
            
            
            
            $('.tit_box li').find('a').removeClass('spy');
            
            
            
            if(scroll>=0 && scroll<800){
                
                $('#content .main_txt').addClass('boxMove1');
                
            }else if(scroll>=800 && scroll<1900){
                $('.tit_box li:eq(0)').find('a').addClass('spy');
                
                $('#content section:eq(0)').addClass('boxMove');
                
            }else if(scroll>=1900 && scroll<3500){
                $('.tit_box li:eq(1)').find('a').addClass('spy');
                
                 $('#content section:eq(1)').addClass('boxMove');
            }else if(scroll>=3500){
                $('.tit_box li:eq(2)').find('a').addClass('spy');
                
                 $('#content section:eq(2)').addClass('boxMove');
            }
            
            
            
        });


    /*---------------------미래지향기업 슬라이드 메뉴 코드---------------------- */

$(document).ready(function() {
    var imageCount=5;  
    var cnt=1;  
    var direct=1;  
      
       $('.btn1').css('background','#fff'); 
  
  
    $('.mbutton').click(function(event){  
  
      var $target=$(event.target); 
  
      for(var i=1;i<=imageCount;i++){
                $('.btn'+i).css('background','none'); 
      }
  
      if($target.is('.btn1')){  
             $('.gallery').animate({left:0}, 'slow');
                  cnt=1;
                  direct=1;
      }else if($target.is('.btn2')){ 
             $('.gallery').animate({left:-1200}, 'slow');
                  cnt=2;
      }else if($target.is('.btn3')){
             $('.gallery').animate({left:-2400}, 'slow');
                  cnt=3;
      }else if($target.is('.btn4')){  
             $('.gallery').animate({left:-3600}, 'slow');
                  cnt=4;
      }else if($target.is('.btn5')){  
             $('.gallery').animate({left:-4800}, 'slow');
                  cnt=5;
                  direct=-1;
      }
    
        
        
      $('.btn'+cnt).css('background','#fff');
     
    });
   
  
  
    $('.future_box .btn').click(function(){ 
  
     if($(this).is('.right_btn')){
         if(cnt==imageCount)cnt=0;  
         if(cnt==imageCount+1)cnt=1;  
         cnt++; 
     }else if($(this).is('.left_btn')){
         if(cnt==1)cnt=imageCount+1;
         if(cnt==0)cnt=imageCount;
         cnt--; 
     }
   
     $('.gallery').animate({left:(cnt-1)*-1200}, 'slow').clearQueue();  
                          
     for(var i=1;i<=imageCount;i++){
          $('.btn'+i).css('background','none'); 
     }
      $('.btn'+cnt).css('background','#fff');
  
     if($(this).is('.right_btn')){
        if(cnt==imageCount){cnt=0;direct=1;}
     }else if($(this).is('.left_btn')){
        if(cnt==1){cnt=imageCount+1;direct=-1;}
     }
     
     });
    
  });
  
  
  
  
  



});