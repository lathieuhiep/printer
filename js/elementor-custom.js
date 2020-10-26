(function ($) {

    /* Start Carousel slider */
    let ElementCarouselSlider = function( $scope, $ ) {

        let element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );

    };

    /* Start Circle Progress */
    let ElementCircleProgress = function( $scope, $ ) {
        let itemCircleProgress = $scope.find( '.element-chart' );

        itemCircleProgress.easyPieChart({
            barColor: '#ffffff',
            trackColor: '',
            scaleColor: '#ffffff',
            scaleLength: 5,
            lineCap: 'square',
            lineWidth: 8,
            size: 120,
            rotate: 0, // in degrees
            animate: {
                duration: 2500,
                enabled: true
            },
            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
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