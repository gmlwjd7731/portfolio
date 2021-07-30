  $(document).ready(function() {
  	var screenSize = $(window).width();
		var screenHeight = $(window).height();
  	var current=false;
  	
		$("#content").css('margin-top',screenHeight);
		
  	if( screenSize > 768){
        $("#videoBG").show();
        $("#imgBG").hide();
      }
    if(screenSize <= 768){
        $("#videoBG").hide();
        $("#videoBG").attr('src','');
        $("#imgBG").show();
      }
  	
   $(window).resize(function(){    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
      screenSize = $(window).width(); 
      screenHeight = $(window).height();
		  
		  $("#content").css('margin-top',screenHeight);
		 
      if( screenSize > 768 && current==false){
      	
        $("#videoBG").show();
        $("#videoBG").attr('src','images/aaa.mp4');
        $("#imgBG").hide();
        current=true;
      }
      if(screenSize <= 768){
        $("#videoBG").hide();
        $("#videoBG").attr('src','');
        $("#imgBG").show();
        current=false;
      }
    }); 
		
		
		$('.down').click(function(){
			  screenHeight = $(window).height();
			  $('html,body').animate({'scrollTop':screenHeight}, 1000);
		});
		

    /* 상단이동 버튼 */

$(document).ready(function () {
            
  $('.topMove').hide(); 
 
  $(window).on('scroll',function(){  
        var scroll = $(window).scrollTop(); 
       
       
     
        if(scroll>350){ 
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

//헤더 코드

$('.menu_ham').toggle(function(){
  $('#headerArea').addClass('top0');
 $('#headerArea ul').slideDown();
  $('.menu_ham').addClass('open');
  
},function(){
  $('#headerArea ul').slideUp();
  $('.menu_ham').removeClass('open');
  $('#headerArea').removeClass('top0');
});

  
var current2=0;

$(window).resize(function(){
 var screenSize= $(window).width(); 
  
  if( screenSize > 1024){
      $('#headerArea').addClass('top0');
      $('#headerArea ul').show();
      $('.menu_ham').removeClass('open');
       current2=1;
  }
  if(current2==1 && screenSize <= 1024){
      $('#headerArea').removeClass('top0');
      $('#headerArea ul').hide();
      current2=0;
  }
});
		
  });