<?php

if ( !defined( 'ABSPATH' ) )
	die( 'Direct access forbidden.' );
/**
 * Theme’s filters and actions
 */
/*
 * Widget register
 */
if ( !function_exists( 'bizipress_widget_init' ) ) {

	function bizipress_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
			array(
				'name'			 => esc_html__( 'Blog Widget Area', 'bizipress' ),
				'id'			 => 'sidebar-1',
				'description'	 => esc_html__( 'Appears on posts and pages.', 'bizipress' ),
				'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
				'after_widget'	 => '</div> <!-- end widget -->',
				'before_title'	 => '<h3 class="widget-title">',
				'after_title'	 => '</h3>',
			) );
			register_sidebar( array(
				'name'			 => esc_html__( 'Footer 1', 'bizipress' ),
				'id'			 => 'footer-1',
				'description'	 => esc_html__( 'Widgets for first footer area', 'bizipress' ),
				'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'	 => '</div>',
				'before_title'	 => '<h3 class="widget-title">',
				'after_title'	 => '</h3>',
			) );

			register_sidebar( array(
				'name'			 => esc_html__( 'Footer 2', 'bizipress' ),
				'id'			 => 'footer-2',
				'description'	 => esc_html__( 'Widgets for secont footer area', 'bizipress' ),
				'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'	 => '</div>',
				'before_title'	 => '<h3 class="widget-title">',
				'after_title'	 => '</h3>',
			) );

			register_sidebar( array(
				'name'			 => esc_html__( 'Footer 3', 'bizipress' ),
				'id'			 => 'footer-3',
				'description'	 => esc_html__( 'Widgets for 3rd footer area', 'bizipress' ),
				'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'	 => '</div>',
				'before_title'	 => '<h3 class="widget-title">',
				'after_title'	 => '</h3>',
			) );
			bizipress_four_extra_footer();
		}
	}

	add_action( 'widgets_init', 'bizipress_widget_init' );
}



/*
 * TGM REQUIRE PLUGIN
 * require or recommend plugins for your WordPress themes
 */

/** @internal */
function _action_bizipress_register_required_plugins() {
	$plugins = array(
		array(
			'name'		 => esc_html__( 'Unyson', 'bizipress' ),
			'slug'		 => 'unyson',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Bizipress Features', 'bizipress' ),
			'slug'		 => 'bizipress-features',
			'required'	 => true,
			'source'	 => esc_url( BIZIPRESS_REMOTE_CONTENT ) . '/bizipress-features.zip',
		),
		array(
			'name'		 => esc_html__( 'Smart Slider', 'bizipress' ),
			'slug'		 => 'nextend-smart-slider3-pro',
			'required'	 => true,
			'source'	 => esc_url( BIZIPRESS_REMOTE_CONTENT ) . '/nextend-smart-slider3-pro.zip',
		),
		array(
			'name'		 => esc_html__( 'Contact Form 7', 'bizipress' ),
			'slug'		 => 'contact-form-7',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'MailChimp for WordPress', 'bizipress' ),
			'slug'		 => 'mailchimp-for-wp',
			'required'	 => true,
		),
	);


	$config = array(
		'id'			 => 'bizipress', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'bizipress-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => true, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', '_action_bizipress_register_required_plugins' );

// Initializing online demo contents
function _filter_bizipress_fw_ext_backups_demos( $demos ) {
	$demo_content_installer	 = 'http://xpeedstudio.net/demo-content/bizipress';
	$demos_array			 = array(
		'finance' => array(
			'title'			 => esc_html__( 'Finance 1 - 9 homes', 'bizipress' ),
			'screenshot'	 => esc_url( $demo_content_installer ) . '/finance/screenshot.jpg',
			'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
		),
		'insurance' => array(
			'title'			 => esc_html__( 'Insurance', 'bizipress' ),
			'screenshot'	 => esc_url( $demo_content_installer ) . '/insurance/screenshot.jpg',
			'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
		),
		'home10' => array(
			'title'			 => esc_html__( 'New home 10', 'bizipress' ),
			'screenshot'	 => esc_url( $demo_content_installer ) . '/home10/screenshot.jpg',
			'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
		),
		'home11' => array(
			'title'			 => esc_html__( 'New home 11', 'bizipress' ),
			'screenshot'	 => esc_url( $demo_content_installer ) . '/home11/screenshot.jpg',
			'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
		),
	);
	$download_url			 = esc_url( $demo_content_installer ) . '/manifest.php';
	foreach ( $demos_array as $id => $data ) {
		$demo						 = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
			'url'		 => $download_url,
			'file_id'	 => $id,
		) );
		$demo->set_title( $data[ 'title' ] );
		$demo->set_screenshot( $data[ 'screenshot' ] );
		$demo->set_preview_link( $data[ 'preview_link' ] );
		$demos[ $demo->get_id() ]	 = $demo;
		unset( $demo );
	}
	return $demos;
}

add_filter( 'fw:ext:backups-demo:demos', '_filter_bizipress_fw_ext_backups_demos' );



