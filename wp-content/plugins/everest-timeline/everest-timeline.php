<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 * Plugin Name: Everest Timeline
 * Plugin URI:  https://accesspressthemes.com/wordpress-plugins/everest-timeline/
 * Description:  Plugin to Manage / Design Story/Event Timeline | 50+ stunning, responsive, creative and powerful design.
 * Version:     2.0.1
 * Author:      AccessPress Themes
 * Author URI:  http://accesspressthemes.com/
 * Domain Path: /languages/
 * Text Domain: everest-timeline
 * */
/**
 * Declaration of necessary constants for plugin
 * */
defined( 'ET_VERSION' ) or define( 'ET_VERSION', '2.0.1' ); //plugin version
defined( 'ET_TD' ) or define( 'ET_TD', 'everest-timeline' ); //plugin's text domain
defined( 'ET_IMG_DIR' ) or define( 'ET_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' ); //plugin image directory
defined( 'ET_JS_DIR' ) or define( 'ET_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );  //plugin js directory
defined( 'ET_CSS_DIR' ) or define( 'ET_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' ); // plugin css dir
defined( 'ET_PATH' ) or define( 'ET_PATH', plugin_dir_path( __FILE__ ) );
defined( 'ET_URL' ) or define( 'ET_URL', plugin_dir_url( __FILE__ ) );
include_once("twitteroauth/twitteroauth.php");
include_once("twitteroauth/OAuth.php");

if ( ! class_exists( 'ET_Everest_Timeline_Class' ) ) {

    class ET_Everest_Timeline_Class{

        /**
         * Initializes the plugin functions
         */
        function __construct(){

            add_action( 'init', array( $this, 'et_plugin_text_domain' ) ); //loads text domain for translation ready
            add_action( 'wp_enqueue_scripts', array( $this, 'et_register_assets' ) ); //registers scripts and styles for front end
            add_action( 'init', array( $this, 'et_register_post_type' ) ); //register custom post type
            add_action( 'admin_enqueue_scripts', array( $this, 'et_register_admin_assets' ) ); //register plugin scripts and css in wp-admin
            add_action( 'add_meta_boxes', array( $this, 'et_add_blog_metabox' ) ); //added blog showcase metabox
            add_action( 'add_meta_boxes', array( $this, 'et_post_type_metabox' ) ); //added post feed type showcase metabox
            add_action( 'add_meta_boxes', array( $this, 'et_other_settings_metabox' ) ); //added other settings metabox
            add_action( 'add_meta_boxes', array( $this, 'et_shortcode_usage_metabox' ) ); //added shortcode usages metabox
            add_action( 'add_meta_boxes', array( $this, 'et_add_settings_metabox' ) ); //added blog showcase metabox
            add_action( 'save_post', array( $this, 'et_meta_save' ) );
            add_action( 'save_post', array( $this, 'et_extra_field_save' ) );
            add_action( 'wp_ajax_et_post_submit', array( $this, 'et_post_submit' ) );
            add_action( 'wp_ajax_et_slider_images', array( $this, 'et_slider_images' ) );
            add_action( 'wp_ajax_et_all_post_submit', array( $this, 'et_all_post_submit' ) );
            add_action( 'wp_ajax_et_selected_post_taxonomy', array( $this, 'et_selected_post_taxonomy' ) );
            add_action( 'wp_ajax_et_selected_taxonomy_terms', array( $this, 'et_selected_taxonomy_terms' ) );
            add_action( 'wp_ajax_et_hierarchy_terms', array( $this, 'et_hierarchy_terms' ) );
            add_action( 'wp_ajax_et_add_meta_condition', array( $this, 'et_add_meta_condition' ) );
            add_action( 'wp_ajax_et_add_tax_condition', array( $this, 'et_add_tax_condition' ) );
            add_shortcode( 'et', array( $this, 'et_generate_shortcode' ) ); // generating shortcode
            add_action( 'template_redirect', array( $this, 'et_page_template_redirect' ) );
            //add_filter( 'preview_post_link', array( $this, 'et_preview_page' ), 10, 2 );
            //add_filter( 'preview_page_link', array( $this, 'et_preview_page' ), 10, 2 );
            add_action( 'wp_ajax_et_filter_tax_terms', array( $this, 'et_filter_tax_terms' ) );
            add_action( 'wp_ajax_et_pagination_action', array( $this, 'et_pagination_action' ) );
            add_action( 'wp_ajax_nopriv_et_pagination_action', array( $this, 'et_pagination_action' ) );
            // add_action( 'template_redirect', array( $this, 'preview_blog' ) );
            add_action( 'admin_menu', array( $this, 'et_register_about_us_page' ) ); //add submenu page
            add_action( 'admin_menu', array( $this, 'et_register_stuff_page' ) ); //add submenu page
            add_filter( 'post_row_actions', array( $this, 'et_remove_row_actions' ), 10, 1 );
            add_filter( 'manage_everesttimeline_posts_columns', array( $this, 'et_columns_head' ) );
            add_action( 'manage_everesttimeline_posts_custom_column', array( $this, 'et_columns_content' ), 10, 2 );
            add_action( 'admin_head-post-new.php', array( $this, 'et_posttype_admin_css' ) );
            add_action( 'admin_head-post.php', array( $this, 'et_posttype_admin_css' ) );
            add_action( 'widgets_init', array( $this, 'et_widget_register' ) );
            add_action( 'wp_ajax_et_icon_image', array( $this, 'et_icon_image' ) );
            add_action( 'vc_before_init', array( $this, 'et_vc_integrate_widget' ) );
            add_action( 'admin_menu', array( $this, 'et_common_settings_page' ) ); //add submenu page
            add_action( 'admin_post_et_settings_save', array( $this, 'et_save_form_settings' ) );
            add_action( 'init', array( $this, 'et_register_custom_timeline' ) );
            add_action( 'init', array( $this, 'et_timeline_taxonomies' ), 0 );
            //add_filter( 'the_content', array( $this, 'et_preview_page' ), 10 );
        }

//load the text domain for language translation
        function et_plugin_text_domain(){
            load_plugin_textdomain( 'everest-timeline', false, basename( dirname( __FILE__ ) ) . '/languages/' );
        }

//register admin assets
        function et_register_admin_assets( $hook ){
            global $post;
            wp_enqueue_media();
            wp_enqueue_script( 'et-iconpicker-script', ET_JS_DIR . '/icon-picker.js', array( 'jquery' ), ET_VERSION );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_script( 'et-alpha-script', ET_JS_DIR . '/wp-color-picker-alpha.min.js', array( 'jquery', 'wp-color-picker' ), ET_VERSION );
            wp_enqueue_style( 'et-fontawesome', ET_CSS_DIR . '/font-awesome.min.css', false, ET_VERSION );
            wp_enqueue_script( 'wpac-script', ET_JS_DIR . '/wpac.js', array( 'jquery' ), ET_VERSION );
            wp_enqueue_script( 'wpac-time-script', ET_JS_DIR . '/wpac-time.js', array( 'jquery' ), ET_VERSION );
            wp_enqueue_script( 'et-admin-script', ET_JS_DIR . '/et-admin-script.js', array( 'jquery', 'wp-color-picker', 'jquery-ui-sortable', 'jquery-ui-core', 'et-iconpicker-script', 'et-alpha-script', 'wpac-time-script', 'wpac-script' ), ET_VERSION );
            $admin_ajax_nonce = wp_create_nonce( 'et-admin-ajax-nonce' );
            $admin_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $admin_ajax_nonce );
            wp_localize_script( 'et-admin-script', 'et_backend_js_params', $admin_ajax_object );
            wp_enqueue_style( 'et-backend-style', ET_CSS_DIR . '/et-backend-style.css', false, ET_VERSION );
            wp_enqueue_style( 'et-jquery-ui-style', ET_CSS_DIR . '/jquery-ui-css-1.12.1.css', false, ET_VERSION );
        }

//register frontend assests
        function et_register_assets(){
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_style( 'et-animate-style', ET_CSS_DIR . '/animate.css', false, ET_VERSION );
            wp_enqueue_style( 'et-bxslider-style', ET_CSS_DIR . '/jquery.bxslider.css', false, ET_VERSION );
            wp_enqueue_style( 'et-lightbox-style', ET_CSS_DIR . '/prettyPhoto.css', false, ET_VERSION );
            $et_common_settings = get_option( 'et_common_settings' );
            $check_font = (isset( $et_common_settings[ 'font_version' ] ) && $et_common_settings[ 'font_version' ] != '') ? esc_attr( $et_common_settings[ 'font_version' ] ) : 'old_version';
            if ( $check_font == 'old_version' ) {
                wp_enqueue_style( 'et-fontawesome', ET_CSS_DIR . '/font-awesome.min.css', false, ET_VERSION );
            } else {
                wp_enqueue_style( 'et-fontawesome-latest', ET_CSS_DIR . '/fontawesome-all.css', false, ET_VERSION );
            }
            wp_enqueue_style( 'et-font', '//fonts.googleapis.com/css?family=Bitter|Hind|Playfair+Display:400,400i,700,700i,900,900i|Open+Sans:400,500,600,700,900|Lato:300,400,700,900|Montserrat|Droid+Sans|Roboto|Lora:400,400i,700,700i|Roboto+Slab|Rubik|Merriweather:300,400,700,900|Poppins|Ropa+Sans|Playfair+Display|Rubik|Source+Sans+Pro|Roboto+Condensed|Roboto+Slab:300,400,700|Amatic+SC:400,700|Quicksand|Oswald|Quicksand:400,500,700|Vollkorn:400,400i,600,600i,700,700i|Fjalla+One', false );
            wp_enqueue_style( 'et-elegant-icons', ET_CSS_DIR . '/elegant-icons.css', false, ET_VERSION );
            wp_enqueue_style( 'et-frontend-style', ET_CSS_DIR . '/et-frontend.css', array( 'et-bxslider-style', 'et-font', 'et-animate-style', 'et-lightbox-style' ), ET_VERSION );
            wp_enqueue_style( 'et-responsive-style', ET_CSS_DIR . '/et-responsive.css', false, ET_VERSION );
            wp_enqueue_script( 'et-isotope-script', ET_JS_DIR . '/isotope.js', array( 'jquery' ), ET_VERSION );
            wp_enqueue_script( 'et-bxslider-script', ET_JS_DIR . '/jquery.bxslider.js', array( 'jquery' ), ET_VERSION );
            wp_enqueue_script( 'et-imageloaded-script', ET_JS_DIR . '/imagesloaded.min.js', array( 'jquery' ), ET_VERSION );
            wp_enqueue_script( 'et-lightbox-script', ET_JS_DIR . '/jquery.prettyPhoto.js', array( 'jquery' ), ET_VERSION );
            wp_enqueue_script( 'et-wow-script', ET_JS_DIR . '/wow.js', array( 'jquery' ), ET_VERSION );
            wp_enqueue_script( 'et-frontend-script', ET_JS_DIR . '/et-frontend.js', array( 'jquery', 'et-imageloaded-script', 'et-isotope-script', 'et-bxslider-script', 'et-wow-script', 'et-lightbox-script' ), ET_VERSION );
            $frontend_ajax_nonce = wp_create_nonce( 'et-frontend-ajax-nonce' );
            $frontend_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $frontend_ajax_nonce );
            wp_localize_script( 'et-frontend-script', 'et_frontend_js_params', $frontend_ajax_object );
        }

//register  custom post type
        function et_register_post_type(){
            include('inc/admin/register/et-register-post.php');
            register_post_type( 'Everest Timeline', $args );
        }

//adding  metabox
        function et_add_blog_metabox(){
            add_meta_box( 'et_add_timeline', __( 'Everest Timeline', ET_TD ), array( $this, 'et_add_timeline_callback' ), 'everesttimeline', 'normal', 'low' );
        }

        /*
         * callback function for Blog manager metabox
         */

        function et_add_timeline_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'et_timeline_nonce' );
            include('inc/admin/et-timeline-meta.php');
        }

