<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'video' => array(
        'label' => esc_html__('Video', 'bizipress'),
        'desc' => esc_html__('Enter Youtube or Vimeo video URL', 'bizipress'),
        'type' => 'text',
    ),
    'width' => array(
        'label' => esc_html__('Width', 'bizipress'),
        'desc' => esc_html__('Video width in pixels', 'bizipress'),
        'type' => 'short-text',
        'value' => '',
    ),
    'height' => array(
        'label' => esc_html__('Height', 'bizipress'),
        'desc' => esc_html__('Video height in pixels', 'bizipress'),
        'type' => 'short-text',
        'value' => '',
    ),
    'frame' => array(
        'type' => 'switch',
        'value' => '',
        'label' => esc_html__('Video Border', 'bizipress'),
        'desc' => esc_html__('Add a border to your video?', 'bizipress'),
        'left-choice' => array(
            'value' => '',
            'label' => esc_html__('No', 'bizipress'),
        ),
        'right-choice' => array(
            'value' => 'fw-video-frame',
            'label' => esc_html__('Yes', 'bizipress'),
        )
    ),
    'class' => array(
        'attr' => array('class' => 'border-bottom-none'),
        'label' => esc_html__('Custom Class', 'bizipress'),
        'desc' => esc_html__('Enter custom CSS class', 'bizipress'),
        'type' => 'text',
        'help' => esc_html__('You can use this class to further style this shortcode.', 'bizipress'),
        'value' => '',
    ),
);
