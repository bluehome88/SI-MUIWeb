<?php if (!defined('FW')) die('Forbidden');

$choices = fw()->extensions->get('slider')->get_populated_sliders_choices();

if (!empty($choices)) {
	$options = array(
		'slider_id' => array(
			'type' => 'select',
			'label' => __('Select Slider', 'fw'),
			'choices' => fw()->extensions->get('slider')->get_populated_sliders_choices()
		),
		'width' => array(
			'type' => 'text',
			'label' => __('Set width', 'fw'),
			'value' => 300
		),
		'height' => array(
			'type' => 'text',
			'label' => __('Set height', 'fw'),
			'value' => 200
		)
	);
} else {
	$options = array(
		'slider_id' => array( // make sure it exists to prevent notices when try to get ['slider_id'] somewhere in the code
			'type' => 'hidden',
		),
		'no-forms' => array(
			'type' => 'html-full',
			'label' => false,
			'desc' => false,
			'html' =>
				'<div>'.
				'<h1 style="font-weight:100; text-align:center; margin-top:80px">'. __('No Sliders Available', 'fw') .'</h1>'.
				'<p style="text-align:center">'.
				'<em>'.
				str_replace(
					array(
						'{br}',
						'{add_slider_link}'
					),
					array(
						'<br/>',
						fw_html_tag('a', array(
							'href' => admin_url('post-new.php?post_type='. fw()->extensions->get('slider')->get_post_type()),
							'target' => '_blank',
						), __('create a new Slider', 'fw'))
					),
					__('No Sliders created yet. Please go to the {br}Sliders page and {add_slider_link}.', 'fw')
				).
				'</em>'.
				'</p>'.
				'</div>'
		)
	);
}
