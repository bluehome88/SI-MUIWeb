<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

use \WP_Query;

/**
 * Super simple inline style helper
 * Class InlineStyle
 * @package KSCF
 */
class InlineStyle {

	private $prefix = '';

	public function __construct($options) {
		$this->prefix = $options['prefix'];
	}

	public function add_inline_css($left, $right, $top_level = false) {
		$prefix = $this->prefix;

		if (is_array($left)) {
			$left = implode(', ', array_map(function($current) use ($prefix, $top_level) {
				return $prefix . ($top_level ? '' : ' ') . $current;
			}, $left));
		} else {
			$left = $this->prefix . ($top_level ? '' : ' ') . $left;
		}

		?>
<?php esc_attr_e($left . ' { ' . $right . ' } '); ?><?php
	}

	public function add_inline_link_css($left, $right) {
		$this->add_inline_css(array(
			$left,
			$left . ':focus',
			$left . ':active',
			$left . ':hover',
			$left . ':visited',
		), $right);
	}

	public function add_root_inline_css($left, $right) {
		$this->add_inline_css($left, $right, true);
	}
}

/**
 * For any shared template logic
 * Class TemplateHelper
 * @package KSCF
 */
class TemplateHelper {
	public function __construct() {}

	/**
	 * FAQ
	 */
	public static function render_faq($settings = array()) {
		if (!empty($settings) && isset($settings['custom_preset']) && $settings['custom_preset'] && isset($settings['preset'])) {
			$preset_id = $settings['preset'];
			$presets = Ajax::get_presets();
			$preset_values = $presets[$preset_id];

			//var_dump($preset_values);

			$settings = wp_parse_args($settings, $preset_values);
		}

		// parse global options
		$args = wp_parse_args(
			$settings,
			array(
				'faq_first_open' => Options::option('faq_first_open'),
				'faq_toggle_mode' => Options::option('faq_toggle_mode'),
				'faq_shadow' => Options::option('faq_shadow'),
				'faq_answer_shadow' => Options::option('faq_answer_shadow'),
				'faq_controls_margin_top' => Options::option('faq_controls_margin_top'),
				'faq_controls_margin_bottom' => Options::option('faq_controls_margin_bottom'),
				'faq_controls_margin_left' => Options::option('faq_controls_margin_left'),
				'faq_controls_margin_right' => Options::option('faq_controls_margin_right'),
				'faq_slow_animation' => Options::option('faq_slow_animation'),
				'show_faq_filter_icon' => Options::option('show_faq_filter_icon'),
				'faq_filter_icon' => Options::option('faq_filter_icon'),
				'faq_filter_theme' => Options::option('faq_filter_theme'),
				'faq_filter_placeholder' => Options::option('faq_filter_placeholder'),
				'faq_filter_clear_icon' => Options::option('faq_filter_clear_icon'),
				'faq_no_results_text' => Options::option('faq_no_results_text'),
				'show_faq_toggle_all_icon' => Options::option('show_faq_toggle_all_icon'),
				'faq_toggle_all_icon' => Options::option('faq_toggle_all_icon'),
				'faq_toggle_all_icon_open' => Options::option('faq_toggle_all_icon_open'),
				'faq_toggle_all_open_text' => Options::option('faq_toggle_all_open_text'),
				'faq_toggle_all_close_text' => Options::option('faq_toggle_all_close_text'),
				'show_faq_question_icon' => Options::option('show_faq_question_icon'),
				'faq_question_icon_open_action' => Options::option('faq_question_icon_open_action'),
				'faq_items_sep' => Options::option('faq_items_sep'),
				'faq_items_height' => Options::option('faq_items_height'),
				'faq_items_rounded' => Options::option('faq_items_rounded'),

				// rating
				'rating_message_border_color' => Options::option('rating_message_border_color'),
				'rating_message_bg' => Options::option('rating_message_bg'),
				'rating_message_color' => Options::option('rating_message_color'),
				'rating_buttons_style' => Options::option('rating_buttons_style'),
				'like_color' => Options::option('like_color'),
				'like_inverse_color' => Options::option('like_inverse_color'),
				'rating_likes_shadow_color' => Options::option('rating_likes_shadow_color'),
				'dislike_color' => Options::option('dislike_color'),
				'dislike_inverse_color' => Options::option('dislike_inverse_color'),
				'rating_dislikes_shadow_color' => Options::option('rating_dislikes_shadow_color'),
				'show_like_message' => Options::option('show_like_message'),
				'show_dislike_message' => Options::option('show_dislike_message'),

				// feedback
				'enable_feedback' => Options::option('enable_feedback'),
				'feedback_mode' => Options::option('feedback_mode'),

				// toggles, shortcode specific preset
				'custom_preset' => false
			)
		);

		$categories = array();

		if ($args['home_faq_categories']) {
			$ids = explode(',', $args['home_faq_categories']);

			foreach ($ids as $id) {
				array_push($categories, get_term_by('id', (int)$id, FAQ_CPT_CATEGORY));
			}
		} else {
			$categories = get_terms( FAQ_CPT_CATEGORY, array(
				'hide_empty' => true
			) );
		}

		$faq_style = '';

		$faq_style .= 'margin-top: ' . SettingsBuilder::css_size_to_string($args['home_faq_margin_top']) . ';';
		$faq_style .= 'margin-bottom: ' . SettingsBuilder::css_size_to_string($args['home_faq_margin_bottom']) . ';';

		if ($args['home_faq_limit_width_switch']) {
			$faq_style .= 'width: ' . SettingsBuilder::css_size_to_string($args['home_faq_width_limit']) . ';';
		}

		$faq_extra_classes = array(
			'kscf-faq--height-' . $args['faq_items_height']
		);

		if ($args['faq_items_rounded']) {
			$faq_extra_classes[]= 'kscf-faq--rounded';
		}

		if ($args['faq_items_sep']) {
			$faq_extra_classes[]= 'kscf-faq--sep';
		}

		if ($args['show_faq_question_icon']) {
			$faq_extra_classes[]= 'kscf-faq--q-icon';
			$faq_extra_classes[]= 'kscf-faq--q-icon-' . $args['faq_question_icon_open_action'];
		}

		if ($args['faq_shadow']) {
			$faq_extra_classes[]= 'kscf-faq--w-shadow';
		}

		if ($args['faq_answer_shadow']) {
			$faq_extra_classes[]= 'kscf-faq--w-ans-shadow';
		}

		// in some cases CSS, unique CSS uuid class is required (for example, in shortcodes)
		$has_custom_styles = $args['custom_preset'];
		$css_id = '';

		if ($has_custom_styles) {
			$css_id = uniqid('kscf-uuid-');
			$faq_extra_classes[]= $css_id;
		}

		?>
	<div class="kscf-faq fn-kscf-faq <?php self::print_classes($faq_extra_classes); ?>"
	     style="<?php echo esc_attr($faq_style); ?>"
	     data-anim="<?php esc_attr_e($args['faq_slow_animation'] ? 'slow' : 'fast'); ?>"
		<?php if ($args['faq_toggle_mode']): ?>
			data-toggle="1"
		<?php endif; ?>
		<?php if ($args['show_like_message']): ?>
			data-show-like-msg="1"
		<?php endif; ?>
		<?php if ($args['show_dislike_message']): ?>
			data-show-dislike-msg="1"
		<?php endif; ?>
		<?php if ($args['enable_feedback']): ?>
			data-feedback-mode="<?php esc_attr_e($args['feedback_mode']); ?>"
		<?php endif; ?>>
		<?php

		if ($has_custom_styles) {
			?><style><?php

			$css_helper = new InlineStyle(array('prefix' => '.' . $css_id));

			/**
			 * Custom FAQ styles go here
			 */

			// colors
			$css_helper->add_root_inline_css('.kscf-faq', 'background: ' . $args['faq_bg'] . ';');

			// items spacing
			$css_helper->add_inline_css(
				'.kscf-faq-question',
				'margin-bottom: ' . SettingsBuilder::css_size_to_string($args['faq_items_spacing']) . ';'
			);

			// questions
			$css_helper->add_inline_css(
				'.kscf-faq-question__title',
				'background: ' . $args['faq_question_bg'] . ';' .
				'color: ' . $args['faq_question_color'] . ';' .
				'font-size: ' . SettingsBuilder::css_size_to_string($args['question_font_size']) . ';'
			);

			$css_helper->add_inline_css(
				'.kscf-faq-question__title:hover',
				'background: ' . $args['faq_question_bg_hover'] . ';'
			);

			// items separator
			if ($args['faq_items_sep']) {
				$css_helper->add_inline_css(
					'.kscf-faq-question__title',
					'border-bottom: 1px solid ' . $args['faq_items_sep_color'] . ';'
				);
			} else {
				$css_helper->add_inline_css( '.kscf-faq-question__title', 'border-bottom: none;' );
			}

			// answers
			$css_helper->add_inline_css(
				'.kscf-faq-answer',
				'background: ' . $args['faq_answer_bg'] . ';' .
				'color: ' . $args['faq_answer_color'] . ';'
			);

			// no results
			$css_helper->add_inline_css(
				'.kscf-faq__no-results',
				'background: ' . $args['faq_no_results_bg'] . ';' .
				'color: ' . $args['faq_no_results_color'] . ';'
			);

			// categories
			$css_helper->add_inline_css(
				'.kscf-faq-category__title',
				'color: ' . $args['faq_category_color'] . ';' .
				'font-size: ' . SettingsBuilder::css_size_to_string($args['category_font_size']) . ';' .
				'margin-top: ' . SettingsBuilder::css_size_to_string($args['faq_category_margin_top']) . ';' .
				'margin-left: ' . SettingsBuilder::css_size_to_string($args['faq_category_margin_left']) . ';' .
				'margin-bottom: ' . SettingsBuilder::css_size_to_string($args['faq_category_margin_bottom']) . ';'
			);

			$css_helper->add_inline_css(
				'.kscf-faq-category__count',
				'background: ' . $args['faq_count_bg'] . ';' .
				'color: ' . $args['faq_count_color'] . ';'
			);

			// toggle all styles
			$css_helper->add_inline_link_css(
				'.kscf-faq-toggle-all .kscf-faq-toggle-all__link',
				'font-size: ' . SettingsBuilder::css_size_to_string($args['toggle_all_font_size']) . ';' .
				'background: ' . $args['faq_toggle_all_bg'] . ';' .
				'color: ' . $args['faq_toggle_all_color'] .';'
			);

			$css_helper->add_inline_css(
				'.kscf-faq-toggle-all .kscf-faq-toggle-all__link:hover',
				'background: ' . $args['faq_toggle_all_bg_hover'] .';'
			);

			$css_helper->add_inline_css(
				'.kscf-faq__controls',
				'margin-top: ' . SettingsBuilder::css_size_to_string($args['faq_controls_margin_top']) .';' .
				'margin-bottom: ' . SettingsBuilder::css_size_to_string($args['faq_controls_margin_bottom']) .';' .
				'margin-left: ' . SettingsBuilder::css_size_to_string($args['faq_controls_margin_left']) .';' .
				'margin-right: ' . SettingsBuilder::css_size_to_string($args['faq_controls_margin_right']) .';'
			);

			// filter
			$css_helper->add_inline_css(
				'.kscf-faq-filter .kscf-faq-filter__input',
				'background: ' . $args['faq_filter_bg'] . ';' .
				'color: ' . $args['faq_filter_color'] . ';'
			);

			/**
			 * custom rating styles go here
			 */
			$css_helper->add_inline_css(
				'.kscf-rating-message',
				'border-color: ' . $args['rating_message_border_color'] .';' .
				'background: ' . $args['rating_message_bg'] .';' .
				'color: ' . $args['rating_message_color'] .';'
			);

			// rating total
			$css_helper->add_inline_css(
				'.kscf-rating-total',
				'color: ' . $args['rating_total_color'] .';'
			);

			// like styles
			if (in_array($args['rating_buttons_style'], array('circle', 'rnd', 'sq'))) {
				$css_helper->add_inline_link_css(
					'.kscf-rating-btn.kscf-like',
					'background-color: ' . $args['like_color'] . '; ' .
					'color: ' . $args['like_inverse_color'] .';'
				);
				$css_helper->add_inline_css(
					'.kscf-rating-btn.kscf-like i',
					'background-color: ' . $args['like_color'] . '; ' .
					'color: ' . $args['like_inverse_color'] .';'
				);
			} else {
				$css_helper->add_inline_link_css(
					'.kscf-rating-btn.kscf-like',
					'background-color: transparent;' .
					'color: ' . $args['like_color'] .';'
				);
				$css_helper->add_inline_css(
					'.kscf-rating-btn.kscf-like i',
					'background-color: transparent;' .
					'color: ' . $args['like_color'] .';'
				);
			}

			// likes shadow
			$css_helper->add_inline_css(
				'.kscf-rating-shadow-solid .kscf-rating-btn.kscf-like',
				'box-shadow: 1px 2px 0px ' . $args['rating_likes_shadow_color'] . '; '
			);

			$css_helper->add_inline_css(
				'.kscf-rating-shadow-blurred .kscf-rating-btn.kscf-like',
				'box-shadow: 1px 2px 5px ' . $args['rating_likes_shadow_color'] . '; '
			);

			$css_helper->add_inline_css(
				array(
					'.kscf-rating-shadow-solid:not(.kscf-voted) .kscf-rating-btn.kscf-like:hover',
					'.kscf-rating-shadow-solid.kscf-voted .kscf-rating-btn.kscf-like',
					'.kscf-rating-shadow-blurred:not(.kscf-voted) .kscf-rating-btn.kscf-like:hover',
					'.kscf-rating-shadow-blurred.kscf-voted .kscf-rating-btn.kscf-like',
				),
				'margin-top: 1px; ' .
				'box-shadow: 1px 1px 0px ' . $args['rating_likes_shadow_color'] . '; '
			);

			// dislike styles
			if (in_array($args['rating_buttons_style'], array('circle', 'rnd', 'sq'))) {
				$css_helper->add_inline_link_css(
					'.kscf-rating-btn.kscf-dislike',
					'background-color: ' . $args['dislike_color'] . '; ' .
					'color: ' . $args['dislike_inverse_color'] .';'
				);
				$css_helper->add_inline_css(
					'.kscf-rating-btn.kscf-dislike i',
					'background-color: ' . $args['dislike_color'] . '; ' .
					'color: ' . $args['dislike_inverse_color'] .';'
				);
			} else {
				$css_helper->add_inline_link_css(
					'.kscf-rating-btn.kscf-dislike',
					'background-color: transparent;' .
					'color: ' . $args['dislike_color'] .';'
				);
				$css_helper->add_inline_css(
					'.kscf-rating-btn.kscf-dislike i',
					'background-color: transparent;' .
					'color: ' . $args['dislike_color'] .';'
				);
			}

			// dislikes shadow
			$css_helper->add_inline_css(
				'.kscf-rating-shadow-solid .kscf-rating-btn.kscf-dislike',
				'box-shadow: 1px 2px 0px ' . $args['rating_dislikes_shadow_color'] . '; '
			);

			$css_helper->add_inline_css(
				'.kscf-rating-shadow-blurred .kscf-rating-btn.kscf-dislike',
				'box-shadow: 1px 2px 5px ' . $args['rating_dislikes_shadow_color'] . '; '
			);

			$css_helper->add_inline_css(
				array(
					'.kscf-rating-shadow-solid:not(.kscf-voted) .kscf-rating-btn.kscf-dislike:hover',
					'.kscf-rating-shadow-solid.kscf-voted .kscf-rating-btn.kscf-dislike',
					'.kscf-rating-shadow-blurred:not(.kscf-voted) .kscf-rating-btn.kscf-dislike:hover',
					'.kscf-rating-shadow-blurred.kscf-voted .kscf-rating-btn.kscf-dislike',
				),
				'margin-top: 1px; ' .
				'box-shadow: 1px 1px 0px ' . $args['rating_dislikes_shadow_color'] . '; '
			);

			/**
			 * custom feedback styles go here
			 */
			$css_helper->add_inline_css(
				'.kscf-feedback-sent-message',
				'border-color: ' . $args['feedback_message_border_color'] . '; ' .
				'background: ' . $args['feedback_message_bg'] . '; ' .
				'color: ' . $args['feedback_message_color'] . '; '
			);

			$css_helper->add_inline_css(
				'.kscf-feedback-form .kscf-feedback-form__submit a',
				'background: ' . $args['feedback_submit_bg'] . '; ' .
				'color: ' . $args['feedback_submit_color'] . '; '
			);

			?></style><?php
		}

		?><div class="kscf-faq__controls ks-clearfix">

			<?php if($args['home_show_faq_filter']):?>
				<div class="kscf-faq-filter kscf-faq-filter--empty kscf-faq-filter--<?php echo esc_attr($args['faq_filter_theme']); ?>-theme fn-kscf-faq-filter">
					<form class="kscf-faq-filter__form" action="" novalidate>
						<input type="text" class="kscf-faq-filter__input fn-kscf-faq-filter-input" placeholder="<?php echo esc_attr($args['faq_filter_placeholder']); ?>" />
						<a href="#" class="kscf-faq-filter__clear fn-kscf-faq-filter-clear">
							<i class="fa <?php echo esc_attr($args['faq_filter_clear_icon']); ?>"></i>
						</a>
						<?php if ($args['show_faq_filter_icon']): ?>
							<span class="kscf-faq-filter__icon">
								<i class="fa <?php echo esc_attr($args['faq_filter_icon']); ?>"></i>
							</span>
						<?php endif; ?>
					</form>
				</div>
			<?php endif; ?>

			<?php if ($args['home_show_faq_toggle_all']): ?>
				<div class="kscf-faq-toggle-all">
					<a href="#" class="kscf-faq-toggle-all__link fn-kscf-faq-toggle-all">

						<span class="kscf-faq-toggle-all__label-closed">
							<?php if($args['show_faq_toggle_all_icon']): ?>
								<i class="kscf-faq-toggle-all__icon fa <?php echo esc_attr($args['faq_toggle_all_icon']); ?>"></i>
							<?php endif; ?>
							<span class="kscf-faq-toggle-all__text">
								<?php echo esc_html($args['faq_toggle_all_open_text']); ?>
							</span>
						</span>

						<span class="kscf-faq-toggle-all__label-open">
							<?php if($args['show_faq_toggle_all_icon']): ?>
								<i class="kscf-faq-toggle-all__icon fa <?php echo esc_attr($args['faq_toggle_all_icon_open']); ?>"></i>
							<?php endif; ?>
							<span class="kscf-faq-toggle-all__text">
								<?php echo esc_html($args['faq_toggle_all_close_text']); ?>
							</span>
						</span>
					</a>
				</div>
			<?php endif; ?>
			</div>
		<?php
			// categories loop
			if ( sizeof( $categories ) ):
				foreach ( $categories as $index => $category ):
					self::render_faq_category($category, $args, $index);
				endforeach; // end of terms loop
			endif; // end of topics loop
			?>
			<div class="fn-kscf-faq-no-results ks-hidden kscf-faq__no-results">
				<?php echo esc_html($args['faq_no_results_text']); ?>
			</div>
		</div><?php
	}

