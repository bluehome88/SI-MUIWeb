<?php

if (!defined('FW')) {
    die('Forbidden');
}



$options = array(
    'type' => array(
        'label' => esc_html__('Type', 'bizipress'),
        'desc' => esc_html__('Select divider type', 'bizipress'),
        'type' => 'image-picker',
        'value' => 'fw-line-solid',
        'choices' => array(
            'fw-line-solid' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/solid.jpg',
                    'title' => esc_html__('Solid Line', 'bizipress')
                ),
            ),
            'fw-line-dashed' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/dashed.jpg',
                    'title' => esc_html__('Dashed Line', 'bizipress')
                ),
            ),
            'fw-line-dotted' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/dotted.jpg',
                    'title' => esc_html__('Dotted Line', 'bizipress')
                ),
            ),
            'fw-line-double' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/double.jpg',
                    'title' => esc_html__('Double Line', 'bizipress')
                ),
            ),
            'fw-line-thick' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/thick.jpg',
                    'title' => esc_html__('Thick Line', 'bizipress')
                ),
            ),
            'fw-divider-space' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/space_gap.jpg',
                    'title' => esc_html__('Space', 'bizipress')
                ),
            ),
        ),
    ),
    'divider_size' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'size' => array(
                'label' => esc_html__('Height', 'bizipress'),
                'desc' => esc_html__('Select the top and bottom margin in px', 'bizipress'),
                'attr' => array('class' => 'fw-checkbox-float-left'),
                'type' => 'radio',
                'choices' => array(
                    'space-sm' => esc_html__('Small', 'bizipress'),
                    'space-md' => esc_html__('Medium', 'bizipress'),
                    'space-lg' => esc_html__('Large', 'bizipress'),
                    'custom' => esc_html__('Custom', 'bizipress'),
                ),
                'value' => 'space-md'
            ),
        ),
        'choices' => array(
            'custom' => array(
                'margin_top' => array(
                    'label' => esc_html__('Margin Top', 'bizipress'),
                    'desc' => esc_html__('Enter margin-top in px', 'bizipress'),
                    'attr' => array('class' => 'fw-option-width-small'),
                    'type' => 'short-text',
                ),
                'margin_bottom' => array(
                    'label' => esc_html__('Margin Bottom', 'bizipress'),
                    'attr' => array('class' => 'fw-option-width-small'),
                    'desc' => esc_html__('Enter margin-bottom in px', 'bizipress'),
                    'type' => 'short-text',
                ),
            ),
            'no' => array(),
        ),
        'show_borders' => false,
    ),
    'width' => array(
        'label' => esc_html__('Width', 'bizipress'),
        'desc' => esc_html__('Select the width size in %', 'bizipress'),
        'type' => 'radio-text',
        'choices' => array(
            '25' => esc_html__('25%', 'bizipress'),
            '50' => esc_html__('50%', 'bizipress'),
            '100' => esc_html__('100%', 'bizipress'),
        ),
        'custom' => 'custom_width',
        'value' => '100'
    ),
    'bg_color' => array(
        'label' => esc_html__('Color', 'bizipress'),
        'desc' => esc_html__('Select divider color', 'bizipress'),
        'type' => 'color-picker'
    ),
    'special_divider' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'selected_value' => array(
                'label' => esc_html__('Add Element', 'bizipress'),
                'desc' => esc_html__('Make a special divider by adding an icon or text to it', 'bizipress'),
                'attr' => array('class' => 'fw-checkbox-float-left'),
                'value' => 'none',
                'type' => 'radio',
                'choices' => array(
                    'none' => esc_html__('None', 'bizipress'),
                    'text' => esc_html__('Text', 'bizipress'),
                    'icon' => esc_html__('Icon', 'bizipress'),
                ),
            )
        ),
        'choices' => array(
            'text' => array(
                'title_text' => array(
                    'label' => '',
                    'desc' => esc_html__('This text will be displayed on the divider', 'bizipress'),
                    'type' => 'text',
                ),
                'color' => array(
                    'label' => esc_html__('Text Color', 'bizipress'),
                    'desc' => esc_html__('Select the text color', 'bizipress'),
                    'type' => 'color-picker'
                ),
                'show_bg' => array(
                    'type' => 'switch',
                    'label' => esc_html__('Background', 'bizipress'),
                    'desc' => esc_html__('Add a background to your text?', 'bizipress'),
                    'value' => 'no',
                    'right-choice' => array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes', 'bizipress'),
                    ),
                    'left-choice' => array(
                        'value' => 'no',
                        'label' => esc_html__('No', 'bizipress'),
                    ),
                ),
                'position' => array(
                    'label' => esc_html__('Position', 'bizipress'),
                    'desc' => esc_html__('Select text position', 'bizipress'),
                    'type' => 'image-picker',
                    'value' => '',
                    'choices' => array(
                        'title-left' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => BIZIPRESS_IMAGES . '/image-picker/left-position.jpg',
                                'title' => esc_html__('Left', 'bizipress')
                            ),
                        ),
                        '' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => BIZIPRESS_IMAGES . '/image-picker/center-position.jpg',
                                'title' => esc_html__('Center', 'bizipress')
                            ),
                        ),
                        'title-right' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => BIZIPRESS_IMAGES . '/image-picker/right-position.jpg',
                                'title' => esc_html__('Right', 'bizipress')
                            ),
                        ),
                    ),
                ),
                'divider_size' => array(
                    'label' => esc_html__('Size', 'bizipress'),
                    'desc' => esc_html__('Select divider size', 'bizipress'),
                    'attr' => array('class' => 'fw-checkbox-float-left'),
                    'type' => 'radio',
                    'value' => 'fw-divider-size-md',
                    'choices' => array(
                        'fw-divider-size-sm' => esc_html__('Small', 'bizipress'),
                        'fw-divider-size-md' => esc_html__('Medium', 'bizipress'),
                        'fw-divider-size-lg' => esc_html__('Large', 'bizipress'),
                    ),
                ),
            ),
            'icon' => array(
                'icon_class' => array(
                    'type' => 'icon',
                    'label' =>''
                ),
                'color' => array(
                    'label' => esc_html__('Icon Color', 'bizipress'),
                    'desc' => esc_html__('Select the icon color', 'bizipress'),
                    'type' => 'color-picker'
                ),
                'position' => array(
                    'label' => esc_html__('Position', 'bizipress'),
                    'desc' => esc_html__('Select icon position', 'bizipress'),
                    'type' => 'image-picker',
                    'choices' => array(
                        'title-left' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => BIZIPRESS_IMAGES . '/image-picker/left-position.jpg',
                                'title' => esc_html__('Left', 'bizipress')
                            ),
                        ),
                        '' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => BIZIPRESS_IMAGES . '/image-picker/center-position.jpg',
                                'title' => esc_html__('Center', 'bizipress')
                            ),
                        ),
                        'title-right' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => BIZIPRESS_IMAGES . '/image-picker/right-position.jpg',
                                'title' => esc_html__('Right', 'bizipress')
                            ),
                        ),
                    ),
                ),
                'divider_size' => array(
                    'label' => esc_html__('Size', 'bizipress'),
                    'desc' => esc_html__('Select divider size', 'bizipress'),
                    'attr' => array('class' => 'fw-checkbox-float-left'),
                    'type' => 'radio',
                    'value' => 'fw-divider-size-md',
                    'choices' => array(
                        'fw-divider-size-sm' => esc_html__('Small', 'bizipress'),
                        'fw-divider-size-md' => esc_html__('Medium', 'bizipress'),
                        'fw-divider-size-lg' => esc_html__('Large', 'bizipress'),
                    ),
                ),
            ),
            'none' => array(),
        ),
        'show_borders' => false,
    ),
    'link_id' => array(
        'type' => 'text',
        'label' => esc_html__('Link ID', 'bizipress'),
        'desc' => esc_html__('Enter a custom CSS id for this divider', 'bizipress'),
        'help' => sprintf("%s", esc_html__('Use this ID in any URL link in the page in order to anchor link to this divider', 'bizipress')),
    ),
    'class' => array(
        'label' => esc_html__('Custom Class', 'bizipress'),
        'desc' => esc_html__('Enter custom CSS class', 'bizipress'),
        'help' => esc_html__('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /wow-child/style.css', 'bizipress'),
        'type' => 'text',
    ),
);
