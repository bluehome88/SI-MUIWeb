<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$labels = array(
    'name' => _x( 'Timeline Categories', 'taxonomy general name', ET_TD ),
    'singular_name' => _x( 'Category', 'taxonomy singular name', ET_TD ),
    'search_items' => __( 'Search Category', ET_TD ),
    'all_items' => __( 'All Categories', ET_TD ),
    'parent_item' => __( 'Parent Category', ET_TD ),
    'parent_item_colon' => __( 'Parent Category:', ET_TD ),
    'edit_item' => __( 'Edit Category', ET_TD ),
    'update_item' => __( 'Update Category', ET_TD ),
    'add_new_item' => __( 'Add New Category', ET_TD ),
    'new_item_name' => __( 'New Category Name', ET_TD ),
    'menu_name' => __( 'Category', ET_TD ),
);

$args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'et-timeline-category' ),
);

register_taxonomy( 'et-timeline-category', array( 'et-custom-timeline' ), $args );

// Add new taxonomy, NOT hierarchical (like tags)
$tag_labels = array(
    'name' => _x( 'Timeline Tags', 'taxonomy general name', ET_TD ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name', ET_TD ),
    'search_items' => __( 'Search Tags', ET_TD ),
    'popular_items' => __( 'Popular Tags', ET_TD ),
    'all_items' => __( 'All Tags', ET_TD ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag', ET_TD ),
    'update_item' => __( 'Update Tag', ET_TD ),
    'add_new_item' => __( 'Add New Tag', ET_TD ),
    'new_item_name' => __( 'New Tag Name', ET_TD ),
    'separate_items_with_commas' => __( 'Separate tags with commas', ET_TD ),
    'add_or_remove_items' => __( 'Add or remove tags', ET_TD ),
    'choose_from_most_used' => __( 'Choose from the most used tags', ET_TD ),
    'not_found' => __( 'No tags found.', ET_TD ),
    'menu_name' => __( 'Tags', ET_TD ),
);

$tags_args = array(
    'hierarchical' => false,
    'labels' => $tag_labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'wppg-product-tags' ),
);

register_taxonomy( 'et-timeline-tags', 'et-custom-timeline', $tags_args );
