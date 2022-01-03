'use strict';
jQuery(document).ready(function($) {
    if ( $(".latest-post--slider").length ) {

        $(".latest-post--slider").flickity({
            contain: true,
            draggable: true,
            freeScroll: true,
            groupCells: '100%',
            pageDots: false,
            prevNextButtons: true,
            autoPlay: true,
            autoPlay: 7000,
        });
    }
})