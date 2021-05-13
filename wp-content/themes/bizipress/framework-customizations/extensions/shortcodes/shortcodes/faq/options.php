<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'question' => array(
        'type' => 'text',
        'label' => esc_html__('Question', 'bizipress'),
        'value' => esc_html__('Who we are?', 'bizipress'),
        'desc' => esc_html__('Add your FAQ questions.', 'bizipress'),
    ),
    'answer' => array(
        'type' => 'textarea',
        'label' => esc_html__('Answer', 'bizipress'),
        'value' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, placeat, architecto rem dolorem dignissimos repellat veritatis in et eos doloribus magnam aliquam ipsa alias assumenda officiis quasi sapiente suscipit veniam odio voluptatum. Enim at asperiores quod velit minima officia accusamus cumque eligendi consequuntur fuga? Maiores, quasi, voluptates, exercitationem fuga voluptatibus a repudiandae expedita omnis molestiae alias repellat perferendis dolores dolor.', 'bizipress'),
        'desc' => esc_html__('Add your FAQ answers.', 'bizipress')
    )
);
