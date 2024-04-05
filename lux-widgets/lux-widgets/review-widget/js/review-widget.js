jQuery( window ).on( 'load', function() {
  // RUN SO RESET/RESIZE
  stretchFullWidthRows();

  var $reviews = jQuery('.lux-review');
  jQuery($reviews).each(function() {
    var $reviewId = jQuery(this).attr("id");
    var $reviewSlides = jQuery(this).children('.lux-review-slide');
    if ($reviewSlides.length > 1) {
      jQuery('#' + $reviewId).owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayHoverPause:true,
        autoWidth:true,
        center: true,
        items: 1,
        singleItem:true,
        responsive:{
          0:{
            stagePadding: 50,
          },
          1000:{
            stagePadding: 150,
          }
        }
      });
    } else {
      jQuery('#' + $reviewId).owlCarousel({
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

  jQuery('.lux-review').each(function() {
    //Find each set of dots in this carousel
    jQuery(this).find('.owl-dot').each(function(index) {
      //Add one to index so it starts from 1
      jQuery(this).attr('aria-label', index + 1);
    });
  });

});

// SITEORIGIN(SO) RESET/RESIZE
fullContainer = jQuery( 'body' );

// STRETCH FULLWIDTH ROWS
function stretchFullWidthRows() {
  var $panelsRow = jQuery( '.siteorigin-panels-stretch.panel-row-style' );
  $panelsRow.each( function () {
    var $$ = jQuery( this );

    var stretchType = $$.data( 'stretch-type' );
    var defaultSidePadding = stretchType === 'full-stretched-padded' ? '' : 0;

    // RESET STYLES ASSOCIATED WITH ROW STRETCHING
    $$.css( {
      'margin-left': 0,
      'margin-right': 0,
      'padding-left': defaultSidePadding,
      'padding-right': defaultSidePadding
    } );

    var leftSpace = $$.offset().left - fullContainer.offset().left,
      rightSpace = fullContainer.outerWidth() - leftSpace - $$.parent().outerWidth();

    $$.css( {
      'margin-left': - leftSpace,
      'margin-right': - rightSpace,
      'padding-left': stretchType === 'full' ? leftSpace : defaultSidePadding,
      'padding-right': stretchType === 'full' ? rightSpace : defaultSidePadding
    } );

    var cells = $$.find( '> .panel-grid-cell' );

    if ( stretchType === 'full-stretched' && cells.length === 1 ) {
      cells.css( {
        'padding-left': 0,
        'padding-right': 0
      } );
    }

    $$.css( {
      'border-left': defaultSidePadding,
      'border-right': defaultSidePadding
    } );
  } );

  if ( $panelsRow.length ) {
    jQuery( window ).trigger( 'panelsStretchRows' );
  }
}
