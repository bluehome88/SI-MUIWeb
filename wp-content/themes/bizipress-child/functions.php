<?php

// enqueue the child theme stylesheet

Function _action_bizipress_child_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', '_action_bizipress_child_enqueue_scripts',11);


//register the new menu
function register_my_menu() {
  //register_nav_menu('new-menu',__( 'New Menu' ));
    register_nav_menus(
    array(
      'middle-new-menu' => __( 'Middle New Menu' ),
      'bi-new-menu' => __( 'BI New Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menu' );





add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
 
function custom_email_confirmation_validation_filter( $result, $tag ) {
    if ( 'your-email-confirm' == $tag->name ) {
        $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
        $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
 
        if ( $your_email != $your_email_confirm ) {
            $result->invalidate( $tag, "Are you sure this is the correct address?" );
        }
    }
 
    return $result;
}



///add new role

add_role(
    'mui_users',
    __( 'MUI Users' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
    )
);




//custom post type for contact form 7 
function dynamic_field_values ( $tag, $unused ) {
 $user_id = get_current_user_id();

 
    if ( $tag['name'] != 'your-field-name' )
        return $tag;

    $args = array (
        'author'        =>  $user_id,
        'numberposts'   => -1,
        'post_type'     => 'my_vault',
        'orderby'       => 'title',
        'order'         => 'ASC',
    );

    $custom_posts = get_posts($args);

    if ( ! $custom_posts )
        return $tag;

    foreach ( $custom_posts as $custom_post ) {

    $tally= "Item Type: " . get_field( "item_type", $custom_post->ID ) . 
            " \r\n Item Description: " . get_field( "item_description", $custom_post->ID ) .
            " \r\n Item Price ($) : " . get_field( "item_price_$", $custom_post->ID ) .
            " \r\n Date Of Purchase : " . get_field( "date_of_purchase", $custom_post->ID ) .
            " \r\n Warrent Expiration : " . get_field( "warrent_expiration", $custom_post->ID ) .
            " \r\n Insurance Renewal: " . get_field( "insurance_renewal", $custom_post->ID ) .
            " \r\n Files: " . wp_get_attachment_url(get_field( "add_files", $custom_post->ID )) ;
    
    
    
        $tag['raw_values'][] = $custom_post->post_title;
        $tag['values'][] = $tally;
        $tag['labels'][] = $custom_post->post_title;

    }

    return $tag;

}

add_filter( 'wpcf7_form_tag', 'dynamic_field_values', 10, 2); 



//custom post type for jobs contact form 7 
function dynamic_field_values2 ( $tag, $unused ) {
 
    if ( $tag['name'] != 'jobs_list' )
        return $tag;

    $args = array (
        'numberposts'   => -1,
        'post_type'     => 'career',
        'orderby'       => 'title',
        'order'         => 'ASC',
        'exclude'       => '549',

    );

    $custom_posts = get_posts($args);

    if ( ! $custom_posts )
        return $tag;

    foreach ( $custom_posts as $custom_post ) {
        $tag['raw_values'][] = $custom_post->post_title;
        $tag['values'][] = $custom_post->post_title;
        $tag['labels'][] = $custom_post->post_title;
    }
    return $tag;
}

add_filter( 'wpcf7_form_tag', 'dynamic_field_values2', 10, 2); 








/**
 * Enables the Excerpt meta box in post type edit screen.
 */
function wpcodex_add_excerpt_support_for_pages() {
    add_post_type_support( 'news', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );/**


/**
 * Enables the Excerpt meta box in post type edit screen.
 */
function wpcodex_add_excerpt_support_for_pages3() {
    add_post_type_support( 'promotions', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages3' );/**




 * Enables the Excerpt meta box in post type edit screen.
 */
function wpcodex_add_excerpt_support_for_pages2() {
    add_post_type_support( 'staff', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages2' );

//new widget area

//new widget area


function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'contactUsForProducts',
        'id'            => 'contactUsForProducts',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


/*
// Отключаем emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' , 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 7 );
remove_action( 'admin_print_styles', 'print_emoji_styles' , 7 );
remove_filter( 'the_content_feed', 'wp_staticize_emoji', 7 );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji', 7 );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email', 7 ); 

// Отключаем REST API 
remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

remove_action( 'init',          'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );
remove_action( 'rest_api_init',          'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
/**//*
// Удаляем meta generator
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// Удаляем короткую ссылку
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );

// Удаляем RSD, WLW ссылки, на главную, предыдущую, первую запись
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

// Удаляем RSS ссылки
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

// Удаляем dns prefetch
remove_action( 'wp_head', 'wp_resource_hints', 2 );
*/

// check for category parent
function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}
if ( !function_exists( 'custom_style_sheet' ) ) {
    function custom_style_sheet() {
        wp_enqueue_style( 'custom-styling', get_stylesheet_directory_uri() . '/assets/css/custom.css' );
        wp_enqueue_style( 'fontawesome5', get_stylesheet_directory_uri() . '/assets/css/fontawesome.min.css' );
        wp_enqueue_style( 'fontawesome-solid', get_stylesheet_directory_uri() . '/assets/css/solid.min.css' );
        wp_enqueue_style( 'modal4', get_stylesheet_directory_uri() . '/assets/css/modal-extend.css' );
    }
    add_action('wp_head', 'custom_style_sheet');
}

add_action( 'wp_enqueue_scripts', 'custom_script' );
function custom_script(){
    wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/assets/js/custom.js');
}

function wpcf7_handle_recipient ($WPCF7_ContactForm) {
  global $wpdb;

  $country = $_COOKIE['country'];
  $arrCountryLang = array(
      // 
      'barbados'            => 'Barbados',
      'trinidadandtobago'   => 'Trinidad and Tobago',
      'antiguaandbarbuda'   => 'Antigua & Barbuda',
      'dominica'            => 'Dominica',
      'grenada'             => 'Grenada',
      'montserrat'          => 'Montserrat',
      'stkittsandnevis'     => 'St. Kitts & Nevis',
      'stlucia'             => 'St. Lucia',
      'stvincentandthegrenadines'   => 'St. Vincent & the Grenadines',
      //
      'britishvirginislands'        => 'British Virgin Islands',
      'bahamas'         => 'Bahamas',
      'caymanislands'   => 'Cayman Islands',
      'jamaica'         => 'Jamaica',
      'turksandcaicos'  => 'Turks & Caicos',
      //
      'guyana'          => 'Guyana',
      'anguilla'         => 'Anguilla',
      'belize'          => 'Belize'
  );

  $arrReqRecipient = array(
      // 
      'barbados'            => 'ameeta@simplyintense.com',
      'trinidadandtobago'  => 'ameeta+1@simplyintense.com',
      'antiguaandbarbuda'   => 'ameeta@simplyintense.com',
      'dominica'            => 'ameeta@simplyintense.com',
      'grenada'             => 'ameeta@simplyintense.com',
      'montserrat'          => 'ameeta@simplyintense.com',
      'stkittsandnevis'     => 'ameeta@simplyintense.com',
      'stlucia'             => 'ameeta@simplyintense.com',
      'stvincentandthegrenadines'   => 'ameeta@simplyintense.com',
      //
      'britishvirginislands'        => 'ameeta@simplyintense.com',
      'bahamas'         => 'ameeta@simplyintense.com',
      'caymanislands'   => 'ameeta+2@simplyintense.com',
      'jamaica'         => 'ameeta@simplyintense.com',
      'turksandcaicos'  => 'ameeta@simplyintense.com',
      //
      'guyana'          => 'ameeta@simplyintense.com',
      'anguilla'         => 'ameeta@simplyintense.com',
      'belize'          => 'ameeta@simplyintense.com'
  );
  $arrClaimRecipient = array(
      //
      'barbados'            => 'ameeta@simplyintense.com',
      'trinidadandtobago'  => 'ameeta@simplyintense.com',
      'antiguaandbarbuda'   => 'ameeta@simplyintense.com',
      'dominica'            => 'ameeta@simplyintense.com',
      'grenada'             => 'ameeta@simplyintense.com',
      'montserrat'          => 'ameeta@simplyintense.com',
      'stkittsandnevis'     => 'ameeta@simplyintense.com',
      'stlucia'             => 'ameeta@simplyintense.com',
      'stvincentandthegrenadines'   => 'ameeta@simplyintense.com',
      //
      'britishvirginislands'        => 'ameeta@simplyintense.com',
      'bahamas'         => 'ameeta@simplyintense.com',
      'caymanislands'   => 'ameeta@simplyintense.com',
      'jamaica'         => 'ameeta@simplyintense.com',
      'turksandcaicos'  => 'ameeta@simplyintense.com',
      //
      'guyana'          => 'ameeta@simplyintense.com',
      'anguilla'         => 'ameeta@simplyintense.com',
      'belize'          => 'ameeta@simplyintense.com'
  );
  $arrBrokerRecipient = array(
      //
      'barbados'            => 'cargobroker.bb@massyunitedinsurance.com',
      'trinidadandtobago'  => 'cargobroker.tt@massyunitedinsurance.com',
      'caymanislands'   => 'cargobroker.ky@massyunitedinsurance.com',
      'jamaica'         => 'cargobroker.jm@massyunitedinsurance.com'
  );

  $claim_recipient = $arrClaimRecipient[$country];
  $quote_recipient = $arrReqRecipient[$country];
  $broker_recipient = $arrBrokerRecipient[$country];

  if( $country == 'trinidadandtobago')
    $career_recipient = 'ameeta@simplyintense.com';
  else
    $career_recipient = 'ameeta@simplyintense.com';

  $submission = WPCF7_Submission::get_instance();

  if ( $submission ) {
    $posted_data = $submission->get_posted_data();
    $uploaded_files = $submission->uploaded_files();
  }

  $wpcf7 = WPCF7_ContactForm::get_current();
  $mail = $wpcf7->prop('mail');

  // Quote forms
  if(   $WPCF7_ContactForm->id == 958 ||
        $WPCF7_ContactForm->id == 1113 ||
        $WPCF7_ContactForm->id == 976 ||
        $WPCF7_ContactForm->id == 981 ||
        $WPCF7_ContactForm->id == 5770 ||
        $WPCF7_ContactForm->id == 983
  ){
    $mail['recipient'] = $quote_recipient;
  }

  // Claim Forms
  if(   $WPCF7_ContactForm->id == 343 /*||
        $WPCF7_ContactForm->id == 742 ||
        $WPCF7_ContactForm->id == 333 ||
        $WPCF7_ContactForm->id == 741 ||
        $WPCF7_ContactForm->id == 740 ||
        $WPCF7_ContactForm->id == 327 ||
        $WPCF7_ContactForm->id == 753 ||
        $WPCF7_ContactForm->id == 752 ||
        $WPCF7_ContactForm->id == 751 ||
        $WPCF7_ContactForm->id == 746 ||
        $WPCF7_ContactForm->id == 750 ||
        $WPCF7_ContactForm->id == 748 ||
        $WPCF7_ContactForm->id == 747 */
   ){
    $mail['recipient'] = $claim_recipient;
  }

  // Career Forms
  if( $WPCF7_ContactForm->id == 421 ){
    $mail['recipient'] = $career_recipient;
  }

    // Broker Forms
  if( $WPCF7_ContactForm->id == 5666 ){
    $mail['recipient'] = $broker_recipient;
  }
  
  if( isset($posted_data['pname'])){
      if( $posted_data['pname'] == '' )
        $mail['body'] = str_replace( "Product Name: [pname]", "", $mail['body'] );
  }
  // Pass country info
  $mail['body'] = str_replace( "[country]", $arrCountryLang[$country], $mail['body'] );


  $wpcf7->set_properties(array("mail" => $mail));
  return $wpcf7;
}
add_action("wpcf7_before_send_mail", "wpcf7_handle_recipient");

// deactive spam check : TODO remove for activating google captcha // By Yakov
add_filter('wpcf7_spam', '__return_false');

// Career by selected country
function pre_career_posts( $query ) {

    if( is_admin() ) return;
    if( $query->is_main_query() ) return;
    // if( ! is_post_type_archive( 'actions' ) ) return;

    // only modify queries for 'career' post type
    if( isset($query->query_vars['post_type']) 
        && (
            $query->query_vars['post_type'] == 'career' || 
            $query->query_vars['post_type'] == 'news' || 
            $query->query_vars['post_type'] == 'photo_gallery' || 
            $query->query_vars['post_type'] == 'promotions'
        )
        
    ) {
        $country = $_COOKIE['country']; 
        $meta_query = array(
            'relation' => 'OR',
            array(
                'key'     => 'access_country',
                'value'   => null,
                'compare' => '==',
            ),
            array(
                'key'     => 'access_country',
                'value'   => $country,
                'compare' => 'LIKE',
            )
        );

        $query->set( 'meta_query', $meta_query );
    }

    // return
    return $query;
}
add_action('pre_get_posts', 'pre_career_posts');