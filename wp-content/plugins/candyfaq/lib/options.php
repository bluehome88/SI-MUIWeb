<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

class Options {

	public function __construct() {
		self::register();
	}

	public static function register() {}

	public static function get_options_defaults() {
		return array_reduce(self::get_non_ui_options(self::get_options()), function($defaults, $option) {
			$defaults[$option["id"]] = $option["default"];
			return $defaults;
		}, array());
	}

	/**
	 * Returns all options by id key
	 * @return mixed
	 */
	public static function get_options_by_id() {
		return array_reduce(self::get_non_ui_options(self::get_options()), function($options, $option) {
			$options[$option["id"]] = $option;
			return $options;
		}, array());
	}

	public static function get_options() {
		return array(

			/**
			 * FAQ
			 */
			array(
				'id' => 'faq_tab',
				'type' => 'tab',
				'label' => __( 'FAQ General', 'candy-faq' ),
				'icon' => 'fa-question-circle'
			),
			array(
				'id' => 'faq_title',
				'type' => 'title',
				'label' => __( 'FAQ global settings', 'candy-faq' ),
				'description' => __( 'Configure FAQ settings', 'candy-faq' )
			),
			array(
				'id' => 'faq_custom_order',
				'type' => 'checkbox',
				'label' => __( 'Enable FAQ custom sorting?', 'candy-faq' ),
				'default' => true,
				'description' => __( 'When enabled, you will be able to reorder questions using Drag n Drop.', 'candy-faq' ),
			),
			array(
				'id' => 'faq_orderby',
				'type' => 'select',
				'label' => __( 'FAQ order parameter', 'candy-faq' ),
				'options' => array(
					'date' => __( 'Date', 'candy-faq' ),
					'modified' => __( 'Last modified', 'candy-faq' ),
					'title' => __( 'Title', 'candy-faq' ),
					'ID' => __( 'ID', 'candy-faq' ),
					'name' => __( 'Slug', 'candy-faq' ),
				),
				'default' => 'date',
				'dependency' => array(
					'target' => 'faq_custom_order',
					'type' => 'NEQ',
					'value' => true
				)
			),
			array(
				'id' => 'faq_order',
				'type' => 'select',
				'label' => __( 'FAQ order', 'candy-faq' ),
				'options' => array(
					'ASC' => __( 'Ascending', 'candy-faq' ),
					'DESC' => __( 'Descending', 'candy-faq' )
				),
				'default' => 'DESC',
				'dependency' => array(
					'target' => 'faq_custom_order',
					'type' => 'NEQ',
					'value' => true
				)
			),
			array(
				'id' => 'faq_include_children',
				'type' => 'checkbox',
				'label' => __( 'Include questions from child categories?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'When enabled, all nested questions will be displayed. Can be changed in shortcode.', 'candy-faq' ),
			),
			array(
				'id' => 'faq_first_open',
				'type' => 'checkbox',
				'label' => __( 'Open first item?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'faq_toggle_mode',
				'type' => 'checkbox',
				'label' => __( 'Toggle mode?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'In toggle mode opening one item closes others.', 'candy-faq' ),
			),
			array(
				'id' => 'faq_slow_animation',
				'type' => 'checkbox',
				'label' => __( 'Slow FAQ open animation?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'faq_scroll_to_item',
				'type' => 'checkbox',
				'label' => __( 'Scroll to item on open?', 'candy-faq' ),
				'default' => true
			),
			array(
				'id' => 'faq_scroll_offset',
				'type' => 'input',
				'label' => __( 'Scroll to item offset, in pixels (can be negative)', 'candy-faq' ),
				'default' => 0,
				'dependency' => array(
					'target' => 'faq_scroll_to_item',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'question_text',
				'type' => 'input_text',
				'label' => __( 'Question singular text', 'candy-faq' ),
				'default' => __( 'question', 'candy-faq' )
			),
			array(
				'id' => 'questions_text',
				'type' => 'input_text',
				'label' => __( 'Question plural text', 'candy-faq' ),
				'default' => __( 'questions', 'candy-faq' )
			),
			array(
				'id' => 'faq_enable_advanced_plurals',
				'type' => 'checkbox',
				'label' => __( 'Enable advanced plurals logic?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'Can be useful for languages for more than 1 plural form', 'candy-faq' ),
			),
			array(
				'id' => 'questions_p2_text',
				'type' => 'input_text',
				'label' => __( 'Question plural (2nd form) text', 'candy-faq' ),
				'default' => __( 'questions', 'candy-faq' ),
				'dependency' => array(
					'target' => 'faq_enable_advanced_plurals',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'questions_singular_numbers',
				'type' => 'input',
				'label' => __( 'Question singular values', 'candy-faq' ),
				'default' => '1,21,31,41,51',
				'description' => __( 'Comma-separated list of numbers. You can also use ranges, for ex. 11-19', 'candy-faq' ),
				'dependency' => array(
					'target' => 'faq_enable_advanced_plurals',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'questions_pl1_numbers',
				'type' => 'input',
				'label' => __( 'Question 1st form plural values', 'candy-faq' ),
				'default' => '2-4,22-24,32-34,42-44,52-54',
				'description' => __( 'Comma-separated list of numbers. You can also use ranges, for ex. 11-19', 'candy-faq' ),
				'dependency' => array(
					'target' => 'faq_enable_advanced_plurals',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'questions_pl2_numbers',
				'type' => 'input',
				'label' => __( 'Question 2nd form plural values', 'candy-faq' ),
				'default' => '5-20,25-30,35-40,45-50',
				'description' => __( 'Comma-separated list of numbers. You can also use ranges, for ex. 11-19', 'candy-faq' ),
				'dependency' => array(
					'target' => 'faq_enable_advanced_plurals',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'faq_enable_pages',
				'type' => 'checkbox',
				'label' => __( 'Enable standalone answer pages?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'When enabled, each Q/A will have its own page with unique URL.', 'candy-faq' ),
			),
			array(
				'id' => 'faq_slug',
				'type' => 'input',
				'label' => __( 'FAQ items URL sluq (must be unique and not used by posts or pages)', 'candy-faq' ),
				'default' => __( 'questions', 'candy-faq' ),
				'description' => __( 'NOTE: these setting affects WordPress rewrite rules. After changing them you need to go to Settings - Permalinks and press Save to update rewrite rules.', 'candy-faq' ),
				'dependency' => array(
					'target' => 'faq_enable_pages',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'faq_include_in_search',
				'type' => 'checkbox',
				'label' => __( 'Include answers in global search results?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'When enabled, wordpress search will include matches from FAQ. Standard posts templates will be used.', 'candy-faq' ),
				'dependency' => array(
					'target' => 'faq_enable_pages',
					'type' => 'EQ',
					'value' => true
				)
			),
			/**
			 * Layout
			 */
			array(
				'id' => 'faq_layout_title',
				'type' => 'title',
				'label' => __( 'FAQ layout', 'candy-faq' ),
				'description' => __( 'Configure FAQ layout settings', 'candy-faq' )
			),

			array(
				'id' => 'faq_items_spacing',
				'type' => 'css_size',
				'label' => __( 'FAQ items spacing', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "0.3"),
				'description' => __( 'Distance between FAQ items', 'candy-faq' ),
			),
			array(
				'id' => 'faq_controls_margin_top',
				'type' => 'css_size',
				'label' => __( 'FAQ controls margin top', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "1"),
				'description' => __( 'Distance between FAQ controls and top of container', 'candy-faq' ),
			),
			array(
				'id' => 'faq_controls_margin_bottom',
				'type' => 'css_size',
				'label' => __( 'FAQ controls margin bottom', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "1"),
				'description' => __( 'Distance between FAQ controls and questions', 'candy-faq' ),
			),
			array(
				'id' => 'faq_controls_margin_left',
				'type' => 'css_size',
				'label' => __( 'FAQ controls margin left', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "0"),
				'description' => __( 'Distance between FAQ controls and left side of container', 'candy-faq' ),
			),
			array(
				'id' => 'faq_controls_margin_right',
				'type' => 'css_size',
				'label' => __( 'FAQ controls margin right', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "0"),
				'description' => __( 'Distance between FAQ controls and right side of container', 'candy-faq' ),
			),
			array(
				'id' => 'faq_category_margin_top',
				'type' => 'css_size',
				'label' => __( 'Category name top margin', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "1"),
				'description' => __( 'Distance between category title and previous section', 'candy-faq' ),
			),
			array(
				'id' => 'faq_category_margin_bottom',
				'type' => 'css_size',
				'label' => __( 'Category name bottom margin', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "0.3"),
				'description' => __( 'Distance between category title and questions', 'candy-faq' ),
			),
			array(
				'id' => 'faq_category_margin_left',
				'type' => 'css_size',
				'label' => __( 'Category name left margin', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "0"),
				'description' => __( 'Distance between category title and left side', 'candy-faq' ),
			),
			/**
			 * Styles
			 */
			array(
				'id' => 'faq_items_styles_title',
				'type' => 'title',
				'label' => __( 'FAQ style', 'candy-faq' ),
				'description' => __( 'Configure FAQ styling', 'candy-faq' )
			),
			array(
				'id' => 'faq_items_height',
				'type' => 'image_select',
				'label' => __( 'FAQ items height', 'candy-faq' ),
				'options' => array(
					'min' => array(
						'label' => __( 'Normal', 'candy-faq' ),
						'img' => IMG_URL . 'height-normal.png'
					),
					'medium' => array(
						'label' => __( 'Medium', 'candy-faq' ),
						'img' => IMG_URL . 'height-medium.png'
					),
					'high' => array(
						'label' => __( 'High', 'candy-faq' ),
						'img' => IMG_URL . 'height-high.png'
					)
				),
				'default' => 'min'
			),
			array(
				'id' => 'faq_bg',
				'type' => 'color',
				'label' => __( 'FAQ container background color', 'candy-faq' ),
				'default' => 'rgba(255,255,255,0)'
			),
			array(
				'id' => 'faq_items_sep',
				'type' => 'checkbox',
				'label' => __( 'Add items separator line?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'faq_items_sep_color',
				'type' => 'color',
				'label' => __( 'FAQ separator color', 'candy-faq' ),
				'default' => '#888',
				'dependency' => array(
					'target' => 'faq_items_sep',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'faq_items_rounded',
				'type' => 'checkbox',
				'label' => __( 'Rounded items?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'faq_shadow',
				'type' => 'checkbox',
				'label' => __( 'Add FAQ container shadow?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'faq_question_shadow',
				'type' => 'checkbox',
				'label' => __( 'Add FAQ question shadow?', 'candy-faq' ),
				'default' => false
			),


			array(
				'id' => 'faq_toggle_all_title',
				'type' => 'title',
				'label' => __( 'FAQ Toggle All button', 'candy-faq' ),
				'description' => __( 'Configure toggle all styling', 'candy-faq' )
			),
			array(
				'id' => 'faq_toggle_all_open_text',
				'type' => 'input_text',
				'label' => __( 'FAQ Toggle All open text', 'candy-faq' ),
				'default' => __( 'Open all', 'candy-faq' ),
			),
			array(
				'id' => 'faq_toggle_all_close_text',
				'type' => 'input_text',
				'label' => __( 'FAQ Toggle All close text', 'candy-faq' ),
				'default' => __( 'Close all', 'candy-faq' ),
			),
			array(
				'id' => 'show_faq_toggle_all_icon',
				'type' => 'checkbox',
				'label' => __( 'Show FAQ toggle all icon?', 'candy-faq' ),
				'default' => true
			),
			array(
				'id' => 'faq_toggle_all_icon',
				'type' => 'icon_select',
				'label' => __( 'FAQ toggle all icon (open)', 'candy-faq' ),
				'default' => 'fa-plus-circle',
				'dependency' => array(
					'target' => 'show_faq_toggle_all_icon',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'faq_toggle_all_icon_open',
				'type' => 'icon_select',
				'label' => __( 'FAQ toggle all icon (close)', 'candy-faq' ),
				'default' => 'fa-minus-circle',
				'dependency' => array(
					'target' => 'show_faq_toggle_all_icon',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'faq_toggle_all_bg',
				'type' => 'color',
				'label' => __( 'FAQ toggle all background color', 'candy-faq' ),
				'default' => '#4bb7e5'
			),
			array(
				'id' => 'faq_toggle_all_bg_hover',
				'type' => 'color',
				'label' => __( 'FAQ toggle all background color on mouse hover', 'candy-faq' ),
				'default' => '#64bee5'
			),
			array(
				'id' => 'faq_toggle_all_color',
				'type' => 'color',
				'label' => __( 'FAQ toggle all link color', 'candy-faq' ),
				'default' => '#ffffff'
			),
			array(
				'id' => 'faq_questions_title',
				'type' => 'title',
				'label' => __( 'FAQ Questions style', 'candy-faq' ),
				'description' => __( 'Configure questions styling', 'candy-faq' )
			),
			array(
				'id' => 'show_faq_question_icon',
				'type' => 'checkbox',
				'label' => __( 'Show FAQ question icon?', 'candy-faq' ),
				'default' => true
			),
			array(
				'id' => 'faq_question_icon',
				'type' => 'icon_select',
				'label' => __( 'FAQ question icon', 'candy-faq' ),
				'default' => 'fa-plus-circle'
			),
			array(
				'id' => 'faq_question_icon_open_action',
				'type' => 'select',
				'label' => __( 'FAQ question icon action on open', 'candy-faq' ),
				'options' => array(
					'rotate' => __( 'Rotate', 'candy-faq' ),
					'change' => __( 'Change', 'candy-faq' )
				),
				'default' => 'change'
			),
			array(
				'id' => 'faq_question_open_icon',
				'type' => 'icon_select',
				'label' => __( 'FAQ question open icon', 'candy-faq' ),
				'default' => 'fa-minus-circle',
				'dependency' => array(
					'target' => 'faq_question_icon_open_action',
					'type' => 'EQ',
					'value' => 'change'
				)
			),
			array(
				'id' => 'faq_question_bg',
				'type' => 'color',
				'label' => __( 'FAQ question background color', 'candy-faq' ),
				'default' => '#4bb7e5'
			),
			array(
				'id' => 'faq_question_bg_hover',
				'type' => 'color',
				'label' => __( 'FAQ question background color on mouse hover', 'candy-faq' ),
				'default' => '#64bee5'
			),
			array(
				'id' => 'faq_question_color',
				'type' => 'color',
				'label' => __( 'FAQ question text color', 'candy-faq' ),
				'default' => '#ffffff'
			),
			/**
			 * Answers
			 */
			array(
				'id' => 'faq_answers_title',
				'type' => 'title',
				'label' => __( 'FAQ Answers style', 'candy-faq' ),
				'description' => __( 'Configure answers styling', 'candy-faq' )
			),
			array(
				'id' => 'faq_answer_shadow',
				'type' => 'checkbox',
				'label' => __( 'Add answer inner shadow?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'faq_answer_bg',
				'type' => 'color',
				'label' => __( 'FAQ answer background color', 'candy-faq' ),
				'default' => '#ffffff'
			),
			array(
				'id' => 'faq_answer_color',
				'type' => 'color',
				'label' => __( 'FAQ answer text color', 'candy-faq' ),
				'default' => '#333'
			),
			array(
				'id' => 'faq_categories_title',
				'type' => 'title',
				'label' => __( 'FAQ Categories style', 'candy-faq' ),
				'description' => __( 'Configure categories styling', 'candy-faq' )
			),

			array(
				'id' => 'faq_category_color',
				'type' => 'color',
				'label' => __( 'FAQ category text color', 'candy-faq' ),
				'default' => '#333',
			),
			array(
				'id' => 'faq_count_bg',
				'type' => 'color',
				'label' => __( 'FAQ category count background color', 'candy-faq' ),
				'default' => '#4bb7e5',
			),
			array(
				'id' => 'faq_count_color',
				'type' => 'color',
				'label' => __( 'FAQ category count text color', 'candy-faq' ),
				'default' => '#ffffff',
			),
			/**
			 * Filter
			 */
			array(
				'id' => 'filter_tab',
				'type' => 'tab',
				'label' => __( 'FAQ Filter', 'candy-faq' ),
				'icon' => 'fa-search'
			),
			array(
				'id' => 'faq_filter_title',
				'type' => 'title',
				'label' => __( 'FAQ Live Filter settings', 'candy-faq' ),
				'description' => __( 'Configure filter settings', 'candy-faq' )
			),
			array(
				'id' => 'faq_filter_theme',
				'type' => 'select',
				'label' => __( 'FAQ filter theme', 'candy-faq' ),
				'options' => array(
					'round' => __( 'Rounded', 'candy-faq' ),
					'invisible' => __( 'Invisible', 'candy-faq' )
				),
				'default' => 'round'
			),
			array(
				'id' => 'faq_filter_placeholder',
				'type' => 'input_text',
				'label' => __( 'FAQ filter placeholder', 'candy-faq' ),
				'default' => __( 'FAQ filter', 'candy-faq' ),
			),
			array(
				'id' => 'faq_filter_bg',
				'type' => 'color',
				'label' => __( 'FAQ filter background color', 'candy-faq' ),
				'default' => 'rgba(255,255,255,0)'
			),
			array(
				'id' => 'faq_filter_color',
				'type' => 'color',
				'label' => __( 'FAQ filter text color', 'candy-faq' ),
				'default' => '#333'
			),
			array(
				'id' => 'show_faq_filter_icon',
				'type' => 'checkbox',
				'label' => __( 'Show FAQ filter icon?', 'candy-faq' ),
				'default' => true
			),
			array(
				'id' => 'faq_filter_icon',
				'type' => 'icon_select',
				'label' => __( 'FAQ filter icon', 'candy-faq' ),
				'default' => 'fa-filter',
			),
			array(
				'id' => 'faq_filter_clear_icon',
				'type' => 'icon_select',
				'label' => __( 'FAQ filter clear icon', 'candy-faq' ),
				'default' => 'fa-times-circle',
			),
			array(
				'id' => 'faq_no_results_text',
				'type' => 'input_text',
				'label' => __( 'FAQ filter no results text', 'candy-faq' ),
				'default' => __( 'No questions matching current filter', 'candy-faq' ),
			),
			array(
				'id' => 'faq_no_results_bg',
				'type' => 'color',
				'label' => __( 'FAQ no results background color', 'candy-faq' ),
				'default' => '#f7f7f7'
			),
			array(
				'id' => 'faq_no_results_color',
				'type' => 'color',
				'label' => __( 'FAQ no results text color', 'candy-faq' ),
				'default' => '#333'
			),
			array(
				'id' => 'faq_filter_open_single',
				'type' => 'checkbox',
				'label' => __( 'Open question when single item matches filter?', 'candy-faq' ),
				'default' => false,
			),
			/**
			 * Rating
			 */
			array(
				'id' => 'rating_tab',
				'type' => 'tab',
				'label' => __( 'FAQ Rating', 'candy-faq' ),
				'icon' => 'fa-star-o'
			),
			array(
				'id' => 'rating_block_label',
				'type' => 'input_text',
				'label' => __( 'Rating block label', 'candy-faq' ),
				'default' => __( 'Was this helpful?', 'candy-faq' )
			),
			array(
				'id' => 'rating_buttons_style',
				'type' => 'image_select',
				'label' => __( 'Rating buttons style', 'candy-faq' ),
				'options' => array(
					'rnd_trans' => array(
						'label' => __( 'Rounded transparent', 'candy-faq' ),
						'img' => IMG_URL . 'btn-rnd-trans.png'
					),
					'sq_trans' => array(
						'label' => __( 'Square transparent', 'candy-faq' ),
						'img' => IMG_URL . 'btn-sq-trans.png'
					),
					'rnd' => array(
						'label' => __( 'Rounded button', 'candy-faq' ),
						'img' => IMG_URL . 'btn-rnd.png'
					),
					'sq' => array(
						'label' => __( 'Square button', 'candy-faq' ),
						'img' => IMG_URL . 'btn-sq.png'
					),
					'circle' => array(
						'label' => __( 'Circle, no label', 'candy-faq' ),
						'img' => IMG_URL . 'btn-circle.png'
					),
				),
				'default' => 'rnd_trans',
				'description' => __( 'Select the style for like / dislike buttons', 'candy-faq' ),
			),
			array(
				'id' => 'rating_shadow',
				'type' => 'select',
				'label' => __( 'Rating buttons shadow', 'candy-faq' ),
				'options' => array(
					'none' => __( 'None', 'candy-faq' ),
					'solid' => __( 'Solid', 'candy-faq' ),
					'blurred' => __( 'Blurred', 'candy-faq' ),
				),
				'default' => 'none'
			),
			array(
				'id' => 'likes_title',
				'type' => 'title',
				'label' => __( 'Likes settings', 'candy-faq' ),
				'description' => __( 'Configure rating likes', 'candy-faq' )
			),
			array(
				'id' => 'show_likes_button',
				'type' => 'checkbox',
				'label' => __( 'Show likes button?', 'candy-faq' ),
				'default' => true
			),
			array(
				'id' => 'like_label',
				'type' => 'input_text',
				'label' => __( 'Like label', 'candy-faq' ),
				'default' => __( 'Like', 'candy-faq' ),
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'show_likes_icon',
				'type' => 'checkbox',
				'label' => __( 'Show likes icon?', 'candy-faq' ),
				'default' => true,
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'like_icon',
				'type' => 'icon_select',
				'label' => __( 'Like icon', 'candy-faq' ),
				'default' => 'fa-smile-o',
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'like_color',
				'type' => 'color',
				'label' => __( 'Like button color', 'candy-faq' ),
				'default' => '#4BB651',
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'rating_likes_shadow_color',
				'type' => 'color',
				'label' => __( 'Like button shadow color', 'candy-faq' ),
				'default' => '#888',
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'like_inverse_color',
				'type' => 'color',
				'label' => __( 'Like button inverse color (text)', 'candy-faq' ),
				'default' => '#fff',
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'show_likes_count',
				'type' => 'checkbox',
				'label' => __( 'Show likes count?', 'candy-faq' ),
				'default' => true,
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'show_like_message',
				'type' => 'checkbox',
				'label' => __( 'Show message after like?', 'candy-faq' ),
				'default' => false,
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'like_message_text',
				'type' => 'textarea_text',
				'label' => __( 'Like message text', 'candy-faq' ),
				'default' => __( '<i class="fa fa-smile-o"></i> Great!<br/><strong>Thank you</strong> for your vote!', 'candy-faq' ),
				'dependency' => array(
					'target' => 'show_likes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'dislikes_title',
				'type' => 'title',
				'label' => __( 'Dislikes settings', 'candy-faq' ),
				'description' => __( 'Configure rating dislikes', 'candy-faq' )
			),
			array(
				'id' => 'show_dislikes_button',
				'type' => 'checkbox',
				'label' => __( 'Show dislikes button?', 'candy-faq' ),
				'default' => true
			),
			array(
				'id' => 'dislike_label',
				'type' => 'input_text',
				'label' => __( 'Dislike label', 'candy-faq' ),
				'default' => __( 'Dislike', 'candy-faq' ),
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'show_dislikes_icon',
				'type' => 'checkbox',
				'label' => __( 'Show dislikes icon?', 'candy-faq' ),
				'default' => true,
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'dislike_icon',
				'type' => 'icon_select',
				'label' => __( 'Dislike icon', 'candy-faq' ),
				'default' => 'fa-frown-o',
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'dislike_color',
				'type' => 'color',
				'label' => __( 'Dislike button color', 'candy-faq' ),
				'default' => '#C85C5E',
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'rating_dislikes_shadow_color',
				'type' => 'color',
				'label' => __( 'Dislike button shadow color', 'candy-faq' ),
				'default' => '#888',
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'dislike_inverse_color',
				'type' => 'color',
				'label' => __( 'Dislike button inverse color (text)', 'candy-faq' ),
				'default' => '#fff',
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'show_dislikes_count',
				'type' => 'checkbox',
				'label' => __( 'Show dislikes count?', 'candy-faq' ),
				'default' => true,
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'show_dislike_message',
				'type' => 'checkbox',
				'label' => __( 'Show message after dislike?', 'candy-faq' ),
				'default' => false,
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'dislike_message_text',
				'type' => 'textarea_text',
				'label' => __( 'Dislike message text', 'candy-faq' ),
				'default' => __( 'Thank you for your vote!', 'candy-faq' ),
				'dependency' => array(
					'target' => 'show_dislikes_button',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'rating_message_bg',
				'type' => 'color',
				'label' => __( 'Like / dislike message background color', 'candy-faq' ),
				'default' => '#f7f7f7'
			),
			array(
				'id' => 'rating_message_color',
				'type' => 'color',
				'label' => __( 'Like / dislike message text color', 'candy-faq' ),
				'default' => '#888'
			),
			array(
				'id' => 'rating_message_border_color',
				'type' => 'color',
				'label' => __( 'Like / dislike message border color', 'candy-faq' ),
				'default' => '#eee'
			),
			array(
				'id' => 'show_rating_total',
				'type' => 'checkbox',
				'label' => __( 'Show rating total?', 'candy-faq' ),
				'default' => true,
				'description' => 'A line of text, like: 3 of 10 found this answer helpful'
			),
			array(
				'id' => 'rating_total_text',
				'type' => 'input_text',
				'label' => __( 'Rating total text', 'candy-faq' ),
				'default' => __( '%d of %d found this answer helpful.', 'candy-faq' ),
				'description' => 'First %d is replaced with likes, second - with total sum of votes',
				'dependency' => array(
					'target' => 'show_rating_total',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'rating_total_color',
				'type' => 'color',
				'label' => __( 'Rating total text color', 'candy-faq' ),
				'default' => '#bbb',
				'dependency' => array(
					'target' => 'show_rating_total',
					'type' => 'EQ',
					'value' => true
				)
			),
			/**
			 * Feedback
			 */
			array(
				'id' => 'feedback_tab',
				'type' => 'tab',
				'label' => __( 'FAQ Feedback', 'candy-faq' ),
				'icon' => 'fa-bullhorn'
			),
			array(
				'id' => 'enable_feedback',
				'type' => 'checkbox',
				'label' => __( 'Enable answer feedback?', 'candy-faq' ),
				'default' => false,
				'description' => 'Allow users to leave feedback on questions/answers?'
			),
			array(
				'id' => 'feedback_mode',
				'type' => 'select',
				'label' => __( 'Feedback form display mode?', 'candy-faq' ),
				'options' => array(
					'dislike' => __( 'Show after dislike', 'candy-faq' ),
					'like' => __( 'Show after like', 'candy-faq' ),
					'any' => __( 'Show after like or dislike', 'candy-faq' ),
					'always' => __( 'Always present', 'candy-faq' )
				),
				'default' => 'dislike',
				'description' => __( 'Select when to display feedback form', 'candy-faq' ),
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_label',
				'type' => 'input_text',
				'label' => __( 'Set feedback form label', 'candy-faq' ),
				'default' => __( 'You can leave feedback:', 'candy-faq' ),
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_submit_label',
				'type' => 'input_text',
				'label' => __( 'Set feedback submit button label', 'candy-faq' ),
				'default' => __( 'Send feedback', 'candy-faq' ),
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_submit_request_label',
				'type' => 'input_text',
				'label' => __( 'Set feedback submit button label to show when request in progress', 'candy-faq' ),
				'default' => __( 'Sending...', 'candy-faq' ),
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_submit_bg',
				'type' => 'color',
				'label' => __( 'Feedback submit button background color', 'candy-faq' ),
				'default' => '#4bb7e5',
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_submit_color',
				'type' => 'color',
				'label' => __( 'Feedback submit button text color', 'candy-faq' ),
				'default' => '#ffffff',
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_info_text',
				'type' => 'textarea_text',
				'label' => __( 'You can add extra description to feedback form', 'candy-faq' ),
				'default' => __( 'We will use your feedback to improve this answer', 'candy-faq' ),
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_sent_text',
				'type' => 'textarea_text',
				'label' => __( 'Text to display after feedback sent. You can use HTML', 'candy-faq' ),
				'default' => __( 'Thank you for your feedback, we will do our best to fix this soon', 'candy-faq' ),
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_message_bg',
				'type' => 'color',
				'label' => __( 'Feedback message background color', 'candy-faq' ),
				'default' => '#f7f7f7',
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_message_color',
				'type' => 'color',
				'label' => __( 'Feedback message text color', 'candy-faq' ),
				'default' => '#888',
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'feedback_message_border_color',
				'type' => 'color',
				'label' => __( 'Feedback message border color', 'candy-faq' ),
				'default' => '#eee',
				'dependency' => array(
					'target' => 'enable_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			/**
			 * Typography
			 */
			array(
				'id' => 'styles_tab',
				'type' => 'tab',
				'label' => __( 'Typography', 'candy-faq' ),
				'icon' => 'fa-font'
			),
			array(
				'id' => 'typography_title',
				'type' => 'title',
				'label' => __( 'Typography', 'candy-faq' ),
				'description' => __( 'Configure fonts', 'candy-faq' )
			),
			array(
				'id' => 'use_system_font',
				'type' => 'checkbox',
				'label' => __( 'Use system/theme font?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'Turn this on if you want to use theme font', 'candy-faq' ),

			),
			// typography
			array(
				'id' => 'style_font',
				'type' => 'font',
				'label' => __( 'Font', 'candy-faq' ),
				'default' => 'Roboto',
				'description' => __( 'Select font to use for FAQ', 'candy-faq' ),
				'dependency' => array(
					'target' => 'use_system_font',
					'type' => 'NEQ',
					'value' => true
				)
			),
			array(
				'id' => 'style_font_gf_weights',
				'type' => 'google_font_weights',
				'label' => __( 'Font weights to load (for Google Fonts only)', 'candy-faq' ),
				'default' => array('400', '600'),
				'description' => __( 'Font weights to load from Google. Use Shift or Ctrl/Cmd to select multiple values. Note: more weights mean more load time', 'candy-faq' ),
				'dependency' => array(
					'target' => 'use_system_font',
					'type' => 'NEQ',
					'value' => true
				)
			),
			array(
				'id' => 'style_font_gf_languages',
				'type' => 'google_font_languages',
				'label' => __( 'Font languages to load (for Google Fonts only)', 'candy-faq' ),
				'default' => array(),
				'description' => __( 'Font languages to load from Google. Latin set is always loaded. Use Shift or Ctrl/Cmd to select multiple values. Note: more languages mean more load time', 'candy-faq' ),
				'dependency' => array(
					'target' => 'use_system_font',
					'type' => 'NEQ',
					'value' => true
				)
			),
			array(
				'id' => 'dont_load_font',
				'type' => 'checkbox',
				'label' => __( 'Don\'t load font?', 'candy-faq' ),
				'default' => false,
				'description' => __( 'Can be useful if your theme or other plugin loads this font already', 'candy-faq' ),
				'dependency' => array(
					'target' => 'use_system_font',
					'type' => 'NEQ',
					'value' => true
				)
			),
			array(
				'id' => 'content_font_size',
				'type' => 'css_size',
				'label' => __( 'Answer content font size', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "1"),
				'description' => __( 'Content font size is used to proportionally change size of content text', 'candy-faq' ),
			),
			array(
				'id' => 'content_line_height',
				'type' => 'css_size',
				'label' => __( 'Answer content line-height', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "1.7"),
				'description' => __( 'Content line height', 'candy-faq' ),
			),
			array(
				'id' => 'question_font_size',
				'type' => 'css_size',
				'label' => __( 'Question font size', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "1.5"),
				'description' => __( 'Question text font-size', 'candy-faq' ),
			),
			array(
				'id' => 'category_font_size',
				'type' => 'css_size',
				'label' => __( 'Category font size', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "1.5"),
				'description' => __( 'Category text font-size', 'candy-faq' ),
			),
			array(
				'id' => 'toggle_all_font_size',
				'type' => 'css_size',
				'label' => __( 'Toggle all font size', 'candy-faq' ),
				'default' => array("unit" => 'em', "size" => "1.3"),
				'description' => __( 'Toggle all button text font-size', 'candy-faq' ),
			),
			/**
			 * Themes
			 */
			array(
				'id' => 'themes_tab',
				'type' => 'tab',
				'label' => __( 'Themes & CSS', 'candy-faq' ),
				'icon' => 'fa-paint-brush'
			),
			array(
				'id' => 'themes_title',
				'type' => 'title',
				'label' => __( 'Presets & Custom CSS', 'candy-faq' ),
				'description' => __( 'Add custom styling', 'candy-faq' )
			),
			array(
				'id' => 'preset_loader',
				'type' => 'preset',
				'label' => __( 'Select style preset and save options to apply it', 'candy-faq' ),
				'fields' => array(
					'faq_bg',
					'faq_filter_bg',
					'faq_filter_color',
					'question_font_size',
					'category_font_size',
					'toggle_all_font_size',
					'faq_items_spacing',
					'faq_items_sep',
					'faq_items_sep_color',
					'faq_items_rounded',
					'faq_shadow',
					'faq_question_shadow',
					'faq_items_height',
					'faq_controls_margin_top',
					'faq_controls_margin_bottom',
					'faq_controls_margin_left',
					'faq_controls_margin_right',
					'show_faq_toggle_all_icon',
					'faq_toggle_all_icon',
					'faq_toggle_all_icon_open',
					'faq_toggle_all_bg',
					'faq_toggle_all_bg_hover',
					'faq_toggle_all_color',
					'show_faq_question_icon',
					'faq_question_icon',
					'faq_question_icon_open_action',
					'faq_question_open_icon',
					'faq_question_bg',
					'faq_question_bg_hover',
					'faq_question_color',
					'faq_answer_bg',
					'faq_answer_color',
					'faq_answer_shadow',
					'faq_category_margin_top',
					'faq_category_margin_bottom',
					'faq_category_margin_left',
					'faq_category_color',
					'faq_count_bg',
					'faq_count_color',
					'faq_filter_theme',
					'show_faq_filter_icon',
					'faq_filter_icon',
					'faq_filter_clear_icon',
					'faq_no_results_bg',
					'faq_no_results_color',
					'rating_buttons_style',
					'rating_shadow',
					'like_icon',
					'like_color',
					'rating_likes_shadow_color',
					'like_inverse_color',
					'dislike_icon',
					'dislike_color',
					'rating_dislikes_shadow_color',
					'dislike_inverse_color',
					'rating_message_bg',
					'rating_message_color',
					'rating_message_border_color',
					'rating_total_color',
					'feedback_submit_bg',
					'feedback_submit_color',
					'feedback_message_bg',
					'feedback_message_color',
					'feedback_message_border_color'
				),
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
				'default' => __( '', 'candy-faq' )
			),
			array(
				'id' => 'custom_css_title',
				'type' => 'title',
				'label' => __( 'Custom CSS', 'candy-faq' ),
				'description' => __( 'Add custom CSS code', 'candy-faq' )
			),
			array(
				'id' => 'custom_css',
				'type' => 'textarea',
				'label' => __( 'CSS to add after plugin styles', 'candy-faq' ),
				'height' => 20,
				'width' => 80,
				'default' => __( '', 'candy-faq' )
			),

			/**
			 * Google Analytics
			 */
			array(
				'id' => 'ga_tab',
				'type' => 'tab',
				'label' => __( 'Google Analytics', 'candy-faq' ),
				'icon' => 'fa-line-chart'
			),
			array(
				'id' => 'ga_title',
				'type' => 'title',
				'label' => __( 'Google Analytics custom events integration', 'candy-faq' ),
				'description' => __( 'Please note: our plugin does not add Google Analytics tracking code, this is usually done in theme templates. Please follow the instructions on Google Analytics tracking code page.', 'candy-faq' )
			),
			//views
			array(
				'id' => 'track_article_views',
				'type' => 'checkbox',
				'label' => __( 'Track question views?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'ga_view_category',
				'type' => 'input',
				'label' => __( 'View: Event category', 'candy-faq' ),
				'default' => __( 'FAQ', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_views',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_view_action',
				'type' => 'input',
				'label' => __( 'View: Event action', 'candy-faq' ),
				'default' => __( 'Question view', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_views',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_view_label',
				'type' => 'select',
				'label' => __( 'View: Event Label', 'candy-faq' ),
				'options' => array(
					'article_id' => __( 'Question ID', 'candy-faq' ),
					'article_title' => __( 'Question title', 'candy-faq' )
				),
				'default' => 'article_id',
				'dependency' => array(
					'target' => 'track_article_views',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_view_value',
				'type' => 'input',
				'label' => __( 'View: Event value (integer, optional)', 'candy-faq' ),
				'default' => __( '', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_views',
					'type' => 'EQ',
					'value' => true
				)
			),
			//likes
			array(
				'id' => 'track_article_likes',
				'type' => 'checkbox',
				'label' => __( 'Track question likes?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'ga_like_category',
				'type' => 'input',
				'label' => __( 'Like: Event category', 'candy-faq' ),
				'default' => __( 'FAQ', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_likes',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_like_action',
				'type' => 'input',
				'label' => __( 'Like: Event action', 'candy-faq' ),
				'default' => __( 'Question like', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_likes',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_like_label',
				'type' => 'select',
				'label' => __( 'Like: Event Label', 'candy-faq' ),
				'options' => array(
					'article_id' => __( 'Question ID', 'candy-faq' ),
					'article_title' => __( 'Question title', 'candy-faq' )
				),
				'default' => 'article_id',
				'dependency' => array(
					'target' => 'track_article_likes',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_like_value',
				'type' => 'input',
				'label' => __( 'Like: Event value (integer, optional)', 'candy-faq' ),
				'default' => __( '', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_likes',
					'type' => 'EQ',
					'value' => true
				)
			),
			// dislikes
			array(
				'id' => 'track_article_dislikes',
				'type' => 'checkbox',
				'label' => __( 'Track question dislikes?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'ga_dislike_category',
				'type' => 'input',
				'label' => __( 'Dislike: Event category', 'candy-faq' ),
				'default' => __( 'FAQ', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_dislikes',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_dislike_action',
				'type' => 'input',
				'label' => __( 'Dislike: Event action', 'candy-faq' ),
				'default' => __( 'Question dislike', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_dislikes',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_dislike_label',
				'type' => 'select',
				'label' => __( 'Dislike: Event Label', 'candy-faq' ),
				'options' => array(
					'article_id' => __( 'Question ID', 'candy-faq' ),
					'article_title' => __( 'Question title', 'candy-faq' )
				),
				'default' => 'article_id',
				'dependency' => array(
					'target' => 'track_article_dislikes',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_dislike_value',
				'type' => 'input',
				'label' => __( 'Dislike: Event value (integer, optional)', 'candy-faq' ),
				'default' => __( '', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_dislikes',
					'type' => 'EQ',
					'value' => true
				)
			),
			// feedback
			array(
				'id' => 'track_article_feedback',
				'type' => 'checkbox',
				'label' => __( 'Track question feedback?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'ga_feedback_category',
				'type' => 'input',
				'label' => __( 'Feedback: Event category', 'candy-faq' ),
				'default' => __( 'FAQ', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_feedback_action',
				'type' => 'input',
				'label' => __( 'Feedback: Event action', 'candy-faq' ),
				'default' => __( 'Question feedback', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_feedback_label',
				'type' => 'select',
				'label' => __( 'Feedback: Event Label', 'candy-faq' ),
				'options' => array(
					'article_id' => __( 'Question ID', 'candy-faq' ),
					'article_title' => __( 'Question title', 'candy-faq' )
				),
				'default' => 'article_id',
				'dependency' => array(
					'target' => 'track_article_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
			array(
				'id' => 'ga_feedback_value',
				'type' => 'input',
				'label' => __( 'Feedback: Event value (integer, optional)', 'candy-faq' ),
				'default' => __( '', 'candy-faq' ),
				'dependency' => array(
					'target' => 'track_article_feedback',
					'type' => 'EQ',
					'value' => true
				)
			),
		);
	}

	/**
	 * To be used inside options method
	 * @param $key
	 */
	protected static function get_saved_option($key, $default = null) {
		$saved = self::get_saved_values();
		return isset($saved[$key]) ? $saved[$key] : $default;
	}

	public static function get_non_ui_options($options) {
		return array_filter($options, function($option) {
			return $option['type'] !== 'tab' &&
			       $option['type'] !== 'title' &&
			       $option['type'] !== 'description' &&
			       $option['type'] !== 'code' &&
			       $option['type'] !== 'info' &&
			       $option['type'] !== 'warning';
		});
	}

	public static function save($options) {
		self::add_wpml_string_options($options);
		update_option(OPTION_KEY, json_encode($options));
	}

	/**
	 * Registers options that require translations
	 * @param $options
	 */
	private function add_wpml_string_options($options) {

		if (!function_exists ( 'icl_register_string' )) { return; }

		$all_options = self::get_options_by_id();

		foreach($options as $id => $value) {
			if (!isset($all_options[$id]) ||
			    ($all_options[$id]['type'] !== 'input_text' && $all_options[$id]['type'] !== 'textarea_text')) {
				continue;
			}

			icl_register_string(WPML_DOMAIN, $all_options[$id]['label'], $value);
		}
	}

	/**
	 * Translates saved values
	 * @param $options
	 *
	 * @return mixed
	 */
	private static function translate_values($options) {

		if (!function_exists( 'icl_register_string' )) {
			return $options;
		}

		$all_options = self::get_options_by_id();

		foreach($options as $id => $value) {
			if (!isset($all_options[$id]) ||
			    ($all_options[$id]['type'] !== 'input_text' && $all_options[$id]['type'] !== 'textarea_text')) {
				continue;
			}

			$options[$id] = apply_filters('wpml_translate_single_string', $value, WPML_DOMAIN, $all_options[$id]['label']);
		}

		return $options;
	}

	public static function save_option($key, $value) {
		$all_options = self::get();
		$all_options[$key] = $value;
		self::save($all_options);
	}

	public static function reset() {
		update_option(OPTION_KEY, json_encode(self::get_options_defaults()));
	}

	public static function get() {
		global $candy_faq_options_cache;

		if (!$candy_faq_options_cache) {
			$candy_faq_options_cache = self::translate_values(
				wp_parse_args(self::get_saved_values(), self::get_options_defaults())
			);
		}

		return $candy_faq_options_cache;
	}

	public static function get_saved_values() {
		$options = json_decode(get_option(OPTION_KEY), true);

		$options = !empty($options) ? $options : array();

		return self::normalize_values(stripslashes_deep($options));
	}

	public static function normalize_values($settings) {
		return array_map(function($value) {
			if ($value === 'true') {
				return true;
			} else if ($value === 'false') {
				return false;
			} else {
				return $value;
			}
		}, $settings);
	}

	public static function option($key) {
		$all_options = self::get();

		return isset($all_options[$key]) ? $all_options[$key] : null;
	}

	/**
	 * Removes all plugin data from options table
	 */
	public static function remove_data() {
		delete_option(OPTION_KEY);
	}
}

global $candy_faq_options;

$candy_faq_options = new Options();