	/**
	 * FAQ category
	 * @param $term
	 * @param array $settings
	 */
	public static function render_faq_category($term, $settings = array(), $cat_index = 0) {

		if (!$term) {
			return;
		}

		$args = wp_parse_args(
			$settings,
			array(
				'faq_include_children' => Options::option('faq_include_children'),
				'home_show_faq_categories' => Options::option('home_show_faq_categories'),
				'home_show_faq_category_count' => Options::option('home_show_faq_category_count'),
				'faq_question_shadow' => Options::option('faq_question_shadow'),
				'show_faq_question_icon' => Options::option('show_faq_question_icon'),
				'faq_question_icon' => Options::option('faq_question_icon'),
				'faq_question_icon_open_action' => Options::option('faq_question_icon_open_action'),
				'faq_question_open_icon' => Options::option('faq_question_open_icon'),
			)
		);

		$query_args = array(
			'post_type' => FAQ_CPT,
			'posts_per_page' => -1,
			'ignore_sticky_posts' => 1,
			'tax_query' => array(
				array(
					'taxonomy' => FAQ_CPT_CATEGORY,
					'field'    => 'slug',
					'terms'    => $term->slug,
					'include_children' => $args['faq_include_children']
				),
			)
		);

		if (Options::option( 'faq_custom_order' )) {
			$query_args['orderby'] = 'menu_order';
			$query_args['order'] = 'ASC';
		} else {
			$query_args['orderby'] = Options::option('faq_orderby');
			$query_args['order'] = Options::option('faq_order');
		}

		$loop = new WP_Query( $query_args );

		?>
		<div class="kscf-faq-category fn-kscf-faq-category">
			<div class="kscf-faq-category__inner">

				<?php if($args['home_show_faq_categories']): ?>
					<div class="kscf-faq-category__title fn-kscf-faq-category-title" data-slug="<?php echo esc_attr($term->slug); ?>">
						<?php echo esc_html( $term->name ); ?>
						<?php if($args['home_show_faq_category_count']): ?>
							<span class="kscf-faq-category__count fn-kscf-faq-category-count">
								<?php echo esc_html($loop->post_count); ?> <?php echo esc_html(self::get_plural($loop->post_count)); ?>
							</span>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<div class="kscf-faq-questions">
					<div class="kscf-faq-questions-list<?php if($args['faq_question_shadow']) {
						echo esc_attr(' kscf-faq-questions-list--with-shadow');
					} ?>">
						<?php
						$index = 0;

