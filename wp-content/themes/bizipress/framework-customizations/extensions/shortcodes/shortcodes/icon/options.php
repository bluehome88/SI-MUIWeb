<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'title' => array(
        'label' => esc_html__('Title', 'bizipress'),
        'desc' => esc_html__('This is the text that appears on beside icon', 'bizipress'),
        'type' => 'text',
    ),
    'icon' => array(
        'type' => 'new-icon',
        'label' => esc_html__('Icon', 'bizipress')
    ),
);
