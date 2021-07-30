$(document).ready(function() {
    var swiper_tab = new Swiper('.swiper_tab', {
        autoHeight: true,
        speed : 500
    });

    swiper_tab.on('slideChange', function () {
        $(".tabs .active").removeClass('active');
        $(".tabs a").eq(swiper_tab.activeIndex).addClass('active');
    });
    
    $(".tabs a").on('touchstart mousedown', function(e) {
        e.preventDefault();
        $(".tabs .active").removeClass('active');
        
        $(this).addClass('active');

        //swiper.swipeTo($(this).index());					
        swiper_tab.slideTo($(this).index());
    });
    
    $(".tabs a").click(function(e) {
    
        e.preventDefault();
    
    });
});
