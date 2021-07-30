// JavaScript Document

$(document).ready(function(){
    
    var article = $('.factory .article'); 
        article.find('.icon').html('<i class="fas fa-chevron-down"></i>');
    var onoff=false;
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
   
        if(scroll>0 && onoff==false){
            article.find('.factory_box').hide();
            onoff=true;
        }
    });


    $('.factory .article .trigger').click(function(e){  
        e.preventDefault(); 
        var myArticle = $(this).parents('.article'); 
    
        if(myArticle.hasClass('hide')){   
            article.find('.factory_box').slideUp(400); 
            article.removeClass('show').addClass('hide'); 
            article.find('.icon').html('<i class="fas fa-chevron-down"></i>');

            myArticle.removeClass('hide').addClass('show'); 
            myArticle.find('.factory_box').slideDown(400);  
            myArticle.find('.icon').html('<i class="fas fa-chevron-up"></i>');
        } else { 
            myArticle.removeClass('show').addClass('hide');  
            myArticle.find('.factory_box').slideUp(400);  
            myArticle.find('.icon').html('<i class="fas fa-chevron-down"></i>');
        }  
  });
  


  });