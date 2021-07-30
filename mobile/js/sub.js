$(document).ready(function() {
  var op = false;  
  
  $(".menu").click(function(e) { 
    e.preventDefault(); 
      
      var documentHeight =  $(document).height();
      $("#gnb").css('height',documentHeight); 

     if(op==false){
       $("#gnb").animate({right:0,opacity:1}, 'fast');
       $('#headerArea').addClass('mn_open');
       op=true;
     }else{
       $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
       $('#headerArea').removeClass('mn_open');
       op=false;
     }

  });
  

   var onoff=[false,false,false,false,false];
   var arrcount=onoff.length;
   
   
   $('#gnb .depth1 h3 a').click(function(e){
    e.preventDefault(); 
       var ind=$(this).parents('.depth1').index();
       
       console.log(ind);
       
      if(onoff[ind]==false){
       
        $(this).parents('.depth1').find('ul').slideDown('slow');
        $(this).parents('.depth1').siblings('li').find('ul').slideUp();
        for(var i=0; i<arrcount; i++) onoff[i]=false; 
        onoff[ind]=true;

        $('.depth1 span').html('<i class="fas fa-chevron-down"></i>');  
        $(this).find('span').html('<i class="fas fa-chevron-up"></i>'); 
          
           
      }else{
        $(this).parents('.depth1').find('ul').slideUp('fast'); 
        onoff[ind]=false;   
          
        $(this).find('span').html('<i class="fas fa-chevron-down"></i>');  
      }
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

/*헤더 배경처리*/

var on_off=false;  

   $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();

        if(scroll>1){
            $('#headerArea').css('box-shadow','0 0 10px #999');
        }else{
            if(on_off==false){
                $('#headerArea').css('box-shadow','none');
            }
        }; 
        
     });
 
 });
