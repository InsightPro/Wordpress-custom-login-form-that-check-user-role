'use strict';
jQuery(document).ready(function($) {

    if ( $(".bc-product-grid--related").length ) {

        $(".bc-product-grid--related").flickity({
            contain: true,
            draggable: true,
            freeScroll: true,
            groupCells: '100%',
            pageDots: false,
            prevNextButtons: false,
            autoPlay: true,
            autoPlay: 3000,
            wrapAround: true,
            cellAlign: 'left',
        });
    }

    window.stepper = function( el, direction ) {

        var input = el.parent().find( 'input' ),
            val = input.val(),
            min = input.attr( 'data-min' ),
            max = input.attr( 'data-max' );

        if ( direction === 'up' ) {
            if ( typeof max !== typeof undefined && max !== false ) {
                if ( val > max ) {
                    input.val( parseInt( val ) + 1 );

                }
            } else {
                input.val( parseInt( val ) + 1 );

            }

        } if ( direction === 'down' ) {
            if ( typeof min !== typeof undefined && min !== false ) {
                if ( min < val ) {
                    input.val( parseInt( val ) - 1 );

                }
            } else {
                input.val( parseInt( val ) - 1 );

            }
        }
    };

    $('.bc-product-form__control--swatch input').each(function() {
        $(this).on('change', function() {
            var tabID = $(this).data('option-name');
            $('.mobile-option--swatch').find('.option-name').text(tabID);
            $(this).parent().parent().find('.bc-form__label-wrapper small').text(tabID);
            tabID = tabID.replace(/\s+/g, '-').toLowerCase();
            $('.bc-single-variant__details').removeClass('active');
            $(`#${tabID}`).addClass('active');
            var newStyle = $(this).next().find('.bc-product-variant__label--swatch').attr('style');
            $('.mobile-option--swatch .option-default--wrapper-patter-box span').attr('style', newStyle);
            $('html').css('overflow', 'auto');
            $('.bc-product-form__control.bc-product-form__control--swatch').removeClass('active');
        });
    });
    $('.bc-product-form__control--rectangle input').each(function() {
        $(this).on('change', function() {
            var tabID = $(this).data('option-name');
            $(this).parent().parent().find('.bc-form__label-wrapper small').text(tabID);
        });
    });


    // mobile variation modal
    $('.mobile-option--swatch').on('click', function() {
        $('.bc-product-form__control.bc-product-form__control--swatch').addClass('active');
        $('html').css('overflow', 'hidden');
    });
    $('.mobile-swatch--close, .option-bg').on('click', function() {
        $('html').css('overflow', 'auto');
        $('.bc-product-form__control.bc-product-form__control--swatch').removeClass('active');
    });

}) 