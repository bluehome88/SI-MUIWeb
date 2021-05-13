<?php
global $post;
if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {
    $tags = get_the_tags();
} else {
    $tags = get_the_terms( get_the_ID(), $et_option[ 'select_post_taxonomy' ] );
}
$output = '';
if ( ! empty( $tags ) ) {
    foreach ( $tags as $tag ) {
        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $tag -> name ) ) . '">' . "$pre_tag" . esc_html( $tag -> name ) . '</a>' . $separator;
    }
    ?>
    <div class="et-tag-list">
        <i class="lnr lnr-tag"></i>
        <?php echo trim( $output, $separator );
        ?>
    </div>
    <?php
}