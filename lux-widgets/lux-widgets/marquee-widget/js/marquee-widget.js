jQuery( window ).on( 'load', function() {
  var $marquees = jQuery('.lux-marquee');
  jQuery($marquees).each(function() {
    var $marqueeId = jQuery(this).attr("id");
    var $marqueeSlides = jQuery(this).children('.lux-marquee-slide');
    if ($marqueeSlides.length > 1) {
      jQuery('#' + $marqueeId).owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayHoverPause:true,
        stagePadding: 0,
        items: 1,
        singleItem:true,
      });
    } else {
      jQuery('#' + $marqueeId).owlCarousel({
        loop:false,
        margin:0,
        nav:false,
        dots:false,
        autoplay:false,
        autoplayHoverPause:false,
        stagePadding: 0,
        items: 1,
        singleItem:true,
        mouseDrag:false
      });
    }
  });

});
