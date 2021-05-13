<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'action' => array(
	'label' => esc_html__('MailChimp URL', 'bizipress'),
	'desc' => esc_html__('Enter your mailchimp URL', 'bizipress'),
	'desc' => wp_kses_post('Add MailChimp URL (How to get URL : <b>http://goo.gl/vjnzZm</b>)', 'bizipress'),
	'type' => 'text',
	'value' => 'http://themedept.us9.list-manage.com/subscribe/post?u=a8cd4fa72585379e205821fa2&amp;id=366e69e674'
    ),
    'btn_txt' => array(
	'label' => esc_html__('Button Text', 'bizipress'),
	'desc' => esc_html__('Add the MailChimp action button text', 'bizipress'),
	'type' => 'text',
	'value' => 'Subscribe'
    ),
    'class' => array(
	'label' => esc_html__('Custom Class', 'bizipress'),
	'desc' => esc_html__('Enter custom CSS class', 'bizipress'),
	'type' => 'text',
	'value' => '',
	'help' => esc_html__('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /wow-child/style.css.', 'bizipress'),
    ),
);
