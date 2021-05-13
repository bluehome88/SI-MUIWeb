<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'team_style_settings' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'team_style' => array(
                'label' => esc_html__('Team Style', 'bizipress'),
                'type' => 'image-picker',
                'value' => 'team_style_one',
                'desc' => esc_html__('Select Team style.', 'bizipress'),
                'choices' => array(
                    'team-1' => array(
                        'small' => array(
                            'height' => 70,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/team/team-1.png'
                        ),
                        'large' => array(
                            'height' => 214,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/team/team-1.png'
                        ),
                    ),
                    'team-2' => array(
                        'small' => array(
                            'height' => 70,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/team/team-2.png'
                        ),
                        'large' => array(
                            'height' => 214,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/team/team-2.png'
                        ),
                    ),
                    'team-3' => array(
                        'small' => array(
                            'height' => 70,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/team/team-3.png'
                        ),
                        'large' => array(
                            'height' => 214,
                            'src' => BIZIPRESS_IMAGES . '/image-picker/team/team-3.png'
                        ),
                    ),
                ),
            ),
        ),
    ),
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Photo', 'bizipress'),
        'desc' => esc_html__('Add your team member photo', 'bizipress'),
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'bizipress'),
        'desc' => esc_html__('Add your team member title', 'bizipress'),
        'value' => esc_html__('Vosgi Varduh', 'bizipress')
    ),
    'position' => array(
        'type' => 'text',
        'label' => esc_html__('Position', 'bizipress'),
        'desc' => esc_html__('Add your team member position', 'bizipress'),
        'value' => esc_html__('Web Designer', 'bizipress')
    ),
    'message' => array(
        'type' => 'textarea',
        'label' => esc_html__('Info', 'bizipress'),
        'desc' => wp_kses_post('Add your team member message text (<b>Note: Message text is allow for Team Style 2 And Team Style 3</b>)', 'bizipress'),
        'value' => esc_html__('Eradicate invest honesty human rights accessibility theory of social change. Diversity experience in the field compassion, inspire breakthroughs planned giving.', 'bizipress')
    ),
    'socials' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('Social Icon', 'bizipress'),
        'size' => 'large',
        'template' => '{{- title }}',
        'add-button-text' => esc_html__('Add Icon', 'bizipress'),
        'limit' => 5,
        'popup-options' => array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'bizipress'),
                'desc' => esc_html__('Write the social icon title but it does not show in the front-end', 'bizipress'),
                'value' => esc_html__('Facebook', 'bizipress')
            ),
            'link' => array(
                'type' => 'text',
                'label' => esc_html__('Link', 'bizipress'),
                'desc' => esc_html__('Insert your social URL', 'bizipress'),
                'value' => '#'
            ),
            'icon' => array(
                'type' => 'new-icon',
                'label' => esc_html__('Icon', 'bizipress'),
                'desc' => esc_html__('Add your social icon', 'bizipress'),
                'value' => 'fa fa-facebook',
            ),
            'hover' => array(
                'type' => 'color-picker',
                'label' => esc_html__('Hover Color', 'bizipress'),
                'desc' => esc_html__('Select your social icon hover color', 'bizipress'),
                'value' => '#325c94',
            ),
        ),
    ),
);
