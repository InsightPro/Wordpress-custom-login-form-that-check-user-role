jQuery(document).ready(function($) {
    var tabNavgation = $('.scents-block--list li');

    var mobileTabHeadings = $('.scents-block--tab-nav-heading-lists li');

    function accordion(nav, single, all) {
        var targetID = nav.data('target');
        all.removeClass('active');
        single.removeClass('active');

        nav.addClass('active');
        $(`#${targetID}`).addClass('active');
    }

    tabNavgation.each(function() {
        $(this).on('click', function() {
            accordion($(this), $('.scents-block--tab-single'), tabNavgation);
        })
    });
    mobileTabHeadings.each(function() {
        $(this).on('click', function() {
            accordion($(this), $('.scents-block--tab-navList'), mobileTabHeadings);
        })
    });

    // scroll to that section if URL has a hashtag

    var urlQueryString = window.location.href.split("?")[1];
    if ( urlQueryString != " " ) {
        tabNavgation.each(function() {
            if ( $(this).data('target') === urlQueryString ) {
                accordion($(this), $('.scents-block--tab-single'), tabNavgation);
                var scrollElm = $(`#${urlQueryString}`).parent();
                $('html, body').animate({
                    scrollTop: scrollElm.offset().top
                }, 2000);
            }
        });

        tabNavgation.each( function() {
            if ( $(this).data('target') === urlQueryString ) {
                var parentMatchID = $(this).closest('.scents-block--tab-navList').attr('id');

                mobileTabHeadings.each(function() {
                    if ( $(this).data('target') === parentMatchID ) {
                        accordion($(this), $('.scents-block--tab-navList'), mobileTabHeadings);
                    }
                });
            }
        } )
    }

})