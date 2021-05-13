<?php

if (!defined('FW')) {
    die('Forbidden');
}

$cfg = array();

$cfg['page_builder'] = array(
    'title' => esc_html__('Testimonials', 'bizipress'),
    'description' => esc_html__('Add some Testimonials', 'bizipress'),
    'tab' => esc_html__('Content Elements', 'bizipress'),
    'popup_size' => 'medium'
);
