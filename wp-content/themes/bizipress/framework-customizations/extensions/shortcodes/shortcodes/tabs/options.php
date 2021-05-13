<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'tabs_style_settings' => array(
	'type' => 'multi-picker',
	'label' => false,
	'desc' => false,
	'picker' => array(
	    'tabs_style' => array(
		'label' => esc_html__('Tabs Style', 'bizipress'),
		'type' => 'image-picker',
		'value' => '',
		'desc' => esc_html__('Choose the tabs style', 'bizipress'),
		'choices' => array(
		    'tab-1' => array(
			'small' => array(
			    'height' => 75,
			    'src' => BIZIPRESS_IMAGES . '/image-picker/tab-1.png',
			),
			'large' => array(
			    'height' => 208,
			    'src' => BIZIPRESS_IMAGES . '/image-picker/tab-1.png'
			),
		    ),
		    'tab-2' => array(
			'small' => array(
			    'height' => 75,
			    'src' => BIZIPRESS_IMAGES . '/image-picker/tab-2.png',
			),
			'large' => array(
			    'height' => 208,
			    'src' => BIZIPRESS_IMAGES . '/image-picker/tab-2.png'
			),
		    ),
		    'tab-3' => array(
			'small' => array(
			    'height' => 75,
			    'src' => BIZIPRESS_IMAGES . '/image-picker/tab-3.png',
			),
			'large' => array(
			    'height' => 208,
			    'src' => BIZIPRESS_IMAGES . '/image-picker/tab-3.png'
			),
		    )
		),
	    ),
	),
	'choices' => array(
	    'tab-1' => array(
		'tabs' => array(
		    'type' => 'addable-popup',
		    'size' => 'large',
		    'label' => esc_html__('Tabs Items', 'bizipress'),
		    'popup-title' => esc_html__('Add/Edit Tabs', 'bizipress'),
		    'add-button-text' => esc_html__('Add Items', 'bizipress'),
		    'desc' => esc_html__('Add your favorite tab items.', 'bizipress'),
		    'template' => '{{=left_title}}',
		    'popup-options' => array(
			'title' => array(
			    'type' => 'group',
			    'options' => array(
				'left_title' => array(
				    'type' => 'text',
				    'label' => esc_html__('Left Main Title', 'bizipress'),
				    'value' => esc_html__('Who We Are', 'bizipress'),
				    'desc' => esc_html__('Enter tab left main title', 'bizipress')
				),
				'tab_main_icon' => array(
				    'type' => 'new-icon',
				    'label' => esc_html__('Tabs Main Icon', 'bizipress'),
				    'value' => 'fa fa-trophy',
				    'desc' => esc_html__('Choose tab left title icon', 'bizipress')
				),
			    )
			),
			'content' => array(
			    'type' => 'group',
			    'options' => array(
				'right_title' => array(
				    'type' => 'text',
				    'label' => esc_html__('Right Main Title', 'bizipress'),
				    'value' => esc_html__('We Are Awwared Winning Company', 'bizipress'),
				    'desc' => esc_html__('Add Tab items right content title text.', 'bizipress')
				),
				'right_description' => array(
				    'type' => 'wp-editor',
				    'teeny' => true,
				    'reinit' => true,
				    'label' => esc_html__('Right Description', 'bizipress'),
				    'value' => esc_html__('Helvetica cold-pressed lomo messenger bag ugh. Vinyl jean shorts Austin pork belly PBR retro, Etsy VHS kitsch actually messenger bag pug. Pbrb semiotics try-hard, Schlitz occupy dreamcatcher master cleanse Marfa Vice tofu.', 'bizipress'),
				    'desc' => esc_html__('Add Tabs right content description text.', 'bizipress')
				)
			    )
			)
		    )
		)
	    ),
	    'tab-2' => array(
		'tabs' => array(
		    'type' => 'addable-popup',
		    'size' => 'large',
		    'label' => esc_html__('Tabs Items', 'bizipress'),
		    'popup-title' => esc_html__('Add/Edit Tabs', 'bizipress'),
		    'add-button-text' => esc_html__('Add Items', 'bizipress'),
		    'desc' => esc_html__('Add your favorite tab items.', 'bizipress'),
		    'template' => '{{=left_title}}',
		    'popup-options' => array(
			'title' => array(
			    'type' => 'group',
			    'options' => array(
				'left_title' => array(
				    'type' => 'text',
				    'label' => esc_html__('Left Main Title', 'bizipress'),
				    'value' => esc_html__('Who We Are', 'bizipress'),
				    'desc' => esc_html__('Enter tab left main title', 'bizipress')
				),
				'left_icon' => array(
				    'type' => 'new-icon',
				    'label' => esc_html__('Left Title Icon', 'bizipress'),
				    'value' => 'fa fa-info',
				    'desc' => esc_html__('Choose tab left title icon', 'bizipress')
				),
			    )
			),
			'content' => array(
			    'type' => 'group',
			    'options' => array(
				'right_image' => array(
				    'type' => 'upload',
				    'label' => esc_html__('Right Main Image', 'bizipress'),
				    'desc' => esc_html__('Upload the tab right main image', 'bizipress')
				),
				'image_position' => array(
				    'type' => 'switch',
				    'label' => esc_html__('Image Position', 'bizipress'),
				    'left-choice' => array(
					'value' => 'pull-left',
					'label' => esc_html__('Left', 'bizipress'),
				    ),
				    'right-choice' => array(
					'value' => 'pull-right',
					'label' => esc_html__('Right', 'bizipress'),
				    ),
				),
				'right_title' => array(
				    'type' => 'text',
				    'label' => esc_html__('Right Main Title', 'bizipress'),
				    'value' => esc_html__('We Are Awwared Winning Company', 'bizipress'),
				    'desc' => esc_html__('Add Tab items right content title text.', 'bizipress')
				),
				'right_description' => array(
				    'type' => 'wp-editor',
				    'teeny' => true,
				    'reinit' => true,
				    'label' => esc_html__('Right Description', 'bizipress'),
				    'value' => esc_html__('Helvetica cold-pressed lomo messenger bag ugh. Vinyl jean shorts Austin pork belly PBR retro, Etsy VHS kitsch actually messenger bag pug. Pbrb semiotics try-hard, Schlitz occupy dreamcatcher master cleanse Marfa Vice tofu.', 'bizipress'),
				    'desc' => esc_html__('Add Tabs right content description text.', 'bizipress')
				)
			    )
			)
		    )
		)
	    ),
	    'tab-3' => array(
		'tabs' => array(
		    'type' => 'addable-popup',
		    'size' => 'large',
		    'label' => esc_html__('Tabs Items', 'bizipress'),
		    'popup-title' => esc_html__('Add/Edit Tabs', 'bizipress'),
		    'add-button-text' => esc_html__('Add Items', 'bizipress'),
		    'desc' => esc_html__('Add your favorite tab items.', 'bizipress'),
		    'template' => '{{=title}}',
		    'popup-options' => array(
			'title' => array(
			    'type' => 'group',
			    'options' => array(
				'title' => array(
				    'type' => 'text',
				    'label' => esc_html__('Tabs Title', 'bizipress'),
				    'value' => esc_html__('Section 1', 'bizipress'),
				    'desc' => esc_html__('Enter tabs main title', 'bizipress')
				)
			    )
			),
			'content' => array(
			    'type' => 'group',
			    'options' => array(
				'description' => array(
				    'type' => 'wp-editor',
				    'teeny' => true,
				    'reinit' => true,
				    'label' => esc_html__('Tabs Description', 'bizipress'),
				    'value' => esc_html__('Helvetica cold-pressed lomo messenger bag ugh. Vinyl jean shorts Austin pork belly PBR retro, Etsy VHS kitsch actually messenger bag pug. Pbrb semiotics try-hard, Schlitz occupy dreamcatcher master cleanse Marfa Vice tofu.', 'bizipress'),
				    'desc' => esc_html__('Add Tabs description text', 'bizipress')
				)
			    )
			)
		    )
		)
	    )
	)
    ),
);
