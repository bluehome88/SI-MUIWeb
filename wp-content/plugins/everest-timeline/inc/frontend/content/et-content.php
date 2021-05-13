<?php

if ( isset( $et_option[ 'post_content' ] ) && $et_option[ 'post_content' ] == 'full-text' ) {
    the_content();
} else {
//    if ( has_excerpt( $post -> ID ) ) {
//        echo substr( get_the_excerpt(), 0, $excerpt );
//    } else {
//        echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), $excerpt, '...' );
//    }
    echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), $excerpt, '...' );

    //
}