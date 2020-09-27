(function ($) {

    /* Start Carousel slider */
    let ElementCarouselSlider   =   function( $scope, $ ) {

        let element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );

    };

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/printer-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/printer-post-carousel.default', ElementCarouselSlider );

        /* Element partners-carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/printer-partners-carousel.default', ElementCarouselSlider );

    } );

})( jQuery );