/*
 * Custom font for typography
 *  since 1.0
 *
 */

function bizipress_filter_theme_typography_custom_fonts( $fonts ) {
	$gilroy			 = array(
		'family' => 'gilroy',
		'variants'  => array( 400, 700 ),
		'subsets'  => array( 'latin-ext', 'latin' ),
	);
	array_push( $fonts['items'], $gilroy );

	return $fonts;
}

add_filter( 'fw_option_type_typography_v2_google_fonts', 'bizipress_filter_theme_typography_custom_fonts' );


if ( !function_exists( 'seopress_action_shortcode_special_heading_enqueue_dynamic_css' ) ):

	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function seopress_action_shortcode_special_heading_enqueue_dynamic_css( $data ) {
		$shortcode				 = 'special_heading';
		$atts					 = shortcode_parse_atts( $data[ 'atts_string' ] );
		$atts					 = fw_ext_shortcodes_decode_attr( $atts, $shortcode, $data[ 'post' ]->ID );
		$custom_heading_styles	 = '';



		$heading_style = $atts[ 'heading_settings' ];
		if ( $heading_style[ 'heading_style' ] == 'heading-style-1' ) {
			$subtitle_color	 = !empty( $atts[ 'subtitle_color' ] ) ? 'color:' . $atts[ 'subtitle_color' ] . ';' : '';
			$subtitle_size	 = !empty( $atts[ 'subtitle_size' ] ) ? 'font-size:' . (int) $atts[ 'subtitle_size' ] . 'px;' : '';
			$custom_heading_styles .= '.xs-heading-' . $atts[ 'xs_id' ] . ' .xs-title span{' . $subtitle_color . $subtitle_size . '}';
		} else if ( $heading_style[ 'heading_style' ] == 'heading-style-2' ) {
			$subtitle_color = !empty( $atts[ 'subtitle_color' ] ) ? 'color:' . $atts[ 'subtitle_color' ] . ';' : '';

			$subtitle_size = !empty( $atts[ 'subtitle_size' ] ) ? 'font-size:' . (int) $atts[ 'subtitle_size' ] . 'px;' : '';
			$custom_heading_styles .= '.xs-heading-' . $atts[ 'xs_id' ] . ' .xs-title span{' . $subtitle_color . $subtitle_size . '}';
		} else if ( $heading_style[ 'heading_style' ] == 'heading-style-3' ) {
			$subtitle_color = !empty( $atts[ 'subtitle_color' ] ) ? 'color:' . $atts[ 'subtitle_color' ] . ';' : '';

			$subtitle_size = !empty( $atts[ 'subtitle_size' ] ) ? 'font-size:' . (int) $atts[ 'subtitle_size' ] . 'px;' : '';
			$custom_heading_styles .= '.xs-heading-' . $atts[ 'xs_id' ] . ' .xs-title span{' . $subtitle_color . $subtitle_size . '}';
		} else if ( $heading_style[ 'heading_style' ] == 'heading-style-4' ) {
			$subtitle_color = !empty( $atts[ 'subtitle_color' ] ) ? 'color:' . $atts[ 'subtitle_color' ] . ';' : '';

			$subtitle_size = !empty( $atts[ 'subtitle_size' ] ) ? 'font-size:' . (int) $atts[ 'subtitle_size' ] . 'px;' : '';
			$custom_heading_styles .= '.xs-heading-' . $atts[ 'xs_id' ] . ' .xs-title span{' . $subtitle_color . $subtitle_size . '}';
		}

		if ( isset( $atts[ 'color' ] ) && $atts[ 'color' ] != '' ) {
			$custom_heading_styles .= '.xs-heading-' . $atts[ 'xs_id' ] . ' .xs-title{color:' . $atts[ 'color' ] . '}';
		}
		if ( isset( $atts[ 'title_size' ] ) && $atts[ 'title_size' ] != '' ) {
			$custom_heading_styles .= '.xs-heading-' . $atts[ 'xs_id' ] . ' .xs-title{font-size:' . (int) $atts[ 'title_size' ] . 'px}';
		}
		if ( isset( $atts[ 'heading_margin' ] ) && $atts[ 'heading_margin' ] != '60' ) {
			$custom_heading_styles .= '.xs-heading-' . $atts[ 'xs_id' ] . '{margin-bottom:' . $atts[ 'heading_margin' ] . 'px}';
		}

		if ( empty( $custom_heading_styles ) ) {
			return;
		}
		wp_add_inline_style( 'bizipress-style', $custom_heading_styles );
	}

	add_action( 'fw_ext_shortcodes_enqueue_static:special_heading', 'seopress_action_shortcode_special_heading_enqueue_dynamic_css' );
endif;



