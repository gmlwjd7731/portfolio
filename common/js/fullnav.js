
$(document).ready(function() {
  
    //2depth 열기/닫기
    $('.dropdownmenu').hover(
       function() { 
          $('.dropdownmenu .menu ul').fadeIn('normal',function(){$(this).stop();}); 
          $('#headerArea').animate({height:410},'fast').clearQueue();
       },function() {
          $('.dropdownmenu .menu ul').hide(); 
          $('#headerArea').animate({height:180},'fast').clearQueue();
     });

     //tab 처리
     $('.dropdownmenu .menu .depth1').on('focus', function () {        
        $('.dropdownmenu .menu ul').fadeIn('normal');
        $('#headerArea').animate({height:410},'fast').clearQueue();
     });

    $('.dropdownmenu .m6 li:last').find('a').on('blur', function () {        
        $('.dropdownmenu li.menu ul').hide();
        $('#headerArea').animate({height:180},'fast').clearQueue();
    });
});

/* 상단이동 버튼 */

$(document).ready(function () {
            
   $('.topMove').hide(); 
  
   $(window).on('scroll',function(){  
         var scroll = $(window).scrollTop(); 
        
        
      
         if(scroll>500){ 
            $('.topMove').fadeIn('slow');  
         }else{
            $('.topMove').fadeOut('fast'); 
         }
   });

   
   $('.topMove').click(function(e){
      e.preventDefault();
        
      $("html,body").stop().animate({"scrollTop":0},1000); 
   });


});

/* 패밀리 사이트 버튼 코드 */

$(document).ready(function() {

	$('.family .arrow').toggle(function(){		
      $('.family .aList').fadeIn('fast');
      $('.family .arrow').css('border-radius','20px 20px 0 0');
      $('.family .arrow').html('FAMILLY SITE'+'<i class="fas fa-chevron-up"></i>');
	}, function(){		
      $('.family .aList').fadeOut('fast');
      $('.family .arrow').css('border-radius','20px');
      $('.family .arrow').html('FAMILLY SITE'+'<i class="fas fa-chevron-down"></i>');
	});
	//tab키 처리
	  $('.family .arrow').on('focus', function () {        
              $('.family .aList').show();	
       });
       $('.family .aList li:last').find('a').on('blur', function () {        
              $('.family .aList').hide();
       });  
});

