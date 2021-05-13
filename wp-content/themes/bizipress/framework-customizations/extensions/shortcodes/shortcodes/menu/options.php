<?php if(!defined('FW')){
    die('Forbidden');
}

$options = array(

   'title' => array(
     'type' => 'text',
     'label' => esc_html__('Title', 'bizipress'),
     'desc' => esc_html__('Text use as a widget title', 'bizipress')
   ),

  'xs_menu_list'  =>  array(
      'label'   => esc_html__('Custom Menu', 'bizipress'),
      'type'    => 'select',
      'value'   => '',
      'desc'    => esc_html__('Select your content font weight.', 'bizipress'),
      'choices' => bizipress_get_menu_list(),
  ),

  'class'             => array(
      'type'    => 'text',
      'label'   => esc_html__( 'Custom Class', 'bizipress' ),
      'desc'    => esc_html__( 'Enter a custom CSS class', 'bizipress' ),
      'help'    => esc_html__( 'You can use this class to further style this shortcode by adding your custom CSS.', 'bizipress' ),
   ),


);