if ( !function_exists( 'bizipress_action_shortcode_column_enqueue_dynamic_css' ) ):

	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function bizipress_action_shortcode_column_enqueue_dynamic_css( $data ) {
		$shortcode	 = 'column';
		$atts		 = shortcode_parse_atts( $data[ 'atts_string' ] );


		$atts = fw_ext_shortcodes_decode_attr( $atts, $shortcode, $data[ 'post' ]->ID );

		$custom_column_styles = '';

// additional spacing
		$padding_top	 = (int) $atts[ 'padding_top' ];
		$padding_right	 = (int) $atts[ 'padding_right' ];
		$padding_bottom	 = (int) $atts[ 'padding_bottom' ];
		$padding_left	 = (int) $atts[ 'padding_left' ];


		$margin_top		 = (int) $atts[ 'margin_top' ];
		$margin_right	 = (int) $atts[ 'margin_right' ];
		$margin_bottom	 = (int) $atts[ 'margin_bottom' ];
		$margin_left	 = (int) $atts[ 'margin_left' ];


		if ( $padding_top != 0 || $padding_right != 0 || $padding_bottom != 0 || $padding_left != 0 ) {
			$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-col-inner{padding: ' . $padding_top . 'px ' . $padding_right . 'px ' . $padding_bottom . 'px ' . $padding_left . 'px;}';
		}
		if ( $margin_top != 0 || $margin_right != 0 || $margin_bottom != 0 || $margin_left != 0 ) {
			$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . '{margin: ' . $margin_top . 'px ' . $margin_right . 'px ' . $margin_bottom . 'px ' . $margin_left . 'px;}';
		}
//		fw_print($custom_column_styles);
//Text Color style
		$custom_column_styles .= $atts[ 'txtcolor' ] != '' ? '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{ color:' . $atts[ 'txtcolor' ] . ';}' : '';

//Border
		$border = $atts[ 'column_border' ];
		if ( isset( $border[ 'selected' ] ) && $border[ 'selected' ] == 'yes' ) {
			$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{' . $border[ 'yes' ][ 'border' ] . ':' . (int) $border[ 'yes' ][ 'border_size' ] . 'px ' . $border[ 'yes' ][ 'border_style' ] . ' ' . $border[ 'yes' ][ 'border_color' ] . ';}';
		}

//Radius
		$border_radius = $atts[ 'column_radius' ];
		if ( isset( $border_radius[ 'selected' ] ) && $border_radius[ 'selected' ] == 'yes' ) {
			$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{border-top-left-radius:' . (int) $border_radius[ 'yes' ][ 'top_left' ] . 'px; '
			. 'border-top-right-radius:' . (int) $border_radius[ 'yes' ][ 'top_right' ] . 'px;'
			. 'border-bottom-right-radius:' . (int) $border_radius[ 'yes' ][ 'bottom_right' ] . 'px;'
			. 'border-bottom-left-radius:' . (int) $border_radius[ 'yes' ][ 'bottom_left' ] . 'px;}';
		}

//Radius
		$box_shadow = $atts[ 'column_shadow' ];
		if ( isset( $box_shadow[ 'selected' ] ) && $box_shadow[ 'selected' ] == 'yes' ) {
			$shadow_horiontal	 = (int) $box_shadow[ 'yes' ][ 'shadow_horiontal' ] . 'px ';
			$shadow_vertical	 = (int) $box_shadow[ 'yes' ][ 'shadow_vertical' ] . 'px ';
			$shadow_blur		 = (int) $box_shadow[ 'yes' ][ 'shadow_vertical' ] . 'px ';
			$shadow_size		 = (int) $box_shadow[ 'yes' ][ 'shadow_size' ] . 'px ';
			$shadow_color		 = $box_shadow[ 'yes' ][ 'shadow_color' ] . ';';

			$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{-webkit-box-shadow:' . '' . $shadow_horiontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . '-moz-box-shadow:' . '' . $shadow_horiontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . 'box-shadow:' . '' . $shadow_horiontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . '}';
		}

//Set Position
		if ( isset( $atts[ 'column_position' ][ 'selected' ] ) && $atts[ 'column_position' ][ 'selected' ] == 'yes' && $atts[ 'column_position' ][ 'yes' ][ 'position' ] != 'static' ) {
			$loc = $atts[ 'column_position' ][ 'yes' ];

			$position = '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{position:' . $loc[ 'position' ] . '; ';
			$position .= $loc[ 'top' ] != '' ? 'top:' . (int) $loc[ 'top' ] . 'px; ' : '';
			$position .= $loc[ 'right' ] != '' ? 'right:' . (int) $loc[ 'right' ] . 'px; ' : '';
			$position .= $loc[ 'bottom' ] != '' ? 'bottom:' . (int) $loc[ 'bottom' ] . 'px; ' : '';
			$position .= $loc[ 'left' ] != '' ? 'left:' . (int) $loc[ 'left' ] . 'px; ' : '';
			$position .= '}';
			$custom_column_styles .= $position;
		}

//Element

		$element = isset( $atts[ 'display' ] ) && $atts[ 'display' ] != '' ? 'display:' . $atts[ 'display' ] . ';' : '';
		$element .= isset( $atts[ 'overflow' ] ) && $atts[ 'overflow' ] != '' ? 'overflow:' . $atts[ 'overflow' ] . ';' : '';
		$element .= isset( $atts[ 'overflow_x' ] ) && $atts[ 'overflow_x' ] != '' ? 'overflow-x:' . $atts[ 'overflow_x' ] . ';' : '';
		$element .= isset( $atts[ 'overflow_y' ] ) && $atts[ 'overflow_y' ] != '' ? 'overflow-y:' . $atts[ 'overflow_y' ] . ';' : '';
		$element .= isset( $atts[ 'z_index' ] ) && $atts[ 'z_index' ] != '' ? 'z-index:' . $atts[ 'z_index' ] . ';' : '';
		if ( !empty( $element ) ) {
			$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{' . $element . '}';
		}
//Column Height
		if ( !empty( $atts[ 'height' ] ) && $atts[ 'height' ] != 'auto' ) {
			$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{height:' . $atts[ 'height' ] . 'px}';
		}


//Background
		$bgtype = $atts[ 'background_options' ][ 'background' ];

		if ( isset( $bgtype ) && $bgtype == 'image' && !empty( $atts[ 'background_options' ][ 'image' ][ 'background_image' ][ 'data' ] ) ) {
			$img		 = $atts[ 'background_options' ][ 'image' ];
			$bg_image	 = 'background-image:url(' . $img[ 'background_image' ][ 'data' ][ 'icon' ] . ');';
			$bg_image .= ' background-repeat: ' . $img[ 'repeat' ] . ';';
			$bg_image .= ' background-position: ' . $img[ 'bg_position_x' ] . ' ' . $img[ 'bg_position_y' ] . ';';
			$bg_image .= ' background-size: ' . $img[ 'bg_size' ] . ';';

			$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{' . $bg_image . '}';


			$overlay = $img[ 'overlay_options' ][ 'overlay' ];
			if ( $overlay == 'yes' && !empty( $img[ 'overlay_options' ][ 'yes' ][ 'background' ] ) ) {
				$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row .xs-main-overlay{background-color:' . $img[ 'overlay_options' ][ 'yes' ][ 'background' ] . '}';
			}
		} elseif ( $bgtype == 'bgcolor' ) {
			$color = $atts[ 'background_options' ][ 'bgcolor' ][ 'background_color' ];
			if ( !empty( $color ) )
				$custom_column_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{background-color:' . $color . '}';
		}


//Responsive

		if ( isset( $atts[ 'display_medium' ][ 'selected' ] ) && $atts[ 'display_medium' ][ 'selected' ] == 'yes' ) {
			$medium_device		 = $atts[ 'display_medium' ][ 'yes' ];
			$padding_top_md		 = (int) $medium_device[ 'padding_top' ];
			$padding_right_md	 = (int) $medium_device[ 'padding_right' ];
			$padding_bottom_md	 = (int) $medium_device[ 'padding_bottom' ];
			$padding_left_md	 = (int) $medium_device[ 'padding_left' ];

			if ( $padding_top_md != 0 || $padding_right_md != 0 || $padding_bottom_md != 0 || $padding_left_md != 0 ) {
				$custom_column_styles .= '@media only screen and (min-width: 992px) and (max-width: 1199px) {.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-col-inner{padding: ' . $padding_top_md . 'px ' . $padding_right_md . 'px ' . $padding_bottom_md . 'px ' . $padding_left_md . 'px;}}';
			}

			$margin_top_md		 = (int) $medium_device[ 'margin_top' ];
			$margin_right_md	 = (int) $medium_device[ 'margin_right' ];
			$margin_bottom_md	 = (int) $medium_device[ 'margin_bottom' ];
			$margin_left_md		 = (int) $medium_device[ 'margin_left' ];
			if ( $margin_top_md != 0 || $margin_right_md != 0 || $margin_bottom_md != 0 || $margin_left_md != 0 ) {
				$custom_column_styles .= '@media only screen and (min-width: 992px) and (max-width: 1199px) {.xs-sc-' . $atts[ 'xs_id' ] . '{margin: ' . $margin_top_md . 'px ' . $margin_right_md . 'px ' . $margin_bottom_md . 'px ' . $margin_left_md . 'px;}}';
			}
			if ( isset( $medium_device[ 'change_height' ][ 'selected' ] ) && $medium_device[ 'change_height' ][ 'selected' ] == 'yes' ) {
				$height = $medium_device[ 'change_height' ][ 'yes' ][ 'height' ] != 'auto' ? (int) $medium_device[ 'change_height' ][ 'yes' ][ 'height' ] . 'px' : 'inherit';
				$custom_column_styles .= '@media only screen and (min-width: 992px) and (max-width: 1199px) {.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{height:' . $height . '}}';
			}
			if ( isset( $medium_device[ 'txt_align' ] ) && $medium_device[ 'txt_align' ] != 'none' ) {
				$custom_column_styles .= '@media only screen and (min-width: 992px) and (max-width: 1199px) {.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{text-align:' . $medium_device[ 'txt_align' ] . '}}';
			}
		}


		if ( isset( $atts[ 'display_tablet' ][ 'selected' ] ) && $atts[ 'display_tablet' ][ 'selected' ] == 'yes' ) {
			$tablet_device = $atts[ 'display_tablet' ][ 'yes' ];

			$padding_top_sm		 = (int) $tablet_device[ 'padding_top' ];
			$padding_right_sm	 = (int) $tablet_device[ 'padding_right' ];
			$padding_bottom_sm	 = (int) $tablet_device[ 'padding_bottom' ];
			$padding_left_sm	 = (int) $tablet_device[ 'padding_left' ];
			if ( $padding_top_sm != 0 || $padding_right_sm != 0 || $padding_bottom_sm != 0 || $padding_left_sm != 0 ) {
				$custom_column_styles .= '@media only screen and (min-width: 768px) and (max-width: 991px) {.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-col-inner{padding: ' . $padding_top_sm . 'px ' . $padding_right_sm . 'px ' . $padding_bottom_sm . 'px ' . $padding_left_sm . 'px;}}';
			}

			$margin_top_sm		 = (int) $tablet_device[ 'margin_top' ];
			$margin_right_sm	 = (int) $tablet_device[ 'margin_right' ];
			$margin_bottom_sm	 = (int) $tablet_device[ 'margin_bottom' ];
			$margin_left_sm		 = (int) $tablet_device[ 'margin_left' ];
			if ( $margin_top_sm != 0 || $margin_right_sm != 0 || $margin_bottom_sm != 0 || $margin_left_sm != 0 ) {
				$custom_column_styles .= '@media only screen and (min-width: 768px) and (max-width: 991px) {.xs-sc-' . $atts[ 'xs_id' ] . '{margin: ' . $margin_top_sm . 'px ' . $margin_right_sm . 'px ' . $margin_bottom_sm . 'px ' . $margin_left_sm . 'px;}}';
			}
			if ( isset( $tablet_device[ 'change_height' ][ 'selected' ] ) && $tablet_device[ 'change_height' ][ 'selected' ] == 'yes' ) {
				$height = $tablet_device[ 'change_height' ][ 'yes' ][ 'height' ] != 'auto' ? (int) $tablet_device[ 'change_height' ][ 'yes' ][ 'height' ] . 'px' : 'inherit';
				$custom_column_styles .= '@media only screen and (min-width: 768px) and (max-width: 991px) {.xs-sc-' . $atts[ 'xs_id' ] . '{height:' . $height . '}}';
			}
			if ( isset( $tablet_device[ 'txt_align' ] ) && $tablet_device[ 'txt_align' ] != 'none' ) {
				$custom_column_styles .= '@media only screen and (min-width: 768px) and (max-width: 991px) {.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{text-align:' . $tablet_device[ 'txt_align' ] . '}}';
			}
		}
		if ( isset( $atts[ 'display_phone' ][ 'selected' ] ) && $atts[ 'display_phone' ][ 'selected' ] == 'yes' ) {
			$phone_device = $atts[ 'display_phone' ][ 'yes' ];

			$padding_top_xs		 = (int) $phone_device[ 'padding_top' ];
			$padding_right_xs	 = (int) $phone_device[ 'padding_right' ];
			$padding_bottom_xs	 = (int) $phone_device[ 'padding_bottom' ];
			$padding_left_xs	 = (int) $phone_device[ 'padding_left' ];
			if ( $padding_top_xs != 0 || $padding_right_xs != 0 || $padding_bottom_xs != 0 || $padding_left_xs != 0 ) {
				$custom_column_styles .= '@media only screen and (max-width: 767px) {.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-col-inner{padding: ' . $padding_top_xs . 'px ' . $padding_right_xs . 'px ' . $padding_bottom_xs . 'px ' . $padding_left_xs . 'px;}}';
			}

			$margin_top_xs		 = (int) $phone_device[ 'margin_top' ];
			$margin_right_xs	 = (int) $phone_device[ 'margin_right' ];
			$margin_bottom_xs	 = (int) $phone_device[ 'margin_bottom' ];
			$margin_left_xs		 = (int) $phone_device[ 'margin_left' ];
			if ( $margin_top_xs != 0 || $margin_right_xs != 0 || $margin_bottom_xs != 0 || $margin_left_xs != 0 ) {
				$custom_column_styles .= '@media only screen and (max-width: 767px) {.xs-sc-' . $atts[ 'xs_id' ] . '{margin: ' . $margin_top_xs . 'px ' . $margin_right_xs . 'px ' . $margin_bottom_xs . 'px ' . $margin_left_xs . 'px;}}';
			}
			if ( isset( $phone_device[ 'change_height' ][ 'selected' ] ) && $phone_device[ 'change_height' ][ 'selected' ] == 'yes' ) {
				$height = $tablet_device[ 'change_height' ][ 'yes' ][ 'height' ] != 'auto' ? (int) $phone_device[ 'change_height' ][ 'yes' ][ 'height' ] . 'px' : 'inherit';
				$custom_column_styles .= '@media only screen and (max-width: 767px) {.xs-sc-' . $atts[ 'xs_id' ] . '{height:' . $height . '}}';
			}
			if ( isset( $phone_device[ 'txt_align' ] ) && $phone_device[ 'txt_align' ] != 'none' ) {
				$custom_column_styles .= '@media only screen and (max-width: 767px) {.xs-sc-' . $atts[ 'xs_id' ] . ' .fw-main-row{text-align:' . $phone_device[ 'txt_align' ] . '}}';
			}
		}
		if ( empty( $custom_column_styles ) ) {
			return;
		}

		wp_add_inline_style(
		'bizipress-style', $custom_column_styles
		);
	}

	add_action(
	'fw_ext_shortcodes_enqueue_static:column', 'bizipress_action_shortcode_column_enqueue_dynamic_css'
	);
endif;


if ( !function_exists( 'bizipress_action_shortcode_section_enqueue_dynamic_css' ) ):

	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function bizipress_action_shortcode_section_enqueue_dynamic_css( $data ) {
		$shortcode				 = 'section';
		$atts					 = shortcode_parse_atts( $data[ 'atts_string' ] );
		$atts					 = fw_ext_shortcodes_decode_attr( $atts, $shortcode, $data[ 'post' ]->ID );
		$custom_section_styles	 = '';


		// additional spacing

		$padding_top	 = (int) $atts[ 'padding_top' ];
		$padding_bottom	 = (int) $atts[ 'padding_bottom' ];
		$padding_right	 = (int) $atts[ 'padding_right' ];
		$padding_left	 = (int) $atts[ 'padding_left' ];

		$margin_top		 = (int) $atts[ 'margin_top' ];
		$margin_right	 = (int) $atts[ 'margin_right' ];
		$margin_bottom	 = (int) $atts[ 'margin_bottom' ];
		$margin_left	 = (int) $atts[ 'margin_left' ];


		if ( $padding_top != 0 || $padding_right != 0 || $padding_bottom != 0 || $padding_left != 0 ) {
			if ( $padding_top != 100 || $padding_bottom != 100 ) {
				$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . '{padding: ' . $padding_top . 'px ' . $padding_right . 'px ' . $padding_bottom . 'px ' . $padding_left . 'px;}';
			}
		}

		if ( $margin_top != 0 || $margin_right != 0 || $margin_bottom != 0 || $margin_left != 0 ) {
			$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . '{margin: ' . $margin_top . 'px ' . $margin_right . 'px ' . $margin_bottom . 'px ' . $margin_left . 'px;}';
		}
//		
		//Background
		$bgtype = $atts[ 'background_options' ][ 'background' ];
		if ( isset( $bgtype ) && $bgtype == 'image' && !empty( $atts[ 'background_options' ][ 'image' ][ 'background_image' ][ 'data' ] ) ) {
			$img		 = $atts[ 'background_options' ][ 'image' ];
			$bg_image	 = 'background-image:url(' . $img[ 'background_image' ][ 'data' ][ 'icon' ] . ');';
			$bg_image .= ' background-repeat: ' . $img[ 'repeat' ] . ';';
			$bg_image .= ' background-position: ' . $img[ 'bg_position_x' ] . ' ' . $img[ 'bg_position_y' ] . ';';
			$bg_image .= ' background-size: ' . $img[ 'bg_size' ] . ';';
			$bg_image .= ' background-attachment: ' . $img[ 'background_attachment' ] . ';';
			if ( $img[ 'background_attachment' ] == 'fixed' ) {
				$custom_section_styles .= '@media only screen and (max-width: 1099px) {.xs-sc-' . $atts[ 'xs_id' ] . ' {background-attachment:scroll !important;}}';
			}

			$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . '{' . $bg_image . '}';


			$img_overlay = $atts[ 'background_options' ][ 'image' ][ 'tab_item' ][ 'selected_value' ];

			if ( $img_overlay == 'overlay11' ) {
				$bgoverlay	 = $atts[ 'background_options' ][ 'image' ][ 'tab_item' ][ 'overlay11' ][ 'background' ];
				$overlay	 = "background-color:$bgoverlay";
			} elseif ( $img_overlay == 'gradient11' ) {
				$gradient_trnsparent = '85';
				if ( isset( $atts[ 'background_options' ][ 'image' ][ 'tab_item' ][ 'gradient11' ][ 'gradient_trnsparent' ] ) ) {
					$gradient_trnsparent = $atts[ 'background_options' ][ 'image' ][ 'tab_item' ][ 'gradient11' ][ 'gradient_trnsparent' ];
				}
				$gradient11	 = $atts[ 'background_options' ][ 'image' ][ 'tab_item' ][ 'gradient11' ][ 'background' ];
				$primary	 = 'rgba(' . bizipress_color_rgb( $gradient11[ 'primary' ] ) . ',0.' . $gradient_trnsparent . ')';
				$secondary	 = 'rgba(' . bizipress_color_rgb( $gradient11[ 'secondary' ] ) . ',0.' . $gradient_trnsparent . ')';

				$overlay = "background: $primary;background: -webkit-linear-gradient(to right, $primary, $secondary);background: -o-linear-gradient(to right, $primary, $secondary);background: -moz-linear-gradient(to right, $primary, $secondary);background: linear-gradient(to right, $primary, $secondary);";
			}
			if ( isset( $bgtype ) && $atts[ 'background_options' ][ 'background' ] == 'image' ) {
				$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .xs-main-overlay{' . $overlay . '}';
			}
		} elseif ( $bgtype == 'color' ) {
			$color = $atts[ 'background_options' ][ 'color' ][ 'background_color' ];
			if ( !empty( $color ) ) {
				$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . '{background-color:' . $color . '}';
			}
		} else if ( $bgtype == 'gradient' ) {
			$gradients	 = $atts[ 'background_options' ][ 'gradient' ][ 'background' ];
			$primary	 = $gradients[ 'primary' ];
			$secondary	 = $gradients[ 'secondary' ];
			if ( !empty( $primary ) && !empty( $secondary ) ) {
				$gradient = "background: $primary;background: -webkit-linear-gradient(to right, $primary, $secondary);background: -o-linear-gradient(to right, $primary, $secondary);background: -moz-linear-gradient(to right, $primary, $secondary);background: linear-gradient(to right, $primary, $secondary);";
				$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . '{' . $gradient . '}';
			}
		} else if ( $bgtype == 'video' ) {
			$overlay = $atts[ 'background_options' ][ 'video' ][ 'overlay_options' ];
			if ( $overlay[ 'overlay' ] == 'yes' ) {
				$overlay = 'background-color:' . $overlay[ 'yes' ][ 'background' ] . ';z-index:3;position:relative;';

				$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . ' .xs-main-overlay{' . $overlay . '}';
			}
		}
		//Height
		if ( !empty( $atts[ 'height' ] ) && $atts[ 'height' ] != 'auto' && $atts[ 'height' ] != 'xs-section-height-sm' && $atts[ 'height' ] != 'xs-section-height-md' && $atts[ 'height' ] != 'xs-section-height-lg' ) {

			$height			 = (int) $atts[ 'height' ];
			$extra_height	 = 'height: ' . $height . 'px; line-height: ' . $height . 'px;overflow: hidden;';
			$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . '{' . $extra_height . '}';
		}

		//Element
		$element = isset( $atts[ 'display' ] ) && $atts[ 'display' ] != '' ? 'display:' . $atts[ 'display' ] . ';' : '';
		$element .= isset( $atts[ 'overflow' ] ) && $atts[ 'overflow' ] != '' ? 'overflow:' . $atts[ 'overflow' ] . ';' : '';
		$element .= isset( $atts[ 'overflow_x' ] ) && $atts[ 'overflow_x' ] != '' ? 'overflow-x:' . $atts[ 'overflow_x' ] . ';' : '';
		$element .= isset( $atts[ 'overflow_y' ] ) && $atts[ 'overflow_y' ] != '' ? 'overflow-y:' . $atts[ 'overflow_y' ] . ';' : '';
		$element .= isset( $atts[ 'z_index' ] ) && $atts[ 'z_index' ] != '' ? 'z-index:' . $atts[ 'z_index' ] . ';' : '';
		if ( !empty( $element ) ) {
			$custom_section_styles .= '.xs-sc-' . $atts[ 'xs_id' ] . '{' . $element . '}';
		}
		if ( empty( $custom_section_styles ) ) {
			return;
		}


		wp_add_inline_style(
		'bizipress-style', $custom_section_styles
		);
	}

	add_action(
	'fw_ext_shortcodes_enqueue_static:section', 'bizipress_action_shortcode_section_enqueue_dynamic_css'
	);
endif;






if ( !function_exists( 'bizipress_action_shortcode_space_enqueue_dynamic_css' ) ):

	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function bizipress_action_shortcode_space_enqueue_dynamic_css( $data ) {
		$shortcode			 = 'text_block';
		$atts				 = shortcode_parse_atts( $data[ 'atts_string' ] );
		$atts				 = fw_ext_shortcodes_decode_attr( $atts, $shortcode, $data[ 'post' ]->ID );
		$custom_space_styles = '';


		if ( isset( $atts[ 'height' ] ) && $atts[ 'height' ] != 'space-sm' && $atts[ 'height' ] != 'space-md' && $atts[ 'height' ] != 'space-lg' ) {
			$custom_space_styles .= '#xs-sc-' . $atts[ 'xs_id' ] . '{height:' . (int) $atts[ 'height' ] . 'px}';
		}


		//medium
		if ( isset( $atts[ 'medium_height' ] ) && $atts[ 'medium_height' ] != 'default' ) {
			$custom_space_styles .= '@media only screen and (min-width: 992px) and (max-width: 1199px) {#xs-sc-' . $atts[ 'xs_id' ] . '{height:' . (int) $atts[ 'medium_height' ] . 'px}}';
		}

		//tablet
		if ( isset( $atts[ 'tablet_height' ] ) && $atts[ 'tablet_height' ] != 'default' ) {
			$custom_space_styles .= '@media only screen and (min-width: 768px) and (max-width: 991px) {#xs-sc-' . $atts[ 'xs_id' ] . '{height:' . (int) $atts[ 'tablet_height' ] . 'px}}';
		}

//		small
		if ( isset( $atts[ 'phone_height' ] ) && $atts[ 'phone_height' ] != 'default' ) {
			$custom_space_styles .= '@media only screen and (max-width: 767px) {#xs-sc-' . $atts[ 'xs_id' ] . '{height:' . (int) $atts[ 'phone_height' ] . 'px}}';
		}
		if ( empty( $custom_space_styles ) ) {
			return;
		}
		wp_add_inline_style( 'bizipress-style', $custom_space_styles );
	}

	add_action( 'fw_ext_shortcodes_enqueue_static:space', 'bizipress_action_shortcode_space_enqueue_dynamic_css' );
endif;





spl_autoload_register( 'bizipress_theme_includes_autoload' );

function bizipress_theme_includes_autoload( $class ) {
	switch ( $class ) {
		case 'Unyson_Google_Fonts':
			require_once BIZIPRESS_INC . '/includes/unyson-google-fonts/class-unyson-google-fonts.php';
			break;
	}
}

if ( !function_exists( 'bizipressfw_theme_carousel_slider_population_method_custom_options' ) ) :

	function bizipressfw_theme_carousel_slider_population_method_custom_options( $arr ) {
		/**
		 * Filter for disable standard slider fields for carousel slider
		 * @param array $arr
		 */
		unset(
		$arr[ 'wrapper-population-method-custom' ][ 'options' ][ 'custom-slides' ][ 'slides_options' ][ 'desc' ]
		);

		return $arr;
	}

	add_filter( 'fw_ext_bootstrap_carousel_slider_population_method_custom_options', 'bizipressfw_theme_carousel_slider_population_method_custom_options' );
endif;


if ( !function_exists( 'bizipressfw_theme_box_slider_population_method_custom_options' ) ) :

	function bizipressfw_theme_box_slider_population_method_custom_options( $arr ) {
		/**
		 * Filter for disable standard slider fields for carousel slider
		 * @param array $arr
		 */
		unset(
		$arr[ 'wrapper-population-method-custom' ][ 'options' ][ 'custom-slides' ][ 'slides_options' ][ 'desc' ]
		);

		return $arr;
	}

	add_filter( 'fw_ext_box_slider_population_method_custom_options', 'bizipressfw_theme_box_slider_population_method_custom_options' );
endif;

function bizipress_excerpt_label( $translation, $original ) {
	if ( 'Excerpt' == $original ) {
		return esc_html__( 'Services short note', 'bizipress' );
	} elseif ( false !== strpos( $original, 'Excerpts are optional hand-crafted summaries of your' ) ) {
		return esc_html__( 'Add your services short note which show in homepage', 'bizipress' );
	}
	return $translation;
}

add_filter( 'gettext', 'bizipress_excerpt_label', 100, 2 );

function bizipress_excerpt( $num = 20 ) {

	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $num_words		 = $num, $more			 = null );

	echo bizipress_kses( $trimmed_content );
}