						if ( $loop->have_posts() ) :
							while ( $loop->have_posts() ) : $loop->the_post();
								?>
								<div class="kscf-faq-question fn-kscf-faq-item<?php if($args['faq_first_open'] && $cat_index === 0 && $index === 0): ?> kscf-faq-question--open<?php endif; ?>"
								    data-id="<?php echo esc_attr( get_the_ID() ); ?>"
								    data-title="<?php echo esc_attr( get_the_title() ); ?>">

									<a class="fn-kscf-faq-item-link" href="#">
										<span class="kscf-faq-question__title fn-kb-faq-question">
											<?php if ($args['show_faq_question_icon']): ?>
												<i class="kscf-faq-question__icon fa <?php
													echo esc_attr($args['faq_question_icon']); ?>"></i>
											<?php endif; ?>
											<?php if ($args['show_faq_question_icon'] && $args['faq_question_icon_open_action'] === 'change'): ?>
												<i class="kscf-faq-question__icon-open fa <?php
													echo esc_attr($args['faq_question_open_icon']); ?>"></i>
											<?php endif; ?>
											<?php echo esc_html(get_the_title()); ?>
										</span>
									</a>
									<div class="kscf-faq-answer fn-kscf-faq-answer" <?php if($args['faq_first_open'] && $cat_index === 0 && $index === 0): ?> style="max-height: none;"<?php endif; ?>>
										<div class="kscf-faq-answer__content">
											<?php the_content(); ?>

