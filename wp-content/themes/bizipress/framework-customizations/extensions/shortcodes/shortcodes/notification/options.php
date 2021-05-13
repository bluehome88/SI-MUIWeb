<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'type' => array(
        'label' => esc_html__('Type', 'bizipress'),
        'desc' => esc_html__('Select the notification type', 'bizipress'),
        'value' => 'fw-alert-info',
        'type' => 'image-picker',
        'choices' => array(
            'success' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/notification-congratulation.jpg',
                    'title' => esc_html__('Congratulations', 'bizipress')
                ),
            ),
            'info' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/notification-information.jpg',
                    'title' => esc_html__('Information', 'bizipress')
                ),
            ),
            'warning' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/notification-warning.jpg',
                    'title' => esc_html__('Alert', 'bizipress')
                ),
            ),
            'danger' => array(
                'small' => array(
                    'height' => 50,
                    'src' => BIZIPRESS_IMAGES . '/image-picker/notification-error.jpg',
                    'title' => esc_html__('Error', 'bizipress')
                ),
            ),
        ),
    ),
    'message' => array(
        'label' => esc_html__('Message', 'bizipress'),
        'desc' => esc_html__('Notification message', 'bizipress'),
        'type' => 'text',
        'value' => esc_html__('Message!', 'bizipress'),
    ),
);