function bizipress_content_read_more( $num = 20 ) {

	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $num_words		 = $num, $more			 = null );

	echo bizipress_kses( $trimmed_content );
	echo '</div><div class="post-footer text-right"><a href="' . get_the_permalink() . '" class="btn btn-primary">' . esc_html__( 'Continue Reading', 'bizipress' ) . '</a>';
}

//Comment form textarea position change

function bizipress_move_comment_field_to_bottom( $fields ) {
	$comment_field		 = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'bizipress_move_comment_field_to_bottom' );

// Displsys search form.

function bizipress_search_form( $form ) {
	$form = '
    <div class="search-widget input-group">
        <form method="get" action="' . esc_url( home_url( '/' ) ) . '" id="search">
                <input type="text" name="s" class="form-control"  placeholder="' . esc_html__( 'Search..', 'bizipress' ) . '" value="' . get_search_query() . '">
					<span class="input-group-btn">
                           <i class="fa fa-search"></i>
                        </span>
        </form>
    </div>';
	return $form;
}

add_filter( 'get_search_form', 'bizipress_search_form' );





if ( defined( 'FW' ) ):
	add_action( 'fw_admin_enqueue_scripts:settings', function() {
		wp_register_script(
		'bizipress-admin-panel-script', BIZIPRESS_SCRIPTS . '/admin-panel.js', array( 'fw' ), fw()->theme->manifest->get_version(), true
		);
		$data_array		 = array(
			'name'		 => fw()->theme->manifest->get_name(),
			'version'	 => fw()->theme->manifest->get_version()
		);
		wp_localize_script( 'bizipress-admin-panel-script', 'theme_info', $data_array );
		wp_enqueue_script( 'bizipress-admin-panel-script' );
	} );
endif;







function bizipress_filter_disable_default_shortcodes($to_disable)
{
        // disable the shortcodes you want like this
        $to_disable[] = 'calendar';
        $to_disable[] = 'contact_form';
        $to_disable[] = 'widget_area';
        return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', 'bizipress_filter_disable_default_shortcodes');