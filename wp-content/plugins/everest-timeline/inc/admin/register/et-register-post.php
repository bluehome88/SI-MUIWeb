<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$labels = array(
    'name' => _x( 'Everest Timeline', 'post type general name', ET_TD ),
    'singular_name' => _x( 'Everest Timeline', 'post type singular name', ET_TD ),
    'menu_name' => _x( 'Everest Timeline', 'admin menu', ET_TD ),
    'name_admin_bar' => _x( 'Everest Timeline', 'add new on admin bar', ET_TD ),
    'add_new' => _x( 'Add New', 'Everest Timeline', ET_TD ),
    'add_new_item' => __( 'Add New Everest Timeline', ET_TD ),
    'new_item' => __( 'New Everest Timeline', ET_TD ),
    'edit_item' => __( 'Edit Everest Timeline', ET_TD ),
    'view_item' => __( 'View Everest Timeline', ET_TD ),
    'all_items' => __( 'All Everest Timeline', ET_TD ),
    'search_items' => __( 'Search Everest Timeline', ET_TD ),
    'parent_item_colon' => __( 'Parent Everest Timeline:', ET_TD ),
    'not_found' => __( 'No Everest Timeline found.', ET_TD ),
    'not_found_in_trash' => __( 'No Everest Timeline found in Trash.', ET_TD )
);

$args = array(
    'labels' => $labels,
    'description' => __( 'Description.', ET_TD ),
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-clock',
    'query_var' => true,
    'rewrite' => array( 'slug' => ET_TD ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title' )
);

