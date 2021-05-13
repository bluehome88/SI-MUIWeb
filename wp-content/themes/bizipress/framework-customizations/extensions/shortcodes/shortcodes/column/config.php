<?php

if (!defined('FW'))
    die('Forbidden');

$cfg = array(
    'page_builder' => array(
	'tab' => esc_html__('Layout Elements', 'bizipress'),
	'title' => esc_html__('Column', 'bizipress'),
	'popup_size' => 'large',
	'type' => 'column',
	'popup_header_elements' => '<a class="xs-docs-link" target="_blank" href="http://xpeedstudio.net/documentation/seopress/seopress-documentation/#ColumnsShortcode"><span class="xs-docs-info dashicons dashicons-sos"></span>' . esc_html__('Go to Docs', 'bizipress') . '</a>',
    )
);
