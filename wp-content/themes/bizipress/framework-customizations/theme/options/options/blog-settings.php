<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'blog_settings' => array(
        'title' => esc_html__('Blog Settings', 'bizipress'),
        'type' => 'tab',
        'options' => array(
            'header-posts-box' => array(
                'title' => esc_html__('Posts Header', 'bizipress'),
                'type' => 'box',
                'options' => array(
                    'general_posts_header' => array(
                        'type' => 'multi',
                        'label' => false,
                        'attr' => array(
                            'class' => 'fw-option-type-multi-show-borders',
                        ),
                        'inner-options' => array(
                            'posts_header_group' => array(
                                'type' => 'group',
                                'options' => array(
                                    'breadcrumb' => array(
                                        'type' => 'switch',
                                        'label' => esc_html__('Breadcrumb', 'bizipress'),
                                        'desc' => esc_html__('Are you want to disable  breadcrumb?', 'bizipress'),
                                        'right-choice' => array(
                                            'value' => 'yes',
                                            'label' => esc_html__('Yes', 'bizipress'),
                                        ),
                                        'left-choice' => array(
                                            'value' => 'no',
                                            'label' => esc_html__('No', 'bizipress'),
                                        ),
                                    ),
                                    'header_title' => array(
                                        'type' => 'text',
                                        'label' => esc_html__('Blog Title', 'bizipress'),
                                        'value' => esc_html__('The Future of Web Design is Hidden in the History of Architecture', 'bizipress'),
                                        'desc' => esc_html__('Add your blog hero title', 'bizipress')
                                    ),
                                    'header_image' => array(
                                        'label' => esc_html__('Header Image', 'bizipress'),
                                        'desc' => esc_html__('Upload a header image', 'bizipress'),
                                        'help' => esc_html__('This default header image will be used for all your posts.', 'bizipress'),
                                        'type' => 'upload'
                                    ),
                                    'header_overlay_color' => array(
                                        'label' => '',
                                        'desc' => esc_html__('Select the image overlay color', 'bizipress'),
                                        'type' => 'rgba-color-picker'
                                    ),
                                )
                            ),
                        )
                    )
                )
            ),
            'blog' => array(
                'title' => esc_html__('Blog Settings', 'bizipress'),
                'type' => 'box',
                'options' => array(
                    'blog_display_settings' => array(
                        'type' => 'multi',
                        'label' => false,
                        'attr' => array(
                            'class' => 'fw-option-type-multi-show-borders',
                        ),
                        'inner-options' => array(
                            'post_date' => array(
                                'label' => esc_html__('Post Date', 'bizipress'),
                                'desc' => esc_html__('Show post date?', 'bizipress'),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => esc_html__('Yes', 'bizipress')
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => esc_html__('No', 'bizipress')
                                ),
                                'value' => 'yes',
                            ),
                            'post_author' => array(
                                'label' => esc_html__('Post Author', 'bizipress'),
                                'desc' => esc_html__('Show post author?', 'bizipress'),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => esc_html__('Yes', 'bizipress')
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => esc_html__('No', 'bizipress')
                                ),
                                'value' => 'yes',
                            ),
                            'post_categories' => array(
                                'label' => esc_html__('Post Categories', 'bizipress'),
                                'desc' => esc_html__('Show post categories?', 'bizipress'),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => esc_html__('Yes', 'bizipress')
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => esc_html__('No', 'bizipress')
                                ),
                                'value' => 'yes',
                            ),
                            'post_comment' => array(
                                'label' => esc_html__('Post Comment', 'bizipress'),
                                'desc' => esc_html__('Show post Comment?', 'bizipress'),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => esc_html__('Yes', 'bizipress')
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => esc_html__('No', 'bizipress')
                                ),
                                'value' => 'yes',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
