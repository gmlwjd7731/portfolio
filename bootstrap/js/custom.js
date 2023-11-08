$(document).ready(function () {

  
  var section1= $('#about').offset().top-300 ;
  var section2= $('#bestsellers').offset().top-300 ;
  var section3= $('#brandvalues').offset().top-300 ;
  var section4= $('#ideas').offset().top-300 ;

        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
           
            $('.nav').find('li').removeClass('active');
            
            
            
            if(scroll>=section1 && scroll<section2){
              $('.nav li:eq(0)').addClass('active');
            }else if(scroll>=section2 && scroll<section3){
              $('.nav li:eq(1)').addClass('active');                
            }else if(scroll>=section3 && scroll<section4){
              $('.nav li:eq(2)').addClass('active');
            }else if(scroll>=section4){
              $('.nav li:eq(3)').addClass('active');
            }
            
            
            
        });

});