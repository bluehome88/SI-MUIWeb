/*
 Template Name: Cornike - Business HTML5 Template
 Author: Tripples
 Author URI: https://themeforest.net/user/tripples
 Description: Cornike - Business HTML5 Template
 Version: 1.0
 
 1. Fixed header
 2. Main slideshow
 3. Site search
 4. Owl Carousel
 5. Video popup
 6. Counter
 7. Contact form
 8. Back to top
 
 */


jQuery( document ).ready( function ( $ ) {
    "use strict";

    /* ----------------------------------------------------------- */
    /*  Fixed header
     /* ----------------------------------------------------------- 
     
     $( window ).on( 'scroll', function () {
     if ( $( window ).scrollTop() > 70 ) {
     $( '.navdown, .header-two' ).addClass( 'navbar-fixed' );
     } else {
     $( '.navdown, .header-two' ).removeClass( 'navbar-fixed' );
     }
     } );*/

    /* ----------------------------------------------------------- */
    /*  Mobile Menu
     /* ----------------------------------------------------------- */

    jQuery( ".nav.navbar-nav li a" ).on( "click", function () {
        jQuery( this ).parent( "li" ).find( ".dropdown-menu" ).slideToggle();
        jQuery( this ).find( "i" ).toggleClass( "fa-angle-down fa-angle-up" );
    } );


    jQuery('p:empty').remove();


    /* ----------------------------------------------------------- */
    /*  Main slideshow
     /* ----------------------------------------------------------- */

    $( '#main-slide' ).carousel( {
        pause: true,
        interval: 100000,
    } );




    /* ----------------------------------------------------------- */
    /*  Site search
     /* ----------------------------------------------------------- */

    $( '.nav-search' ).on( 'click', function () {
        $( '.search-block' ).fadeIn( 350 );
        $( this ).fadeOut( 350 );
    } );

    $( '.search-close' ).on( 'click', function () {
        $( '.search-block' ).fadeOut( 350 );
        $( '.nav-search' ).fadeIn( 350 );
    } );



    /* ----------------------------------------------------------- */
    /*  Owl Carousel
     /* ----------------------------------------------------------- */


    //Project slide

    $( "#project-slide" ).owlCarousel( {
        loop: false,
        animateOut: 'fadeOut',
        nav: true,
        margin: 15,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        slideSpeed: 800,
        navText: [ "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ],
        items: 4,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            }
        }

    } );


    //Testimonial slide

    $( "#testimonial-slide" ).owlCarousel( {
        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        nav: true,
        margin: 0,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        slideSpeed: 500,
        navText: [ "<i class='icon icon-left-arrow2'></i>", "<i class='icon icon-right-arrow2'></i>" ],
        items: 1,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            }
        }

    } );

    //Partners slide

    $( ".client-carousel" ).owlCarousel( {
        loop: false,
        autoplay: false,
        autoplayHoverPause: true,
        nav: true,
        margin: -50,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        slideSpeed: 500,
        navText: [ "<i class='icon icon-left-arrow2'></i>", "<i class='icon icon-right-arrow2'></i>" ],
        items: 5,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 5
            }
        }

    } );


    //Page slide

    $( ".page-slider" ).owlCarousel( {
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        nav: true,
        margin: 0,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 800,
        navText: [ "<i class='icon icon-left-arrow2'></i>", "<i class='icon icon-right-arrow2'></i>" ],
        items: 1,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 1,
                nav: false,
            },
            1000: {
                items: 1,
                nav: true,
            }
        }

    } );



    //Team slide

    $( "#team-slide" ).owlCarousel( {
        loop: false,
        animateOut: 'fadeOut',
        nav: true,
        navText: [ "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ],
        margin: 20,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        slideSpeed: 800,
        items: 4,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            1000: {
                items: 4,
                loop: false
            }
        }

    } );



    /* ----------------------------------------------------------- */
    /*  Counter
     /* ----------------------------------------------------------- */

    $( '.counterUp' ).counterUp( {
        delay: 10,
        time: 1000
    } );



    /* ----------------------------------------------------------- */
    /*  Back to top
     /* ----------------------------------------------------------- */

    $( window ).scroll( function () {
        if ( $( this ).scrollTop() > 50 ) {
            $( '#back-to-top' ).fadeIn();
        } else {
            $( '#back-to-top' ).fadeOut();
        }
    } );
    // scroll body to 0px on click
    $( '#back-to-top' ).click( function () {
        $( '#back-to-top' ).tooltip( 'hide' );
        $( 'body,html' ).animate( {
            scrollTop: 0
        }, 800 );
        return false;
    } );

    $( '#back-to-top' ).tooltip( 'hide' );

} );



jQuery( window ).ready( function () {


    /*----------------------------------------------------*/
    /*	Animated Progress Bar
     /*----------------------------------------------------*/

    jQuery( ".progress-bar" ).each( function () {
        jQuery( this ).appear( function () {
            each_bar_width = jQuery( this ).attr( 'aria-valuenow' );
            jQuery( this ).width( each_bar_width + '%' );
        } );
    } );



//Make equal column  for service section

    function ResetGridColumns() {
        $( '.equalcol .row' ).each( function () {

            // find all columns
            var $cs = $( this ).children( '[class*="fw-col-"]' );

            // reset the height
            $cs.css( 'height', 'auto' );

            // set the heights per row
            var rowWidth = $( this ).width();
            var $curCols = $();
            var curMax = 0;
            var curWidth = 0;
            $cs.each( function () {
                var w = $( this ).width();
                var h = $( this ).height();
                if ( curWidth + w <= rowWidth ) {
                    $curCols = $curCols.add( this );
                    curWidth += w;
                    if ( h > curMax )
                        curMax = h;
                } else {
                    if ( $curCols.length > 1 )
                        $curCols.css( 'height', curMax + 'px' );
                    $curCols = $( this );
                    curWidth = w;
                    curMax = h;
                }
            } );
            if ( $curCols.length > 1 )
                $curCols.css( 'height', curMax + 'px' );

        } );
    }

} );