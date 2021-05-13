<?php

if (!defined('FW'))
    die('Forbidden');

$options = array(
    'partners' => array(
	'type' => 'addable-popup',
	'size' => 'medium',
	'label' => esc_html__('Partner Brand Image', 'bizipress'),
	'value' => esc_html__('Image 1', 'bizipress'),
	'desc' => esc_html__(' Use maximum 5 in one row.', 'bizipress'),
	'template' => '{{- title }}',
	'add-button-text' => esc_html__('Add Partner', 'bizipress'),
	'popup-options' => array(
	    'title' => array(
		'label' => esc_html__('Title', 'bizipress'),
		'type' => 'text',
		'value' => esc_html__('Partner Image 1', 'bizipress'),
		'desc' => esc_html__('Add your partner title but its does not show in the front-end', 'bizipress'),
	    ),
	    'image' => array(
		'label' => esc_html__('Image', 'bizipress'),
		'type' => 'upload',
		'desc' => esc_html__('Upload your partner brand image', 'bizipress'),
	    ),
	    'border' => array(
		'type' => 'switch',
		'value' => 'light-item',
		'label' => esc_html__('Border Hover Color', 'bizipress'),
		'desc' => esc_html__('Select the partner image border hover color', 'bizipress'),
		'right-choice' => array(
		    'value' => 'light-item',
		    'label' => esc_html__('Lightness', 'bizipress'),
		),
		'left-choice' => array(
		    'value' => '',
		    'label' => esc_html__('Darkness', 'bizipress'),
		),
	    ),
	    'link' => array(
		'label' => esc_html__('Link', 'bizipress'),
		'type' => 'text',
		'value' => '#',
		'desc' => esc_html__('Add your partner image link', 'bizipress'),
	    ),
	    'target' => array(
		'type' => 'switch',
		'label' => esc_html__('Open Link in New Window', 'bizipress'),
		'desc' => esc_html__('Select here if you want to open the linked page in a new window', 'bizipress'),
		'right-choice' => array(
		    'value' => '_blank',
		    'label' => esc_html__('Yes', 'bizipress'),
		),
		'left-choice' => array(
		    'value' => '_self',
		    'label' => esc_html__('No', 'bizipress'),
		),
	    ),
	),
    ),
);
