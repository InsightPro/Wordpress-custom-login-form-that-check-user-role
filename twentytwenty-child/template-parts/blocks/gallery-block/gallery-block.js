jQuery(document).ready(function($) {
    $( window ).on( 'resize', function() {
        var isMobileTablet = setTimeout( function() {
            if ( $( window ).innerWidth() < 1025 ) {
                clearInterval( isMobileTablet );
                $('[data-slider] .gallery-block-wrapper').flickity( {
                    contain: true,
                    draggable: true,
                    freeScroll: true,
                    groupCells: '100%',
                    pageDots: false,
                    prevNextButtons: true,
                    wrapAround: true,
                    cellAlign: 'left',
                } )
            }
        },100);
    } );

    if ( $( window ).innerWidth() < 1025 ) {
        $('[data-slider] .gallery-block-wrapper').flickity( {
            contain: true,
            draggable: true,
            freeScroll: true,
            groupCells: '100%',
            pageDots: false,
            prevNextButtons: true,
            wrapAround: true,
            cellAlign: 'left',
        } )
    }
})