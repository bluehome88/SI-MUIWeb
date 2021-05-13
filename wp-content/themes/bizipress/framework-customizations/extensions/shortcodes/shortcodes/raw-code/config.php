<?php

if (!defined('FW')) {
    die('Forbidden');
}

$cfg = array(
    'page_builder' => array(
	'title' => esc_html__('RAW Code', 'bizipress'),
	'description' => esc_html__('Add a raw code', 'bizipress'),
	'tab' => esc_html__('Content Elements', 'bizipress'),
	'popup_header_elements' => '<a class="xs-docs-link" target="_blank" href="http://xpeedstudio.net/documentation/seopress/seopress-documentation/#RAWCode"><span class="xs-docs-info dashicons dashicons-sos"></span>' . esc_html__('Go to Docs', 'bizipress') . '</a>',
    )
);
