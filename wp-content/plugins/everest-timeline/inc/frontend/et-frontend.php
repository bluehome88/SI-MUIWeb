<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$post_id = $atts[ 'id' ];
global $post;
$et_option = get_post_meta( $post_id, 'et_option', true );
//$et_extra_option = get_post_meta( $post_id, 'et_extra_option', true );
$action_link = isset( $et_option[ 'link_target' ] ) ? esc_attr( $et_option[ 'link_target' ] ) : 'self';
$random_num = rand( 111111111, 999999999 );
include(ET_PATH . 'inc/frontend/inner/fa-version.php');
if ( isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'twitter-feed' ) {
    $et_layout_class = 'et-twitter-timeline' . ' et-twitter-timeline-' . $et_option[ 'twitter_template' ];
    $class_layout = 'et-twitter-section';
} else if ( isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'facebook-post' ) {
    $et_layout_class = 'et-facebook-timeline' . ' et-fb-timeline-' . $et_option[ 'fb_template' ];
    $class_layout = 'et-fb-section';
} else {
    $class_layout = 'et-layout-' . $et_option[ 'timeline_layout' ] . '-section';
    if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'vertical' ) {
        $et_layout_class = 'et-vertical-timeline' . ' et-ver-timeline-' . $et_option[ 'timeline_vertical_template' ];
    } else if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'horizontal' ) {
        $et_layout_class = 'et-horizontal-timeline' . ' et-hor-timeline-' . $et_option[ 'timeline_horizontal_template' ];
    }
//else if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'slider' ) {
//    $et_layout_class = 'et-slider-timeline' . ' et-slider-timeline-' . $et_option[ 'timeline_slider_template' ];
//}
    else {
        $et_layout_class = 'et-' . $et_option[ 'timeline_oneside_position' ] . '-timeline' . ' et-one-side-' . $et_option[ 'timeline_one_side_template' ];
    }
}
?>
<div class="et-post-outer-wrapper-<?php echo $random_num; ?> <?php
if ( $et_option[ 'et_select_pagination' ] == 'infinite_scroll' ) {
    echo 'et-infinite-scroll-wrapper';
}
?> et-main-blog-wrapper <?php echo esc_attr( $et_layout_class ); ?><?php
     if ( (isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product') && class_exists( 'WooCommerce' ) ) {
         echo ' woocommerce';
     }
     ?>"

     data-id="et_<?php
     echo rand( 1111111, 9999999 );
     ?>">
         <?php
         //Filter tabs
         // if ( $et_option[ 'et_select_layout' ] == 'grid' || $et_option[ 'et_select_layout' ] == 'slider' ) {

         if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
             include(ET_PATH . 'inc/frontend/et-filter-collect.php');
         }
         //  }
         // if ( $et_option[ 'et_select_layout' ] == 'grid' || ($et_option[ 'et_select_layout' ] == 'timeline' && $et_option[ 'timeline_layout' ] == 'vertical') || $et_option[ 'et_select_layout' ] == 'list' || $et_option[ 'et_select_layout' ] == 'slider' ) {
         ?>
    <div class="<?php
    echo esc_attr( $class_layout );
    if ( isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'twitter-feed' || isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'facebook-post' ) {
        echo ' et-clearfix';
    }
    ?> " >
             <?php
             // }

             if ( isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'wp-post' ) {
                 include(ET_PATH . 'inc/frontend/et-post/wp-post.php');
             } else if ( isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'twitter-feed' ) {
                 include(ET_PATH . 'inc/frontend/et-post/twitter-post.php');
             } else {
                 include(ET_PATH . 'inc/frontend/et-post/fb-post.php');
             }
             //    if ( $et_option[ 'et_select_layout' ] == 'grid' || ($et_option[ 'et_select_layout' ] == 'timeline' && $et_option[ 'timeline_layout' ] == 'vertical') || $et_option[ 'et_select_layout' ] == 'list' || $et_option[ 'et_select_layout' ] == 'slider' ) {
             ?>
    </div>
    <?php
    include(ET_PATH . 'inc/frontend/et-pagination.php');
    // }
    ?>
</div>
<?php
include(ET_PATH . 'inc/frontend/et-inline-style.php');



