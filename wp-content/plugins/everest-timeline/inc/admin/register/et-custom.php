<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$custom_labels = array(
    'name' => _x( 'Custom Timeline', 'post type general name', ET_TD ),
    'singular_name' => _x( 'Custom Timeline', 'post type singular name', ET_TD ),
    'menu_name' => _x( 'Custom Timeline', 'admin menu', ET_TD ),
    'name_admin_bar' => _x( 'Custom Timeline', 'add new on admin bar', ET_TD ),
    'add_new' => _x( 'Add New', 'Custom Timeline', ET_TD ),
    'add_new_item' => __( 'Add New Custom Timeline', ET_TD ),
    'new_item' => __( 'New Custom Timeline', ET_TD ),
    'edit_item' => __( 'Edit Custom Timeline', ET_TD ),
    'view_item' => __( 'View Custom Timeline', ET_TD ),
    'all_items' => __( 'All Custom Timeline', ET_TD ),
    'search_items' => __( 'Search Custom Timeline', ET_TD ),
    'parent_item_colon' => __( 'Parent Custom Timeline:', ET_TD ),
    'not_found' => __( 'No Custom Timeline found.', ET_TD ),
    'not_found_in_trash' => __( 'No Custom Timeline found in Trash.', ET_TD )
);

$custom_args = array(
    'labels' => $custom_labels,
    'description' => __( 'Description.', ET_TD ),
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-clock',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'et-custom-timeline' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

