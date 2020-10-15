(function ($) {

    /* Start Carousel slider */
    let ElementCarouselSlider = function( $scope, $ ) {

        let element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );

    };

    /* Start Circle Progress */
    let ElementCircleProgress = function( $scope, $ ) {
        let itemCircleProgress = $scope.find( '.element-circle' );

        itemCircleProgress.circleProgress({
            value: 0.5,
            size: 50,
            fill: {
                gradient: ["red", "orange"]
            },
        }).on('circle-animation-progress', function(event, progress, stepValue) {
            $(this).find('strong').html( ( stepValue.toFixed(2).substr(1) ) * 100 + '<i>%</i>' );
        });

    };

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/printer-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/printer-post-carousel.default', ElementCarouselSlider );

        /* Element partners-carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/printer-partners-carousel.default', ElementCarouselSlider );

        /* Element Slide Full */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/printer-slider-full.default', ElementCarouselSlider );

        /* Element Slide Full */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/printer-circle-progress.default', ElementCircleProgress );

    } );

})( jQuery );