<?php

if ( !defined( 'ABSPATH' ) )
	die( 'Direct access forbidden.' );
/**
 * Enqueue all theme scripts and styles
 *

  /** --------------------------------------
 * ** REGISTERING THEME ASSETS
 * ** ------------------------------------ */
/**
 * Enqueue styles.
 */
if ( !is_admin() ) {

	wp_enqueue_style( 'bootstrap', BIZIPRESS_CSS . '/bootstrap.min.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'bizipress-xs-main', BIZIPRESS_CSS . '/xs_main.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'bizipress-custom-blog', BIZIPRESS_CSS . '/blog-style.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'bizipress-custom-icon-font', BIZIPRESS_CSS . '/icon-font.css', null, BIZIPRESS_VERSION );

	wp_enqueue_style( 'animate', BIZIPRESS_CSS . '/animate.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'font-awesome', BIZIPRESS_CSS . '/font-awesome.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'owl-carousel', BIZIPRESS_CSS . '/owl.carousel.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'owl.theme', BIZIPRESS_CSS . '/owl.theme.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'slide.carousel', BIZIPRESS_CSS . '/slide.owl.carousel.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'bizipress-style', BIZIPRESS_CSS . '/style.css', null, BIZIPRESS_VERSION );
	wp_enqueue_style( 'bizipress-responsive', BIZIPRESS_CSS . '/responsive.css', null, BIZIPRESS_VERSION );
}



/**
 * Enqueue scripts.
 */
if ( !is_admin() ) {
	// wp_enqueue_script() syntax, $handle, $src, $deps, $version, $in_footer(boolean)
	//Unyson Form helper
//	wp_enqueue_script( 'bizipress-form-helpers', BIZIPRESS_SCRIPTS . '/fw-form-helpers.js', array( 'jquery' ), BIZIPRESS_VERSION, true );

	//Bootstrap Main JS
	wp_enqueue_script( 'bootstrap', BIZIPRESS_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), BIZIPRESS_VERSION, true );

	//Theme CSS FILES
	wp_enqueue_script( 'html5shiv', BIZIPRESS_SCRIPTS . '/html5shiv.js', array( 'jquery' ), BIZIPRESS_VERSION, true );

	wp_enqueue_script( 'jquery.counterup', BIZIPRESS_SCRIPTS . '/jquery.counterup.min.js', array( 'jquery' ), BIZIPRESS_VERSION, true );
	wp_enqueue_script( 'owl.carousel', BIZIPRESS_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), BIZIPRESS_VERSION, true );
	wp_enqueue_script( 'jquery.appear', BIZIPRESS_SCRIPTS . '/jquery.appear.js', array( 'jquery' ), BIZIPRESS_VERSION, true );

	if ( bizipress_get_option( 'smoothscroll' ) == 'yes' ) {
		wp_enqueue_script( 'smoothscroll', BIZIPRESS_SCRIPTS . '/smoothscroll.js', array( 'jquery' ), BIZIPRESS_VERSION, true );
	}
	wp_enqueue_script( 'waypoints', BIZIPRESS_SCRIPTS . '/waypoints.min.js', array( 'jquery' ), BIZIPRESS_VERSION, true );
	wp_enqueue_script( 'wow', BIZIPRESS_SCRIPTS . '/wow.min.js', array( 'jquery' ), BIZIPRESS_VERSION, true );

	wp_enqueue_script( 'bizipress-custom', BIZIPRESS_SCRIPTS . '/custom.js', array( 'jquery' ), BIZIPRESS_VERSION, true );


	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