//save the metabox
        function et_meta_save( $post_id ){
// Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST[ 'et_timeline_nonce' ] ) && wp_verify_nonce( $_POST[ 'et_timeline_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
// Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }
            if ( isset( $_POST[ 'et_option' ] ) ) {
                $et_array = ( array ) $_POST[ 'et_option' ];
                $val = $this -> sanitize_array( $et_array );
                update_post_meta( $post_id, 'et_option', $val );
            }
            return;
        }

//adding  metabox
        function et_add_settings_metabox(){
            foreach ( array_keys( $GLOBALS[ 'wp_post_types' ] ) as $post_type ) {
// Skip:
                if ( in_array( $post_type, array( 'attachment', 'revision', 'nav_menu_item', 'everesttimeline' ) ) )
                    continue;

                add_meta_box( 'et_add_setting_timeline', __( 'Everest Timeline', ET_TD ), array( $this, 'et_extra_field_callback' ), $post_type, 'normal', 'core' );
            }
        }

        /*
         * callback function for Blog manager metabox
         */

        function et_extra_field_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'et_timeline_nonce' );
            include('inc/admin/extra-field/et-extra-field.php');
        }

//save the extra field metabox values
        function et_extra_field_save( $post_id ){

// Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST[ 'et_timeline_nonce' ] ) && wp_verify_nonce( $_POST[ 'et_timeline_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
// Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }
            if ( isset( $_POST[ 'et_extra_option' ] ) ) {

                $et_extra = ( array ) $_POST[ 'et_extra_option' ];

                $extra_field = $this -> sanitize_array( $et_extra );
// save data
                update_post_meta( $post_id, 'et_extra_option', $extra_field );
            }
            return;
        }

        function print_array( $array ){
            echo '<pre>';
            print_r( $array );
            echo '</pre>';
        }

        /*
         * Ajax call for submiting the post details
         */

        function et_post_submit(){
            global $wpdb;
            include( 'inc/ajax/et-post-submit.php' );
            die();
        }

        /*
         * Ajax call for slider images
         */

        function et_slider_images(){
            global $wpdb;
            include( 'inc/admin/et-slider-image.php' );
            die();
        }

        function et_all_post_submit(){
            global $wpdb;
            include( 'inc/ajax/et-all-post-submit.php' );
            die();
        }

        function et_selected_post_taxonomy(){
            global $wpdb;
            include( 'inc/ajax/fetch-taxonomy.php' );
            die();
        }

        function et_selected_taxonomy_terms(){
            global $wpdb;
            include( 'inc/ajax/fetch-terms.php' );
            die();
        }

        function et_hierarchy_terms(){
            global $wpdb;
            include( 'inc/ajax/hierarchy-terms.php' );
            die();
        }

        function et_add_meta_condition(){
            global $wpdb;
            include( 'inc/ajax/add-meta.php' );
            die();
        }

        function et_add_tax_condition(){
            global $wpdb;
            include( 'inc/ajax/add-tax.php' );
            die();
        }

        function et_filter_tax_terms(){
            global $wpdb;
            include( 'inc/ajax/filter-tax.php' );
            die();
        }

        /*
         * Generate random key string
         */

        function et_generate_random_string( $length ){
            $string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_string = '';
            for ( $i = 1; $i <= $length; $i ++ ) {
                $random_string .= $string[ rand( 0, 61 ) ];
            }
            return $random_string;
        }

        function et_generate_shortcode( $atts, $content = null ){
            $args = array(
                'post_type' => 'everesttimeline',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'p' => $atts[ 'id' ]
            );
            foreach ( $atts as $key => $val ) {
                $$key = $val;
            }
            $et_post = new WP_Query( $args );
            if ( $et_post -> have_posts() ) :
                ob_start();
                include('inc/frontend/et-frontend.php');
                $blog = ob_get_contents();
            endif;
            wp_reset_query();
            ob_end_clean();
            return $blog;
        }

        /*
         * Shortcode Usage Metabox
         */

        function et_shortcode_usage_metabox(){
            add_meta_box( 'et_shortcode_usage_option', __( 'Everest Timeline Usage', ET_TD ), array( $this, 'et_shortcode_usage' ), 'everesttimeline', 'side', 'default' );
        }

        function et_shortcode_usage( $post ){

            wp_nonce_field( basename( __FILE__ ), 'et_shortcode_usage_option_nonce' );
            include('inc/admin/settings/et-usages.php');
        }

