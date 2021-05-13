<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'iconbox' => array(
        'type' => 'image-picker',
        'label' => esc_html__('Box Style', 'bizipress'),
        'choices' => array(
            'fw-iconbox-1' => array(
                'small' => array(
                    'height' => 75,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/icon-box-type1.jpg',
                ),
                'large' => array(
                    'height' => 208,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/icon-box-type1.jpg'
                ),
            ),
            'fw-iconbox-2' => array(
                'small' => array(
                    'height' => 75,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/icon-box-type2.jpg',
                ),
                'large' => array(
                    'height' => 208,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/icon-box-type2.jpg'
                ),
            ),
            'fw-iconbox-3' => array(
                'small' => array(
                    'height' => 75,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/icon-box-type3.jpg',
                ),
                'large' => array(
                    'height' => 208,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/icon-box-type3.jpg'
                ),
            ),
        ),
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title of the Box', 'bizipress'),
        'value' => esc_html__('Prototyping', 'bizipress'),
    ),
    'content' => array(
        'label' => esc_html__('Description', 'bizipress'),
        'desc' => esc_html__('Enter the icon box description', 'bizipress'),
        'value' => esc_html__('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'bizipress'),
        'type' => 'wp-editor',
    ),
    'icon' => array(
        'type' => 'new-icon',
        'label' => esc_html__('Choose an Icon', 'bizipress'),
    ),
);
