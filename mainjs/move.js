// JavaScript Document

$(document).ready(function() {

  var timeonoff;   
  var imageCount=4; 
  var cnt=1;   
  var onoff=true; 
  
  $('.btn1').css('background','#e61e2b'); 
  $('.btn1').css('width','36');
  
  $('.visual .link1').fadeIn('slow'); 

  function moveg(){
    cnt++;  
   for(var i=1;i<=imageCount;i++){
          $('.visual .link'+i).hide(); 
   }
   $('.visual .link'+cnt).fadeIn('slow');
                         
   for(var i=1;i<=imageCount;i++){
    $('.btn'+i).css('background','#fff'); 
    $('.btn'+i).css('width','18'); 
    }
    $('.btn'+cnt).css('background','#e61e2b');
    $('.btn'+cnt).css('width','36');                  
     if(cnt==imageCount)cnt=0;
   }
  timeonoff= setInterval( moveg , 5000);

  
 $('.mbutton').click(function(event){  
     var $target=$(event.target); 
       clearInterval(timeonoff);    
 
     for(var i=1;i<=imageCount;i++){
         $('.visual .link'+i).hide();
       } 
 
    if($target.is('.btn1')){
       cnt=1;
    }else if($target.is('.btn2')){
       cnt=2; 
    }else if($target.is('.btn3')){ 
       cnt=3; 
    }else if($target.is('.btn4')){
       cnt=4; 
    }
    $('.visual .link'+cnt).fadeIn('slow'); 
    
    for(var i=1;i<=imageCount;i++){
      $('.btn'+i).css('background','#fff');
      $('.btn'+i).css('width','18');
    }
      $('.btn'+cnt).css('background','#e61e2b');
      $('.btn'+cnt).css('width','36');
     
        if(cnt==imageCount)cnt=0;  
        timeonoff= setInterval( moveg , 5000); 
     
        if(onoff==false){
          onoff=true;
       $('.ps').css('background','url(images/stop.svg) no-repeat').css('background-size','contain');
       }
        
    });


   //stop/play 버튼 
  $('.ps').click(function(){ 
       if(onoff==true){
         clearInterval(timeonoff);   
       $(this).css('background','url(images/play.svg) no-repeat').css('background-size','contain');
           onoff=false;   
     }else{  // false
      timeonoff= setInterval( moveg , 5000); 
       $(this).css('background','url(images/stop.svg) no-repeat').css('background-size','contain');
       onoff=true; 
   }
});	

});	

/* 제품소개 영역 */

$(document).ready(function() {

$('.product .con li:first').fadeIn('fast');
$('.product .select li:first a').addClass('current');

     $('.product .select a').click(function(e){
         e.preventDefault();
         var ind = $(this).index('.product .select a'); 
     
         $('.product .con li').hide();
         $('.product .con li:eq('+ind+')').fadeIn('fast');
         $('.product .select li a').removeClass('current')
         $('.product .select li:eq('+ind+') a').addClass('current');

         

    
     });

     
});


/* 스크롤 애니메이션 */

$(window).on('scroll',function(){
    var scroll = $(window).scrollTop();

    if(scroll>=400 && scroll<1000){
      $('#content .cocaStory li:eq(0)').addClass('boxMove');
    }else if(scroll>=700 && scroll<1500){
      $('#content .cocaStory li:eq(1)').addClass('boxMove1');
    }else if(scroll>=1500){
      $('#content .cocaStory li:eq(2)').addClass('boxMove');
    }
})







