<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Main Title', 'bizipress'),
        'value' => esc_html__('Join with BizCraft and Give Your Website a Brand New Look.', 'bizipress'),
        'desc' => esc_html__('Add call to action main title.', 'bizipress')
    ),
    'content' => array(
        'label' => esc_html__('Box Description', 'bizipress'),
        'desc' => esc_html__('Add the box description text', 'bizipress'),
        'type' => 'textarea',
        'value' => esc_html__('Bras urna felis accumsan at ultrde cesid posuere masa socis nautoque penat', 'bizipress')
    ),
    'label' => array(
        'label' => esc_html__('Button Text', 'bizipress'),
        'desc' => esc_html__('This is the text that appears on your button', 'bizipress'),
        'type' => 'text',
        'value' => esc_html__('Purchase Now', 'bizipress')
    ),
    'btn_url' => array(
        'label' => esc_html__('Button Url', 'bizipress'),
        'type' => 'text',
        'value' => esc_html__('#', 'bizipress')
    ),
    'class' => array(
        'label' => esc_html__('Custom Class', 'bizipress'),
        'desc' => esc_html__('Enter custom CSS class', 'bizipress'),
        'help' => esc_html__('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /bizipress-child/style.css', 'bizipress'),
        'type' => 'text',
        'value' => '',
    ),
);
