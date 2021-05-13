<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'button_settings' => array(
        'type' => 'addable-popup',
        'size' => 'large',
        'label' => esc_html__('Button', 'bizipress'),
        'desc' => esc_html__('Add your button', 'bizipress'),
        'template' => 'Button : {{- label }}',
        'popup-options' => array(
            'style' => array(
                'label' => esc_html__('Style', 'bizipress'),
                'desc' => esc_html__('Choose button style', 'bizipress'),
                'type' => 'image-picker',
                'value' => '',
                'choices' => array(
                    'default' => array(
                        'small' => array(
                            'height' => 70,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/button/button1.png'
                        ),
                        'large' => array(
                            'height' => 208,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/button/button1.png'
                        ),
                    ),
                    'primary' => array(
                        'small' => array(
                            'height' => 70,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/button/button2.png'
                        ),
                        'large' => array(
                            'height' => 208,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/button/button2.png'
                        ),
                    ),
                    'dark' => array(
                        'small' => array(
                            'height' => 70,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/button/button3.png'
                        ),
                        'large' => array(
                            'height' => 208,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/button/button3.png'
                        ),
                    ),
                ),
            ),
            'label' => array(
                'label' => esc_html__('Button Label', 'bizipress'),
                'desc' => esc_html__('This is the text that appears on your button', 'bizipress'),
                'type' => 'text',
                'value' => esc_html__('Read More', 'bizipress')
            ),
            'link' => array(
                'label' => esc_html__('Button Link', 'bizipress'),
                'desc' => esc_html__('Where should your button link to', 'bizipress'),
                'type' => 'text',
                'value' => '#'
            ),
            'target' => array(
                'type' => 'switch',
                'label' => esc_html__('Open Link in New Window', 'bizipress'),
                'desc' => esc_html__('Select here if you want to open the linked page in a new window', 'bizipress'),
                'right-choice' => array(
                    'value' => '_blank',
                    'label' => esc_html__('Yes', 'bizipress'),
                ),
                'left-choice' => array(
                    'value' => '_self',
                    'label' => esc_html__('No', 'bizipress'),
                ),
            ),
            'btn_icon_group' => array(
                'type' => 'group',
                'options' => array(
                    'icon' => array(
                        'type' => 'new-icon',
                        'label' => esc_html__('Icon', 'bizipress')
                    ),
                    'icon_position' => array(
                        'type' => 'switch',
                        'label' => '',
                        'desc' => esc_html__('Choose the icon position', 'bizipress'),
                        'right-choice' => array(
                            'value' => 'pull-right',
                            'label' => esc_html__('Right', 'bizipress'),
                        ),
                        'left-choice' => array(
                            'value' => '',
                            'label' => esc_html__('Left', 'bizipress'),
                        ),
                    ),
                )
            )
        )
    ),
    'btn_alignment' => array(
        'label' => esc_html__('Alignment', 'bizipress'),
        'desc' => esc_html__('Choose button or image alignment', 'bizipress'),
        'type' => 'image-picker',
        'value' => '',
        'choices' => array(
            '' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/no-align.jpg',
                    'title' => esc_html__('None', 'bizipress')
                ),
            ),
            'text-left' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/left-position.jpg',
                    'title' => esc_html__('Left', 'bizipress')
                ),
            ),
            'text-center' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/center-position.jpg',
                    'title' => esc_html__('Center', 'bizipress')
                ),
            ),
            'text-right' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/right-position.jpg',
                    'title' => esc_html__('Right', 'bizipress')
                ),
            ),
        ),
    ),
    'class' => array(
        'label' => esc_html__('Custom Class', 'bizipress'),
        'desc' => esc_html__('Enter custom CSS class', 'bizipress'),
        'help' => esc_html__('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /bizipress-child/style.css', 'bizipress'),
        'type' => 'text',
        'value' => '',
    ),
);
