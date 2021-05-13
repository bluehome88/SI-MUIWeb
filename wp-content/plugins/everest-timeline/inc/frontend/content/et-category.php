<?php
$vertical_template_icon = array( 'template-2', 'template-3', 'template-4', 'template-5', 'template-6', 'template-9', 'template-11', 'template-14', 'template-16' );
$horizontal_template_icon = array( 'template-1', 'template-5', 'template-7', 'template-8', 'template-10', 'template-11', 'template-15', 'template-16', 'template-17', 'template-18' );
$one_side_template_icon = array( 'template-1', 'template-2' );
?>
<div class="et-category-wrap">
    <?php
    if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

        $categories = get_the_category();
    } else {
        $categories = $categories = get_the_terms( get_the_ID(), $et_option[ 'select_post_taxonomy' ] );
    }
    $output = '';
    if ( ! empty( $categories ) ) {
        foreach ( $categories as $category ) {
            if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-3' ) {
                $output .= '<span><a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a></span>' . $separator;
            } else {
                $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
            }
        }
        ?>
        <div class="et-category-list">
            <?php
            if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'vertical' ) {
                if ( in_array( $et_option[ 'timeline_vertical_template' ], $vertical_template_icon ) ) {
                    ?>
                    <span class="icon_folder-alt" aria-hidden="true"></span>
                    <?php
                }
            } else if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'horizontal' ) {
                if ( in_array( $et_option[ 'timeline_horizontal_template' ], $horizontal_template_icon ) ) {
                    ?>
                    <span class="icon_folder-alt" aria-hidden="true"></span>
                    <?php
                }
            } else {
                if ( in_array( $et_option[ 'timeline_one_side_template' ], $one_side_template_icon ) ) {
                    ?>
                    <span class="icon_folder-alt" aria-hidden="true"></span>
                    <?php
                }
            }
            echo trim( $output, $separator );
            ?>
        </div>
    <?php }
    ?>
</div>
