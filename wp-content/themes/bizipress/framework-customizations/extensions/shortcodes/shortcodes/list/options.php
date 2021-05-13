<?php

if (!defined('FW')) {
    die('Forbidden');
}

$template_directory = get_template_directory_uri();
$options = array(
    'list_group' => array(
        'type' => 'group',
        'options' => array(
            'list_items' => array(
                'type' => 'addable-popup',
                'label' => esc_html__('List Items', 'bizipress'),
                'desc' => esc_html__('Add list items', 'bizipress'),
                'template' => '{{=item}}',
                'popup-options' => array(
                    'sublist_group' => array(
                        'type' => 'group',
                        'options' => array(
                            'item' => array(
                                'label' => esc_html__('Item', 'bizipress'),
                                'desc' => esc_html__('Enter an item in list', 'bizipress'),
                                'type' => 'text',
                            ),
                            'sublist_items' => array(
                                'type' => 'addable-popup',
                                'label' => esc_html__('Sublist Items', 'bizipress'),
                                'desc' => esc_html__('Add sublist items', 'bizipress'),
                                'template' => '{{=subitem}}',
                                'popup-options' => array(
                                    'subitem' => array(
                                        'label' => esc_html__('Sublist Item', 'bizipress'),
                                        'desc' => esc_html__('Enter a sublist item', 'bizipress'),
                                        'type' => 'text',
                                    ),
                                    'btn_link_group' => array(
                                        'type' => 'group',
                                        'options' => array(
                                            'link' => array(
                                                'label' => esc_html__('Link', 'bizipress'),
                                                'desc' => esc_html__('you can add link if you want', 'bizipress'),
                                                'type' => 'text',
                                            ),
                                            'target_subitem' => array(
                                                'type' => 'switch',
                                                'label' => '',
                                                'desc' => esc_html__('Open link in new window?', 'bizipress'),
                                                'value' => '_self',
                                                'right-choice' => array(
                                                    'value' => '_blank',
                                                    'label' => esc_html__('Yes', 'bizipress'),
                                                ),
                                                'left-choice' => array(
                                                    'value' => '_self',
                                                    'label' => esc_html__('No', 'bizipress'),
                                                ),
                                            ),
                                        )
                                    ),
                                ),
                            ),
                        )
                    ),
                    'btn_link_group' => array(
                        'type' => 'group',
                        'options' => array(
                            'link' => array(
                                'label' => esc_html__('Link', 'bizipress'),
                                'desc' => esc_html__('you can add link if you want', 'bizipress'),
                                'type' => 'text',
                            ),
                            'target' => array(
                                'type' => 'switch',
                                'label' => '',
                                'desc' => esc_html__('Open link in new window?', 'bizipress'),
                                'value' => '_self',
                                'right-choice' => array(
                                    'value' => '_blank',
                                    'label' => esc_html__('Yes', 'bizipress'),
                                ),
                                'left-choice' => array(
                                    'value' => '_self',
                                    'label' => esc_html__('No', 'bizipress'),
                                ),
                            ),
                        )
                    ),
                ),
            ),
            'separator' => array(
                'type' => 'switch',
                'label' => '',
                'desc' => esc_html__('Separate each list item by a line?', 'bizipress'),
                'value' => '_self',
                'right-choice' => array(
                    'value' => 'list-bordered',
                    'label' => esc_html__('Yes', 'bizipress'),
                ),
                'left-choice' => array(
                    'value' => '',
                    'label' => esc_html__('No', 'bizipress'),
                ),
            ),
        )
    ),
    'list_type' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'selected_value' => array(
                'label' => esc_html__('Add Element', 'bizipress'),
                'desc' => esc_html__('Make a numbered list or add an icon to list items', 'bizipress'),
                'attr' => array('class' => 'fw-checkbox-float-left'),
                'value' => 'list-default',
                'type' => 'radio',
                'choices' => array(
                    'list-default' => esc_html__('None', 'bizipress'),
                    'list-numbers' => esc_html__('Number', 'bizipress'),
                    'list-icon' => esc_html__('Icon', 'bizipress'),
                ),
            )
        ),
        'choices' => array(
            'list-default' => array(),
            'list-numbers' => array(),
            'list-icon' => array(
                'icon' => array(
                    'type' => 'icon',
                    'label' => ''
                ),
            ),
        ),
        'show_borders' => false,
    ),
    'class' => array(
        'label' => esc_html__('Custom Class', 'bizipress'),
        'desc' => esc_html__('Enter custom CSS class', 'bizipress'),
        'type' => 'text',
        'help' => esc_html__('You can use this class to further style this shortcode', 'bizipress'),
    ),
);
