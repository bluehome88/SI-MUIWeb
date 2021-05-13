<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'category' => array(
        'label' => esc_html__('Display From', 'bizipress'),
        'desc' => esc_html__('Select a blog category', 'bizipress'),
        'type' => 'select',
        'value' => '',
        'choices' => bizipress_get_category_term_list(),
    ),
        'class' => array(
        'label'			 => __( 'Switch', 'unyson' ),
        'type'			 => 'switch',
        'right-choice'	 => array(
            'value'	 => 'default',
            'label'	 => __( 'Default', 'unyson' )
        ),
        'left-choice'	 => array(
            'value'	 => 'classic',
            'label'	 => __( 'Classic', 'unyson' )
        ),
        'value'			 => 'default',
        'desc'			 => __( 'If you want  you can use classic style', 'unyson' ),
        ),
);
