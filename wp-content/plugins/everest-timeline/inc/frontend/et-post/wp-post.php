<?php

if ( isset( $et_option[ 'et_post_excerpt' ] ) ) {
    $excerpt = $et_option[ 'et_post_excerpt' ];
}
if ( isset( $et_option[ 'et_post_number' ] ) ) {
    $post_number = $et_option[ 'et_post_number' ];
} else {
    $post_number = 4;
}
$order = isset( $et_option[ 'et_select_order' ] ) ? esc_attr( $et_option[ 'et_select_order' ] ) : 'ASC';

$order_by = 'date';
if ( isset( $et_option[ 'et_select_post_status' ] ) ) {
    $status = $et_option[ 'et_select_post_status' ];
} else {
    $status = 'publish';
}
if ( isset( $et_option[ 'et_date_format_post' ] ) ) {
    $date_format = $et_option[ 'et_date_format_post' ];
}
if ( isset( $et_option[ 'post_type' ] ) ) {
    $post_type = $et_option[ 'post_type' ];
}


/*
 * Condition for taxonomy
 */
if ( isset( $et_option[ 'et_show_taxonomy_query' ] ) && $et_option[ 'et_show_taxonomy_query' ] == '1' ) {
    $tax = $et_option[ 'select_post_taxonomy' ];
    if ( $et_option[ 'taxonomy_queries_type' ] == 'simple-taxonomy' ) {
        if ( $et_option[ 'simple_taxonomy_terms' ] == '' ) {
            $terms = get_terms( $tax, array( 'hide_empty' => false ) );
            $term_ids = wp_list_pluck( $terms, 'term_id' );
            $id = implode( ", ", array_keys( $term_ids ) );
            $tax_query = array( array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array( $id )
                ), );
        } else {
            $simple_term = $et_option[ 'simple_taxonomy_terms' ];
            $tax_query = array( array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => $simple_term
                ), );
        }
    }
    /*
     * multiple taxonomy tax query
     */ else {
        $relation = $et_option[ 'et_multiple_tax_relation' ];
        $first_term_array = $et_option[ 'taxonomy_terms' ];
        $first_term_list = substr( implode( ", ", $first_term_array ), 0 );
        $blog_array = array( 'relation' => $relation );
        $blog_array[] = array(
            'taxonomy' => $tax,
            'field' => 'term_id',
            'terms' => array( $first_term_list ),
        );
        if ( isset( $et_option[ 'et_blog' ] ) ) {
            foreach ( $et_option[ 'et_blog' ] as $blog_key => $blog_detail ) {
                $tax = $et_option[ 'et_blog' ][ $blog_key ][ 'multiple_post_taxonomy' ];
                $operator = $et_option[ 'et_blog' ][ $blog_key ][ 'et_terms_operator' ];
                $term = $et_option[ 'et_blog' ][ $blog_key ][ 'multiple_taxonomy_terms' ];
                $term_collection = substr( implode( ", ", $term ), 0 );
                if ( isset( $et_option[ 'et_blog' ][ $blog_key ][ 'et_enable_operator' ] ) && $et_option[ 'et_blog' ][ $blog_key ][ 'et_enable_operator' ] == '1' ) {
                    $blog_array[] = array(
                        'taxonomy' => $tax,
                        'field' => 'term_id',
                        'terms' => array( $term_collection ),
                        'operator' => $operator,
                    );
                } else {
                    $blog_array[] = array(
                        'taxonomy' => $tax,
                        'field' => 'term_id',
                        'terms' => array( $term_collection ),
                    );
                }
            }
        }
        $tax_query[] = $blog_array;
    }
}

/*
 * Condition for custom field
 */
if ( isset( $et_option[ 'et_show_custom_query' ] ) && $et_option[ 'et_show_custom_query' ] == '1' ) {
    if ( $et_option[ 'meta_keys_type' ] == 'pre-available' ) {
        $meta_key = $et_option[ 'pre_meta_key' ];
    } else {
        $meta_key = $et_option[ 'et_other_meta_key' ];
    }
    if ( $et_option[ 'et_meta_value_type' ] == 'string' ) {
        $meta_value = $et_option[ 'et_meta_value' ];
    } else {
        $meta_value = $et_option[ 'et_meta_value_number' ];
    }
    $compare = $et_option[ 'et_compare_operator' ];
    if ( $et_option[ 'et_custom_field_type' ] == 'single_field' ) {
        $meta_value = $et_option[ 'et_meta_value_type' ];
        $meta_query = array(
            array(
                'key' => $meta_key,
                'value' => $meta_value,
                'compare' => $compare,
            ),
        );
    }
    /*
     * Multiple field
     */ else {
        $meta_array = array();
        $meta_array[] = array(
            'key' => $meta_key,
            'value' => $meta_value,
            'compare' => $compare,
        );
        foreach ( $et_option[ 'et_custom' ] as $custom_key => $custom_detail ) {
            if ( $et_option[ 'et_custom' ][ $custom_key ][ 'multiple_meta_key_type' ] == 'pre-available' ) {
                $multi_meta_key = $et_option[ 'et_custom' ][ $custom_key ][ 'et_pre_multiple_meta_key' ];
            } else {
                $multi_meta_key = $et_option[ 'et_custom' ][ $custom_key ][ 'et_multiple_other_key' ];
            }
            $multi_meta_value = $et_option[ 'et_custom' ][ $custom_key ][ 'et_multiple_meta_value' ];
            $multi_compare = $et_option[ 'et_custom' ][ $custom_key ][ 'et_compare_operator' ];
            $multi_type = $et_option[ 'et_custom' ][ $custom_key ][ 'et_field_compare_type' ];
            if ( isset( $et_option[ 'et_custom' ][ $custom_key ][ 'et_show_type_filter' ] ) && $et_option[ 'et_custom' ][ $custom_key ][ 'et_show_type_filter' ] == '1' ) {
                $meta_array[] = array(
                    'key' => $multi_meta_key,
                    'value' => $multi_meta_value,
                    'type' => $multi_type,
                    'compare' => $multi_compare,
                );
            } else {
                $meta_array[] = array(
                    'key' => $multi_meta_key,
                    'value' => $multi_meta_value,
                    'compare' => $multi_compare,
                );
            }
        }
        $meta_query[] = $meta_array;
    }
}
/*
 * Condition for search keyword
 */
if ( isset( $et_option[ 'et_show_keyword_query' ] ) && $et_option[ 'et_show_keyword_query' ] == '1' ) {

    if ( ! empty( $et_option[ 'et_search_keyword' ] ) ) {
        $keyword = $et_option[ 'et_search_keyword' ];
    }
}
/*
 * Condition for popular post
 */
if ( isset( $et_option[ 'et_show_popular_query' ] ) && $et_option[ 'et_show_popular_query' ] == '1' ) {
    if ( $et_option[ 'et_select_popular' ] == 'view' ) {
        $view_meta = 'post_views_count';
    }
}
$args = array(
    'post_type' => $post_type,
    'orderby' => $order_by,
    'order' => $order,
    'posts_per_page' => $post_number,
    'post_status' => $status
        //'paged' => $paged
);
if ( ! empty( $tax_query ) ) {
    $args[ 'tax_query' ] = $tax_query;
}
if ( ! empty( $keyword ) ) {
    $args[ 's' ] = $keyword;
}
if ( ! empty( $meta_query ) ) {
    $args[ 'meta_query' ] = $meta_query;
}
if ( ! empty( $view_meta ) ) {
    $args[ 'meta_key' ] = $view_meta;
}

include(ET_PATH . 'inc/frontend/et-template.php');
