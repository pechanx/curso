

(function($) {
    "use strict";
    jQuery(document).on("ready", function() {


        //animation active
    new WOW().init();
    //menu scrollr    
    $('.main-menu li a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target
      || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top - 60;
        $('html,body')
        .animate({scrollTop: targetOffset}, 1000);
       return false;
      }
    }
  });



  
    


      //mobile-menu
     $("#slick-nav").slicknav({
        prependTo:'.mobile-menu',
        allowParentlinks:true
    });
     



  });


})(jQuery);



/*================================ End ====================================*/