//returns all the terms for category dropdown as options
        function et_fetch_category_list( $taxonomy, $term_id ){
            $option_html = "";
            $taxonomies_array[] = $taxonomy;
            $terms = get_terms( $taxonomy, array( 'hide_empty' => false ) );
            $categoryHierarchy = array();
            if ( is_array( $terms ) ) {
                $this -> et_sort_terms_hierarchicaly( $terms, $categoryHierarchy );
                if ( count( $categoryHierarchy ) > 0 ) { //condition check if the taxonomy has atleast single term
                    $terms_exclude = array();
                    $option_html .= $this -> et_print_option( $categoryHierarchy, 1, '', '', $term_id );
                }
            }

            return $option_html;
        }

        function et_sort_terms_hierarchicaly( Array &$cats, Array &$into, $parentId = 0 ){
            if ( is_array( $cats ) ) {
                foreach ( $cats as $i => $cat ) {
                    if ( $cat -> parent == $parentId ) {
                        $into[ $cat -> term_id ] = $cat;
                        unset( $cats[ $i ] );
                    }
                }
            }

            foreach ( $into as $topCat ) {
                $topCat -> children = array();
                $this -> et_sort_terms_hierarchicaly( $cats, $topCat -> children, $topCat -> term_id );
            }
        }

        function et_print_option( $terms, $hierarchical = 1, $form = '', $field_title = '', $selected_term = array() ){

            foreach ( $terms as $term ) {
                $space = $this -> et_check_parent( $term );
                $option_value = $term -> term_id;
                if ( is_array( $selected_term ) ) {
                    $selected = (in_array( $option_value, $selected_term )) ? 'selected="selected"' : '';
                } else {
                    $selected = ($selected_term == $option_value) ? 'selected="selected"' : '';
                }

                $form .= '<option value="' . $option_value . '" ' . $selected . '>' . $space . $term -> name . '</option>';


                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> et_print_option( $term -> children, $hierarchical, '', $field_title, $selected_term );
                }
            }
            return $form;
        }

        function et_check_parent( $term, $space = '' ){
            if ( is_object( $term ) ) {
                if ( $term -> parent != 0 ) {
                    $space .= str_repeat( '&nbsp;', 2 );
                    $parent_term = get_term_by( 'id', $term -> parent, $term -> taxonomy );
// var_dump($space);
                    $space .= $this -> et_check_parent( $parent_term, $space );
                }
            }

            return $space;
        }

        function et_print_checkbox( $terms, $form = '', $field_title = '', $selected_term = array() ){
            foreach ( $terms as $term ) {
                $space = $this -> et_check_parent( $term );
                $option_value = $term -> slug;
                if ( is_array( $selected_term ) ) {
                    $checked = (in_array( $option_value, $selected_term )) ? 'checked="checked"' : '';
                } else {
                    $checked = ($selected_term == $option_value) ? 'checked="checked"' : '';
                }
                $form .= '<label class="et-checkbox-label">' . $space . '<input type="checkbox" name="' . $field_title . '[]"  value="' . $option_value . '" ' . $checked . '/>' . $term -> name . '</label>';

                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> et_print_checkbox( $term -> children, '', $field_title, $selected_term );
                }
            }

            return $form;
        }

        /*
         * Redirect function for view count
         */

        function et_get_post_view( $postID ){
            $count_key = 'post_views_count';
            $count = get_post_meta( $postID, $count_key, true );
            if ( $count == '' ) {
                delete_post_meta( $postID, $count_key );
                add_post_meta( $postID, $count_key, '0' );

                return '0 View';
            }

            return $count . ' Views';
        }

        function et_set_post_view( $postID ){
            $count_key = 'post_views_count';
            $count = ( int ) get_post_meta( $postID, $count_key, true );
            if ( $count < 1 ) {
                delete_post_meta( $postID, $count_key );
                add_post_meta( $postID, $count_key, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $count_key, ( string ) $count );
            }
        }

        function et_page_template_redirect(){
            if ( is_single() ) {
                $this -> et_set_post_view( get_the_ID() );
            }
        }

        /*
         * Preview page
         */
