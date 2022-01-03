'use strict';
jQuery(document).ready(function($) {

    function mobileFooterAccordion() {
        var accodion_title = $('.widget_nav_menu .widget-title');
        accodion_title.each(function() {
            $(this).on('click', function() {
                if ($(this).hasClass('is--open')) {
                    $(this).removeClass('is--open');
                } else {
                    accodion_title.removeClass('is--open');
                    $(this).addClass('is--open');
                }
            })
        })
    }

    const smallDevice = window.matchMedia("(max-width: 699px)");

    smallDevice.addListener(handleDeviceChange);

    function handleDeviceChange(e) {
        if (e.matches) {
            mobileFooterAccordion();
        }
    }

    // Run it initially
    handleDeviceChange(smallDevice);

    // sticky header on scroll

    var header = $('#header');
    
    var startPosition = 100;
    
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if ( height > startPosition ) {
            header.addClass('sticky-header');
            $('.to-the-top').addClass('active');
        } else {
            header.removeClass('sticky-header');
            $('.to-the-top').removeClass('active');
        }
    });

    // back to top

    $('.to-the-top').on('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    } )


    // change slide when click on custom nav flickty previuos and next button

    if ($('.carousel-control').length) {
        $('.carousel-control').on( 'change.flickity', function( event, index ) {
            $('.custom-tab-carousel').flickity( 'select', index );
        });
    }

    if ( $('.change-form').length ) {
        $('.change-form').on('click', function(e) {
            e.preventDefault();
            $('.toggle-form_wrapper').toggleClass('active_wrapper');
        })
    }

    // show add to cart message on top of the page

    $( '.bc-btn--add_to_cart' ).on( 'click', function( e ) {
        var checkExist = setInterval( function() {
        $(e.target).addClass('added').text('Adding!');
           if ( $( '.bc-ajax-add-to-cart__message' ).length ) {
                clearInterval( checkExist );
                setTimeout(function() {
                    $(e.target).removeClass('added').text('Add To Cart');
                    $('body').addClass('opened-cart');
                    $('html').css('overflow-y', 'hidden');
                },500)
            }
        }, 100 );
    } );

    $('.desktop-search-toggle').on('click', function() {
        showSearchModal($(this));
    })
    $('.mobile-search-toggle').on('click', function() {
        showSearchModal($(this));
    })
    
    function showSearchModal ( el ) {
        var targetID = $(el).data('target');
        $(targetID).toggleClass('active');
    }

    $('.menu-item-bigcommerce-cart').on('click', function(e) {
        e.preventDefault();
        $('body').addClass('opened-cart');
        $('html').css('overflow-y', 'hidden');
    });
    
    $('.side-cart-bg, .close-cart').on('click', function() {
        $('body').removeClass('opened-cart');
        $('html').css('overflow-y', 'auto');
    });

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const product = urlParams.has('dealer_login_error');
    if (product == true) {
        var element = document.getElementById("dealer_login_notice");
        element.classList.add("dealer_login_notice_error");
    }
    
})