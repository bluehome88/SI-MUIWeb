<?php
$vertical_tag_icon = array( 'template-2', 'template-3', 'template-6', 'template-7', 'template-8', 'template-10', 'template-12', 'template-13', 'template-16', 'template-17', 'template-18' );
$horizontal_tag_icon = array( 'template-1', 'template-5', 'template-6', 'template-7', 'template-8', 'template-10', 'template-13', 'template-14', 'template-16', 'template-17', 'template-18' );
$one_tag_icon = array( 'template-3', 'template-4' );

global $post;
if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

    $tags = get_the_tags();
} else {
    if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product' ) {
        $taxonomy_tag = 'product_tag';
    } else if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'download' ) {
        $taxonomy_tag = 'download_tag';
    } else {
        $taxonomy_tag = isset( $et_option[ 'show_post_tag_taxonomy' ] ) ? esc_attr( $et_option[ 'show_post_tag_taxonomy' ] ) : 'post_tag';
    }
    $tags = get_the_terms( $post -> ID, $taxonomy_tag );
}
$output = '';
if ( ! empty( $tags ) ) {
    foreach ( $tags as $tag ) {
        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $tag -> name ) ) . '">' . "$pre_tag " . esc_html( $tag -> name ) . '</a>' . $separator;
    }
    ?>
    <div class="et-tag-list">
        <?php
        if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'vertical' ) {
            if ( in_array( $et_option[ 'timeline_vertical_template' ], $vertical_tag_icon ) ) {
                ?>
                <span class="icon_tag_alt" aria-hidden="true"></span>
                <?php
            }
        } else if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'horizontal' ) {
            if ( in_array( $et_option[ 'timeline_horizontal_template' ], $horizontal_tag_icon ) ) {
                ?>
                <span class="icon_tag_alt" aria-hidden="true"></span>
                <?php
            }
        } else {
            if ( in_array( $et_option[ 'timeline_one_side_template' ], $one_tag_icon ) ) {
                ?>
                <span class="icon_tag_alt" aria-hidden="true"></span>
                <?php
            }
        }

        echo trim( $output, $separator );
        ?>
    </div>
    <?php
}