//
//        function et_preview_page( $post ){
//            if ( is_singular( 'everesttimeline' ) ) {
//                if ( isset( $_GET[ 'preview_id' ] ) && is_user_logged_in() ) {
//                    $et_post_id = intval( $_GET[ 'preview_id' ] );
//                    return do_shortcode( "[et id='$et_post_id']" );
//                }if ( isset( $_GET[ 'p' ] ) && is_user_logged_in() ) {
//                    $et_post_id = intval( $_GET[ 'p' ] );
//                    return do_shortcode( "[et id='$et_post_id']" );
//                }
//            }
//        }
//        function et_preview_page( $post ){
//
//            if ( get_post_type() == 'everesttimeline' ) {
//                $post_status = get_post_status();
//                if ( $post_status != 'auto-draft' ) {
//                    $post_id = get_the_ID();
//                    $link = site_url( '?everesttimeline_preview=true&blog_id=' . $post_id );
//                    return $link;
//                }
//            } else {
//
//                $post_id = get_the_ID();
////                $link = site_url( '?everesttimeline_preview=true&preview_id=' . $post_id );
////                return $link;
//                $unpublished_link = set_url_scheme( get_permalink( $post ) );
//                $preview_link = get_preview_post_link( $post, array(), $unpublished_link );
//                return $preview_link();
////                //  $post = get_post( get_the_ID() );
//////                $args = array(
//////                    'p' => $post -> ID
//////                    , 'preview' => 'true'
//////                );
//////                return add_query_arg( $args, home_url() );
////                // exit();
////                $post_id = get_the_ID();
////                // $posts_page_id = get_option( 'page_for_posts' );
////                //$posts_page = get_page( $posts_page_id );
////                //$posts_page_title = $posts_page -> post_title;
////                $posts_page_url = get_permalink();
////
////                //  $link = site_url( '?preview_id=' . $post_id . '&preview=true' );
////                return $posts_page_url;
////                //  return 'http://localhost/everest-timeline/filter-template-1/?preview_id=5854&preview_nonce=13fe21c83e&preview=true';
//            }
//            // exit();
//        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array( $array = array(), $sanitize_rule = array() ){
            if ( ! is_array( $array ) || count( $array ) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( ! is_array( $v ) ) {

                    $default_sanitize_rule = (is_numeric( $k )) ? 'text' : 'html';
                    $sanitize_type = isset( $sanitize_rule[ $k ] ) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this -> sanitize_value( $v, $sanitize_type );
                }
                if ( is_array( $v ) ) {
                    $array[ $k ] = $this -> sanitize_array( $v, $sanitize_rule );
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value( $value = '', $sanitize_type = 'text' ){
            switch ( $sanitize_type ) {
                case 'html':
                    $allowed_html = wp_kses_allowed_html( 'post' );
                    return wp_kses( $value, $allowed_html );
                    break;
                default:
                    return sanitize_text_field( $value );
                    break;
            }
        }

        /*
         * pagination
         */

        function et_pagination_action(){
            include('inc/frontend/et-pagination-query.php');
            die();
        }

//        function preview_blog(){
//            if ( isset( $_GET[ 'everesttimeline_preview' ], $_GET[ 'blog_id' ] ) && $_GET[ 'everesttimeline_preview' ] && is_user_logged_in() ) {
//                include(ET_PATH . 'inc/frontend/et-preview.php');
//                die();
//            }
//        }

        /*
         * Adding Submenu page
         */

        function et_register_about_us_page(){
            add_submenu_page(
                    'edit.php?post_type=everesttimeline', __( 'About Us', ET_TD ), __( 'About Us', ET_TD ), 'manage_options', 'et-about-us', array( $this, 'et_about_callback' ) );
        }

        function et_about_callback(){

            include('inc/admin/et-about-page.php');
        }

        function et_register_stuff_page(){
            add_submenu_page(
                    'edit.php?post_type=everesttimeline', __( 'More WordPress Stuff', ET_TD ), __( 'More WordPress Stuff', ET_TD ), 'manage_options', 'et-stuff-us', array( $this, 'et_stuff_callback' ) );
        }

        function et_stuff_callback(){

            include('inc/admin/et-stuff-page.php');
        }

        function et_remove_row_actions( $actions ){
            if ( get_post_type() == 'everesttimeline' ) { // choose the post type where you want to hide the button
                unset( $actions[ 'view' ] ); // this hides the VIEW button on your edit post screen
                unset( $actions[ 'inline hide-if-no-js' ] );
            }
            return $actions;
        }

        /* Add custom column to post list */

        function et_columns_head( $columns ){
            $columns[ 'shortcodes' ] = __( 'Shortcodes', ET_TD );
            $columns[ 'template' ] = __( 'Template Include', ET_TD );
            return $columns;
        }

        function et_columns_content( $column, $post_id ){

            if ( $column == 'shortcodes' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="20" readonly="readonly">[et id="<?php echo $post_id; ?>"]</textarea><?php
            }
            if ( $column == 'template' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="41" readonly="readonly">&lt;?php echo do_shortcode("[et id='<?php echo $post_id; ?>']"); ?&gt;</textarea><?php
            }
        }

        /*
         * Remove view and preview from wp blog post
         */

        function et_posttype_admin_css(){
            global $post_type;
            $post_types = array(
                /* set post types */
                'everesttimeline'
            );
            if ( in_array( $post_type, $post_types ) )
                echo '<style type="text/css">#view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }

        function et_widget_register(){
            register_widget( 'ET_Everest_Timeline_Widget' );
        }

        // retrieves the attachment ID from the file URL
        function et_get_image_id( $image_url ){
            global $wpdb;
            $query = "SELECT ID FROM {$wpdb -> posts} WHERE guid='$image_url'";
            $id = $wpdb -> get_var( $query );
            return $id;
        }

        public static function getConnectionWithAccessToken( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret ){
            $connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );
            return $connection;
        }

        public static function etmakeClickableLinks( $s ){
            return preg_replace( '@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.-]*(\?\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $s );
        }

        /**
         * Returns abreviated count format
         * @param integer $value
         * @return string
         */
        public static function et_abreviateTotalCount( $value ){

            $abbreviations = array( 12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '' );

            foreach ( $abbreviations as $exponent => $abbreviation ) {

                if ( $value >= pow( 10, $exponent ) ) {

                    return round( floatval( $value / pow( 10, $exponent ) ), 1 ) . $abbreviation;
                }
            }
        }

        /*
         * Ajax call for icon image
         */

        function et_icon_image(){
            global $wpdb;
            include( 'inc/admin/et-icon-image.php' );
            die();
        }

        //adding  metabox
        function et_post_type_metabox(){
            add_meta_box( 'et_post_type', __( 'Post Feeds Types', ET_TD ), array( $this, 'et_post_type_callback' ), 'everesttimeline', 'normal', 'high' );
        }

        /*
         * callback function for Blog manager metabox
         */

        function et_post_type_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'et_timeline_nonce' );
            include('inc/admin/et-feed-type.php');
        }

        //adding  metabox
        function et_other_settings_metabox(){
            add_meta_box( 'et_other_settings', __( 'Other Settings', ET_TD ), array( $this, 'et_other_setting_callback' ), 'everesttimeline', 'normal', 'low' );
        }

        /*
         * callback function for Blog manager metabox
         */

        function et_other_setting_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'et_timeline_nonce' );
            include('inc/admin/et-settings.php');
        }

        public static function et_time_format( $date ){

            $current_date = strtotime( date( 'h:i A M d Y' ) );
            $tweet_date = strtotime( $date );
            $total_seconds = $current_date - $tweet_date;
            $seconds = $total_seconds % 60;
            $total_minutes = $total_seconds / 60;
            $minutes = $total_minutes % 60;
            $total_hours = $total_minutes / 60;
            $hours = $total_hours % 24;
            $total_days = $total_hours / 24;
            $days = $total_days % 365;
            $years = $total_days / 365;

            if ( $years >= 1 ) {
                if ( $years == 1 ) {
                    $date = $years . __( ' year ago', ET_TD );
                } else {
                    $date = $years . __( ' year ago', ET_TD );
                }
            } elseif ( $days >= 1 ) {
                if ( $days == 1 ) {
                    $date = $days . __( ' day ago', ET_TD );
                } else {
                    $date = $days . __( ' days ago', ET_TD );
                }
            } elseif ( $hours >= 1 ) {
                if ( $hours == 1 ) {
                    $date = $hours . __( ' hour ago', ET_TD );
                } else {
                    $date = $hours . __( ' hours ago', ET_TD );
                }
            } elseif ( $minutes > 1 ) {
                $date = $minutes . __( ' minutes ago', ET_TD );
            } else {
                $date = __( "1 minute ago", ET_TD );
            }

            return $date;
        }

        function evtl_get_feed_json( $feeds_mulit_data ){
            // data to be returned
            $response = array();
            $curl_success = true;
            if ( is_callable( 'curl_init' ) ) {
                if ( is_array( $feeds_mulit_data ) ) {
                    //Single Curl Loop
                    $fts_curl_option = '';
                    if ( $fts_curl_option == '' ) {
                        // array of curl handles
                        $curly = array();
                        // multi handle
                        $mh = curl_multi_init();
                        // loop through $data and create curl handles
                        // then add them to the multi-handle
                        foreach ( $feeds_mulit_data as $id => $d ) {
                            $curly[ $id ] = curl_init();
                            $url = (is_array( $d ) && ! empty( $d[ 'url' ] )) ? $d[ 'url' ] : $d;
                            curl_setopt( $curly[ $id ], CURLOPT_URL, $url );
                            curl_setopt( $curly[ $id ], CURLOPT_HEADER, 0 );
                            curl_setopt( $curly[ $id ], CURLOPT_RETURNTRANSFER, 1 );
                            curl_setopt( $curly[ $id ], CURLOPT_SSL_VERIFYPEER, false );
                            curl_setopt( $curly[ $id ], CURLOPT_SSL_VERIFYHOST, 0 );
                            // post?
                            if ( is_array( $d ) ) {
                                if ( ! empty( $d[ 'post' ] ) ) {
                                    curl_setopt( $curly[ $id ], CURLOPT_POST, 1 );
                                    curl_setopt( $curly[ $id ], CURLOPT_POSTFIELDS, $d[ 'post' ] );
                                }
                            }
                            // extra options?
                            if ( ! empty( $options ) ) {
                                curl_setopt_array( $curly[ $id ], $options );
                            }
                            curl_multi_add_handle( $mh, $curly[ $id ] );
                        }
                        // execute the handles
                        $running = null;
                        do {
                            $curl_status = curl_multi_exec( $mh, $running );
                            // Check for errors
                            $info = curl_multi_info_read( $mh );
                            if ( false !== $info ) {
                                // Add connection info to info array:
                                if ( ! $info[ 'result' ] ) {
                                    //$multi_info[(integer) $info['handle']]['error'] = 'OK';
                                } else {
                                    $multi_info[ ( integer ) $info[ 'handle' ] ][ 'error' ] = curl_error( $info[ 'handle' ] );
                                    $curl_success = false;
                                }
                            }
                        } while ( $running > 0 );
                        // get content and remove handles
                        foreach ( $curly as $id => $c ) {
                            $response[ $id ] = curl_multi_getcontent( $c );
                            curl_multi_remove_handle( $mh, $c );
                        }
                        curl_multi_close( $mh );
                    } //Multi Curl Loop
                    else {
                        // array of curl handles
                        $curly = array();
                        // loop through $data and create curl handles
                        // then add them to the multi-handle
                        foreach ( $feeds_mulit_data as $id => $d ) {
                            $curly[ $id ] = curl_init();
                            $url = (is_array( $d ) && ! empty( $d[ 'url' ] )) ? $d[ 'url' ] : $d;
                            curl_setopt( $curly[ $id ], CURLOPT_URL, $url );
                            curl_setopt( $curly[ $id ], CURLOPT_HEADER, 0 );
                            curl_setopt( $curly[ $id ], CURLOPT_RETURNTRANSFER, 1 );
                            curl_setopt( $curly[ $id ], CURLOPT_SSL_VERIFYPEER, false );
                            curl_setopt( $curly[ $id ], CURLOPT_SSL_VERIFYHOST, 0 );
                            // post?
                            if ( is_array( $d ) ) {
                                if ( ! empty( $d[ 'post' ] ) ) {
                                    curl_setopt( $curly[ $id ], CURLOPT_POST, 1 );
                                    curl_setopt( $curly[ $id ], CURLOPT_POSTFIELDS, $d[ 'post' ] );
                                }
                            }
                            // extra options?
                            if ( ! empty( $options ) ) {
                                curl_setopt_array( $curly[ $id ], $options );
                            }
                            $response[ $id ] = curl_exec( $curly[ $id ] );
                            curl_close( $curly[ $id ] );
                        }
                    }
                }//END Is_ARRAY
                //NOT ARRAY SINGLE CURL
                else {
                    $ch = curl_init( $feeds_mulit_data );
                    curl_setopt_array( $ch, array(
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_HEADER => 0,
                        CURLOPT_POST => true,
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => 0
                    ) );
                    $response = curl_exec( $ch );
                    curl_close( $ch );
                }
            }
            //File_Get_Contents if Curl doesn't work
            if ( ! $curl_success && ini_get( 'allow_url_fopen' ) == 1 || ini_get( 'allow_url_fopen' ) === TRUE ) {
                foreach ( $feeds_mulit_data as $id => $d ) {
                    $response[ $id ] = @file_get_contents( $d );
                }
            } else {
                //If nothing else use wordpress http API
                if ( ! $curl_success && ! class_exists( 'WP_Http' ) ) {
                    include_once(ABSPATH . WPINC . '/class-http.php');
                    $wp_http_class = new WP_Http;
                    foreach ( $feeds_mulit_data as $id => $d ) {
                        $wp_http_result = $wp_http_class -> request( $d );
                        $response[ $id ] = $wp_http_result[ 'body' ];
                    }
                }
                //Do nothing if Curl was Successful
            }
            return $response;
        }

        function get_facebook_feed_response( $page_id, $limit, $access_token ){
            $ftsCountIds = '';
            //Page
            $mulit_data = array( 'page_data' => 'https://graph.facebook.com/' . $page_id . '?fields=id,name,description&access_token=' . $access_token . '' );
            $mulit_data[ 'feed_data' ] = isset( $_REQUEST[ 'next_url' ] ) ? $_REQUEST[ 'next_url' ] : 'https://graph.facebook.com/posts?ids=' . $page_id . '&fields=id,caption,attachments,created_time,description,from,icon,link,message,name,object_id,picture,full_picture,place,shares,source,status_type,story,to,type&limit=' . $limit . '&access_token=' . $access_token . '';
            $response = $this -> evtl_get_feed_json( $mulit_data );
            //RETURN THE RESPONSE!!!
            return $response;
        }

        function et_vc_integrate_widget(){
            include('inc/admin/register/et-vc-elements.php');
        }

        function et_common_settings_page(){
            add_submenu_page(
                    'edit.php?post_type=everesttimeline', __( 'Common Settings', ET_TD ), __( 'Common Settings', ET_TD ), 'manage_options', 'et-common-settings-page', array( $this, 'et_common_settings' ) );
        }

        function et_common_settings(){
            include('inc/admin/settings/common-settings.php');
        }

        function et_save_form_settings(){
            if ( isset( $_POST[ 'et_form_nonce_field' ] ) && wp_verify_nonce( $_POST[ 'et_form_nonce_field' ], 'et_form_nonce' ) ) {

                if ( isset( $_POST[ 'et_common_settings' ] ) ) {
                    $et_common = ( array ) $_POST[ 'et_common_settings' ];
                    // sanitize array
                    $et_common_option = array_map( 'sanitize_text_field', $et_common );
                    // save data
                    update_option( 'et_common_settings', $et_common_option );
                }
            }
            wp_redirect( admin_url( 'admin.php?page=et-common-settings-page&message=1' ) );
            exit;
        }

        function et_wishlist_button( $post_id ){
            if ( class_exists( 'YITH_WCWL' ) ) {
                global $product, $yith_wcwl;
                $default_wishlists = is_user_logged_in() ? YITH_WCWL() -> get_wishlists( array( 'is_default' => true ) ) : false;
                if ( ! empty( $default_wishlists ) ) {
                    $default_wishlist = $default_wishlists[ 0 ][ 'ID' ];
                } else {
                    $default_wishlist = false;
                }
                $wishlist_url = YITH_WCWL() -> get_wishlist_url();
                ?>
                <div class="yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo $post_id; ?>">
                    <div class="yith-wcwl-add-button show" style="display:block">
                        <a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $post_id ) ); ?>" rel="nofollow" data-product-id="<?php echo $post_id; ?>" data-product-type="variable" class="add_to_wishlist">
                            <span class="icon_heart_alt" aria-hidden="true"></span>
                            <img src="<?php echo ET_IMG_DIR; ?>/wpspin_light.gif" class="ajax-loading" alt="loading" style="display:none !important;">
                            <span class="ts-tooltip button-tooltip"><?php _e( 'Add to wishlist', ET_TD ); ?></span>
                        </a>
                    </div>
                    <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                        <a href="<?php echo esc_url( $wishlist_url ); ?>" rel="nofollow">
                            <i class="fa fa-check" aria-hidden="true"></i><span class="ts-tooltip button-tooltip"><?php _e( 'Browse Wishlist', ET_TD ); ?></span> </a>
                    </div>
                    <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                        <a href="<?php echo esc_url( $wishlist_url ); ?>" rel="nofollow">
                            <i class="fa fa-check" aria-hidden="true"></i><span class="ts-tooltip button-tooltip"><?php _e( 'Browse Wishlist', ET_TD ); ?></span> </a>
                    </div>
                    <div style="clear:both"></div>
                    <div class="yith-wcwl-wishlistaddresponse"></div>
                </div>
                <?php
                return;
            }
        }

        function et_edd_pricing( $download_id ){
            // Bail if this download doesn't have variable pricing
            if ( ! edd_has_variable_prices( $download_id ) ) {
                echo edd_price( $download_id );
            }

            // Get the pricing options for this product
            $prices = apply_filters( 'edd_purchase_variable_prices', edd_get_variable_prices( $download_id ), $download_id );
            $type = edd_single_price_option_mode( $download_id ) ? 'checkbox' : 'radio';
            do_action( 'edd_before_price_options', $download_id );
            ?>
            <div class="et_price_options" data-link="<?php echo edd_get_checkout_uri(); ?>" data-id="<?php echo $download_id; ?>" >
                <?php
                if ( $prices ) {
                    echo '<select class="et-variable-price" name="edd_options[price_id][]">';
                    foreach ( $prices as $key => $price ) {
                        printf(
                                '<option for="%1$s" name="edd_options[price_id][]" id="%1$s" class="%2$s" value="%3$s" %5$s>%4$s</option>', esc_attr( 'edd_price_option_' . $download_id . '_' . $key ), esc_attr( 'edd_price_option_' . $download_id ), esc_attr( $key ), esc_html( $price[ 'name' ] . ' - ' . edd_currency_filter( edd_format_amount( $price[ 'amount' ] ) ) ), selected( isset( $_GET[ 'price_option' ] ), $key, false )
                        );
                        do_action( 'edd_after_price_option', $key, $price, $download_id );
                    }
                    echo '</select>';
                }
                do_action( 'edd_after_price_options_list', $download_id, $prices, $type );
                ?></div>
            <?php
            do_action( 'edd_after_price_options', $download_id );
        }

        function et_register_custom_timeline(){
            include(ET_PATH . 'inc/admin/register/et-custom.php');
            register_post_type( 'et-custom-timeline', $custom_args );
        }

//Create Taxonomy for inbuilt Product
        function et_timeline_taxonomies(){
            include('inc/admin/register/et-taxonomy.php');
        }

    }

//class terminations

    $et_obj = new ET_Everest_Timeline_Class();
}//class exist check close

include('inc/admin/register/et-widget.php');