											<?php self::answer_extra($args); ?>
										</div>
									</div>
								</div>
							<?php
								++$index;
							endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
		wp_reset_postdata();
	}

	/**
	 * Gets correct plural for given count
     * @param $count
     * @return null
	 */
	public static function get_plural($count) {

		if (!Options::option('faq_enable_advanced_plurals')) {
			return $count === 1 ? Options::option( 'question_text' ) : Options::option( 'questions_text' );
		}

		global $kscf_plurals_config_cache;

		if (!isset($kscf_plurals_config_cache)) {
			$kscf_plurals_config_cache = array(
				'singular_numbers' => self::get_numbers_pool(Options::option('questions_singular_numbers')),
				'plural_1st_numbers' =>  self::get_numbers_pool(Options::option('questions_pl1_numbers')),
				'plural_2nd_numbers' => self::get_numbers_pool(Options::option('questions_pl2_numbers'))
			);
		}

        $plurals = $kscf_plurals_config_cache;

        if ( $count === 1 || (!empty($plurals['singular_numbers']) && in_array($count, $plurals['singular_numbers'])) ) {
            // case 1: 1 or in singular array
            return Options::option( 'question_text' );
        } else if ( !empty($plurals['plural_2nd_numbers']) && in_array($count, $plurals['plural_2nd_numbers']) ) {
            // case 2: 1 or in singular array
            return Options::option( 'questions_p2_text' );
        } else if (!empty($plurals['plural_1st_numbers']) && empty($plurals['plural_2nd_numbers']) && !in_array($count, $plurals['plural_1st_numbers'])) {
            // case 3: specified 1st type plurals array only, use 2nd as default if not matched
            return Options::option( 'questions_p2_text' );
        } else {
            // case 4: otherwise, return 1st plural form
            return Options::option( 'questions_text' );
        }
	}

	/**
	 * Gets an array of numbers from given string setting
	 * @param $string_value
     * @return mixed
	 */
	private static function get_numbers_pool($string_value) {
		return array_reduce(explode(',', trim($string_value)), function($acc, $item) {
			$item = trim($item);

			if (!$item) {
				return $acc;
			}

			if (strpos($item, '-') !== false) {
				$split = explode('-', $item);
				$from = $split[0];
				$to = $split[1];

				return array_merge($acc, self::get_range($from, $to));
			} else {
				return array_merge($acc, array($item));
			}
		}, array());
	}

	/**
	 * Gets range given 2 numbers
	 * @param $from
	 * @param $to
     * @return array
	 */
	private static function get_range($from, $to) {
		$from = (int) $from;
		$to = (int) $to;

		if ($from < 0 || $to < 0 || $to < $from) {
			return [];
		} else {
			$result = array();

			for (; $from <= $to; $from++) {
				array_push($result, $from);
			}

			return $result;
		}
	}

	/**
	 * Answer extras
	 */
	public static function answer_extra($settings) {

		$args = wp_parse_args(
			$settings,
			array(
				// common
				'rating_buttons_style' => Options::option('rating_buttons_style'),
				'rating_shadow' => Options::option('rating_shadow'),
				'rating_block_label' => Options::option('rating_block_label'),
				'show_rating_total' => Options::option('show_rating_total'),
				'rating_total_text' => Options::option('rating_total_text'),
				// likes
				'show_likes_button' => Options::option('show_likes_button'),
				'like_label' => Options::option('like_label'),
				'show_likes_icon' => Options::option('show_likes_icon'),
				'like_icon' => Options::option('like_icon'),
				'show_likes_count' => Options::option('show_likes_count'),
				// dislikes
				'show_dislikes_button' => Options::option('show_dislikes_button'),
				'dislike_label' => Options::option('dislike_label'),
				'show_dislikes_icon' => Options::option('show_dislikes_icon'),
				'dislike_icon' => Options::option('dislike_icon'),
				'show_dislikes_count' => Options::option('show_dislikes_count'),
				
			)
		);
		
		$id = get_the_ID();
		$likes = (int) get_post_meta( $id, LIKE_FIELD, true );
		$dislikes = (int) get_post_meta( $id, DISLIKE_FIELD, true );
		$total = $likes + $dislikes;

		$outside_counter = $args['rating_buttons_style'] === 'circle';
		$show_label = $args['rating_buttons_style'] !== 'circle';
		$show_rating = $args['show_likes_button'] || $args[ 'show_dislikes_button'];

		$rating_dynamic_classes = array(
			'kscf-rating-style-' . $args['rating_buttons_style'],
			'kscf-rating-shadow-' . $args['rating_shadow']
		);

		if ($outside_counter) {
			$rating_dynamic_classes[]= 'kscf-rating-counter-out';
		}

		?>
		<div class="kscf-answer-extra fn-kscf-answer-extra"
		     data-id="<?php echo esc_attr( $id ); ?>"
		     data-title="<?php echo esc_attr( get_the_title() ); ?>">

			<?php if ( $show_rating ): ?>

				<div class="kscf-answer-rating fn-kscf-rating <?php self::print_classes($rating_dynamic_classes); ?>">

					<div class="kscf-answer-rating__title">
						<?php echo esc_html( $args['rating_block_label'] ); ?>
					</div>

					<?php if ( $args['show_likes_button'] ): ?>

						<span class="fn-kscf-rating-item kscf-rating-item<?php esc_attr_e($likes == 0 ? ' kscf-rating-item--no-votes' : ''); ?>">
							<a href="#" class="kscf-like kscf-rating-btn fn-kscf-like"
							   title="<?php echo esc_attr( $args['like_label'] ); ?>">

								<?php if ( $args['show_likes_icon'] ): ?>
									<i class="kscf-rating-btn__icon fa <?php echo esc_attr( $args['like_icon'] ); ?>"></i>
								<?php endif; ?>

								<?php if ( $show_label ): ?>
									<?php esc_html_e( $args[ 'like_label'] ); ?>
								<?php endif; ?>

								<?php if ( $args['show_likes_count'] && !$outside_counter ): ?>
									<span class="kscf-rating-btn__count">
										<span class="kscf-rating-btn__count-val fn-kscf-rating-count">
											<?php esc_html_e( $likes ? $likes : '&nbsp;' ); ?>
										</span>
									</span>
								<?php endif; ?>
							</a>

							<?php if ( $args['show_likes_count'] && $outside_counter ): ?>
								<span class="kscf-rating-btn__count">
									<span class="kscf-rating-btn__count-val fn-kscf-rating-count">
										<?php esc_html_e( $likes ? $likes : '&nbsp;' ); ?>
									</span>
								</span>
							<?php endif; ?>
						</span>

					<?php endif; ?>

					<?php if ( $args['show_dislikes_button'] ): ?>

						<span class="fn-kscf-rating-item kscf-rating-item<?php esc_attr_e($dislikes == 0 ? ' kscf-rating-item--no-votes' : ''); ?>">
							<a href="#" class="kscf-dislike kscf-rating-btn fn-kscf-dislike"
							   title="<?php echo esc_attr( $args['dislike_label'] ); ?>">
								<?php if ( $args['show_dislikes_icon'] ): ?>
									<i class="kscf-rating-btn__icon fa <?php echo esc_attr( $args['dislike_icon'] ); ?>"></i>
								<?php endif; ?>

								<?php if ( $show_label ): ?>
									<?php echo esc_html( $args['dislike_label'] ); ?>
								<?php endif; ?>

								<?php if ( $args['show_dislikes_count'] && !$outside_counter ): ?>
									<span class="kscf-rating-btn__count">
										<span class="kscf-rating-btn__count-val fn-kscf-rating-count">
											<?php echo esc_html( $dislikes ? $dislikes : '&nbsp;' ); ?>
										</span>
									</span>
								<?php endif; ?>
							</a><!--.kscf-dislike-->

							<?php if ( $args['show_dislikes_count'] && $outside_counter ): ?>
								<span class="kscf-rating-btn__count">
									<span class="kscf-rating-btn__count-val fn-kscf-rating-count">
										<?php echo esc_html( $dislikes ? $dislikes : '&nbsp;' ); ?>
									</span>
								</span>
							<?php endif; ?>
						</span><!--.fn-kscf-rating-item-->

					<?php endif; ?>

						<?php if ( $args['show_rating_total'] ): ?>
							<div class="kscf-rating-total">
								<?php printf( esc_html( $args['rating_total_text'] ), $likes, $total ); ?>
							</div>
						<?php endif; ?>

					</div><!--.kscf-answer-rating-->

			<?php endif; ?>

			<div class="fn-kscf-answer-feedback-container">
				<?php if ( Options::option( 'enable_feedback' ) && Options::option( 'feedback_mode' ) == 'always' ): ?>
					<div class="kscf-feedback-form kscf-feedback-form--no-content fn-kscf-feedback-form">

						<div class="kscf-feedback-form__title">
							<?php echo esc_html( Options::option( 'feedback_label' ) ); ?>
						</div>

						<div class="kscf-feedback-form__message">
							<textarea class="kscf-feedback-form__message-input fn-kscf-feedback-val" rows="5"></textarea>
							<?php echo wp_kses_post(
								Options::option( 'feedback_info_text' ) ?
									'<div class="kscf-feedback-form__info">' . Options::option( 'feedback_info_text' ) . '</div>' :
									'' );
							?>
						</div>

						<div class="kscf-feedback-form__submit">
							<a href="#" class="fn-kscf-feedback-submit">
								<?php echo esc_html( Options::option( 'feedback_submit_label' ) ); ?>
							</a>
						</div>
					</div>
				<?php endif; ?>
			</div><!--.fn-answer-feedback-container-->

		</div><!--.kscf-answer-extra-->
	<?php
	}

	public static function print_classes($classes) {
		esc_attr_e(implode(' ', $classes));
	}

	protected function hextorgb($hex, $alpha = false) {
		$hex = str_replace( '#', '', $hex );

		if ( strlen( $hex ) == 6 ) {
			$rgb['r'] = hexdec( substr( $hex, 0, 2 ) );
			$rgb['g'] = hexdec( substr( $hex, 2, 2 ) );
			$rgb['b'] = hexdec( substr( $hex, 4, 2 ) );
		} else if ( strlen( $hex ) == 3 ) {
			$rgb['r'] = hexdec( str_repeat( substr( $hex, 0, 1 ), 2 ) );
			$rgb['g'] = hexdec( str_repeat( substr( $hex, 1, 1 ), 2 ) );
			$rgb['b'] = hexdec( str_repeat( substr( $hex, 2, 1 ), 2 ) );
		} else {
			$rgb['r'] = '0';
			$rgb['g'] = '0';
			$rgb['b'] = '0';
		}
		if ( $alpha ) {
			$rgb['a'] = $alpha;
		}

		return $rgb;
	}
}