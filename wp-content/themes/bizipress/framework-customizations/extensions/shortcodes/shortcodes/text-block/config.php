<?php

if (!defined('FW')) {
    die('Forbidden');
}

$cfg = array();

$cfg['page_builder'] = array(
    'title' => esc_html__('Text Block', 'bizipress'),
    'description' => esc_html__('Add a Text Block', 'bizipress'),
    'tab' => esc_html__('Content Elements', 'bizipress'),
    'popup_size' => 'medium',
    'title_template' => 'Text Block {{ if (o.text) { }} : {{= o.text}}{{ } }}',
    'popup_header_elements' => '<a class="xs-docs-link" target="_blank" href="http://xpeedstudio.net/documentation/seopress/seopress-documentation/#TextBlock"><span class="xs-docs-info dashicons dashicons-sos"></span>' . esc_html__('Go to Docs', 'bizipress') . '</a>',
);
