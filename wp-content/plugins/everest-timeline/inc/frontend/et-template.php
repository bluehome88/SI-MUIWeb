<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$query = new WP_Query( $args );
$rowCount = $query -> found_posts;
$class_layout = 'et-layout-' . $et_option[ 'timeline_layout' ] . '-section';
$pagination_checker = isset( $et_option[ 'et_select_pagination' ] ) ? esc_attr( $et_option[ 'et_select_pagination' ] ) : 'standard_pagination';

if ( $query -> have_posts() ) {
    $current_date = '';

    if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'vertical' || $et_option[ 'timeline_layout' ] == 'one_side' ) {
        ?>
        <div class="et-clearfix et-blog-cover">
            <?php
            $toggle_number = 0;
            $id_array = array();
            $font_array = array();
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                $timeline_date = get_the_date( 'Y' );
                $post_month = get_the_date( 'm' );
                $post_day = get_the_date( 'j' );
                $post_id = get_the_ID();

                $id = 'et_' . $post_id . '_' . $post_day . '_' . $post_month . '_' . $timeline_date;

                if ( ! empty( $et_extra_option[ 'font_icon' ] ) ) {
                    $v = explode( '|', $et_extra_option[ 'font_icon' ] );
                    $font = $v[ 0 ] . ' ' . $v[ 1 ];
                    $font_array[] = $font;
                } else {
                    $font_array[] = 'fa fa-calendar';
                }
                if ( $et_option[ 'timeline_layout' ] == 'vertical' ) {
                    include(ET_PATH . 'inc/frontend/content/et-vertical.php');
                } else {
                    include(ET_PATH . 'inc/frontend/content/et-one-side.php');
                    $toggle_number ++;
                }
            }
            if ( $pagination_checker == ('standard_pagination') ) {
                if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
                    include(ET_PATH . 'inc/frontend/meta/et-timebar.php');
                }
            }
            ?>
        </div>
        <?php
    } else {
        include(ET_PATH . 'inc/frontend/content/et-horizontal.php');
    }
} else {
    _e( 'No post found', ET_TD );
}
wp_reset_postdata();
