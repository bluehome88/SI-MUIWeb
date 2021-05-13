<?php

if (!defined('FW'))
    die('Forbidden');

$cfg = array();

$cfg['page_builder'] = array(
    'title' => esc_html__('Contact Info', 'bizipress'),
    'description' => esc_html__('Add a Info With Icon', 'bizipress'),
    'tab' => esc_html__('Content Elements', 'bizipress'),
		'title_template' => 'Title {{ if (o.title) { }} : {{= o.title}}{{ } }}',

);
