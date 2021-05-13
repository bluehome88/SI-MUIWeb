<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

class FAQShortcode extends KST_Shortcode implements KST_Shortcode_Interface {

	protected $ID = 'faq';
	protected $name = 'Candy FAQ';
	protected $description = 'Smart FAQ with instant filter and analytics';
	protected $icon = 'fa fa-question';

	protected $args_map = array(
		'home_faq_margin_top' => 'mrg_top',
		'home_faq_margin_bottom' => 'mrg_bot',
		'home_faq_limit_width_switch' => 'limit_width',
		'home_faq_width_limit' => 'width',
		'home_show_faq_filter' => 'filter_on',
		'home_show_faq_toggle_all' => 'tggl_on',
		'home_faq_categories' => 'categories',
		'faq_include_children' => 'chld_on',
		'home_show_faq_categories' => 'cat_on',
		'home_show_faq_category_count' => 'count_on',

		// preset
		'custom_preset' => 'custom_preset',
		'preset' => 'preset',
	);

	public function render($atts, $content = '') {
		// shortcode defaults
		$args = wp_parse_args($atts, $this->get_defaults());

		TemplateHelper::render_faq(
			$this->map_params(
				$this->args_map,
				$this->clean_params($args)
			)
		);
	}

	/**
	 * Returns all shortcode options
	 * @return array
	 */
	public static function get_options() {
		return array(
			array(
				'id' => 'layout_section_title',
				'type' => 'title',
				'label' => __( 'FAQ layout', 'candy-faq' ),
				'description' => __( 'Configure FAQ layout', 'candy-faq' )
			),
			array(
				'id' => 'mrg_top',
				'type' => 'css_size',
				'label' => __( 'FAQ section top margin', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "3"),
				'description' => __( 'Distance between FAQ and previous section', 'candy-faq' ),
			),
			array(
				'id' => 'mrg_bot',
				'type' => 'css_size',
				'label' => __( 'FAQ section bottom margin', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "3"),
				'description' => __( 'Distance between FAQ and next sections', 'candy-faq' ),
			),

			array(
				'id' => 'limit_width',
				'type' => 'checkbox',
				'label' => __( 'Limit FAQ container width?', 'candy-faq' ),
				'default' => true
			),
			array(
				'id' => 'width',
				'type' => 'css_size',
				'label' => __( 'FAQ container maximum width', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "60"),
				'description' => __( 'You can make FAQ section more narrow, than your content width', 'candy-faq' ),
				'dependency' => array(
					'target' => 'limit_width',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'controls_section_title',
				'type' => 'title',
				'label' => __( 'FAQ controls', 'candy-faq' ),
				'description' => __( 'Configure FAQ controls', 'candy-faq' )
			),

			array(
				'id' => 'filter_on',
				'type' => 'checkbox',
				'label' => __( 'Show FAQ live filter?', 'candy-faq' ),
				'default' => true,
				'admin_label' => true
			),
			array(
				'id' => 'tggl_on',
				'type' => 'checkbox',
				'label' => __( 'Show FAQ toggle all button?', 'candy-faq' ),
				'default' => true,
				'admin_label' => true
			),
			array(
				'id' => 'categories_section_title',
				'type' => 'title',
				'label' => __( 'FAQ categories settings', 'candy-faq' ),
				'description' => __( 'Configure FAQ categories', 'candy-faq' )
			),
			array(
				'id' => 'categories',
				'type' => 'term_select',
				'label' => __( 'Select FAQ categories to display', 'candy-faq' ),
				'default' => '',
				'tax' => FAQ_CPT_CATEGORY,
				'description' => __( 'You can leave it empty to display questions from all categories.', 'candy-faq' ),
				'admin_label' => true
			),
			array(
				'id' => 'chld_on',
				'type' => 'checkbox',
				'label' => __( 'Include questions from child categories?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'When enabled, all nested questions will be displayed. Can be changed in shortcode.', 'candy-faq' ),
			),
			array(
				'id' => 'cat_on',
				'type' => 'checkbox',
				'label' => __( 'Show FAQ categories?', 'candy-faq' ),
				'default' => true
			),
			array(
				'id' => 'count_on',
				'type' => 'checkbox',
				'label' => __( 'Show FAQ category question count?', 'candy-faq' ),
				'default' => true,
				'dependency' => array(
					'target' => 'cat_on',
					'type' => 'EQ',
					'value' => true
				)
			),

			/**
			 * Custom FAQ preset
			 */
			array(
				'id' => 'custom_preset_section_title',
				'type' => 'title',
				'label' => __( 'FAQ style preset', 'candy-faq' ),
				'description' => __( 'Global theme is used by default', 'candy-faq' )
			),
			array(
				'id' => 'custom_preset',
				'type' => 'checkbox',
				'label' => __( 'Override style preset?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'Normally it is more convenient to set styles globally and insert different categories via shortcodes, but you can also override global styles if required', 'candy-faq' ),
				'admin_label' => true
			),
			array(
				'id' => 'preset',
				'type' => 'image_select',
				'label' => __( 'FAQ style preset', 'candy-faq' ),
				'options' => array(
					'theme1' => array(
						'label' => __( 'Default Blue', 'candy-faq' ),
						'img' => IMG_URL . 'theme-default.png',
					),
					'theme2' => array(
						'label' => __( 'Modern Boxed', 'candy-faq' ),
						'img' => IMG_URL . 'theme-modern-boxed.png',
					),
					'theme3' => array(
						'label' => __( 'Minimal Light', 'candy-faq' ),
						'img' => IMG_URL . 'theme-minimal-light.png',
					),
					'theme4' => array(
						'label' => __( 'Dark Boxed', 'candy-faq' ),
						'img' => IMG_URL . 'theme-dark-boxed.png',
					),
					'theme5' => array(
						'label' => __( 'Vibrant Orange', 'candy-faq' ),
						'img' => IMG_URL . 'theme-vibrant-orange.png',
					),
					'theme6' => array(
						'label' => __( 'Rounded Blue', 'candy-faq' ),
						'img' => IMG_URL . 'theme-rounded-blue.png',
					),
					'theme7' => array(
						'label' => __( 'Corporate Light', 'candy-faq' ),
						'img' => IMG_URL . 'theme-corporate-light.png',
					),
					'theme8' => array(
						'label' => __( 'Vibrant Blue', 'candy-faq' ),
						'img' => IMG_URL . 'theme-vibrant-blue.png',
					),
				),
				'default' => 'theme1',
				'dependency' => array(
					'target' => 'custom_preset',
					'type' => 'EQ',
					'value' => true
				)
			),
		);
	}
}